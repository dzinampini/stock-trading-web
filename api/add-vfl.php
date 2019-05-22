<?php include("opendb.php");
header('Content-Type: application/json');
if($_SERVER["REQUEST_METHOD"]=="POST"){   
  $postdata = file_get_contents("php://input");
  if (isset($postdata)) {
    $request = json_decode($postdata);

    error_reporting(0);
    
    $zuva=mysqli_real_escape_string($con,$request->zuva);
    $observer=mysqli_real_escape_string($con,$request->observer);
    $area=mysqli_real_escape_string($con,$request->area);
    $activity=mysqli_real_escape_string($con,$request->activity);
    $risk_level=mysqli_real_escape_string($con,$request->risk_level);
    $one=mysqli_real_escape_string($con,$request->one);
    $two=mysqli_real_escape_string($con,$request->two);
    $three=mysqli_real_escape_string($con,$request->three);
    $four=mysqli_real_escape_string($con,$request->four);
    $five=mysqli_real_escape_string($con,$request->five);
    $six=mysqli_real_escape_string($con,$request->six);
    $seven=mysqli_real_escape_string($con,$request->seven);
    $eight=mysqli_real_escape_string($con,$request->eight);
    $behaviour=mysqli_real_escape_string($con,$request->behaviour);
    $consequence=mysqli_real_escape_string($con,$request->consequence);

      $sql="INSERT INTO vfl_obs (zuva, observer, area, activity, risk_level, one, two, three, four, five, six, seven, eight, behaviour, consequence)
       VALUES('$zuva','$observer','$area','$activity', '$risk_level', '$one', '$two', '$three', '$four', '$five', '$six', '$seven', '$eight', '$behaviour', '$consequence')";
      $query=mysqli_query($con,$sql) or die(mysqli_error($con));

      $response=array("response"=>"success");
  }
  else {
    $response=array("response"=>"failed");
  }
  echo json_encode($response);      
}

?>