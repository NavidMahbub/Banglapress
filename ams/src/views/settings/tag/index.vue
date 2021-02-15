<template>
    <div>
        <!-- {{tag_list}} -->
        {{paginate_tag_list}}
        <div class="row" style="margin-bottom:12px">
            <div class="col-sm-6">
                <b-input v-model="tag_data.title" placeholder="enter tag title"></b-input>
            </div>
            <div class="col-sm-2" style="position:relative;right:24px;">
                <b-button @click="add_tag">Add Tag</b-button>
            </div>
        </div>
        <div class="card">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>title</th>
                        <th>created by</th>
                        <th>updated by</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item,key) in tag_list" :key="key">
                        <td>{{key+1}}</td>
                        <td>{{item.title}}</td>
                        <td>{{item.created_by}}</td>
                        <td>{{item.updated_by}}</td>
                        <td>
                            <a href="#" @click="delete_tag(item.id)"> delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script>
import {mapGetters} from "vuex"
import pagination from "laravel-vue-pagination"
export default {
    data(){
        return {
            tag_data:{
                title: '',
            },
        }
    },
    computed:{
        ...mapGetters(['tag_list','paginate_tag_list'])
    },
    mounted(){
        this.getTags()
        this.getPaginateTags()
    },

    methods:{
        delete_tag(id){
            this.$store.dispatch('DELETE_TAG',id).then(response=>{
                this.$iziToast.success({position:'topRight',title:'',message:"Tag Deleted"})       
                this.getTags()
            }).catch(error=>{
                this.$iziToast.error({position:'topRight',title:'error',message:"something went wrong"})    
            })
        },
        add_tag(){
            this.$store.dispatch('ADD_TAG',this.tag_data).then(response=>{
                this.tag_data.title = ``
                this.$iziToast.success({position:'topRight',title:'',message:"Tag Added"})       
                this.getTags()
            }).catch(error=>{
                this.$iziToast.error({position:'topRight',title:'error',message:"something went wrong"}) 
            })
        },
        getTags(){
            this.$store.dispatch('FETCH_TAGS')
        },
        getPaginateTags(page=1){
            this.$store.dispatch('FETCH_PAGINATE_TAGS',page)
        },
    },
}
</script>