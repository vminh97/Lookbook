import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';
import {RESOURCE_ORDERDETAIL} from './api/api_admin';
Vue.use(Vuex);

const storeorderdetail = {
    namespaced: true,
    state: {
        orderdetails: [],
        orderdetail: {},
    },
    mutations: {
        FETCH(state,  orderdetails) {
            state. orderdetails =  orderdetails;
        },
        FETCH_ONE(state, orderdetail) {
            state.orderdetail = orderdetail;
        },
    },
    actions: {

         fetch({ commit }) {
            return axios.get(RESOURCE_ORDERDETAIL+'/index')
                .then(response => commit('FETCH', response.data))
                .catch();
        },
        fetchOne({ commit },id) {
            axios.get(`${RESOURCE_ORDERDETAIL}/show/${id}`)
               .then(response => {
                   return commit('FETCH_ONE', response.data[0])})
               .catch();
        },
        delete({}, id) {
            axios.delete(`${RESOURCE_ORDERDETAIL}/destroy/${id}`)
                .then(() => this.dispatch('order/fetch'))
                .catch();
        },
    }
};

export default storeorderdetail;