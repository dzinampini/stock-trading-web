<?php
  include("opendb.php");
    $sql="SELECT * FROM knowledge ORDER BY id DESC";          
    $rs=mysqli_query($con,$sql) or die(mysqli_error($con));
    $kb=array();
    while($row=mysqli_fetch_assoc($rs)){
    	$row['company_name'] = companyName($con, $row['company']);
    	$row['company_logo'] = companyLogo($con, $row['company']);
      $kb[]=$row; 
    }
    echo json_encode($kb);
?>