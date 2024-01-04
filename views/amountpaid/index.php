<?php

session::init();

session::set("fresh",false);

session::set('adon',false);

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

                    <li><a href="<?php echo URL."buymore" ?>">

                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-pink-500">

                            <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd" />

                            <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />

                        </svg> <span> Buy More </span> </a>

                    </li>

                    <li><a href="<?php echo URL."#" ?>">

                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-pink-500">

                            <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd" />

                            <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />

                        </svg> <span> My referals </span> </a>

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

                        <div id="myinfo">
                          
                        </div>



							<table class="table table-striped table-dark">
							  <thead>
							    <tr>
							      <th scope="col">#</th>
							      <th scope="col">Transaction Date</th>
							      <th scope="col">Amount</th>
							      
							    </tr>
							  </thead>
							  <tbody>


                        <?php

                            //list transaction details
                        	
                        	echo '
                        			<tr>
						      	<th scope="row">1</th>
						      	<td>2023/04/20</td>
						      	<td>2,000</td>
						      	
						    	</tr>   





                        	';
                           



	                  		?>


						     
						  </tbody>
						</table>


                        

                        


                        



                    </div>



                </div>











            </div>

        </div>

    </div>

  