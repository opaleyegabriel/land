<?php
session::init();

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
    print_r($this->allmyproducts);
    */
     foreach ($this->allmyproducts as $keyi => $valuei) {
         $pid=$valuei['pid'];
         $qty=$valuei['qty'];
     }
   

    
    
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
                                        <div> <?php echo Session::get("name");?> </div>
                                        <span> <?php echo Session::get("lphone");?></span>
                                    </div>
                                </a>

                                

                                <a href="#">
                                    <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"></path><path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"></path></svg>
                                    Refund Request
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
                                <a href="<?php echo URL."dashboard/logout"; ?>">
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
                    <li class="active"><a href="<?php echo URL."dashboard" ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-blue-600">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                        </svg>
                        <span> Dashboard </span> </a>
                    </li>

                    <li><a href="<?php echo URL."#" ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-pink-500">
                            <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd" />
                            <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
                        </svg> <span> My Withdrawals</span> </a>
                    </li>
                    <li><a href="<?php echo URL."#" ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-pink-500">
                            <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd" />
                            <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
                        </svg> <span> My referals </span> </a>
                    </li>
                    <li><a href="<?php echo URL."buymore" ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-pink-500">
                            <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd" />
                            <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
                        </svg> <span> Buy More </span> </a>
                    </li>
                </u>



            </div>

            <!-- sidebar overly for mobile -->
            <div class="side_overly" uk-toggle="target: #wrapper ; cls: is-collapse is-active"></div>

        </div>

        <!-- Main Contents -->
        <div class="main_content">
            <div class="mcontainer">







                <div class="lg:flex lg:space-x-12">

                    <div class="lg:w-1/4 flex-shrink-0 space-y-5">

                        
                        <?php


                       



        // start from here
                        if(!empty($this->allmyproducts)){

                            // print_r($this->allitems);
                        //exit();

                        foreach ($this->allitems as $key => $value) {
                        $productname=$value["product_name"];
                        $quantity=$value["quantity"];
                        $price=$value["price"];
                        $pictures=$value["imgurl"];
                        $deposit=$value["deposit"];
                        $id=$value["id"];
                        $temurl="";
                        $temurl="buymore/reorder";



                        //create a session to hold product name
                       // Session::set("product","");
                        //Session::set("product",$productname);
                     
                      echo ' 
                      <h2 class="text-xl font-semibold mt-7"> Suggested For You  </h2>
                      <div class="card">
                      <form enctype="multipart/form-data" action="'. URL.$temurl .'" method="post" >';
                        echo ' <div class="card-media h-28">';
                              echo ' <div class="card-media-overly"></div>';
                              echo ' <img src="'. URL.$pictures .'" alt="" class="">';
                          echo '</div>';
                          echo '<div class="card-body">';
                          echo '<h1>  ' . $productname.' </h1>';
                          echo ' <div class="flex items-center space-x-1 text-sm text-gray-500 capitalize">';
                                    echo '<span style="font-size: 1em;"> =N=' . number_format($price).' /plot. </span> <br>';
                                    echo ' <span style="font-size: 0.9em; color: #429849;">' . number_format($quantity).' plots is availble </span> ';
                                echo '</div>';

                              echo '  <div class="flex mt-3 space-x-2 text-sm">';


                                echo '</div><div style="font-size: 0.8em; color: #D35400 ;">Initial Deposit Per Plot</div>
                                <input type="text" id="deposit" name="deposit" value='. $deposit .' class="with-border" required disabled>
                                <input type="hidden" name="deposit1" value='. $deposit .' class="with-border" required>
                                <div style="font-size: 0.8em; color: #D35400 ;">Plot(s)</div>';
                                if ($quantity <=0){

                                    echo  ' <div class="col-md-3 col-sm-6">

                                    <div class="single-promo promo1">

                                        <i class="fa fa-gift"></i>

                                        <p> <span style="color:WHITE;">COMPLETELY SOLD OUT</span> </p>

                                    </div>

                                </div>';
                            }else{

                               echo '<input type="number" id="qty" value="" name="qty" placeholder="buy more?"  class="with-border">
                                
                                <input type="hidden" value='. $price .' name="price" >
                                <input type="hidden" value='. $productname .' name="pname">
                                <input type="hidden" id ="pid" value='. $id .' name="pid">
                                <input type="hidden"  name="mobile" id="mobile" value='. session::get("lphone") .' />



                                ';
                                
                              echo  '<input type="submit" value="Buy More">
                                ';
                                }

                          echo '</div></form>';
                  echo '</div>';

                        }

        }
       // echo "<pre>";
        //print_r($this->allmyproducts);
      

                       
                         ?>


                    </div>

                </div>





            </div>
        </div>
    </div>
  

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
