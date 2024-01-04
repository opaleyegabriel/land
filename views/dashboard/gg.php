<?php
 //new one

        if(!empty($this->allmyproducts)){

 //echo "<pre>";

      // print_r($this->allmyproducts);

            foreach ($this->allmyproducts as $key => $value) {

            $balance=$value["totalamt"] - $value["amountpaid"];

            for ($randomNumber = mt_rand(1, 10), $i = 1; $i < 10; $i++) {

                $randomNumber .= mt_rand(0, 10);

              }

              for ($randomNum = mt_rand(1, 10), $i = 1; $i < 10; $i++) {

                $randomNum .= mt_rand(0, 4);

              }



              $refid=$randomNumber.$randomNum.$value['orderno'];

              $temurl2="dashboard/paynow"; 






        echo'

        <h2 class="text-xl font-semibold mt-7"> Your Dashboard </h2>
        <h3>UNDER MAINTAINANCE..CHECK BACK LATER!</h3>    

                            

                                

                        <div class="card">

                            <div class="card-body">

                                <div class="promo-area">


                                     <div class="zigzag-bottom">';  

                                            //with the assumption that all days are 31

                                           //$mdays=31                               

                                           /*

                                            $a=array($this->allitems);

                                            $b=(in_array(12, $a));

                                            print_r($b);

                                            */

                                            $date=date_create($this->dateofcontractactivation['created_at']);

                                            //$date1= date('Y-m-d H:i:s',strtotime('+1 month',strtotime($date)));
                                            //echo "Testing continue";
                                            //echo ($this->dateofcontractactivation['created_at']);
                                            //exit();

                                            $mont=$this->dateofcontractactivation['pplannum'];
                                            
                                          
                                           
                                           

                                           

                                            $month=31;



                                             $nnn= ($month * number_format($this->dateofcontractactivation['pplannum']))." days";

                                            


                                            $newendmonth=date_add($this->dateofcontractactivation['created_at'],date_interval_create_from_date_string($nnn));

                                             $newendmonth=date_format($date,"Y-m-d H:i:s");


                                              echo "fift". $newendmonth;
                                            
                                             
                                             //calculate next 31 days

                                             $nnn= "31 days";

                                             $newendmonth2=date_add($newendmonth,date_interval_create_from_date_string($nnn));
                                             
                                             $newendmonth2=date_format($newendmonth,"Y-m-d H:i:s");




                                             $today=date("Y-m-d H:i:s");
                                             echo "fift". $today;
                                              exit();

                                    echo '<div class="single-promo promo1">';                                    

                                            if($newendmonth > $today){

                                                echo '<p>Contract Activated on:'. date('d-m-Y',strtotime($this->dateofcontractactivation['created_at'])) . '</p>';

                                                    echo '<p>Contract Expire on:'. date('d-m-Y',strtotime($newendmonth)). ' </p>';

                                                    echo '<p style=size:10em;>Complete your payment on or before contract expired date</p>';
                                                    echo "<br/>";

                                            }

                                            else {

                                                # code...

                                                echo '<p style=size:1em color:red;>CONTRACT EXPIRED</p>';

                                                echo '<p style=size:10em;>extra 30 days is given to all clients with expired contract to pay up before change of value!</p>';
                                                echo "<br/>";





                                                $startTimeStamp = strtotime($newendmonth);
                                                $endTimeStamp = strtotime($newendmonth2);
                                                $timeDiff = abs($endTimeStamp - $startTimeStamp);                                      
                                                $numberDays = $timeDiff/86400;  // 86400 seconds in one day
                                                

                                                // and you might want to convert to integer

                                                $numberDays = intval($numberDays);

                                                echo '<p style=size:1em color:red;>count down!! REAMINING'. $numberDays.'   days</p>';

                                        }

                                    







                               



                                

                                if($value["qty"] >= 2){

                                    if(($this->myrewards['totAmt']) > 0){

                                    /*

                                    echo    '

                                                <div id="myinfo"></div>

                                                <p> Accumulated Agent Fee</p>

                                                <p>Total Amount <span>₦'. number_format($this->myrewards["totAmt"],2) .'k</span><input type="hidden" id="sevenpcent" name="sevenpcent" value="'. $this->myrewards["totAmt"],2 .'" disabled/>

                                                <input type="text" name="bank" id="bank" value="" placeholder="Acctno/Bank"/><input type="button" id="withdraw" value="Withdraw"> <br/> <br> <input type="button" id="offset" value="Offset My Due"  ></p>

                                            ';

                                        */

                                    }



                                }else{

                                    

                                }

                               echo '</div>';





                            echo    '

                            <form id="paymentForm"   action="'. URL.$temurl2 .'" method="post" >



                            </div>

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

                                                <p>Due <span style="color:Red;">₦'. number_format($value["due"],2) .'k</span> <input type="hidden" name="due" id="due" value="'. $value["due"] .'"  > </p>

                                            </div>

                                        </div>

                                        <input type="hidden" id="mobile" name="mobile" value='. session::get('lphone') .' required />

                                        <input type="hidden" name="orderno" value="'. $value['orderno'] .'" id="orderno" required/>

                                        <input type="hidden" name="refid" value="'. $refid. '" id="refid" required />

                                        <input type="hidden" id="email-address" value="'. session::get('email').'" required />

                                         <input type="hidden" name="credit" value="" id="credit"/><br/><br/>';

                                         if ($balance==0){

                                            echo  ' <div class="col-md-3 col-sm-6">

                                            <div class="single-promo promo1">

                                                <i class="fa fa-gift"></i>

                                                <p> <span style="color:WHITE;">PAYMENT SUCCESSFULLY COMPLETED</span> </p>

                                            </div>

                                        </div>';

                                         }else

                                         {

                                            echo  '<div class="pt-3 align items-center" d-flex >
                                                <input type="number" id="amount" min="2000" name="amount" class="with-border" value="" placeholder="Amount to Pay">
                                                <Div>Pay With Paystack</Div>
                                        <input type="checkbox" name="usepaystack2" value="Pay With PayStack" checked>
                                                 <input type="submit" id="" class="with-border" value="Pay Now"">

                                         </div>';

                                         }



                                       

                           echo         '</div>

                                </div>

                            </div>

                            

                        </form>

