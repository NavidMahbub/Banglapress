import axios from "axios"
const state = {
    tags:[],
    paginate_tags:[],
}

const getters = {
    tag_list(state){
        return state.tags 
    },
    paginate_tag_list(state){
        return state.paginate_tags 
    },
}

const actions = {
    ['FETCH_TAGS']({commit}){
        return new Promise((resolve,reject)=>{
            axios.get('/api/tag/list/all').then(response=>{
                commit('SET_TAGS',response.data)
                resolve(response)
            }).catch(error=>{
                reject(error)
            })
        })
    },
    ['FETCH_PAGINATE_TAGS']({commit},page){
        return new Promise((resolve,reject)=>{
            axios.get(`/api/tag/list/?page=${page}`).then(response=>{
                commit('SET_PAGINATE_TAGS',response.data)
                resolve(response)
            }).catch(error=>{
                reject(error)
            })
        })
    },
    ['ADD_TAG']({commit},payload){
        return new Promise((resolve,reject)=>{
            axios.post('/api/tag/',payload).then(response=>{
                // commit('SET_TAGS',response.data)
                resolve(response)
            }).catch(error=>{
                reject(error)
            })
        })
    },
    ['UPDATE_TAG']({commit},payload){
        return new Promise((resolve,reject)=>{
            axios.put(`/api/tag/${payload.id}`,payload.data).then(response=>{
                // commit('SET_TAGS',response.data)
                resolve(response)
            }).catch(error=>{
                reject(error)
            })
        })     
    },
    ['DELETE_TAG']({commit},id){
        return new Promise((resolve,reject)=>{
            axios.delete(`/api/tag/${id}`).then(response=>{
                // commit('SET_TAGS',response.data)
                resolve(response)
            }).catch(error=>{
                reject(error)
            })
        })     
    },

}

const mutations = {
    ['SET_TAGS'](state,payload){
        state.tags = payload
        // set add new tag object 
        // state.tags.push({
        //     title:`add new`,
        //     id: 0 ,
        // })
    },
    ['SET_PAGINATE_TAGS'](state,payload){
        state.paginate_tags = payload
    },
}

export default {
    state,
    getters,
    actions,
    mutations,
}