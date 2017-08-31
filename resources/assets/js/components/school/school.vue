<template src="./school.html"></template>
<script>
    import axios from 'axios'
    import school from './school'
    import { classSectionData } from './../../config'

    export default ({
//        name: 'sample-chart',

        data () {
            return {
                rows: null,
                labels: null,
                chartData: null
            }
        },

        components: {
            'sample-chart': school
        },

        created() {

        },

        mounted() {
            this.fillData()
        },

        methods: {
            fillData() {
                axios.get(classSectionData)
                    .then(response => {
                        console.log(response.data.data)
                        this.rows = response.data.data.rows
                        this.labels = response.data.data.labels

                        this.chartData = {
                            labels: this.labels,
                            datasets: [
                                {
                                    label: 'Sections',
                                    backgroundColor: '#f87979',
                                    data: this.rows
                                }
                            ]
                        }
                    })
                    .catch(error => {
                        console.log(error)
                    })
            }
        }

    });
</script>
