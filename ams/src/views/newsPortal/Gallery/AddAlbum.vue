<template>
  <div>
    <b-card v-if="auth_permission.album_create">
      <div class="row">
        <div class="col-sm-6">
          <label for="title">Title</label>
          <b-input v-model="album_detail.title" name="title" placeholder="Enter Title" />
          <!-- <p v-if="!album_detail.title" style="color:red">*required</p>                    -->
          
          <div v-show="errors.hasOwnProperty('title')" class="help-block alert alert-danger">
              <p v-for="(i,k) in errors[`title`]" :key="k">
                  {{i}}
              </p>
          </div>         

          <br />
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <button
                @click="ContentManagerModal"
                class="btn btn-outline-primary"
                type="button"
              >Select Album Cover</button>
            </div>
            <input
              type="text"
              class="form-control"
              placeholder="cover name"
              aria-label
              aria-describedby="basic-addon1"
            />
            <i class="icon-trash"
              @click="remove_album_cover"
              data-toggle="tooltip" title="remove"
              style="font-size:25px;color:red;margin-top:1px;margin-left:10px;" >  
            </i>  
          </div>
          <!-- <p>*required</p>                    -->
          <!-- {{Object.keys(content).length != 0}} -->
              <!-- {{content.file != ``}} -->
          <img
            v-if="Object.keys(content).length != 0  && content.file !=``"
            :src="content.file"
            style="width:100px;height:100px;"
          />
          <img
            v-if="album_detail.cover.file!=`` && content.file == ``"
            :src="album_detail.cover.file"
            style="width:100px;height:100px;"
          />

            <div v-show="errors.hasOwnProperty('cover_id')" class="help-block alert alert-danger">
                <p v-for="(i,k) in errors[`cover_id`]" :key="k">
                    {{i}}
                </p>
            </div>           
          <!-- <img
            v-else
            :src="get_file(album_detail.cover.file)"
            style="width:100px;height:100px;"
          /> -->
        </div>
      </div>
      <hr />
      <div class="row">
        <div class="col-sm-6">
          <h3>Album Photos</h3>
          <br />
          <br />
          <br />
          <div v-for="(item,key) in album_detail.more_photo" :key="key">
            <MorePhoto :item="item"></MorePhoto>
            <hr />
          </div>
          <b-button @click="add_media" style="margin-bottom:20px">Add Media</b-button>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-7">
          <b-form-checkbox :inline="true">view</b-form-checkbox>
          <b-form-checkbox :inline="true">cotinue creating</b-form-checkbox>
          <b-form-checkbox :inline="true">continue editing</b-form-checkbox>
        </div>
        <div class="col-sm-3"></div>
        <div class="col-sm-2">
          <b-button variant="danger" @click="reset_album">Reset</b-button>
          <b-button variant="success" style="margin-left:10px" @click="submit">Submit</b-button>
        </div>
      </div>
    </b-card>
    <div v-else class="card">
      <h2>you don`t have permission to add album </h2>
    </div>
    <ContentManager ref="content_manager_modal" :content="content" :selected_content_type="selected_content_type"></ContentManager>
    <Loader v-if="loading"></Loader>
  </div>
</template>
<script>
import axios from "axios";
import ContentManager from "../../content/index";
import MorePhoto from "./MorePhoto";
import { mapGetters } from "vuex";
import iziToast from "izitoast";
import Loader from '@/views/common/Loader'

export default {
  name: "AddAlbum",
  components: { MorePhoto, ContentManager ,Loader},
  data() {
    return {
      errors:{},
      loading:false ,
      selected_content_type:'',
      content:{
        file : ``,
      },
      more_photo_arr: []
    };
  },

  mounted() {
    this.clearAlbum()
    this.getAlbums()
    this.handel_update()
  },
  watch: {
    $route(to,from){
      console.log(`route changed`)
      if(to.name == `AddAlbum`){
        this.clearAlbum()
      }
    },    
    content: function(val) {
      this.album_detail.cover_id = val.id;
      this.album_detail.cover = val;
    },
     

  
  },
  computed: {
    ...mapGetters(["auth_permission","album_detail","album_list"])
  },
  methods: {
    remove_album_cover(){
        // alert(`album cover removed`)
        this.album_detail.cover = {file:``}
        this.content = {file:``}
    },
    clearAlbum(){
    this.$store.dispatch(`EMPTY_ALBUM`)
    },
    handel_update: function(){
      this.loading = true 
      let ob = this.$route.params
      if(ob.id){
        this.$store.dispatch('ALBUM_DETAIL',ob.id).thne(response=>{
          this.loading  = false
        }).catch(error=>{
          this.loading = false
        })
      }
    },
    getAlbums: function(){
      this.loading = true
      this.$store.dispatch('FETCH_ALBUMS').then(response=>{
        this.loading = false
      }).catch(error=>{
        this.loading = false
      })
    },
    get_file: function(arg) {
      if (this.album_detail.is_update) {
        return `${axios.defaults.baseURL}/uploads/${arg}`;
      } else {
        return arg;
      }
    },
    add_media: function() {
      let item = {};
      item.title = null;
      item.file = null;
      item.id = null;
      item.mark = true; // marking newsly created item
      this.album_detail.more_photo.push(item); // todo 
    },
    reset_album: function() {
      this.content_list = [];
    },
    submit: function() {
      this.album_detail.more_photo_ids = this.album_detail.more_photo.map(v => v.id);
      if (this.album_detail.is_update) {
        // update
        let payload = {
          data: this.album_detail,
          id: this.album_detail.id
        };
        this.$store
          .dispatch("UPDATE_ALBUM",payload)
          .then(response => {
            iziToast.success({
              position: "topRight",
              title: "Ok",
              message: "Album Added Updated"
            })
          })
          .catch(error => {
            console.log(error)
            this.errors = error.response.data.errors
            iziToast.error({
              position: "topRight",
              title: "error",
              message: "Could Not Update Album"
            });
          });
      } else {
        // add
        this.$store
          .dispatch("ADD_ALBUM", this.album_detail)
          .then(response => {
            iziToast.success({
              position: "topRight",
              title: "Ok",
              message: "Album Added Successsfully"
            });
          })
          .catch(error => {
            this.errors = error.response.data.errors
            iziToast.error({
              position: "topRight",
              title: "error",
              message: "Error adding album"
            });
          });
      }
    },
    ContentManagerModal() {
      this.selected_content_type = 'image'
      this.$refs.content_manager_modal.openModal();
    }
  }
};
</script>