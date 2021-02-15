<template>
  <div>
     <div class="row">
        <div class="col-sm-3">
            <button v-if="auth_permission.scroll_create" class="btn btn-success contct-b pull-left" @click="openModal"><i class="fa fa-plus"></i> Add Scroll</button>
        </div>
    </div>

    <br/>
    

    <AddScroll ref="add_scroll_modal"></AddScroll>
    <ViewScrollModal ref="view_scroll_modal"></ViewScrollModal>

    <Loader v-if="loading"></Loader>
    <div class="row">
      <div class="col-sm-12">
        <div v-for="(i,k) in scroll_parents" :key="k">
          <RecCom :node="i"></RecCom>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import RecCom from "./RecCom.vue";
import AddScroll from "./AddScroll.vue";
import ViewScrollModal from "./ViewScrollModal.vue";
import Loader from "@/views/common/Loader";

export default {
  components: {
    AddScroll,
    ViewScrollModal,
    Loader,
    RecCom
  },
  data() {
    return {
      loading: false,
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
  computed: {
    ...mapGetters(["auth_permission", "scroll_list", "scroll_parents"])
  },
  mounted() {
    this.getScrolls();
  },
  methods: {
    editScrollModal(item) {
      this.$refs.add_scroll_modal.openModal();
      this.$refs.add_scroll_modal.update = true;
      this.$refs.add_scroll_modal.newArea.parent_id = item.parent_id;
      this.$refs.add_scroll_modal.newArea.title = item.label;
      this.$refs.add_scroll_modal.item_id = item.id;
    },
    deleteScroll(id) {
      this.$store
        .dispatch("DELETE_SCROLL", id)
        .then(response => {
          this.getScrolls();
        })
        .catch(error => {});
    },
    getScrolls() {
      this.loading = true;
      this.$store
        .dispatch("FETCH_SCROLLS")
        .then(response => {
          this.loading = false;
        })
        .catch(error => {
          this.loading = false;
        });
    },
    openModal() {
      this.$refs.add_scroll_modal.openModal();
    }
  }
};
</script>