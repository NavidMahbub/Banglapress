<template>
    <b-modal title="category"  no-close-on-backdrop hide-footer size="xl" v-model="largeModal"  @ok="largeModal = false">
        <form>
            <div class="form-group row">
                <div class="col-sm-5">
                    <p><b>Title:</b> {{ncategory.title}}</p>
                </div>

                <div class="col-sm-5">
                    <p><b>Parent :</b> {{ncategory.parent_id}}</p>
                </div>

                <div class="col-sm-5">
                    <p><b>Created by :</b> {{ncategory.created_by}}</p>
                </div>
                <div class="col-sm-5">
                    <p><b>Updated by:</b> {{ncategory.updated_by}}</p>
                </div>
            </div>
        </form>
    </b-modal>
</template>

<script>
export default {
    data(){
        return{
            largeModal:false,
            ncategory:''
        }
    },
    methods:{
        openModal(ncategory){
            this.largeModal = true
            this.ncategory = ncategory
        }
    }
}
</script>

<style>

</style>
