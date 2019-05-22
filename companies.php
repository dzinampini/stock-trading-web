<?php include('_header.php');

error_reporting(0); ?>

	<div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card mb-3">
              	<div class="card-header">
       			<h2>Listed Companies</h2>
       			<br>
       			<a href="company-add.php">Add Company</a>
       			<br><br>
       			</div>
              	<div class="card-body">

                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
						<th>Company</th>
						<th>Share Price (US$)</th>
            <th>Available Shares</th>
						<th></th>
					</tr>
                    </thead>

                    	<tbody>
                    	<?php foreach(getCompanies($con) as $person){ ?>
							<tr>
								<td><?php echo $person['company']; ?></td>
								<td><?php echo $person['price']; ?></td>
                <td><?php echo $person['shares']; ?></td>
								<td>
									<a href="company-delete.php?j=<?php echo $person['id']; ?>">Delete Company</a>
									<br>
									<a href="company-view.php?j=<?php echo $person['id']; ?>">View/Update Company</a>
								</td>
							</tr>
						<?php } ?>
                    </tbody>              
                    
                  </table>
                </div>
              </div>
              <div class="card-footer small text-muted">Retrieved <?php echo date('Y-m-d H:m'); ?></div>
          </div>
      </div>
  </div>

<?php include('_footer.php'); ?>