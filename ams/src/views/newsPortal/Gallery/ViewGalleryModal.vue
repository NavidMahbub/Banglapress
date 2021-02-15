<template>
    <b-modal title="Gallery"  no-close-on-backdrop hide-footer size="xl" v-model="largeModal"  @ok="largeModal = false">
        <form>
            <div class="form-group row">
                <div class="col-sm-5">
                    <p><b>Title:</b> {{gallery.title}}</p>
                </div>

                <div class="col-sm-5">
                    <p><b>Parent :</b> {{gallery.cover}}</p>
                </div>

                <div class="col-sm-5">
                    <p><b>Created by :</b> {{gallery.created_by}}</p>
                </div>
                <div class="col-sm-5">
                    <p><b>Updated by:</b> {{gallery.updated_by}}</p>
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
            gallery:''
        }
    },
    methods:{
        openModal(gallery){
            this.largeModal = true
            this.gallery = gallery
        }
    }
}
</script>

<style>

</style>
