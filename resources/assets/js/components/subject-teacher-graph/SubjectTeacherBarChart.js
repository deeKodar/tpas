import { Bar } from 'vue-chartjs';

export default Bar.extend({
    mounted() {
        this.renderChart(
            {
                labels: ['English', 'Math', 'Dzongkha', 'EVS', 'Physics'],
                datasets: [
                    {
                        label: 'Teachers 2017',
                        backgroundColor: 'blue',
                        data: [10, 15, 5, 25, 8]
                    },
                    {
                        label: 'Teachers 2018',
                        backgroundColor: 'green',
                        data: [12, 12, 8, 30, 18]
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
