<template>
  <!-- ##### Header Area Start ##### -->
  <header class="header-area">
    <!-- Top Header Area -->
    <top-header />

    <!-- Navbar Area -->
    <main-navbar />
  </header>
  <!-- ##### Header Area End ##### -->
</template>

<script>
import TopHeader from "~/components/TopHeader.vue";
import MainNavbar from "~/components/MainNavbar.vue";
export default {
  components: {
    TopHeader,
    MainNavbar
  },

  mounted() {
    // $("#myDiv").on("click", function() {
    //    alert("Hi!");
    // });
    $("body").on("click", "#myDiv", function() {
      alert("Hi!");
    });
  }
};
</script>
