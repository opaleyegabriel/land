$(document).ready(function(){
  $("#mobile").click(function(){
    $('#mobile').val(""); 
    $('#pwd').val(""); 
  });
  $("#mobile").focusout(function(){
      var mobile=$('#mobile').val();
     
        $.post("mypassword/getmypassword",         
          {mobile:mobile},
        function (data) {            
        $('#pwd').val(data.message);
        }, 'json'
      );
                           
    });

    

    $("#mobile").focus(function(){
      $('#mobile').val("");  
      $('#pwd').val("");                  
    });
      
      $("#getpassword").click(function(){
         var mobile=$('#mobile').val();
     
        $.post("mypassword/getmypassword",         
          {mobile:mobile},
        function (data) {            
        $('#pwd').val(data.message);
        }, 'json'
      );

      });
$('.header').hide();
});
