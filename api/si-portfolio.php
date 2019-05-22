<?php
  include("opendb.php");
    $email=mysqli_real_escape_string($con,$_GET["investor"]);

    $sql2="SELECT * FROM customers WHERE email='$email' ";          
    $rs2=mysqli_query($con,$sql2) or die(mysqli_error($con));
    $row2=mysqli_fetch_assoc($rs2);
    $id=$row2['id']; 

    // $sql="SELECT * FROM purchases WHERE investor='$id' AND status = 'successful' ORDER BY id DESC ";          
    // $rs=mysqli_query($con,$sql) or die(mysqli_error($con));
    // $vfl=array();
    // while($row=mysqli_fetch_assoc($rs)){
    //     $row['company_name'] = companyName($con, $row['company']); 
    //     $row['current_price'] = companyPrice($con, $row['company']); 
    //   $vfl[]=$row; 
    // }
    // echo json_encode($vfl);

    $sql="SELECT * FROM portfolio WHERE investor='$id' ";          
    $rs=mysqli_query($con,$sql) or die(mysqli_error($con));
    $vfl=array();
    while($row=mysqli_fetch_assoc($rs)){
        $row['company_name'] = companyName($con, $row['company']); 
        $row['current_price'] = companyPrice($con, $row['company']); 
      $vfl[]=$row; 
    }
    echo json_encode($vfl);
?>