<?php
	// php file to delete student from database

	if(!isset($_SESSION["username"]) && $_SESSION["username"] != "admin") {
		echo "Invalid Credentials";
		header("refresh:0;url=../Login/index.php");
	}

	// Check if POST request
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		// Require connection file
		require("../../Assets/db-conn.php");

		// Capture the info sent previously
		$enrollmentid= mysqli_real_escape_string($mysqli,$_POST["enrollment_delete"]);

		// Sql query to retrieve entered enrollment id
		$sql = "SELECT enrollment_id FROM student_master WHERE enrollment_id='".$enrollmentid."'";

		// Obtain result set
		$result = $mysqli->query($sql);

		// Check if entry exists and delete
		if($result->num_rows > 0)
		{
			$sql = "DELETE FROM student_master WHERE enrollment_id='".$enrollmentid."'";
			if($mysqli->query($sql))
			{
				echo "<script>alert('Student deleted successfully');</script>";
				 header("refresh:0; url=../index.php#addStudentMaster");
			}
			else
			{
				echo "<script>alert('Student can not be deleted');</script>";
				 header("refresh:0; url=../index.php#addStudentMaster");
			}
		}
		else
		{
			echo "<script>alert('Student does not exist');</script>";
			 header("refresh:0; url=../index.php#addStudentMaster");
		}
	}
?>
