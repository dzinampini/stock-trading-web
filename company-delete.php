<?php include('_header.php'); 

$j = $_GET['j'];

$job_insert = "DELETE FROM `companies` WHERE id = '$j'"; 
	$rs = mysqli_query($con, $job_insert); 
	?><script>
       alert("Company Deleted.");
       location = 'companies.php';
    </script><?php 
?>