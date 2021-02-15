<template>
    <div>
        <b-modal title="Content Manager => Setting => Content Category" hide-footer size="lg" v-model="largeModal" @ok="largeModal == false">
         <!-- {{content_category_parents}} -->
            <div class="row" >
                <div class="col-sm-8">
                    <table class="table table-sm" style="margin-top:10px">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>title</th>
                                <th>parent id</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item,key) in paginate_content_category_list.data" :key="key">
                                <td>{{key+1}}</td>
                                <td>{{item.label}}</td>
                                <td>{{item.parent_id}}</td>
                                <td>
                                    <a href="#" @click="delete_content_category(item)" style="margin-right:10px">delete</a>
                                    <a href="#" @click="edit_content_category(item)">edit</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <pagination :data="paginate_content_category_list" @pagination-change-page="getPaginateContentCategoryList"></pagination>
                </div>
                <div class="col-sm-4">
                    <label>Title</label>
                    <b-input placeholder="title" v-model="item.label"></b-input>
                    <label>Parent</label>
                     <Treeselect v-model="item.parent" :options="content_category_parents"></Treeselect>   
                     <!-- <multiselect v-model="item.parent"  :options="content_category_parents" track-by="id" label="label"></multiselect> -->
                     <b-button v-if="!loading" class="btn btn-success pull-right " style="margin-top:20px" @click="submit">{{submit_btn_txt}}</b-button>
                    <button v-else class="btn btn-primary pull-right" type="button" disabled>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Processing...
                </button>
                <b-button v-if="!loading" class="pull-right btn-danger" style="margin-top:20px ; margin-right:10px" @click="reset">Reset</b-button>
                </div>
            </div>
        </b-modal>
    </div>
</template>
<script>
import pagination from "laravel-vue-pagination"
import {mapGetters} from "vuex"
import Treeselect from '@riophae/vue-treeselect'
import '@riophae/vue-treeselect/dist/vue-treeselect.css'
export default {
    components:{Treeselect},
    data(){
        return{
            submit_btn_txt : 'submit' ,
            is_update:false ,
            largeModal:false ,
            value:'',
            loading: false ,
            item:{
                id : null ,
                label:null ,
                parent:null ,
            },

        }
    },
    computed:{
        ...mapGetters(['content_category_list','paginate_content_category_list','content_category_parents'])
    },
    mounted(){
        this.getContentCategoryList()
        this.getPaginateContentCategoryList()
    },

    methods:{
        reset: function(){
            this.submit_btn_txt = "submit"
            this.is_update = false 
            this.item ={  label:null , parent:null }
        },
        submit: function(){
            if(!this.is_update){

                this.loading = true
                this.$store.dispatch('ADD_CONTENT_CATEGORY',this.item).then(response=>{
                    this.loading = false
                    this.getPaginateContentCategoryList()
                    this.getContentCategoryList()
                    this.$iziToast.success({position:'topRight',title:'Error',message:"Category added"})       
    
                }).catch(error=>{   
                    this.loading = false 
                    this.$iziToast.error({position:'topRight',title:'Error',message:"Something Wrong !!"})       
                })
            }else{
                let payload = {
                    data : this.item ,
                    id : this.item.id
                }
                this.loading = true 
                this.$store.dispatch('UPDATE_CONTENT_CATEGORY',payload).then(response=>{
                    this.loading = false
                    this.getPaginateContentCategoryList()
                    this.getContentCategoryList()
                    this.$iziToast.success({position:'topRight',title:'Error',message:"Category Updated"})  
                }).catch(error=>{
                    this.loading = false 
                    this.$iziToast.error({position:'topRight',title:'Error',message:"Something Wrong !!"})       
                })
            }
        },
        OpenModal : function(){
            this.largeModal = true 
        },
        getContentCategoryList(){
            this.$store.dispatch('FETCH_CONTENT_CATEGORIES')
        },
        getPaginateContentCategoryList(page=1){
            this.$store.dispatch('FETCH_PAGINATE_CONTENT_CATEGORIES',page)
        },
        edit_content_category(item){
            // submit button txt change 
            this.submit_btn_txt = "Update"
            this.is_update = true 
            //
            this.item.id = item.id
            this.item.label = item.label
            let t_parent =  this.content_category_list.find( v => v.id == item.parent_id)
            this.item.parent = t_parent ? t_parent.id : null  
            console.log(this.item)
        },
        delete_content_category(item){
            if( confirm(`Delete ${item.label} `)){
                this.$store.dispatch('DELETE_CONTENT_CATEGORY',item.id).then(response=>{
                    this.loading = false
                    this.getPaginateContentCategoryList()
                    this.getContentCategoryList()
                    this.$iziToast.success({position:'topRight',title:'Error',message:"Category Deleted"})       
    
                }).catch(error=>{
                    this.$iziToast.success({position:'topRight',title:'Error',message:"Category Not Deleted"})       
                })
            }
        }
    },
}
</script>