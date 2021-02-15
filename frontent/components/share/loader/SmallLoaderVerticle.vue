<template>
    <div :class="['content-loader-list-items-block']" :data-val="perLoaderSize">
        <div v-for="n in counts" v-bind:key="n" :class="['content-loader-list-items']" :style="style">
            <vue-content-loading :width="100" :height="100">
                <rect x="0" y="0" width="100" height="65" />
                <rect x="8" y="70" width="8" height="8" />
                <rect x="20" y="70" width="34" height="8" />
                <rect x="8" y="83" width="84" height="5" />
            </vue-content-loading>
        </div>
    </div>
</template>
<script>
    import VueContentLoading from 'vue-content-loading';
    export default {
        props: ['counts'],
        components: {VueContentLoading},
        data(){
            return{
                perLoaderSize: 100/this.counts
            }
        },
        computed: {
            style () {
                return 'width: calc(' + this.perLoaderSize + '% - 12px)';
            }
        }
    }
</script>
<style>
    .content-loader-list-items-block{
        display: block; position: relative; overflow: hidden
    } 
    .content-loader-list-items{
        position: relative;
        /*width: calc(33% - 8px);*/
        height: auto;
        float: left;
        margin-bottom: 15px;
        background-color: transparent;
        margin-right: 15px;
        border: 1px solid #f0f0f0;
    }
    /* .content-loader-list-items:nth-child(5n+0) {
        margin-right: 0;
    } */
    .content-loader-list-items:last-child{
        margin-right: 0;
    }
</style>