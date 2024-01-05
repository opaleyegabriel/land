

	<?php



	session::init();

	if(session::get('adon')){

		$adon="YES";

	}else{

		$adon="NO";

	}



	//print_r($this->getOtherInfo);

	//echo "<br> This is order no";

	//echo Session::get("orderno");

                       //exit();

	

					   foreach ($this->getOtherInfo as $key => $value) {

						$Apcent=$value["AgentPcent"];

						$Bank=$value["Bank"];

						$Acctnum=$value["AcctNum"];

					}

					Session::set("agentpcent",$Apcent);

					//echo Session::get("agentpcent");

	?>

<div class="pay_body">

		<div class="pay_header">

			<div class="pay_logo"><img src="<?php echo URL ?>public/images/logo.png"></div>

			<div class="pay_amount"><p class="pay_actualamt">NGN <?php echo number_format(session::get('amount'));?></p><p class="pay_email"> <?php echo session::get('email') ;?></p></div>

			

		</div>



		<div id="daccounttext"><Input type="text" id="sentfrom" name="sentfrom" placeholder="Sender account name only" class="with-border"></div>

		<div class="pay_section">

			<div class="pay_section_worker">

				<div class="pay_section_worker1" id="pay_section_worker1">

					<p class="pay_section_text"> Transfer exact amount to: </p>

					<p class="pay_section_acctno"> <?php echo $Acctnum ;?> </p>

					<p class="pay_section_bank"><?php echo $Bank ;?> </p>						

						 <?php

                        echo ' <div class="card">';

                          echo '<div class="card-body">';

                         

                          

                          	                     

                        	//generate random number for refid

                          for ($randomNumber = mt_rand(1, 10), $i = 1; $i < 10; $i++) {

			                $randomNumber .= mt_rand(0, 10);

			              }

                          

                          //pk_test_56d321ccae57d5b3f6281255c8e83ae0e279a3a7

                          echo '

                            <input type="hidden" id="mobile" name="mobile" value='. session::get('lphone') .' required />                            

                            <input type="hidden" id="orderno" name="orderno" value='. session::get('orderno') .' required />

                            <input type="hidden" id="amount" value='. session::get('amount') .' name="amount" required />

                            <input type="hidden" id="credit" value='. session::get('amount') .' name="credit" required />

                            <input type="hidden" id="email" value='. session::get('email') .' name="email" required />

                            

                            <input type="hidden" id="refid" value='. $randomNumber .' name="refid" required />    

                          	<input type="hidden" id="adon" value='. $adon .' />

                          

                          

                          <div class="form-submit">

                            

                            <input type="button" id="hoogpay" name="sent" value= "I have sent the money">

                          </div>





                          <div id="checkchen"><input type="checkbox" class="with-border" id="daccount" name="daccount" value="Different Account" s/>

										<label for="daccount"> Allow transaction reference </label>

										</div>

                            ';



                          echo '</div></div>  



                          ';

                         ?>

					

					

				</div>

				<div class="pay_section_worker2"></div>



				<div class="pay_section_worker3" id="pay_section_worker3" style="display: none;">

					<div class="pay_section_worker3_container">				 

					  

					  <div class="pay_section_worker3_bar">

					    <!--  $  Graphic section start -->

					    <svg>

					      <circle cx="50%" cy="50%" r="50%"></circle>

					    </svg>

					    <!--  $  Graphic section End-->



					    <!--  %  content section start -->

					    <h1 class="pay_section_worker3_number">0%</h1>

					    <h4 class="pay_section_worker3_config">Verifying Payment</h4>

					    <!-- %   content section End -->

					  </div>

					  <!--  @  body section End-->

					</div>

				</div>

				

			</div>

			



		</div>

		<div class="pay_footer">

			<div class="pay_footer_info">We Accept Transfer Only</div>

			<div class="pay_footer_logos">

			<div class="ussd"><img src="<?php echo URL ?>public/images/ussd.png"><p> USSD</p></div>

			<div class="transfer"><img src="<?php echo URL ?>public/images/transfer.png"><p> Bank Transfer</p></div>

			</div>

			

		</div>









</div>

