$(document).ready(function(){

	//const paymentForm = document.getElementById('paymentForm');
	//const paymentForm=$('#paymentForm');
	//paymentForm.addEventListener("submit", payWithPaystack, false);
	$("#withdraw").click(function(){
		sevenpcent=$('#sevenpcent').val();
		bank=$('#bank').val();
		due=$('#due').val();
		data="You can not withdraw amount less than =N=1,000";
			data1="You can not withdraw without bank details";
			data2="You can not withdraw because you have due value to offset";
		if(sevenpcent < 1000){			
			alert("You can not withdraw amount less than =N=1,000");
			$('#myinfo').html("<strong style='color: #0FA015'>" + data + "</strong>");
			exit();
		}
		if(bank==""){
			
			alert("You can not withdraw without bank details");
			$('#myinfo').html("<strong style='color: #0FA015'>" + data1 + "</strong>");
			exit();
		}
		if(due > 0){
			alert("You can not withdraw because you have due value to offset");
			$('#myinfo').html("<strong style='color: #0FA015'>" + data2 + "</strong>");
			exit();
		}
		$.post("dashboard/withdraw",
	                        // {staffid(in database):sid(variable here)etc},
	                        {sevenpcent:sevenpcent,bank:bank},
	                        function (data) {
	                        	alert(data.message);
	                        	window.location.href = "https://dreamcityhes.com.ng/land/dashboard";
	                        },'json'
	    );


	});
	$("#offset").click(function(){
		sevenpcent=$('#sevenpcent').val();
		orderno=$('#orderno').val();


		$.post("dashboard/offset",
	                        // {staffid(in database):sid(variable here)etc},
	                        {sevenpcent:sevenpcent,orderno:orderno},
	                        function (data) {
	                        	alert(data.message);
	                        	window.location.href = "https://dreamcityhes.com.ng/land/dashboard";

	                        },'json'
	    );



	});

	$("#payWithPaystack").click(function(e)
	{
		e.preventDefault();	

	
		//get other variables
		mobile=$('#mobile').val();
		orderno=$('#orderno').val();
		amt=$('#amount').val();
		$('#credit').val(amt);
		credit=$('#credit').val();

		

		refid=$('#refid').val();
		let handler = PaystackPop.setup({
		key: 'pk_live_0959c6984b3896a0fb59c352cf151adecf98bd9f', //', //'pk_test_56d321ccae57d5b3f6281255c8e83ae0e279a3a7', //'pk_live_0959c6984b3896a0fb59c352cf151adecf98bd9f', //, // Replace with your public key
		email: $('#email-address').val(),
		amount: $('#amount').val() * 100,							    
		ref: '' + refid, // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
		// label: "Optional string that replaces customer email"
		onClose: function(){
			alert('Window closed.');
		},
		callback: function(response){
			//let message = 'Payment complete! Reference: ' + response.reference;
			//alert(message);		
			$.post("dashboard/payagain",
	                        // {staffid(in database):sid(variable here)etc},
	                        {mobile:mobile,orderno:orderno,refid:refid,credit:credit},
	                        function (data) {
	                          alert(data.message);
	                          var delay=2000;
	                          setTimeout(function(){
	       						 //window.location.href = "http://localhost:8080/land/billings";
	       						window.location.href = "https://dreamcityhes.com.ng/land/dashboard";
	            			},delay)



	                      },'json'
	                      );

			 








			}
		});
		handler.openIframe();


	});




});