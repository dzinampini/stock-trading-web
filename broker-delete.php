<?php include('_header.php'); 

$j = $_GET['j'];

$job_insert = "DELETE FROM `brokers` WHERE id = '$j'"; 
	$rs = mysqli_query($con, $job_insert); 
	?><script>
       alert("Broker Deleted.");
       location = 'brokers.php';
    </script><?php 
?>