<?php include('_header.php'); 

$j = $_GET['j'];
$i = $_GET['i'];
$c = $_GET['c']; //cost
$s = $_GET['s'];
$co = $_GET['co']; //company


$staff_insert = "UPDATE `customers` SET `balance`=balance-$c WHERE id='$i'"; 
$rs = mysqli_query($con, $staff_insert);
	
$staff_insert = "UPDATE `purchases` SET `status`='successful' WHERE id='$j'"; 
$rs = mysqli_query($con, $staff_insert); 

$comp_upd = "UPDATE `companies` SET `shares`=shares-$s WHERE id='$co'"; 
$cu = mysqli_query($con, $comp_upd) or die(mysqli_error($con)); 

//check if company and investor exist 
$ci_sql = mysqli_query($con, "SELECT * FROM portfolio WHERE company = '$co' AND investor='$i' ")or die(mysqli_error($con));
$row = mysqli_fetch_array($ci_sql); 
$rows = mysqli_num_rows($ci_sql);
if ($rows > 1){
 $pf_insert = "UPDATE `portfolio` SET `shares`=shares+$s WHERE investor='$i' AND company='$co'"; 
} else{
	$pf_insert = "INSERT INTO portfolio (investor, company, shares) VALUES ('$i', '$co', '$s')"; 
}
// true +shares 
// false +record

$rs2 = mysqli_query($con, $pf_insert); 

?> 

<script>
       alert("Update made!");
       location = 'purchases.php';
      </script>