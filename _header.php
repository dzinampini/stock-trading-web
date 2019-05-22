<?php
session_start();

include 'config.php';
include 'model.php'; 

$username=$_SESSION['username'];


if(!(isset($_SESSION['username']) && !empty($_SESSION['username']))) {
   ?> <script> 
        alert('You need to be logged in to access this page');
      </script><?php 
  header("location:login.php");
  exit;
}

$rs = mysqli_query($con, "SELECT * FROM brokers WHERE email = '$username'")or die(mysqli_error($con));

while($row = mysqli_fetch_array($rs)){
   $id=$row['id'];
   $username = $row['email'];
   $password = $row['password'];
   $fullname = $row['fullname'];
} ?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $system_name; ?></title>
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
    <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body>


 <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><?php //echo $system_name; ?></a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="brokers.php">Brokers</a></li>
      <li><a href="customers.php">Customers</a></li>
      <li><a href="companies.php">Companies & Prices</a></li>
      <li><a href="knowledge.php">Investment Knowledgebase</a></li>
      <li><a href="accounts.php">Payments</a></li>
      <li><a href="withdrawals.php">Withdrawals</a></li>
      <li><a href="purchases.php">Share Purchases</a></li>
      <li><a href="sales.php">Share Sales</a></li>
      <li><a href="reports.php">Reports</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <!-- <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php //echo $fullname; ?></a></li> -->
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
  <div style="height:150px;background-image: url('images/home-bg.jpg');background-position: fixed; ">
    <br>
    <h1 align="center" style="color:blue;background-color:#fff;"><?php echo $system_name; ?></h1>
  </div>
</nav> 

