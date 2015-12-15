<?php
	include 'mysqlconnect/connect.php';
	/*var_dump($_POST['title']);
	echo "<br>";
	var_dump($_POST["tool"]);
	echo "<br>";
	var_dump($_POST["location"]);
	echo "<br>";
	var_dump($_POST["step"]);
	echo "<br>";die();*/
	if(isset($_POST["step"])){
		if(isset($_SESSION["jsa"])) {
			$sql2 = "INSERT INTO job_step (description, jsa_id) VALUES (".$_POST["step"].",".$_SESSION["jsa"].")";
			$result2 = $conn->query($sql2);
			if($result->affected_rows = 0) {
				die("Cannot update the information. Please try again.");
			}
			//var_dump($_SESSION["jsa"]);die();
		} else {
			$sess = 0;
			$sql3 = "SELECT jsa_id FROM jsa";
			$result3 = $conn->query($sql3);
			if($result3->num_rows > 0) {
				while($row3 = $result3->fetch_assoc()){
					$sess = $row3["jsa_id"];
					echo $sess."<br>";
				}
			}
			$sess++;
			$_SESSION["jsa"] = $sess;
			$location = (int) $_POST["location"];
			echo "session "; var_dump($_SESSION["jsa"]);
			echo "<br> location ="; var_dump($location);
			echo "<br> title ="; var_dump($_POST['title']);
			echo "<br> tool ="; var_dump($_POST['tool']);
			echo "<br> step ="; var_dump($_POST['step']);
			$sql4 = "INSERT INTO jsa (jsa_id, job_title, tool, location_id) VALUES ('".$_SESSION["jsa"]."', '".$_POST["title"]."','".$_POST["tool"]."',".$location.")";
			$result4 = $conn->query($sql4);
			$sql6 = "INSERT INTO job_step (description, jsa_id) VALUES ('".$_POST["step"]."',".$_SESSION["jsa"].")";
			$result6 = $conn->query($sql6);
		}
	}
?>