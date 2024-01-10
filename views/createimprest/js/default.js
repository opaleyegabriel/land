$(document).ready(function(){

	//const paymentForm = document.getElementById('paymentForm');
	//const paymentForm=$('#paymentForm');
	//paymentForm.addEventListener("submit", payWithPaystack, false);
	$("#create").hide());
	$("#initiate").hide();
	$("#retire").hide();
	

$("#expint").click(function(){
	alert("Works for Initiate");
	$("#create").hide();
	$("#retire").hide();
	$("#initiate").show(2000);
	

})



$("#impressretire").click(function(){
	alert("Works for Retire");
	$("#create").hide();
	$("#initiate").hide();
	$("#retire").show(2000);
})


$("#createimp").click(function(){
	alert("Works for Create");
	$("#initiate").hide();
	$("#retire").hide();
	$("#create").show(2000);
})




});