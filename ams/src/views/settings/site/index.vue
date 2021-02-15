<template>
    <div>      
     <div class="card">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(i,k) in site_list" :key="k">
                        <td>{{k+1}}</td>
                        <td>{{i.title}}</td>
                         <td>{{i.slug}}</td>
                            
                        <td>
                            <a href="#" @click="editSite(i)"><i class="fa fa-edit" style="font-size:18px"></i></a> 
                            <a href="#" @click="deleteSite(i)" ><i class="fa fa-trash" style="font-size:18px"></i></a> 
                        </td>
                      <!-- {{i.content}} -->
                    </tr>
                </tbody>
            </table>
           
        </div>
    </div>
</template>


<script>
import {mapGetters} from "vuex"
import AddSite from "./add.vue";
export default {

    components:{
        AddSite
    },
    data(){
        return {
        }
    },
    computed:{
        ...mapGetters(['site_list'])
    },
    mounted(){
        this.getSiteInfos()
    },
    methods:{
        getSiteInfos(){
            this.$store.dispatch(`FETCH_SITE_INFOS`).then(response=>{

            }).catch(error=>{

            })
        },

        deleteSite(site){
            let payload={
                id:site.id
            }
            console.log(site.id)
             this.$store.dispatch(`DELETE_SITE_INFO`,site.id).then(response=>{

            }).catch(error=>{

            })
            this.getSiteInfos()
        },
        
        editSite(site){
            
            this.$store.dispatch(`GET_SITE_DETAIL`,site.id).then(response=>{
                this.$router.push({path:'/site/add',params:site.id})
            })
            // this.$router.push({name:`Edit-Language`,params:{id}})
            // this.$store.dispatch(`UPDATE_SITE_INFO`,site).then(response=>{
            //     //this.$iziToast.success({position:'topRight',title:'Ok',message:"Site updated Successsfully"})
            // }).catch(error=>{

            // })
            // this.$router.push({name:`site-add`})
            this.getSiteInfos()
             
        }
    }
}
</script>
<style  scoped>

</style>


