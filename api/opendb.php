<?php
  $host="localhost";
  $username="root";
  $password="";
  $database="ifs_zim_mako";
  $con=mysqli_connect($host,$username,$password,$database);
  if(!$con){
    die();
  }else{
    header('Access-Control-Allow-Origin: *'); 
  }

  include('_model.php');
?>