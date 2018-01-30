<?php

// DAY AND DATE CALCULATOR

if ($_POST["CalcType"] == "Days") {  //IF SOLVING FOR DAYS

	//CHECK USER INPUT
	if (empty($_POST["Day1"]) || empty($_POST["Month1"]) || empty($_POST["Year1"]) || empty($_POST["Day2"]) || empty($_POST["Month2"]) || empty($_POST["Year2"])) {
		die(printf("Error: DayCalc empty field"));
	}
	
	$day1 = (integer) $_POST["Day1"];
	$month1 = (integer) $_POST["Month1"];
	$year1 = (integer) $_POST["Year1"];
	
	$day2 = (integer) $_POST["Day2"];
	$month2 = (integer) $_POST["Month2"];
	$year2 = (integer) $_POST["Year2"];
	
	if ($month1 < 1 || $month1 > 12) {
		die(printf("Error: invalid value for \"Month1\""));
	} elseif ($day1 < 1 || $day1 > 31) {
		die(printf("Error: invalid value for \"Day1\""));
	} elseif ($month2 < 1 || $month2 > 12) {
		die(printf("Error: invalid value for \"Month2\""));
	} elseif ($day2 < 1 || $day2 > 31) {
		die(printf("Error: invalid value for \"Day2\""));
	}
	
	//PROCESS INPUT
	$date1 = new DateTime($year1."-".$month1."-".$day1." 12:00:00+0000");
	$date2 = new DateTime($year2."-".$month2."-".$day2." 12:00:00+0000");
	
	$sec1 = $date1->format('U');  // epoch time of the requested date
	$sec2 = $date2->format('U');  // epoch time of the requested date
	
	if ($sec1 > $sec2) {
		$deltasec1 = ( $sec1 - $sec2 );
	} elseif ($sec1 < $sec2) {
		$deltasec1 = ( $sec2 - $sec1 );
	}
	
	//CONVERT SEC TO DAYS	
 	$numdays = (integer) ( $deltasec1 / 86400 );
	printf($numdays);

} elseif ($_POST["CalcType"] == "Date") {  //IF SOLVING FOR DATE

	//CHECK USER INPUT
	if (empty($_POST["Day3"]) || empty($_POST["Month3"]) || empty($_POST["Year3"]) || empty($_POST["DayNum"]) || empty($_POST["TimeDir"])) {
		die(printf("Error: DateCalc empty field"));
	}
	
	$day3 = (integer) $_POST["Day3"];
	$month3 = (integer) $_POST["Month3"];
	$year3 = (integer) $_POST["Year3"];
	
	$daynum = (integer) $_POST["DayNum"];
	$timedir = $_POST["TimeDir"];
	
	if ($month3 < 1 || $month3 > 12) {
		die(printf("Error: invalid value for \"Month3\""));
	} elseif ($day3 < 1 || $day3 > 31) {
		die(printf("Error: invalid value for \"Day3\""));
	}

	//PROCESS INPUT
	$date3 = new DateTime($year3."-".$month3."-".$day3." 12:00:00+0000");	
	$sec3 = $date3->format('U');  // epoch time of the requested date
	$sec4 = ( $daynum * 86400 );  // number of days requested by the user
	
	if ($timedir == "Past") {
		$deltasec3 = ( $sec3 - $sec4 );
	} elseif ($timedir == "Future") {
		$deltasec3 = ( $sec3 + $sec4 );
	}

	$date_result = date("m/d/Y", $deltasec3);
	printf($date_result);
}

?>