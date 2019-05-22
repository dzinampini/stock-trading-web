<?php
  include("opendb.php");
  $id=mysqli_real_escape_string($con,$_GET["id"]);
  $sql="DELETE FROM vfl_obs WHERE id='$id'";                
  $query=mysqli_query($con,$sql) or die(mysqli_error($con));
  $response=array("response"=>"success"); 
  echo json_encode($response);
?>