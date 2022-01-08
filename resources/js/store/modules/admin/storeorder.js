import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';
import {RESOURCE_ORDER} from './api/api_admin';
Vue.use(Vuex);

const storeorder = {
    namespaced: true,
    state: {
        orders: [],
        order: {},
    },
    mutations: {
        FETCH(state,  orders) {
            state. orders =  orders;
        },
        FETCH_ONE(state, order) {
            state.order = order;
        },
    },
    actions: {

        async fetch({ commit }) {
            return axios.get(RESOURCE_ORDER+'/index')
                .then(response => commit('FETCH', response.data))
                .catch();
        },
        fetchOne({ commit },id) {
            axios.get(`${RESOURCE_ORDER}/show/${id}`)
               .then(response => {
                   return commit('FETCH_ONE', response.data[0])})
               .catch();
       },
        delete({}, id) {
            axios.delete(`${RESOURCE_ORDER}/destroy/${id}`)
                .then(() => this.dispatch('order/fetch'))
                .catch();
        },
        edit({}, order) {
            axios.put(`${RESOURCE_ORDER}/update/${order.id}`, {

            })
            .then();
        },
    }
};

export default storeorder;