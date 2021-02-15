<template>
<div>
    <div class="row">
        <div class="col-sm-3">
            <button v-if="auth_permission.category_create" class="btn btn-success contct-b pull-left" @click="openModal"><i class="fa fa-plus"></i> Add Category</button>
        </div>
    </div>

    <br/>
    <div class="row">
        <div class="col-md-12">
            <div v-for="(i,k) in category_parents" :key="k">        
                <RecCat :node="i"></RecCat>
            </div>
        </div>
    </div>
        <AddNcategoryModal ref="add_ncategory_modal"></AddNcategoryModal>
        <EditNcategoryModal ref="edit_ncategory_modal"></EditNcategoryModal>
        <ViewNcategoryModal ref="view_ncategory_modal"></ViewNcategoryModal>
        <Loader v-if="loading"></Loader>  
</div> 
</template>

<script>
import RecCat from "./RecCom"

import ShowList from '../list/ShowList'
import axios from 'axios'
import pagination from 'laravel-vue-pagination'
import Loader from '@/views/common/Loader'

import AddNcategoryModal from './AddNcategoryModal'
import EditNcategoryModal from './EditNcategoryModal'
import ViewNcategoryModal from './ViewNcategoryModal'


import { mapState,mapGetters,mapActions } from "vuex"
import { All_NCATEGORY,DELETE_NCATEGORY,SEARCH_NCATEGORY,ALL_USER_ROLE2 } from '@/store/action.type';
export default {
  data(){
        return {
            loading:false,
            // showSection: false,
            showSection(index){
                isOpen: false
            },
            parnt_index:'',
            // permission:'',
            search:{
                search_item:''
            },
             isActive: true,

        }
    },
    methods:{
  
    editCategoryModal(item){
        this.$refs.add_ncategory_modal.openModal()
        this.$refs.add_ncategory_modal.update = true
        this.$refs.add_ncategory_modal.item_id = item.id
        this.$refs.add_ncategory_modal.newCategory.title = item.label
        this.$refs.add_ncategory_modal.selected_parent = item.parent_id// this.category_list.find( v => v.id == item.parent_id).id 
        this.$refs.add_ncategory_modal.newCategory.display_name = item.display_name
        this.$refs.add_ncategory_modal.newCategory.color = item.color
        this.$refs.add_ncategory_modal.newCategory.header_display = item.header_display
        this.$refs.add_ncategory_modal.newCategory.home_display = item.home_display
        this.$refs.add_ncategory_modal.newCategory.menubar_display = item.menubar_display
        this.$refs.add_ncategory_modal.newCategory.photo_display = item.photo_display
        this.$refs.add_ncategory_modal.newCategory.video_display = item.video_display
        this.$refs.add_ncategory_modal.newCategory.status = item.status
    },    
    getCategories(){
        this.loading = true
        this.$store.dispatch('FETCH_CATEGORIES').then(response=>{
            this.loading = false
        }).catch(error=>{
            this.loading = false
        
        })
    },    
    deleteCategory(id){
        this.loading = true
        this.$store.dispatch('DELETE_CATEGORY',id).then(response=>{
            this.getCategories()
            this.loading = false    
        })
    },

      openModal(){
           this.$refs.add_ncategory_modal.update = false
           this.$refs.add_ncategory_modal.selected_parent = null
           this.$refs.add_ncategory_modal.openModal()
        },

    },

     mounted(){     
        this.getCategories()
    },
    computed: {
      ...mapGetters(["auth_permission","category_list","category_parents"]),
    },

    components: {
        EditNcategoryModal,
        ViewNcategoryModal,
        pagination,
        AddNcategoryModal,
        ShowList,
        Loader,
        RecCat ,
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

