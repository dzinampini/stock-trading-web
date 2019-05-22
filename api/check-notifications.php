<?php include("opendb.php");
error_reporting(0);
  header('Content-Type: application/json');
  if($_SERVER["REQUEST_METHOD"]=="POST"){   
    $postdata = file_get_contents("php://input");
    if (isset($postdata)) {
      $request = json_decode($postdata);
      $start=mysqli_real_escape_string($con,$request->zuva1);
      $end=mysqli_real_escape_string($con,$request->zuva2);


$nhasi = date("Y-m-d"); 
$rs = mysqli_query($con, "SELECT * FROM vfl_obs WHERE target= '$nhasi'")or die(mysqli_error($con)); 
$itt = $rs->num_rows;

if ($itt > 0){
  $response['response']='arimo';
}

else{
  $response['response']='hamuna';
}



}

echo json_encode($response);  
} ?>



