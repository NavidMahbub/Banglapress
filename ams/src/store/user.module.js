import axios from "axios"

const state = {
    users: [],
    user:{
        id:null ,
        name:null ,
        email:null ,
        role:null ,
        password:null ,
        password2:null ,
    },
    initial_user_state :{
        id: null ,
        name:null ,
        email:null ,
        role:null ,
        password:null ,
        password2:null ,
    },

    auth_user_permissions:[],

}
const getters = {
    user_list(state){
        return state.users 
    },

    get_user(state){
        return state.user
    },
    auth_permission(){
        return state.auth_user_permissions 
    },
}
const actions = {
    ['FETCH_CURRENT_USER_PERMISSION']({commit}){
        return new Promise((resolve,reject)=>{
            axios.get(`/api/user/permission`).then(response=>{
                commit('SET_CURRENT_USER_PERMISSION',response.data)
                resolve(response)
            }).catch(error=>{   
                reject(error)
            })
        })
    },
    ['FETCH_USER_LIST']({commit}){
        return new Promise((resolve,reject)=>{
           axios.get('/api/user/list').then(response=>{
                commit('SET_USER_LIST',response.data)
                resolve(response)
           }).catch(error=>{
                reject(error)
           })
            
        })
    },
    ['ADD_USER']({commit},payload){
        return new Promise((resolve,reject)=>{
            axios.post('/api/user',payload).then(response=>{
                resolve(response)
            }).catch(error=>{
                reject(error)
            })
        })
    },
    ['UPDATE_USER']({commit},payload){
        return new Promise((resolve,reject)=>{
            axios.put(`/api/user/${payload.id}`,payload).then(response=>{
                resolve(response)
            }).catch(error=>{
                reject(error)
            })
        })
    },
    ['GET_USER_DETAIL']({commit},id){
        commit('SET_USER_DETAIL',id)
    },
    ['DELETE_USER']({commit},id){
        return new Promise((resolve,reject)=>{
            axios.delete(`/api/user/${id}`).then(response=>{
                resolve(response)
            }).catch(error=>{
                reject(error)
            })
        })
    },
    ['EMPTY_USER']({commit}){
        commit('SET_EMPTY_USER')
    }
}

const mutations = {
    ['SET_CURRENT_USER_PERMISSION'](state,payload){
        state.auth_user_permissions = payload 
    },
    ['SET_EMPTY_USER'](state){
        state.user = { ...state.initial_user_state}
    },
    ['SET_USER_DETAIL'](state,id){
        if(state.users.length){
            state.user = state.users.find( v => v.id == id)
        }
    },
    ['SET_USER_LIST'](state,payload){
        state.users = payload
    }
}

export default {
    state,
    getters ,
    actions,
    mutations
}