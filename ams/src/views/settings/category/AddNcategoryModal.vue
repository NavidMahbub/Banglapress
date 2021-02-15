<template>
    <b-modal title="Category" hide-footer size="lg" v-model="largeModal" @ok="largeModal = false">
       
        <form @submit.prevent="addCategory" >
          <div class="container">
            <b-row>
              <b-col sm="12">
                <!-- <b-card> -->
                  <!-- <div slot="header">
                    <strong>Category </strong> <small>Form</small>
                  </div> -->
                  <b-row>
                    <b-col sm="12">
                      <b-form-group>

                        <div class="row">
                          <div class="col-md-3">
                            <label for="Title">Display Name*</label>
                          </div>

                          <div class="col-md-7">
                        <b-form-input type="text" name="Title"  v-model="newCategory.display_name" v-validate="'required'" placeholder=""></b-form-input>
                          </div>
                        </div>

                        <br/>

                        <div class="row">
                          <div class="col-md-3">
                            <label for="Title">Title*</label>
                          </div>

                          <div class="col-md-7">
                            <b-form-input type="text" name="Title"  v-model="newCategory.title" v-validate="'required'" placeholder=""></b-form-input>
                          </div>
                        </div>

                        <br/>
                        <div class="row">
                          <div class="col-md-3">
                            <label for="Title">Color</label>
                          </div>

                          <div class="col-md-6">
                            <b-form-input type="text" name="Title"  v-model="newCategory.color" v-validate="'required'" placeholder=""></b-form-input>
                          </div>
                          <div class="col-md-1">
                            <b-form-input type="text" name="Title"  v-model="newCategory.color" v-validate="'required'" placeholder=""></b-form-input>
                            <!-- <ColorPicker :width="300" :height="300" :disabled="false" startColor="#ff0000"></ColorPicker> -->
                          </div>
                        </div>

                         <br/>

                        <div class="row">
                          <div class="col-md-3">
                            <label for="Parent">Parent*</label>
                          </div>

                          <div class="col-md-7">
                            <Treeselect v-model="selected_parent" :options="category_parents.filter( v=> v.id!=item_id)" ></Treeselect>
                          </div>
                        </div>


                        <br/>

                        <div class="row">
                          <div class="col-md-3">
                            <label for="Parent">Header Display*</label>
                          </div>

                          <div class="col-md-7">
                            <select
                              class="form-control"
                              id="exampleFormControlSelect2"
                              v-model="newCategory.header_display"
                            >
                            
                              <option>Yes</option>
                              <option>No</option>
                              
                            </select>
                          </div>
                        </div>




                        <br/>

                        <div class="row">
                          <div class="col-md-3">
                            <label for="Parent">Home Dispaly*</label>
                          </div>

                          <div class="col-md-7">
                            <select
                              class="form-control"
                              id="exampleFormControlSelect2"
                              v-model="newCategory.home_display"
                            >
                            
                              <option>Yes</option>
                              <option>No</option>
                              
                            </select>
                          </div>
                        </div>



                        <br/>

                        <div class="row">
                          <div class="col-md-3">
                            <label for="Parent">Menubar Dispaly*</label>
                          </div>

                          <div class="col-md-7">
                            <select
                              class="form-control"
                              id="exampleFormControlSelect2"
                              v-model="newCategory.menubar_display"
                            >
                            
                              <option>Yes</option>
                              <option>No</option>
                              
                            </select>
                          </div>
                        </div>



                        <br/>

                        <div class="row">
                          <div class="col-md-3">
                            <label for="Parent">Photo Dispaly*</label>
                          </div>

                          <div class="col-md-7">
                            <select
                              class="form-control"
                              id="exampleFormControlSelect2"
                              v-model="newCategory.photo_display"
                            >
                            
                              <option>Yes</option>
                              <option>No</option>
                              
                            </select>
                          </div>
                        </div>


                        <br/>

                        <div class="row">
                          <div class="col-md-3">
                            <label for="Parent">Video Dispaly*</label>
                          </div>

                          <div class="col-md-7">
                            <select
                              class="form-control"
                              id="exampleFormControlSelect2"
                              v-model="newCategory.video_display"
                            >
                            
                              <option>Yes</option>
                              <option>No</option>
                              
                            </select>
                          </div>
                        </div>



                        <br/>

                        <div class="row">
                          <div class="col-md-3 ">
                            <label for="Parent">Status*</label>
                          </div>

                          <div class="col-md-7">
                            <select
                              class="form-control"
                              id="exampleFormControlSelect2"
                              v-model="newCategory.status"
                            >
                          
                              <option>Active</option>
                              <option>Inactive</option>
                              
                            </select>
                          </div>
                        </div>



                        <!-- {{newCategory}} -->



                

                        <div v-show="errors.hasOwnProperty('title')" class="help-block alert alert-danger">
                        <!-- {{  errors[`title`] }} -->
                          <p v-for="(i,k) in errors[`title`]" :key="k">
                            {{i.replace(`title`,`name`)}}
                          </p>
                        </div>
                      </b-form-group>
                    </b-col>
                  </b-row>
                  <!-- <b-row>
                    <b-col sm="12">
                      <b-form-group>

                        <br/>

                        <div class="row">
                          <div class="col-md-2">
                            <label for="Parent">Parent*</label>
                          </div>

                          <div class="col-md-7">
                            <Treeselect v-model="selected_parent" :options="category_parents.filter( v=> v.id!=item_id)" ></Treeselect>
                          </div>
                        </div>
                 
                      </b-form-group>                    
                    </b-col>
                  </b-row> -->
                <!-- </b-card> -->
              </b-col>
            </b-row>
            <div class="form-group row">
                <div class="col-sm-12">
                <input v-if="!addLoader" type="submit" value="Submit" class="btn btn-primary pull-right"/>
                <button v-if="addLoader" class="btn btn-primary pull-right" type="button" disabled>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Submitting...
                </button>
                <button v-if="!addLoader"  @click.prevent="close" class="btn btn-success pull-right" style="margin-right:5px;">Close</button>
                </div>
            </div>
            </div>
        </form>
    </b-modal>
</template>

<script>
import Vue from 'vue'
import VeeValidate from 'vee-validate';
Vue.use(VeeValidate)

import { ADD_NCATEGORY,All_NCATEGORY} from "@/store/action.type"
// import { ADD_CONTACT_LOADER} from "../../store/mutation.type"
import { mapState,mapGetters } from "vuex"
import Treeselect from '@riophae/vue-treeselect'
import '@riophae/vue-treeselect/dist/vue-treeselect.css'
import ColorPicker from 'vue-color-picker-wheel'
export default {
    components:{Treeselect,
    ColorPicker},
    
    data(){
        return{
            errors:{},
            update:false ,
            item_id : '',
            selected_parent:null,
            largeModal:false,
            addLoader:false,

            newCategory: {
              display_name:'',
              title: '',
              color:'',
              parent_id: '',
              header_display: 'Yes',
              home_display:'Yes',
              menubar_display:'Yes',
              photo_display:'Yes',
              video_display:'Yes',
              status:'Active'      
            },
    
        }
    },
    methods:{

        addCategory(){

          this.addLoader = true  
          if(this.update){
            this.newCategory.parent_id = this.selected_parent 
            let payload = {
              data : this.newCategory,
              id   : this.item_id ,
            }
            this.$store.dispatch('UPDATE_CATEGORY',payload).then(response=>{
              
              this.$parent.getCategories()
              this.addLoader = false
            }).catch(error=>{
              this.errors = error.response.data.errors
              this.addLoader = false
              this.error_list = error.data
            })
          }else{
            this.newCategory.parent_id = this.selected_parent
            
            //console.log(this.newCategory)
            this.$store.dispatch('ADD_CATEGORY',this.newCategory).then(response=>{
              this.$parent.getCategories()
              this.addLoader = false
            }).catch(error=>{
              console.log(error.response.data.errors)
              this.errors = error.response.data.errors
              this.addLoader = false 
              this.error_list = error
      
            })

          }


          // this.newCategory.display_name=''
          // this.newCategory.title=''
          // this.newCategory.color=''
          // this.newCategory.parent_id=''
          // this.newCategory.photo_display='Yes'
          // this.newCategory.video_display='Yes'
          // this.newCategory.header_display='Yes'
          // this.newCategory.home_display='Yes'
          // this.newCategory.status=''
          // this.newCategory.menubar_display='Yes'
          
        },
        openModal(){
            this.largeModal = true
            // clear errors 
            this.errors = {}
            if(!this.update){
              this.newCategory.title =''
              this.newCategory.parent_id =''
              this.newCategory.display_name =''
              this.newCategory.color =''
              this.newCategory.header_display ='Yes'
              this.newCategory.home_display ='Yes'
              this.newCategory.menubar_display ='Yes'
              this.newCategory.photo_display ='Yes'
              this.newCategory.video_display ='Yes'
              this.newCategory.status ='Active'
            }
        },
        close(){
            this.largeModal = false
        },

        addButton () {
        this.line.buttons.push({
          name: '',
          state: false,
          is_reported: ''
        })
      },
      deleteButton (index) {
        this.line.buttons.splice(index, 1)
      },


    },
    computed: {
      ...mapGetters(["category_list","category_parents","ncategoryP2"]),
    },

}
</script>

<style>

</style>
