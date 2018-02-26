<?php
//Php file to delete a existing Faculty/Faculty from the database

//Check if coming from a POST method
if($_SERVER["REQUEST_METHOD"] == "POST") {
	//Include the DB Connection file
	require("../../Assets/db-conn.php");
	
	//Capture the info sent previously by POST Method
	$username = mysqli_real_escape_string($mysqli,$_POST["faculty_delete"]);

	// Sql query to retrieve entered Faculty
	$sql = "SELECT username FROM faculty_master WHERE username='".$username."'";

   //Obtain result set
	$result = $mysqli->query($sql);

	// Check if the entered Faculty exists and delete
	if($result->num_rows > 0)
	{
		$sql = "DELETE FROM faculty_master WHERE username='".$username."'";
		if($mysqli->query($sql))
		{
			echo "<script>alert('Faculty deleted successfully');</script>";
			header("refresh:0;url=../addFacultyMaster.php");
		}
		else
		{
			echo "<script>alert('Faculty can not be deleted');</script>";
			header("refresh:0;url=../addFacultyMaster.php");
		}
	} 
	else
	{
		echo "<script>alert('Faculty does not exist');</script>";
		header("refresh:0;url=../addFacultyMaster.php");
	}
}

?>
