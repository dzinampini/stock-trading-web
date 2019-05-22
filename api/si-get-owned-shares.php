<?php include("opendb.php");
// header('Content-Type: application/json');
// if($_SERVER["REQUEST_METHOD"]=="POST"){   
//   $postdata = file_get_contents("php://input");
//   if (isset($postdata)) {
//     $request = json_decode($postdata);

    $inv=mysqli_real_escape_string($con,$_GET['i']);
    $company=mysqli_real_escape_string($con,$_GET['c']);
    $shares=mysqli_real_escape_string($con,$_GET['s']);

    //get investor id 
    $sql2="SELECT * FROM customers WHERE email='$inv' ";          
    $rs2=mysqli_query($con, $sql2) or die(mysqli_error($con));
    $row2=mysqli_fetch_array($rs2);
    $investor=$row2['id'];

    //get owned shares 
    $shares_select_sum = mysqli_query($con, "SELECT SUM(shares) AS total_shares FROM purchases WHERE  investor='$investor' AND company = '$company' AND status = 'successful' ") or die(mysqli_error($con)) ;
    $shares_su = mysqli_fetch_assoc($shares_select_sum);
    $owned_shares = $shares_su['total_shares'];

    //get current price of company 
    $sql="SELECT * FROM companies WHERE id='$company' ";          
    $rs=mysqli_query($con, $sql) or die(mysqli_error($con));
    $row=mysqli_fetch_array($rs);
    $price=$row['price'];
    
    // $value_i_get = 0;
    $value_i_get = $price*$shares;


    //check if have enough shares 
    if($owned_shares < $shares){
      $response=array("response"=>"failed","owned"=>$owned_shares);
    }
    else{
      $response=array("response"=>"success","owned"=>$value_i_get);
    }    
  // }
  // else {
  //   $response=array("response"=>"failure");
  // }
  echo json_encode($response);      
// }

?>