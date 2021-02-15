import axios from "axios"

const state = {
    scrolls:[],
}

const getters = {
    scroll_list(state){ return state.scrolls},
    scroll_parents(state){
        if(state.scrolls.length){
            return state.scrolls.filter((v)=>v.parent_id == null)
        }else{
            return state.scrolls
        }
    },
}

const actions = {
    ['FETCH_SCROLLS']({commit}){
        return new Promise((resolve,reject)=>{
            axios.get('api/scroll/list').then(response=>{
                resolve(response)
                commit('SET_SCROLLS',response.data)
            }).catch(error=>{
                reject(error)
            })
        })
    },
    ['ADD_SCROLL']({commit},payload){
        return new Promise((resolve,reject)=>{
            axios.post('api/scroll',payload).then(response=>{
                resolve(response)
            }).catch(error=>{
                reject(error)
            })
        })
    },
    ['UPDATE_SCROLL']({commit},payload){
        return new Promise((resolve,reject)=>{
            axios.put(`api/scroll/${payload.id}`,payload.data).then(response=>{
                resolve(response)
            }).catch(error=>{
                reject(error)
            })
        })
    },    
    ['DELETE_SCROLL']({commit},id){
        return new Promise((resolve,reject)=>{
            axios.delete(`api/scroll/${id}`).then(response=>{
                resolve(response)
            }).catch(error=>{
                reject(error)
            })
        })
    },
}

const mutations = {
    ['SET_SCROLLS'](state,payload){
        state.scrolls = payload    
    }
}


export default{
    state,
    getters,
    actions,
    mutations
}