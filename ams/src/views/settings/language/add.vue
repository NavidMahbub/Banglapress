<template ref="add_lang">
  <div class="card">
    <div class="card-body">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-5">
            <label for>Title</label>
            <input v-model="title" class="form-control" placeholder="enter title" />
          </div>
        </div>
        <div class="row">
          <div class="col-sm-5">
            <label for>Slug</label>
            <input v-model="slug" class="form-control" placeholder="enter title" />
          </div>
        </div>
        <hr />
        <div class="row">
            
          <div class="col-sm-6">
            <label>Admin field</label>
            <br />
            <div class="row" v-for="(i,k) in admin_list" :key="k" style="margin-bottom:10px">  
              <div class="col-sm-5">
                <input class="form-control" :value="Object.keys(i).pop()" :readonly="true" />
              </div>
              <div class="col-sm-5">
                <input class="form-control" :value="Object.values(i).pop()" :readonly="true"/>
              </div>
              <div class="col-sm-2">
                  <div style="margin-top:7px;">
                        <i class="icon-note icons actn" @click="edit_admin_field(i,k)" data-toggle="modal" data-target="#add_word"> </i>
                        <i class="icon-trash icons actn" @click="()=>{admin_list.splice(k,1)}"> </i>                  
                  </div>
                <!-- <button class="close" style="margin-top:7px;" @click="()=>{admin_list.splice(k,1)}">&times;</button> -->
              </div>
              
            </div>
            <!-- loop -->
            <a href="#" data-toggle="modal" data-target="#add_word" @click="()=>{word_type=`admin`;this.$refs.add_word.clear()}">add</a>
          </div>
          <div class="col-sm-6">
            <label>Frontend Field</label>
            <br />
            <!-- loop -->
            <div class="row" v-for="(i,k) in front_list" :key="k" style="margin-bottom:10px">
              <div class="col-sm-5">
                <input class="form-control" :value="Object.keys(i).pop()" :readonly="true"/>
              </div>
              <div class="col-sm-5">
                <input class="form-control" :value="Object.values(i).pop()" :readonly="true"/>
              </div>
              <div class="col-sm-2">
                 <div style="margin-top:7px;">
                        <i class="icon-note icons actn" @click="edit_front_field(i,k)" data-toggle="modal" data-target="#add_word"> </i>
                        <i class="icon-trash icons actn" @click="()=>{front_list.splice(k,1)}"> </i>                  
                  </div>               
                <!-- <button class="close" style="margin-top:7px;" @click="()=>{front_list.splice(k,1)}">&times;</button> -->
              </div>              
            </div>
            <a href="#"  data-toggle="modal" data-target="#add_word" @click="()=>{word_type=`front`}">add</a>
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer">
        <button class="btn btn-success pull-right" @click="save"> save</button>
    </div>
    <AddWord :type="word_type" ref="add_word"></AddWord>
  </div>
</template>
<script>
import AddWord from "./word";
import { mapGetters } from "vuex";
export default {
  components:{
      AddWord ,
  },  
  data() {
    return {
      
      id : ``,
      title : ``,
      slug : `` ,
      word_type : ''  ,
      admin_list: [
    
      ],
      front_list: []
    };
  },
  computed: {
    ...mapGetters(["langList","currentLang"])
  },
  mounted(){
     this.handelUpdate()
  },
  methods: {
    handelUpdate(){
      let route_id = this.$route.params.id 
      if(route_id){
         let lang = this.langList.find( v=> v.id == route_id) 
         console.log(lang)
         this.id = lang.id 
         this.title = lang.title 
         this.slug  = lang.slug 
        //  this.admin_list = lang.admin_field 
         this.admin_list = Object.keys(lang.admin_field).map(i=>{
            let _ob = {}
            _ob[i] = lang.admin_field[i]
            return _ob 
         })
        
        this.front_list = Object.keys(lang.frontend_field).map(i=>{
          let _ob = {}
          _ob[i] = lang.frontend_field[i]
          return _ob 
        })
         
      }
    },
      demofn() {
          // do samll and make it large
      this.$router.push({ name: "addLanguage" });
    },
    edit_front_field(i,k){
        this.word_type = `front`
        this.$refs.add_word.is_update = true 
        this.$refs.add_word.update_idx = k 
        this.$refs.add_word.template = Object.keys(i).pop()
        this.$refs.add_word.value = Object.values(i).pop()      
    },  
    edit_admin_field(i,k){
        this.word_type = `admin`
        this.$refs.add_word.is_update = true 
        this.$refs.add_word.update_idx = k 
        this.$refs.add_word.template = Object.keys(i).pop()
        this.$refs.add_word.value = Object.values(i).pop()
    },
    save(){
      console.log(this.admin_list)
        // flat nested object to simple object 
        let falt_admin = Object.assign({}, ...function _flatten(o) { return [].concat(...Object.keys(o).map(k => typeof o[k] === 'object' ? _flatten(o[k]) : ({[k]: o[k]})))}(this.admin_list))
        let falt_front = Object.assign({}, ...function _flatten(o) { return [].concat(...Object.keys(o).map(k => typeof o[k] === 'object' ? _flatten(o[k]) : ({[k]: o[k]})))}(this.front_list))
        let payload = {
          id : this.id ,
          title : this.title,
          slug : this.slug ,
          admin_field : JSON.stringify( falt_admin ) ,
          frontend_field : JSON.stringify( falt_front) ,
        }
        // dispatch add 
        console.log(payload)
        // return 
        this.$store.dispatch(`ADD_LANGUAGE`,payload).then(response=>{
          this.$iziToast.success({position:'topRight',title:'Success',message:``})       
        }).catch(error=>{
          this.$iziToast.success({position:'topRight',title:'Success',message:``})       
        })
    },
    add_to_admin(){
        this.admin_list.push(1)
    },
    add_to_front(){
        this.front_list.push(1)
    },
  }
};
</script>
<style scoped>
</style>