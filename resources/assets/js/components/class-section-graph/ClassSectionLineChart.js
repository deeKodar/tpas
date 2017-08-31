// import axios from 'axios';
// import { Line } from 'vue-chartjs';
//
// export default Line.extend({
//     mounted() {
//
//         axios.get(`http://tpas.app/class-section`)
//             .then(response => {
//                 console.log(response)
//                 this.rows = response.data.data.rows
//                 this.labels = response.data.data.labels
//                 //console.log(this.labels);
//                 this.setGraph()
//         })
//
//     },
//
//     data() {
//         return {
//             rows: [],
//             labels: []
//         }
//     },
//
//     methods: {
//         setGraph() {
//             this.renderChart(
//                 {
//                     labels: this.labels,
//                     datasets: [
//                         {
//                             label: 'School Strength',
//                             backgroundColor: '#dd1111',
//                             data: this.rows
//                         }
//                     ]
//                 },
//
//                 {
//                     responsive: false,
//                     maintainAspectRatio: false
//                 }
//             )
//         }
//
//     }
//
// })
//import axios from 'axios'
import { Line } from 'vue-chartjs'
//import { classSectionData } from './../../config'

export default Line.extend({

    data () {
        // return {
        //     rows: [],
        //     labels: []
        // }
        return {
            options: { //Chart.js options
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        },
                        gridLines: {
                            display: true
                        }
                    }],
                    xAxes: [ {
                        gridLines: {
                            display: false
                        }
                    }]
                },
                legend: {
                    display: true
                },
                responsive: true,
                maintainAspectRatio: false
            }
        }
    },

    mounted () {
        this.renderChart(this.chartData, this.options)

        // axios.get(classSectionData)
        //     .then(resp => {
        //         console.log('resp', resp.data.data)
        //         this.rows = resp.data.data.rows
        //         //console.log(this.rows)
        //         this.labels = resp.data.data.labels
        //         //this.setUpGraph()
        //     })
        //this.setUpGraph()
        //console.log("Test")
    },



    // methods: {
    //     // setUpGraph() {
    //     //     this.renderChart({
    //     //         //labels: ['Class PP', 'Class I', 'Class 3'],
    //     //         labels: this.labels,
    //     //         datasets: [
    //     //             {label: 'School Strength', backgroundColor: '#dd4b39', data: this.rows}
    //     //         ]
    //     //     }, {responsive: true, maintainAspectRatio: false})
    //     // }
    //     setUpGraph: function() {
    //         this.renderChart({
    //             labels: this.labels,
    //             datasets: [
    //                 {label: 'School Strength', backgroundColor: '#dd4b39', data: this.rows}
    //             ]
    //         }, {responsive: true, maintainAspectRatio: false})
    //     }
    // }

})

// import { Line } from 'vue-chartjs';
//
// export default Line.extend({
//     mounted() {
//         this.renderChart(
//             {
//                 labels: ['English', 'Math', 'Dzongkha', 'EVS', 'Physics'],
//                 datasets: [
//                     {
//                         label: 'Teachers 2017',
//                         backgroundColor: 'blue',
//                         data: [10, 15, 5, 25, 8]
//                     },
//                     {
//                         label: 'Teachers 2018',
//                         backgroundColor: 'green',
//                         data: [12, 12, 8, 30, 18]
//                     }
//                 ]
//             },
//
//             {
//                 responsive: true,
//                 maintainAspectRatio: false,
//                 barPercentage: .8
//             }
//         )
//     }
//
// })

