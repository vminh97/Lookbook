import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';
import {RESOURCE_HASTANG} from './api/api_admin';
Vue.use(Vuex);

const storehastang = {
    namespaced: true,
    state: {
        hastangs: [],
        hastang: {},
    },
    mutations: {
        FETCH(state,  hastangs) {
            state. hastangs =  hastangs;
        },
        FETCH_ONE(state, hastang) {
            state.hastang = hastang;
        },
    },
    actions: {

        fetch({ commit }) {
            return axios.get(RESOURCE_HASTANG+'/index')
                .then(response => commit('FETCH', response.data))
                .catch();
        },
        fetchOne({ commit },id) {
            axios.get(`${RESOURCE_HASTANG}/show/${id}`)
               .then(response => {
                   return commit('FETCH_ONE', response.data[0])})
               .catch();
       },
        delete({}, id) {
            axios.delete(`${RESOURCE_HASTANG}/destroy/${id}`)
                .then(() => this.dispatch('hastang/fetch'))
                .catch();
        },
        edit({}, hastang) {
            axios.put(`${RESOURCE_HASTANG}/update/${hastang.id}`, {
               hastang_title : hastang.hastang_title,
               status : hastang.status,
               start_date: hastang.start_date,
               end_date : hastang.end_date,
               isDisplay : hastang.isDisplay,
               keyword : hastang.keyword,
               description : hastang.description,
               show_order : hastang.show_order,
            })
            .then();
        },
        add({}, hastang) {
            axios.post(`${RESOURCE_HASTANG}/store/`, {
                hastang_title : hastang.hastang_title,
                status : hastang.status,
                start_date: hastang.start_date,
                end_date : hastang.end_date,
                isDisplay : hastang.isDisplay,
                keyword : hastang.keyword,
                description : hastang.description,
                show_order : hastang.show_order,
            })
                .then();
        }
    }
};

export default storehastang;