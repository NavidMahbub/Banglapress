<template>
    <div class="card">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>Headline</th>
                    <th>Shoulder</th>
                    <th>Created At</th>
                    <th>Published At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item,key) in news_list" :key="key">
                    <td v-html="item.headline"></td>
                    <td v-html="item.shoulder"></td>
                    <td>{{item.created_at.Date}}</td>
                    <td>{{item.published_at}}</td>
                    <td>
                        <i v-if="auth_permission.news_update || auth_permission.news_updateall" @click="update_news(item.id)" class="icon-note icons actn"> </i>
                        <i v-if="auth_permission.news_delete || auth_permission.news_deleteall" @click="delete_news(item.id)" class="icon-trash icons   actn"> </i>
                    </td>
                </tr>
            </tbody>
        </table>
        <Loader v-if="loading"></Loader>
    </div>
</template>
<script>
import Loader from '@/views/common/Loader'
import {mapGetters} from "vuex"
export default {
    name:'ScheduledNews',
    components:{Loader},
    data(){
        return {
            loading: false ,
        }
    },
    computed:{
        ...mapGetters(['auth_permission','news_list'])
    },
    mounted(){
        this.getNewsList()
    },
    methods:{
          
         goToUpdateNews: function(arg){
            this.$router.push({name:'UpdateNews',params:{id:arg}})
        },
        update_news: function(id){
            this.goToUpdateNews(id)
            // this.$store.dispatch('NEWS_DETAIL',id).then(response=>{
            //     this.goToUpdateNews()
            // }).catch(error=>{
            //     this.$iziToast.error({position:'topRight',title:'Error',message:"Something went Wrong !!"})       

            // })
        },
        delete_news: function(id){
           
            this.$store.dispatch('DELETE_NEWS',id).then(response=>{
                this.getNewsList()
                this.$iziToast.success({position:'topRight',title:'Error',message:"news deleted"})       
            }).catch(error=>{
                this.loading = false
                this.$iziToast.error({position:'topRight',title:'Error',message:"news not deleted"})       

            })
        },       
        getNewsList: function(){
            // todos  
            this.loading = true
           // start loading
            this.$store.dispatch('FETCH_NEWS').then(response=>{
                // stop loading
                this.loading = false
            }).catch(error=>{
                // stop loading
                this.loading = false 
            })
        }
    },
}
</script>