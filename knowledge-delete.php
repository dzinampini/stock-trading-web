<?php include('_header.php'); 

$j = $_GET['j'];

$job_insert = "DELETE FROM `knowledge` WHERE id = '$j'"; 
	$rs = mysqli_query($con, $job_insert); 
	?><script>
       alert("Issue Deleted.");
       location = 'knowledge.php';
    </script><?php 
?>