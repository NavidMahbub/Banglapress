<template ref="add_lang">
  <div class="card">
    <div class="card-body">
      <div class="container-fluid">
        <div class="row">
          <!-- {{siteDetail}} -->
          <!-- {{content}} -->
          <div class="col-sm-5">
            <label for>Title</label>
            <input v-model="siteDetail.title" class="form-control" placeholder="enter title" />
          </div>
        </div>
        <div class="row">
          <div class="col-sm-5">
            <label for>Slug</label>
            <input v-model="siteDetail.slug" class="form-control" placeholder="enter title" />
          </div>
        </div>
        <hr />
        <div class="row">
          <div class="col-sm-12">
            <label>Contents</label>
            <br />
            <!-- <div class="row" v-for="(i,k) in contents" :key="k" style="margin-bottom:10px"></div> -->
            <!-- loop -->
            <button
              type="button"
              class="btn btn-primary"
              data-toggle="modal"
              data-target="#add_word"
            >Add Slot</button>
          </div>

      
          <!-- {{content_list}} -->
        </div>
        <hr />
         <hr />
        <br />

        <div v-for="(i,k) in siteDetail.content" :key="k">
          <div class="row">
          <div class="col-sm-8">
            {{i.title}} <br />
            <!-- delete -->
            <div v-if="i.selectedType==`Text`">
              <b-form-input
                type="text"
                v-model="i.content"
                v-validate="'required'"
                placeholder="Enter content.."
              ></b-form-input>
              
              <br />
              <hr />
            </div>
            <!-- todo -->
            <div v-if="i.selectedType==`Image`">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <button
                    @click="ContentManagerModal(k)"
                    class="btn btn-outline-primary"
                    type="button"
                  >Select Image</button>
                </div>
                <input
                  type="text"
                  class="form-control"
                  placeholder
                  aria-label
                  aria-describedby="basic-addon1"
                  v-model="i.content"
                />
              </div>
                <img :src="i.content" style="height:120px;width:150px"/>
            </div>

            <div v-if="i.selectedType==`Video`">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <button
                    @click="ContentVideoModal(k)"
                    class="btn btn-outline-primary"
                    type="button"
                  >Select Video</button>
                </div>
                <input
                  type="text"
                  class="form-control"
                  placeholder
                  aria-label
                  aria-describedby="basic-addon1"
                  v-model="i.content"
                />
              </div>
              <img :src="i.content" style="height:120px;width:150px"/>

            </div>

            <div v-if="i.selectedType==`CK`">
              <!-- <ckeditor :editor="editor" v-model="i.content" :config="editorConfig"></ckeditor> -->
            <quill-editor :content="i.content"
                          :options="{}"
                          @change="()=>{}">
            </quill-editor>  
              <!-- todo -->
            </div>
          </div>
          <div class="col-sm-2">
             <a href="#" @click="delete_content(k)">
               <span style="font-size:20px;position:relative;top:20px;">
                &#9940;
               </span>
               <!-- <i class="fa fa-trash" aria-hidden="true"></i> -->
             </a>
          </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer">
      <button class="btn btn-success pull-right" @click="save">save</button>
    </div>
    <AddWord ref="add_word"></AddWord>
    <ContentManager ref="content_manager_modal" :content="content" :selected_content_type="'image'"></ContentManager>
    <ContentManager ref="content_video_modal" :content="vid_content" :selected_content_type="'video'"></ContentManager>
  </div>
</template>



<script>
import axios from "axios";
import AddWord from "./word";
import { mapGetters } from "vuex";
import { ADD_SITE_INFO, UPDATE_SITE_INFO } from "@/store/action.type";
import ContentManager from "../../content/index";
import { type } from "os";
import { quillEditor } from 'vue-quill-editor'

export default {
  components: {
    // ClassicEditor,
    ContentManager,
    AddWord,
    quillEditor,
  },

  data() {
    return {
      modal: true,
      content:{},
      vid_content:{},
      titleS: "",
      selectedType: "",
      // editor: ClassicEditor,
      editorConfig: {
        fullPage: false,
        resize_enabled: false,
        toolbar: {
          items: [
            "bold",
            "italic",
            "link",
            "Blockquote",
            "BulletedList",
            "NumberedList",
            "Underline",
            "undo",
            "redo"
          ]
        }
      },

      id: "",
      title: "",
      slug: "",
      content_list: [],
      temp_key :``,
    };
  },
  computed: {
    ...mapGetters(["site_list", "siteDetail"]),
    getContents() {
      return this.content_list.length;
    },
    contentList(){
      if(this.siteDetail.content.length){
        // return JSON.parse(this.siteDetail.content)
        return this.siteDetail.content
      }else{
        return []
      }
    }
  },
  watch:{
    content :function(val){
      // alert(this.temp_key)
      this.siteDetail.content[this.temp_key].content = this.content.file 
    },
    vid_content(val){
      this.siteDetail.content[this.temp_key].content = this.content.file 
    },
  },
  mounted() {},

  methods: {
    delete_content(key){
      this.siteDetail.content.splice(key,1)
    },
    addData(arg) {
      // console.log('addiing data')
      // this.content_list.push(arg);
      this.siteDetail.content.push(arg);
    },
    save() {
      if (!( this.siteDetail.title && this.siteDetail.slug)) {
        // show warning
        alert(`Fill data properly`);
        return;
      }

      let ob = {
        id: this.siteDetail.id,
        title: this.siteDetail.title,
        slug: this.siteDetail.slug,
        contents: JSON.stringify(this.siteDetail.content)
      };

      this.$store
        .dispatch(`ADD_SITE_INFO`, ob)
        .then(response => {
          this.$iziToast.success({
            position: "topRight",
            title: "Successfully Added",
            message: ``
          });
        })
        .catch(error => {
          this.$iziToast.success({
            position: "topRight",
            title: "Error",
            message: ``
          });
        });

      (this.siteDetail.id = ""),
        (this.siteDetail.title = ""),
        (this.siteDetail.slug = ""),
        (this.siteDetail.content = "");
    },

    ContentManagerModal(key) {
      this.temp_key = key 
      this.$refs.content_manager_modal.openModal();
    },
    ContentVideoModal(key) {
      this.temp_key = key 
      this.$refs.content_video_modal.openModal();
    }
  }
};
</script>

<style  scoped>
</style>


