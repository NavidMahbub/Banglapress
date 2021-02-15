<template>
  <div>
    <div id="addpole" class="modal fade">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            {{poll_header_txt}}
            <!-- {{list}} -->
            <button class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <!-- <input class="form-control" placeholder="poll content "/> -->
            <div class="row">
              <div class="col-sm-8">
                <label>content</label>
                <!-- <ckeditor :editor="editor" v-model="list.content" :config="editorConfig"></ckeditor> -->
                <quill-editor :content="list.content"
                :options="{}"
                @change="()=>{}">
                </quill-editor>                 
                <div v-show="errors.hasOwnProperty('content')" class="help-block alert alert-danger">
                <!-- {{  errors[`title`] }} -->
                    <p v-for="(i,k) in errors[`content`]" :key="k">
                    {{i}}
                    </p>
                </div>   

                    <!-- start -->
                    
                <!-- end -->
              </div>

              <div class="col-sm-4">
                <label>publish date</label>
                <datetime v-model="list.publish_at"></datetime>
                <div v-show="errors.hasOwnProperty('publish_at')" class="help-block alert alert-danger">
                    <p v-for="(i,k) in errors[`publish_at`]" :key="k">
                    {{i.replace('publish_at','publish date')}}
                    </p>
                </div>                 
                <label>expire date</label>
                <datetime v-model="list.expire_at"></datetime>
                <div v-show="errors.hasOwnProperty('expire_at')" class="help-block alert alert-danger">
                    <p v-for="(i,k) in errors[`expire_at`]" :key="k">
                    {{i.replace('expire_at','expire date')}}
                        
                    </p>
                </div>                 
              </div>
            </div>

            <label>Poll Options</label>
            <div class="row">
              <div class="col-sm-7">
                <input
                  @keyup.enter="addOption"
                  class="form-control"
                  placeholder="enter oprion"
                  v-model="temp_option"
                />
              </div>
              <div class="col-sm-3">
                <button class="btn btn-secondary" @click="addOption">add</button>
              </div>
              <div class="col-sm-2">
                <div class="custom-control custom-switch pull-right">
                  <input type="checkbox" class="custom-control-input" v-model="list.status" id="customSwitch1" />
                  <label class="custom-control-label" for="customSwitch1">disable</label>
                </div>
              </div>
            </div>
            <!-- poll option list  -->
            <br />
        
            <div class="row">
              <div class="col-sm-5" style="margin-left:10px" >
                <div v-for="(i,k) in list.options" :key="k" class="card">
                  <span>
                    &bull;
                    
                    {{`${i.option}`}}
                    <button
                      class="close"
                      @click="() => {list.options.splice(k,1)}"
                    >&times;</button>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary" data-dismiss="modal">close</button>
            <button class="btn btn-success" @click="save">save</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import datetime from "vuejs-datetimepicker";
import { quillEditor } from 'vue-quill-editor'


export default {
  components: {
    datetime,
    quillEditor
  },
  data() {
    return {

      test: ``,
      poll_header_txt : `Add Poll`,
      poll_text: ``,
      option_inp_txt: ``,
      poll_option_list: [],
      temp_option: ``,
      temp_option_counter: 0,
      list: {
        id: ``,
        content: ``,
        options: [],
        status: false,
        publish_at: ``,
        expire_at: ``
      },
      errors: {},
      // editor: ClassicEditor,
      editorConfig: {
        fullPage: false,
        resize_enabled: false,
        toolbar: {
          items: [
            "bold",
            "italic",
            "link",
            "Blockquote",
            "BulletedList",
            "NumberedList",
            "Underline",
            "undo",
            "redo"
          ]
        }
      }
    };
  },
  methods: {
    save() {
      // alert(this.list.options)
      console.log(this.list);
      let payload = { ...this.list }
      payload.options = JSON.stringify(payload.options);
      this.$store
        .dispatch(`ADD_POLL`, payload)
        .then(response => {
          // re render the list
            this.list = {
                    id: ``,
                    content: ``,
                    options: [],
                    status: false,
                    publish_at: ``,
                    expire_at: ``
            },          
          this.$parent.getPolls();
          this.$iziToast.success({position:'topRight',title:'Success',message:`${this.poll_header_txt} done`})       
          this.poll_header_txt= `Add Poll`
        })
        .catch(error => {
          this.errors = error.response.data.errors;
        //   this.list.options = []
        });
      // let _ob = {
      //    txt: this.poll_text,
      //    options:this.poll_option_list,
      // }
      // this.$parent.temp_list.push(_ob)
    },
    setUpdateInfo(payload){

        this.errors = {}
        this.list = { ...payload }
        this.poll_header_txt = 'Update Poll'
    },
    clearModalData() {
        this.errors = {}
        this.list = {
                id: ``,
                content: ``,
                options: [],
                status: false,
                publish_at: ``,
                expire_at: ``
        }
        this.poll_header_txt = 'Add Poll'
        
    },
    addOption() {
      //  this.temp_option!=``? this.list.options.push(this.temp_option) : ``
      if (this.temp_option) {
        this.temp_option_counter += 1;
        let _ob = {
          id: this.temp_option_counter,
          option: this.temp_option
        };
        this.list.options.push(_ob);
        this.temp_option = ``;
      }
      //  this.$store.dispatch(`ADD_POLL`,list)
      // let _t = this.option_inp_txt
      // if(_t == `` || _t == null) return
      // this.option_inp_txt = ``
      // this.poll_option_list.push(_t)
    }
  }
};
</script>
<style scoped>
</style>

