const webpack = require("webpack");

export default {
  mode: 'universal',
  /*
  ** Headers of the page
  */
  head: {
    title: process.env.npm_package_name || '',
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: process.env.npm_package_description || '' }
    ],
    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' },

    ],
    script: [
      { src: 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM' ,crossorigin: 'anonymous' }
    ]
  },
  /*
  ** Customize the progress-bar color
  */
  loading: { color: '#fff' },
  /*
  ** Global CSS
  */
  css: [
    '~/assets/css/style.css',
    // 'bootstrap',
    'bootstrap-vue',
    'jquery',
    // '~/assets/css/bootstrap.min.css',
    '~/assets/css/owl.carousel.min.css',
    '~/assets/css/fontawsome.css',
    '~/assets/css/animate.css',
    '~/assets/css/magnific-popup.css',
    '~/assets/css/custom-icon.css',
    '~/assets/css/classy-nav.min.css',
    '~/assets/css/nice-select.min.css',
    '~/assets/css/owl.carousel.min.css',
    '~/assets/css/w3.css',
  ],
  /*
  ** Plugins to load before mounting the App
  */
  plugins: [
    '~/plugins/vue-jquery',
    '~/plugins/axios'
  ],
  /*
  ** Nuxt.js dev-modules
  */
  buildModules: [
  ],
  /*
  ** Nuxt.js modules
  */
  modules: [
    // Doc: https://bootstrap-vue.js.org/docs/
    'bootstrap-vue/nuxt',
      [
        'nuxt-fontawesome', {
          imports: [
          {
            set: '@fortawesome/free-solid-svg-icons',
            icons: ['fas']
          },
          {
            set:'@fortawesome/free-brands-svg-icons',
            icons: ['fab']
          }
        ]
        }
    ],
    '@nuxtjs/axios',
  ],

  axios: {
    // proxyHeaders: false
  },
  /*
  ** Build configuration
  */
  build: {
     /**
     * add external plugins
     */
    vendor: ["jquery"],
    plugins: [
      new webpack.ProvidePlugin({
        $: "jquery"
      }),
    ],

   

    /*
    ** You can extend webpack config here
    */
    extend (config, ctx) {
    }
  },

   /*
    ** Base Use
    */

   env: {
    apiBaseUrl: 'http://api.banglapress.org'  
  },

  server: {
    port: 3000, // default: 3000
    // host: '0.0.0.0', // default: localhost
  },
}