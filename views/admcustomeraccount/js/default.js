$(document).ready(function(){

	//const paymentForm = document.getElementById('paymentForm');
	//const paymentForm=$('#paymentForm');
	//paymentForm.addEventListener("submit", payWithPaystack, false);
	$("#div_documents").hide();
	$("#div_unblock").hide();
	$("#div_allocation").hide();

$("#acctdetails").click(function(){
	$("#div_documents").hide(1000);
	$("#div_unblock").hide(1000);
	$("#div_allocation").hide(1000);
	$("#div_acctdetails").show(2000);
})

$("#unblock").click(function(){
	$("#div_documents").hide(1000);
	$("#div_acctdetails").hide(1000);
	$("#div_allocation").hide(1000);
	$("#div_unblock").show(2000);
})

$("#allocation").click(function(){
	$("#div_documents").hide(1000);
	$("#div_acctdetails").hide(1000);
	$("#div_unblock").hide(1000);
	$("#div_allocation").show(2000);
})

$("#documents").click(function(){
	$("#div_allocation").hide(1000);
	$("#div_acctdetails").hide(1000);
	$("#div_unblock").hide(1000);
	$("#div_documents").show(2000);
})

});