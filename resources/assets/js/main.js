// import Vue from 'vue';
// import WinsGraph from './components/WinsGraph';
//
// new Vue({
//     el: '#graph',
//
//     components: { WinsGraph }
// })

// var Vue = require('vue');
// import Vue from 'vue';
// // import Vue from 'vue/dist/vue.js';
// import SampleGraph from './components/SampleGraph';
//
// new Vue({
//     el: '#graph',
//     components: {
//         SampleGraph
//     },
// });

//import Chart from 'chart.js';
// import Chart from 'chart.js';
//
// var ctx = document.getElementById("graph").getContext('2d');
//
// var myChart = new Chart(ctx, {
//     type: 'bar',
//
//     data: {
//         labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
//         datasets: [{
//             label: '# of Votes',
//             data: [12, 19, 3, 5, 2, 3],
//             backgroundColor: [
//                 'rgba(255, 99, 132, 0.2)',
//                 'rgba(54, 162, 235, 0.2)',
//                 'rgba(255, 206, 86, 0.2)',
//                 'rgba(75, 192, 192, 0.2)',
//                 'rgba(153, 102, 255, 0.2)',
//                 'rgba(255, 159, 64, 0.2)'
//             ],
//             borderColor: [
//                 'rgba(255,99,132,1)',
//                 'rgba(54, 162, 235, 1)',
//                 'rgba(255, 206, 86, 1)',
//                 'rgba(75, 192, 192, 1)',
//                 'rgba(153, 102, 255, 1)',
//                 'rgba(255, 159, 64, 1)'
//             ],
//             borderWidth: 1
//         }]
//     },
//
//     options: {
//         scales: {
//             yAxes: [{
//                 ticks: {
//                     beginAtZero:true
//                 }
//             }]
//         },
//
//         legend: {
//             display: true,
//             labels: {
//                 fontColor: 'rgb(255, 99, 132)'
//             }
//         }
//
//     }
// });

// var ctx = document.getElementById("lineChart").getContext('2d');
//
// var myChart = new Chart(ctx, {
//     type: 'line',
//
//     data: {
//         labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
//         datasets: [{
//             label: '# of Votes',
//             data: [12, 19, 3, 5, 2, 3],
//             backgroundColor: [
//                 'rgba(255, 99, 132, 0.2)',
//                 'rgba(54, 162, 235, 0.2)',
//                 'rgba(255, 206, 86, 0.2)',
//                 'rgba(75, 192, 192, 0.2)',
//                 'rgba(153, 102, 255, 0.2)',
//                 'rgba(255, 159, 64, 0.2)'
//             ],
//             borderColor: [
//                 'rgba(255,99,132,1)',
//                 'rgba(54, 162, 235, 1)',
//                 'rgba(255, 206, 86, 1)',
//                 'rgba(75, 192, 192, 1)',
//                 'rgba(153, 102, 255, 1)',
//                 'rgba(255, 159, 64, 1)'
//             ],
//             borderWidth: 1
//         }]
//     },
//
//     options: {
//         scales: {
//             yAxes: [{
//                 ticks: {
//                     beginAtZero:true
//                 }
//             }]
//         },
//
//         legend: {
//             display: true,
//             labels: {
//                 fontColor: 'rgb(255, 99, 132)'
//             }
//         }
//
//     }
// });

//New Ways to Do Chart JS:

import Vue from 'vue';
import VueRouter from "vue-router";
import axios from "axios";
import VueAxios from "vue-axios";
import VueSocketio from 'vue-socket.io'
require ('./bootstrap.js')

// importing custom components
// import SidebarCollapse from "./components/SidebarCollapse";
// import ImageUpload from "./components/ImageUpload";
// import UserActivation from "./components/user-activation/UserActivation";
// import InfoBox from "./components/info-box/InfoBox";
// import UserImage from './components/UserImage'
// import ConfirmModal from './components/ConfirmModal'
//import ClassSectionGraph from './components/class-section-graph/ClassSectionGraph.vue';
//import SubjectTeacherGraph from './components/subject-teacher-graph/SubjectTeacherGraph.vue';
// import SectionGraphMain from './components/SampleGraph/SectionGraphMain.Vue';
import school from './components/school/school.vue'
//import section from './components/section/section.vue'

//Adding the X-CSRF-Token to all axios request
axios.interceptors.request.use(function(config){
    config.headers['X-CSRF-TOKEN'] = window.Laravel.csrfToken
    config.headers['APP'] = 'TPAS'
    return config
})

window.eventBus = new Vue({})

Vue.use(VueAxios, axios)
// Vue.use(VueRouter)
// Vue.use(VueSocketio, 'http://localhost:8890')

// Making axios available as $http
// so that the ajax calls are not axios dependent
//Vue.prototype.$http = axios

// Vue.component('sidebar-collapse', SidebarCollapse)
// Vue.component('image-upload', ImageUpload)
// Vue.component('user-activation', UserActivation)
// Vue.component('info-box', InfoBox)
// Vue.component('user-image', UserImage)
// Vue.component('confirm-modal', ConfirmModal)
//Vue.component('class-section-graph', ClassSectionGraph)
// Vue.component('class-section-graph', SectionGraphMain)
//Vue.component('subject-teacher-graph', SubjectTeacherGraph)
Vue.component('class-section-graph', school)

new Vue({
    el: '#graph',
    data: {
        message: 'Hello World!'
    }
})
