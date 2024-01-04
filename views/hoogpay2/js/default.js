$(document).ready(function(){

	//const paymentForm = document.getElementById('paymentForm');
	//const paymentForm=$('#paymentForm');
	//paymentForm.addEventListener("submit", payWithPaystack, false);

adon=$('#adon').val();
$("#daccounttext").hide();




$("#daccount").click(function(){

	if($('#daccount').is(":checked")){
		$("#daccounttext").show();
	}else{
		$("#daccounttext").hide();
	}
	
});


if(adon=="YES"){
	    $("#pay_section_worker3").show(300);
	    $("#pay_section_worker1").hide(300);	                          	
	    $("#daccounttext").hide(300); 

		mobile=$('#mobile').val();
		orderno=$('#orderno').val();
		refid=$('#refid').val();		
		credit=$('#amount').val();
		


		email= $('#email').val();
		amount= $('#amount').val();

		

		
		 $.post("hoogpay2/paymenttrackcheck",
	                        // {staffid(in database):sid(variable here)etc},
	                        {email:email},
	                        function (data) {	                        
	                       if(data.s_status=="No"){
	                       	alert(data.message);
							window.location.href = "https://dreamcityhes.com/land/dashboard";
	                       	exit();
	                       }
	                       if(data.s_status=="Yes"){
	                       	alert(data.message);



			                       		$.post("hoogpay2/payagain_new",
	                        // {staffid(in database):sid(variable here)etc},
				                        {email:email,mobile:mobile,orderno:orderno,refid:refid,credit:credit},
				                        function (data) {
				                          alert(data.message);
				                          var delay=2000;
				                          setTimeout(function(){
				       						 //window.location.href = "http://localhost:8080/land/dashboard";
				       						window.location.href = "https://dreamcityhes.com/land/dashboard";
				            			},delay)



				                      },'json'
				                      );

	                       }
	                   },'json'
	            );






}















$("#hoogpay").click(function(e){
		e.preventDefault();	

//save the payment for approval


//get other variables
		mobile=$('#mobile').val();
		orderno=$('#orderno').val();
		refid=$('#refid').val();		
		credit=$('#credit').val();
		ordercopy=orderno;
		refcopy=refid;
		sentfrom=$('#sentfrom').val();


		email= $('#email').val();
		amount= $('#amount').val();



		if($('#daccount').is(":checked")){
			//dont allow  empty sendfrom 
			
			if (sentfrom==""){
				alert("Please enter payment reference or Account name used for payment");
				exit();
			}
			
		}else{
			alert("Please Click Allow transaction reference and enter reference no or sender's name");
			exit();
		}

		
		orderno=refid;
		 $.post("hoogpay2/paymenttrack",
	                        // {staffid(in database):sid(variable here)etc},
	                        {email:email,amount:amount,orderno:orderno,sentfrom:sentfrom},
	                        function (data) {
	                        	//alert(data.message);
	                         // alert(data);
	                          var delay=2000;
	                          setTimeout(function(){
	       						 $("#pay_section_worker3").show(300);
	                          	$("#pay_section_worker1").hide(300);	                          	
	                          	$("#daccounttext").hide(300); 
	            			},delay)

	     	},'json'
	    );







					const num = document.querySelector(".pay_section_worker3_number");
					let counter = 0;
					setInterval(() => {
					  if (counter == 100) {
					    clearInterval();
					  } else {
					    counter += 1;
					    num.textContent = counter + "%";
					    	//Now check if payment is approved

					    	//change refid to orderno in value
					    	orderno=refid;
					    	$.post("hoogpay2/check4approval",
	                        // {staffid(in database):sid(variable here)etc},
	                        {email:email,orderno:orderno},
	                        function (data) {
	                        	//alert(data.message);   
	                        	let nnnn= data.s_status;
	                        	if(nnnn=='Yes')  {	                        		//
	                        			clearInterval();
	                        			//change order back to orderno and refid back to ref id
	                        			orderno=ordercopy;
	                        			refid=refcopy;
	                        			$.post("hoogpay2/payagain",
	                        // {staffid(in database):sid(variable here)etc},
				                        {mobile:mobile,orderno:orderno,refid:refid,credit:credit},
				                        function (data) {
				                          alert(data.message);
				                          var delay=2000;
				                          setTimeout(function(){
				       						 //window.location.href = "http://localhost:8080/land/dashboard";
				       						window.location.href = "https://dreamcityhes.com/land/dashboard";
				            			},delay)



				                      },'json'
				                      );



	                        		//
	                        	}                   

						     	},'json'
						    );



						    





					  }
					}, 10000);

});
	
	








});