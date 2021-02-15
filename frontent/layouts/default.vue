<template>
  <div>
    <header class="header-area">
    <!-- Top Header Area -->
    <top-header />

    <!-- Navbar Area -->
  
  <div v-if="isMobile">
      <MobileNavbar :categories = "categories" />
  </div>
   <div v-else>
     <MainNavbar :categories = "categories"/>  
  </div>

  </header>
    <div>
      <nuxt />
    </div>
    <Footer />
    
  </div>
</template>

<script>
import { isMobile } from 'mobile-device-detect';
import axios from '@/plugins/axios'
import Header from "~/components/Header"
import TopHeader from "~/components/TopHeader"
import MainNavbar from "~/components/MainNavbar"
import MobileNavbar from "~/components/MobileNavbar"
import Footer from '@/components/Footer'
import Loader from '~/components/loader/Loader'

export default {
  components: {
    TopHeader,
    Header,
    TopHeader,
    MainNavbar,
    Footer,
    Loader,
    MobileNavbar
  },
 
  data() {
    return {
      show: false,
      title : 'Home',
      categories:[],
      loading: false,
      isMobile: isMobile,
      sidebarShow: isMobile?false:true,
      crossHide: true
      
    }
  },
  asyncData () {
    alert('aa');
    return axios.get(`/api/frontend/categories`)
    .then((res) => {
      return { categories: res.data }
    })
    .catch((e) => {
     alert('ss');
    })
  },
  mounted() {            

      this.getCategories();
  },
 
  // async asyncData () {
  //   const {data} = await axios.get('/api/frontend/categories')
  //   return {categories:data}
  // },

  methods: {
     getCategories(){
           axios.get('/api/frontend/categories').then((response) => {      
                  this.categories = response.data;

                }).catch(function (error) {                    
                });
        },
    toggleNavbar() {
      this.show = !this.show;
    }
  },

  
  
}
</script>

<style scoped>
a:hover {
  color: #ee002d;
}

.pointer{
  cursor: pointer;
}


</style>
