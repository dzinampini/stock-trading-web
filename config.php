<?php
$host = 'localhost';
$dbusername = 'root'; //enter your mysql username
$dbpassword = '';  //enter your mysql password
$dbname = 'ifs_zim_mako'; //edit the database name


$con = mysqli_connect($host, $dbusername, $dbpassword); 
mysqli_select_db($con, $dbname);

$system_name = 'Stock Investment Admin Portal'; //name you want to give your system 
$copyright_msg = 'Developed by Racheal'; //the copyright message you wnat to give your system ?>
