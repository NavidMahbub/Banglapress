<template>
<div class="single-blog-post small-featured-post d-flex">
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
        <div class="post-meta">
            <a href="#" class="post-title max_one_line_allow text_overflow">
                <h6>{{item.headline}}</h6>
            </a>
            <p class="post-date"><span>7:00 AM</span> | <span>April 14</span></p>
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
