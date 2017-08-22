 
 <script>      

$(document).ready(function(){
    $('#role').load('change', function() {
      
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


</script>