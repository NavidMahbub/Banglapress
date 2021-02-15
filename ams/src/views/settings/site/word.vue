<template>
  <div>
    <div id="add_word" class="modal fade">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header">
            <!-- {{is_update}} -->
            <!-- {{this.$parent.content_list}} -->
            ADD
          </div>
          <div class="modal-body">
            <div>
              <div class="row">
                <div class="col-sm-5">
                  <input v-model="title" class="form-control" placeholder="template" />
                </div>
                <div class="form-group col-sm-5">
                    
                  <select
                    class="form-control"
                    id="exampleFormControlSelect2"
                    v-model="selectedType"
                  >
                  
                    <option>Text</option>
                    <option>Image</option>
                    <option>Video</option>
                    <option>CK</option>
                  </select>
                  <!-- {{selectedType}} -->
                </div>
              </div>
            </div>
            
            
            <br />
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary" data-dismiss="modal">cancel</button>
            <button class="btn btn-success" @click="save_word">save</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import ContentManager from "../../content/index"

export default {
  // props: ["type", `key`],
  data() {
    return {
      title: ``,
      selectedType: '',
    };
  },
  methods: {
    save_word() {
      let _ob = {
        title : this.title ,
        selectedType : this.selectedType ,
        content : `` ,
      }
       
      this.$parent.addData(_ob) 
      this.title = ``
      this.selectedType = ``
    }
  }
};
</script>
<style  scoped>
</style>