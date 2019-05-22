<?php
  include("opendb.php");
    $id=mysqli_real_escape_string($con,$_GET["id"]);
    $sql="SELECT * FROM knowledge WHERE company='$id' ";          
    $rs=mysqli_query($con,$sql) or die(mysqli_error($con));
    $kb=array();
    while($row=mysqli_fetch_assoc($rs)){
      $kb[]=$row; 
    }
    echo json_encode($kb);
?>