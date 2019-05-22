<?php include("opendb.php");
error_reporting(0);
  header('Content-Type: application/json');
  if($_SERVER["REQUEST_METHOD"]=="POST"){   
    $postdata = file_get_contents("php://input");
    if (isset($postdata)) {
      $request = json_decode($postdata);
      $start=mysqli_real_escape_string($con,$request->zuva1);
      $end=mysqli_real_escape_string($con,$request->zuva2);



$rs = mysqli_query($con, "SELECT * FROM vfl_obs WHERE area='it' AND zuva BETWEEN '$start' AND  '$end'")or die(mysqli_error($con)); 
 $itt = $rs->num_rows;
$rs = mysqli_query($con, "SELECT * FROM vfl_obs WHERE risk_level='high' AND area='it' AND zuva BETWEEN '$start' AND  '$end'")or die(mysqli_error($con)); 
 $ith = $rs->num_rows;
$rs = mysqli_query($con, "SELECT * FROM vfl_obs WHERE risk_level='medium' AND area='it' AND zuva BETWEEN '$start' AND  '$end'")or die(mysqli_error($con)); 
 $itm = $rs->num_rows;
$rs = mysqli_query($con, "SELECT * FROM vfl_obs WHERE risk_level='low' AND area='it' AND zuva BETWEEN '$start' AND  '$end'")or die(mysqli_error($con)); 
 $itl = $rs->num_rows;

$rs = mysqli_query($con, "SELECT * FROM vfl_obs WHERE area='she' AND zuva BETWEEN '$start' AND  '$end'")or die(mysqli_error($con)); 
 $shet = $rs->num_rows;
$rs = mysqli_query($con, "SELECT * FROM vfl_obs WHERE risk_level='high' AND area='she' AND zuva BETWEEN '$start' AND  '$end'")or die(mysqli_error($con)); 
 $sheh = $rs->num_rows;
$rs = mysqli_query($con, "SELECT * FROM vfl_obs WHERE risk_level='medium' AND area='she' AND zuva BETWEEN '$start' AND  '$end'")or die(mysqli_error($con)); 
 $shem = $rs->num_rows;
$rs = mysqli_query($con, "SELECT * FROM vfl_obs WHERE risk_level='low' AND area='she' AND zuva BETWEEN '$start' AND  '$end'")or die(mysqli_error($con)); 
 $shel = $rs->num_rows;

$rs = mysqli_query($con, "SELECT * FROM vfl_obs WHERE area='hr' AND zuva BETWEEN '$start' AND  '$end'")or die(mysqli_error($con)); 
 $hrt = $rs->num_rows;
$rs = mysqli_query($con, "SELECT * FROM vfl_obs WHERE risk_level='high' AND area='hr' AND zuva BETWEEN '$start' AND  '$end'")or die(mysqli_error($con)); 
 $hrh = $rs->num_rows;
$rs = mysqli_query($con, "SELECT * FROM vfl_obs WHERE risk_level='medium' AND area='hr' AND zuva BETWEEN '$start' AND  '$end'")or die(mysqli_error($con)); 
 $hrm = $rs->num_rows;
$rs = mysqli_query($con, "SELECT * FROM vfl_obs WHERE risk_level='low' AND area='hr' AND zuva BETWEEN '$start' AND  '$end'")or die(mysqli_error($con)); 
 $hrl = $rs->num_rows;

$rs = mysqli_query($con, "SELECT * FROM vfl_obs WHERE area='stores' AND zuva BETWEEN '$start' AND  '$end'")or die(mysqli_error($con)); 
 $storest = $rs->num_rows;
$rs = mysqli_query($con, "SELECT * FROM vfl_obs WHERE risk_level='high' AND area='stores' AND zuva BETWEEN '$start' AND  '$end'")or die(mysqli_error($con)); 
 $storesh = $rs->num_rows;
$rs = mysqli_query($con, "SELECT * FROM vfl_obs WHERE risk_level='medium' AND area='stores' AND zuva BETWEEN '$start' AND  '$end'")or die(mysqli_error($con)); 
 $storesm = $rs->num_rows;
$rs = mysqli_query($con, "SELECT * FROM vfl_obs WHERE risk_level='low' AND area='stores' AND zuva BETWEEN '$start' AND  '$end'")or die(mysqli_error($con)); 
 $storesl = $rs->num_rows;


$rs = mysqli_query($con, "SELECT * FROM vfl_obs WHERE area='finance' AND zuva BETWEEN '$start' AND  '$end'")or die(mysqli_error($con)); 
 $financet = $rs->num_rows;
$rs = mysqli_query($con, "SELECT * FROM vfl_obs WHERE risk_level='high' AND area='finance' AND zuva BETWEEN '$start' AND  '$end'")or die(mysqli_error($con)); 
 $financeh = $rs->num_rows;
$rs = mysqli_query($con, "SELECT * FROM vfl_obs WHERE risk_level='medium' AND area='finance' AND zuva BETWEEN '$start' AND  '$end'")or die(mysqli_error($con)); 
 $financem = $rs->num_rows;
$rs = mysqli_query($con, "SELECT * FROM vfl_obs WHERE risk_level='low' AND area='finance' AND zuva BETWEEN '$start' AND  '$end'")or die(mysqli_error($con)); 
 $financel = $rs->num_rows;


$rs = mysqli_query($con, "SELECT * FROM vfl_obs WHERE area='production' AND zuva BETWEEN '$start' AND  '$end'")or die(mysqli_error($con)); 
 $productiont = $rs->num_rows;
$rs = mysqli_query($con, "SELECT * FROM vfl_obs WHERE risk_level='high' AND area='production' AND zuva BETWEEN '$start' AND  '$end'")or die(mysqli_error($con)); 
 $productionh = $rs->num_rows;
$rs = mysqli_query($con, "SELECT * FROM vfl_obs WHERE risk_level='medium' AND area='production' AND zuva BETWEEN '$start' AND  '$end'")or die(mysqli_error($con)); 
 $productionm = $rs->num_rows;
$rs = mysqli_query($con, "SELECT * FROM vfl_obs WHERE risk_level='low' AND area='production' AND zuva BETWEEN '$start' AND  '$end'")or die(mysqli_error($con)); 
 $productionl = $rs->num_rows;

$rs = mysqli_query($con, "SELECT * FROM vfl_obs WHERE area='clinic' AND zuva BETWEEN '$start' AND  '$end'")or die(mysqli_error($con)); 
 $clinict = $rs->num_rows;
$rs = mysqli_query($con, "SELECT * FROM vfl_obs WHERE risk_level='high' AND area='clinic' AND zuva BETWEEN '$start' AND  '$end'")or die(mysqli_error($con)); 
 $clinich = $rs->num_rows;
$rs = mysqli_query($con, "SELECT * FROM vfl_obs WHERE risk_level='medium' AND area='clinic' AND zuva BETWEEN '$start' AND  '$end'")or die(mysqli_error($con)); 
 $clinicm = $rs->num_rows;
$rs = mysqli_query($con, "SELECT * FROM vfl_obs WHERE risk_level='low' AND area='clinic' AND zuva BETWEEN '$start' AND  '$end'")or die(mysqli_error($con)); 
 $clinicl = $rs->num_rows;

$ps = ($itl + $shel + $hrl + $storesl + $financel + $productionl + $clinicl + $itm + $shem + $hrm + $storesm + $financem + $productionm + $clinicm) / ($ith + $sheh + $hrh + $storesh + $financeh + $productionh + $clinich);


$sql="INSERT INTO vfl_reports2 (itt,ith,itm,itl,shet,sheh,shem,shel,hrt,hrh,hrm,hrl,storest,storesh,storesm,storesl,financet,financeh,financem,financel,productiont,productionh,productionm,productionl,clinict,clinich,clinicm,clinicl,ps) VALUES('$itt','$ith','$itm','$itl','$shet','$sheh','$shem','$shel','$hrt','$hrh','$hrm','$hrl','$storest','$storesh','$storesm','$storesl','$financet','$financeh','$financem','$financel','$productiont','$productionh','$productionm','$productionl','$clinict','$clinich','$clinicm','$clinicl','$ps')";
$query=mysqli_query($con,$sql) or die(mysqli_error($con));

$sql2="SELECT * FROM vfl_reports2 ORDER BY id LIMIT 1";          
$rs=mysqli_query($con,$sql2) or die(mysqli_error($con));
$vfl=array();
  while($row=mysqli_fetch_assoc($rs)){
    $vfl[]=$row; 
  }
}
echo json_encode($vfl); 
} ?>



