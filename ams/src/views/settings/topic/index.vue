<template>
  <div >

    <div class="row">
        <div class="col-sm-3">
            <button v-if="auth_permission.topic_create" class="btn btn-success contct-b pull-left" @click="openModal"><i class="fa fa-plus"></i> Add Topic</button>
        </div>
    </div>

    <br/>
    <AddTopicModal ref="add_topic_modal"></AddTopicModal>
    <EditTopicModal ref="edit_topic_modal"></EditTopicModal>
    <ViewTopicModal ref="view_topic_modal"></ViewTopicModal>
    <Loader v-if="loading"></Loader>

    <div class="row">
    <div class="col-sm-12">
        <div v-for="(i,k) in topic_parents" :key="k">
          <RecCom :node="i"></RecCom>
        </div>      
    </div>
    </div>
  </div>
</template>

<script>
import RecCom from "./RecCom"
import axios from "axios";
import pagination from "laravel-vue-pagination";
import Loader from "@/views/common/Loader";

import AddTopicModal from "./AddTopicModal";
import EditTopicModal from "./EditTopicModal";
import ViewTopicModal from "./ViewTopicModal";

import { mapState, mapGetters, mapActions } from "vuex";
import {
  All_TOPIC,
  DELETE_TOPIC,
  SEARCH_TOPIC,
  ALL_USER_ROLE2
} from "@/store/action.type";
export default {
  data() {
    return {
      loading: false,
      // showSection: false,
      showSection(index) {
        isOpen: false;
      },
      parnt_index: "",
      // permission:'',
      search: {
        search_item: ""
      },
      isActive: true
    };
  },
  methods: {
    loadPermission(){
        this.$store.dispatch('FETCH_CURRENT_USER_PERMISSION')
    } ,    
    getTopics() {
      this.loading = true 
      this.$store.dispatch("FETCH_TOPICS").then(response=>{
        this.loading = false 
      }).catch(error=>{
        this.loading = false 
      });
    },
    parentChilds(index) {
      alert(index);
      this.parnt_index = index;
    },

    activate: function(el) {
      this.active_el = el;
    },
    listGroup(index) {
      this.showSection.isOpen = !this.showSection.isOpen;
    },

    listGroup2() {
      this.showSection2 = !this.showSection2;
    },

    TopicModal() {
      this.$refs.add_topic_modal.openModal();
    },

    editTopicModal(topic) {
      this.$refs.edit_topic_modal.openModal(topic);
      this.$refs.edit_topic_modal.editTopic.title = topic.label
      this.$refs.edit_topic_modal.editTopic.parent_id = topic.parent_id
      this.$refs.edit_topic_modal.item_id = topic.id

    },
    viewTopicModal(topic) {
      this.$refs.view_topic_modal.openModal(topic);
    },

    searchTopic() {
      this.loading = true;
      var data = this.search;
      var page = 1;
      // this.$store.dispatch('SEARCH_TOPIC',{page,data})
      //     .then(response=>{
      //         this.loading=false;
      //     })
      //     .catch(error=>{
      //         this.loading=true;
      //     });
    },
    getResults(page = 1) {
      this.loading = true;
      var data = this.search;
      // if(data != ''){
      //     this.$store.dispatch('SEARCH_TOPIC',{page,data})
      //     .then(response=>{
      //         this.loading=false;
      //     })
      //     .catch(error=>{
      //         this.loading=true;
      //     });
      // }
      // else{
      //     alert('sss');
      //     this.$store.dispatch('All_TOPIC',page)
      //     .then(response=>{
      //         this.loading=false;
      //     })
      //     .catch(error=>{
      //         this.loading=true;
      //     });
      // }
    },

    deleteTopic(id) {
      var self = this;
      this.$iziToast.question({
        timeout: 10000,
        close: false,
        overlay: true,
        displayMode: "once",
        id: "question",
        zindex: 999,
        title: "Hey",
        message: "Are you sure To Delete?",
        position: "center",
        buttons: [
          [
            "<button><b>YES</b></button>",
            function(instance, toast) {
              self.$store
                .dispatch("DELETE_TOPIC",id)
                .then(response => {
                  self.$iziToast.success({
                    position: "topRight",
                    title: "Ok",
                    message: "Topic Delated Successsfully"
                  });
                  self.getTopics()
                })
                .catch(error => {
                  self.$iziToast.error({
                    position: "topRight",
                    title: "Error",
                    message: "Something Wrong !!"
                  });
                });
              instance.hide({ transitionOut: "fadeOut" }, toast, "button");
            },
            true
          ],
          [
            "<button>NO</button>",
            function(instance, toast) {
              instance.hide({ transitionOut: "fadeOut" }, toast, "button");
            }
          ]
        ]
      });
    },

    openModal() {
      this.$refs.add_topic_modal.openModal();
    },
 
  },

  mounted() {
    this.getTopics();
  },
  computed: {
    ...mapGetters(["auth_permission","topic_list", "topic_parents"])
  },

  components: {
    EditTopicModal,
    ViewTopicModal,
    pagination,
    AddTopicModal,
    Loader,
    RecCom
  }
};
</script>

<style scoped>
.just-padding {
  padding: 15px;
}

.list-group.list-group-root {
  padding: 0;
  overflow: hidden;
}

.list-group.list-group-root .list-group {
  margin-bottom: 0;
}

.list-group.list-group-root .list-group-item {
  border-radius: 0;
  border-width: 1px 0 0 0;
}

.list-group.list-group-root > .list-group-item:first-child {
  border-top-width: 0;
}

.list-group.list-group-root > .list-group > .list-group-item {
  padding-left: 30px;
}

.list-group.list-group-root > .list-group > .list-group > .list-group-item {
  padding-left: 45px;
}

.list-group-item .glyphicon {
  margin-right: 5px;
}
</style>

