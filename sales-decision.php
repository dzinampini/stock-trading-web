<?php include('_header.php'); 

$j = $_GET['j'];
$i = $_GET['i'];
$c = $_GET['c'];
$s = $_GET['s'];


// if ($m == 'accept'){
	$staff_insert = "UPDATE `customers` SET `balance`=balance+$c WHERE id='$i'"; 
	$rs = mysqli_query($con, $staff_insert);

	$staff_insert = "UPDATE `sales` SET `status`='successful' WHERE id='$j'"; 
	$rs = mysqli_query($con, $staff_insert); 
	
 $pf_insert = "UPDATE `portfolio` SET `shares`=shares-$s WHERE investor='$i' AND company='$c'"; 
$rs2 = mysqli_query($con, $pf_insert); 

?> 

<script>
       alert("Update made!");
       location = 'sales.php';
      </script>