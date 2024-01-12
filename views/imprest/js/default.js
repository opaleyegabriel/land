$(document).ready(function(){

	//const paymentForm = document.getElementById('paymentForm');
	//const paymentForm=$('#paymentForm');
	//paymentForm.addEventListener("submit", payWithPaystack, false);
	
	$("#divinitiate").hide();
	$("#divretire").hide();

$("#initiate").click(function(){
	
	$("#divretire").hide(1000);
	$("#divinitiate").show(2000);
})

$("#retire").click(function(){
	
	$("#divinitiate").hide(1000);
	$("#divretire").show(2000);
})

});