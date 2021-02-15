<template>
  <div>

    <b-button v-if="auth_permission.user_create" @click="add_user">new user </b-button>
    <div class="card">
         <table class="table table-sm">
             <thead>
                 <tr>
                     <th>#</th>
                     <th>name</th>
                     <th>role</th>
                     <th>actions</th>
                 </tr>
             </thead>
             <tbody v-if="auth_permission.user_view || auth_permission.user_viewall">
                 <tr v-for="(item,key) in user_list" :key="key">
                     <td>{{key + 1}}</td>
                     <td>{{item.name}}</td>
                     <td>{{item.role ? item.role.name : null}}</td>
                     <td>
                        <i v-if="auth_permission.user_update || auth_permission.user_updateall" @click="update_user(item.id)" class="icon-note icons actn"> </i>
                        <i v-if="auth_permission.user_delete || auth_permission.user_deleteall" @click="delete_user(item.id)" class="icon-trash icons   actn"> </i>
                     </td>
                 </tr>
             </tbody>
         </table>   
         <AddUser ref="add_user"></AddUser>        
        <Loader v-if="loading"></Loader>
    </div>
  </div>
</template>
<script>
import AddUser from "./AddUser"
import Loader from '@/views/common/Loader'
import { mapGetters } from 'vuex'
export default {
    components:{Loader,AddUser},
    data(){
        return{
            loading:false ,
        }
    },
    computed:{
        ...mapGetters(['auth_permission','user_list'])
    },
    mounted(){
        this.getUserList()
    },
    methods:{
        
        update_user(id){
            console.log('update')
            this.$refs.add_user.OpenModal()
            this.$store.dispatch('GET_USER_DETAIL',id)
            this.$refs.add_user.is_update = true 
        },
        add_user(){
            this.$refs.add_user.OpenModal()
            this.$store.dispatch('EMPTY_USER')
            this.$refs.add_user.is_update = false 
        },

        delete_user(id){
            this.$store.dispatch('DELETE_USER',id).then(Response=>{
               this.getUserList()
                this.$iziToast.success({position:'topRight',title:'Ok',message:"User Deleted"})                
            }).catch(error=>{
                this.$iziToast.error({position:'topRight',title:'Ok',message:"User Not Deleted"})                
            })
        },
        getUserList(){
            this.loading = true 
            this.$store.dispatch('FETCH_USER_LIST').then(response=>{
                this.loading = false 
            }).catch(error=>{
                this.loading = false 
            })
        }
    },
}
</script>