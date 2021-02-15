<template>
  <div>
    <div class="card " style="height:50px;width:95%;margin-bottom:10px">
            <div class="row">
                <div class="col-md-10">
                    {{ node.label}}
                </div>
                <div class="col-md-2" >                 
                    <a href="#" @click="addChild(node)" style="margin-left:8px; color:#000099"> <i class="fa fa-plus" style="font-size:18px"></i></a>
                    <a href="#" @click="editAreaModal(node)" style="margin-left:8px; color:green"><i class="fa fa-edit" style="font-size:18px"></i></a>
                    <a href="#" @click="deleteArea(node.id)" style="margin-left:8px; color:red"> <i class="fa fa-trash" style="font-size:18px"></i></a>
                    <a href="#" @click="()=>{ show_children = false}" v-if="show_children && node.children.length > 0" style="margin-left:8px"><i class="fa fa-arrow-up" style="font-size:18px"></i></a>
                    <a href="#" @click="()=>{ show_children = true }" style="margin-left:8px" v-if="!show_children && node.children.length > 0" ><i class="fa fa-arrow-down" style="font-size:18px"></i></a>        
                </div>
            </div>    
        </div>
        <div v-if="show_children" style="margin-left:15px">
            <div  v-for="(i,k) in node.children" :key="k" >
                <RecCat :node="i"></RecCat>
            </div>
        </div>
    <AddAreaModal ref="add_area_modal"></AddAreaModal>
    <EditAreaModal ref="edit_area_modal"></EditAreaModal>
    <ViewAreaModal ref="view_area_modal"></ViewAreaModal>
    <Loader v-if="loading"></Loader>
  </div>
</template>
<script>
import Loader from "@/views/common/Loader";

import AddAreaModal from "./AddAreaModal";
import EditAreaModal from "./EditAreaModal";
import ViewAreaModal from "./ViewAreaModal";

import RecCat from "./RecCom";
export default {
  name: "RecCat",
  components: {
    Loader,
    ViewAreaModal,
    EditAreaModal,
    AddAreaModal,
    RecCat
  },
  props: ["node"],
  data() {
    return {
      show_children: false,
      loading: false
    };
  },
  methods: {
    addChild(area) {
      this.$refs.add_area_modal.openModal();
      this.$refs.add_area_modal.newArea.title = ``;
      this.$refs.add_area_modal.newArea.parent_id = area.id 
    },
    editAreaModal(area) {
      this.$refs.add_area_modal.openModal();
      this.$refs.add_area_modal.update = true;
      this.$refs.add_area_modal.newArea.parent_id = area.parent_id;
      this.$refs.add_area_modal.newArea.title = area.label;
      this.$refs.add_area_modal.item_id = area.id;
    },
     getAreas() {
      this.loading = true
      this.$store.dispatch("FETCH_AREAS").then(response=>{
        this.loading = false
      }).catch(error=>{  
        this.loading = false
      });
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
    }
  }
};
</script>
<style scoped>
  .card{  
    border-radius: 10px;
    background: #fff;
    box-shadow: 0 6px 10px rgba(0,0,0,0.8),0 0 6px rgba(0,0,0,0.05);
    transition: .3s transform cubic-bezier(.155,1.105,.295,1.12), .3s -webkit-transform cubic-bezier(.155,1.105,.295,1.12);
    padding: 13px 0px 7px 20px;
    cursor: pointer;
  }
  .card:hover{
    transform: scale(1.01);
    box-shadow: 0 10px 20px rgba(0,0,0,0.12), 0 4px 8px rgba(0,0,0,0.06);
  }

</style>

