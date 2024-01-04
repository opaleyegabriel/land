$(document).ready(function(){
  $("#phone").focusout(function(){
      var phone=$('#phone').val();
        $.post("index/phone",
                {phone:phone},
                function(data){
                  var myresponse=(data.found_status);
                  if (phone=="") {}
                    else if(myresponse=="Yes"){
             $('#phone').val("");
             setTimeout(function(){
                  $(".jqueryresponse").css("display","block" ).delay(9000).fadeOut('1000');
                 },);
                   }
    },'json');

    });

    $("#email").focusout(function(){
        var email=$('#email').val();
          $.post("index/email",
                  {email:email},
                  function(data){
                    var myresponse=(data.found_status);
                    if (email=="") {}
                      else if(myresponse=="Yes"){
               $('#email').val("");
               setTimeout(function(){
                    $(".jqueryresponse1").css("display","block" ).delay(9000).fadeOut('1000');
                   },);
                     }
      },'json');

      });
      $('#confirmpassword').focusout(function(){
          var confirmpassword=$('#confirmpassword').val();
        if (confirmpassword=="") {}
    else if ($("#confirmpassword").val()!=$("#password").val() ) {
      $('#password').val("");
      $('#confirmpassword').val("");
      setTimeout(function(){
           $(".jqueryresponse2").css("display","block" ).delay(9000).fadeOut('1000');
      }, );
      }
    return;


      });
      $("#lphone").focusout(function(){
          var lphone=$('#lphone').val();
            $.post("index/lphone",
                    {lphone:lphone},
                    function(data){
                      var myresponse=(data.found_status);
                      if (lphone=="") {}
                        else if(myresponse=="No"){
                 $('#lphone').val("");
                 setTimeout(function(){
                      $(".jqueryresponse3").css("display","block" ).delay(9000).fadeOut('1000');
                     },);
                       }
        },'json');

        });
        $("#lpassword").focusout(function(){
            var lphone=$('#lphone').val();
            var lpassword=$('#lpassword').val();
              $.post("index/login",
                      {lphone:lphone, lpassword:lpassword},
                      function(data){
                        var myresponse=(data.found_status);
                        if (lpassword=="") {}
                          else if(myresponse=="No"){
                   $('#lpassword').val("");
                   setTimeout(function(){
                        $(".jqueryresponse4").css("display","block" ).delay(9000).fadeOut('1000');
                       },);
                         }
          },'json');

          });
$("#loginbtn").click(function(){
  
  var lphone=$('#lphone').val();
  
  var lpassword=$('#lpassword').val();
    $.post("index/login",
            {lphone:lphone, lpassword:lpassword},
             function(data){
               var myresponse=(data.found_status);
               if (lphone=="", lpassword=="") {}
                  else if(myresponse=="Yes"){
                    setTimeout(function(){
                         $(".jqueryresponse2").css("display","block" ).delay(10000).fadeOut('1000');
                    }, );
                    var delay=2000;
                          setTimeout(function(){
        //window.location.href = "http://localhost:8080/land/dashboard";
        
        window.location.href="https://dreamcityhes.com/land/dashboard";
                
        //window.location.href = "https://alslaundry.com.ng/land/dashboard"; 
              },delay)
      }else {
           $('#lphone').val("");
           $('#lpassword').val("");
          // $("#javascriptdiv").css("display","block" );

      }

    },'json');


});
       $("#agentphone").focusout(function(){
      var agentphone=$('#agentphone').val();
        $.post("index/agentphone",
                {agentphone:agentphone},
                function(data){
                  var myresponse=(data.found_status);
                  if (agentphone=="") {}
                    else if(myresponse=="Yes"){
             $('#agentphone').val("");
             setTimeout(function(){
                  $(".jqueryresponse").css("display","block" ).delay(9000).fadeOut('1000');
                 },);
                   }
    },'json');

    });

    $("#agentemail").focusout(function(){
        var agentemail=$('#agentemail').val();
          $.post("index/agentemail",
                  {agentemail:agentemail},
                  function(data){
                    var myresponse=(data.found_status);
                    if (agentemail=="") {}
                      else if(myresponse=="Yes"){
               $('#agentemail').val("");
               setTimeout(function(){
                    $(".jqueryresponse1").css("display","block" ).delay(9000).fadeOut('1000');
                   },);
                     }
      },'json');

      });
$('.header').hide();
});
