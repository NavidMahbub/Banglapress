<template>
  <div>
    <div class="row">

      <div class="col-sm-2" >
          <img v-if="item.file" :src="item.file" height="80px" width="100px" />
          <div v-else style="outline: 1px solid ;height:80px;width:100px;" >
            <p style="position:relative;top:25px;left:10px;">select video</p>
          </div>

      </div>      
      <div class="col-sm-10">
        <div class="input-group mb-3">
          
          <div class="input-group-prepend">
            <button @click="ContentManagerModal" class="btn btn-outline-primary" type="button">Select
              <i class="icon-camrecorder"></i>
            </button>
          </div>
          <textarea
            type="text"
            class="form-control"
            placeholder
            aria-label
            aria-describedby="basic-addon1"
            v-model="item.title"
          />
          <i class="icon-trash"
            @click="del_photo"
            data-toggle="tooltip" title="remove"
            style="font-size:25px;color:red;margin-top:1px;margin-left:10px;" >  
          </i>     
        </div>
      </div>

    </div>

    <!-- <img v-if="item.file" :src="get_file(item.file)" height="100px" width="100px" /> -->
    <br>
    <!-- <b-button style="margin-top:5px" variant="danger" @click="del_photo">Delete</b-button> -->
    <ContentManager ref="content_manager_modal" :content="content" :selected_content_type="'video'"></ContentManager>
  </div>
</template>
<script>
import axios from "axios"
import {mapGetters} from "vuex"
import ContentManager from "../../content/index";

export default {
  props:['item'],
  components: { ContentManager },
  data() {
    return {
      content: {}
    };
  },
  watch: {
    content: function(val) {
        this.$parent.news_data.featured_vid.id = val.id
        this.$parent.news_data.featured_vid.file = val.file
        this.$parent.news_data.featured_vid.title = val.title
    }
  },
  computed:{
    
     ...mapGetters(['news_data'])  
  },
  methods: {

    get_file: function(arg){
      if(this.news_data.is_update){
        return `${axios.defaults.baseURL}/uploads/${arg}`
      }else{
        return arg 
      }
    },
    ContentManagerModal() {
      this.$refs.content_manager_modal.openModal();     
    },
    del_photo(){
          this.$parent.remove_feat_video()
    },
  }
};
</script>
<style scoped>
</style>