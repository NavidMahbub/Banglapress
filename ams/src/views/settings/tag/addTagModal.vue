<template>
    
<!-- Modal -->
<div id="addTagModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">ADD TAG</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <!-- <p>Some text in the modal.</p> -->
        <div class="row">
            <div class="col-sm-10">
                <div class="input-group mb-3">
                <input v-model="title" type="text" class="form-control" placeholder="Enter Tag Title" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-success" type="button" @click="add_tag">Add</button>
                </div>
                </div>
                <!-- {{errors}} -->
                <div v-if="errors.hasOwnProperty(`title`)">
                    <p v-for="(error,k) in errors.title" :key="k" style="color:red"> 
                        <i class="fa fa-check-circle"></i>
                        {{error}}
                    </p>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
    
</template>

<script>
export default {
    data(){
        return {
            title : ``,
            errors:{},
        }
    },
    methods:{
        add_tag(){
            let payload = {
                title : this.title ,
            }
            this.$store.dispatch(`ADD_TAG`,payload).then(response=>{
                this.$iziToast.success({position:'topRight',title:'',message:"Tag Added"})  
                this.getTags()     
                this.errors = {}
                this.title = ``
            }).catch(error=>{
                this.$iziToast.error({position:'topRight',title:'',message:"Error"})  
                console.log(error)
                this.errors = error.response.data.errors

            })
        },
        getTags(){
            this.$store.dispatch('FETCH_TAGS')
        },
    },
}
</script>

<style scoped>

</style>