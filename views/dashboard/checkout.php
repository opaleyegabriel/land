<?php
session::init();
	print_r($this->allparas);
?>
<script src="https://js.paystack.co/v1/inline.js"></script>
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
                            <a href="feed.html">
                                <img src="<?php echo URL; ?>public/images/logo.png" alt="">
                                <img src="<?php echo URL; ?>public/images/logo-mobile.png" class="logo_mobile" alt="">
                            </a>
                        </div>
                    </div>



                    <div class="right_side">

                        <div class="header_widgets">
                            <a href="#" class="is_icon" uk-tooltip="title: Cart">
                                <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path></svg>
                            </a>
                            <div uk-drop="mode: click" class="header_dropdown dropdown_cart">

                                <div class="drop_headline">
                                    <h4>  My Cart </h4>
                                    <a href="#" class="btn_action hover:bg-gray-100 mr-2 px-2 py-1 rounded-md underline"> Checkout </a>
                                </div>

                                <ul class="dropdown_cart_scrollbar" data-simplebar>
                                    <li>
                                        <div class="cart_avatar">
                                            <img src="<?php echo URL; ?>public/images/2.jpg" alt="">
                                        </div>
                                        <div class="cart_text">
                                            <div class=" font-semibold leading-4 mb-1.5 text-base line-clamp-1"> Wireless headphones </div>
                                            <p class="text-sm">Type Accessories  </p>
                                        </div>
                                        <div class="cart_price">
                                            <span> $14.99 </span>
                                            <button class="type"> Remove</button>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="cart_avatar">
                                            <img src="<?php echo URL; ?>public/images/13.jpg" alt="">
                                        </div>
                                        <div class="cart_text">
                                            <div class=" font-semibold leading-4 mb-1.5 text-base line-clamp-1"> Parfum Spray</div>
                                            <p class="text-sm">Type Parfums  </p>
                                        </div>
                                        <div class="cart_price">
                                            <span> $16.99 </span>
                                            <button class="type"> Remove</button>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="cart_avatar">
                                            <img src="<?php echo URL; ?>public/images/15.jpg" alt="">
                                        </div>
                                        <div class="cart_text">
                                            <div class=" font-semibold leading-4 mb-1.5 text-base line-clamp-1"> Herbal Shampoo </div>
                                            <p class="text-sm">Type Herbel  </p>
                                        </div>
                                        <div class="cart_price">
                                            <span> $12.99 </span>
                                            <button class="type"> Remove</button>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="cart_avatar">
                                            <img src="<?php echo URL; ?>public/images/14.jpg" alt="">
                                        </div>
                                        <div class="cart_text">
                                            <div class=" font-semibold leading-4 mb-1.5 text-base line-clamp-1"> Wood Chair </div>
                                            <p class="text-sm">Type Furniture  </p>
                                        </div>
                                        <div class="cart_price">
                                            <span> $19.99 </span>
                                            <button class="type"> Remove</button>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="cart_avatar">
                                            <img src="<?php echo URL; ?>public/images/9.jpg" alt="">
                                        </div>
                                        <div class="cart_text">
                                            <div class=" font-semibold leading-4 mb-1.5 text-base line-clamp-1"> Strawberries FreshRipe </div>
                                            <p class="text-sm">Type Fruit  </p>
                                        </div>
                                        <div class="cart_price">
                                            <span> $12.99 </span>
                                            <button class="type"> Remove</button>
                                        </div>
                                    </li>
                                </ul>

                                <div class="cart_footer">
                                    <p> Subtotal : $ 320 </p>
                                    <h1> Total :  <strong> $ 320</strong> </h1>
                                </div>
                            </div>







                            <a href="#">
                                <img src="<?php echo URL; ?>public/images/avatar-2.jpg" class="is_avatar" alt="">
                            </a>
                            <div uk-drop="mode: click;offset:5" class="header_dropdown profile_dropdown">

                                <a href="timeline.html" class="user">
                                    <div class="user_avatar">
                                        <img src="<?php echo URL; ?>public/images/avatar-2.jpg" alt="">
                                    </div>
                                    <div class="user_name">
                                        <div> <?php echo Session::get("name");?> </div>
                                        <span> <?php echo Session::get("lphone");?></span>
                                    </div>
                                </a>

                                <a href="page-setting.html">
                                    <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path></svg>
                                    My Account
                                </a>

                                <a href="<?php echo URL."billings/user" ?>">
                                    <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"></path><path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"></path></svg>
                                    My Billing
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
                    <li class="active"><a href="<?php echo URL."dashboard/user" ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-blue-600">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                        </svg>
                        <span> Dashboard </span> </a>
                    </li>

                    <li><a href="<?php echo URL."billings/user" ?>">
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

                        <h1 class="text-xl font-semibold mt-7"> Check Out  </h1>
                        <?php


                        
                        $price=$this->allparas["price"];
                        $pqty=$this->allparas["pqty"];
                        $pname=$this->allparas["pname"];
                        $orderno=$this->allparas["orderno"];
                        $deposit=$this->allparas["deposit"];
                        $debit=($price * $pqty);
                        $pid=$this->allparas["pid"];
                        $trndate=date("d-m-Y");
                        $temurl="";
                        $temurl="dashboard/checkout";                  
                     
                        

                          echo '<div class="card-body">';
                          echo'<div> ORDER NO  : '. substr($orderno, 12) .'</div>
                          		<div> DATE     : '. $trndate .'</div>
                          		<div> TOTAL =N=: '. $deposit .'</div><br>

                          		<div>You are paying a deposit for '.$pqty.' plot(s) of land at '. $pname .'</div>
                          		<div>Thank you for your order, please click the button below to pay online.</div>
                          
                          ';
                          echo '
                          	<input type="text" id="mobile" name="mobile" value='. session::get('lphone') .' required />
                          	<input type="text" id="debit" name="debit" value='. $debit .' required />
                          	<input type="text" id="price" name="price" value='. $price .' required />
                          	<input type="text"id="qty" name="qty" value='. $pqty .' >
                          	<input type="text" id="product" name="product" value='. $pname .' >
                          	<input type="text" id="orderno" name="orderno" value='. substr($orderno, 12) .' required />
                          	<input type="hidden" id="amount" value='. $deposit .' name="amount" required />
                            <input type="hidden" id="credit" value='. $deposit .' name="credit" required />
                          	<input type="hidden" id="refid" value='. $orderno .' name="refid" required />                          
                          ';
                          
                          //pk_test_56d321ccae57d5b3f6281255c8e83ae0e279a3a7
                          echo '</div>                   
                          ';
                         ?>
                         <form id="paymentForm">
						  <div class="form-group">
						    
						    <input type="hidden" id="email-address" value="<?php echo session::get('email') ;?>" required />
						  </div>
						  <div class="form-group">
						    
						    <input type="hidden" id="amount" value="<?php echo $deposit; ?>" required />
						  </div>
						  
						  
						  <div class="form-submit">
						    <button type="submit"  id="payWithPaystack"> Pay </button>
						  </div>
							</form>
   
						


                    </div>

                </div>



					

            </div>
        </div>
    </div>
    					<script>
                       		const paymentForm = document.getElementById('paymentForm');
							paymentForm.addEventListener("submit", payWithPaystack, false);
							function payWithPaystack(e) {
							  e.preventDefault();
							  refid=document.getElementById("refid").value
							  let handler = PaystackPop.setup({
							    key: 'pk_test_56d321ccae57d5b3f6281255c8e83ae0e279a3a7', // Replace with your public key
							    email: document.getElementById("email-address").value,
							    amount: document.getElementById("amount").value * 100,							    
							    ref: '' + refid, // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
							    // label: "Optional string that replaces customer email"
							    onClose: function(){
							      alert('Window closed.');
							    },
							    callback: function(response){
							      let message = 'Payment complete! Reference: ' + response.reference;
							      alert(message);
							    }
							  });
							  handler.openIframe();
							}
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

