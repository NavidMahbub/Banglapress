<template>
  <div class="container">
      <div class="col-md-12">
          <div class="row" style="margin-top:40px">
              
              <div class="col-12 col-lg-8">

                  <div class="blog-posts-area">
                      <div v-if="loading">
                        <SmallLoader :counts='1'></SmallLoader>
                      </div>
                      <!-- Single Featured Post -->
                      <div v-else class="single-blog-post featured-post single-post">
                          <div class="post-thumb">
                              <a  v-if="item.FeaturedImage!='' || item.FeaturedImage!=null" href="#">
                                <img class="tutorial_thumnail" v-if="item.FeaturedImage.type=='image'" :src="item.FeaturedImage.file_name" alt="Card image cap">
                                <video class="tutorial_thumnail" v-else-if="item.FeaturedImage.type=='video'" :src="item.FeaturedImage.file_name" alt="Card video cap" controls ></video>
                                <audio class="tutorial_thumnail" v-if="item.FeaturedImage.type=='audio'" :src="item.FeaturedImage.file_name"  alt="Card audio cap" controls ></audio>
                              </a>
                              <a v-else href="#">
                                <img src="@/assets/images/16.jpg" alt="">
                              </a>
                          </div>
                          <div class="post-data">
                              <a href="#" class="post-catagory">{{item.headline}}</a>
                              <a href="#" class="post-title">
                                  <h6>{{item.shoulder}}</h6>
                              </a>
                              <div class="post-meta">
                                  <p class="post-author">By <a href="#">Christinne Williams</a></p>
                                  <p v-html="item.content"></p>
                                  <div class="newspaper-post-like d-flex align-items-center justify-content-between">
                                      <!-- Tags -->
                                      <div class="newspaper-tags d-flex">
                                          <span>Tags:</span>
                                          <ul class="d-flex">
                                              <li v-for="(tag,key) in item.PostTag" v-bind:key="key"><a href="#">{{}}</a></li>
                                              <li><a href="#">politics,</a></li>
                                              <li><a href="#">stock market</a></li>
                                          </ul>
                                      </div>

                                      <!-- Post Like & Post Comment -->
                                      <div class="d-flex align-items-center post-like--comments">
                                          <a href="#" class="post-like"><img src="img/core-img/like.png" alt=""> <span>392</span></a>
                                          <a href="#" class="post-comment"><img src="img/core-img/chat.png" alt=""> <span>10</span></a>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>

                      <!-- About Author -->
                      <div class="blog-post-author d-flex">
                          <div class="author-thumbnail">
                              <img src="img/bg-img/32.jpg" alt="">
                          </div>
                          <div class="author-info">
                              <a href="#" class="author-name">James Smith, <span>The Author</span></a>
                              <p>Donec turpis erat, scelerisque id euismod sit amet, fermentum vel dolor. Nulla facilisi. Sed pellen tesque lectus et accu msan aliquam. Fusce lobortis cursus quam, id mattis sapien.</p>
                          </div>
                      </div>

                      <div class="pager d-flex align-items-center justify-content-between">
                          <div class="prev">
                              <a href="#" class="active"><i class="fa fa-angle-left"></i> previous</a>
                          </div>
                          <div class="next">
                              <a href="#">Next <i class="fa fa-angle-right"></i></a>
                          </div>
                      </div>

                      <div class="section-heading">
                          <h6>Related</h6>
                      </div>

                      <div class="row">
                          <!-- Single Post -->
                          <div class="col-12 col-md-6">
                              <div class="single-blog-post style-3 mb-80">
                                  <div class="post-thumb">
                                      <a href="#"><img src="img/bg-img/12.jpg" alt=""></a>
                                  </div>
                                  <div class="post-data">
                                      <a href="#" class="post-catagory">Finance</a>
                                      <a href="#" class="post-title">
                                          <h6>Dolor sit amet, consectetur adipiscing elit. Nam eu metus sit amet odio sodales placer. Sed varius leo ac...</h6>
                                      </a>
                                      <div class="post-meta d-flex align-items-center">
                                          <a href="#" class="post-like"><img src="img/core-img/like.png" alt=""> <span>392</span></a>
                                          <a href="#" class="post-comment"><img src="img/core-img/chat.png" alt=""> <span>10</span></a>
                                      </div>
                                  </div>
                              </div>
                          </div>

                          <!-- Single Post -->
                          <div class="col-12 col-md-6">
                              <div class="single-blog-post style-3 mb-80">
                                  <div class="post-thumb">
                                      <a href="#"><img src="img/bg-img/13.jpg" alt=""></a>
                                  </div>
                                  <div class="post-data">
                                      <a href="#" class="post-catagory">Finance</a>
                                      <a href="#" class="post-title">
                                          <h6>Dolor sit amet, consectetur adipiscing elit. Nam eu metus sit amet odio sodales placer. Sed varius leo ac...</h6>
                                      </a>
                                      <div class="post-meta d-flex align-items-center">
                                          <a href="#" class="post-like"><img src="img/core-img/like.png" alt=""> <span>392</span></a>
                                          <a href="#" class="post-comment"><img src="img/core-img/chat.png" alt=""> <span>10</span></a>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>

                      <!-- Comment Area Start -->
                      <div class="comment_area clearfix">
                          <h5 class="title">3 Comments</h5>

                          <ol>
                              <!-- Single Comment Area -->
                              <li class="single_comment_area">
                                  <!-- Comment Content -->
                                  <div class="comment-content d-flex">
                                      <!-- Comment Author -->
                                      <div class="comment-author">
                                          <img src="img/bg-img/30.jpg" alt="author">
                                      </div>
                                      <!-- Comment Meta -->
                                      <div class="comment-meta">
                                          <a href="#" class="post-author">Christian Williams</a>
                                          <a href="#" class="post-date">April 15, 2018</a>
                                          <p>Donec turpis erat, scelerisque id euismod sit amet, fermentum vel dolor. Nulla facilisi. Sed pellen tesque lectus et accu msan aliquam. Fusce lobortis cursus quam, id mattis sapien.</p>
                                      </div>
                                  </div>
                                  <ol class="children">
                                      <li class="single_comment_area">
                                          <!-- Comment Content -->
                                          <div class="comment-content d-flex">
                                              <!-- Comment Author -->
                                              <div class="comment-author">
                                                  <img src="img/bg-img/31.jpg" alt="author">
                                              </div>
                                              <!-- Comment Meta -->
                                              <div class="comment-meta">
                                                  <a href="#" class="post-author">Sandy Doe</a>
                                                  <a href="#" class="post-date">April 15, 2018</a>
                                                  <p>Donec turpis erat, scelerisque id euismod sit amet, fermentum vel dolor. Nulla facilisi. Sed pellen tesque lectus et accu msan aliquam. Fusce lobortis cursus quam, id mattis sapien.</p>
                                              </div>
                                          </div>
                                      </li>
                                  </ol>
                              </li>

                              <!-- Single Comment Area -->
                              <li class="single_comment_area">
                                  <!-- Comment Content -->
                                  <div class="comment-content d-flex">
                                      <!-- Comment Author -->
                                      <div class="comment-author">
                                          <img src="img/bg-img/32.jpg" alt="author">
                                      </div>
                                      <!-- Comment Meta -->
                                      <div class="comment-meta">
                                          <a href="#" class="post-author">Christian Williams</a>
                                          <a href="#" class="post-date">April 15, 2018</a>
                                          <p>Donec turpis erat, scelerisque id euismod sit amet, fermentum vel dolor. Nulla facilisi. Sed pellen tesque lectus et accu msan aliquam. Fusce lobortis cursus quam, id mattis sapien.</p>
                                      </div>
                                  </div>
                              </li>
                          </ol>
                      </div>

                      <div class="post-a-comment-area section-padding-80-0">
                          <h4>Leave a comment</h4>
                          
                          <!-- Reply Form -->
                          <div class="contact-form-area">
                              <form action="#" method="post">
                                  <div class="row">
                                      <div class="col-12 col-lg-6">
                                          <input type="text" class="form-control" id="name" placeholder="Name*">
                                      </div>
                                      <div class="col-12 col-lg-6">
                                          <input type="email" class="form-control" id="email" placeholder="Email*">
                                      </div>
                                      <div class="col-12">
                                          <input type="text" class="form-control" id="subject" placeholder="Website">
                                      </div>
                                      <div class="col-12">
                                          <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                                      </div>
                                      <div class="col-12 text-center">
                                          <button class="btn newspaper-btn mt-30 w-100" type="submit">Submit Comment</button>
                                      </div>
                                  </div>
                              </form>
                          </div>
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
import SmallLoader from "@/components/share/loader/SmallLoader";
import Featured from "@/components/share/post/featured";
import PopularLatest from "@/components/share/post/PopularLatest";
export default {
  name:"PostDetails",
  components: {
    SmallLoader,
    PopularLatest,
    Featured
  },
  data() {
    return {
      title: "PostDetails",
      item:{},
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
        axios.get('/api/frontend/post/'+this.$route.params.id).then((response) => {      
            this.item = response.data;
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
