
<?php

	session_start();
	if(isset($_SESSION["username"]) && $_SESSION["username"] == "faculty")
	{
		require("../Assets/db-conn.php");

	  	if($_SERVER['REQUEST_METHOD'] == 'POST')
	  	{
				$sem_id = $_POST["semester"];
				$course = $_POST["course"];
				$class = $_POST["class"];
				$batch = $_POST["batch"];
				$notice = $_POST["notice"];


				$sql = "INSERT INTO notice (description , semester_id , course_id , class_id , batch_id) VALUES ('$notice','$sem_id','$course','$class','$batch') ";


				if($mysqli->query($sql))
				{
					header("refresh:0; url=index.php#addNoticeMaster");
					echo "<script>alert('Notice Inserted successfully')</script>";
				}
				else
				{
					header("refresh:0; url=index.php#addNoticeMaster");
					echo $mysqli->error;
					echo "<script>alert('Query Execution Error')</script>";
				}

		}
		else
		{
			echo "Request method Error";
			header("refresh:0;url=index.php");
		}

	}
	else
	{
		echo "You are not allowed to inert notices";
		header("refresh:0;url=../Login/index.php");
	}
?>
