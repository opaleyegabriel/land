<?php
session::init();
    $logged=Session::get('loggedIn');
        if ($logged==true)
        {
            
            header('location: '. URL . 'dashboard');
            exit;
        }else
        {
          session::destroy();
          header('location: '. URL . 'index');

        }

;?>


    <style>
        body{
            background-color: #f0f2f5;
        }
    </style>
    <style>
        .notice {
            font-size: 18px;
            font-weight: bold;
            color: #FF4500; /* Orange-red color */
            background-color: #FFFFE0; /* Light yellow background */
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            animation: blink 1s infinite;
        }

        @keyframes blink {
            0% { opacity: 1; }
            50% { opacity: 0.5; }
            100% { opacity: 1; }
        }
    </style>
    <div class="lg:flex max-w-5xl min-h-screen mx-auto p-6 py-10">
        <div class="flex flex-col items-center lg: lg:flex-row lg:space-x-10">

            <div class="lg:mb-12 flex-1 lg:text-left text-center">
                <img src="<?php echo URL; ?>public/images/logo.png" alt="" class="lg:mx-0 lg:w-52 mx-auto w-40"><p style="size: 0.6em;">Contacts: 08034453549,08089476419</p>
                <?php //<div class="card-media h-28" id="demodiv">Peace City II and III Special  PROMO ends in <p id="demo"></p></div>;?>
                <p class="font-medium lg:mx-0 md:text-2xl mt-6 mx-auto sm:w-3/4 text-xl"> Simplest way to acquire property</p>
                <div class="notice">
                    Enjoy hassle-free payments with Paystack now that all transaction fees have been waived—try it out today!
                </div>    
            
            
            </div>
            <div class="lg:mt-0 lg:w-96 md:w-1/2 sm:w-2/3 mt-10 w-full">
              <div class="p-6 space-y-4 relative bg-white shadow-lg rounded-lg">

                <div class="jqueryresponse3">
                  Phone Number does not exist
                </div>
                <div class="jqueryresponse4">
                  Incorrect Password or Account Closed
                </div>
                 <div class="jqueryresponse5" style="display: none;">
                  Account Closed  
                </div>
<?php                /** <form enctype="multipart/form-data" action="<?php URL ;?> index/createaccount" method="post" class="p-6 space-y-4 relative bg-white shadow-lg rounded-lg">**/ ?>
                    <input type="Number" placeholder="Phone Number" name="lphone" id="lphone" class="with-border">
                    <input type="password" placeholder="Password" name="lpassword" id="lpassword"  class="with-border">
                    <button id="loginbtn" class="bg-blue-600 font-semibold p-3 rounded-md text-center text-white w-full">
                        Log In
                    </button>
                    <a href="<?php echo URL.'mypassword' ;?>" class="text-blue-500 text-center block"> Forgot Password? </a>
                    <hr class="pb-3.5">
                    <div class="flex">
                        <a href=".register" type="button" class="bg-green-600 hover:bg-green-500 hover:text-white font-semibold py-3 px-5 rounded-md text-center text-white mx-auto" uk-toggle>
                            Create New Account
                        </a>
                    </div>
</div>
<div class="mt-8 text-center text-sm"> Agents or BAs Account login <a href="<?php echo URL.'balogins' ;?>" class="font-semibold hover:underline"> here  </a> </div>
         </div>
            </div>

        </div>
    </div>

    <!-- This is the modal -->
    <div id="register" class="register" uk-modal>
        <div class="uk-modal-dialog uk-modal-body rounded-xl shadow-2xl p-0 lg:w-5/12">
            <button class="uk-modal-close-default p-3 bg-gray-100 rounded-full m-3" type="button" uk-close></button>
            <div class="border-b px-7 py-5">
                <div class="lg:text-2xl text-xl font-semibold mb-1"> Sign Up</div>
                <div class="text-base text-gray-600"> It’s quick and easy.</div>
                <div class="jqueryresponse">
                There is a user with the same Phone number
                </div>
                <div class="jqueryresponse1">
                There is a user with the same Email address
                </div>
                <div class="jqueryresponse2">
                  Password does not match
                </div>
            </div>
            <form enctype="multipart/form-data" action="<?php URL ;?> index/createaccount" method="post" class="p-7 space-y-5">
                <div class="grid lg:grid-cols-2 gap-5">
                    <input type="text" placeholder="Your Name" id="name" name="name" class="with-border" required="">
                    <input type="text" placeholder="Mobile No" name="phone" id="phone" class="with-border" required="">
                </div>
                <input type="email" placeholder="Info@example.com" name="email" id="email" class="with-border" required="">
                <input type="password" placeholder="******" name="password" id="password" class="with-border" required="">
                <input type="password" placeholder="Confirm Password" name="confirmpassword" id="confirmpassword" class="with-border" required="">
                <input type="number" placeholder="Agent mobile number(optional)"  name="agentcode" id="agentcode" class="with-border">

                <p class="text-xs text-gray-400 pt-3">By clicking Sign Up, you agree to our
                    <a href="#" class="text-blue-500">Terms</a>,
                    <a href="#">Data Policy</a> and
                    <a href="#">Cookies Policy</a>.
                     You may receive SMS Notifications from us and can opt out any time.
                </p>
                <div class="flex">
                    <button id="registerbtn" class="bg-blue-600 font-semibold mx-auto px-10 py-3 rounded-md text-center text-white">
                        Get Started
                    </button>
                </div>
            </form>

        </div>
    </div>

<!-- For Agent Creation-->
<div id="agentcreate" class="agentcreate" uk-modal>
    <div class="uk-modal-dialog uk-modal-body rounded-xl shadow-2xl p-0 lg:w-5/12">
        <button class="uk-modal-close-default p-3 bg-gray-100 rounded-full m-3" type="button" uk-close></button>
        <div class="border-b px-7 py-5">
            <div class="lg:text-2xl text-xl font-semibold mb-1">Create Agent Account</div>
            <div class="text-base text-gray-600"> It’s quick and easy.</div>
        </div>
        <form enctype="multipart/form-data" action="<?php URL ;?> index/createagentaccount" method="post" class="p-7 space-y-5">
            <div class="grid lg:grid-cols-2 gap-5">
                <input type="text" placeholder="Your Name" id="name" name="name" class="with-border" required="">
                <input type="text" placeholder="Mobile No" name="agentphone" id="agentphone" class="with-border" required="">
            </div>
            <input type="text" placeholder="Home Address" name="address" id="address" class="with-border" required="">
            <input type="email" placeholder="Info@example.com" name="agentemail" id="agentemail" class="with-border" required="">
            <label for="file">Upload a valid Passport <input type="file" name="file" id="file" onchange="return fileValidation()" value="" required=""></label>
            <div id="imagediv"></div><br>
                   <script type="text/javascript">
                   function fileValidation(){
                   var fileInput = document.getElementById('file');
                   var filePath = fileInput.value;
                   var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
                   if(!allowedExtensions.exec(filePath)){
                     alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');
                     fileInput.value = '';
                     return false;
                   }else{
                     //Image preview
                     if (fileInput.files && fileInput.files[0]) {
                         var reader = new FileReader();
                         reader.onload = function(e) {
                             document.getElementById('imagediv').innerHTML = '<img src="'+e.target.result+'" style=width:7em; />';
                         };
                         reader.readAsDataURL(fileInput.files[0]);
                     }
                   }
                   }
                   </script>
            <input type="password" placeholder="******" name="password" id="password" class="with-border" required="">
            <input type="password" placeholder="Confirm Password" name="confirmpassword" id="confirmpassword" class="with-border" required="">

            <p class="text-xs text-gray-400 pt-3">By clicking Register, you agree to our
                <a href="#" class="text-blue-500">Terms</a>,
                <a href="#">Data Policy</a> and
                <a href="#">Cookies Policy</a>.
                 You may receive SMS Notifications from us and can opt out any time.
            </p>
            <div class="flex">
                <button id="registerbtn" class="bg-blue-600 font-semibold mx-auto px-10 py-3 rounded-md text-center text-white">
                    Register Now
                </button>
            </div>
        </form>

    </div>
</div>
</div>

<!--  Agent Creation end-->
    <!-- For Night mode -->
    <script>
        (function (window, document, undefined) {
            'use strict';
            if (!('localStorage' in window)) return;
            var nightMode = localStorage.getItem('gmtNightMode');
            if (nightMode) {
                document.documentElement.className += ' night-mode';
            }
        })(window, document);

        (function (window, document, undefined) {

            'use strict';

            // Feature test
            if (!('localStorage' in window)) return;

            // Get our newly insert toggle
            var nightMode = document.querySelector('#night-mode');
            if (!nightMode) return;

            // When clicked, toggle night mode on or off
            nightMode.addEventListener('click', function (event) {
                event.preventDefault();
                document.documentElement.classList.toggle('dark');
                if (document.documentElement.classList.contains('dark')) {
                    localStorage.setItem('gmtNightMode', true);
                    return;
                }
                localStorage.removeItem('gmtNightMode');
            }, false);

        })(window, document);
    </script>


<script>
// Set the date we're counting down to
var countDownDate = new Date("October 01, 2022 00:00:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
