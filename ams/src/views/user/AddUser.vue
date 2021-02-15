<template>
    <div>
    <b-modal title="User" no-close-on-backdrop hide-footer size="xl"  v-model="largeModal" @ok="largeModal = false">
        {{get_user.role_id}}
        <div class="row">
            <div class="col-sm-4">
                <label for="name">Name</label>
                <input v-model="get_user.name" name="name" type="text" class="form-control" placeholder="enter user name "/>

                <div v-show="errors.hasOwnProperty('name')" class="help-block alert alert-danger">
                    <p v-for="(i,k) in errors[`name`]" :key="k">
                        {{i}}
                    </p>
                </div>       

            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <label for="email">Email</label>
                <b-input v-model="get_user.email" name="email" type="text" placeholder="enter email"/>

                <div v-show="errors.hasOwnProperty('email')" class="help-block alert alert-danger">
                    <p v-for="(i,k) in errors[`email`]" :key="k">
                        {{i}}
                    </p>
                </div>            

            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <label for="email">User Role</label>
                <multiselect v-model="get_user.role" :options='role_list' track-by="id" label="name" ></multiselect>
                <!-- <p v-if="!get_user.name" style="color:red">*required</p>    -->
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <label for="email">Password</label>
                <b-input v-model="get_user.password" name="email" type="password" placeholder="enter password"/>
              
                <div v-show="errors.hasOwnProperty('password')" class="help-block alert alert-danger">
                    <p v-for="(i,k) in errors[`password`]" :key="k">
                        {{i}}
                    </p>
                </div>      

            </div>
            <div class="col-sm-4">
                <label for="email">type again</label>
                <b-input v-model="get_user.password2" name="email" type="password" placeholder=""/>

                 <div v-show="errors.hasOwnProperty('password2')" class="help-block alert alert-danger">
                    <p v-for="(i,k) in errors[`password2`]" :key="k">
                        {{i}}
                    </p>
                </div>     
                           
            </div>
        </div>
            <div class="form-group row">
                <div class="col-sm-12">
                <input v-if="!addLoader" @click="submit" type="submit" value="Submit" class="btn btn-primary pull-right"/>
                <button v-if="addLoader" class="btn btn-primary pull-right" type="button" disabled>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Submitting...
                </button>
                <button v-if="!addLoader"  @click.prevent="close" class="btn btn-success pull-right" style="margin-right:5px;">Close</button>
                </div>
            </div>

    </b-modal>
    </div>
</template>
<script>
import Multiselect from "vue-multiselect"
import {mapGetters} from "vuex" 
export default {
    components:{Multiselect},
    data(){
        return {
            errors:{},
            largeModal: false ,
            addLoader: false ,
            is_update: false ,
        }
    },
    computed:{
        ...mapGetters(['get_user','role_list'])
    },
    methods:{
        OpenModal(){
            this.largeModal = true 
        },
        submit(){
            if(this.is_update){
                this.addLoader = true 
                // let payload = {
                //     id : this.get_user.id ,
                //     data : this.get_user ,
                // }
                this.$store.dispatch('UPDATE_USER',this.get_user).then(response=>{
                        this.$iziToast.success({position:'topRight',title:'Success',message:"User Updated"})    
                        this.addLoader = false
                        this.$parent.getUserList()
    
                }).catch(error=>{
                       this.addLoader = false
                       this.errors = error.response.data.errors
                       this.$iziToast.error({position:'topRight',title:'Success',message:"User Not Updated"})       
                })
            }else{
                this.addLoader = true 
                this.$store.dispatch('ADD_USER',this.get_user).then(response=>{
                        this.$iziToast.success({position:'topRight',title:'Success',message:"User Added"})    
                        this.addLoader = false
                        this.$parent.getUserList()
    
                }).catch(error=>{
                       this.addLoader = false
                       this.errors = error.response.data.errors
                       this.$iziToast.error({position:'topRight',title:'Success',message:"error occured"})       
                })
            }
        },
        getRoles(){
            this.loading = true 
            this.$store.dispatch('FETCH_ROLES').then(response=>{
                this.loading = false
            }).catch(error=>{
                this.loading = false
            })
        },
        close(){
            this.largeModal = false 
        }
    },
    mounted(){
        this.getRoles()
    },

}
</script>