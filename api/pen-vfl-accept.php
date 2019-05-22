<?php
  include("opendb.php");
  $id=mysqli_real_escape_string($con,$_GET["id"]);
  $rs2 = mysqli_query($con, "SELECT * FROM vfl_obs where id = '$id'")or die(mysqli_error($con));
  while($row2 = mysqli_fetch_array($rs2)){
    $area=$row2['area'];
  }

  $risk_level=mysqli_real_escape_string($con,$_GET["risk_level"]); 
  if($risk_level == 'high'){
    error_reporting(1); 
    $rs = mysqli_query($con, "SELECT * FROM users where dept='$area' and role = 'hod' ")or die(mysqli_error($con));
    while($row = mysqli_fetch_array($rs)){
      $to=$row['email'];
      $from = 'webmaster@zimasco.co.zw';
      $message = "There is a newly accepted high risk VFL observation that needs your attention urgently. Login to the mobile app to get the error"; 
      $subject = "Hgh Risk VFL Observation"; 
      // mail(to, subject, message)
      mail($to, $subject, $message); 
    }
  }
  $sql="UPDATE vfl_obs SET accepted='yes' WHERE id='$id'";                
  $query=mysqli_query($con,$sql) or die(mysqli_error($con));
  $response=array("response"=>"success"); 
  echo json_encode($response);
?>