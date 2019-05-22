<?php include("opendb.php");
header('Content-Type: application/json');
if($_SERVER["REQUEST_METHOD"]=="POST"){   
  $postdata = file_get_contents("php://input");
  if (isset($postdata)) {
    $request = json_decode($postdata);
    
    $target=mysqli_real_escape_string($con,$request->target);
    $action=mysqli_real_escape_string($con,$request->action);
    $id=mysqli_real_escape_string($con,$request->id);


    $sql = "UPDATE vfl_obs SET target = '$target', action='$action' WHERE id = '$id'"; 
      $query=mysqli_query($con,$sql) or die(mysqli_error($con));
      $response=array("response"=>"success");
  }
  else {
    $response=array("response"=>"failed");
  }
  echo json_encode($response);      
}

?>