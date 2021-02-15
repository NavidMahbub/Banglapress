<template>
  <div>
    <div class="row">
        <div class="col-sm-3">
            <button v-if="auth_permission.area_create" class="btn btn-success contct-b pull-left" @click="openModal"><i class="fa fa-plus"></i> Add Area</button>
        </div>
    </div>

    <br/>

      <div class="row">
        <div class="col-sm-12">
          <div v-for="(i,k) in area_parents" :key="k">
            <RecCom :node="i"></RecCom>
          </div>
        </div>
      </div>

    <AddAreaModal ref="add_area_modal"></AddAreaModal>
    <EditAreaModal ref="edit_area_modal"></EditAreaModal>
    <ViewAreaModal ref="view_area_modal"></ViewAreaModal>
    <Loader v-if="loading"></Loader>
  </div>
</template>

<script>
import RecCom from "./RecCom";
import axios from "axios";
import pagination from "laravel-vue-pagination";

import AddAreaModal from "./AddAreaModal";
import EditAreaModal from "./EditAreaModal";
import ViewAreaModal from "./ViewAreaModal";
import Loader from "@/views/common/Loader";

import { mapState, mapGetters, mapActions } from "vuex";
import {
  All_AREA,
  DELETE_AREA,
  SEARCH_AREA,
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
    getAreas() {
      this.loading = true;
      this.$store
        .dispatch("FETCH_AREAS")
        .then(response => {
          this.loading = false;
        })
        .catch(error => {
          this.loading = false;
        });
    },

    listGroup(index) {
      this.showSection.isOpen = !this.showSection.isOpen;
    },

    listGroup2() {
      this.showSection2 = !this.showSection2;
    },

    addAreaModal() {
      this.$refs.add_area_modal.openModal();
    },

    editAreaModal(area) {
      this.$refs.add_area_modal.openModal();
      this.$refs.add_area_modal.update = true;
      this.$refs.add_area_modal.newArea.parent_id = area.parent_id;
      this.$refs.add_area_modal.newArea.title = area.label;
      this.$refs.add_area_modal.item_id = area.id;
    },
    viewAreaModal(area) {
      this.$refs.view_area_modal.openModal(area);
    },

    searchArea() {
      this.loading = true;
      var data = this.search;
      var page = 1;
      this.$store
        .dispatch("SEARCH_AREA", { page, data })
        .then(response => {
          this.loading = false;
        })
        .catch(error => {
          this.loading = true;
        });
    },
    getResults(page = 1) {
      this.loading = true;
      var data = this.search;
      if (data != "") {
        this.$store
          .dispatch("SEARCH_AREA", { page, data })
          .then(response => {
            this.loading = false;
          })
          .catch(error => {
            this.loading = true;
          });
      } else {
        alert("sss");
        this.$store
          .dispatch("All_AREA", page)
          .then(response => {
            this.loading = false;
          })
          .catch(error => {
            this.loading = true;
          });
      }
    },

    deleteArea(id) {
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
                .dispatch("DELETE_AREA", id)
                .then(response => {
                  self.$iziToast.success({
                    position: "topRight",
                    title: "Ok",
                    message: "Area Delated Successsfully"
                  });
                  self.getAreas();
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
      this.$refs.add_area_modal.openModal();
    }
    // getPermission(){
    //     this.$store.dispatch('ALL_USER_ROLE2')
    //     .then(response=>{
    //         this.permission = response.data.permission
    //     })
    // }
  },

  mounted() {
    // this.getResults()
    this.getAreas();
    // this.getPermission()
  },
  computed: {
    ...mapGetters(["auth_permission", "area_list", "area_parents"])
  },

  components: {
    EditAreaModal,
    ViewAreaModal,
    pagination,
    AddAreaModal,
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

