<template>
  <div>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <button @click="ContentManagerModal" class="btn btn-outline-primary" type="button">Select</button>
      </div>
      <input
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
    <img v-if="Object.keys(content).length && content.file !=``" :src="content.file" height="100px" width="100px" />
    <img v-if="item.file && content.file == ``" :src="item.file" height="100px" width="100px" />
    <!-- <img v-else :src="get_src(item)" height="100px" width="100px" /> -->
    <br>
    <!-- <b-button style="margin-top:5px" variant="danger" @click="del_photo">Delete</b-button> -->
    <ContentManager ref="content_manager_modal" :content="content"></ContentManager>
  </div>
</template>
<script>
import axios from "axios"
import ContentManager from "../../content/index";
export default {
  props:['item','idx'],
  components: { ContentManager },
  data() {
    return {
      image_name: "",
      img_src: "",
      content: {
        file :``
      }
    };
  },
  watch: {
    content: function(val) {
      this.item.title = val.title
      this.item.file = val.file
      this.item.id = val.id
      // this.item = {...val}
    }
  },
  computed:{
    
    
    },
  methods: {

    get_src: function(item){
      if(item.mark == true){ // if the item is new 
          return item.file   
        }else{
          return `${axios.defaults.baseURL}/uploads/${item.file}`
      }
    },

    ContentManagerModal() {
      this.$refs.content_manager_modal.openModal();
    },
    del_photo(){
        this.$parent.album_detail.more_photo.splice(this.idx,1)
    },
  }
};
</script>
<style scoped>
</style>