$(document).ready(function(){

	//const paymentForm = document.getElementById('paymentForm');
	//const paymentForm=$('#paymentForm');
	//paymentForm.addEventListener("submit", payWithPaystack, false);




$("#do_it_right").click(function(e){
		e.preventDefault();	

	orderno=$('#orderno').val();
	let vv=$("#do_it_right").val();


	if(vv == orderno){
	}
	
		 $.post("hoogdelete/delete",
	                        // {staffid(in database):sid(variable here)etc},
	                        {orderno:orderno},
	                        function (data) {
	                        	//alert(data.message);
	                         // alert(data);
	                          var delay=2000;
				                          setTimeout(function(){
				       						 //window.location.href = "http://localhost:8080/land/hoogdelete";
				       						window.location.href = "https://dreamcityhes.com/land/hoogpayapprovals";
				            			},delay)

	     	},'json'
	    );





});
	
	








});