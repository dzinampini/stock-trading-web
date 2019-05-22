<?php include('_header.php'); 
$j = $_GET['j'];

error_reporting(0); ?>



<div class="container">
	<div class="row">

		<h3><?php echo getCustomerName($con, $j); ?> Stock Portfolio</h3>
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
                      <tr>
						<th>Company</th>
						<th># (Shares)</th>
						<th>Current Share Price (RTGS$</th>
						<th>Total Value (RTGS$</th>
					</tr>
                 </thead>

                 <tbody>
                    	<?php foreach(getCustomerPortfolio($con, $j) as $folio){ ?>
							<tr>
								<td><?php echo getCompanyName($con, $folio['company']); ?></td>
								<td><?php echo $folio['shares']; ?></td>
                				<td><?php echo getCompanyPrice($con, $folio['company']); ?></td>
                				<td><?php echo $folio['shares']*getCompanyPrice($con, $folio['company']); ?></td>
								
							</tr>
						<?php } ?>
                    </tbody>   
                </table>
            </div>
		</div>
		</div>
		</div>
		</div>
	</div>
</div>