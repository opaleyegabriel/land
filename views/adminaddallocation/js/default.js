$(document).ready(function(){
  $("#plot").change(function(){
    // alert();
    var phase=$('#phase').val();
    var block=$('#block').val();
    var plot=$('#plot').val();
    $.post("adminaddallocation/checkallocation",
    {block:block, phase:phase, plot:plot},
    function(data){
      var myresponse=(data.found_status);
      if (plot=="") {
        $("#plot").css("border-color","#dc3545" ).delay(9000);
        $("#plot").css("padding-right","calc(1.5em + 0.75rem)" ).delay(9000);
        $("#plot").css("background-image","url('public/images/download.svg')" ).delay(9000);
        $("#plot").css("background-repeat","no-repeat").delay(9000);
        $("#plot").css("background-position","center right calc(0.375em + 0.1875rem)" ).delay(9000);
        $("#plot").css("background-size"," calc(0.75em + 0.375rem) calc(0.75em + 0.375rem)" ).delay(9000);
        $("#invalid-feedback1").css("display","block" ).delay(9000);
        $("#invalid-feedback2").css("display","none" ).delay(9000);

      }
      else if(myresponse=="No"){
        setTimeout(function(){
          $("#allocationbtn").removeClass("mydisabled");

          // alert('no');
        },);
      }
      else if(myresponse=="Yes"){
        setTimeout(function(){
          $("#allocationbtn").addClass("mydisabled");
          alert('This Piece has been allocated')
        },);
      }
    },'json');
  });

});
