import axios from "axios"
import iziToast from 'izitoast'
import { All_GALLERYC,ADD_GALLERYC,UPDATE_GALLERYC,DELETE_GALLERYC,SEARCH_GALLERYC} from "./action.type"
import { AFTER_ADD_GALLERYC,SET_GALLERYC,AFTER_UPDATE_GALLERYC,AFTER_DELETE_GALLERYC } from "./mutation.type"

const state = {
  galleryc: [],
  galleryc_p2:[]
};

const getters = {
  gallerycs(state){
    return state.galleryc
  },
  gallerycP2(state){
    return state.galleryc_p2
  }
};

const actions = {

  [All_GALLERYC]({commit},page) {
    return new Promise((resolve, reject) => {
        axios
        .post('/api/gcontents?page=' + page)
        .then(response => {
            // console.log(response)
            commit(SET_GALLERYC,response.data)
            resolve(response);
        })
        .catch(function(error) {
            reject(error);
        });
    });
},

    [ADD_GALLERYC]({commit},data) {
      return new Promise((resolve, reject) => {
          axios
          .post("gcontent",data)
          .then(response => {
              commit(AFTER_ADD_GALLERYC,response.data);

              resolve(response);
          })
          .catch(function(error) {
              reject(error);
          });
      });
    },

    [SEARCH_GALLERYC]({commit},data) {
      return new Promise((resolve, reject) => {
          axios
          .post('/api/gcontents?page=' + data.page,data.data)
          .then(response => {
              commit(SET_GALLERYC,response.data);

              resolve(response);
          })
          .catch(function(error) {
              reject(error);
          });
      });
  },
  [UPDATE_GALLERYC]({commit},data) {
      return new Promise((resolve, reject) => {
          axios
          .put("/gcontent",data.data)
          .then(response => {
              var update_data = response.data
              var index = data.index
              commit("AFTER_UPDATE_GALLERYC",{update_data,index});

              resolve(response);
          })
          .catch(function(error) {
              reject(error);
          });
      });
  },
  [DELETE_GALLERYC]({commit},data) {
      return new Promise((resolve, reject) => {
          axios
          .delete("/gcontent/"+data.id)
          .then(response => {
              commit("AFTER_DELETE_GALLERYC",data.index);

              resolve(response);
          })
          .catch(function(error) {
              reject(error);
          });
      });
    },
};

const mutations = {
  [SET_GALLERYC](state, data)
    {
        state.galleryc = data.data;
        state.galleryc_p2 = data;
    },

    [AFTER_ADD_GALLERYC](state, data)
    {
        state.galleryc.push(data);
    },
    [AFTER_UPDATE_GALLERYC](state,payload){
      state.galleryc.splice(payload.index,0,payload.update_data)
      state.galleryc.splice(payload.index+1,1)

      // state.branch_p2.splice(payload.index,0,payload.update_data)
      // state.branch_p2.splice(payload.index+1,1)
    },
    [AFTER_DELETE_GALLERYC](state,index){
      state.galleryc.splice(index,1)
      // state.branch_p2.splice(index,1)
    },

};


export default {
  state,
  actions,
  mutations,
  getters,
};
