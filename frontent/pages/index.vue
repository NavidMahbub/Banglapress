<template>
  <div class="container" style="margin-top:10px">
      <div class="featured-post-area">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-8">
                    <div class="row">

                        <!-- Single Featured Post -->
                        
                        <div class="col-12 col-lg-7">
                          <div v-if="sectionOneLoading">
                            <SmallLoader :counts='1'></SmallLoader>
                          </div>
                          <div v-else>
                          <div v-for="(item,key) in this.sectionOne.data" v-bind:key="key">
                            <nuxt-link :to="'/article/'+item.id+'/'+item.shoulder">
                                <card :item="item"></card>
                            </nuxt-link>
                          </div>
                          </div>
                        </div>
                        
                        <div class="col-12 col-lg-5">
                            <div v-if="sectionSecondLoading">
                              <SmallLoaderVerticle :counts='1'></SmallLoaderVerticle>
                            </div>
                            <div v-else>
                            <div v-for="(item,key) in this.sectionSecond.data" v-bind:key="key">
                              <nuxt-link :to="'/article/'+item.id+'/'+item.shoulder">
                                <List :item="item"></List>
                              </nuxt-link>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <Featured></Featured>
                </div>
            </div>
        </div>
    </div>
    <div class="popular-news-area">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                  <div v-if="homeCategorisPostsLoading">
                      <SmallLoader :counts='2'></SmallLoader>
                      <SmallLoader :counts='2'></SmallLoader>
                  </div>
                   <div v-else class="row">
                    <div v-for="(category,ckey) in homeCategoris" v-bind:key="ckey" class="col-12">
                      <div v-if="homeCategorisPosts[ckey].length>0">
                        <div class="section-heading">
                            <h6>{{category.title}}</h6>
                        </div>

                        <div class="row">
                          <div v-for="(item,key) in homeCategorisPosts[ckey]" v-bind:key="key" class="col-12 col-md-6">
                              <nuxt-link :to="'/article/'+item.id+'/'+item.shoulder">
                                  <card :item="item"></card>
                              </nuxt-link>
                            </div>
                        </div>
                        <Bangladesh></Bangladesh>
                      </div>
                     </div>
                   </div>
                </div>

                <div class="col-12 col-lg-4">
                   <PopularLatest></PopularLatest>
                    <!-- Newsletter Widget -->
                    <div class="newsletter-widget">
                        <h4>Newsletter</h4>
                        <p>Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                        <form action="#" method="post">
                            <input type="text" name="text" placeholder="Name">
                            <input type="email" name="email" placeholder="Email">
                            <button type="submit" class="btn w-100">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
       <div class="section-heading">
              <h6>Image Gallery</h6>
          </div>
        <div class="row">
         
            <Gallery></Gallery>
        </div>
    </div>
  </div>
</template>

<script>

import axios from '@/plugins/axios'
import { mapState,mapGetters,mapActions } from "vuex"

import Gallery from "@/components/Gallery/index";
import Card from "@/components/share/post/Card";
import List from "@/components/share/post/List";
import SmallAd from "@/components/share/ad/SmallAd";
import SmallLoader from "@/components/share/loader/SmallLoader";
import SmallLoaderVerticle from "@/components/share/loader/SmallLoaderVerticle";
import Featured from "@/components/share/post/featured";
import PopularLatest from "@/components/share/post/PopularLatest";
import Bangladesh from "@/components/share/bangladesh/map";

export default {
  name:"home",
  components: {
    Card,List,SmallAd,SmallLoader,SmallLoaderVerticle,Gallery,Featured,PopularLatest,Bangladesh
  },
 
  data() {
    return {
      title : 'Home',
      sectionOneLoading:true,
      sectionSecondLoading:true,
      homeCategorisPostsLoading:true,
      sectionOne:[],
      sectionSecond:[],
      secondSectionNews:{},
      sectionsfirst: [],
      homeCategorisPosts:[],
      homeCategoris:[],
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
    this.getSectionOneData();
    this.getSectionSecondData();
    this.getHomeCategorisPosts();
  },
  methods: {
    getHomeCategorisPosts(){

        axios.post('/api/frontend/categories/home',{limit:4}).then((response) => {      
            this.homeCategorisPosts = response.data.posts;
            this.homeCategoris = response.data.categories;
            this.homeCategorisPostsLoading = false;

        }).catch(function (error) {    

            this.homeCategorisPostsLoading = true;
        });
    },
    getSectionOneData(){
        axios.post('/api/frontend/posts',{section:1,limit:1}).then((response) => {      
            this.sectionOne = response.data;
            this.sectionOneLoading = false;

        }).catch(function (error) {    

            this.sectionOneLoading = true;
        });
    },
    getSectionSecondData(){
        axios.post('/api/frontend/posts',{section:2,limit:6}).then((response) => {      
            this.sectionSecond = response.data;
            this.sectionSecondLoading = false;

        }).catch(function (error) {    

            this.sectionSecondLoading = true;
        });
    },
    
  },
  
  async asyncData () {
    
    let secParam2 = {section:2,limit:3};
    let secParam3 = {section:3,limit:4};
    let secParam4 = {section:4,limit:4};
    
    const postall = await axios.post('/api/frontend/posts');
    const sec2 = await axios.post('/api/frontend/posts',secParam2);
    const sec3 = await axios.post('/api/frontend/posts',secParam3);
    const sec4 = await axios.post('/api/frontend/posts',secParam4);

    // let searchCategory = {section:'',category:1,limit:1};
    // const ar = await axios.post('/api/frontend/posts',searchCategory);
    
    
    return {
        
        // latestPost:secone.data,
        section2:sec2.data,
        section3:sec3.data,
        section4:sec4.data,
    
    }

    // const config = {
    //     method: 'POST',
    //     headers: {
    //       'Accept' : 'application/json'
    //     }
    //   }

    //   try{
    //     const res = await axios.post('/api/frontend/posts', config)

    //     this.allPos = res.data.results;
    //   } catch(err){
    //     console.log(err)
    //   }
  },



  // async asyncSection () {
   
  //   const {section} = await axios.get('/api/frontend/postSections')
  //   return {sections:section}
  // },

//  async created(){
//       const config = {
//         method: 'POST',
//         headers: {
//           'Accept' : 'application/json'
//         }
//       }

//       try{
//         const res = await axios.post('/api/frontend/posts', config)

//         this.allPos = res.data.results;
//       } catch(err){
//         console.log(err)
//       }

      
//   },

  

    // computed: {
    //   ...mapGetters(["posts"]),
    // },
    
  //  created() {
  //    this.$store.dispatch('setPosts', this.loadedPosts)
  //  },
    
  // mounted() {
  //   this.$nextTick(function () {
      
     
  // })
  // }
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