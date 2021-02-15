<template>
    <b-modal title="Scroll" hide-footer size="lg" v-model="largeModal" @ok="largeModal = false">
       
        <form @submit.prevent="addScroll" >
          
            <b-row>
              <b-col sm="12" class="container">
                <!-- <b-card> -->               
                  <b-row>
                    <b-col sm="12">
                      <b-form-group>
                        <label for="Title">Name</label>
                        <b-form-input type="text" name="Title"  v-model="newScroll.title" v-validate="'required'" placeholder="Enter name..."></b-form-input>
                        <!-- <div  class="help-block alert alert-danger">
                        {{ errors.first('Title') }}
                        </div> -->
                        <div v-show="errors.hasOwnProperty('title')" class="help-block alert alert-danger">
                        <!-- {{  errors[`title`] }} -->
                          <p v-for="(i,k) in errors[`title`]" :key="k">
                            {{i.replace(`title`,`name`)}}
                          </p>
                        </div>
                      </b-form-group>
                    </b-col>
                  </b-row>
                  <b-row>
                    <b-col sm="12">
                      <b-form-group>
                        <label for="Parent">Parent</label>
                        <!-- <div class="input-group">
                            <select name="Parent" v-model="newNcategory.parent_id"  id="parent" class="form-control" >
                                <option value="" >Select Parent</option>
                                <option v-for="(ncategory,index) in category_list" :key="index" :value="ncategory.id">{{ncategory.title}}</option>
                            </select>

                        </div> -->
                        <Treeselect v-model="selected_parent" :options="scroll_parents.filter( v=> v.id!=item_id)" ></Treeselect>
                      </b-form-group>                     
                    </b-col>
                  </b-row>
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
        </form>
    </b-modal>
</template>


<script>
import Vue from 'vue'
import VeeValidate from 'vee-validate';
Vue.use(VeeValidate)
import { mapState,mapGetters } from "vuex"
import Treeselect from '@riophae/vue-treeselect'
import '@riophae/vue-treeselect/dist/vue-treeselect.css'
export default {
    components:{Treeselect},
    data(){
        
        return{
            errors:{},
            largeModal:false,
            addLoader:false,
            update: false ,
            item_id:'',
            selected_parent:null,
            newScroll: {
                title: '',
                parent_id: ''
            },

        }
    },
    methods:{

      addScroll () {
            this.addLoader=true
            if(this.update){
              //this.newScroll.parent_id = this.parent_id 
                let payload = {
                  data : this.newScroll ,
                  id   : this.item_id, 
                }
                this.$store.dispatch('UPDATE_SCROLL',payload).then(response=>{
                  this.$parent.getScrolls()
                }).catch(error=>{
                  this.errors = error.response.data.errors
                })
            }else{
                this.$store.dispatch('ADD_SCROLL',this.newScroll).then(response=>{
                  this.$parent.getScrolls()
                }).catch(error=>{
                   this.errors = error.response.data.errors
                })  
            }
            this.addLoader=false

        },
        close(){
            this.largeModal = false
        },

        openModal(){
            this.errors = {}
            this.largeModal = true
            if(!this.update){              
                this.newScroll.title =''
                this.newScroll.parent_id = '' 
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
      ...mapGetters(["scroll_list","scroll_parents"]),
    },

}
</script>

<style>

</style>
