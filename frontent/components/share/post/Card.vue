<template>
<div class="single-blog-post featured-post">
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
        <!-- <a href="#" class="post-catagory">Finance</a> -->
        <a href="#" class="post-title max_one_line_allow text_overflow">
            <h6>{{item.headline}}</h6>
        </a>
        <div class="post-meta">
            <p class="post-author">By <a href="#">Christinne Williams</a></p>
            <p class="post-excerp text_overflow max_two_lines_allow" v-html="item.content"></p>
            <!-- Post Like & Post Comment -->
            <div class="d-flex align-items-center">
                <a href="#" class="post-like"><img src="@/assets/images/core-img/like.png" alt=""> <span>392</span></a>
                <a href="#" class="post-comment"><img src="@/assets/images/core-img/chat.png" alt=""> <span>10</span></a>
            </div>
        </div>
    </div>
</div>
</template>

<script>

export default {
  components: {
    
  },
  props: ['item'],
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
