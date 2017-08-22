 
 <script>      

  $(document).ready(function(){
   appendSchools();
});

function appendSchools() {

  var dzongkhag=$('#dzongkhagslist').val();
    
    $.get('{{url('/')}}/users/schoolfromdzongkhag/'+dzongkhag,
  {
    dzongkhag:dzongkhag
    
    },
    function(data) 
    {
    
    $('#schoolslist').append(data);
    }); 
}

function populateSchools()
{
   var dzongkhag=$('#dzongkhagslist').val();
    
    $.get('{{url('/')}}/users/schoolfromdzongkhag/'+dzongkhag,
  {
    dzongkhag:dzongkhag
    
    },
    function(data) 
    {
    
    $('#schoolslist').html(data);
    }); 
}

</script>