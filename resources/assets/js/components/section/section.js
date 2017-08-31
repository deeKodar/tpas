import { Line } from 'vue-chartjs';

export default Line.extend({
    mounted() {
        this.renderChart(
            {
                labels: ['Class PP', 'Class I', 'Class II', 'Class III'],
                datasets: [
                    {
                        label: 'Teachers 2017',
                        backgroundColor: 'green',
                        data: [5, 6, 3, 10, 6]
                    },
                    {   
                        label: 'Teachers 2018',
                        backgroundColor: 'red',
                        data: [6, 8, 5, 8, 7]
                    }
                ]
            },

            {
                responsive: true,
                maintainAspectRatio: false,
                barPercentage: .8
            }
        )
    }

})
