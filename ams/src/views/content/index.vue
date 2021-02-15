<template>
  <b-modal
    title="Content Manager"
    hide-footer
    size="xl"
    v-model="largeModal"
    @ok="largeModal = false"
  >
    <!-- {{content_list}} -->
    <div class="row">
      <div class="col-sm-5">
        <!-- <autocomplete v-model="search.title" :search="search_content" style="height:50px"></autocomplete> -->
        <input v-model="search.title" placeholder="search by title" type="text" style="width:300px;height:35px;">
      </div>
      <div class="col-sm-5">
        <Treeselect v-model="search.content_category" :options="content_category_parents"></Treeselect>
      </div>
    </div>
    <!-- {{selected_content_type}} -->
    <form @submit.prevent="addArea">
      <b-row>
        <div class="col-md-12 content_type">
          <span
            :class="{ content_active : content_type == 'image' }"
            @click="ContentTypeChange('image')"
            data-toggle="tooltip"
            data-placement="top"
            title="Image"
          >
            <i class="fa fa-image"></i>
          </span>
          <span
            :class="{ content_active : content_type == 'video' }"
            @click="ContentTypeChange('video')"
            data-toggle="tooltip"
            data-placement="top"
            title="Video"
          >
            <i class="fa fa-video-camera" aria-hidden="true"></i>
          </span>
          <span
            :class="{ content_active : content_type == 'audio' }"
            @click="ContentTypeChange('audio')"
            data-toggle="tooltip"
            data-placement="top"
            title="Audio"
          >
            <i class="fa fa-volume-up"></i>
          </span>
          <span
            :class="{ content_active : content_type == 'file' }"
            @click="ContentTypeChange('file')"
            data-toggle="tooltip"
            data-placement="top"
            title="File"
          >
            <i class="fa fa-file"></i>
          </span>
          <span
            :class="{ content_active : content_type == 'youtube' }"
            @click="ContentTypeChange('youtube')"
            data-toggle="tooltip"
            data-placement="top"
            title="Youtube"
          >
            <i class="fa fa-youtube-play" aria-hidden="true"></i>
          </span>
          <span
            :class="{ content_active : content_type == 'setting' }"
            @click="OpenSettingModal"
            data-toggle="tooltip"
            data-placement="top"
            title="setting"
          >
            <i id="dropdown-1" class="fa fa-cog" aria-hidden="true"></i>
          </span>
          <Setting ref="setting_modal"></Setting>
        </div>
        <div class="col-md-12 row">
          <div class="col-md-3 pull-right">
            <!-- <b-button>category</b-button> -->
            <!-- <br> -->
          </div>
        </div>
        <hr />
        <div class="col-md-12 row">
          <div class="col-md-9">
            <div class="row">
              <ContentCard :items="content_list" :content="content"></ContentCard>
            </div>
          </div>
          <div class="col-md-3">
            <div class="from-group row">
              <div class="col-sm-12">
                <div
                  v-if="list.file==''"
                  class="video_upload logo_upload"
                  @click="$refs.ContentFile.click()"
                >
                  <p>Choose file (file type> PDF/MP4/jpg/png/mp3, size > 100MB )</p>
                  <i class="fa fa-cloud-upload-alt new_btn"></i>
                  <input
                    type="file"
                    ref="ContentFile"
                    class="file-input"
                    style="display: none"
                    v-on:change="onContentChange"
                  />
                  <small
                    id="emailHelp"
                    class="form-text text-muted"
                    style="color:read"
                    v-if="errors.file"
                  >{{errors.file[0]}}</small>
                </div>
                <div v-else class="video_upload logo_upload">
                  <span class="removeImage" @click="ContentRemoveFile">X</span>
                  <img v-if="list.type=='image'" :src="video" class="fitimage" />
                  <video v-else-if="list.type=='video'" :src="video" class="fitimage" controls></video>
                  <audio v-else-if="list.type=='audio'" :src="video" class="fitimage" controls></audio>
                  <iframe
                    v-else-if="list.type=='document'"
                    :src="video"
                    width="100%"
                    height="100%"
                  />
                </div>
                <p
                  style="color:red;"
                  v-for="(servererror,k) in servererrors.file"
                  v-bind:key="'u'+k"
                >{{servererror}}</p>
              </div>
              <div class="col-sm-12">
                <label>Title :</label>
                <b-form-textarea v-model="list.title" placeholder="enter title"></b-form-textarea>
                <p
                  style="color:red;"
                  v-for="(servererror,k) in servererrors.title"
                  v-bind:key="'u'+k"
                >{{servererror}}</p>
              </div>
              <div class="col-sm-12">
                <label>Category :</label>
                <Treeselect v-model="list.content_category" :options="content_category_parents"></Treeselect>
                <!-- <b-form-textarea  v-model="list.title" placeholder="enter title"></b-form-textarea> -->
                <p
                  style="color:red;"
                  v-for="(servererror,k) in servererrors.title"
                  v-bind:key="'u'+k"
                >{{servererror}}</p>
              </div>
              <div class="col-md-12" style="margin-top:5px;">
                <button type="button" class="btn btn-primary" v-if="loading">
                  <i class="fa fa-cog fa-spin"></i> uploading..
                </button>
                <button type="button" class="btn btn-primary" v-else @click="upload()">upload</button>
              </div>
            </div>
          </div>
        </div>
      </b-row>
      <div class="form-group row" style="margin-top:50px">
        <div class="col-sm-12">
          <input v-if="!addLoader" type="submit" value="Submit" class="btn btn-primary pull-right" />
          <button v-if="addLoader" class="btn btn-primary pull-right" type="button" disabled>
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Submitting...
          </button>
          <button
            v-if="!addLoader"
            @click.prevent="close"
            class="btn btn-success pull-right"
            style="margin-right:5px;"
          >Close</button>
        </div>
      </div>
    </form>
  </b-modal>
</template>

<script>
import axios from "axios";
import Vue from "vue";
import VeeValidate from "vee-validate";
Vue.use(VeeValidate);
import ContentCard from "./ContentCard";
import Setting from "./Setting";
import { GET_CONTENT, All_AREA, ADD_CONTENT } from "@/store/action.type";
// import { ADD_CONTACT_LOADER} from "../../store/mutation.type"
import Treeselect from "@riophae/vue-treeselect";
import "@riophae/vue-treeselect/dist/vue-treeselect.css";
import { mapState, mapGetters } from "vuex";

export default {
  name: "ContentManager",
  props: ["content", "selected_content_type"],
  components: {
    ContentCard,
    Setting,
    Treeselect
  },
  data() {
    return {
      content_category: null,
      content_type: "",
      largeModal: false,
      loading: false,
      search: { title: "", type: "", content_category: null },
      addLoader: false,
      loadingdata: false,
      list: {
        title: "",
        title: "",
        file: "",
        status: "",
        content_category: null
      },
      newArea: {
        title: "",
        parent_id: ""
      },
      video: "",
      file_ext: "",
      image_ext: ["jpg", "jpeg", "JPG", "png", "gif"],
      audio_ext: ["mp3", "MP3", "ogg", "mpga"],
      video_ext: [
        "mp4",
        "mpeg",
        "avi",
        "mov",
        "mpeg-4",
        "wmv",
        "mpeg-ps",
        "flv",
        "3gpp",
        "webm",
        "gif"
      ],
      document_ext: ["doc", "docx", "pdf", "pptx", "ppt", "xls", "xlsx", "txt"],
      servererrors: {},
      content_type: "image"
    };
  },
  mounted() {
    this.base_url = axios.defaults.baseURL;
    this.getData();
    this.getContentCategoryList();
  },
  watch: {
    "search.content_category": function(val) {
      // adjust the search paramenters
      //  this.search.content_category = this.list.content_category
      // get data
      this.getData();
    },
    "search.title": function(val){
      this.getData()
      console.log(this.search)
    },
    largeModal: function() {
      this.setContentType();
    }
  },
  methods: {
    setContentType: function() {
      console.log(`content selected => ${this.selected_content_type}`)
      this.content_type = this.selected_content_type;
    },
    search_content: function(input) {
      if (input.length < 1) {
        return [];
      }
      let res = this.contents.data
        .map(v => v.title)
        .filter(v => {
          return v.toLowerCase().startsWith(input.toLowerCase());
        });
      console.log(res);
      return res;
    },
    getContentCategoryList() {
      this.$store.dispatch("FETCH_CONTENT_CATEGORIES");
    },
    ContentSelect(item) {
      alert("ss");
      //this.$parent.content = item;
    },
    OpenSettingModal() {
      this.ContentTypeChange("setting");
      this.$refs.setting_modal.OpenModal();
    },
    ContentTypeChange: function(val) {
      this.content_type = val;
    },
    getData() {
      this.$store
        .dispatch("GET_CONTENT", this.search)
        .then(response => {
          this.loadingdata = true;
        })
        .catch(error => {
          this.loadingdata = false;
        });
    },
    addArea() {
      this.$validator.validateAll().then(result => {
        if (result) {
          var data = this.newArea;
          this.addLoader = true;
          this.$store
            .dispatch("ADD_AREA", data)
            .then(response => {
              this.addLoader = false;
              this.largeModal = false;
              this.$iziToast.success({
                position: "topRight",
                title: "Ok",
                message: "Area Added Successsfully"
              });
            })
            .catch(error => {
              this.addLoader = false;
              this.$iziToast.error({
                position: "topRight",
                title: "Error",
                message: "Something Wrong !!"
              });
            });
        }
      });
    },

    download_file(item) {
      this.detail_url =
        this.base_url + "/uploads/PLOT_INFO_DOCUMENT/" + item.name;
      axios.get(this.detail_url, { responseType: "blob" }).then(response => {
        return;
        const url = window.URL.createObjectURL(new Blob([response.data]));
        const link = document.createElement("a");
        link.href = url;
        link.setAttribute("download", item.name);
        document.body.appendChild(link);
        link.click();
      });
    },
    view_file(item) {
      this.detail_url =
        this.base_url + "/uploads/PLOT_INFO_DOCUMENT/" + item.name;
      window.open(this.detail_url, "_blank");
    },
    detials(item) {
      this.detail_url =
        this.base_url + "/uploads/PLOT_INFO_DOCUMENT/" + item.name;
      console.log(this.detail_url);
    },
    del(key, id) {
      let ob = {
        key,
        id
      };

      this.$store
        .dispatch(DEL_PLOT_INFO_FILE, ob)
        .then(response => {
          this.$iziToast.success({
            position: "topRight",
            title: "Ok",
            message: "deleted "
          });
        })
        .catch(error => {
          console.log(error);
          this.$iziToast.error({
            position: "topRight",
            title: "Ok",
            message: "error "
          });
        });
    },

    upload() {
      // todo
      console.log(this.list);
      this.$store
        .dispatch(ADD_CONTENT, this.list)
        .then(response => {
          this.$iziToast.success({
            position: "topRight",
            title: "Ok",
            message: "file uploaded "
          });
          this.responseLoading = false;
          this.list.title = "";
          this.list.description = "";
          this.list.title = "";
          this.list.file = "";
          this.list.status = "";
          this.list.content_category = null;
          this.loading = false;
        })
        .catch(error => {
          this.responseLoading = false;
          this.$iziToast.error({
            position: "topRight",
            title: "Ok",
            message: "error uploading file"
          });
          this.servererrors = error.response.data.errors;
          this.loading = false;
        });
    },
    onContentChange(e) {
      let files = e.target.files || e.dataTransfer.files;
      if (!files.length) return;
      this.list.file = files[0];
      this.video = files[0];
      var name = this.list.file.name;
      this.file_ext = name.substring(name.indexOf(".") + 1);
      this.list.type = this.getType();
      this.createContent(files[0]);
    },
    createContent(file) {
      let reader = new FileReader();
      let vm = this;
      reader.onload = e => {
        vm.video = e.target.result;
      };
      reader.readAsDataURL(file);
    },

    ContentRemoveFile: function() {
      this.list.file = "";
    },
    // ImageCheck(image){
    //   if(image==this.file_ext)
    //   {
    //     return true;
    //   }else{
    //     return false;
    //   }
    // },
    // ImageCheck(image){
    //   if(image==this.file_ext)
    //   {
    //     return true;
    //   }else{
    //     return false;
    //   }
    // },
    FileCheck(file) {
      if (file == this.file_ext) {
        return true;
      } else {
        return false;
      }
    },
    getType() {
      if (this.image_ext.find(this.FileCheck)) {
        return "image";
      }
      if (this.audio_ext.find(this.FileCheck)) {
        return "audio";
      }
      if (this.video_ext.find(this.FileCheck)) {
        return "video";
      }
      if (this.document_ext.find(this.FileCheck)) {
        return "document";
      }
    },
    openModal() {
      this.largeModal = true;
      this.newArea.title = "";
      this.newArea.parent_id = "";
    },
    close() {
      this.largeModal = false;
    },

    addButton() {
      this.line.buttons.push({
        name: "",
        state: false,
        is_reported: ""
      });
    },
    deleteButton(index) {
      this.line.buttons.splice(index, 1);
    }
  },
  computed: {
    ...mapGetters(["contents", "content_category_parents"]),
    content_list() {
      let type = this.selected_content_type;
      if (type == "*" || type == "all" || type == undefined) {
        return this.contents.data;
      } else if (type == "image") {
        return this.contents.data.filter(v => {
          let extn = v.file.split(".").pop();
          return this.image_ext.indexOf(extn) != -1;
        });
      } else if (type == "video") {
        return this.contents.data.filter(v => {
          let extn = v.file.split(".").pop();
          return this.video_ext.indexOf(extn) != -1;
        });
      }
    }
  }
};
</script>

<style scoped>
.content_type {
  top: -38px;
  position: absolute;
  text-align: right;
  right: 23px;
}
.content_active {
  background-color: #d70f0f !important;
}
.content_type > span {
  padding: 9px 13px;
  background-color: #1fc002;
  color: #fff;
  border-radius: 6px;
  margin: 2px;
  cursor: pointer;
}
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
.logo_upload {
  border: 1px solid #ccc;
  width: 100%;
  height: 90px;
  background: #eceef0;
  text-align: center;
  cursor: pointer;
}
.image_upload p {
  margin-top: 10px;
  font-size: 12px;
}

.image_upload i {
  font-size: 34px;
}
.removeImage {
  position: absolute;
  right: 13px;
  top: 14px;
  color: var(--white);
  border: 1px solid;
  border-radius: 25px;
  padding: 4px 8px;
  background-color: #fb1212f5;
  font-size: 10px;
  font-family: cursive;
}
.fitimage {
  width: 100%;
  height: 100%;
  -o-object-fit: contain;
  object-fit: contain;
  background-color: #e6e6ef;
}
#new_lesson_block .lesson_mat_caption {
  font-size: 18px;
  margin-top: -32px;
}
#new_lesson_block .lesson_mat_caption h4 {
  margin: 0;
  font-size: 18px;
  display: inline-block;
  background-color: #fff;
  padding: 0 10px;
  color: #777;
}
#new_lesson_block label {
  display: block;
  padding-bottom: 5px;
  color: #888;
}
#new_lesson_block .tool_box {
  display: flex;
  flex-direction: row;
  margin-bottom: 15px;
}
#new_lesson_block .tool_box:last-child {
  margin-bottom: 0;
}
#new_lesson_block .tool_box .item {
  margin-right: 14px;
  text-align: center;
  min-width: 90px;
  cursor: pointer;
}
#new_lesson_block .tool_box .item i {
  display: inline-block;
  color: #ccc;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 50%;
  width: 55px;
  height: 45px;
  line-height: 45px;
  transition: all 0.4s;
}
#new_lesson_block .tool_box .item:hover i {
  color: #aaa;
}
#new_lesson_block .tool_box .item span {
  display: block;
  margin-top: 5px;
  font-size: 14px;
  color: #999;
  font-weight: 600;
  transition: all 0.4s;
}
#new_lesson_block .tool_box .item:hover span {
  color: #666;
}
</style>

