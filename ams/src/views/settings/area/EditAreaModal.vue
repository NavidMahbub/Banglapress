<template>
  <b-modal title="Area" hide-footer size="lg" v-model="largeModal" @ok="largeModal = false">
        <form @submit.prevent="updateArea" >

            <b-row>
              <b-col sm="12">
                <b-card>
                  <div slot="header">
                    <strong>Area </strong> <small>Form</small>
                  </div>
                  <b-row>
                    <b-col sm="6">
                      <b-form-group>
                        <label for="Area">Area</label>
                        <b-form-input type="text" name="Area" id="area" v-model="editArea.title" v-validate="'required'" placeholder="Enter title..."></b-form-input>
                        <div  class="help-block alert alert-danger">
                        {{ errors.first('Area') }}
                        </div>
                      </b-form-group>
                    </b-col>

                  </b-row>
                  <b-row>
                    <b-col sm="6">
                      <label for="Parent">Parent</label>
                        <div class="input-group">
                            <select name="Parent" v-model="editArea.parent_id"  id="parent" class="form-control" >
                                <option value="" >Select Parent</option>
                                <option v-for="(area,index) in areas" :key="index" :value="area.id">{{area.title}}</option>
                            </select>

                        </div>
                    </b-col>

                  </b-row>
                </b-card>
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

import { UPDATE_AREA,ADD_AREA} from "@/store/action.type"
// import { ADD_CONTACT_LOADER} from "../../store/mutation.type"
import { mapState,mapGetters } from "vuex"

export default {
    data(){
        return{
            largeModal:false,
            addLoader:false,
            editArea: {
                title: '',
                parent_id: '',
                area_id:''
            }

        }
    },
    methods:{

       updateArea(){
            this.addLoader = true;
            var data = this.editArea
            var index = this.index
            this.$store.dispatch('UPDATE_AREA',{data,index})
            .then(response=>{
                this.addLoader = false;
                this.largeModal = false
                this.$iziToast.success({position:'topRight',title:'Ok',message:"Area Updated Successsfully"})

            })
            .catch(error=>{
                this.addLoader = false;
                this.$iziToast.error({position:'topRight',title:'Error',message:"Something Wrong !!"})
            });
        },

        openModal(area,index){
            this.largeModal = true
            this.index = index
            this.editArea.title =area.title
            this.editArea.parent_id =area.parent_id
            this.editArea.area_id =area.id
        },
        close(){
            this.largeModal = false
        },

    },
    computed: {
      ...mapGetters(["areas","areaP2"]),
    },

}
</script>

<style>

</style>
