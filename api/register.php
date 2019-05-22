<?php include("opendb.php");
header('Content-Type: application/json');
if($_SERVER["REQUEST_METHOD"]=="POST"){   
  $postdata = file_get_contents("php://input");
  if (isset($postdata)) {
    $request = json_decode($postdata);

    $fullname=mysqli_real_escape_string($con,$request->fullname);
    $email=mysqli_real_escape_string($con,$request->email);
    $password=mysqli_real_escape_string($con,$request->password);
    
      $sql="INSERT INTO customers (fullname, email, password)
       VALUES('$fullname', '$email', MD5('$password'))";
      $query=mysqli_query($con,$sql) or die(mysqli_error($con));
      $response=array("response"=>"success");
  }
  else {
    $response=array("response"=>"failed");
  }
  echo json_encode($response);      
}

?>