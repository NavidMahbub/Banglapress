<template>
 <div>
		
 <nav class="navbar navbar-expand-sm   navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <nuxt-link to="/" class="navbar-brand" ><i class="fas fa-home"></i></nuxt-link>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <span v-for="(category,key ) in categories" v-bind:key="key">
      <li v-if="category.children.length>0"  @mouseover="hover=key"
      @mouseleave="hover = 'a'" class="nav-item dropdown dmenu">
         <nuxt-link :to="'/category/'+category.id+'/'+category.label"  class="nav-link dropdown-toggle"  id="navbardrop" data-toggle="dropdown" >{{category.label}}</nuxt-link>
        <div class="dropdown-menu sm-menu" :style="hover==key?'display: block':'display: none'">
           <nuxt-link :to="'/category/' + item.label" class="dropdown-item" v-for="(item,keyi) in category.children" v-bind:key="keyi">{{item.label}}</nuxt-link>
        </div>
      </li>
      <li v-else class="nav-item">
        <nuxt-link :to="'/category/'+category.id+'/'+category.label"  class="nav-link">{{category.label}}</nuxt-link>
      </li>
      </span>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <!-- <button class="btn btn-outline-default my-2 my-sm-0" type="submit">Search</button> -->
    </form>
  </div>
</nav>

    
</div>
</template>

<script>

import axios from '@/plugins/axios'
export default {
  name: 'MainNavnar',
  props: ['categories', 'id','category'],
  data() {
    return{
      hover:'a',
      // category: {
      //   id: '',
      //   label: '',
      //   parent_id: '',
      //   children: '',
        
      // }

      
    }
  },
 
  computed: {
    categoryChild () {
      
      array.forEach(element => {
        
      });
    }
  }

}
</script>

<style scoped>

.navbar{
    background: #e91d24 !important;
}

.dropdown{
    border-radius:0;
    border:0;
}
.dropdown-menu{
    background: #e91d24;
    border:0;
    top:80%;
    border-radius:0px 0px 5px 5px;
}
.dropdown-item:hover{
    background:#a5050a;
    color:#fff;
}
.dropdown-menu a{
    color:#fff;
} 
.navbar .nav-item .nav-link{
    color:#eee !important; 
    
}
.navbar .nav-item .nav-link:hover .navbar .nav-item .nav-link{
    color:red !important;
    
}
</style>