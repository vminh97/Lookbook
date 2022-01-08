import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'
Vue.use(Vuex)

// export default new Vuex.Store({
//   state: {
//     status: '',
//     remember_token: localStorage.getItem('remember_token') || '',
//     user : {}
//   },
//   mutations: {
//     auth_request(state){
//         state.status = 'loading'
//       },
//     auth_success(state, remember_token, user){
//       state.status = 'success'
//       state.remember_token = remember_token
//       state.user = user
//     },
//     auth_success2(state, remember_token, customer){
//       state.status = 'success'
//       state.remember_token = remember_token
//       state.customer = customer
//     },
//     auth_error(state){
//       state.status = 'error'
//     },
//     logout(state){
//       state.status = ''
//       state.remember_token = ''
//     },
//   },
//   actions: {
//     login({commit}, user){
//         return new Promise((resolve, reject) => {
//           commit('auth_request')
//           axios({url: 'http://localhost:8000/api/user/login', data: user, method: 'POST' })
//           .then(resp => {
//             const remember_token = resp.data.remember_token
//             const user = resp.data.user
//             localStorage.setItem('remember_token', remember_token)
//             axios.defaults.headers.common['Authorization'] = remember_token
//             commit('auth_success', remember_token, user)
//             resolve(resp)
//           })
//           .catch(err => {
//             commit('auth_error')
//             localStorage.removeItem('remember_token')
//             reject(err)
//           })
//         })
//     },
//     register({commit}, customer){
//         return new Promise((resolve, reject) => {
//             commit('auth_request')
//             axios({url: 'http://localhost:8000/api/customer/register', data: customer, method: 'POST' })
//             .then(resp => {
//             const remember_token = resp.data.remember_token
//             const customer = resp.data.customer
//             localStorage.setItem('remember_token', remember_token)
//             axios.defaults.headers.common['Authorization'] = remember_token
//             commit('auth_success2', remember_token, customer)
//             resolve(resp)
//             })
//             .catch(err => {
//             commit('auth_error', err)
//             localStorage.removeItem('remember_token')
//             reject(err)
//             })
//         })
//     },
//     logout({commit}){
//         return new Promise((resolve, reject) => {
//           commit('logout')
//           localStorage.removeItem('remember_token')
//           delete axios.defaults.headers.common['Authorization']
//           resolve()
//         })
//     }
//   },
//   getters : {
//     isLoggedIn: state => !!state.remember_token,
//     infouser:state=>!!state.user,
//     authStatus: state => state.status,
//   }
// })

import storecategory from "./store/modules/admin/storecategory";
import storecourse from "./store/modules/admin/storecourse";
import storecustomer from "./store/modules/admin/storecustomer";
import storehastang from "./store/modules/admin/storehastang";
import storenewtoday from "./store/modules/admin/storenew";
import storeteacher from "./store/modules/admin/storeteacher";
import storeorder from "./store/modules/admin/storeorder";
import storeorderdetail from "./store/modules/admin/storeorderdetail";
import clientcategory from "./store/modules/client/clientcategory";
// import Vuex from 'vuex';

const store = new Vuex.Store({
    modules: {
        category: storecategory,
        course: storecourse,
        customer: storecustomer,
        hastang: storehastang,
        newtoday: storenewtoday,
        teacher: storeteacher,
        order:storeorder,
        orderdetail:storeorderdetail,
        category1:clientcategory
    }
});

export default store;