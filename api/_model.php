<?php 

function companyName($con, $id){
	$ts = mysqli_query($con, "SELECT * FROM companies WHERE id = '$id'") or die(mysqli_error($con));
	$t = mysqli_fetch_array($ts);
	return $t['company'];
}

function companyPrice($con, $id){
	$ts = mysqli_query($con, "SELECT * FROM companies WHERE id = '$id'") or die(mysqli_error($con));
	$t = mysqli_fetch_array($ts);
	return $t['price'];
}

function companyLogo($con, $id){
	$ts = mysqli_query($con, "SELECT * FROM companies WHERE id = '$id'") or die(mysqli_error($con));
	$t = mysqli_fetch_array($ts);
	return $t['logo'];
}



?>