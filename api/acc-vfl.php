<?php
  include("opendb.php");
    // if(isset($_GET["phoneno"])){ we have no parameter this time around
        // $phoneno=mysqli_real_escape_string($conn,$_GET["phoneno"]);
        $sql="SELECT * FROM vfl_obs WHERE accepted='yes' AND action = '' OR investigation='' ";          
        $rs=mysqli_query($con,$sql) or die(mysqli_error($con));
        $vfl=array();
        while($row=mysqli_fetch_assoc($rs)){
            $vfl[]=$row; 
        }
        echo json_encode($vfl);
    // }
?>