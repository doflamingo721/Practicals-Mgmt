<?php
	// php file to add students to database

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
		$enrollmentid= mysqli_real_escape_string($mysqli,$_POST["enrollmentid"]);
		$fname= mysqli_real_escape_string($mysqli,$_POST["fname"]);
		$lname= mysqli_real_escape_string($mysqli,$_POST["lname"]);
		$student_access=3;

		// Check if enrollment already exists
		$sql = "Select enrollment_id from student_master where enrollment_id=".$enrollmentid;

		// Obtain result set
		$result = $mysqli->query($sql);

		if($result->num_rows > 0)
		{
			echo "<script>alert('Enrollment id already exists')</script>" ;
			header("refresh:0; url=../index.php#addStudentMaster");
		}
		else
		{
			// Insert student into database
			$sql = "insert into student_master values('$enrollmentid','$fname','$lname')";

			$sql2 = "INSERT INTO login(username,password,access_level) VALUES('$enrollmentid','$enrollmentid','$student_access')";

			//Check if query executes successfully
			if($mysqli->query($sql))
			{
				if($mysqli->query($sql2))
				{
					echo "<script>alert('Student Added Successfully')</script>" ;
					header("refresh:0; url=../index.php#addStudentMaster");
				}

			}
			else
			{
				//echo $mysqli->error;
				echo "<script>alert('Student could not be added')</script>" ;
				header("refresh:0; url=../index.php#addStudentMaster");
			}
		}
	}


?>
