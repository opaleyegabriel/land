$(document).ready(function(){

	//const paymentForm = document.getElementById('paymentForm');
	//const paymentForm=$('#paymentForm');
	//paymentForm.addEventListener("submit", payWithPaystack, false);
	$("#Ilorin").hide();
	$("#Osogbo").hide();
	$("#Ibadan").hide();
	$("#ilr1").hide();
	$("#ilr2").hide();

	// Check if the element is selected/checked
	
$("#showIlorin").click(function(){
	$("#Osogbo").hide(1000);
	$("#Ibadan").hide(1000);
	$("#Ilorin").show(2000);

	//checkBox = document.getElementById('account');
	if($('#account').is(':checked')){
		$("#ilr1").hide(1000);
		$("#ilr2").show(2000);
		alert("checked");
	}else{
		$("#ilr2").hide(1000);
		$("#ilr1").show(2000);
		alert("not checked");	
	}
	
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