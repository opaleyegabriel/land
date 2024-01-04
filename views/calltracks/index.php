<?php
session::init();
//print_r($this->dueslist);

/*
    require_once  ('models/dashboard_model.php');
    $d= new Dashboard_Model();
    $allmyproducts=($d->all_ind_products());
    $allitems=($d->allitems());
    
    
    echo "<pre>";
    print_r($checkforunsettledpayments);
    exit();
    
    //this is for list of posts
    $msgDisplay=($d->DisplayMsgList());
    //this is for post counts
    $msgDisplaycount=($d->DisplayMsgCount());
    $tharraycount=count($msgDisplaycount);
    //this is for daily bet prediction
    $freebet=($d->GetTodayPrediction());
    //This is for advert
    $advert=($d->SelectRandonSpecialAdvert());
     
     echo "<pre>";
    print_r($this->checkforunsettledpayments);
    exit();
   */
    
    
?>


    <div id="wrapper">

        <!-- Header -->
        <header>
            <div class="header_wrap">
                <div class="header_inner mcontainer">
                    <div class="left_side">

                        <span class="slide_menu" uk-toggle="target: #wrapper ; cls: is-collapse is-active">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M3 4h18v2H3V4zm0 7h12v2H3v-2zm0 7h18v2H3v-2z" fill="currentColor"></path></svg>
                        </span>

                        <div id="logo">
                            <a href="#">
                                <img src="<?php echo URL; ?>public/images/logo.png" alt="">
                                <img src="<?php echo URL; ?>public/images/logo-mobile.png" class="logo_mobile" alt="">
                            </a>
                        </div>
                    </div>



                    <div class="right_side">

                        <div class="header_widgets">          







                            <a href="#">
                                <img src="<?php echo URL; ?>public/images/pimage.png" class="is_avatar" alt="">
                            </a>
                            <div uk-drop="mode: click;offset:5" class="header_dropdown profile_dropdown">

                                <a href="#" class="user">
                                    <div class="user_avatar">
                                        <img src="<?php echo URL; ?>public/images/pimage.png" alt="">
                                    </div>
                                    <div class="user_name">
                                        <div> <?php echo Session::get("ba_name");?> </div>
                                        <span> <?php echo Session::get("ba_acctno"). ' '.Session::get("ba_bank");?></span>
                                    </div>
                                </a>

                                

                                <a href="#" id="night-mode" class="btn-night-mode">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
                                      </svg>
                                     Night mode
                                    <span class="btn-night-mode-switch">
                                        <span class="uk-switch-button"></span>
                                    </span>
                                </a>
                                <a href="<?php echo URL."badashboard/logout"; ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                    </svg>
                                    Log Out
                                </a>


                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </header>

        <!-- sidebar -->
        <div class="sidebar">

            <div class="sidebar_inner" data-simplebar>

                <ul>
                    <li class="active"><a href="<?php echo URL."badashboard" ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-blue-600">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                        </svg>
                        <span> Dashboard </span> </a>
                    </li>

                    <li><a href="<?php echo URL."#" ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-pink-500">
                            <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd" />
                            <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
                        </svg> <span> Withdraws</span> </a>
                    </li>

                    <li><a href="<?php echo URL."recovery" ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-pink-500">
                            <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd" />
                            <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
                        </svg> <span> View Recovery Status</span> </a>
                    </li>



            </div>

            <!-- sidebar overly for mobile -->
            <div class="side_overly" uk-toggle="target: #wrapper ; cls: is-collapse is-active"></div>

        </div>

        <!-- Main Contents -->
        <div class="main_content">
            <div class="mcontainer">







                <div class="lg:flex lg:space-x-12">

                    <div class="lg:w-1/4 flex-shrink-0 space-y-5">

                       
                        
                         
                     
                     
                      </div>
                        <div class="container">
                                <h2 class="text-xl font-semibold mt-7"> <?php echo session::get("ba_name"); ?> </h2>
                              <table border="2" style="border-collapse: separate;
  border-spacing: 0 20px;">
                                  <thead>
                                      <tr>
                                          <td>SNO</td><td>Client Name</td><td>Mobile</td><td>Plot</td><td>TE.Amount</td><td>Paid</td><td>Balance</td> <td>Due</td>
                                      </tr>
                                  </thead>
                                  <tbody>
                                  <?php
                                  //echo "<pre>";
                                  //print_r($this->dueslist);
                                  $totaldues=0;
                                  $totaplot=0;
                                  $sno=1;
                                        foreach ($this->dueslist as $key => $value) {
                                            
                                            $totaldues=$value["due"] + $totaldues;
                                            $totaplot=$value['plot'] + $totaplot;
                                           echo '
                                                    <tr>
                                                    <td>'. $sno .'</td>
                                                    <td>'. $value["client_name"].'</td>';

                                              echo      '<td><a style="text-decoration:none;color:#cc0000;background-color:#cc0000; border:1px solid #660000; border-radius:7px; color:#fff; margin-right:10px; margin-bottom:20px;
                                                      padding:10px 10px 10px 10px;" href="'.URL.'cancelleddeal/details/'.$value["mobile"] .'">'.$value["mobile"].'</a>

                                                    </td>
                                                    <td>'. $value["plot"].'</td>
                                                    <td >'. number_format($value["Tamount"]).'</td>
                                                    <td >'. number_format($value["paid"]).'</td>
                                                    <td >'. number_format($value["balance"]).'</td>
                                                    <td >'. number_format($value["due"]).'</td>
                                                    </tr>
                                           ';
                                           $sno++;
                                        }
                                  ?>
                                  
                                  </tbody>
                                  <?php
                                  echo "Total Due = ". number_format($totaldues);
                                  echo "   Total Plot = ". number_format($totaplot); 
                                  echo " Taged Target =". number_format($totaplot * 10000);
                                  
                                  ?>
                              </table>   

                        </div>




         



                       
                      

                    

                </div>





            </div>
        </div>
    </div>


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
