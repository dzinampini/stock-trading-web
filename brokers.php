<?php include('_header.php');

error_reporting(0); ?>

	<div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card mb-3">
              	<div class="card-header">
       			<h2>Brokers</h2>
       			<br>
       			<a href="broker-add.php">Add Broker</a>
       			<br><br>
       			</div>
              	<div class="card-body">

                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
						<th>Full Name</th>
						<th>Email</th>
						<th></th>
					</tr>
                    </thead>

                    	<tbody>
                    	<?php foreach(getBrokers($con) as $person){ ?>
							<tr>
								<td><?php echo $person['fullname']; ?></td>
								<td><?php echo $person['email']; ?></td>
								<td>
									<a href="broker-delete.php?j=<?php echo $person['id']; ?>">Delete Account</a>
									<br>
									<a href="broker-view.php?j=<?php echo $person['id']; ?>">Update Account</a>
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