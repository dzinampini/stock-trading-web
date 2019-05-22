<?php include('_header.php'); 

$j = $_GET['j'];
$m = $_GET['m'];
$s = $_GET['s'];
$a = $_GET['a'];

if ($m == 'accept'){
	$staff_insert = "UPDATE `customers` SET `balance`=balance+$a WHERE id='$s'"; 
	$rs = mysqli_query($con, $staff_insert);
	
}

$staff_insert = "UPDATE `payments` SET `status`='$m' WHERE id='$j'"; 

$rs = mysqli_query($con, $staff_insert); ?> 

<script>
       alert("Update made!");
       location = 'accounts.php';
      </script>