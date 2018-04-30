<?php
//Php file to add a new batch to the database

if(!isset($_SESSION["username"]) && $_SESSION["username"] != "admin") {
	echo "Invalid Credentials";
	header("refresh:0;url=../Login/index.php");
}

//Check if coming from a POST method
if($_SERVER["REQUEST_METHOD"] == "POST") {
	//Include the DB Connection file
	require("../../Assets/db-conn.php");

	//Capture the info sent previously by POST Method
	$batch = mysqli_real_escape_string($mysqli,$_POST["batch"]);

	// Check if Batch code already exists
		$sql = "SELECT batch_name FROM batch_master WHERE batch_name='".$batch."'";

		// Obtain result set
		$result = $mysqli->query($sql);

		if($result->num_rows > 0)
		{
			echo "<script>alert('Batch already exists')</script>" ;
			header("refresh:0; url=../index.php#addBatchMaster");
		}
		else
		{

			//Write an SQL Query
			$sql = "INSERT INTO batch_master(batch_name) VALUES('$batch')";

			//Check if query executes successfully
			if($mysqli->query($sql)) {
				echo "<script>alert('Batch Added Successfully')</script>" ;
				header("refresh:0; url=../index.php#addBatchMaster");
			}else {
				//echo $mysqli->error;
				echo "<script>alert('Batch couldnt be added')</script>" ;
				header("refresh:0; url=../index.php#addBatchMaster");
			}
		}

	}

?>
