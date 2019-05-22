<?php
  include("opendb.php");
    $id=mysqli_real_escape_string($con,$_GET["id"]);
    $sql="SELECT * FROM companies WHERE id='$id' ";          
    $rs=mysqli_query($con,$sql) or die(mysqli_error($con));
    $vfl=array();
    while($row=mysqli_fetch_assoc($rs)){
      $vfl[]=$row; 
    }
    echo json_encode($vfl);
?>