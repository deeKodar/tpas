import {Bar, mixins} from 'vue-chartjs'
//const { reactiveProp } = mixins
export default Bar.extend({
   //mixins: [reactiveProp],
   props: ['chartData'],
    data () {
        return {
            options: {
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
        // this.chartData is created in the mixin
        this.renderChart(this.chartData, this.options)
    }
})
