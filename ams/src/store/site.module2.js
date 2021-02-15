import axios from "axios"
const state = {
    site_info:[],
    content_list : [],
}

const getters = {

    site_list(state){
        return state.site_info 
    },
    contentList(state){ return state.content_list },
} 

const actions = {
    [`UPDATE_CONTENT_LIST`]({commit},payload){
        commit(`SET_CONTENT_LIST`,payload)
    },
    ['FETCH_SITE_INFOS']({commit}){
        return new Promise((resolve,reject)=>{
            axios.get('api/site_info/list').then(response=>{
                resolve(response)
                commit('SET_SITE_INFOS',response.data)
            }).catch(error=>{
                reject(error)
            })
        })
    },
    ['ADD_SITE_INFO']({commit},payload){
        let form_data = new FormData 
        form_data.append('title',paylaod.title)
        form_data.append('slug',paylaod.slug)
        form_data.append('content',paylaod.contents)
       
        if(paylaod.id!=``){
            form_data.append(`_method`,`PUT`)
            form_data.append(`id`,paylaod.id)
        }
        return new Promise((resolve,reject)=>{
            axios.post(`api/site_info`,form_data,{method: `PATCH`}).then(response=>{
                resolve(response)
            }).catch(error=>{
                reject(error)
            })
        })
    },
    ['DELETE_SITE_INFO']({commit},id){
        return new Promise((resolve,reject)=>{
            axios.delete(`api/site_info/${id}`).then(response=>{
                resolve(response)
            }).catch(error=>{
                reject(error)
            })
        })
    }
}

const mutations = {
    [`SET_CONTENT_LIST`](state,payload){
        state.content_list = payload
    },
    ['SET_SITE_INFOS'](state,payload){
        state.site_info = payload
    },
}

export default {
    state,
    getters,
    actions,
    mutations,
}