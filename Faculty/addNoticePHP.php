
<?php

	session_start();
	if($_SESSION["username"] == "faculty")
	{
		require("../Assets/db-conn.php");
	 
	  	if($_SERVER['REQUEST_METHOD'] == 'POST')
	  	{
				$enrollment_id=$_SESSION["enrollment_id"];
				$sem_id = $_POST["semester"];
				$course = $_POST["course"];
				$class = $_POST["class"];
				$batch = $_POST["batch"];
				$notice = $_POST["notice"];


				$sql = "INSERT INTO notice (description , semester_id , course_id , class_id , batch_id) VALUES ('$notice','$sem_id','$course','$class','$batch') ";


				if($mysqli->query($sql)) 
				{
					//header("Refresh:0;url=addCourseForm.php");
					echo "<script>alert('Notice Inserted successfully')</script>";
				}
				else 
				{	
					//header("Refresh:0;url=addCourseForm.php");
					echo $mysqli->error;
					echo "<script>alert('Query Execution Error')</script>";
				}

		}
		else
		{
			echo "Request method Error";
		}

	}
	else
	{
		echo "You are not allowed to inert notices";
	}
?>