<?php
  include("opendb.php"); //
  header('Content-Type: application/json');
  if($_SERVER["REQUEST_METHOD"]=="POST"){        
    $postdata = file_get_contents("php://input");
    if (isset($postdata)) {
      $request = json_decode($postdata);
      $email = mysqli_real_escape_string($con,$request->emairi);
      $password =mysqli_real_escape_string($con,$request->password);

      $sql="SELECT * FROM customers WHERE email='$email' and password=MD5('$password') LIMIT 0,1";
      $query=mysqli_query($con,$sql) or die(mysqli_error($con));
      if(mysqli_num_rows($query)==1){
       $response=mysqli_fetch_assoc($query);
        $response['response']='success';
      }
      else{
        $response=array("response"=>"failed");
      }
    } 
    else{
      $response=array("response"=>"failed");
    }
    echo json_encode($response);
  }
?>
