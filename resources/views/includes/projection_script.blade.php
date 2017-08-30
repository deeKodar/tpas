 
 <script>      


function getProjection()
{
   var school=$('#schoolslist').val();
   var year=$('#year').val();
   var type=$('#type').val();

    
    $.get('{{url('/')}}/report/projections/school/'+school+'/type/'+type+'/year/'+year,
  {
   school:school
    
    },
    function(data) 
    {
    
    $('#projection').html(data);
    }); 
}

</script>