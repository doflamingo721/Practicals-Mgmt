<?php
//Php file to delete a existing semester from the database

//Check if coming from a POST method
if($_SERVER["REQUEST_METHOD"] == "POST") {
	//Include the DB Connection file
	require("../../Assets/db-conn.php");
	
	//Capture the info sent previously by POST Method
	$semName = mysqli_real_escape_string($mysqli,$_POST["semdelete"]);

	// Sql query to retrieve entered class
	$sql = "SELECT sem_name FROM semester_master WHERE sem_name='".$semName."'";

   //Obtain result set
	$result = $mysqli->query($sql);

	// Check if the entered class exists and delete
	if($result->num_rows > 0)
	{
		$sql = "DELETE FROM semester_master WHERE sem_name='".$semName."'";
		if($mysqli->query($sql))
		{
			echo "<script>alert('Semester deleted successfully');</script>";
			header("refresh:0; url=../index.php#addSemester");
		}
		else
		{
			echo "<script>alert('Semester could not be deleted');</script>";
			header("refresh:0; url=../index.php#addSemester");
		}
	} 
	else
	{
		echo "<script>alert('Semester does not exist');</script>";
		header("refresh:0; url=../index.php#addSemester");
	}
}

?>
