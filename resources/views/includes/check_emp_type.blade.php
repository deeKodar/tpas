 
<script>      

function checkEmpType() {

var empType= $('#empType').val();

if(empType=='1') {
   $("#contract_from").hide();
        $("#contract_to").hide();
}

else {

  $("#contract_from").show();
        $("#contract_to").show();
}

}



$(document).ready(function(){
    $('#empType').load('change', function() {
      if ( this.value == '1')
      {
        $("#contract_from").hide();
        $("#contract_to").hide();
       // $("#dzongkhags").show();
      }
      else 
      {
        $("#contract_from").show();
        $("#contract_to").show();
        
      }
     
    });
});



</script>