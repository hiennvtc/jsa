<?php
	include 'head.php';
	session_start();
	//session_unset();
	//session_destroy();
	//var_dump($_SESSION["jsa"]);die();
	//var_dump($_SESSION["jsa"]);
	if(isset($_POST["step"])){
		if(isset($_SESSION["jsa"])) {
			$sql2 = "INSERT INTO job_step (description, jsa_id) VALUES ('".$_POST["step"]."',".$_SESSION["jsa"].")";
			$result2 = $conn->query($sql2);
			//var_dump($result2);die();
		} else {
			$sess = 0;
			$sql3 = "SELECT jsa_id FROM jsa";
			$result3 = $conn->query($sql3);
			if($result3->num_rows > 0) {
				while($row3 = $result3->fetch_assoc()){
					$sess = $row3["jsa_id"];
				}
			}
			$sess++;
			$_SESSION["jsa"] = $sess;
			$location = (int) $_POST["location"];
			$sql4 = "INSERT INTO jsa (jsa_id, job_title, tool, location_id) VALUES ('".$_SESSION["jsa"]."', '".$_POST["title"]."','".$_POST["tool"]."',".$location.")";
			$result4 = $conn->query($sql4);
			$sql6 = "INSERT INTO job_step (description, jsa_id) VALUES ('".$_POST["step"]."',".$_SESSION["jsa"].")";
			$result6 = $conn->query($sql6);
		}
	}
?>
			<h2><strong>Job Safety Analysis</strong></h2>
			<form class="form-horizontal" role="form" action="stepsplit.php" method="post">
				<?php
					if(isset($_SESSION["jsa"])) {
						$sql = 'SELECT jsa_id, job_title, tool, location_name AS loca FROM jsa AS j INNER JOIN location AS l ON jsa_id = '. $_SESSION["jsa"].' AND j.location_id = l.location_id';
						$result = $conn->query($sql);
						if($result->num_rows > 0) {
							while ($rows = $result->fetch_assoc()){
								echo '
									<div class="form-group">
										<label for="job-title">Job title: '.$rows["job_title"].'</label>
									</div><!--end of .form-group-->

									<div class="form-group">
										<label for="location">Location: '.$rows["loca"].'</label>
									</div><!--end of. form-group-->

									<div class="form-group">
										<label for="tool">Tools/ Equipment: '.$rows["tool"].'</label>
									</div><!--end of .form-group-->	
								';
								$sql1 = 'SELECT description AS des FROM job_step WHERE jsa_id = '.$_SESSION["jsa"];
								$result1 = $conn->query($sql1);
								if($result1->num_rows > 0) {
									$i = 1;
									while ($rows1 = $result1->fetch_assoc()){
										echo '
											<div class="form-group">
												<label  class="col-sm-1 control-label"><strong>Step '.$i.':</strong></label>
												<div class="col-sm-11">
													<label>'.$rows1["des"].'</label>
												</div>											
											</div>
										';
										$i++;
									}
									echo '
										<div class="form-group">
											<label  class="col-sm-1 control-label"><strong>Step '.$i.':</strong></label>
											<div class="col-sm-11">
												<input type="text" class="form-control" name="step" placeholder="Please describe step '.$i.' here" />
											</div>											
										</div>
									';
								}
							}
							
						}
					} else {
						echo '
							<div class="form-group">
								<label for="job-title">Job title:</label>
								<input type="text" class="form-control" name="title" id="job-title" placeholder="Type the job title here" />
							</div><!--end of .form-group-->

							<div class="form-group">
								<label for="location">Location:</label>';
						$sql5 = "SELECT location_id AS id, location_name AS area FROM location";
						$result5 = $conn->query($sql5);
						if($result5->num_rows > 0) {
							echo '
								<select name="location" class="form-control">
								<option>--Select one area--</option>
							';
							
							while ($rows5 = $result5->fetch_assoc()){
								//var_dump($rows5["area"]);die();
								echo '
									<option value = '.$rows5["id"].'>'.$rows5["area"].'</option>
									<!--input type="text" class="form-control" id="location" name="location" placeholder="Type the job location here" /-->
								';
							}
						}
						
						echo '
								</select>
							</div><!--end of. form-group-->

							<div class="form-group">
								<label for="tool">Tools/ Equipment:</label>
								<input type="text" class="form-control" id="tool" name="tool" placeholder="What tools or equipment will you use?" />
							</div><!--end of .form-group-->
							<div class="form-group">
								<label  class="col-sm-1 control-label"><strong>Step 1:</strong></label>
								<div class="col-sm-11">
									<input type="text" class="form-control" name="step" placeholder="Please describe step 1 here" />
								</div>								
							</div>
						';
					}
				?>
					
				<div class="form-group">
					<button type="submit" id="submit" class="btn btn-primary">Save</button>
				</div>
			</form>

<?php

	
	include 'foot.php';
?>