import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';
import {RESOURCE_TEACHER} from './api/api_admin';
Vue.use(Vuex);

const storeteacher = {
    namespaced: true,
    state: {
        teachers: [],
        teacher: {},
    },
    mutations: {
        FETCH(state,  teachers) {
            state. teachers =  teachers;
        },
        FETCH_ONE(state, teacher) {
            state.teacher = teacher;
        },
    },
    actions: {

        fetch({ commit }) {
            return axios.get(RESOURCE_TEACHER+'/index')
                .then(response => commit('FETCH', response.data))
                .catch();
        },
        fetchOne({ commit },id) {
            axios.get(`${RESOURCE_TEACHER}/show/${id}`)
               .then(response => {
                   return commit('FETCH_ONE', response.data[0])})
               .catch();
       },
        delete({}, id) {
            axios.delete(`${RESOURCE_TEACHER}/destroy/${id}`)
                .then(() => this.dispatch('teacher/fetch'))
                .catch();
        },
        edit({}, teacher) {
            axios.put(`${RESOURCE_TEACHER}/update/${teacher.id}`, {
                teacher_name: teacher.teacher_name,
                gender: teacher.gender,
                password: teacher.password,
                birthday: teacher.birthday,
                image_teacher:teacher.image_teacher,
                address:teacheraddress,
                email: teacher.email,
                status: teacher.status,
                first_name: teacher.first_name,
                last_name: teacher.last_name,
                phone: teacher.phone,
            })
            .then();
        },
        add({}, teacher) {
            axios.post(`${RESOURCE_TEACHER}/store/`, {
                teacher_name: teacher.teacher_name,
                gender: teacher.gender,
                password: teacher.password,
                birthday: teacher.birthday,
                image_teacher:teacher.image_teacher,
                address:teacheraddress,
                email: teacher.email,
                status: teacher.status,
                first_name: teacher.first_name,
                last_name: teacher.last_name,
                phone: teacher.phone,
            })
                .then();
        }
    }
};

export default storeteacher;