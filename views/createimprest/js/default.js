$(document).ready(function(){

	//const paymentForm = document.getElementById('paymentForm');
	//const paymentForm=$('#paymentForm');
	//paymentForm.addEventListener("submit", payWithPaystack, false);
	$("#divcreate").hide();
	$("#divinitiate").hide();
	$("#divretire").hide();

$("#create").click(function(){
	$("#divinitiate").hide(1000);
	$("#divretire").hide(1000);
	$("#divcreate").show(2000);
})

$("#initiate").click(function(){
	$("#divcreate").hide(1000);
	$("#divretire").hide(1000);
	$("#divinitiate").show(2000);
})

$("#retire").click(function(){
	$("#divcreate").hide(1000);
	$("#divinitiate").hide(1000);
	$("#divretire").show(2000);
})

});