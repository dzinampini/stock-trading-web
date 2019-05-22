<?php include('_header.php'); 
$j = $_GET['j']; ?>



<?php foreach(getBroker($con, $j) as $person){ ?>
<form name="" method="POST" action="">

<div class="container">
	<div class="row">
		<div class="col-md-4">
		</div>

		<div class="col-md-4">
			<div class="form-group">
				<label>Full Name</label>
				<input name="fullname" class="form-control" value="<?php echo $person['fullname']; ?>" type="text" minlength="3" maxlength="30" required>
			</div> 
			

			<div class="form-group">
				<label>Email</label>
				<input name="username" value="<?php echo $person['email']; ?>" class="form-control" type="email" required>
			</div>
		


			<div class="form-group">
				<br><br>
				<input name="submit" type="submit" id="submit" class="form-control submit_button" value="Update Broker"  /> 
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

<?php } ?>

<?php 
if(isset($_POST['submit'])){


$fname = $_POST['fullname'];

$username = $_POST['username'];
$password = rand(100000, 999999);

$staff_insert = "UPDATE `brokers` SET `email`='$username', `fullname`='$fname' WHERE id='$j'"; 

$rs = mysqli_query($con, $staff_insert); ?> 

<script>
       alert("Staff member update successfully!");
       location = 'brokers.php';
      </script>
<?php }
?>


}


