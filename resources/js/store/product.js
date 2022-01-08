import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';
import {RESOURCE_PRODUCT} from '@/api/apiproduct';

Vue.use(Vuex);

const productStore = {
    namespaced: true,
    state: {
        products: [],
        product: {},
    },
    mutations: {
        FETCH(state, products) {
            state.products = products;
        },
        FETCH_ONE(state, product) {
            state.product = product;
        },
    },
    actions: {
        fetch({ commit }) {
            return axios.get(RESOURCE_PRODUCT)
                .then(response => commit('FETCH', response.data))
                .catch();
        },
        deleteProduct({}, id) {
            axios.delete(`${RESOURCE_PRODUCT}/${id}`)
                .then(() => this.dispatch('product/fetch'))
                .catch();
        },
        editProduct({}, product) {
            axios.post(`${RESOURCE_PRODUCT}/${product.id}`, {
                name: product.name,
                price: product.price,
            })
            .then();
        },
        addProduct({}, product) {
            axios.post(`${RESOURCE_PRODUCT}`, {
                name: product.name,
                price: product.price,
            })
            .then();
        }
    }
};

export default productStore;