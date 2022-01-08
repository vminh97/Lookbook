import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';
import {RESOURCE_CUSTOMER} from './api/api_admin';
Vue.use(Vuex);

const storecustomer = {
    namespaced: true,
    state: {
        customers: [],
        customer: {},
    },
    mutations: {
        FETCH(state,  customers) {
            state. customers =  customers;
        },
        FETCH_ONE(state, customer) {
            state.customer = customer;
        },
    },
    actions: {

        fetch({ commit }) {
            return axios.get(RESOURCE_CUSTOMER+'/index')
                .then(response => commit('FETCH', response.data))
                .catch();
        },
        fetchOne({ commit },id) {
            axios.get(`${RESOURCE_CUSTOMER}/show/${id}`)
               .then(response => {
                   return commit('FETCH_ONE', response.data[0])})
               .catch();
       },
        delete({}, id) {
            axios.delete(`${RESOURCE_CUSTOMER}/destroy/${id}`)
                .then(() => this.dispatch('customer/fetch'))
                .catch();
        },
        edit({}, customer) {
            axios.put(`${RESOURCE_CUSTOMER}/update/${customer.id}`, {
                customer_name: customer.customer_name,
                gender: customer.gender,
                password: customer.password,
                birthday: customer.birthday,
                image_customer:customer.image_customer,
                address:customeraddress,
                email: customer.email,
                status: customer.status,
                first_name: customer.first_name,
                last_name: customer.last_name,
                phone: customer.phone,
            })
            .then();
        },
        add({}, customer) {
            axios.post(`${RESOURCE_CUSTOMER}/store/`, {
                customer_name: customer.customer_name,
                gender: customer.gender,
                password: customer.password,
                birthday: customer.birthday,
                image_customer:customer.image_customer,
                address:customeraddress,
                email: customer.email,
                status: customer.status,
                first_name: customer.first_name,
                last_name: customer.last_name,
                phone: customer.phone,
            })
                .then();
        }
    }
};

export default storecustomer;