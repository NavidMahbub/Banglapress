import axios from "axios"
const state = {
    categories:[],
}

const getters = {

    category_list(state){
        return state.categories 
        // return state.categories.map((v) =>{
        //     let ob = {lable:'',...v}
        //     ob.lable = v.title 
        //     return ob 
        // })
    },
    category_parents(state){
        return state.categories.filter((v)=>v.parent_id == null)
    },
} 

const actions = {
    ['FETCH_CATEGORIES']({commit}){
        return new Promise((resolve,reject)=>{
            axios.get('api/category/list').then(response=>{
                resolve(response)
                commit('SET_CATEGORIES',response.data)
            }).catch(error=>{
                reject(error)
            })
        })
    },
    ['ADD_CATEGORY']({commit},payload){

       
        return new Promise((resolve,reject)=>{
            axios.post('api/category',payload).then(response=>{
                resolve(response)
            }).catch(error=>{
                reject(error)
            })
        })
    },
    ['UPDATE_CATEGORY']({commit},payload){
        //console.log('press update')
        return new Promise((resolve,reject)=>{
            axios.put(`api/category/${payload.id}`,payload.data).then(response=>{
                resolve(response)
            }).catch(error=>{
                reject(error)
            })
        })
    },
    ['DELETE_CATEGORY']({commit},id){
        return new Promise((resolve,reject)=>{
            axios.delete(`api/category/${id}`).then(response=>{
                resolve(response)
            }).catch(error=>{
                reject(error)
            })
        })
    }
}

const mutations = {
    ['SET_CATEGORIES'](state,payload){
        state.categories = payload
    },
}

export default {
    state,
    getters,
    actions,
    mutations,
}