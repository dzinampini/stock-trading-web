<?php include('_header.php'); ?>

<style>
	@media print{
	  nav{
	  	display:none;
	  }
	}
</style>

<div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card mb-3">
              	<div class="card-header">
       			<h2>Reports</h2>
       			<br>
       			<button class="btn btn-default" onclick="window.print();return false;">Print Report</button>
       			<br><br>
       			</div>
              	<div class="card-body">
              	<h3>Top Companies</h3>
                <div class="table-responsive">
                  <table class="table table-bordered"  width="100%" cellspacing="0">
                    <thead>
                      <tr>
						<th>Company</th>
						<th>Share Price (RTGS$)</th>
            			<th>Available Shares</th>
					</tr>
                    </thead>

                    	<tbody>
                    	<?php $rs = mysqli_query($con, "SELECT * FROM companies ORDER BY price DESC LIMIT 5") or die(mysqli_error($con));
							while($row = mysqli_fetch_array($rs)){ ?> 
	
							<tr>
								<td><?php echo $row['company']; ?></td>
								<td><?php echo $row['price']; ?></td>
                				<td><?php echo $row['shares']; ?></td>
							</tr>
						<?php } ?>
                    </tbody>              
                    
                  </table>
                </div>

                <br><br>
                <h3>Least Perfoming Companies</h3>
                <div class="table-responsive">
                  <table class="table table-bordered"  width="100%" cellspacing="0">
                    <thead>
                      <tr>
						<th>Company</th>
						<th>Share Price (RTGS$)</th>
            			<th>Available Shares</th>
					</tr>
                    </thead>

                    	<tbody>
                    	<?php $rs = mysqli_query($con, "SELECT * FROM companies ORDER BY price ASC LIMIT 3") or die(mysqli_error($con));
							while($row = mysqli_fetch_array($rs)){ ?> 
	
							<tr>
								<td><?php echo $row['company']; ?></td>
								<td><?php echo $row['price']; ?></td>
                				<td><?php echo $row['shares']; ?></td>
							</tr>
						<?php } ?>
                    </tbody>              
                    
                  </table>
                </div>

                <h3>Top Investors</h3>
                <div class="table-responsive">
                  <table class="table table-bordered"  width="100%" cellspacing="0">
                    <thead>
                      <tr>
						<th>Investor</th>
						<th>Portfolio</th>
					</tr>
                    </thead>

                    	<tbody>
                    	<?php $rs = mysqli_query($con, "SELECT * FROM customers ORDER BY balance DESC LIMIT 5") or die(mysqli_error($con));
							while($row = mysqli_fetch_array($rs)){ ?> 
	
							<tr>
								<td><?php echo $row['fullname']; ?>
									<br>RTGS$<?php echo $row['balance']; ?>
								</td>
								<td>
									<table>
											<tr>
												<th>Company</th>
												<th>Shares</th>
											</tr>
									<?php $inv = $row['id'];
									$rs9 = mysqli_query($con, "SELECT * FROM portfolio WHERE investor = '$inv'") or die(mysqli_error($con));
									while($row9 = mysqli_fetch_array($rs9)){  ?>
										
											<tr>
												<td><?php echo getCompanyName($con, $row9['id']); ?></td>
												<td><?php echo $row9['shares']; ?></td>
											</tr>
										

									<?php } ?>
									</table>
								</td>
							</tr>
						<?php } ?>
                    </tbody>              
                    
                  </table>
                </div>


                <h3>System Usage </h3>
                <div class="table-responsive">
                  <table class="table table-bordered"  width="100%" cellspacing="0">
                    
                      <tr>
						<th>Registered Companies</th>
						<td>
							<?php $result ="";
					        $query = "SELECT * FROM companies";
					        $result = mysqli_query($con, $query);
					        $rows=mysqli_fetch_array($result);
							echo $row = mysqli_num_rows($result); ?>  
						</td>
					</tr>
					<tr>
						<th>Registered Investors</th>
						<td>
							<?php $result ="";
					        $query = "SELECT * FROM customers";
					        $result = mysqli_query($con, $query);
					        $rows=mysqli_fetch_array($result);
							echo $row = mysqli_num_rows($result); ?>  
						</td>
					</tr>
					<tr>
            			<th>Registered Brokers</th>
            			<td>
							<?php $result ="";
					        $query = "SELECT * FROM brokers";
					        $result = mysqli_query($con, $query);
					        $rows=mysqli_fetch_array($result);
							echo $row = mysqli_num_rows($result); ?>  
						</td>
					</tr>
            			<th>Processed Sales</th>
            			<td>
							<?php $ps = 0; 
							$result ="";
					        $query = "SELECT * FROM sales WHERE status='successful'";
					        $result = mysqli_query($con, $query);
					        while($row = mysqli_fetch_array($result)){
					        	$ps = $ps + $row['cost'];
					        }
							echo 'RTGS$'.$ps; ?>  
						</td>
					</tr>
            			<th>Processed Purchases</th>
            			<td>
							<?php $pp = 0; 
							$result ="";
					        $query = "SELECT * FROM purchases WHERE status='successful'";
					        $result = mysqli_query($con, $query);
					        while($row = mysqli_fetch_array($result)){
					        	$pp = $pp + $row['cost'];
					        }
							echo 'RTGS$'.$pp; ?>  
						</td>
					</tr>
            			<th>LES Trust Deposits</th>
            			<td>
							<?php $pp = 0; 
							$result ="";
					        $query = "SELECT * FROM payments WHERE status='accept'";
					        $result = mysqli_query($con, $query);
					        while($row = mysqli_fetch_array($result)){
					        	$pp = $pp + $row['amount'];
					        }
							echo 'RTGS$'.$pp; ?>  
						</td>
					</tr>
            			<th>LES Trust Withdrawals</th>
            			<td>
							<?php $pp = 0; 
							$result ="";
					        $query = "SELECT * FROM withdrawals WHERE status='accept'";
					        $result = mysqli_query($con, $query);
					        while($row = mysqli_fetch_array($result)){
					        	$pp = $pp + $row['cost'];
					        }
							echo 'RTGS$'.$pp; ?>  
						</td>
					</tr>
             
                    
                  </table>
                </div>


              </div>
              <div class="card-footer small text-muted">Retrieved <?php echo date('Y-m-d H:m'); ?></div>
          </div>
      </div>
  </div>

<?php include('_footer.php'); ?>