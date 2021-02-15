import axios from "axios"
const state = {
    areas:[],
}

const getters = {

    area_list(state){
        return state.areas 
        // return state.areas.map((v) =>{
        //     let ob = {lable:'',...v}
        //     ob.lable = v.title 
        //     return ob 
        // })
    },
    area_parents(state){
        return state.areas.filter((v)=>v.parent_id == null)
    },
} 

const actions = {
    ['FETCH_AREAS']({commit}){
        return new Promise((resolve,reject)=>{
            axios.get('api/area/list').then(response=>{
                resolve(response)
                commit('SET_AREAS',response.data)
            }).catch(error=>{
                reject(error)
            })
        })
    },
    ['ADD_AREA']({commit},payload){
        return new Promise((resolve,reject)=>{
            axios.post('api/area',payload).then(response=>{
                resolve(response)
            }).catch(error=>{
                reject(error)
            })
        })
    },
    ['UPDATE_AREA']({commit},payload){
        return new Promise((resolve,reject)=>{
            axios.put(`api/area/${payload.id}`,payload.data).then(response=>{
                resolve(response)
            }).catch(error=>{
                reject(error)
            })
        })
    },
    ['DELETE_AREA']({commit},id){
        return new Promise((resolve,reject)=>{
            axios.delete(`api/area/${id}`).then(response=>{
                resolve(response)
            }).catch(error=>{
                reject(error)
            })
        })
    }
}

const mutations = {
    ['SET_AREAS'](state,payload){
        state.areas = payload
    },
}

export default {
    state,
    getters,
    actions,
    mutations,
}