<?php
  include("opendb.php");
        $sql="SELECT * FROM vfl_obs WHERE accepted='yes' AND action <> '' AND investigation <> '' ";          
        $rs=mysqli_query($con,$sql) or die(mysqli_error($con));
        $vfl=array();
        while($row=mysqli_fetch_assoc($rs)){
            $vfl[]=$row; 
        }
        echo json_encode($vfl);
    // }
?>