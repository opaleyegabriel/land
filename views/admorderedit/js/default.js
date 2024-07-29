$(document).ready(function(){

	//const paymentForm = document.getElementById('paymentForm');
	//const paymentForm=$('#paymentForm');
	//paymentForm.addEventListener("submit", payWithPaystack, false);
	$("#tablecontainer").hide();
	
	$("#DisplayRecords").click(function(e){
		e.preventDefault();	
		mobile=$('#clientmobile').val();
		if(mobile.length < 11){
			alert("Mobile number cannot be empty or less than 11 digit");
		}
			else
		{
			$("#tablecontainer").show();
			$("#tbodyid").empty();

			//access ajax
			$.post("admorderedit/SearchOrder",
				{mobile:mobile},
				function(o){
					alert(o);
					//var myrecord = JSON.parse(data);
					//alert(myrecord);
				}
			);
			var CreateRow = "<tr><td style= 'text-align:right'>1</td><td> Order No </td><td>Qty</td> <td> Amount </td> <td> Cut Price</td> <td>Convert To Outright</td> <td>Change plan</td> <td>Change to Higher plot</td> </tr>";
			$("#tbodyid").append(CreateRow);
		}
		
	});
	

});