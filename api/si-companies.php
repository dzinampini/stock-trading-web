<?php
    include("opendb.php");
    $sql="SELECT * FROM companies";          
    $rs=mysqli_query($con,$sql) or die(mysqli_error($con));
    $vfl=array();
    while($row=mysqli_fetch_assoc($rs)){
        $companies[]=$row; 
    }
    echo json_encode($companies);
?>