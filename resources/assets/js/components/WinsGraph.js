import Chart from 'chart.js';

export default {
    template: `
    
        <div>
        <canvas width="800" height="600" v-el:canvas></canvas>
        
        {{{ legend }}}
        </div>
    `,

    props: ['player', 'opponent'],

    data() {
        return {
            legend: ''
        };
    },

    ready() {
        var data = {
            labels: ['Wins'],

            datasets: [
                {
                    label: this.player.name,
                    fillColor:"red",
                    strokeColor: "gray",
                    highlightFill: "white",
                    highlightStroke: "green",
                    data: [this.player.wins]
                },

                {
                    label: this.opponent.name,
                    fillColor:"blue",
                    strokeColor: "gray",
                    highlightFill: "white",
                    highlightStroke: "purple",
                    data: [this.opponent.wins]
                }
            ]
        };

        var ctx = document.getElementById('canvas').getContext('2d');
        //
        // const chart = new Chart(
        //     this.$els.canvas.getContent('2d')
        // ).Bar(data);

        const myChart = new Chart(ctx, {
            type: 'bar',
            data: data,
        });

        this.legend = myChart.generateLegend();
    }

}
