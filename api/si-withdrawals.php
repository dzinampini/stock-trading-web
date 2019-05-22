<?php include("opendb.php");
// header('Content-Type: application/json');
// if($_SERVER["REQUEST_METHOD"]=="POST"){   
//   $postdata = file_get_contents("php://input");
//   if (isset($postdata)) {
//     $request = json_decode($postdata);


    $investor=mysqli_real_escape_string($con,$_GET['i']);
    $amount=mysqli_real_escape_string($con,$_GET['a']);

    $sql2="SELECT * FROM customers WHERE email='$investor' ";          
    $rs2=mysqli_query($con, $sql2) or die(mysqli_error($con));
    $row2=mysqli_fetch_array($rs2);
    $investor_id=$row2['id'];
    
      $sql="INSERT INTO withdrawals (investor, amount)
       VALUES('$investor_id', '$amount')";
      $query=mysqli_query($con,$sql) or die(mysqli_error($con));

      $response=array("response"=>"success");
  // }
  // else {
  //   $response=array("response"=>"failed");
  // }
  echo json_encode($response);      
// }

?>