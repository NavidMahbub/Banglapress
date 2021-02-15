<template>
<div class="card">
    <img
        src="https://picsum.photos/600/300/?image=25"
        class="card-img-top"
        alt="..."
    />
    <div class="card-body">
        <h5 class="card-title">{{this.item.shoulder}}</h5>
        <p class="card-text">
        This card has supporting text below as a natural lead-in to
        additional content.
        </p>
        <p class="card-text">
        <small class="text-muted">Last updated 3 mins ago</small>
        </p>
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
