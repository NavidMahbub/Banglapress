<template>
  <div class="c">
    <!-- <nuxt-link to="/about">Abouts</nuxt-link> -->

    <!-- <font-awesome-icon :icon="['fab', 'linkedin']"/> -->
    <div style="margin-top:200px"></div>
    <Featured />

    <div class="popular-news-area ">
      <div class="container">
        <!-- <div class="col-12 col-lg-4">
                  <div class="row" >
                    <div class="card w-100 mb-2">
                        <div class="row">
                        
                          <div class="col-md-3">
                              <img class="m-1 w-100 img-fluid" style="max-height: 200px;" src="http://nlpfarsi.ir/sysnews_img/photos/2063161.jpg" alt="">
                          </div>
                          <div class="card-body text-right col-md-8">
                              <h5 class="card-title">এনআরসি থেকে বাদ পড়াদের আরও কঠিন হুঁশিয়ারি অমিত শাহর</h5>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
		
	          </div> -->
        <div class="row mb-30">
          <div class="col-12 col-lg-12">
            <div class="card-deck">
              <div class="card">
                <img
                  src="https://picsum.photos/600/300/?image=25"
                  class="card-img-top"
                  alt="..."
                />
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">
                    This is a longer card with supporting text below as a
                    natural lead-in to additional content. This content is a
                    little bit longer.
                  </p>
                  <p class="card-text">
                    <small class="text-muted">Last updated 3 mins ago</small>
                  </p>
                </div>
              </div>
              <div class="card">
                <img
                  src="https://picsum.photos/600/300/?image=25"
                  class="card-img-top"
                  alt="..."
                />
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">
                    This card has supporting text below as a natural lead-in to
                    additional content.
                  </p>
                  <p class="card-text">
                    <small class="text-muted">Last updated 3 mins ago</small>
                  </p>
                </div>
              </div>
              <div class="card">
                <img
                  src="https://picsum.photos/600/300/?image=25"
                  class="card-img-top"
                  alt="..."
                />
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">
                    This is a wider card with supporting text below as a natural
                    lead-in to additional content. This card has even longer
                    content than the first to show that equal height action.
                  </p>
                  <p class="card-text">
                    <small class="text-muted">Last updated 3 mins ago</small>
                  </p>
                </div>
              </div>
              <div class="card">
                <img
                  src="https://picsum.photos/600/300/?image=25"
                  class="card-img-top"
                  alt="..."
                />
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">
                    This is a wider card with supporting text below as a natural
                    lead-in to additional content. This card has even longer
                    content than the first to show that equal height action.
                  </p>
                  <p class="card-text">
                    <small class="text-muted">Last updated 3 mins ago</small>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row mb-30">
          <div class="col-12 col-lg-12">
            <div class="card-deck">
              <div class="card">
                <img
                  src="https://picsum.photos/600/300/?image=25"
                  class="card-img-top"
                  alt="..."
                />
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">
                    This is a longer card with supporting text below as a
                    natural lead-in to additional content. This content is a
                    little bit longer.
                  </p>
                  <p class="card-text">
                    <small class="text-muted">Last updated 3 mins ago</small>
                  </p>
                </div>
              </div>
              <div class="card">
                <img
                  src="https://picsum.photos/600/300/?image=25"
                  class="card-img-top"
                  alt="..."
                />
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">
                    This card has supporting text below as a natural lead-in to
                    additional content.
                  </p>
                  <p class="card-text">
                    <small class="text-muted">Last updated 3 mins ago</small>
                  </p>
                </div>
              </div>
              <div class="card">
                <img
                  src="https://picsum.photos/600/300/?image=25"
                  class="card-img-top"
                  alt="..."
                />
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">
                    This is a wider card with supporting text below as a natural
                    lead-in to additional content. This card has even longer
                    content than the first to show that equal height action.
                  </p>
                  <p class="card-text">
                    <small class="text-muted">Last updated 3 mins ago</small>
                  </p>
                </div>
              </div>
              <div class="card">
                <img
                  src="https://picsum.photos/600/300/?image=25"
                  class="card-img-top"
                  alt="..."
                />
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">
                    This is a wider card with supporting text below as a natural
                    lead-in to additional content. This card has even longer
                    content than the first to show that equal height action.
                  </p>
                  <p class="card-text">
                    <small class="text-muted">Last updated 3 mins ago</small>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <Footer />
  </div>
</template>

<script>
import Logo from "@/components/Logo.vue";
import Hero from "@/components/Hero.vue";
import Featured from "@/components/FeaturedPost/Featured.vue";
import Carousel1 from "@/components/carousels/Carousel1";
import NewsBlock1 from "@/components/home/NewsBlock1";
import NewsBlock2 from "@/components/home/NewsBlock2";
import Footer from "@/components/Footer";

export default {
  components: {
    Logo,
    Hero,
    Featured,
    Carousel1,
    NewsBlock1,
    NewsBlock2,
    Footer
  },
  data() {
    return {
      title: "Home"
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
  }
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
