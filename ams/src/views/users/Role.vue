<template>
    <div>
        <b-button @click="RoleAddOpen">ADD ROLE</b-button>
        <div class="card">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>name</th>
                        <th>actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item,key) in role_list" :key="key">
                        <td>{{key+1}}</td>
                        <td>{{item.name}}</td> 
                      <td>
                            <i  @click="update_role(item.id)" class="icon-note icons actn"> </i>
                            <i  @click="delete_role(item.id)" class="icon-trash icons   actn"> </i>
                      </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <Loader v-if="loading"></Loader>
        <RoleAddModal ref="role_add_modal"></RoleAddModal>
    </div>
</template>
<script>
import Loader from '@/views/common/Loader'
import {mapGetters} from "vuex"
import RoleAddModal from "./UserRoleAddModal"
export default {
    components:{RoleAddModal,Loader},
    data(){
        return{
            loading:false ,
        }
    } ,
    mounted(){
        this.getRoles()
    },
    computed:{
        ...mapGetters(['role_list'])
    },
    methods:{
        update_role(id){
            this.$store.dispatch('FETCH_ROLE_DETAIL',id)
            this.$refs.role_add_modal.is_update = true 
            this.RoleAddOpen()
        },
        delete_role(id){
            this.$store.dispatch('DELETE_ROLE',id).then(response=>{
                this.getRoles()
                this.$iziToast.success({position:'topRight',title:'Ok',message:"Role Added Successsfully"})                
            }).catch(error=>{
                this.$iziToast.error({position:'topRight',title:'Ok',message:"something went wron !!"})
            })
        },
        getRoles(){
            this.loading = true 
            this.$store.dispatch('FETCH_ROLES').then(response=>{
                this.loading = false
            }).catch(error=>{
                this.loading = false
            })
        },
        RoleAddOpen(){
            this.$refs.role_add_modal.OpenModal()
        },
        emptyRole(){
            this.$refs.role_add_modal.is_update = false
            this.$store.dispatch('EMPTY_ROLE')
        }
    }
}
</script>