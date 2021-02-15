<template>
    <div>
        <SmallAd></SmallAd>
        <div class="section-heading">
            <h6>Featured News</h6>
        </div>
        <div v-if="sectionThirdLoading">
            <SmallLoader :counts='1'></SmallLoader>
        </div>
        <div v-else>
        <div v-for="(item,key) in this.sectionThird.data" v-bind:key="key">
            <nuxt-link :to="'/article/'+item.id+'/'+item.shoulder">
                <List :item="item"></List>
            </nuxt-link>
        </div>
        </div>
    </div>
</template>
<script>

import axios from '@/plugins/axios'
import List from "@/components/share/post/List";
import SmallAd from "@/components/share/ad/SmallAd";
import SmallLoader from "@/components/share/loader/SmallLoader";
export default {
  name:"home",
  components: {
    List,SmallAd,SmallLoader
  },
 
  data() {
    return {
      title : 'featured',
      sectionThirdLoading:true,
      sectionThird:[],
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
    this.getSectionThirdData();
  },
  methods: {
    getSectionThirdData(){
        axios.post('/api/frontend/posts',{section:3,limit:5}).then((response) => {      
            this.sectionThird = response.data;
            this.sectionThirdLoading = false;

        }).catch(function (error) {    

            this.sectionThirdLoading = true;
        });
    }
  },
  

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