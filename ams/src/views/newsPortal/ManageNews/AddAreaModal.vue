<template>
    <b-modal title="News Post" hide-footer size="xl" v-model="largeModal" @ok="largeModal = false">
        <form @submit.prevent="addArea" >

            <b-row>
              <b-col sm="12">
                <b-card>
                  <div slot="header">
                    <strong>Create </strong> <small>News Post
                    <button type="button" class="btn btn-primary" @click="$parent.ContentManagerModal">
                      Content Manager
                    </button>
                    </small>
                  </div>
                  <b-row>
                    <b-col sm="6">
                      <b-form-group>
                        <label for="Title">Shoulder</label>
                        <b-form-input type="text" name="Title" id="Title" v-model="newArea.title" v-validate="'required'" placeholder="Enter Shoulder..."></b-form-input>
                        <div v-show="errors.has('Title')" class="help-block alert alert-danger">
                        {{ errors.first('Title') }}
                        </div>
                      </b-form-group>
                    </b-col>
                    <b-col sm="6">
                      <b-form-group>
                        <label for="Title">Share at</label>
                        <b-form-input type="date" name="Title" id="Title" v-model="newArea.title" v-validate="'required'" placeholder="Enter Shoulder..."></b-form-input>
                        <div v-show="errors.has('Title')" class="help-block alert alert-danger">
                        {{ errors.first('Title') }}
                        </div>
                      </b-form-group>
                    </b-col>
                  </b-row>
                  <b-row>
                    <b-col sm="6">
                      <b-form-group>
                        <label for="Title">Headline</label>
                        <b-form-input type="text" name="Title" id="Title" v-model="newArea.title" v-validate="'required'" placeholder="Enter Shoulder..."></b-form-input>
                        <div v-show="errors.has('Title')" class="help-block alert alert-danger">
                        {{ errors.first('Title') }}
                        </div>
                      </b-form-group>
                    </b-col>
                    <b-col sm="6">
                      <b-form-group>
                        <label for="Title">Published at</label>
                        <b-form-input type="date" name="Title" id="Title" v-model="newArea.title" v-validate="'required'" placeholder="Enter Shoulder..."></b-form-input>
                        <div v-show="errors.has('Title')" class="help-block alert alert-danger">
                        {{ errors.first('Title') }}
                        </div>
                      </b-form-group>
                    </b-col>
                  </b-row>

                   <b-row>
                    <b-col sm="6">
                      <b-form-group>
                        <label for="Title">Hanger</label>
                        <b-form-input type="text" name="Title" id="Title" v-model="newArea.title" v-validate="'required'" placeholder="Enter Shoulder..."></b-form-input>
                        <div v-show="errors.has('Title')" class="help-block alert alert-danger">
                        {{ errors.first('Title') }}
                        </div>
                      </b-form-group>
                    </b-col>
                    <b-col sm="6">
                      <b-form-group>
                        <label for="Title">Status</label> <br>
                        <label class="switch switch-pill switch-label switch-primary">
                          <input type="checkbox" class="switch-input" checked>
                          <span class="switch-slider" data-checked="On" data-unchecked="Off"></span>
                        </label>

                      </b-form-group>
                    </b-col>
                  </b-row>
                  <b-row>
                    <b-col sm="6">
                      <b-form-group>
                        <label for="Title">Reporter</label>
                        <b-form-input type="text" name="Title" id="Title" v-model="newArea.title" v-validate="'required'" placeholder="Enter Reporter..."></b-form-input>
                        <div v-show="errors.has('Title')" class="help-block alert alert-danger">
                        {{ errors.first('Title') }}
                        </div>
                      </b-form-group>
                    </b-col>
                    <b-col sm="6">
                      <b-form-group>
                        <label for="Title">Instant article</label> <br>
                        <label class="switch switch-pill switch-label switch-primary">
                          <input type="checkbox" class="switch-input" checked>
                          <span class="switch-slider" data-checked="On" data-unchecked="Off"></span>
                        </label>

                      </b-form-group>
                    </b-col>
                  </b-row>
                  <b-row>
                    <b-col sm="6">
                      <b-form-group>
                        <label for="Parent">Author</label>
                        <div class="input-group">
                            <select name="Parent" v-model="newArea.parent_id"  id="parent" class="form-control" >
                                <option value="" >Select Parent</option>
                                <option v-for="(area,index) in areas" :key="index" :value="area.id">{{area.title}}</option>
                            </select>

                        </div>

                      </b-form-group>


                    </b-col>
                    <b-col sm="6">
                      <b-form-group>
                        <label for="Title">Topic</label>
                        <b-form-input type="text" name="Title" id="Title" v-model="newArea.title" v-validate="'required'" placeholder="Enter Topic..."></b-form-input>
                        <div v-show="errors.has('Title')" class="help-block alert alert-danger">
                        {{ errors.first('Title') }}
                        </div>
                      </b-form-group>
                    </b-col>
                  </b-row>
                  <b-row>
                    <b-col sm="6">
                      <b-form-group>
                        <label for="Parent">User</label>
                        <div class="input-group">
                            <select name="Parent" v-model="newArea.parent_id"  id="parent" class="form-control" >
                                <option value="" >Select Parent</option>
                                <option v-for="(area,index) in areas" :key="index" :value="area.id">{{area.title}}</option>
                            </select>

                        </div>

                      </b-form-group>


                    </b-col>
                    <b-col sm="6">
                      <b-form-group>
                        <label for="Title">Category</label>
                        <b-form-input type="text" name="Title" id="Title" v-model="newArea.title" v-validate="'required'" placeholder="Enter Category..."></b-form-input>
                        <div v-show="errors.has('Title')" class="help-block alert alert-danger">
                        {{ errors.first('Title') }}
                        </div>
                      </b-form-group>
                    </b-col>
                  </b-row>
                  <b-row>
                    <b-col sm="6">
                      <b-form-group>
                        <label for="Title">Content</label>
                        <b-form-input type="text" name="Title" id="Title" v-model="newArea.title" v-validate="'required'" placeholder="Enter Content..."></b-form-input>
                        <div v-show="errors.has('Title')" class="help-block alert alert-danger">
                        {{ errors.first('Title') }}
                        </div>
                      </b-form-group>

                    </b-col>
                    <b-col sm="6">
                      <b-form-group>
                        <label for="Title">Area</label>
                        <div class="input-group">
                            <select name="Parent" v-model="newArea.parent_id"  id="parent" class="form-control" >
                                <option value="" >Select Area</option>
                                <option v-for="(area,index) in areas" :key="index" :value="area.id">{{area.title}}</option>
                            </select>

                        </div>
                      </b-form-group>
                    </b-col>
                  </b-row>
                  <b-row>
                    <b-col sm="6">
                      <b-form-group>
                        <label for="Title">Position</label>
                        <div class="input-group">
                            <select name="Parent" v-model="newArea.parent_id"  id="parent" class="form-control" >
                                <option value="" >Select Position</option>
                                <option v-for="(area,index) in areas" :key="index" :value="area.id">{{area.title}}</option>
                            </select>

                        </div>
                      </b-form-group>

                    </b-col>
                    <b-col sm="6">
                      <b-form-group>
                        <label for="Title">Scroll</label>
                        <div class="input-group">
                            <select name="Parent" v-model="newArea.parent_id"  id="parent" class="form-control" >
                                <option value="" >Select Scroll</option>
                                <option v-for="(area,index) in areas" :key="index" :value="area.id">{{area.title}}</option>
                            </select>

                        </div>
                      </b-form-group>
                    </b-col>
                  </b-row>
                  <b-row>
                    <b-col sm="4">
                      <b-form-group>
                        <label for="Title">Tags</label>
                        <b-form-input type="text" name="Title" id="Title" v-model="newArea.title" v-validate="'required'" placeholder="Enter Tags..."></b-form-input>
                        <div v-show="errors.has('Title')" class="help-block alert alert-danger">
                        {{ errors.first('Title') }}
                        </div>
                      </b-form-group>
                    </b-col>
                    <b-col sm="4">
                      <b-form-group>
                        <label for="Title">Showing Empty list</label> <br>
                        <b-form-input type="text" name="Title" id="Title" v-model="newArea.title" v-validate="'required'" placeholder="Enter ..."></b-form-input>
                        <div v-show="errors.has('Title')" class="help-block alert alert-danger">
                        {{ errors.first('Title') }}
                        </div>

                      </b-form-group>
                    </b-col>
                  </b-row>

                   <b-row>
                    <b-col sm="8">
                      <b-form-group>
                        <label for="Title">Image</label>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Select</span>
                          </div>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01">
                            <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>
                          </div>
                        </div>
                        <div v-show="errors.has('Title')" class="help-block alert alert-danger">
                        {{ errors.first('Title') }}
                        </div>
                      </b-form-group>
                    </b-col>
                  </b-row>

                  <b-row>
                    <b-col sm="6">
                      <b-form-group>
                        <label for="Title">Video Url


                           <a href="#"  class="list-icons-item text-danger-600" data-toggle="modal" data-target="#content_manager"  v-b-tooltip.hover title="manage images" style="margin-left:1px;margin-right:1px;"><i class="fas fa-file-image"></i>Content Manager</a>
                        </label>
                        <b-form-input type="text" name="Title" id="Title" v-model="newArea.title" v-validate="'required'" placeholder="Enter Url..."></b-form-input>
                        <div v-show="errors.has('Title')" class="help-block alert alert-danger">
                        {{ errors.first('Title') }}
                        </div>
                      </b-form-group>
                    </b-col>
                    <b-col sm="6">
                      <b-form-group>
                        <label for="Title">Video position</label> <br>
                        <div class="input-group">
                            <select name="Parent" v-model="newArea.parent_id"  id="parent" class="form-control" >
                                <option value="" >Select</option>
                                <option v-for="(area,index) in areas" :key="index" :value="area.id">{{area.title}}</option>
                            </select>

                        </div>

                      </b-form-group>
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

import { ADD_AREA,All_AREA} from "@/store/action.type"
// import { ADD_CONTACT_LOADER} from "../../store/mutation.type"
import { mapState,mapGetters } from "vuex"

export default {
    data(){
        return{
            largeModal:false,
            addLoader:false,
            newArea: {
                title: '',
                parent_id: ''
            },

        }
    },
    methods:{

      addArea () {
            this.$validator.validateAll().then( result =>{
                if(result){
                    var data = this.newArea
                    this.addLoader = true
                    this.$store.dispatch('ADD_AREA',data)
                    .then(response=>{
                        this.addLoader = false;
                        this.largeModal = false
                        this.$iziToast.success({position:'topRight',title:'Ok',message:"Area Added Successsfully"})

                    })
                    .catch(error=>{
                        this.addLoader = false;
                        this.$iziToast.error({position:'topRight',title:'Error',message:"Something Wrong !!"})
                    });
                }

            })

        },

        openModal(){
            this.largeModal = true
            this.newArea.title =''
            this.newArea.parent_id =''
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
      ...mapGetters(["areas","areaP2"]),
    },

}
</script>

