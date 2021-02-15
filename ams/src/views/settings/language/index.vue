<template>
    <div >
        <!-- <div class="card"> 
            <div class="card-header">
                <label>admin panel language </label>
            </div>
            <multiselect :options=langList track-by="id" label="title"></multiselect>
        </div> -->
        <!-- {{langList}} -->
        <!-- {{currentLang}} -->
        <!-- {{"alu" | test_filter}} -->
        <!-- {{"dashboard" | lang_filter}} -->
        <div class="card">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>idx</th>
                        <th>slug</th>
                        <th>title</th>
                        <th>actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(i,k) in langList" :key="k">
                        <td>{{i.id}}</td>
                        <td>{{i.slug}}</td>
                        <td>{{i.title}}</td>
                        <td>
                            <a href="#" @click="edit(i)">edit</a> 
                            <a href="#" @click="del(i)" >delete</a> 
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script>
import Multiselect from "vue-multiselect"
import { mapGetters } from 'vuex'
export default {
    components:{
        Multiselect
    },
    data(){
        return {
            
        }
    },
    computed:{
        ...mapGetters(["langList","currentLang"]),
    },
    mounted(){
        this.getLangList()
    },
    methods:{
        getLangList(){
            this.$store.dispatch(`FETCH_LANGUAGES`)
        },
        edit({id}){
            this.$router.push({name:`Edit-Language`,params:{id}})
        },
        del({id}){
            let self = this
            this.$dialog
            .confirm('Please confirm to continue')
            .then(function(dialog) {
                console.log(`clicked on proceed ${id}`)
                try{

                    self.$store.dispatch(`DELETE_LANGUAGE`,id).then(response=>{
                        self.getLangList()
                    })
                }catch(e){
                    console.log(e)
                }
            })
            .catch(function() {
                console.log('Clicked on cancel');
            });           
        },
    },
}
</script>
<style scoped>
    td > a {
        margin-left: 12px;
    }
</style>

