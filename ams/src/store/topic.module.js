import axios from "axios"
const state = {
    topics:[],
}

const getters = {

    topic_list(state){
        return state.topics 
        // return state.topics.map((v) =>{
        //     let ob = {lable:'',...v}
        //     ob.lable = v.title 
        //     return ob 
        // })
    },
    topic_parents(state){
        return state.topics.filter((v)=>v.parent_id == null)
    },
} 

const actions = {
    ['FETCH_TOPICS']({commit}){
        return new Promise((resolve,reject)=>{
            axios.get('api/topic/list').then(response=>{
                resolve(response)
                commit('SET_TOPICS',response.data)
            }).catch(error=>{
                reject(error)
            })
        })
    },
    ['ADD_TOPIC']({commit},payload){
        return new Promise((resolve,reject)=>{
            axios.post('api/topic',payload).then(response=>{
                resolve(response)
            }).catch(error=>{
                reject(error)
            })
        })
    },
    ['UPDATE_TOPIC']({commit},payload){
        return new Promise((resolve,reject)=>{
            axios.put(`api/topic/${payload.id}`,payload.data).then(response=>{
                resolve(response)
            }).catch(error=>{
                reject(error)
            })
        })
    },
    ['DELETE_TOPIC']({commit},id){
        return new Promise((resolve,reject)=>{
            axios.delete(`api/topic/${id}`).then(response=>{
                resolve(response)
            }).catch(error=>{
                reject(error)
            })
        })
    }
}

const mutations = {
    ['SET_TOPICS'](state,payload){
        state.topics = payload
    },
}

export default {
    state,
    getters,
    actions,
    mutations,
}