<?php include('_header.php');

error_reporting(0); ?>

	<div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card mb-3">
              	<div class="card-header">
       			<h2>Investor Payments</h2>
       			<br>
            <p>Payments made by investors and informed through the mobile app</p>
       			<!-- <a href="broker-add.php">Add Broker</a> -->
       			<br><br>
       			</div>
              	<div class="card-body">

                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
						<th>Investor</th>
						<th>Amount</th>
            <th>Proof</th>
						<th></th>
					</tr>
                    </thead>

                    	<tbody>
                    	<?php foreach(getPayments($con) as $person){ ?>
							<tr>
								<td><?php echo getCustomerName($con, $person['investor']); ?></td>
								<td><?php echo $person['amount']; ?></td>
                <td><?php echo $person['proof']; ?></td>
								<td>
									<a href="accounts-decision.php?j=<?php echo $person['id']; ?>&a=<?php echo $person['amount']; ?>&s=<?php echo $person['investor']; ?>&m=decline">Decline Payment</a>
									<br>
                  <a href="accounts-decision.php?j=<?php echo $person['id']; ?>&a=<?php echo $person['amount']; ?>&s=<?php echo $person['investor']; ?>&m=accept">Accept Payment</a>
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