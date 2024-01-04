
    <style>
        body{
            background-color: #f0f2f5;
        }
    </style>
    <div class="lg:flex max-w-5xl min-h-screen mx-auto p-6 py-10">
        <div class="flex flex-col items-center lg: lg:flex-row lg:space-x-10">

            <div class="lg:mb-12 flex-1 lg:text-left text-center">
                <img src="<?php echo URL; ?>public/images/logo.png" alt="" class="lg:mx-0 lg:w-52 mx-auto w-40"><p style="size: 0.6em;">Contacts: 09138763432,08034453549</p>
                <div class="card-media h-28" id="demodiv">Final Opportunity on Peace City and New Town Estate FESTIVE PROMO ends in <p id="demo"></p></div>
                
                <p class="font-medium lg:mx-0 md:text-2xl mt-6 mx-auto sm:w-3/4 text-xl"> BAs and Agent Login Only</p>
            </div>
            <div class="lg:mt-0 lg:w-96 md:w-1/2 sm:w-2/3 mt-10 w-full">
              <div class="p-6 space-y-4 relative bg-white shadow-lg rounded-lg">              
                
                  <form enctype="multipart/form-data" action="<?php URL ;?> balogins/login_bas" method="post" class="p-6 space-y-4 relative bg-white shadow-lg rounded-lg">
                    <input type="text" placeholder="old password" name="oldpass" id="oldpass" class="with-border" required>
                    <input type="text" placeholder="new password" name="newpassword" id="newpassword"  class="with-border" required>
                    <input type="text" placeholder="Confime new password" name="cnewpassword" id="cnewpassword"  class="with-border" required>
                    <button type="submit" id="loginbtn" class="bg-blue-600 font-semibold p-3 rounded-md text-center text-white w-full">
                        Change Password
                    </button>
                    </form>
                    
                    <hr class="pb-3.5">
                    
</div>

         </div>
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
var countDownDate = new Date("July 16, 2022 00:00:00").getTime();

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