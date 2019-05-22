<?php include("opendb.php");
// header('Content-Type: application/json');
// if($_SERVER["REQUEST_METHOD"]=="POST"){   
//   $postdata = file_get_contents("php://input");
//   if (isset($postdata)) {
//     $request = json_decode($postdata);

    $investor=mysqli_real_escape_string($con,$_GET['i']);
    $company=mysqli_real_escape_string($con,$_GET['c']);
    $shares=mysqli_real_escape_string($con,$_GET['s']);

    $sql="SELECT * FROM companies WHERE id='$company' ";          
    $rs=mysqli_query($con, $sql) or die(mysqli_error($con));
    $row=mysqli_fetch_array($rs);
    $price=$row['price'];

    
    
    $cost = $price*$shares;

    //now check if investor has enough balance to purchase and deduct amount 
    $sql2="SELECT * FROM customers WHERE email='$investor' ";          
    $rs2=mysqli_query($con, $sql2) or die(mysqli_error($con));
    $row2=mysqli_fetch_array($rs2);
    $balance=$row2['balance'];

    if ($cost > $balance){
      $response=array("response"=>"Insufficient Funds");
    }
    else{
      $response=array("response"=>$cost);
      //now update the balance..  not yet 
    }    
  // }
  // else {
  //   $response=array("response"=>"failure");
  // }
  echo json_encode($response);      
// }

?>