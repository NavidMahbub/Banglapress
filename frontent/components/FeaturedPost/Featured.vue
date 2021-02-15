<template>
  <!-- ##### Featured Post Area Start ##### -->
  <div class="featured-post-area">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-6 col-lg-8">
          <div class="row">
            <!-- Single Featured Post -->
            <div class="col-12 col-lg-7">
              <div class="single-blog-post featured-post">
                <div class="card">
                  <a href="#"
                    ><img
                      src="@/assets/images/16.jpg"
                      alt=""
                      style="height: 250px; width: 400px;"
                      class="card-body"
                  /></a>
                </div>
                <div class="post-data">
                  <a href="#" class="post-title">
                    <h4>
                      Financial news: A new company is born today at the stock
                      market
                    </h4>
                  </a>
                  <div class="post-meta">
                    <p class="post-excerp">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                      Nam eu metus sit amet odio sodales placerat. Sed varius
                      leo ac leo fermentum, eu cursus nunc maximus. Integer
                      convallis nisi nibh, et ornare neque ullamcorper ac.
                      <span style="color: red">details</span>..
                    </p>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 col-lg-5">
              <FeaturedSmall />
            </div>
          </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
          <!-- Single Featured Post -->
          <Carousel1 />
          <br />
          <Tab1 />
        </div>
      </div>
    </div>
  </div>
  <!-- ##### Featured Post Area End ##### -->
</template>

<script>
import Featured2 from "./Featured2";
import FeaturedSmall from "./FeaturedSmall";
import Tab1 from "../tabs/Tab1";
import Carousel1 from "../carousels/Carousel1";
export default {
  components: {
    Featured2,
    FeaturedSmall,
    Tab1,
    Carousel1
  }
};
</script>
