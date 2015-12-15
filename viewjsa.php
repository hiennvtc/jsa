<?php
	include 'head.php';
	$sql = "SELECT job_title AS title, tool, location_name AS location FROM jsa INNER JOIN location ON jsa.jsa_id =". $_GET["jsa"] ." AND jsa.location_id = location.location_id";
	$result = $conn->query($sql);
	if($result->num_rows > 0) {
		$i = 1;
		while($rows = $result->fetch_assoc()) {
			
?>
			<h2><strong>Job Safety Analysis</strong></h2>
			<p><strong>Job title: </strong><?php echo $rows["title"]; ?></p>
			<p><strong>Location: </strong><?php echo $rows["location"]; ?></p>
			<p><strong>Tools/ Equipment: </strong><?php echo $rows["tool"]; ?></p>
<?php
		}
	}
?>
			<table class="table table-striped table-hover table-bordered table-responsive table-condensed">
				<thead>
					<tr>
						<th rowspan="2">Step</th>
						<th rowspan="2">Step Description</th>
						<th rowspan="2">Hazard</th>
						<th rowspan="2">Risk</th>
						<th rowspan="2">Existing controls</th>
						<th colspan="3">Risk</th>
						<th rowspan="2">Control measures</th>
						<th rowspan="2">Action by</th>
						<th colspan="3">Residual Risk</th>
						<th rowspan="2"></th>
					</tr>
					<tr>
						<th>Severity</th>
						<th>Likelihood</th>
						<th>Risk Level</th>
						<th>Severity</th>
						<th>Likelihood</th>
						<th>Risk Level</th>
					</tr>
				</thead>
				<tbody>
				<?php
					if(isset($_GET['jsa'])){
						$jsa_id = $_GET['jsa'];
						$sql_step = "
							SELECT description, step_id FROM job_step WHERE jsa_id = $jsa_id;
						";
						$result_step = $conn->query($sql_step);
						if($result_step->num_rows>0) {
							$j = 1;
							while($rows_step = $result_step->fetch_assoc()){
								//$j = 0;	
								var_dump ($j);
								$k = 0;
								$sql_haz = "
									SELECT hazard, department FROM hazard AS h JOIN department AS d ON h.dept_id = d.dept_id AND h.step_id = ".$rows_step['step_id']."
								";
								$result_haz = $conn->query($sql_haz);
								if($result_haz->num_rows>0) {
														
									while($row_haz = $result_haz->fetch_assoc()){
										$k++;
										if($k == 1) {
											echo '
												<tr>
													<td rowspan="'.$result_haz->num_rows.'">'. $j .'</td>
													<td rowspan="'.$result_haz->num_rows.'">'. $rows_step["description"] .'</td>
													<td>'. $row_haz["hazard"] .'</td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td><a href="riskanalysis.php?step=">Edit</a></td>
												</tr>
											';
										} else {
											echo '
												<tr>
													<td>'. $row_haz["hazard"].'</td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td><a href="riskanalysis.php">Edit</a></td>
												</tr>
											';
										}
									} 						
									
								} else {
									echo '
											<tr>
												<td>'. $j .'</td>
												<td><a href="riskanalysis.php?step='.$rows_step["step_id"].'">'. $rows_step["description"] .'</a></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td><a href="riskanalysis.php">Edit</a></td>
											</tr>
										';
								}//endif
								$j++;
							}//endwhilestep
						}
						
						//var_dump($myresult);die();
						/*if ($myresult -> num_rows > 0) {
							$j = 1;
							echo '
							<tr>
								<td rowspan="'.$myresult->num_rows.'">'. $j .'</td>
								<td rowspan="'.$myresult->num_rows.'">'. $myrows["des"] .'</td>
							';
							while ($myrows = $myresult->fetch_assoc()){
								echo '									
										<td>'. $myrows["hazard"] .'</td>
										<td>'. $myrows["risk"] .'</td>
										<td>Any controls</td>
										<td>'. $myrows["sev1"] .'</td>
										<td>'. $myrows["like1"] .'</td>
										<td>'. $myrows["level1"] .'</td>
										<td>'. $myrows["measure"] .'</td>
										<td>'. $myrows["department"] .'</td>
										<td>'. $myrows["sev2"] .'</td>
										<td>'. $myrows["like2"] .'</td>
										<td>'. $myrows["level2"] .'</td>
										<td><a href="riskanalysis.php">Edit</a></td>
									</tr>
								';
								$j++;
							}//end while
						}//end if(myresult)*/
					}//end isset(GET)
				?>
				</tbody>
			</table>
			<button class="btn btn-default">Export to excel</button>

<?php

	include 'foot.php';
?>