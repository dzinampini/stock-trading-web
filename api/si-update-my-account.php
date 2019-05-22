<?php 
error_reporting(0); 
include("opendb.php");
header('Content-Type: application/json');
if($_SERVER["REQUEST_METHOD"]=="POST"){   
  $postdata = file_get_contents("php://input");
  if (isset($postdata)) {
    $request = json_decode($postdata);

    $fullname=mysqli_real_escape_string($con,$request->fullname);
    $email=mysqli_real_escape_string($con,$request->email);
    $bank=mysqli_real_escape_string($con,$request->bank);
    $account_number=mysqli_real_escape_string($con,$request->account_number);
    $password=mysqli_real_escape_string($con,$request->password);


    $sql = "UPDATE customers SET fullname='$fullname', bank='$bank', account_number='$account_number', password=MD5('$password') WHERE email='$email'";
    
      // $sql="INSERT INTO customers (fullname, email, password)
      //  VALUES('$fullname', '$email', MD5('$password'))";
      $query=mysqli_query($con,$sql) or die(mysqli_error($con));
      $response=array("response"=>"success");
  }
  else {
    $response=array("response"=>"failed");
  }
  echo json_encode($response);      
}

?>