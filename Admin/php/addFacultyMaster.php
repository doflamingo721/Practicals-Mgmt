<?php
	// php file to add faculty to database

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
		$username= mysqli_real_escape_string($mysqli,$_POST["uname"]);
		$fname= mysqli_real_escape_string($mysqli,$_POST["fname"]);
		$mname= mysqli_real_escape_string($mysqli,$_POST["mname"]);
		$lname= mysqli_real_escape_string($mysqli,$_POST["lname"]);

		$access_level = 2;

		// Check if username already exists
		$sql = "SELECT username FROM faculty_master WHERE username='".$username."'";

		// Obtain result set
		$result = $mysqli->query($sql);

		if($result->num_rows > 0)
		{
			echo "<script>alert('Faculty already exists')</script>" ;
			header("refresh:0; url=../index.php#addFacultyMaster");
		}
		else
		{
			// // Insert faculty into database
			// $sql = "insert into faculty_master(username,fname,mname,lname) values('$username','$fname','$mname','$lname')";

			// //Check if query executes successfully
			// if($mysqli->query($sql))
			// {
			// 	echo "<script>alert('Faculty added successfully')</script>" ;
			// 	header("refresh:0; url=../addFacultyMaster.php");
			// }
			// else
			// {
			// 	//echo $mysqli->error;
			// 	echo "<script>alert('Faculty can not be added')</script>" ;
			// 	header("refresh:0; url=../addFacultyMaster.php");
			// }


			// Insert faculty into database
			$sql = "insert into faculty_master(username,fname,mname,lname) values('$username','$fname','$mname','$lname')";

			$sql1 = "insert into login(username,password,access_level) values('$username','$username','$access_level')";


			//Check if query executes successfully
			if($mysqli->query($sql))
			{
				echo "<script>alert('Faculty added successfully')</script>" ;

				$mysqli->query($sql1);

				header("refresh:0; url=../index.php#addFacultyMaster");
			}
			else
			{
				//echo $mysqli->error;
				echo "<script>alert('Faculty can not be added')</script>" ;
				header("refresh:0; url=../index.php#addFacultyMaster");
			}



		}
	}


?>
