import Vue from 'vue'
import Router from 'vue-router'


const ContentIndex = () => import ('@/views/content/index');

export default new Router({
  mode: 'history', // https://router.vuejs.org/api/#mode
  linkActiveClass: 'open active',
  scrollBehavior: () => ({ y: 0 }),
  routes: [
    {
      path: '/admin/content',
      name: 'ContentIndex',
      component: ContentIndex,
      meta:{
        forAuth:true
      }
    }
    
  ]
})
