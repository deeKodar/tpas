function populateDzongkhagSchools()
{
    var dzongkhag=$('#dzongkhagslist').val();

    $.get('<?php echo url('/'); ?>/school/schoolfromdzongkhag/'+dzongkhag,
        {
            dzongkhag:dzongkhag

        },
        function(data)
        {

            $('#schoolslist').html(data);
        });
}

$("#schoolslist").change(function() {
    var id = $(this).children(":selected").attr("id");

    //$('#btnSection').click(generateSectionGraph(id));
    generateSectionGraph(id);

});

function generateSectionGraph(schoolId) {

    var id= schoolId
    $.getJSON('http://tpas.app/class-section/' + id, function (result) {

        var labels = result.data.labels;
        var data = result.data.rows;
        var data2 = result.data.rows2;

        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [
                    {
                    label: '# of Sections',
                    data: data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                },

                {
                    label: '# of Class Strength',
                    data: data2,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                },

                ]
            },

            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });

    })

};
