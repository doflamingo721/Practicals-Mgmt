<<<<<<< HEAD
<?php
	session_start();
	if(!isset($_SESSION["username"]) && $_SESSION["username"] != "faculty") {
		echo "Invalid Credentials";
		echo "<script>window.close();</script>";
	}

	if($_SERVER['REQUEST_METHOD'] == 'GET') {

		require("../Assets/db-conn.php");

		$class_id = $mysqli->real_escape_string($_GET['class_id']);
		$sem_id = $mysqli->real_escape_string($_GET['sem_id']);
		$batch_id = $mysqli->real_escape_string($_GET['batch_id']);
		$course_id = $mysqli->real_escape_string($_GET['course_id']);
		$enrollment_id = $mysqli->real_escape_string($_GET['enrollment_id']);
		$assignment_no = $mysqli->real_escape_string($_GET['assignment_no']);

		$sql = "SELECT CONVERT(input_file USING utf8) AS input_file FROM assignment_submission WHERE assignment_submission.sem_id='$sem_id' AND assignment_submission.course_id='$course_id' AND assignment_submission.class_id='$class_id' AND assignment_submission.batch_id='$batch_id' AND assignment_no='$assignment_no' AND enrollment_id = '$enrollment_id'";

		$result = $mysqli->query($sql);

		if($result->num_rows > 0) {

			$row = $result->fetch_assoc();

			print(stripslashes(nl2br($row['input_file'])));

		}else {
			echo "No Input file Found";
		}

	}else {
		echo "You are not allowed to directly view this page!";
		header("refresh:0;url=index.php");
	}

?>
=======
<?php
		
	if($_SERVER['REQUEST_METHOD'] == 'GET') {

		require("../Assets/db-conn.php");

		$class_id = $mysqli->real_escape_string($_GET['class_id']);
		$sem_id = $mysqli->real_escape_string($_GET['sem_id']);
		$batch_id = $mysqli->real_escape_string($_GET['batch_id']);
		$course_id = $mysqli->real_escape_string($_GET['course_id']);
		$enrollment_id = $mysqli->real_escape_string($_GET['enrollment_id']);
		$assignment_no = $mysqli->real_escape_string($_GET['assignment_no']);

		$sql = "SELECT CONVERT(input_file USING utf8) AS input_file FROM assignment_submission WHERE assignment_submission.sem_id='$sem_id' AND assignment_submission.course_id='$course_id' AND assignment_submission.class_id='$class_id' AND assignment_submission.batch_id='$batch_id' AND assignment_no='$assignment_no' AND enrollment_id = '$enrollment_id'";

		$result = $mysqli->query($sql);

		if($result->num_rows > 0) {

			$row = $result->fetch_assoc();

			print(nl2br($row['input_file']));

		}else {
			echo "No Input file Found";
		}

	}else {
		echo "Not Get NOt Allowed";
	}

?>
>>>>>>> master
