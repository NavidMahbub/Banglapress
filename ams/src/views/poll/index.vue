<template>
    <div>
        <!-- {{paginate_polls}} -->
        <button data-toggle="modal" data-target="#addpole" class="btn btn-success" @click="()=>{$refs.add_poll.clearModalData()}"> 
            add poll
        </button>
        <div >
        <!-- this is  polling page  -->

        <div class="row" style="margin-top:20px">
            <div class="col-sm-10">
                <div class="card" v-for="(i,k) in paginate_polls.data" :key="k" >
                    <span style="margin-left:10px;margin-top:5px;"> 
                        <!-- {{i}} -->
                        <!-- <ckeditor  :value="i.content" :config="editorConfig"></ckeditor> -->
                        <quill-editor :content="i.content"
                        :options="{}"
                        @change="()=>{}">
                        </quill-editor> 
                        <div v-for="(i,k) in JSON.parse(i.options)" :key="k">
                            &bull; 
                            {{i.option}}
                        </div>
                    </span>
                    <div>
                        <a href="#" style="margin-left:10px" data-toggle="modal" data-target="#addpole" @click="update_poll(i)">update</a>
                        <a href="#" style="margin-left:10px" @click="del_poll(i)">delete</a>
                    </div>
                </div>
            </div>
        </div>
        <AddPoll ref="add_poll"> </AddPoll>
        </div>
        <pagination :data="paginate_polls" @pagination-change-page="getPolls"></pagination>
    </div>
</template>
<script>
import {mapGetters} from "vuex"
import { quillEditor } from 'vue-quill-editor'



import AddPoll from "./Add"
export default {
    components:{

        AddPoll ,
        quillEditor,
    },
    data(){
        return {
           temp_list : [],
            // editor: ClassicEditor,
            editorConfig: {
                fullPage: false,
                resize_enabled: false,
                toolbar: {
                items: [
                    "bold",
                    "italic",
                    "link",
                    "Blockquote",
                    "BulletedList",
                    "NumberedList",
                    "Underline",
                    "undo",
                    "redo"
                ]
                }
            },           
        }
    },
    computed:{
        ...mapGetters(['paginate_polls'])
    },
    mounted(){
        this.getPolls()
    },
    methods:{
        update_poll(i){
            let _ob = { 
                ...i , 
                options: JSON.parse(i.options)
            }    
            console.log(_ob)
            this.$refs.add_poll.setUpdateInfo(_ob)
        },
        del_poll({id}){
            // alert(id)
            // todo 
            // loading effect 

            this.$store.dispatch(`DELETE_POLL`,id).then(response=>{
                this.getPolls()
            })
        },
        add_to_list(arg){
            this.temp_list.puhs(arg)
        },
        getPolls(page=1){
            this.$store.dispatch(`FETCH_POLLS`,page)
        }
    },

}
</script>
<style scoped>

</style>

