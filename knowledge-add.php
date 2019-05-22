<?php include('_header.php'); ?>



<br><br>
 <div class="container">
  <h1 class="heading">Add To Investment Knowledgebase</h1>
  <div class="row">
      <div class="col-md-4">
        </div>
        <div class="col-md-4">
        	<form class="" method="POST" action="" enctype="multipart/form-data">
				<div class="form-group">
					<label>Company</label>
					<select name="company" class="form-control">
					<option value=""></option>
					<?php foreach(getCompanies($con) as $theequipment){ ?>
						<option value="<?php echo $theequipment['id']; ?>"><?php echo getCompanyName($con, $theequipment['id']); ?></option>
					<?php } ?>
				</select>
				</div>

				<div class="form-group">
					<label>Summary</label>
					<textarea name="summary" class="form-control" required></textarea>
				</div>	

				<div class="form-group">
					<label>Comment</label>
					<textarea name="comment" class="form-control" required></textarea>
				</div>			

				<div class="form-group">
					<label>Link</label>
					<textarea name="link" class="form-control" required></textarea>
				</div>

				<div class="form-group">
					<label>Uploads</label>
					<br>
					<input  type="file" name="file1" class="ed" id="file">
					<br>
					<label>Uploads</label>
					<br>
					<input  type="file" name="file2" class="ed" id="file">
					<br>
					<label>Uploads</label>
					<br>					
					<input  type="file" name="file3" class="ed" id="file">
					

				</div>

				<div class="form-group">
					<br><br>
					<input name="add_product" type="submit" class="form-control" value="Add">
				</div>


			</form>

        </div>
        <div class="col-md-4">
        </div>
        
    </div>
</div>

<?php if(isset($_POST['add_product'])){

	$summary = $_POST['summary']; 
	$company = $_POST['company']; 
	$comment = $_POST['comment']; 
	$link = $_POST['link']; 
	$image1 = $title.'_banner_'.$_FILES['file1']['name'];
	$image2 = $title.'_sidebar_'.$_FILES['file2']['name'];
	$image3 = $title.'_content_'.$_FILES['file3']['name'];


	//file extensions
	$exts = ['jpeg', 'jpg', 'gif', 'png', 'pdf'];

	$ext1 = strtolower(end(explode('.', $image1)));
	$ext2 = strtolower(end(explode('.', $image2)));
	$ext3 = strtolower(end(explode('.', $image3)));

	if(!in_array($ext1, $exts) || !in_array($ext2, $exts) || !in_array($ext3, $exts)){
		?><script>alert("Only jpg, jpeg, gif, png and pdf file formats allowed!");</script><?php
		exit;
	}

	move_uploaded_file($_FILES['file1']['tmp_name'], "images/".$image1);
	move_uploaded_file($_FILES['file2']['tmp_name'], "images/".$image2);
	move_uploaded_file($_FILES['file3']['tmp_name'], "images/".$image3);
	  

	$rs = mysqli_query($con, "INSERT INTO `knowledge`(`company`, `summary`, `comment`, `link`, `upload1`, `upload2`, `upload3`) VALUES ('$company','$summary','$comment','$link','$image1','$image2', '$image3')") ; 

      if ($rs) { ?>
  
      <script>
       alert("knowledge successfully added");
       location = 'knowledge.php';
      </script>
    <?php }

     else{ ?> 
    <script>alert("Adding knowledge Failed. Please Try again!");</script>
   <?php }


	
}
