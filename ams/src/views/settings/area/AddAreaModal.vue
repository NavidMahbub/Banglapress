<template>
    <b-modal title="Area" hide-footer size="lg" v-model="largeModal" @ok="largeModal = false">
        <form @submit.prevent="addArea" >

            <b-row>
              <b-col sm="12">
                  <b-row>
                    <b-col sm="12">
                      <b-form-group>
                        <label for="Title">Name</label>
                        <b-form-input type="text" name="Title" id="Title" v-model="newArea.title" v-validate="'required'" placeholder="Enter name..."></b-form-input>
                          <div v-show="errors.hasOwnProperty('title')" class="help-block alert alert-danger">
                          <!-- {{  errors[`title`] }} -->
                            <p v-for="(i,k) in errors[`title`]" :key="k">
                              {{i}}
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
                            <select name="Parent" v-model="newArea.parent_id"  id="parent" class="form-control" >
                                <option value="" >Select Parent</option>
                                <option v-for="(area,index) in areas" :key="index" :value="area.id">{{area.title}}</option>
                            </select>

                        </div> -->
                        <Treeselect
                        v-model="newArea.parent_id"
                        :options="area_parents"
                        ></Treeselect> 
                      </b-form-group>
                    </b-col>
                  </b-row>
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

import { ADD_AREA,All_AREA} from "@/store/action.type"
// import { ADD_CONTACT_LOADER} from "../../store/mutation.type"
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
          newArea: {
              title: '',
              parent_id: ''
          },
        }
    },
    methods:{

      addArea () {
            
            if(this.update){
              let payload = {
                data : this.newArea ,
                id   : this.item_id, 
              }
              this.$store.dispatch('UPDATE_AREA',payload).then(response=>{
                this.$parent.getAreas()
              }).catch(error=>{
                this.errors = error.response.data.errors
              }) 
            }else{
                this.$store.dispatch('ADD_AREA',this.newArea).then(response=>{
                  this.$parent.getAreas()
                }).catch(error=>{
                  this.errors = error.response.data.errors
                })  
            }
        

        },

        openModal(){
            this.errors = {}
            this.largeModal = true
            if(!this.update){              
                this.newArea.title = null
                this.newArea.parent_id = null 
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
      ...mapGetters(["area_list","area_parents"]),
    },

}
</script>

<style>

</style>
