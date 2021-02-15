<template>
<div>
    <div class="section-heading">
        <h5 @click="rightSideTab('popular')" :class="right_side_tab=='popular'?'section_heading_active':''">Popular</h5>
        <h5 @click="rightSideTab('latest')" :class="right_side_tab=='latest'?'section_heading_active':''">Latest</h5>
    </div>
    <!-- Popular News Widget -->
    <div class="popular-news-widget mb-30">
        <div v-if="popularPostsLoading">
            <SmallLoader :counts='1'></SmallLoader>
            <SmallLoader :counts='1'></SmallLoader>
            <SmallLoader :counts='1'></SmallLoader>
            <SmallLoader :counts='1'></SmallLoader>
        </div>
        <div v-else>
            <div v-if="right_side_tab=='popular'">
            <div v-for="(item,key) in this.popularPosts.data" v-bind:key="key">
                <nuxt-link :to="'/article/'+item.id+'/'+item.shoulder">
                    <List :item="item"></List>
                </nuxt-link>
            </div>
            </div>
            <div v-else>
            <div v-for="(item,key) in this.latestPosts.data" v-bind:key="key">
                <nuxt-link :to="'/article/'+item.id+'/'+item.shoulder">
                    <List :item="item"></List>
                </nuxt-link>
            </div>
            </div>
        </div>
    </div>
</div>
</template>
<script>

import axios from '@/plugins/axios';
import List from "@/components/share/post/List";
import SmallLoader from "@/components/share/loader/SmallLoader";
import SmallLoaderVerticle from "@/components/share/loader/SmallLoaderVerticle";

export default {
  name:"home",
  components: {
    List,SmallLoader
  },
 
  data() {
    return {
      title : 'PopularLatest',
      popularPostsLoading:true,
      latestPostsLoading:true,
      right_side_tab:'popular',
      popularPosts:[],
      latestPosts:[],
    }
  },
  head() {
    return {
      title: this.title,
      meta: [
        // hid is used as unique identifier. Do not use `vmid` for it as it will not work
        {
          hid: "description",
          name: "description",
          content: "My custom description"
        }
      ]
    };
  },
  mounted() {
    this.getPopularPosts();
    this.getLatestPosts();
  },
  methods: {
    rightSideTab(type){
      this.right_side_tab = type;
    },
    getPopularPosts(){
        axios.post('/api/frontend/posts',{popular:1,limit:10}).then((response) => {      
            this.popularPosts = response.data;
            this.popularPostsLoading = false;

        }).catch(function (error) {    

            this.popularPostsLoading = true;
        });
    },
    getLatestPosts(){
        axios.post('/api/frontend/posts',{latest:1,limit:10}).then((response) => {      
            this.latestPosts = response.data;
            this.latestPostsLoading = false;

        }).catch(function (error) {    

            this.latestPostsLoading = true;
        });
    }
  }
}
</script>

<style scoped>
.single-blog-post.featured-post .post-data .post-title h6 {
  font-size: 15px;
}
.pt-20 {
  padding-top: 20px;
}
</style>