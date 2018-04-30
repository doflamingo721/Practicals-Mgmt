<?php
	// php file to add course to database

	if(!isset($_SESSION["username"]) && $_SESSION["username"] != "admin") {
		echo "Invalid Credentials";
		header("refresh:0;url=../Login/index.php");
	}

	// Check the request method
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		// Include the database connection file
		require("../../Assets/db-conn.php");

		//Capture the info sent previously by POST Method
		$coursename= mysqli_real_escape_string($mysqli,$_POST["coursename"]);
		$coursecode= mysqli_real_escape_string($mysqli,$_POST["coursecode"]);


		// Check if course code already exists
		$sql = "SELECT course_code FROM course_master WHERE course_code='".$coursecode."'";

		// Obtain result set
		$result = $mysqli->query($sql);

		if($result->num_rows > 0)
		{
			echo "<script>alert('Course already exists')</script>" ;
			header("refresh:0; url=../index.php#addCourseMaster");
		}
		else
		{
			$theory = 0;
			$practical=0;
			$termwork=0;
			$oral=0;
			// $practical,$oral,$termwork;
			if(isset($_POST["theory"]))
			{
				$theory = 1;
			}
			if(isset($_POST["practical"]))
			{
				$practical = 1;
			}
			if(isset($_POST["termwork"]))
			{
				$termwork = 1;
			}
			if(isset($_POST["oral"]))
			{
				$oral = 1;
			}

			// Insert course into database
			$sql = "insert into course_master(course_code,course_name,theory,practical,termwork,oral,path) values('$coursecode','$coursename',$theory,$practical,$termwork,$oral,'GS1')";

			//Check if query executes successfully
			if($mysqli->query($sql))
			{
				echo "<script>alert('Course added Successfully')</script>" ;
				header("refresh:0; url=../index.php#addCourseMaster");
			}
			else
			{
				//echo $mysqli->error;
				echo "<script>alert('Course can not be added')</script>" ;
				header("refresh:0; url=../index.php#addCourseMaster");
			}
		}

	}
?>
