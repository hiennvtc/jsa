<?php
	class save_step_info {
		global $conn
		function update_jsa($title, $loca, $tool ) {
			$sql = "INSERT INTO jsa (job_title, tool, location_id VALUES (".$title.",".$loca.",".$tool.")";
			$result = $conn->query($sql);
			var_dump($result);die();
			if($result->affected_rows = 0) {
				echo "The information is not updated. Please try again.";
			}
		}
		function has_session_post() {
			
		}
	}
	


?>