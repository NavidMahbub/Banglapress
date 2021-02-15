<template>
    <b-modal title="topic"  no-close-on-backdrop hide-footer size="xl" v-model="largeModal"  @ok="largeModal = false">
        <form>
            <div class="form-group row">
                <div class="col-sm-5">
                    <p><b>Title:</b> {{topic.title}}</p>
                </div>

                <div class="col-sm-5">
                    <p><b>Parent :</b> {{topic.parent_id}}</p>
                </div>

                <div class="col-sm-5">
                    <p><b>Created by :</b> {{topic.created_by}}</p>
                </div>
                <div class="col-sm-5">
                    <p><b>Updated by:</b> {{topic.updated_by}}</p>
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
            topic:''
        }
    },
    methods:{
        openModal(topic){
            this.largeModal = true
            this.topic = topic
        }
    }
}
</script>

<style>

</style>
