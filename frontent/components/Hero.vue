<template>
  <!-- ##### Hero Area Start ##### -->
  <div class="hero-area">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-12 col-lg-8">
          <!-- Breaking News Widget -->
          <div class="breaking-news-area d-flex align-items-center">
            <div class="news-title">
              <p>Breaking News</p>
            </div>
            <div class="breakingNews">
              <marquee
                behavior="scroll"
                direction="left"
                scrollamount="4"
                onmouseover="stop()"
                onmouseout="start()"
              >
                <span>
                  <nuxt-link to="/">* Welcome to Colorlib Family</nuxt-link>
                </span>

                <span>
                  <nuxt-link to="/"> * Welcome to Colorlib Family</nuxt-link>
                </span>
              </marquee>
            </div>
          </div>

          
        </div>

        <!-- Hero Add -->
        <HeroAdd />
      </div>
    </div>
  </div>
  <!-- ##### Hero Area End ##### -->
</template>

<script>
import HeroAdd from "./HeroAdd.vue";
export default {
  components: { HeroAdd },

  mounted() {
    this.$nextTick(function() {
      //   $.simpleTicker($("#breakingNewsTicker"), {
      //     speed: 1000,
      //     delay: 3000,
      //     easing: 'swing',
      //     effectType: 'roll'
      // })
    });
  }
};
</script>

<style scoped>
.breakingNews {
  width: 100%;
}
</style>
