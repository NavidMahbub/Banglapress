<template>
    <div>
        {{$route.params.id}}
        {{langList.find(v=>v.id == $route.params.id)}}
    </div>
</template>
<script>
import {mapGetters} from "vuex"
export default {
    data(){
        return{
            id : ``
        }
    },
    computed:{
        ...mapGetters(["langList"])
    },
    mounted(){
        console.log(`edit mounted `)
    },
    methods:{

    },
}
</script>
<style  scoped>

</style>

