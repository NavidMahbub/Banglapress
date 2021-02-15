<template>
  <div>


                  <div >
                    <b-row>
                    <b-col sm="12">
                      <b-form-group>
                        <label for="Title">Caption</label>

                        <b-form-input v-model="item.caption" type="text" name="Caption" id="Title" placeholder="Enter Caption..."></b-form-input>
                        <div v-show="errors.has('Caption')" class="help-block alert alert-danger">
                        {{ errors.first('Caption') }}
                        </div>
                      </b-form-group>
                    </b-col>
                  </b-row>
                  <b-row>
                    <b-col sm="12">
                      <b-form-group>
                        <label for="Content">Image/Video</label>
                        <b-form-file v-model="item.content" name="Content" id="content"  ></b-form-file>
                        <div v-show="errors.has('Content')" class="help-block alert alert-danger">
                        {{ errors.first('Content') }}
                        </div>
                      </b-form-group>
                    </b-col>
                  </b-row>

                  </div>
                  
  </div>
</template>

<script>
import Vue from 'vue'
import VeeValidate from 'vee-validate';
Vue.use(VeeValidate)

import { ADD_GALLERY,All_GALLERY,ADD_GALLERYC,All_GALLERYC} from "@/store/action.type"
// import { ADD_CONTACT_LOADER} from "../../store/mutation.type"
import { mapState,mapGetters } from "vuex"

export default {
  name: 'GalleryContent',
  props:['item','item_key'],
    data(){
        return{
            largeModal:false,
            addLoader:false,
            addContent: {
                caption: '',
                cover: '',
            },

        }
    },
    methods:{

      addMore() {
        let ob = {

      }
      this.galleryc.addContent.push(ob)

      this.$forceUpdate()
    },
    deleteMore(index) {
      this.$parent.addContent.splice(index,1)
      //  this.$parent.temp_arr.splice(item_key,1)
      // this.galleryc.addContent.splice(key,1)
      this.$forceUpdate()
    },

    btnNext(){
      // this.disabled = true
    },

    addContents(){
      this.$validator.validateAll().then( result =>{
                if(result){
                    var data = this.inputs
                    this.addLoader = true
                    this.$store.dispatch('ADD_GALLERYC',data)
                    .then(response=>{
                        this.addLoader = false;
                        this.largeModal = false
                        this.$iziToast.success({position:'topRight',title:'Ok',message:"Gallery Image/Video Added Successsfully"})

                    })
                    .catch(error=>{
                        this.addLoader = false;
                        this.$iziToast.error({position:'topRight',title:'Error',message:"Can't upload image/video !!"})
                    });
                }

            })
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
