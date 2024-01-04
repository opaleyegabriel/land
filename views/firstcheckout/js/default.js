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
		refid=$('#refid').val();
		product=$('#product').val();
		qty=$('#qty').val();
		price=$('#price').val();
		debit=$('#debit').val();
		credit=$('#credit').val();		


		//refid=$('#refid').val();
		let handler = PaystackPop.setup({
		key:  'pk_live_bfa6e6abfbfd97d03d2690a53a395d495792ea00',  // Replace with your public key
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
			 $.post("firstcheckout/savepayment",
	                        // {staffid(in database):sid(variable here)etc},
	                        {mobile:mobile,orderno:orderno,refid:refid,product:product,qty:qty,price:price,debit:debit,credit:credit},
	                        function (data) {
	                          alert(data.message);
	                          var delay=2000;
	                          setTimeout(function(){
	       						 window.location.href = "https://dreamcityhes.com/land/dashboard";
	       						 //window.location.href = "http://localhost:8080/land/dashboard";
	            			},delay)



	                      },'json'
	                      );









			}
		});
		handler.openIframe();


	});










});