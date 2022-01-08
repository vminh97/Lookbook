import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';
import {RESOURCE_COURSE} from './api/api_admin';
Vue.use(Vuex);

const storecourse = {
    namespaced: true,
    state: {
        courses: [],
        course: {},
        categorydetail:{}
    },
    mutations: {
        FETCH(state,  courses) {
            state. courses =  courses;
        },
        FETCH_ONE(state, course) {
            state.course = course;
        },
        FETCH_DETAIL(state, countcourse)
        {
            state.countcourse=countcourse;
        }
    },
    actions: {

        async fetch({ commit }) {
            return axios.get(RESOURCE_COURSE+'/index')
                .then(response => commit('FETCH', response.data))
                .catch();
        },
        fetchOne({ commit },id) {
            axios.get(`${RESOURCE_COURSE}/show/${id}`)
               .then(response => {
                   return commit('FETCH_ONE', response.data[0])})
               .catch();
       },
        getcoursebycategory({ commit },id) {
            axios.get(`${RESOURCE_COURSE}/getcoursebycategory/${id}`)
            .then(response => commit('FETCH', response.data))
                .catch();
        },
        getcountcourse({ commit },id) {
            axios.get(`${RESOURCE_COURSE}/getcountcourse/${id}`)
            .then(response => commit('FETCH_DETAIL', response.data))
                .catch();
        },
        delete({}, id) {
            axios.delete(`${RESOURCE_COURSE}/destroy/${id}`)
                .then(() => this.dispatch('course/fetch'))
                .catch();
        },
        edit({}, course) {
            axios.put(`${RESOURCE_COURSE}/update/${course.id}`, {
                slug_url : course.slug_url,
                name_product : course.name_product,
                teacher_id:course.teacher_id,
                introduction_product : course.introduction_product,
                content_product : course.content_product,
                title_procduct:course.title_procduct,
                certificate_id : course.certificate_id,
                category_id : course.category_id,
                name_brand : course.name_brand,
                price:course.price,
                price_no_tax : course.price_no_tax,
                price_offsale : course.price_offsale,
                price_offsale_no_tax:course.price_offsale_no_tax,
                product_image : course.product_image,
                product_image_text : course.product_image_text,
                video : course.video,
                material_name:course.material_name,
                search_keywords : course.search_keywords,
                list_image : course.list_image,
                isPublic:course.isPublic,
                isRefund : course.isRefund,
                isCertification : course.isCertification,
                isOnlinePayment:course.isOnlinePayment,
                isRate : course.isRate,
                isFreeShip : course.isFreeShip,
                timeRefund:course.timeRefund,
                count_video: course.count_video,
                sum_time_video : course.sum_time_video,
                date_start : course.date_start,
                date_end:course.date_end,
                count_discount : course.count_discount,
                activationcode : course.activationcode,
                date_promotion_start:course.date_promotion_start,
                date_promotion_end : course.date_promotion_end
            })
            .then();
        },
        add({}, course) {
            axios.post(`${RESOURCE_COURSE}/store/`, {
                slug_url : course.slug_url,
                name_product : course.name_product,
                teacher_id:course.teacher_id,
                introduction_product : course.introduction_product,
                content_product : course.content_product,
                title_procduct:course.title_procduct,
                certificate_id : course.certificate_id,
                category_id : course.category_id,
                name_brand : course.name_brand,
                price:course.price,
                price_no_tax : course.price_no_tax,
                price_offsale : course.price_offsale,
                price_offsale_no_tax:course.price_offsale_no_tax,
                product_image : course.product_image,
                product_image_text : course.product_image_text,
                video : course.video,
                material_name:course.material_name,
                search_keywords : course.search_keywords,
                list_image : course.list_image,
                isPublic:course.isPublic,
                isRefund : course.isRefund,
                isCertification : course.isCertification,
                isOnlinePayment:course.isOnlinePayment,
                isRate : course.isRate,
                isFreeShip : course.isFreeShip,
                timeRefund:course.timeRefund,
                count_video: course.count_video,
                sum_time_video : course.sum_time_video,
                date_start : course.date_start,
                date_end:course.date_end,
                count_discount : course.count_discount,
                activationcode : course.activationcode,
                date_promotion_start:course.date_promotion_start,
                date_promotion_end : course.date_promotion_end
            })
                .then();
        }
    }
};

export default storecourse;