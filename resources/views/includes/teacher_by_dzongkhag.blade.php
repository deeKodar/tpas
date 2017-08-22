 
 <script>      

 

function populateSchools()
{
   var dzongkhag=$('#dzongkhagslist').val();
    
    $.get('{{url('/')}}/teachers/schoolfromdzongkhag/'+dzongkhag,
  {
    dzongkhag:dzongkhag
    
    },
    function(data) 
    {
    
    $('#schoolslist').html(data);
    }); 
}

</script>