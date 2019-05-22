<?php include('_header.php'); ?>

<form name="" method="POST" action="">

<div class="container">
	<div class="row">
		<div class="col-md-4">
		</div>

		<div class="col-md-4">
			<div class="form-group">
				<label>Full Name</label>
				<input name="fullname" class="form-control" type="text" minlength="3" maxlength="30" required>
			</div> 
			

			<div class="form-group">
				<label>Email</label>
				<input name="username" class="form-control" type="email" required>
			</div>
		


			<div class="form-group">
				<br><br>
				<input name="submit" type="submit" id="submit" class="form-control submit_button" value="Add Broker"  /> 
			</div>
		</div>


		<div class="col-md-4">
		</div>

		</div>
		</div>
		</div>
		</div>
	</div>
</div>
</form>

<?php 
if(isset($_POST['submit'])){


$fname = $_POST['fullname'];

$username = $_POST['username'];
$password = rand(100000, 999999);

$staff_insert = "INSERT INTO `brokers`(`email`, `fullname`, `password`) VALUES ('$username','$fname',md5('$password'))"; 

$rs = mysqli_query($con, $staff_insert); ?> 

<script>
       alert("Staff member added successfully. Staff Username - <?php echo $username; ?> and password - <?php echo $password; ?>.");
       location = 'brokers.php';
      </script>
<?php }
?>


}


