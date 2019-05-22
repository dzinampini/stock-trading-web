<?php include('_header.php'); 

$j = $_GET['j'];

$job_insert = "DELETE FROM `customers` WHERE id = '$j'"; 
	$rs = mysqli_query($con, $job_insert); 
	?><script>
       alert("Customer Deleted.");
       location = 'customers.php';
    </script><?php 
?>