<template>
    <b-modal title="Area"  no-close-on-backdrop hide-footer size="xl" v-model="largeModal"  @ok="largeModal = false">
        <form>
            <div class="form-group row">
                <div class="col-sm-5">
                    <p><b>Title:</b> {{area.title}}</p>
                </div>

                <div class="col-sm-5">
                    <p><b>Parent :</b> {{area.parent_id}}</p>
                </div>

                <div class="col-sm-5">
                    <p><b>Created by :</b> {{area.created_by}}</p>
                </div>
                <div class="col-sm-5">
                    <p><b>Updated by:</b> {{area.updated_by}}</p>
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
            area:''
        }
    },
    methods:{
        openModal(area){
            this.largeModal = true
            this.area = area
        }
    }
}
</script>

<style>

</style>
