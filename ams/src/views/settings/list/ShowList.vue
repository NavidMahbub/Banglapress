<template>
    <ul>
        <li v-for="(item,key) in list" :key="key" style="margin-top:10px;">
            {{item.title}}
            <a href="#" style="margin-left:10px">add</a>

            <ShowList style="margin-left:30px;" :list="item.childs"></ShowList>
        </li>
    </ul>
</template>
<script>
import ShowList from './ShowList'
export default {
    name:'ShowList',
    components:{ShowList},
    props:['list'],
    data(){
        return{

        }
    }
}
</script>