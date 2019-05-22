<?php include('_header.php'); 
$j = $_GET['j']; ?>



<?php foreach(getCompany($con, $j) as $person){ ?>
<form name="" method="POST" action="">

<div class="container">
	<div class="row">
		
		<div class="col-md-3">
			<h3>Company Details</h3><br>
			<div class="form-group">
				<label>Company </label>
				<input name="company" class="form-control" type="text" minlength="3" maxlength="30" required value="<?php echo $person['company']; ?>">
			</div> 
			

			<div class="form-group">
				<label>Share Price</label>
				<input name="price" class="form-control" step="0.01" type="number" required value="<?php echo $person['price']; ?>">
			</div>

			<div class="form-group">
				<label>Shares Available</label>
				<input name="shares" class="form-control" type="number" required value="<?php echo $person['shares']; ?>">
			</div>
		
			<div class="form-group">
				<br><br>
				<input name="submit" type="submit" id="submit" class="form-control submit_button" value="Update Company"  /> 
			</div>
		</div>
		<div class="col-md-1"></div>

		<div class="col-md-3">
			<h3>Company Stock History</h3><br>
			<div class="table-responsive">
				<table class="table">
					<tr>
						<th>Date & Time</th>
						<th>Share Price</th>
					</tr>

					<?php foreach(sharesHistory($con, $person['id']) as $a){ ?>
					<tr>
						<td><?php echo $a['date_time']; ?></td>
						<td>RTGS$<?php echo $a['price']; ?></td>
					</tr>
				<?php } ?>
				</table>
			</div>
		</div>
		<div class="col-md-1"></div>



		<div class="col-md-4">
			<h3>Company Investment Knowledge</h3><br>
			<?php foreach(knowledgeHistory($con, $person['id']) as $a){ ?>
			<hr>
			<a href="" target="_blank"><p><b><?php echo $a['summary']; ?></p></b></a>
			<p><?php echo $a['comment']; ?></p>
			<?php } ?>
			

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


$company = $_POST['company'];
$shares = $_POST['shares'];
$price = $_POST['price'];

$history_insert = "INSERT INTO shares_history (company, shares, price, signature) VALUES ('$j', '$shares', '$price', '$id')";
$rs = mysqli_query($con, $history_insert);

$company_update = "UPDATE `companies` SET `company`='$company', `price`='$price', `shares`='$shares' WHERE id='$j'"; 

$rs = mysqli_query($con, $company_update); ?> 

<script>
       alert("Company updated successfully!");
       location = 'companies.php';
      </script>
<?php }
?>


}


