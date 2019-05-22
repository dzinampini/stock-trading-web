<?php include('_header.php');

error_reporting(0); ?>

	<div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card mb-3">
              	<div class="card-header">
       			<h2>Investors</h2>
       			<br>
       			<!-- <a href="broker-add.php">Add Broker</a> -->
            <p>More investors are added by registering on the mobile app as an investor </p>
       			<br><br>
       			</div>
              	<div class="card-body">

                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
						<th>Full Name</th>
						<th>Email</th>
						<th>Account Balance</th>
            <th></th>
					</tr>
                    </thead>

                    	<tbody>
                    	<?php foreach(getCustomers($con) as $person){ ?>
							<tr>
								<td><?php echo $person['fullname']; ?></td>
								<td><?php echo $person['email']; ?></td>
                <td><?php echo $person['balance']; ?></td>
								<td>
                  <a href="customer-portfolio.php?j=<?php echo $person['id']; ?>">Portfolio</a>
                  <br>
									<a href="customer-delete.php?j=<?php echo $person['id']; ?>">Delete Investor</a>
									<!-- <br> -->
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