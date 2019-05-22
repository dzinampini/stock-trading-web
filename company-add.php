<?php include('_header.php'); ?>

<form name="" method="POST" action="" enctype="multipart/form-data">

<div class="container">
	<div class="row">
		<div class="col-md-4">
		</div>

		<div class="col-md-4">
			<div class="form-group">
				<label>Company</label>
				<input name="company" class="form-control" type="text" minlength="3" maxlength="30" required>
			</div> 
			

			<div class="form-group">
				<label>Share Price</label>
				<input name="price" class="form-control" step="0.01" type="number" required>
			</div>

			<div class="form-group">
				<label>Shares Available</label>
				<input name="shares" class="form-control" type="number" required>
			</div>


			<div class="form-group">
				<label>Logo</label>
				<input type="file" name="fileToUpload" id="fileToUpload">
			</div>
		


			<div class="form-group">
				<br><br>
				<input name="submit" type="submit" id="submit" class="form-control submit_button" value="Add Company"  /> 
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

	$target_dir = "api/logos/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image

$filename = $_FILES["fileToUpload"]["name"];
$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    ?><script>
		       alert("Your image is not in ithe correct format!");
		       
		      </script><?php 
		      exit;
}
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

        // insert into db 
        $filename = $_FILES["fileToUpload"]["name"];
        $company = $_POST['company'];
		$shares = $_POST['shares'];
		$price = $_POST['price'];

		$staff_insert = "INSERT INTO `companies`(`company`, `shares`, `price`, `logo`) VALUES ('$company','$shares','$price', '$filename')"; 

		$rs = mysqli_query($con, $staff_insert); ?> 

		<script>
		       alert("Company added successfully!");
		       location = 'companies.php';
		      </script>
		<?php }

    } else { ?>
        <script>
		       alert("Your image was not uploaded!");
		       // location = 'companies.php';
		      </script> <?php 
    }
// }





// }


