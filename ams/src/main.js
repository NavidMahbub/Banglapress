// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import 'core-js/es6/promise'
import 'core-js/es6/string'
import 'core-js/es7/array'
// import cssVars from 'css-vars-ponyfill'
import Vue from 'vue'
import BootstrapVue from 'bootstrap-vue'
import App from './App'
// router list
import router from './router'
//import content from './content'


import store from "./store/index";
import axios from 'axios'


require('./assets/css/style.css');
// require('./assets/core.js');
// //frontEnd
// require('./assets/css/frontend/colors.css');
// require('./assets/css/frontend/common_styles.css');
// require('./assets/css/frontend/custom.css');
// require('./assets/css/frontend/font-jade-embedded.css');
// require('./assets/css/frontend/media.css');
// // require('./assets/css/frontend/print.css');
// // require('./assets/css/frontend/style.css');
// require('./assets/css/frontend/styleb91b.css');
// require('./assets/css/frontend/widget_style.css');

import 'vue-ctk-date-time-picker/dist/vue-ctk-date-time-picker.css';
import Auth from './packages/Auth'
import iziToast from 'izitoast'
import Multiselect from 'vue-multiselect'
// import CKEditor from '@ckeditor/ckeditor5-vue';
// import Base64UploadAdapter from '@ckeditor/ckeditor5-upload/src/adapters/base64uploadadapter';
import ToggleButton from 'vue-js-toggle-button'
//search 
import Autocomplete from '@trevoreyre/autocomplete-vue'
import '@trevoreyre/autocomplete-vue/dist/style.css'
import VeeValidate from 'vee-validate';
// dialog 
import VuejsDialog from "vuejs-dialog"
// include the default style
import 'vuejs-dialog/dist/vuejs-dialog.min.css';
// import JsonExcel from 'vue-json-excel'
// import jsPDF from 'jspdf';
Vue.component('multiselect', Multiselect)
// Vue.use( CKEditor );
Vue.use(BootstrapVue,iziToast,Auth)
Vue.component('ToggleButton', ToggleButton)
Vue.component('pagination', require('laravel-vue-pagination'));
Vue.use(Autocomplete)
Vue.use(VeeValidate);
Vue.use(VuejsDialog)
Vue.prototype.$iziToast = iziToast
import  'bootstrap'
// axios.defaults.baseURL = 'http://nishutiapi.bemantech.com'
// axios.defaults.baseURL = 'http://api.banglapress.org'
// axios.defaults.baseURL = 'http://bpress.api.istiak.net/public'
axios.defaults.baseURL = 'http://localhost:8000'
axios.defaults.headers.common["Authorization"] = 'Bearer '+ Vue.auth.getToken()
// filters 
Vue.filter('test_filter',function(arg){
  return `i ❤ ${arg} `
})



Vue.filter('lang_filter',function(arg){
    let ret = store.getters.currentLang.admin_field[arg.toLowerCase()] 
    // return store.getters.currentLang ;
    if(ret){
      return ret 
    }else{
      return arg
    }
})


// ClassicEditor
//     .create( document.querySelector( '#editor' ), {
//         plugins: [ Base64UploadAdapter, ... ],
//         toolbar: [ ... ]
//     } )
//     .then( )
//     .catch();
// 

// import Vue from 'vue'
import VueQuillEditor from 'vue-quill-editor'

// require styles
import 'quill/dist/quill.core.css'
import 'quill/dist/quill.snow.css'
import 'quill/dist/quill.bubble.css'

Vue.use(VueQuillEditor, /* { default global options } */)



router.beforeEach(
  (to,from,next) => {
    if(to.matched.some(record => record.meta.forVisitors)){
      if(Vue.auth.isAuthenticated())
        next({
          path: '/dashboard'
        })
      else
        next()
    }

    else if(to.matched.some(record => record.meta.forAuth)){
      if(!Vue.auth.isAuthenticated())
      next({
        path: '/login'
      })
      else
        next()
    }

    else
      next()
  }
)

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  //content,
  store,
  template: '<App/>',
  components: {
    App
  }
})
