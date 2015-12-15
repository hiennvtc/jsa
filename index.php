<?php
	include 'head.php';	
?>
			<h2><strong>Completed Job Safety Analysis</strong></h2>
			<p class="btn btn-link"><a href="stepsplit.php">Create new JSA</a></p>
			<table class="table table-responsive table-bordered table-hover table-striped table-condense">
				<thead>
					<tr>
						<th class="col-sm-1">No.</th>
						<th>Job title</th>
						<th>Location</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$sql = "SELECT jsa_id, job_title, location_name AS location FROM jsa INNER JOIN location ON jsa.location_id = location.location_id";
						$result = $conn->query($sql);
						//var_dump($result);die();
						if ($result->num_rows > 0) {
							$i = 1;
							while ($row = $result->fetch_assoc()){
								echo '<tr>
										<td class="col-sm-1">'. $i . '</td>
										<td><a href="viewjsa.php?jsa='. $row["jsa_id"] . '">' . $row["job_title"]. '</a></td>
										<td>'. $row["location"] . '</td>
									</tr>
									';
								$i++;
							}
						}
					?>
				</tbody>
			</table>
			
<?php
	include 'foot.php';
?>