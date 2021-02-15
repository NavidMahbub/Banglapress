<template>
  <b-modal title="Topic" hide-footer size="lg" v-model="largeModal" @ok="largeModal = false">
        <form @submit.prevent="updateTopic" >

            <b-row>
              <b-col sm="12">
                <b-card>
                  <div slot="header">
                    <strong>Topic </strong> <small>Form</small>
                  </div>
                  <b-row>
                    <b-col sm="6">
                      <b-form-group>
                        <label for="topic">Topic</label>
                        <b-form-input type="text" name="topic" id="topic" v-model="editTopic.title" v-validate="'required'" placeholder="Enter title..."></b-form-input>
                        
                          <!-- <div v-show="errors.hasOwnProperty('title')" class="help-block alert alert-danger">
                             {{  errors[`title`] }} -->
                            <!-- <p v-for="(i,k) in errors[`title`]" :key="k">
                              {{i}}
                            </p>
                          </div> --> 

                      </b-form-group>
                    </b-col>

                  </b-row>

                   <b-row>
                    <b-col sm="6">
                      <label for="Parent">Parent</label>
                        <div class="input-group">
                            <select name="Parent" v-model="editTopic.parent_id"  id="parent" class="form-control" >
                                <option value="" >Select Parent</option>
                                <option v-for="(topic,index) in topic_list" :key="index" :value="topic.id">{{topic.label}}</option>
                            </select>

                        </div>
                    </b-col>

                  </b-row>


                  <!-- <b-row>
                    <b-col sm="6">
                      <b-form-group>
                        <label for="Status">Status</label>
                        <b-form-input type="text" name="Status" id="status" v-model="editTopic.status" v-validate="'required'" placeholder="Enter title..."></b-form-input>
                        <div v-show="errors.has('Status')" class="help-block alert alert-danger">
                        {{ errors.first('Status') }}
                        </div>
                      </b-form-group>
                    </b-col>

                  </b-row> -->
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

import { UPDATE_TOPIC,ADD_TOPIC} from "@/store/action.type"
import { mapState,mapGetters } from "vuex"

export default {

    data(){
        return{
          
            largeModal:false,
            addLoader:false,
            editTopic: {
                title: '',
                parent_id:'',
                id:''
            }

        }
    },
    methods:{

       updateTopic(){
            this.addLoader = true;
            var data = this.editTopic
            var id = this.editTopic.id
            this.$store.dispatch('UPDATE_TOPIC',{data,id})
            .then(response=>{
                this.addLoader = false;
                this.largeModal = false
                this.$iziToast.success({position:'topRight',title:'Ok',message:"Topic Updated Successsfully"})
                this.getAllTopics()
            })
            .catch(error=>{
                this.addLoader = false;
                this.$iziToast.error({position:'topRight',title:'Error',message:"Something Wrong !!"})
            });
        },

        getAllTopics(){
          this.$store.dispatch('FETCH_TOPICS').then(response=>{

          })
        },

        openModal(topic,index){
            this.largeModal = true
            this.index = index
            this.editTopic.title =topic.title
            this.editTopic.parent_id = topic.parent_id
            this.editTopic.topic_id=topic.id
        },
        close(){
            this.largeModal = false
        },

    },
    computed: {

      ...mapGetters(["topic_list", "topic_parents"]),

    },

}
</script>

<style>

</style>
