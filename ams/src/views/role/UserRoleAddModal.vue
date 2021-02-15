<template>
    <b-modal title="Role" no-close-on-backdrop hide-footer size="xl"  v-model="largeModal" @ok="largeModal = false">
        <!-- <form @submit.prevent="addRole" > -->
            <!-- {{get_permission}} -->
            <div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Role Name</label>
                    <div class="col-sm-10">
                    <input name="Name" v-validate="'required'" v-model="get_permission.role_name" type="text" class="form-control" id="inputPassword3" placeholder="Roll Name">
                  
                    <div v-show="errors.hasOwnProperty('name')" class="help-block alert alert-danger">
                        <p v-for="(i,k) in errors[`name`]" :key="k">
                            {{i}}
                        </p>
                    </div> 

                    </div>
                </div>
            </div>
             <div>
            <!-- <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" :class="this.tab==1?'active':''" @click="tabswitching(1)"><i class="fas fa-info-circle"></i><span>Other's</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" :class="this.tab==2?'active':''" @click="tabswitching(2)"><i class="fas fa-graduation-cap"></i><span>Recuiting</span></a>
                </li>
            </ul> -->
        </div>
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col">Module</th>
                        <th scope="col">View</th>
                        <th scope="col">View All</th>
                        <th scope="col">Create</th>
                        <th scope="col">Update</th>
                        <th scope="col">Update All</th>
                        <th scope="col">Delete</th>
                        <th scope="col">Delete All</th>
                    </tr>
                </thead>
                <tbody >
                    <tr >
                        <td>Category</td>
                        <td ><c-switch  class="mx-1" color="info" label outline="alt" variant="pill" v-model="get_permission.category_view"  /></td>
                        <td ><c-switch  class="mx-1" color="info" label outline="alt" variant="pill" v-model="get_permission.category_viewall"  /></td>
                        <td><c-switch class="mx-1" color="info"  label outline="alt" variant="pill"  v-model="get_permission.category_create"  /></td>
                        <td><c-switch class="mx-1" color="info"  label outline="alt" variant="pill"  v-model="get_permission.category_update" /></td>
                        <td><c-switch class="mx-1" color="info"  label outline="alt" variant="pill"  v-model="get_permission.category_updateall" /></td>
                        <td><c-switch class="mx-1" color="info"  label outline="alt" variant="pill"  v-model="get_permission.category_delete"  /></td>
                        <td><c-switch class="mx-1" color="info"  label outline="alt" variant="pill"  v-model="get_permission.category_deleteall"  /></td>
                    </tr>
                    <tr >
                        <td>Topic</td>
                        <td ><c-switch  class="mx-1" color="info" label outline="alt" variant="pill" v-model="get_permission.topic_view"  /></td>
                        <td ><c-switch  class="mx-1" color="info" label outline="alt" variant="pill" v-model="get_permission.topic_viewall"  /></td>
                        <td><c-switch class="mx-1" color="info"  label outline="alt" variant="pill"  v-model="get_permission.topic_create"  /></td>
                        <td><c-switch class="mx-1" color="info"  label outline="alt" variant="pill"  v-model="get_permission.topic_update" /></td>
                        <td><c-switch class="mx-1" color="info"  label outline="alt" variant="pill"  v-model="get_permission.topic_updateall" /></td>
                        <td><c-switch class="mx-1" color="info"  label outline="alt" variant="pill"  v-model="get_permission.topic_delete"  /></td>
                        <td><c-switch class="mx-1" color="info"  label outline="alt" variant="pill"  v-model="get_permission.topic_deleteall"  /></td>
                    </tr>
                    <tr >
                        <td>Area</td>
                        <td ><c-switch  class="mx-1" color="info" label outline="alt" variant="pill" v-model="get_permission.area_view"  /></td>
                        <td ><c-switch  class="mx-1" color="info" label outline="alt" variant="pill" v-model="get_permission.area_viewall"  /></td>
                        <td><c-switch class="mx-1" color="info"  label outline="alt" variant="pill"  v-model="get_permission.area_create"  /></td>
                        <td><c-switch class="mx-1" color="info"  label outline="alt" variant="pill"  v-model="get_permission.area_update" /></td>
                        <td><c-switch class="mx-1" color="info"  label outline="alt" variant="pill"  v-model="get_permission.area_updateall" /></td>
                        <td><c-switch class="mx-1" color="info"  label outline="alt" variant="pill"  v-model="get_permission.area_delete"  /></td>
                        <td><c-switch class="mx-1" color="info"  label outline="alt" variant="pill"  v-model="get_permission.area_deleteall"  /></td>
                    </tr>
                    <tr >
                        <td>Scroll</td>
                        <td ><c-switch  class="mx-1" color="info" label outline="alt" variant="pill" v-model="get_permission.scroll_view"  /></td>
                        <td ><c-switch  class="mx-1" color="info" label outline="alt" variant="pill" v-model="get_permission.scroll_viewall"  /></td>
                        <td><c-switch class="mx-1" color="info"  label outline="alt" variant="pill"  v-model="get_permission.scroll_create"  /></td>
                        <td><c-switch class="mx-1" color="info"  label outline="alt" variant="pill"  v-model="get_permission.scroll_update" /></td>
                        <td><c-switch class="mx-1" color="info"  label outline="alt" variant="pill"  v-model="get_permission.scroll_updateall" /></td>
                        <td><c-switch class="mx-1" color="info"  label outline="alt" variant="pill"  v-model="get_permission.scroll_delete"  /></td>
                        <td><c-switch class="mx-1" color="info"  label outline="alt" variant="pill"  v-model="get_permission.scroll_deleteall"  /></td>
                    </tr>
                    <tr >
                        <td>News</td>
                        <td ><c-switch  class="mx-1" color="info" label outline="alt" variant="pill" v-model="get_permission.news_view"  /></td>
                        <td ><c-switch  class="mx-1" color="info" label outline="alt" variant="pill" v-model="get_permission.news_viewall"  /></td>
                        <td><c-switch class="mx-1" color="info"  label outline="alt" variant="pill"  v-model="get_permission.news_create"  /></td>
                        <td><c-switch class="mx-1" color="info"  label outline="alt" variant="pill"  v-model="get_permission.news_update" /></td>
                        <td><c-switch class="mx-1" color="info"  label outline="alt" variant="pill"  v-model="get_permission.news_updateall" /></td>
                        <td><c-switch class="mx-1" color="info"  label outline="alt" variant="pill"  v-model="get_permission.news_delete"  /></td>
                        <td><c-switch class="mx-1" color="info"  label outline="alt" variant="pill"  v-model="get_permission.news_deleteall"  /></td>
                    </tr>

                    <tr >
                        <td>Album</td>
                        <td ><c-switch  class="mx-1" color="info" label outline="alt" variant="pill" v-model="get_permission.album_view"  /></td>
                        <td ><c-switch  class="mx-1" color="info" label outline="alt" variant="pill" v-model="get_permission.album_viewall"  /></td>
                        <td><c-switch class="mx-1" color="info"  label outline="alt" variant="pill"  v-model="get_permission.album_create"  /></td>
                        <td><c-switch class="mx-1" color="info"  label outline="alt" variant="pill"  v-model="get_permission.album_update" /></td>
                        <td><c-switch class="mx-1" color="info"  label outline="alt" variant="pill"  v-model="get_permission.album_updateall" /></td>
                        <td><c-switch class="mx-1" color="info"  label outline="alt" variant="pill"  v-model="get_permission.album_delete"  /></td>
                        <td><c-switch class="mx-1" color="info"  label outline="alt" variant="pill"  v-model="get_permission.album_deleteall"  /></td>
                    </tr>

                    <tr >
                        <td>Role</td>
                        <td ><c-switch  class="mx-1" color="info" label outline="alt" variant="pill" v-model="get_permission.role_view"  /></td>
                        <td ><c-switch  class="mx-1" color="info" label outline="alt" variant="pill" v-model="get_permission.role_viewall"  /></td>
                        <td><c-switch class="mx-1" color="info"  label outline="alt" variant="pill"  v-model="get_permission.role_create"  /></td>
                        <td><c-switch class="mx-1" color="info"  label outline="alt" variant="pill"  v-model="get_permission.role_update" /></td>
                        <td><c-switch class="mx-1" color="info"  label outline="alt" variant="pill"  v-model="get_permission.role_updateall" /></td>
                        <td><c-switch class="mx-1" color="info"  label outline="alt" variant="pill"  v-model="get_permission.role_delete"  /></td>
                        <td><c-switch class="mx-1" color="info"  label outline="alt" variant="pill"  v-model="get_permission.role_deleteall"  /></td>
                    </tr>

                    <tr >
                        <td>User</td>
                        <td ><c-switch  class="mx-1" color="info" label outline="alt" variant="pill" v-model="get_permission.user_view"  /></td>
                        <td ><c-switch  class="mx-1" color="info" label outline="alt" variant="pill" v-model="get_permission.user_viewall"  /></td>
                        <td><c-switch class="mx-1" color="info"  label outline="alt" variant="pill"  v-model="get_permission.user_create"  /></td>
                        <td><c-switch class="mx-1" color="info"  label outline="alt" variant="pill"  v-model="get_permission.user_update" /></td>
                        <td><c-switch class="mx-1" color="info"  label outline="alt" variant="pill"  v-model="get_permission.user_updateall" /></td>
                        <td><c-switch class="mx-1" color="info"  label outline="alt" variant="pill"  v-model="get_permission.user_delete"  /></td>
                        <td><c-switch class="mx-1" color="info"  label outline="alt" variant="pill"  v-model="get_permission.user_deleteall"  /></td>
                    </tr>

                </tbody>
            </table>
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
        <!-- </form> -->
    </b-modal>
</template>

<script>
import { Switch as cSwitch } from '@coreui/vue'
import axios from 'axios'
import Vue from 'vue'
import VeeValidate from 'vee-validate';
Vue.use(VeeValidate)

import { ADD_USER_ROLE} from "../../store/action.type"
// import { ADD_CONTACT_LOADER} from "../../store/mutation.type"
import { mapState,mapGetters } from "vuex"

export default {
    data(){
        return{
            errors:{},
            is_update : false ,
            largeModal:false ,
            addLoader:false, 
        }
    },
    computed:{
        ...mapGetters(['get_permission'])
    },
    methods:{
        submit(){
            if(this.is_update){
              this.is_update = false 
              this.$store.dispatch('UPDATE_ROLE',this.get_permission).then(response=>{
                    this.$parent.getRoles()
                    this.$parent.emptyRole()
                    this.$iziToast.success({position:'topRight',title:'Success',message:"Role Added"})       
                }).catch(error=>{
                    this.errors = error.response.data.errors
                    this.$iziToast.error({position:'topRight',title:'Error',message:"Something Went Wrong !!"})       
                })
            }else{
                this.$store.dispatch('ADD_ROLE',this.get_permission).then(response=>{
                    this.$parent.getRoles()
                    this.$parent.emptyRole()
                    this.$iziToast.success({position:'topRight',title:'Success',message:"Role Added"})       
                }).catch(error=>{
                    this.errors = error.response.data.errors
                    this.$iziToast.error({position:'topRight',title:'Error',message:"Something Went Wrong !!"})       
                })
            }
        },
        OpenModal(){
            this.errors = {}
            this.largeModal = true 
            console.log('large modal')
        },
        tabswitching(val){
            this.tab = val;
        },
        openModal(){
            this.largeModal = true
        },
        close(){
            this.largeModal = false
        }

    },
    components:{
        cSwitch
    }
}
</script>

<style scoped>
.nav-tabs{
    width: 100%;
    margin: 5px 15px
}
.nav-link{
    cursor: pointer;
}
.nav-tabs li i{
    padding: 5px;
}
.nav-tabs li a{
    color: #666666;
}
</style>
