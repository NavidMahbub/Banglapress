import axios from "axios"
const state = {
    site_info:[],
    site_detail: {
        id:``,
        title:``,
        slug:``,
        content: [],
    },
}

const getters = {

    site_list(state){
        return state.site_info 
    },
    siteDetail(state){
        return state.site_detail
    }
    
} 

const actions = {
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
        form_data.append('title',payload.title)
        form_data.append('slug',payload.slug)
        form_data.append('content',payload.contents)
        //console.log("Site :"+form_data)
       
        if(payload.id!=``){
            form_data.append(`_method`,`PUT`)
            form_data.append(`id`,payload.id)
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
    },
    [`GET_SITE_DETAIL`]({commit},id){
        return new Promise((resolve,reject)=>{
            axios.get(`api/site_info/${id}`).then(response=>{
                resolve(response)
                commit(`SET_SITE_DETAIL`,response.data)
            }).catch(error=>{
                reject(error)
            })
        })      
    },
}

const mutations = {
    [`SET_SITE_DETAIL`](state,payload){
            state.site_detail = payload
            if (state.site_detail.content == null) {
                state.site_detail.content = [] 
            }else{
                state.site_detail.content = JSON.parse(state.site_detail.content)
            }
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