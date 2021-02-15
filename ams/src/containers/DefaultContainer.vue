<template>
  <div class="app">
    <AppHeader fixed>
      <SidebarToggler class="d-lg-none" display="md" mobile/>
      <b-link class="navbar-brand" to="#">
        <img class="navbar-brand-full" src="../static/banglapress.png" width="89" height="25" alt="CoreUI Logo">
      </b-link>
      <SidebarToggler  class="d-md-down-none" display="lg"/>
      <b-navbar-nav class="d-md-down-none">
        <b-nav-item class="px-3" to="/dashboard">{{"dashboard" | lang_filter }}</b-nav-item>
        <b-nav-item class="px-3">
          <multiselect :options="langList"  v-model="current_lang" track-by="id" label="title" placeholder="select language"></multiselect>
        </b-nav-item>
      </b-navbar-nav>
      <b-navbar-nav class="ml-auto">
        <!-- <b-nav-item class="d-md-down-none">
          <i class="icon-bell"></i>
          <b-badge pill variant="danger">5</b-badge>
        </b-nav-item> -->
        <!-- <b-nav-item class="d-md-down-none">
          <i class="icon-list"></i>
        </b-nav-item> -->
        <!-- <b-nav-item class="d-md-down-none">
          <i class="icon-location-pin"></i>
        </b-nav-item> -->
        <DefaultHeaderDropdownAccnt/>
      </b-navbar-nav>
      <!-- <AsideToggler class="d-none d-lg-block" /> -->
      <!-- <AsideToggler class="d-lg-none" mobile /> -->
    </AppHeader>
    <div class="app-body">
      <div>
        <AppSidebar fixed>
          <SidebarHeader/>
          <SidebarForm/>
          <SidebarNav   :navItems="nav"></SidebarNav>
          <SidebarFooter/>
          <SidebarMinimizer/>
        </AppSidebar>
      </div>
      <main class="main">
        <Breadcrumb :list="list"/>
        <div class="container-fluid">
          <router-view></router-view>
        </div>
      </main>
      <AppAside fixed>
        <!--aside-->
        <DefaultAside/>
      </AppAside>
    </div>
    <TheFooter>
      <!--footer-->
      <div>
        <a href="https://banglapress.org">BanglaPress</a>
        <span class="ml-1">&copy; 2019</span>
      </div>
      <div class="ml-auto">
        <span class="mr-1">Developed And Maintain By</span>
        <a href="http://bemantech.com/">Bemantech</a>
      </div>
    </TheFooter>
  </div>
</template>

<script>
import multiselect from "vue-multiselect"
import nav from '@/_nav'
import { Header as AppHeader, SidebarToggler, Sidebar as AppSidebar, SidebarFooter, SidebarForm, SidebarHeader, SidebarMinimizer, SidebarNav, Aside as AppAside, AsideToggler, Footer as TheFooter, Breadcrumb } from '@coreui/vue'
import DefaultAside from './DefaultAside'
import DefaultHeaderDropdownAccnt from './DefaultHeaderDropdownAccnt'
import { ALL_USER_ROLE } from '../store/action.type';
import { mapState,mapGetters } from "vuex"
export default {
  name: 'DefaultContainer',
  components: {
    AsideToggler,
    AppHeader,
    AppSidebar,
    AppAside,
    TheFooter,
    Breadcrumb,
    DefaultAside,
    DefaultHeaderDropdownAccnt,
    SidebarForm,
    SidebarFooter,
    SidebarToggler,
    SidebarHeader,
    SidebarNav,
    SidebarMinimizer,
    multiselect
  },
  data () {
    return {
      current_lang : ``,
      nav: nav.items,
      item2:'',
      navHide:false,
    }
  },
  watch:{
    current_lang:function(lang){
      this.$store.dispatch(`CURRENT_LANG`,lang.id)
    }
  },
  computed: {
    name () {
      return this.$route.name
    },

    list () {
      return this.$route.matched.filter((route) => route.name || route.meta.label )
    },
    ...mapGetters(["user","userinfo","authuser","langList"]),
  },
  methods:{
    allRole(){
      this.$store.dispatch('ALL_USER_ROLE')
    },
    getPermission(){
        this.$store.dispatch('ALL_USER_ROLE2')
        .then(response=>{
          if(response.data.id!=2){
            this.navHide=true;
          }
        })
    },

    // menuAdd(){
    //   var roles =  this.user_roles
    //   this.nav[12].children = []
    //   roles.forEach(element => {
    //     var a = {
    //       name: element.name,
    //       url: '/role-permission/'+element.id,
    //       icon: 'fa fa-money'
    //     }
    //     this.nav[12].children.push(a)
    //   })
    // }

  },

  mounted(){
    this.getPermission();
    // this.getLanguages();
    // var that = this
    // setInterval(function(){
    //     that.menuAdd()
    // },2000)
  }
}
</script>
