<template>
    <div >
        <div class="card " style="height:50px;width:95%;margin-bottom:10px">
            <div class="row">
                <div class="col-md-10">
                    {{ node.label}}
                </div>
                <div class="col-md-2" >
                    
                    <a href="#" @click="addChild(node)" style="margin-left:8px; color:#000099"> <i class="fa fa-plus" style="font-size:18px"></i></a>
                    <a href="#" @click="editCategoryModal(node)" style="margin-left:8px; color:green"><i class="fa fa-edit" style="font-size:18px"></i></a>
                    <a href="#" @click="deleteCategory(node.id)" style="margin-left:8px; color:red"> <i class="fa fa-trash" style="font-size:18px"></i></a>
                    <a href="#" @click="()=>{ show_children = false}" v-if="show_children && node.children.length > 0" style="margin-left:8px"><i class="fa fa-arrow-up" style="font-size:18px"></i></a>
                    <a href="#" @click="()=>{ show_children = true }" style="margin-left:8px" v-if="!show_children && node.children.length > 0" ><i class="fa fa-arrow-down" style="font-size:18px"></i></a>        
                </div>
            </div>    
        </div>
        <div v-if="show_children" style="margin-left:15px">
            <div  v-for="(i,k) in node.children" :key="k" >
                <RecCat :node="i"></RecCat>
            </div>
        </div>
        <AddNcategoryModal ref="add_ncategory_modal"></AddNcategoryModal>
        <EditNcategoryModal ref="edit_ncategory_modal"></EditNcategoryModal>
        <ViewNcategoryModal ref="view_ncategory_modal"></ViewNcategoryModal>
        <Loader v-if="loading"></Loader>    

    </div>

</template>
<script>

import Loader from '@/views/common/Loader'

import AddNcategoryModal from './AddNcategoryModal'
import EditNcategoryModal from './EditNcategoryModal'
import ViewNcategoryModal from './ViewNcategoryModal'


import RecCat from "./RecCom"
export default {
    name:'RecCat',
    components:{
        Loader,
        EditNcategoryModal,
        ViewNcategoryModal,
        AddNcategoryModal,
        RecCat,
    },
    props:['node'],
    data(){
        return {
            show_children : false ,
            loading: false ,
        }
    },
    methods:{
            addChild(node){
                this.$refs.add_ncategory_modal.newCategory.title = ``
                this.$refs.add_ncategory_modal.newCategory.display_name = ``
                this.$refs.add_ncategory_modal.newCategory.color = ``
                this.$refs.add_ncategory_modal.newCategory.header_display = `Yes`
                this.$refs.add_ncategory_modal.newCategory.home_display = `Yes`
                this.$refs.add_ncategory_modal.newCategory.photo_display = `Yes`
                this.$refs.add_ncategory_modal.newCategory.video_display = `Yes`
                this.$refs.add_ncategory_modal.newCategory.status = `Active`
                this.$refs.add_ncategory_modal.newCategory.menubar_display = `Yes`
                this.$refs.add_ncategory_modal.openModal()
                this.$refs.add_ncategory_modal.selected_parent = node.id 

                // new
                
            },
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
    }
}
</script>

<style scoped>
  .card{  
    border-radius: 10px;
    background: #fff;
    box-shadow: 0 6px 10px rgba(0,0,0,0.8),0 0 6px rgba(0,0,0,0.05);
    transition: .3s transform cubic-bezier(.155,1.105,.295,1.12), .3s -webkit-transform cubic-bezier(.155,1.105,.295,1.12);
    padding: 13px 0px 7px 20px;
    cursor: pointer;
  }
  .card:hover{
    transform: scale(1.01);
    box-shadow: 0 10px 20px rgba(0,0,0,0.12), 0 4px 8px rgba(0,0,0,0.06);
  }

</style>