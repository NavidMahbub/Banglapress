<template>
    <b-modal title="Gallery" hide-footer size="lg" v-model="largeModal" @ok="largeModal = false">
        <div>

            <b-row>
              <b-col sm="12">
                <b-card>
                  <div slot="header">
                    <strong>Gallery </strong> <small>Form</small>
                  </div>
                  <b-row>
                    <b-col sm="12">
                      <b-form-group>
                        <label for="Title">Title</label>
                        <b-form-input type="text" name="Title" id="Title" v-model="newGallery.title" v-validate="'required'" placeholder="Enter Title..."></b-form-input>
                        <div v-show="errors.has('Title')" class="help-block alert alert-danger">
                        {{ errors.first('Title') }}
                        </div>
                      </b-form-group>
                    </b-col>
                  </b-row>
                  <b-row>
                    <b-col sm="12">
                      <b-form-group>
                        <label for="Cover">Cover</label>
                        <b-form-file name="Cover" id="cover" v-model="newGallery.cover" ></b-form-file>
                        <div v-show="errors.has('Cover')" class="help-block alert alert-danger">
                        {{ errors.first('Cover') }}
                        </div>
                      </b-form-group>
                    </b-col>
                  </b-row>
                  <br>
                    <button @click="add_more">More</button>
                   <!-- <div v-for="(gContent,key) in dynamicContents" v-bind:key="key" :title="gContent.caption" >
                          <GalleryContent :gContent="gContent" ></GalleryContent>
                  </div> -->
                  <div v-for="(item,item_key) in temp_arr  " :key="item_key">
                  <GalleryContent :item="item" :item_key="item_key"></GalleryContent>
                  <button @click="$delete(temp_arr, item_key)">remove</button>
                  </div>
                </b-card>
              </b-col>
            </b-row>
            <div class="form-group row">
                <div class="col-sm-12">
                <!-- <input type="submit" value="Next" class="btn btn-info pull-left" :disabled="{disabled}"/> -->
                <button type="sumbit" @click="addGallery"  class="btn btn-info pull-left" >submit</button>


                </div>
            </div>
        </div>

    </b-modal>
</template>

<script>
import Vue from 'vue'
import VeeValidate from 'vee-validate';
Vue.use(VeeValidate)

import { ADD_GALLERY,All_GALLERY,ADD_GALLERYC,All_GALLERYC} from "@/store/action.type"
// import { ADD_CONTACT_LOADER} from "../../store/mutation.type"
import { mapState,mapGetters } from "vuex"
import GalleryContent from './GalleryContent'
export default {
  components:{GalleryContent},
    data(){
        return{

            largeModal:false,
            addLoader:false,
            disable:true,
            newGallery: {
                title: '',
                cover: ''


            },
            temp_arr:[],
            addContent: {
                caption: '',
                cover: '',
                gallery_id: ''
            },

        }
    },
    methods:{
      submit_gal(){
        console.log(this.temp_arr)
      },
      add_more() {
        let ob = {
                caption: '',
                content: '',
                gallery_id: ''
        }
        this.temp_arr.push(ob)
      // this.galleryc.addContent.push(ob)

      // this.$forceUpdate()
    },
    // deleteMore(key) {
    //   this.galleryc.addContent.splice(key,1)
    //   this.$forceUpdate()
    // },




      addGallery () {
            this.$validator.validateAll().then( result =>{
                if(result){
                    var data = {}
                    data.gallery = this.newGallery
                    data.gallery_content = this.temp_arr
                    // this.addLoader = true
                    this.$store.dispatch('ADD_GALLERY',data)
                    .then(response=>{
                        // this.addLoader = false;
                        // this.largeModal = false
                        this.$iziToast.success({position:'topRight',title:'Ok',message:"Gallery Added Successsfully"})

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
            this.newGallery.title =''
            this.newGallery.cover =''
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
      ...mapGetters(["gallerys","galleryP2","galleryc"]),
      dynamicContents(){
      return this.galleryc.addContent
    }
    },

}
</script>

<style scoped>
 .disable{
    cursor: not-allowed;
   pointer-events: none;
 }
</style>
