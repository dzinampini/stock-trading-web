<?php
    include("opendb.php");
    $inv=mysqli_real_escape_string($con,$_GET['i']);

    $sql="SELECT * FROM customers WHERE email='$inv' ";          
    $rs=mysqli_query($con,$sql) or die(mysqli_error($con));
    $vfl=array();
    while($row=mysqli_fetch_assoc($rs)){
        $companies[]=$row; 
    }
    echo json_encode($companies);
?>