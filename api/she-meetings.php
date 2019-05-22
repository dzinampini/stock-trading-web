<?php
  include("opendb.php");

    $sql="SELECT * FROM meetings ";          
    $rs=mysqli_query($con,$sql) or die(mysqli_error($con));
    $vfl=array();
    while($row=mysqli_fetch_assoc($rs)){
      $vfl[]=$row; 
    }
    echo json_encode($vfl);
?>