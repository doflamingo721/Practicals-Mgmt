<?php

	session_start();

	if(!isset($_SESSION["username"]) && $_SESSION["username"] != "faculty") {
		echo "Invalid Credentials";
		header("refresh:0;url=../Login/index.php");
	}

	if($_SERVER['REQUEST_METHOD'] == 'GET')
	{
		require("../Assets/db-conn.php");
		$enrollment=$_GET['enrollment_id'];
		$sem_id = $_GET["sem_id"];
    $course = $_GET["course_id"];
    $class = $_GET["class_id"];
    $batch = $_GET["batch_id"];
    $assignment_no = $_GET["assignment_no"];
    $marks = $_GET["marks"];
		echo $enrollment;

		$sql="Select submission_id from assignment_submission where assignment_no='$assignment_no' and enrollment_id='$enrollment' and sem_id='$sem_id' and course_id='$course' and class_id='$class' and batch_id='$batch' ";

		$result = $mysqli->query($sql);

		if($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$submission_id=$row['submission_id'];
				echo $submission_id;
				echo $marks;
			}
		}

		$sql2="insert into assignment_marks(submission_id,enrollment_id,marks)values('$submission_id','$enrollment','$marks')";

		$sql3="update assignment_submission set attempted = '1' where assignment_no='$assignment_no' and enrollment_id='$enrollment' and sem_id='$sem_id' and course_id='$course' and class_id='$class' and batch_id='$batch' ";

		if($mysqli->query($sql2))
		{
			if($mysqli->query($sql3))
			{
				echo "attemted 1";
				echo "<script>window.close();</script>";
			}
			else
			{
				echo "attempted 0";
				//echo $mysqli->error;
			}
		}
		else
		{
			echo "Error in Query";
		}
	} else {
		echo "You are not allowed to directly view this page";
		header("refresh:0;url=index.php");
	}
?>
