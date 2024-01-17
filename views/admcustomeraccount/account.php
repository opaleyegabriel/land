<?php
session::init();
$currentuser=session::get("currentuser");
$branch=session::get("branch");
//print($currentuser);
//exit();
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
                                        <div> <?php echo Session::get("currentuser");?> </div>
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
                                <a href="<?php echo URL."admdashboard/logout"; ?>">
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
    <li class="active"><a href="<?php echo URL."admdashboard" ?>">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-blue-600">
            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
        </svg>
        <span> Dashboard </span> </a>
    </li>

    
        <?php
    if(Session::get('usertype')==1){
        echo '
        <li><a href="'. URL."ctarget".'">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-pink-500">
            <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd" />
            <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
        </svg> <span> Verify/Create Target</span> </a>
    </li>
        ';
    }

    ?>

    <?php
    if(Session::get('usertype')==1){
        echo '
        <li><a href="'. URL."bonus1000".'">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-pink-500">
            <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd" />
            <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
        </svg> <span> Bonus 1000</span> </a>
    </li>
        ';
    }

    ?>

     <?php
    if(Session::get('usertype')==1){
        echo '
        <li><a href="'. URL."admincustomerdetaillist".'">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-pink-500">
            <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd" />
            <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
        </svg> <span> Customer Details</span> </a>
    </li>
        ';
    }

    ?>





    
    <?php
    if(Session::get('usertype')==1){
        echo '
        <li><a href="'.URL."addallws".'">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-pink-500">
            <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd" />
            <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
        </svg> <span> Add Allowance</span> </a>
    </li>
        ';
    }

    ?>       
     <?php
    if(Session::get('usertype')==1){
        echo '
        <li><a href="'.URL."sendindsms".'">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-pink-500">
            <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd" />
            <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
        </svg> <span> Send Individual SMS</span> </a>
    </li>
        ';
    }

    ?>    

     <?php
    if(Session::get('usertype')==1){
        echo '
        <li><a href="'.URL."prepay".'">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-pink-500">
            <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd" />
            <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
        </svg> <span> Payment Approvals</span> </a>
    </li>
        ';
    }

    ?> 

     <?php
    if(Session::get('usertype')==1){
        echo '
        <li><a href="'.URL."appayment".'">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-pink-500">
            <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd" />
            <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
        </svg> <span> List of Approved Payment</span> </a>
    </li>
        ';
    }

    ?>    

     <?php
    if(Session::get('usertype')==1){
        echo '
        <li><a href="'.URL."apsitevisit".'">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-pink-500">
            <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd" />
            <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
        </svg> <span> Approved Site Visit Request</span> </a>
    </li>
        ';
    }

    ?>  


    <?php
    if(Session::get('usertype')==1){
        echo '
        <li><a href="'.URL."createimprest".'">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-pink-500">
            <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd" />
            <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
        </svg> <span> Create New Imprest </span> </a>
    </li>
        ';
    }

    ?>  

     <?php
    if((Session::get('usertype')==2) || (Session::get('usertype')==0)){
        echo '
        <li><a href="'.URL."svrequest".'">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-pink-500">
            <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd" />
            <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
        </svg> <span> Site Visit Request</span> </a>
    </li>
        ';
    }

    ?>   
     <?php
    if(Session::get('usertype')==0){
        echo '
        <li><a href="'.URL."imprest".'">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-pink-500">
            <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd" />
            <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
        </svg> <span> Imprest Management</span> </a>
    </li>
        ';
    }

    ?>    
    <?php
    if((Session::get('usertype')==2) || (Session::get('usertype')==0)){
        echo '
        <li><a href="'.URL."customersaccount".'">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-pink-500">
            <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd" />
            <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
        </svg> <span> Manage Custmer Account </span> </a>
    </li>
        ';
    }

    ?>    

    <?php
    if((Session::get('usertype')==2) || (Session::get('usertype')==0)){
        echo '
        <li><a href="'.URL."dailyreport".'">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-pink-500">
            <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd" />
            <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
        </svg> <span> Daily Report </span> </a>
    </li>
        ';
    }

    ?> 

    <?php
    if(Session::get('usertype')==1){
        echo '
        <li><a href="'.URL."effectdailyreport".'">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-pink-500">
            <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd" />
            <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
        </svg> <span> Effect Daily Reports </span> </a>
    </li>
        ';
    }

    ?>   

    <?php
    if(Session::get('usertype')==1){
        echo '
        <li><a href="'.URL."staffrecord".'">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-pink-500">
            <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd" />
            <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
        </svg> <span> Staff Record Management </span> </a>
    </li>
        ';
    }

    ?>  

    <?php
    if(Session::get('usertype')==1){
        echo '
        <li><a href="'.URL."payroll".'">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-pink-500">
            <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd" />
            <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
        </svg> <span> Prepare Payroll </span> </a>
    </li>
        ';
    }

    ?>             


</div>

            <!-- sidebar overly for mobile -->
            <div class="side_overly" uk-toggle="target: #wrapper ; cls: is-collapse is-active"></div>

        </div>

        <!-- Main Contents -->
        <div class="main_content">
            <div class="mcontainer">







            

                      <table>
                        <tr>
                            
                            <td><input type="button" value="Account Details" id="acctdetails"></td>
                            <td><input type="button" value="Unblock Account" id="unblock"></td>
                            <td><input type="button" value="Allocation" id="allocation"></td>
                            <td><input type="button" value="Documentation" id="Documents"></td>
                        </tr>
                        
                        
                      </table>
    
         

                      <?php 
         echo '<div id="div_acctdetails">'; 
       //  print_r($this->orderdetails);
        // echo "<pre>";
        // print_r($this->attributedpayments);
         $order_result=$this->orderdetails;
         ?>  
         
         
                     <h2 class="text-xl font-semibold mt-7"> Payment History  started on <?php echo '  '. $order_result['created_at'];?> </h2>
                    <table class="table table-striped table-dark">
                        <thead>
                    <tr><td scope="col" align="center">Serial No</td>                    
                        <td scope="col" align="center">Date</td>
                        <td scope="col" align="center"> Details </td> 
                        <td scope="col" align="center">Amount</td>                      
                                           
                      
                    </tr>
                    </thead>
                    <tbody>
                
                                <?php
                                //   print_r($this->unclosedimprestvouchers);
                                               
                                    $sn=1;
                                //$n="YES";
                                //echo date_format($date,"Y/m/d H:i:s");
                                $amount=0;
                                foreach ($this->attributedpayments as $key => $value) {
                                    # code...
                                    $amount += $value['credit'];
                                    $realorderno=$value['orderno'];
                                    $mobile=$value['mobile'];
                                    echo'
                                        <tr>
                                        <td scope="col" align="left">'. $sn .'</td>
                                            <td scope="col"  align="left">'. $value["created_at"] .'</td>
                                            <td scope="col" align="left">'.$value['refid'].'</td>
                                            <td scope="col" align="right">'.$value['credit'].'</td> 
                                        </tr>


                                    ';
                                    $sn++;
                                }
                                echo "Total Amount Paid: ". $amount;
                                                              
                                ?>
                                </tbody>
                        </table>

                        <h2 class="text-xl font-semibold mt-7"> Account Details </h2>
                        <div class="card">
                        <form enctype="multipart/form-data" action="<?php echo URL."admcustomeraccount/dailyreport" ?>" method="post" >                      
                          <div class="card-body">
                                <input type="text" value="<?php echo "Site Ordered :  ". $order_result['pname'] ?>" readOnly >
                                <input type="text" value="<?php echo "Qty : ". $order_result['pqty'] ?>" readOnly>
                                <input type="text" value="<?php echo "Unit Price : ". $order_result['price'] ?>" readOnly>
                                <input type="text" value="<?php echo "Total Expected : ". ($order_result['pqty'] * $order_result['price']) ?>" readOnly>
                                <input type="text" value="<?php echo "Amount Paid : ". $amount ;?>" readOnly>
                                <input type="text" value="<?php echo "Balance  : ". (($order_result['pqty'] * $order_result['price']) - $amount) ;?>" readOnly>
                                <label>Is Payment UP TO DATE?</label>
                                    <select name="paymentstatus">
                                        <option value="YES">YES</option>
                                        <option value="NO">NO</option>
                                       
                                    </select>
                                <input type="text" value="" name="comment" placeholder="Give payment status">
                                <input type="text" value="" name="comment2" placeholder="Report your efforts and achievements">
                                <input type="hidden" value="<?php echo $realorderno ; ?>" name="orderno">
                                <input type="hidden" value="<?php echo $mobile ;?>" name="mobile">
                               <input type="submit" value="Submit Daily Report">
                            </div>
                        </form>
                    </div>

                        
         
         <?php
            echo "</div>";
         ?>    

          
        </div>
    </div>
            
    



