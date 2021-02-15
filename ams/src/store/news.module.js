import axios from "axios"

const state = {
    news:[],
    reporter_news:[],
    news_data:{
        id: null,
        shoulder:'',
        headline:'',
        hanger:'',
        reporter:'',
        user:'',
        author: "",
        content:"",
        featured_image_id:'',
        featured_video_id:'',
        video_position:'',
        share_at:null,
        publish_at:null,
        status:true,
        instant_article:false,

        news_tags: [],
        selected_topics:[],
        selected_categories:[],
        selected_areas:[],
        selected_positions:[],
        selected_scrolls:[],


        // relational 
        tag_ids:[],
        topic_ids:[],
        category_ids:[],
        area_ids:[],
        scroll_ids:[],
        content_ids:[], // photoes & video // media 

        featured_img:{
            id:'',
            title:'',
            file:''
        },
        featured_vid:{
            id:'',
            title:'',
            file:''
        },    
        more_photo_arr:[],
        is_update:false,
    },

    initial_news_data:{
        id: null,
        shoulder:'',
        headline:'',
        hanger:'',
        reporter:'',
        user:'',
        author: "",
        content:"",
        featured_image_id:'',
        featured_video_id:'',
        video_position:'',
        share_at:null,
        publish_at:null,
        status:true,
        instant_article:true,

        news_tags: [],
        selected_topics:[],
        selected_categories:[],
        selected_areas:[],
        selected_positions:[],
        selected_scrolls:[],


        // relational 
        tag_ids:[],
        topic_ids:[],
        category_ids:[],
        area_ids:[],
        scroll_ids:[],
        content_ids:[], // photoes & video // media 

        featured_img:{
            id:'',
            title:'',
            file:''
        },
        featured_vid:{
            id:'',
            title:'',
            file:''
        },    
        more_photo_arr:[],
        is_update:false,

    },


}
const getters = {
    reporter_news(state){return state.reporter_news},
    news_list(state){
        return state.news
    },
    news_data(state){
        return state.news_data
    }
}
const actions = {
    ['FETCH_NEWS']({commit}){
        return new Promise((resolve,reject)=>{
           axios.get('/api/post/list').then(response=>{
                commit('SET_NEWS',response.data)
                resolve(response)
           }).catch(error=>{
                reject(error)
           })
            
        })
    },
    ['ADD_NEWS']({commit},payload){

        return new Promise((resolve,reject)=>{
            axios.post('/api/post',payload).then(response=>{
                resolve(response)
            }).catch(error=>{
                reject(error)
            })
        })
    },
    ['UPDATE_NEWS']({commit},payload){

        return new Promise((resolve,reject)=>{
            axios.put(`/api/post/${payload.id}`,payload.data).then(response=>{
                resolve(response)
            }).catch(error=>{
                reject(error)
            })
        })
    },
    ['DELETE_NEWS']({commit},id){
        return new Promise((resolve,reject)=>{
            axios.delete(`api/post/${id}`).then(response=>{
                resolve(response)
            }).catch(error=>{
                reject(error)
            })
        })
    },
    ['NEWS_DETAIL']({commit},id){
        return new Promise((resolve,reject)=>{
            axios.get(`api/post/${id}`).then(response=>{
                resolve(response)
                commit('SET_DETAIL',response.data)
            }).catch(error=>{
                reject(error)
            })
        })
    },
    ['REST_NEWS']({commit}){
        commit('EMPTY_NEWS_DATA')
    },

    ['FETCH_REPORTER_NEWS']({commit}){
        return new Promise((resolve,reject)=>{
            axios.get('api/post/reporter/list').then(response=>{
                commit('SET_REPORTER_NEWS',response.data)
                resolve(response)
            }).catch(error=>{
                reject(error)
            })
        })
    },
}

const mutations = {
    ['SET_UPDATE'](state){
        state.news_data.is_update = true 
    },
    ['SET_REPORTER_NEWS'](state,payload){
        state.reporter_news = payload
    },
    ['EMPTY_NEWS_DATA'](state){
        state.news_data = {...state.initial_news_data}
    },
    ['SET_NEWS'](state,payload){
        state.news = payload
    },
    ['SET_NEWS_DATA'](state,payload){
        state.news_data = payload
    },
    ['SET_DETAIL'](state,payload){
        state.news_data = { ...state.news_data , ...payload}
        state.news_data.selected_topics = payload.selected_topics.map( v=> v.id)
        // state.news_data.news_tags = payload.news_tags.map( v=> v.id)
        state.news_data.selected_categories = payload.selected_categories.map( v=> v.id)
        state.news_data.selected_areas = payload.selected_areas.map( v=> v.id)    
        state.news_data.is_update = true 
        state.news_data.featured_vid = state.news_data.featured_vid ? state.news_data.featured_vid : state.initial_news_data.featured_vid  
        state.news_data.featured_img = state.news_data.featured_img ? state.news_data.featured_img : state.initial_news_data.featured_img  
    },
}

export default {
    state,
    getters ,
    actions,
    mutations
}