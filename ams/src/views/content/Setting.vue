<template>
    <b-modal title="Content Manager => <b>Setting</b>"  hide-footer size="md" v-model="largeModal" @ok="largeModal = false">
        <div >
                <b-button style="width:400px;margin-left:30px;" @click="OpenContentCategory">Content Category</b-button>
                <b-button style="width:400px;margin-left:30px;margin-top:20px;">others</b-button>

        </div>
        <ContentCategory ref="content_category_modal"></ContentCategory>
    </b-modal>
</template>
<script>
import ContentCategory from "./ContentCategory"
export default {
    components:{
        ContentCategory ,
    },
    data(){
        return {
           largeModal:false ,     
        }
    },

    methods:{
        OpenModal : function(){
            this.largeModal = true 
            console.log('modal open ')
        },
        OpenContentCategory(){
            this.$refs.content_category_modal.OpenModal()
        }
    }
}
</script>
<style scoped>

</style>