<?php include('_header.php');

error_reporting(0); ?>

	<div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card mb-3">
              	<div class="card-header">
       			<h2>Investment Knowledgebase</h2>
       			<br>
       			<a href="knowledge-add.php">Add Knowledge</a>
       			<br><br>
       			</div>
              	<div class="card-body">

                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
						<th>Company</th>
						<th>Summary</th>
            <th>Comment</th>
            <th>Link</th>
            <th>Uploads</th>
						<th></th>
					</tr>
                    </thead>

                    	<tbody>
                    	<?php foreach(getKnowledge($con) as $person){ ?>
							<tr>
								<td><?php echo getCompanyName($con, $person['company']); ?></td>
								<td><?php echo $person['summary']; ?></td>
                <td><?php echo $person['comment']; ?></td>
                <td><?php echo $person['link']; ?></td>
                <td>
                  <a href="images/<?php echo $person['upload1']; ?>" target="_blank">Upload 1</a>
                  <br>
                  <a href="images/<?php echo $person['upload2']; ?>" target="_blank">Upload 2</a>
                  <br>
                  <a href="images/<?php echo $person['upload3']; ?>" target="_blank">Upload 3</a>
                </td>
								<td>
									<a href="knowledge-delete.php?j=<?php echo $person['id']; ?>">Delete Knowledge</a>
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