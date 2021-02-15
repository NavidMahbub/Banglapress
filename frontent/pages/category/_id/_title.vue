<template>
  <div class="container" style="margin-top:10px">
      <div class="col-md-12">
          <div class="row">
              <div class="col-md-8">
                  <div v-if="loading">
                      <p>Loading</p>
                  </div>
                  <div v-else class="row mb-30">
                    <div v-for="(item,key) in posts.data" v-bind:key="key" class="col-md-4">
                        <nuxt-link :to="'/article/'+item.id+'/'+item.shoulder">
                            <card :item="item"></card>
                        </nuxt-link>
                    </div>
                  </div>
              </div>
              <div class="col-md-4">
                   <Featured></Featured>
                   <PopularLatest></PopularLatest>
              </div>
          </div>
      </div>
  </div>
</template>

<script>
import axios from '@/plugins/axios'
import Logo from "@/components/Logo.vue";
import Hero from "@/components/Hero.vue";
import Carousel1 from "@/components/carousels/Carousel1";
import card from "@/components/share/post/Card";
import Featured from "@/components/share/post/featured";
import PopularLatest from "@/components/share/post/PopularLatest";
export default {
  name:"CategoryPage",
  components: {
    Logo,
    Hero,
    Featured,
    Carousel1,
    card,
    PopularLatest,
  },
  data() {
    return {
      title: "Home",
      posts:[],
      loading:true,
    };
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
    this.$nextTick(function() {});
    this.getData();
  },
  methods: {
     getData(){
        let search = {category:this.$route.params.id,limit:4};
        axios.post('/api/frontend/posts',search).then((response) => {      
            this.posts = response.data;
            this.loading = false;

        }).catch(function (error) {    
            this.loading = true;
        });
    }
  },
};
</script>

<style scoped>
.single-blog-post.featured-post .post-data .post-title h6 {
  font-size: 15px;
}

.pt-20 {
  padding-top: 20px;
}
</style>
