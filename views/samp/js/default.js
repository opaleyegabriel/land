$(document).ready(function(){

	//const paymentForm = document.getElementById('paymentForm');
	//const paymentForm=$('#paymentForm');
	//paymentForm.addEventListener("submit", payWithPaystack, false);

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
		key: 'pk_test_56d321ccae57d5b3f6281255c8e83ae0e279a3a7', //pk_live_0959c6984b3896a0fb59c352cf151adecf98bd9f', //'pk_test_56d321ccae57d5b3f6281255c8e83ae0e279a3a7', //'pk_live_0959c6984b3896a0fb59c352cf151adecf98bd9f', //, // Replace with your public key
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
			$.post("samp/payAgain",
	                        // {staffid(in database):sid(variable here)etc},
	                        {mobile:mobile,orderno:orderno,refid:refid,credit:credit},
	                        function (data) {
	                          alert(data.message);
	                          var delay=2000;
	                          setTimeout(function(){
	       						 //window.location.href = "http://localhost:8080/land/billings";
	       						window.location.href = "https://dreamcity.com.ng/land/samp";
	            			},delay)



	                      },'json'
	                      );

			 








			}
		});
		handler.openIframe();


	});










});