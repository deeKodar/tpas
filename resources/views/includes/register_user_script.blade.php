 
 <script>      

$(document).ready(function(){
    $('#role').on('change', function() {
      if ( this.value == '3')
      {
        $("#schools").hide();
        $("#dzongkhags").show();
      }
      else if (this.value == '4')
      {
        $("#schools").show();
        $("#dzongkhags").show();
      }
      else if (this.value == '5')
      {
        $("#schools").show();
        $("#dzongkhags").show();
      }
      else 
      {
       $("#schools").hide();
        $("#dzongkhags").hide(); 
      }
    });
});

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