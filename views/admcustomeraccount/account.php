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
                                
                            </div>
                        </a>

                        

                        <a href="<?php echo URL."admpwdchange/index"; ?>">
                            <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"></path><path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"></path></svg>
                            Change Password
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
if((Session::get('usertype')==0) || (Session::get('usertype')==2)){
echo '
<li><a href="'. URL."admcustomeraccount".'">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-pink-500">
    <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd" />
    <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
</svg> <span> Manage Customer Account </span> </a>
</li>
';
}

?>

<?php
if(Session::get('usertype')==1){
echo '
<li><a href="'. URL."svfeedback".'">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-pink-500">
    <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd" />
    <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
</svg> <span> Site Visits Feedback</span> </a>
</li>
';
}

?>

<?php
if(Session::get('usertype')==1){
echo '
<li><a href="'. URL."admassignaccountofficer".'">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-pink-500">
    <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd" />
    <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
</svg> <span> Manage Client Account</span> </a>
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
if((Session::get('usertype')==1)){
echo '
<li><a href="'.URL."admdailyreport".'">
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
                  <div>
                    <h1>
                    <?php
                        echo $this->nameofclient['name'];
                        echo $this->nameofclient['phone'];
                    ?>
                    </h1>
                  </div>
                      <table>
                        <tr>
                            
                            <td><input type="button" value="Account Details" id="acctdetails"></td>
                            <td><input type="button" value="Unblock Account" id="unblock"></td>
                            <td><input type="button" value="Allocation" id="allocation"></td>
                            <td><input type="button" value="Beacons" id="beacon"></td>
                            <td><input type="button" value="Documentation" id="documents"></td>
                        </tr>
                        
                      </table>
    
         

    <?php 

         echo '<div id="div_acctdetails">'; 
                //print_r($this->dailyhistory);
                    //check if daily report is available in the past, last two daily report
                    if(!empty($this->dailyhistory)){
                        echo "<h1>Report Latest History</h1>";
                        foreach ($this->dailyhistory as $key => $value) {
                            echo '
                            
                                <div><p>Reported on : '. $value["created_at"] .'</p>
                                <p>Up-to-date?? : '. $value["uptodate"] .'</p>
                                <p>Report : '. $value["comment2"] .'</p>
                                <p>What you did : '. $value["comment"] .'</p>
                                </div>
                                ................................................................
                            
                            ';
                            }
                    }
                  
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
                                            <td scope="col" align="right">'. number_format($value['credit']).'</td> 
                                        </tr>


                                    ';
                                    $sn++;
                                }
                                echo "Total Amount Paid: ". number_format($amount);
                                                              
                                ?>
                                </tbody>
                                <tfooter>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>Total Paid</td>
                                        <td scope="col" align="right"><?php echo " =N= ". number_format($amount) ;?></td>
                                    </tr>
                                </tfooter>
                        </table>

                        <h2 class="text-xl font-semibold mt-7"> Account Details </h2>
                        <div class="card">
                        <form enctype="multipart/form-data" action="<?php echo URL."admcustomeraccount/transactiondailyreport" ?>" method="post" >                      
                          <div class="card-body">
                                <input type="text" value="<?php echo "Site Ordered :  ". $order_result['pname'] ?>" readOnly >
                                <input type="text" value="<?php echo "Qty : ". $order_result['pqty'] ?>" readOnly>
                                <input type="text" value="<?php echo "Unit Price : =N= ". number_format($order_result['price']) ?>" readOnly>
                                <input type="text" value="<?php echo "Total Expected : =N= ". number_format(($order_result['pqty'] * $order_result['price'])) ?>" readOnly>
                                <input type="text" value="<?php echo "Amount Paid : =N= ". number_format($amount) ;?>" readOnly>
                                <input type="text" value="<?php echo "Balance  : =N= ". number_format((($order_result['pqty'] * $order_result['price']) - $amount)) ;?>" readOnly>
                                <label>Is Payment UP TO DATE?</label>
                                    <select name="paymentstatus">
                                        <option value="YES">YES</option>
                                        <option value="NO">NO</option>
                                       
                                    </select>
                                    <?php 
                                            $mybalance=(($order_result['pqty'] * $order_result['price']) - $amount);
                                    ?>
                                <input type="hidden" value="<?php echo $mybalance ;?>" name="balance" >
                                <input type="text" value="" name="comment" placeholder="Give payment status" required>
                                <input type="text" value="" name="comment2" placeholder="Report your efforts and achievements" required>
                                <input type="hidden" value="<?php echo $realorderno ; ?>" name="orderno">
                                <input type="hidden" value="<?php echo $mobile ;?>" name="mobile">
                               <input type="submit" value="Submit Daily Report">
                            </div>
                        </form>
                    </div>

         <?php
            echo "</div>";
         ?>    





        <?php 
         echo '<div id="div_unblock">'; 
         ?> 
         

         <?php 
         
        // print_r($this->orderdetails);
             $order_result=$this->orderdetails;
           $productpaymentlength=$this->numofmonthlengthforaproduct;
           //print($productpaymentlength['pplannum']);
        //print_r($this->numofmonthlengthforaproduct);
            $month=30;
             //Date the transaction for this order started
            $dateofactivation=($order_result['created_at']);
             $nnn= ($month * number_format($productpaymentlength['pplannum']))." days";
            //$enddate=date_add($date,date_interval_create_from_date_string($nnn));
            $enddate = date('Y-m-d H:i:s', strtotime($dateofactivation .$nnn));
             $newstartdate=date("Y-m-d H:i:s", strtotime($enddate. ' + 1 days'));
             $today=date("Y-m-d H:i:s");
             if(($mybalance > 0) && ($enddate < $today)){
                echo 'ACCOUNT BLOCKED


                <h2 class="text-xl font-semibold mt-7"> Payment History  started on'. $order_result["created_at"].' </h2>
                <table class="table table-striped table-dark">
                    <thead>
                <tr><td scope="col" align="center">Serial No</td>                    
                    <td scope="col" align="center">Date</td>
                    <td scope="col" align="center"> Details </td> 
                    <td scope="col" align="center">Amount</td>                      
                                       
                  
                </tr>
                </thead>
                <tbody>';

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
                                            <td scope="col" align="right">'. number_format($value['credit']).'</td> 
                                        </tr>


                                    ';
                                    $sn++;
                                }
                               
                echo '
                </tbody>
                <tfooter>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Total Paid</td>
                        <td scope="col" align="right">=N='. number_format($amount).'</td>
                    </tr>
                </tfooter>
             </table>';
             $sms="Dear Client, date of your purchased land expired on". $enddate .", a new contract is activated in accordance to pre-contract agreement signed. thanks. DREAMCITY HES LTD ";
            echo '
                    <h2 class="text-xl font-semibold mt-7"> Account Expired on  '. $enddate .' </h2>
                    <div>Note that New contract will be giving to the customer effective from a day after expiring date and at new Price</div>
                    <div class="card">
                    <form enctype="multipart/form-data" action="'.URL.'admcustomeraccount/unblockreport" method="post" >                      
                    <div class="card-body">
                            <input type="text" value="Site Ordered :'. $order_result["pname"].'" readOnly >
                            <input type="text" value="Qty : '. $order_result["pqty"].'"readOnly>
                            <input type="text" value="Unit Price : =N= '. number_format($order_result["price"]).'" readOnly>
                            <input type="text" value="Total Expected : =N= ' . number_format(($order_result["pqty"] * $order_result["price"])).'" readOnly>
                            <input type="text" value="Amount Paid : =N= '. number_format($amount).'" readOnly>
                            <input type="text" value="Balance  : =N= '. number_format((($order_result["pqty"] * $order_result["price"]) - $amount)).'" readOnly>
                            <input type="hidden" value="'.(($order_result["pqty"] * $order_result["price"]) - $amount).'" name="balance" >
                            <input type="hidden" value="'.$realorderno.'" name="orderno">
                            <input type="hidden" value="'. $mobile .'" name="mobile">
                            <Label> New Price is as follows</label>
                            <input type="text" value="Unit Price : =N= '. number_format($productpaymentlength["price"]).'" readOnly>
                            <input type="text" value="New Total Expected : =N= ' . number_format(($order_result["pqty"] * $productpaymentlength["price"])).'" readOnly>
                            <input type="text" value="Amount Paid : =N= '. number_format($amount).'" readOnly>
                            <input type="text" value="New Balance  : =N= '. number_format((($order_result["pqty"] * $productpaymentlength["price"]) - $amount)).'" readOnly>
                            <input type="hidden" value="'. $productpaymentlength["price"] .'" name="newprice" required>
                            <input type="hidden" value="'. $order_result["price"] .'" name="oldprice" required>


                            <input type="hidden" value="'. $dateofactivation .'" name="startdate" required>
                            <input type="hidden" value="'. $enddate .'" name="enddate" required>
                            <input type="hidden" value="'. $newstartdate .'" name="newstartdate" required>


                            <input type="hidden" value="'. $order_result["orderno"] .'" name="lngorderno" required>
                            <input type="hidden" value="'.$order_result["pqty"]  . '" name="qty" required>
                            <input type="textarea" row="4" value="'. $sms .'" name="sms" readOnly required>
                            <input type="text" value="" name="comment" placeholder="Please report effort on personal notification through call,sms or what is successful or not" required>

                            
                        <input type="submit" value="Unblock Account">
                        </div>
                    </form>
                </div>            
            ';







             }else{
                echo "ACCOUNT NOT BLOCKED";
             }
                
             
         ?>
         
         
         
         <?php
            echo "</div>";
         ?>    





        <?php 
         echo '<div id="div_allocation">'; 
       //SELECT * FROM `tbl_debt` WHERE mobile='09063536040'
            //print_r($this->blocks_list);
           // print_r($this->attributedpayments);
           foreach ($this->attributedpayments as $key => $value) {
            $pid_=$value['pid'];
            $pqty_=$value['pqty'];
            $mobile_=$value['mobile'];
            
            # code...
           }
        
         ?>  

            <?php 
              // print_r($this->plot_list);
                $order_result=$this->orderdetails;
                $pa=$this->pastallocated['totNum'];
                //check if allocation is completely done
                if(number_format($pqty_) >  number_format($pa)  ){
                    echo '
                    <h2 class="text-xl font-semibold mt-7"> Allocation for the land Details Below </h2>
                    <div class="card">
                    <form enctype="multipart/form-data" action="'.URL.'admcustomeraccount/allocate" method="post" >                      
                    <div class="card-body">
                            <input type="hidden" name="pid" value="'. $pid_.'"  readOnly required>
                            <Input type="hidden" name="mobile" value="'.$mobile_.'" readOnly required>
                            <input type="text" name="allocatedcount" value="'.$pa.'" readOnly required>
                            <input type="text" name="allocation_orderno" value="'.$order_result['orderno'].'"  readOnly required>
                            <label>QTY</label>
                            <input type="text" name="qty" value="'.$pqty_.'" readOnly required>
                        <label>BLOCK </label>
                        <select name="blocks_list" id="blocks_list" required>
                            <option value disable selected> Select Block</option>';
                            
                                foreach ($this->blocks_list as $key => $value) {
                            
                                   echo '<option value="'. $value["blockaddress"] .'">'.$value["blockaddress"].'</option>';
                            
                                }
                        echo '</select>
                        <Label>PLOT</label>
                        <select name="plot_list" id="plot_list" required>
                            <option value disable selected> Select Plot</option>';
                            
                                foreach ($this->plot_list as $key => $value) {
                        
                            echo '<option value="'.$value["plot"].'">'.$value["plot"].'</option>';
                                }
                            
                       echo '</select>
                   
                        </div>
                                    <input type="submit" value="Update Approved Allocation">
                            </form>
                                </div>
                    
                    
                    
                    
                    ';
                
                
                }else{
                    foreach ($this->allocated as $key => $value) {
                        $sitename=$value['product_name'];
                        $block=$value['blockaddress'];
    
                    }
                   echo '<h2 class="text-xl font-semibold mt-7">'. $sitename .'   Block  ('. $block .')    allocated with details below </h2>
                    <div class="card">
                    <tr align="center">';
                    
                    foreach ($this->allocated as $key1 => $value1) {
                        echo '
                            <td>Plot</td>
                                <td>'. $value1["plot"] .'</td>
                    
                    ';
    
                    }
                                        
                    echo ' 
                     </tr>    
                    </div>';


                }
            ?>
                      
               
         
         <?php
            echo "</div>";
         ?>    






        <?php 
         echo '<div id="div_beacon">'; 
       //  print_r($this->orderdetails);
        // echo "<pre>";
        // print_r($this->attributedpayments);
        // $order_result=$this->orderdetails;
       
         ?>  
         
                <?php 
                    echo'
                    <h2 class="text-xl font-semibold mt-7"> Allocation for the land Details Below </h2>
                   <div class="card">
                   <form enctype="multipart/form-data" action="'.URL.'admcustomeraccount/allocate" method="post" >                      
                   <div class="card-body">
                      
                       <input type="text" name="point1" placeholder="Point 1" required>
                       <input type="text" name="point2" placeholder="Point 2" required>
                       <input type="text" name="point3" placeholder="Point 3" required>
                       <input type="text" name="point4" placeholder="Point 4" required>
                       <input type="submit" value="Save Beacons">
                   </form>
                   </div>
                   </div>';
                ?>




         <?php
            echo "</div>";
         ?>    







        <?php 
         echo '<div id="div_documents">'; 
       //  print_r($this->orderdetails);
        // echo "<pre>";
        // print_r($this->attributedpayments);
        // $order_result=$this->orderdetails;
       
         ?>  
         
                   Document desction     
         
         <?php
            echo "</div>";
         ?>    

















        </div>
    </div>
                                     
    



