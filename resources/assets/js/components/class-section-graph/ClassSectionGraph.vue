<template src="./ClassSectionGraph.html"></template>

<script>
    import axios from 'axios'
    import ClassSectionLineChart from './ClassSectionLineChart'
    import { classSectionData } from './../../config'

//    export default {
//        components: {
//            'class-section-bar-chart': ClassSectionLineChart
//        }
//    }
      export default {
          name: `class-section-bar-chart`,

          components: { ClassSectionLineChart },

          data() {
              return {
                  rows: null,
                  labels: null,
                  datacollection: null
              }
          },

          mounted() {
              this.fillData()
          },

          methods: {
              fillData() {
                  axios.get(classSectionData)
                      .then(resp => {
                          console.log('resp', resp.data.data)
                          let results = resp.data.data

                          //let rowsresult = results.map( a => a.row)
                          //let labelsresult = results.map(a => a.label)

                          //this.rows = resp.data.data.rows
                          this.rows = results.rows
                          //console.log(this.rows)
                          //this.labels = resp.data.data.labels
                          this.labels = results.labels
                          //this.setUpGraph()

                          this.datacollection = {
                              labels: this.labels,
                              datasets: [
                                  {
                                      label: 'Section',
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


      }

</script>

