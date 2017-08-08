 
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
   var dzongkhag=$('#dzongkhag').val();
    
    $.post('{{url('/')}}/users/schoolFromDzongkhag/',
  {
    dzongkhag:dzongkhag
    
    },
    function(data) 
    {
    
    $('#schools').html(data);
    }); 
}

</script>