import axios from "axios"

const state = {
    roles:[],
    permission:{
         id:null,
         role_name : null ,
        'category_view' : false ,   
        'category_viewall' :false,   
        'category_create':false,
        'category_update':false,
        'category_updateall':false,
        'category_delete':false,
        'category_deleteall':false,
  
        'topic_view' : false ,   
        'topic_viewall' :false,   
        'topic_create':false,
        'topic_update':false,
        'topic_updateall':false,
        'topic_delete':false,
        'topic_deleteall':false,

        'area_view' : false ,   
        'area_viewall' :false,   
        'area_create':false,
        'area_update':false,
        'area_updateall':false,
        'area_delete':false,
        'area_deleteall':false,

        'scroll_view' : false ,   
        'scroll_viewall' :false,   
        'scroll_create':false,
        'scroll_update':false,
        'scroll_updateall':false,
        'scroll_delete':false,
        'scroll_deleteall':false,

        'news_view' : false ,   
        'news_viewall' :false,   
        'news_create':false,
        'news_update':false,
        'news_updateall':false,
        'news_delete':false,
        'news_deleteall':false,

        'album_view' : false ,   
        'album_viewall' :false,   
        'album_create':false,
        'album_update':false,
        'album_updateall':false,
        'album_delete':false,
        'album_deleteall':false,
  
        'role_view' : false ,   
        'role_viewall' :false,   
        'role_create':false,
        'role_update':false,
        'role_updateall':false,
        'role_delete':false,
        'role_deleteall':false,

        'user_view' : false ,   
        'user_viewall' :false,   
        'user_create':false,
        'user_update':false,
        'user_updateall':false,
        'user_delete':false,
        'user_deleteall':false,
  
    },

    initial_permission:{
         id:null ,
         role_name : null ,
        'category_view' : false ,   
        'category_viewall' :false,   
        'category_create':false,
        'category_update':false,
        'category_updateall':false,
        'category_delete':false,
        'category_deleteall':false,
  
        'topic_view' : false ,   
        'topic_viewall' :false,   
        'topic_create':false,
        'topic_update':false,
        'topic_updateall':false,
        'topic_delete':false,
        'topic_deleteall':false,

        'area_view' : false ,   
        'area_viewall' :false,   
        'area_create':false,
        'area_update':false,
        'area_updateall':false,
        'area_delete':false,
        'area_deleteall':false,

        'scroll_view' : false ,   
        'scroll_viewall' :false,   
        'scroll_create':false,
        'scroll_update':false,
        'scroll_updateall':false,
        'scroll_delete':false,
        'scroll_deleteall':false,

        'news_view' : false ,   
        'news_viewall' :false,   
        'news_create':false,
        'news_update':false,
        'news_updateall':false,
        'news_delete':false,
        'news_deleteall':false,


        'album_view' : false ,   
        'album_viewall' :false,   
        'album_create':false,
        'album_update':false,
        'album_updateall':false,
        'album_delete':false,
        'album_deleteall':false,
  
        'role_view' : false ,   
        'role_viewall' :false,   
        'role_create':false,
        'role_update':false,
        'role_updateall':false,
        'role_delete':false,
        'role_deleteall':false,

        'user_view' : false ,   
        'user_viewall' :false,   
        'user_create':false,
        'user_update':false,
        'user_updateall':false,
        'user_delete':false,
        'user_deleteall':false,
          
    },
}

const getters = {
    get_permission(state){
        return state.permission 
    },
    role_list(state){
        return state.roles
    },
}

const actions = {
    ['FETCH_ROLE_DETAIL']({commit},id){
        commit('SET_ROLE_DETAIL',id)
    },

    ['FETCH_ROLES']({commit}){
        return new Promise((resolve,reject)=>{
            axios.get('api/role').then(response=>{
                resolve(response)
                commit('SET_ROLES',response.data)
            }).catch(error=>{
                reject(error)
            })
        })
    },
    ['ADD_ROLE']({commit},payload){
        return new Promise((resolve,reject)=>{
            axios.post('api/role/',payload).then(response=>{
                resolve(response)
            }).catch(error=>{
                reject(error)
            })
        })
    },
    ['DELETE_ROLE']({commit},id){
        return new Promise((resolve,reject)=>{
            axios.delete(`api/role/${id}`).then(response=>{
                resolve(response)
            }).catch(error=>{
                reject(error)
            })
        })
    },
    ['EMPTY_ROLE']({commit}){
        commit('SET_EMPTY_ROLE')
    },
    ['UPDATE_ROLE']({commit},payload){
        return new Promise((resolve,reject)=>{
            axios.put(`api/role/`,payload).then(response=>{
                resolve(response)
            }).catch(error=>{
                reject(error)
            })
        })
    }
}
const mutations = {
    ['SET_ROLES'](state,payload){
        state.roles = payload
    },
    ['SET_EMPTY_ROLE'](state){
        state.permission = { ...state.initial_permission}
    },
    ['SET_ROLE_DETAIL'](state,id){
        if(state.roles.length){
            let temp =  state.roles.find(v => v.id == id)
            state.permission = { ...temp.permission} 
            state.permission.role_name = temp.name 
            state.permission.id = temp.id 
        }
    },
    ['SET_UPDATE_ROLE'](state,payload){

    }
}



export default {
    state,
    getters ,
    mutations,
    actions,
}