<?php
  include("opendb.php");
    // if(isset($_GET["phoneno"])){ we have no parameter this time around
        $sql="SELECT * FROM vfl_obs WHERE accepted=''";          
        $rs=mysqli_query($con,$sql) or die(mysqli_error($con));
        $vfl=array();
        while($row=mysqli_fetch_assoc($rs)){
            $vfl[]=$row; 
        }
        echo json_encode($vfl);
    // }
?>