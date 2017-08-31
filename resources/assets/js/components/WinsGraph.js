// import Chart from 'chart.js';
//
// export default {
//     template: `
//
//         <div>
//         <canvas width="800" height="600" id="wins-graph" v-html="legend"></canvas>
//
//         <!--{{{ legend }}}-->
//         </div>
//     `,
//
//     props: ['player', 'opponent'],
//
//     data() {
//         return {
//             legend: ''
//         };
//     },
//
//     mounted() {
//         var data = {
//             labels: ['Wins'],
//
//             datasets: [
//
//                 {
//                     label: this.player.name,
//                     data: [this.player.wins],
//                     backgroundColor: [
//                         'rgba(255, 99, 132, 0.2)',
//                         'rgba(54, 162, 235, 0.2)',
//                         'rgba(255, 206, 86, 0.2)',
//                         'rgba(75, 192, 192, 0.2)',
//                         'rgba(153, 102, 255, 0.2)',
//                         'rgba(255, 159, 64, 0.2)'
//                     ],
//                     borderColor: [
//                         'rgba(255,99,132,1)',
//                         'rgba(54, 162, 235, 1)',
//                         'rgba(255, 206, 86, 1)',
//                         'rgba(75, 192, 192, 1)',
//                         'rgba(153, 102, 255, 1)',
//                         'rgba(255, 159, 64, 1)'
//                     ],
//                     borderWidth: 1
//                 },
//
//                 {
//                     label: this.opponent.name,
//                     data: [this.opponent.wins],
//                     backgroundColor: [
//                         'rgba(211, 77, 121, 0.1)',
//                         'rgba(54, 162, 235, 0.2)',
//                         'rgba(255, 206, 86, 0.2)',
//                         'rgba(75, 192, 192, 0.2)',
//                         'rgba(153, 102, 255, 0.2)',
//                         'rgba(255, 159, 64, 0.2)'
//                     ],
//                     borderColor: [
//                         'rgba(255,99,132,1)',
//                         'rgba(54, 162, 235, 1)',
//                         'rgba(255, 206, 86, 1)',
//                         'rgba(75, 192, 192, 1)',
//                         'rgba(153, 102, 255, 1)',
//                         'rgba(255, 159, 64, 1)'
//                     ],
//                     borderWidth: 1
//                 },
//
//             ]
//         };
//
//        var ctx = document.getElementById("wins-graph").getContext('2d');
//
//         // const chart = new Chart(
//         //     this.$refs.canvas.getContent('2d')
//         // ).Bar(data);
//
//         const myChart = new Chart(ctx, {
//             type: 'bar',
//             data: data,
//         });
//
//         this.legend = myChart.generateLegend();
//     }
//
// }


// import Chart from 'chart.js';
//
// export default {
//     template: `
//          <div>
//          <canvas width="800" height="600" id="canvas"></canvas>
//          </div>
//     `,
//
//     props: ['player', 'opponent'],
//
//     data() {
//         return {
//             legend: ''
//         };
//     },
//
//     ready() {
//
//         var data = {
//
//             labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
//
//             datasets: [
//
//                 {
//                 label: '# of Votes',
//                 data: [12, 19, 3, 5, 2, 3],
//                 backgroundColor: [
//                     'rgba(255, 99, 132, 0.2)',
//                     'rgba(54, 162, 235, 0.2)',
//                     'rgba(255, 206, 86, 0.2)',
//                     'rgba(75, 192, 192, 0.2)',
//                     'rgba(153, 102, 255, 0.2)',
//                     'rgba(255, 159, 64, 0.2)'
//                 ],
//                 borderColor: [
//                     'rgba(255,99,132,1)',
//                     'rgba(54, 162, 235, 1)',
//                     'rgba(255, 206, 86, 1)',
//                     'rgba(75, 192, 192, 1)',
//                     'rgba(153, 102, 255, 1)',
//                     'rgba(255, 159, 64, 1)'
//                 ],
//                 borderWidth: 1
//                 },
//
//                 {
//                     label: '# of Votes',
//                     data: [12, 19, 3, 5, 2, 3],
//                     backgroundColor: [
//                         'rgba(255, 99, 132, 0.2)',
//                         'rgba(54, 162, 235, 0.2)',
//                         'rgba(255, 206, 86, 0.2)',
//                         'rgba(75, 192, 192, 0.2)',
//                         'rgba(153, 102, 255, 0.2)',
//                         'rgba(255, 159, 64, 0.2)'
//                     ],
//                     borderColor: [
//                         'rgba(255,99,132,1)',
//                         'rgba(54, 162, 235, 1)',
//                         'rgba(255, 206, 86, 1)',
//                         'rgba(75, 192, 192, 1)',
//                         'rgba(153, 102, 255, 1)',
//                         'rgba(255, 159, 64, 1)'
//                     ],
//                     borderWidth: 1
//                 }
//             ]
//         };
//
//         var ctx = document.getElementById("canvas").getContext('2d');
//
//         // const chart = new Chart(
//         //     this.$refs.canvas.getContent('2d')
//         // ).Bar(data);
//
//         const myChart = new Chart(ctx, {
//             type: 'bar',
//             data: data,
//         });
//
//         this.legend = myChart.generateLegend();
//
//     }
// }

import Chart from 'chart.js';

export default {

    template: `

        <div>
        <canvas width="800" height="600" id="wins-graph" v-html="legend"></canvas>

        <!--{{{ legend }}}-->
        </div>
    `,

    mounted() {

    },

    data() {
        return {
            rows: [],
            labels: []
        }
    },

    methods: {
        setGraph() {
            this.render({
                labels:[],
                datasets: [
                    {label: 'Classes and Sections', backgroundColor: '#dd4b39', data: []}
                ]
            }, {responsive: true, maintainAspectRation: false})
        }
    }
}

