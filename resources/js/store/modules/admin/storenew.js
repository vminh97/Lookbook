import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';
import {RESOURCE_NEW} from './api/api_admin';
Vue.use(Vuex);

const storenewtoday = {
    namespaced: true,
    state: {
        newtodays: [],
        newtoday: {},
    },
    mutations: {
        FETCH(state,newtodays) {
            state. newtodays =  newtodays;
        },
        FETCH_ONE(state,newtoday) {
            state.newtoday = newtoday;
        },
    },
    actions: {

        fetch({ commit }) {
            return axios.get(RESOURCE_NEW+'/index')
                .then(response => commit('FETCH', response.data))
                .catch();
        },
        fetchOne({ commit },id) {
            axios.get(`${RESOURCE_NEW}/show/${id}`)
               .then(response => {
                   return commit('FETCH_ONE', response.data[0])})
               .catch();
       },
        delete({}, id) {
            axios.delete(`${RESOURCE_NEW}/destroy/${id}`)
                .then(() => this.dispatch('new/fetch'))
                .catch();
        },
        edit({}, newtoday) {
            axios.put(`${RESOURCE_NEW}/update/${newtoday.id}`, {
               title_news: newtoday.title_news,
               description_news: newtoday.description_news,
               content_news:newtoday.content_news,
               editer_by: newtoday.editer_by,
               user_id: newtoday.user_id,
               status: newtoday.status,
               news_Date: newtoday.news_Date,
               news_image: newtoday.news_image,
               category_id: newtoday.category_id,
            })
            .then();
        },
        add({}, newtoday) {
            axios.post(`${RESOURCE_NEW}/store/`, {
                title_news: newtoday.title_news,
                description_news: newtoday.description_news,
                content_news:newtoday.content_news,
                editer_by: newtoday.editer_by,
                user_id: newtoday.user_id,
                status: newtoday.status,
                news_Date: newtoday.news_Date,
                news_image: newtoday.news_image,
                category_id: newtoday.category_id,
            })
            .then();
        }
    }
};

export default storenewtoday;