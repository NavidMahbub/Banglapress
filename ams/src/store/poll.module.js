import axios from "axios"
const state = {
    polls:[] ,
}

const getters = {
    paginate_polls(state){
        return state.polls ;
    }
}

const actions = {
    [`FETCH_POLLS`]({commit},page){
        return new Promise((resolve,reject)=>{
            axios.get(`api/poll/list?page=${page}`).then(response=>{
                commit('SET_POLLS',response.data)
                resolve(response)
            }).catch(error=>{
                reject(error)
            })
        })
    },
    [`ADD_POLL`]({commit},payload){

        //set from data 
        let form_data = new FormData 
        form_data.append('content',payload.content) 
        form_data.append('options',payload.options) 
        form_data.append('status',payload.status? 1 : 0) 
        form_data.append('publish_at',payload.publish_at) 
        form_data.append('expire_at',payload.expire_at) 
        if(payload.id!=``){
            form_data.append('_method','PUT')
            form_data.append('id',payload.id)
        }
        // decide if add or update 
        return new Promise((resolve,reject)=>{
            axios.post(`api/poll/`,form_data,{method:`PATCH`}).then(response=>{
                // commit('SET_POLLS',response.data)
                resolve(response)
            }).catch(error=>{
                reject(error)
            })
        })
    },
    [`DELETE_POLL`]({commit},id){
        return new Promise((resolve,reject)=>{
            axios.delete(`api/poll/${id}`).then(response=>{
                // commit('SET_POLLS',response.data)
                resolve(response)
            }).catch(error=>{
                reject(error)
            })
        })
    },
}

const mutations = {
    [`SET_POLLS`](state,payload){
        state.polls = payload 
    }
}

export default{
    state ,
    getters ,
    actions ,
    mutations ,
}