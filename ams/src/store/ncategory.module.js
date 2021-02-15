import axios from "axios"
import iziToast from 'izitoast'
import { All_NCATEGORY,ADD_NCATEGORY,UPDATE_NCATEGORY,DELETE_NCATEGORY,SEARCH_NCATEGORY} from "./action.type"
import { AFTER_ADD_NCATEGORY,SET_NCATEGORY,AFTER_UPDATE_NCATEGORY,AFTER_DELETE_NCATEGORY } from "./mutation.type"

const state = {
  ncategory: [],
  ncategory_p2:[]
};

const getters = {
  ncategorys(state){
    return state.ncategory
  },
  ncategoryP2(state){
    return state.ncategory_p2
  }
};

const actions = {

  [All_NCATEGORY]({commit},page) {
    return new Promise((resolve, reject) => {
        axios
        .post('/api/ncategorys?page=' + page)
        .then(response => {
            // console.log(response)
            commit(SET_NCATEGORY,response.data)
            resolve(response);
        })
        .catch(function(error) {
            reject(error);
        });
    });
},

    [ADD_NCATEGORY]({commit},data) {
      return new Promise((resolve, reject) => {
          axios
          .post("ncategory",data)
          .then(response => {
              commit(AFTER_ADD_NCATEGORY,response.data);

              resolve(response);
          })
          .catch(function(error) {
              reject(error);
          });
      });
    },

    [SEARCH_NCATEGORY]({commit},data) {
      return new Promise((resolve, reject) => {
          axios
          .post('/api/ncategorys?page=' + data.page,data.data)
          .then(response => {
              commit(SET_NCATEGORY,response.data);

              resolve(response);
          })
          .catch(function(error) {
              reject(error);
          });
      });
  },
  [UPDATE_NCATEGORY]({commit},data) {
      return new Promise((resolve, reject) => {
          axios
          .put("/ncategory",data.data)
          .then(response => {
              var update_data = response.data
              var index = data.index
              commit("AFTER_UPDATE_NCATEGORY",{update_data,index});

              resolve(response);
          })
          .catch(function(error) {
              reject(error);
          });
      });
  },
  [DELETE_NCATEGORY]({commit},data) {
      return new Promise((resolve, reject) => {
          axios
          .delete("/ncategory/"+data.id)
          .then(response => {
              commit("AFTER_DELETE_NCATEGORY",data.index);

              resolve(response);
          })
          .catch(function(error) {
              reject(error);
          });
      });
    },
};

const mutations = {
  [SET_NCATEGORY](state, data)
    {
        state.ncategory = data.data;
        state.ncategory_p2 = data;
    },

    [AFTER_ADD_NCATEGORY](state, data)
    {
        state.ncategory.push(data);
    },
    [AFTER_UPDATE_NCATEGORY](state,payload){
      state.ncategory.splice(payload.index,0,payload.update_data)
      state.ncategory.splice(payload.index+1,1)

      // state.branch_p2.splice(payload.index,0,payload.update_data)
      // state.branch_p2.splice(payload.index+1,1)
    },
    [AFTER_DELETE_NCATEGORY](state,index){
      state.ncategory.splice(index,1)
      // state.branch_p2.splice(index,1)
    },

};


export default {
  state,
  actions,
  mutations,
  getters,
};
