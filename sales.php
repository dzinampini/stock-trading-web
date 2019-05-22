<?php include('_header.php');

error_reporting(0); ?>

	<div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card mb-3">
              	<div class="card-header">
       			<h2>Investor Stock Sales</h2>
       			<br>
            <p>Purchases made by investors and informed through the mobile app</p>
       			<!-- <a href="broker-add.php">Add Broker</a> -->
       			<br><br>
       			</div>
              	<div class="card-body">

                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
						<th>Investor</th>
						<th>Company</th>
            <th>Shares</th>
            <th>Cost</th>
						<th></th>
					</tr>
                    </thead>

                    	<tbody>
                    	<?php foreach(getSales($con) as $person){ ?>
							<tr>
								<td><?php echo getCustomerName($con, $person['investor']); ?></td>
                <td><?php echo getCompanyName($con, $person['company']); ?></td>
								<td><?php echo $person['shares']; ?></td>
                <td><?php echo $person['cost']; ?></td>
								<td>
                  <a href="sales-decision.php?j=<?php echo $person['id']; ?>&i=<?php echo $person['investor']; ?>&c=<?php echo $person['cost']; ?>&s=<?php echo $person['shares']; ?>">Process Sale</a>
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