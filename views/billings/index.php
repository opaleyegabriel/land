<?php
   // print_r($this->allmyproducts);
    //exit();
session::init();
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
                <li ><a href="<?php echo URL."dashboard/user" ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-blue-600">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                    </svg>
                    <span> Dashboard </span> </a>
                </li>

                <li class="active"><a href="<?php echo URL."billings/user" ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-pink-500">
                        <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd" />
                        <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
                    </svg> <span> Billings</span> </a>
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
    <?php
        if(empty($this->allmyproducts)){
            echo '
                                <div class="card">
                                    <div class="card-body">
                                    <div class="promo-area">
                                <div class="zigzag-bottom"></div>
                                <div class="container">
                                <h2 class="text-xl font-semibold mt-7"> You are not yet subscribed </h2></div></div></div></div>

            ';

        }
       // echo "<pre>";
        //print_r($this->allmyproducts);
        foreach ($this->allmyproducts as $key => $value) {
            $balance=$value["totalamt"] - $value["amountpaid"];
            for ($randomNumber = mt_rand(1, 10), $i = 1; $i < 10; $i++) {
                $randomNumber .= mt_rand(0, 10);
              }
              for ($randomNum = mt_rand(1, 10), $i = 1; $i < 10; $i++) {
                $randomNum .= mt_rand(0, 4);
              }

              $refid=$randomNumber.$randomNum.$value['orderno'];

        echo '
            
                            <form id="paymentForm">
                                
                                    <div class="card">
                                    <div class="card-body">
                                    <div class="promo-area">
                                <div class="zigzag-bottom"></div>
                                <div class="container">
                                <h2 class="text-xl font-semibold mt-7"> '. $value["pname"] .'  '. $value["qty"].' plots( '. $value["allocation"] .' )  </h2>
                                    <div class="row">
                                        <div class="col-md-3 col-sm-6">
                                            <div class="single-promo promo1">
                                                <i class="fa fa-user"></i>
                                                <p>Total Amount <span>₦'. number_format($value["totalamt"],2) .'k</span> <input type="hidden" name="totalamt"  value="'. $value["totalamt"] .'"  ></p>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6">
                                            <div class="single-promo promo2">
                                                <i class="fa fa-truck"></i>
                                                <p>Amount Paid <span>₦'. number_format($value["amountpaid"],2) .'k</span> <input type="hidden" name="paidamt"  value="'. $value["amountpaid"] .'"  > </p>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6">
                                            <div class="single-promo promo3">
                                                <i class="fa fa-lock"></i>
                                                <p>Balance <span>₦'. number_format($balance,2) .'k</span> <input type="hidden" name="balance"  value="'. $balance .'"  ></p>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6">
                                            <div class="single-promo promo4">
                                                <i class="fa fa-gift"></i>
                                                <p>Due <span>₦'. number_format($value["due"],2) .'k</span> <input type="hidden" name="due" id="due" value="'. $value["due"] .'"  > </p>
                                            </div>
                                        </div>
                                        <input type="hidden" id="mobile" name="mobile" value='. session::get('lphone') .' required />
                                        <input type="hidden" name="orderno" value="'. $value['orderno'] .'" id="orderno" required/>
                                        <input type="hidden" name="refid" value="'. $refid. '" id="refid" required />
                                        <input type="hidden" id="email-address" value="'. session::get('email').'" required />
                                         <input type="hidden" name="credit" value="" id="credit"/>

                                        <input type="number" id="amount" name="amount" class="with-border" value="" placeholder="Amount to Pay "  >
                                         
                                         <input type="submit" id="payWithPaystack" class="with-border" value="Pay Now"">
                                    </div>
                                </div>
                            </div>
                            
                        </form>
                   





            ';
        }
    ?>
 </div>
                </div>
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
