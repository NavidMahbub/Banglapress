<template>
  <div class="card">
    <div class="container-fluid">
      <!-- <button class="btn btn-primary contct-b pull-left">
        <i v-if="auth_permission.album_create" class="fa fa-life-bouy"></i> Add Album
      </button> -->
       <a href="#" class="btn btn-primary contct-b pull-left" @click="add_album"><i class="fa fa-life-bouy"></i> New Add</a>
      <form class="form-inline contct my-2 my-lg-0 pull-right">
        <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" />
        <button class="btn btn-outline-success my-2 my-sm-0">Search</button> -->
      </form>

      <table class="table table-sm">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Cover</th>
            <th scope="col">Created By</th>
            <th scope="col">Updated By</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody v-if="auth_permission.album_view || auth_permission.album_viewall">
          <tr v-for="(album,index) in album_list" :key="index">
            <td>{{index+1}}</td>
            <td>{{album.title}}</td>
            <td>
              <img :src="album.cover.file" style="height:100px;width:100px;" alt />
              <!-- <img :src="get_file(album.cover.file)" style="height:100px;width:100px;" alt /> -->
              <!-- {{get_file(album.cover.file)}} -->
            </td>
            <td>{{album.created_by}}</td>
            <td>{{album.updated_by}}</td>
            <td>
              <i v-if="auth_permission.album_update || auth_permission.album_updateall" @click="update_album(album.id)" class="icon-note icons actn"></i>
              <!-- <i @click="view_album(album)" class="icon-eye icons actn"></i> -->
              <i v-if="auth_permission.album_delete || auth_permission.album_deleteall" @click="delete_album(album.id)" class="icon-trash icons actn"></i>
            </td>
          </tr>
        </tbody>
      </table>
      <!-- <nav aria-label="Page navigation example">
                <pagination :data="Object.assign({},galleryP2)" @pagination-change-page="getResults"></pagination>
      </nav>-->
    </div>
    <!-- <AddGalleryModal ref="add_gallery_modal"></AddGalleryModal>
        <EditGalleryModal ref="edit_gallery_modal"></EditGalleryModal>
    <ViewGalleryModal ref="view_gallery_modal"></ViewGalleryModal>-->
    <Loader v-if="loading"></Loader>
  </div>
</template>

<script>
import axios from "axios";
import pagination from "laravel-vue-pagination";
import Loader from "@/views/common/Loader";

import AddGalleryModal from "./AddGalleryModal";
import EditGalleryModal from "./EditGalleryModal";
import ViewGalleryModal from "./ViewGalleryModal";
import iziToast from 'izitoast'

import { mapState, mapGetters, mapActions } from "vuex";
import {
  All_GALLERY,
  DELETE_GALLERY,
  SEARCH_GALLERY,
  ALL_USER_ROLE2
} from "@/store/action.type";
export default {
  components:{Loader},
  data() {
    return {
      loading: false ,
    };
  },

  mounted() {
    this.clearData()
    this.getAlbums();
  },
  computed: {
    ...mapGetters(["auth_permission","album_list","album_detail"])
  },
  methods: {
    clearData(){
      this.album_detail = {}
    },
    add_album(){
      //todo8
      this.$router.push({ name: "AddAlbum" });

    },  
    get_file: function(arg) {
      return `${axios.defaults.baseURL}/uploads/${arg}`;
    },
    getAlbums: function() {
      this.loading = true
      this.$store
        .dispatch("FETCH_ALBUMS")
        .then(response => { this.loading = false})
        .catch(error => { this.loading = false});
    },
    update_album: function(id) {
      this.goToAddAlbum(id)
      // this.$store.dispatch('ALBUM_DETAIL',id).then(response=>{
      //     this.goToAddAlbum()
      //   }).catch(error=>{
          
      //   })
    },
    goToAddAlbum: function(arg) {
      this.$router.push({ name: "UpdateAlbum",params:{id:arg} });
    },
    delete_album: function(id) {
      this.$store
        .dispatch("DELETE_ALBUM", id)
        .then(response => {
           iziToast.success({position:'topRight',title:'Ok',message:"Album Deleted"})            
          this.getAlbums();
        })
        .catch(error => {
           iziToast.success({position:'topRight',title:'Error',message:"Album not deleted"})            
        });
    },
    view_album: function() {}
  }
};
</script>

<style scoped>
.just-padding {
  padding: 15px;
}

.list-group.list-group-root {
  padding: 0;
  overflow: hidden;
}

.list-group.list-group-root .list-group {
  margin-bottom: 0;
}

.list-group.list-group-root .list-group-item {
  border-radius: 0;
  border-width: 1px 0 0 0;
}

.list-group.list-group-root > .list-group-item:first-child {
  border-top-width: 0;
}

.list-group.list-group-root > .list-group > .list-group-item {
  padding-left: 30px;
}

.list-group.list-group-root > .list-group > .list-group > .list-group-item {
  padding-left: 45px;
}

.list-group-item .glyphicon {
  margin-right: 5px;
}
</style>
