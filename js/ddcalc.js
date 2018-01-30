$(document).ready(function() {

	var today = new Date();
	$( "#datePicker1" ).datepicker();
	$( "#datePicker1" ).datepicker("setDate", today);

	$( "#datePicker2" ).datepicker();
	$( "#datePicker2" ).datepicker("setDate", "+30");
	
	$( "#datePicker3" ).datepicker();
	$( "#datePicker3" ).datepicker("setDate", today);

	$("#calc1").submit(function(event) {
	
		/* Stop form from submitting normally */
		event.preventDefault();

 		var tmpDate1 = $( "#datePicker1" ).datepicker("getDate");
 		var tmpDay1 = tmpDate1.getDate();
 		var tmpMonth1 = ( tmpDate1.getMonth() + 1 );
 		var tmpYear1 = tmpDate1.getFullYear();
 		
		var tmpDate2 = $( "#datePicker2" ).datepicker("getDate");
 		var tmpDay2 = tmpDate2.getDate();
 		var tmpMonth2 = ( tmpDate2.getMonth() + 1 );
 		var tmpYear2 = tmpDate2.getFullYear();
	
		/* Send the data using post and display the results */
		$.ajax({
			url: "ddcalc.php",
			type: "post",
			data: { 
				Month1: tmpMonth1,
				Day1: tmpDay1,
				Year1: tmpYear1,
				Month2: tmpMonth2,
				Day2: tmpDay2,
				Year2: tmpYear2,
				CalcType: "Days" 
			},
			success: function(msg) {
				$("#result_box1").val(msg);
			},
			error:function(){
				$("#result_box1").val("?");
			}
		});
	});
	
	$("#calc2").submit(function(event) {
	
		/* Stop form from submitting normally */
		event.preventDefault();
		
		var tmpDate3 = $( "#datePicker3" ).datepicker("getDate");
 		var tmpDay3 = tmpDate3.getDate();
 		var tmpMonth3 = ( tmpDate3.getMonth() + 1 );
 		var tmpYear3 = tmpDate3.getFullYear();
	
		/* Send the data using post and display the results */
		$.ajax({
			url: "ddcalc.php",
			type: "post",
			data: { 
				Month3: tmpMonth3,
				Day3: tmpDay3,
				Year3: tmpYear3,
				DayNum: $( "#dayNum" ).val(),
				TimeDir: $( "#timeDir" ).val(),
				CalcType: "Date" 
			},
			success: function(msg){
				$("#result_box2").val(msg);
			},
			error:function(){
				$("#result_box2").val("?");
			}
		});
	});
	
}); //document.ready
