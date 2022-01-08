import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';
import {RE_CATEGORY} from './api/api_client';
Vue.use(Vuex);

const clientcategory = {
    namespaced: true,
    state: {
        categorys1: [],
        category1: {},
    },
    mutations: {
        FETCH(state,categorys1) {
            state.categorys1 =  categorys1;
        },
        FETCH_ONE(state, category1) {
            state.category1 = category1;
        },
    },
    actions: {
        getmenu({ commit }) {
            return axios.get(RE_CATEGORY+'/getmenu')
                .then(response => commit('FETCH', response.data))
                .catch();
        },
    }
};

export default clientcategory;