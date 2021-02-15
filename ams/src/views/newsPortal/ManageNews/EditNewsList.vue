
<template>
  <div class="card">
        <div class="container-fluid">
            <!-- <button  @click="openModal"><i class="fa fa-life-bouy"></i> New News</button> -->
            <a href="/news/add" class="btn btn-primary contct-b pull-left"><i class="fa fa-life-bouy"></i> New News</a>
            <!-- <form class="form-inline contct my-2 my-lg-0 pull-right">
                <input  class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" >Search</button>
            </form>
                <a href="#"  class="list-icons-item text-danger-600" data-toggle="modal" data-target="#content_manager"  v-b-tooltip.hover title="manage images" style="margin-left:1px;margin-right:1px;"><i class="fas fa-file-image"></i>Content Manager</a>
                <button type="button" class="btn btn-primary" @click="ContentManagerModal">
                Launch demo modal
                </button> -->
            <table class="table table-sm">
                <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Shoulder</th>
                      <th scope="col">Athor ID</th>
                      <th scope="col">Created By</th>
                      <th scope="col">Updated By</th>
                      <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody v-if="auth_permission.news_view || auth_permission.news_viewall">
                    <tr v-for="(item,index) in news_list" :key="index">
                      <td>{{index+1}}</td>
                      <td v-html="item.shoulder"></td>
                      <td>{{item.author}}</td>
                      <td>{{item.created_by}}</td>
                      <td>{{item.updated_by}}</td>
                      <td>
                            <i  v-if="auth_permission.news_update" @click="editAreaModal(item)" class="icon-note icons actn"> </i>
                            <!-- <i @click="viewAreaModal(item)" class="icon-eye icons   actn"> </i> -->
                            <i v-if="auth_permission.news_delete || auth_permission.news_deleteall" @click="deleteArea(index,item.id)" class="icon-trash icons   actn"> </i>
                      </td>
                    </tr>
                </tbody>

            </table>
            <nav aria-label="Page navigation example">
                <!-- <pagination :data="Object.assign({},areaP2)" @pagination-change-page="getResults"></pagination> -->
            </nav>

        </div>
        <AddAreaModal ref="add_area_modal"></AddAreaModal>
        <EditAreaModal ref="edit_area_modal"></EditAreaModal>
        <ViewAreaModal ref="view_area_modal"></ViewAreaModal>
        <ContentManager ref="content_manager_modal" :content="content"></ContentManager>
        <Loader v-if="loading"></Loader>
        <!-- {{news_data}} -->

  </div>
</template>

<script>
import Vue from "vue";
import axios from 'axios'
import pagination from 'laravel-vue-pagination'
import Loader from '@/views/common/Loader'

import AddAreaModal from './AddAreaModal'
import EditAreaModal from './EditAreaModal'
import ViewAreaModal from './ViewAreaModal'
import ContentManager from '../../content/index'

import { mapState,mapGetters,mapActions } from "vuex"
import { All_AREA,DELETE_AREA,SEARCH_AREA,ALL_USER_ROLE2 } from '@/store/action.type';

export default {
  data(){
        return {
            content:{},
            loading:false,
            // news_list:[],
            // showSection: false,
            showSection(index){
                isOpen: false
            },
            parnt_index:'',
            // permission:'',
            search:{
                search_item:''
            },
             isActive: true
        }
    },
    methods:{
       
    getNews(){
        this.loading = true
        this.$store.dispatch('FETCH_NEWS').then(response=>{
            this.loading = false
        }).catch(error=>{
            this.loading = false
        })
        // axios.get('/api/news/list')
        // .then(response=>{
        //     console.log('/api/news/list')
        //     console.log(response)
        //     this.news_list = response.data 
        // }).catch(error=>{
        //     console.log(error)
        // })
    }, 
    parentChilds(index){
      alert(index);
      this.parnt_index = index;
    },

     activate:function(el){
        this.active_el = el;
    },
      listGroup(index){
        this.showSection.isOpen = !this.showSection.isOpen
      },

      listGroup2(){
        this.showSection2 = !this.showSection2
      },
        ContentManagerModal(){
            this.$refs.content_manager_modal.openModal();
        },
        addAreaModal(){
            this.$refs.add_area_modal.openModal()
        },

        editAreaModal(item){
            this.goToUpdateNews(item.id)
         
            // this.$store.dispatch('NEWS_DETAIL',item.id).then(response=>{
            //     this.goToUpdateNews(item.id)
            // }).catch(error=>{
            //     console.log(error)
            //     this.$iziToast.error({position:'topRight',title:'Error',message:"Something Wrong !!"})       
            // })  
            // this.$refs.edit_area_modal.openModal(area,index)
        },
        goToUpdateNews: function(arg){
            this.$router.push({name:'UpdateNews',params:{id:arg}})
        },
        viewAreaModal(area){
            this.$refs.view_area_modal.openModal(area)
        },

      searchArea(){
            this.loading = true
            var data = this.search
            var page = 1
            this.$store.dispatch('SEARCH_AREA',{page,data})
                .then(response=>{
                    this.loading=false;
                })
                .catch(error=>{
                    this.loading=true;
                });
        },
      getResults(page =1){
            this.loading = true;
            var data = this.search
            if(data != ''){
                this.$store.dispatch('SEARCH_AREA',{page,data})
                .then(response=>{
                    this.loading=false;
                })
                .catch(error=>{
                    this.loading=true;
                });
            }
            else{
                alert('sss');
                this.$store.dispatch('All_AREA',page)
                .then(response=>{
                    this.loading=false;
                })
                .catch(error=>{
                    this.loading=true;
                });
            }
        },

        deleteArea(index,id){
            var self = this
            this.$iziToast.question({
                timeout: 10000,
                close: false,
                overlay: true,
                displayMode: 'once',
                id: 'question',
                zindex: 999,
                title: 'Hey',
                message: 'Are you sure To Delete?',
                position: 'center',
                buttons: [
                    ['<button><b>YES</b></button>', function (instance, toast) {
                        self.$store.dispatch('DELETE_NEWS',id)
                        .then(response=>{
                            self.$iziToast.success({position:'topRight',title:'Ok',message:"Area Delated Successsfully"})
                            self.getNews()
                        })
                        .catch(error=>{
                            self.$iziToast.error({position:'topRight',title:'Error',message:"Something Wrong !!"})
                        });
                        instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');

                    }, true],
                    ['<button>NO</button>', function (instance, toast) {

                        instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');

                    }],
                ]
            });

        },

      openModal(){
            this.$refs.add_area_modal.openModal()
        },
        // getPermission(){
        //     this.$store.dispatch('ALL_USER_ROLE2')
        //     .then(response=>{
        //         this.permission = response.data.permission
        //     })
        // }
    },

     mounted(){
       this.getNews()
       // this.getResults()

        // this.getPermission()

    },
    computed: {
      ...mapGetters(["auth_permission","news_list","news_data"]),
    },

    components: {
        EditAreaModal,
        ViewAreaModal,
        pagination,
        AddAreaModal,
        ContentManager,
        Loader ,
    }
}
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

