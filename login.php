<?php session_start();
include('config.php'); ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

    <title><?php echo $system_name; ?></title>

    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">

    
    <link rel="stylesheet" href="css/bootstrap.min.css"><!-- bootstrap style -->
    <link rel="stylesheet" href="css/font-awesome.min.css"><!-- font-awesome style -->
    <link rel="stylesheet" href="css/style.css"><!-- custom style  -->
    <!-- favicon is missing -->
    <!-- js comes afetr page loads -->
    <style>
    .login_page{
    background-image:url("images/login_bg2.jpg"); 
    background-size: cover;
}

.login_container{
    background-color:#fff;
    margin:200px 0 0 0;
    padding:20px 40px;
    border:1px solid #fff;

}

.login_container img{
    padding:0 0 20px 0;
}

.login_title{
    text-align:center;
}

.btn-primary {
    color: #fff;
    background-color: blue;
    border-color: blue;
}

.btn-primary:hover {
    color: #fff;
    background-color: blue;
    border-color: blue;
}

</style>

  </head>

<body class="login_page">
<div class="container">
<div class="row">
<div class="col-md-8">
</div>

<div class="col-md-3 login_container">
  <div class="login_title">
    <a href="#"><img src="images/logo.png" align="center" draggable="false" ></a>
  </div>
  
  <div class="login-form">    
      <form name="login_form" action="" method="POST" onsubmit ="" >
      <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input id="username" type="text" class="form-control" name="username" placeholder="Username">
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input id="password" type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <br><br>
            <button type="submit" name="submit" class="form-control btn btn-primary">LOG IN</button>      
    </form>
                      
        
  </div><!--login form-->
</div><!--login container-->

<div class="col-md-1">
  </div>


</div><!--row-->
</div><!--conatiner-->
</body>


<?php //login script

if (isset($_POST['submit'])){
    
    include 'opendb.php';
        $username = $_POST["username"];
        $password = md5($_POST["password"]);

        $result ="";
        $query = "SELECT * FROM brokers WHERE email='$username' AND password = '$password'";
        $result = mysqli_query($con, $query);
        $rows=mysqli_fetch_array($result);
        $role=$rows['role'];

        $_SESSION['username'] = $username;
        
        if(!$result){
            die( "\n\ncould'nt send the query because".mysqli_error($con));
            exit;
        }

        $row = mysqli_num_rows($result);
        if($row==1){?> 
            <script>location="index.php";</script>
            <?php exit;
        }  

        else{ ?>
            <script> 
                alert('Wrong Username or Password ,Please Try Again');
            </script>
        <?php }
}
?>