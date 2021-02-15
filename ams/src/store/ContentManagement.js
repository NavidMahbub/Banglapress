import axios from "axios"
import iziToast from 'izitoast'
import { GET_CONTENT,ADD_CONTENT,DELETE_CONTENT} from "./action.type"
import { SET_GET_CONTENT,SET_ADD_CONTENT,SET_DELETE_CONTENT } from "./mutation.type"

const state = {
  contents:{},
};

const getters = {
  contents(state){
    return state.contents
  },
};

const actions = {

  [ADD_CONTENT]({commit},list) {
    let data = new FormData()
    data.append('title',list.title);
    data.append('file',list.file);
    data.append('type',list.type)
    if(list.content_category) data.append('content_category',list.content_category)
    return new Promise((resolve,reject)=>{
        axios.post('api/contentmanager/store',data,{method: 'PATCH',
        headers: {
          'Content-Type': 'multipart/form-data'
        }}).then(response => {
                commit(SET_ADD_CONTENT,response.data)
                resolve(response);
            })
            .catch(function(error) {
                reject(error);
            });
        });
    },

    [GET_CONTENT]({commit},data) {
      return new Promise((resolve, reject) => {
          axios
          .post("/api/contentmanager",data)
          .then(response => {
              commit(SET_GET_CONTENT,response.data);
              resolve(response);
          })
          .catch(function(error) {
              reject(error);
          });
      });
    },
    ['DELETE_CONTENT']({commit},id){
       return new Promise((resolve,reject)=>{
         axios.delete(`/api/contentmanager/delete/${id}`).then(response=>{
            resolve(response)
         }).catch(error=>{
            reject(error)
         })
       })
    },

    
};

const mutations = {
  [SET_GET_CONTENT](state, data)
  {
        state.contents = data;
  },
  [SET_ADD_CONTENT](state,data){
    state.contents.data.push(data);
  }
};


export default {
  state,
  actions,
  mutations,
  getters,
};
