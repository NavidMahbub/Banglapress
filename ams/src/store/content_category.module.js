import axios from "axios"

const state = {

    content_categories:[] ,
    paginate_content_categories:[] ,
}

const getters = {
    content_category_list(state){
        return state.content_categories 
    },
    content_category_parents(state){
         let temp =  state.content_categories
         if(temp.length){
             return temp.filter(v => v.parent_id == null )
         }else{
             return [] 
         } 
    },
    paginate_content_category_list(state){
        return state.paginate_content_categories 
    }
}

const actions = {
    ['FETCH_CONTENT_CATEGORIES']({commit},page){
        return new Promise((resolve,reject)=>{
            axios.get(`/api/content_category/list`).then(response=>{
                commit('SET_CONTENT_CATEGORIES',response.data)
                resolve(response)
            }).catch(error=>{
                reject(error)
            })
        })
    },
    ['FETCH_PAGINATE_CONTENT_CATEGORIES']({commit},page){
        return new Promise((resolve,reject)=>{
            axios.get(`/api/content_category/list/paginate?page=${page}`).then(response=>{
                commit('SET_PAGINATE_CONTENT_CATEGORIES',response.data)
                resolve(response)
            }).catch(error=>{
                reject(error)
            })
        })
    },
    ['ADD_CONTENT_CATEGORY']({commit},payload){
        return new Promise((resolve,reject)=>{
            axios.post(`/api/content_category`,payload).then(response=>{
                resolve(response)
            }).catch(error=>{
                reject(error)
            })
        })
    },
    ['UPDATE_CONTENT_CATEGORY']({commit},payload){
        return new Promise((resolve,reject)=>{
            axios.put(`/api/content_category/${payload.id}`,payload.data).then(response=>{
                resolve(response)
            }).catch(error=>{
                reject(error)
            })
        })
    },
    ['DELETE_CONTENT_CATEGORY']({commit},id){
        return new Promise((resolve,reject)=>{
            axios.delete(`/api/content_category/${id}`).then(response=>{
                resolve(response)
            }).catch(error=>{
                reject(error)
            })
        })
    }
}

const mutations = {
    ['SET_CONTENT_CATEGORIES'](state,payload){
        state.content_categories = payload
    },
    ['SET_PAGINATE_CONTENT_CATEGORIES'](state,payload){
        state.paginate_content_categories = payload
    },
}
export default{
    state,
    getters,
    actions,
    mutations ,
}