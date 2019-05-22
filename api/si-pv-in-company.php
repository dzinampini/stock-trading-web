<?php include("opendb.php");
// header('Content-Type: application/json');
// if($_SERVER["REQUEST_METHOD"]=="POST"){   
//   $postdata = file_get_contents("php://input");
//   if (isset($postdata)) {
//     $request = json_decode($postdata);

//     $investor=mysqli_real_escape_string($con,$request->investor);
//     $company=mysqli_real_escape_string($con,$request->company);
//     $shares=mysqli_real_escape_string($con,$request->shares);

//     $sql="SELECT price FROM companies WHERE id='$company' ";          
//     $rs=mysqli_query($con, $sql) or die(mysqli_error($con));
//     $row=mysqli_fetch_array($rs);
//     $price=$row['price'];
    
//     $cost = $price*$shares;

//     //now check if investor has enough balance to purchase and deduct amount 
//     $sql2="SELECT balance FROM customers WHERE id='$company' ";          
//     $rs2=mysqli_query($con, $sql2) or die(mysqli_error($con));
//     $row2=mysqli_fetch_array($rs2);
//     $balance=$row2['balance'];

//     if ($cost > $balance){
//       $response=array("response"=>"Insufficient Funds");
//     }
//     else{
//       $response=array("response"=>$cost);
//       //now update the balance 
      
//     }    
//   }
//   else {
//     $response=array("response"=>"failure");
//   }
//   echo json_encode($response);      
// }

?>


<?php
  // $investor = $_GET['investor']; 
  // $company = $_GET['company']; 
  // $shares_select_sum = mysqli_query($con, "SELECT SUM(shares) AS total_shares FROM purchases WHERE  investor='$investor' AND company = '$company' AND status = 'successful' ") or die(mysqli_error($con)) ;
  // $shares = mysqli_fetch_assoc($shares_select_sum);
  // $shares_sum = $shares['total_shares'];

  // if($shares_sum > 0) $response=array("response"=>$shares_sum);
  // else $response=array("response"=>0);
    
    
  //   echo json_encode($response);


$inv = $_GET['investor']; 
  $company = $_GET['company']; 
  //get investor id 
    $sql2="SELECT * FROM customers WHERE email='$inv' ";          
    $rs2=mysqli_query($con, $sql2) or die(mysqli_error($con));
    $row2=mysqli_fetch_array($rs2);
    $investor=$row2['id'];
    
  $shares_select_sum = mysqli_query($con, "SELECT SUM(shares) AS total_shares FROM portfolio WHERE  investor='$investor' AND company = '$company'") or die(mysqli_error($con)) ;
  $shares = mysqli_fetch_assoc($shares_select_sum);
  $shares_sum = $shares['total_shares'];

  if($shares_sum > 0) $response=array("response"=>$shares_sum);
  else $response=array("response"=>0);
    
    
    echo json_encode($response);
?>