<?php
//Php file to add a new semester to the database

//Check if coming from a POST method
if($_SERVER["REQUEST_METHOD"] == "POST") {
	//Include the DB Connection file
	require("../../Assets/db-conn.php");
	
	//Capture the info sent previously by POST Method
	$semName = mysqli_real_escape_string($mysqli,$_POST["semadd"]);

	// Check if class code already exists
		$sql = "SELECT sem_name FROM semester_master WHERE sem_name='".$semName."'";

		// Obtain result set
		$result = $mysqli->query($sql);

		if($result->num_rows > 0)
		{
			echo "<script>alert('Semester already exists')</script>" ;
			header("refresh:0; url=../index.php#addSemester");
		}
		else
		{

			//Write an SQL Query
			$sql = "INSERT INTO semester_master(sem_name) VALUES('$semName')";

			//Check if query executes successfully
			if($mysqli->query($sql)) {
				echo "<script>alert('Semester Added Successfully')</script>" ;
				header("refresh:0; url=../index.php#addSemester");
			}else {
				//echo $mysqli->error;
				echo "<script>alert('Semester could not be added')</script>" ;
				header("refresh:0; url=../index.php#addSemester");
			}
		}

	} 

?>