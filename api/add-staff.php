<?php include("opendb.php");
header('Content-Type: application/json');
if($_SERVER["REQUEST_METHOD"]=="POST"){   
  $postdata = file_get_contents("php://input");
  if (isset($postdata)) {
    $request = json_decode($postdata);

    $fullname=mysqli_real_escape_string($con,$request->fullname);
    $gender=mysqli_real_escape_string($con,$request->gender);
    // $ec_number=mysqli_real_escape_string($con,$request->ec_number);
    $dob=mysqli_real_escape_string($con,$request->dob);
    $email=mysqli_real_escape_string($con,$request->email);
    $password=mysqli_real_escape_string($con,$request->password);
    $role=mysqli_real_escape_string($con,$request->role);
    $dept=mysqli_real_escape_string($con,$request->dept);
    
      $sql="INSERT INTO users (fullname, gender, dob, email, password, role, dept)
       VALUES('$fullname','$gender','$dob', '$email', MD5('$password'), '$role', '$dept')";
      $query=mysqli_query($con,$sql) or die(mysqli_error($con));
      $response=array("response"=>"success");
  }
  else {
    $response=array("response"=>"failed");
  }
  echo json_encode($response);      
}

?>