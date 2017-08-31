
    import Chart from 'chart.js';

    export default {
        template: '<canvas id="graph" width="400" height="400"></canvas>',
        ready() {
            new Chart(document.getElementById(this.$el), {
                type: 'bar',
                data: {
                    labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                    datasets: [{
                        label: '# of Votes',
                        data: [12, 19, 3, 5, 2, 3]
                    }]
                }
            });
        }
    };

