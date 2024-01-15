$(document).ready(function(){

	//const paymentForm = document.getElementById('paymentForm');
	//const paymentForm=$('#paymentForm');
	//paymentForm.addEventListener("submit", payWithPaystack, false);
	$("#Ilorin").hide();
	$("#Osogbo").hide();
	$("#Ibadan").hide();

$("#showIlorin").click(function(){
	$("#Osogbo").hide(1000);
	$("#Ibadan").hide(1000);
	$("#Ilorin").show(2000);
})

$("#showOsogbo").click(function(){
	$("#Ilorin").hide(1000);
	$("#Ibadan").hide(1000);
	$("#Osogbo").show(2000);
})

$("#showIbadan").click(function(){
	$("#Ilorin").hide(1000);
	$("#Osogbo").hide(1000);
	$("#Ibadan").show(2000);
})

});