<?php
//Php file to delete a existing course from the database

//Check if coming from a POST method
if($_SERVER["REQUEST_METHOD"] == "POST") {
	//Include the DB Connection file
	require("../../Assets/db-conn.php");
	
	//Capture the info sent previously by POST Method
	$coursecode = mysqli_real_escape_string($mysqli,$_POST["course_delete"]);

	// Sql query to retrieve entered class
	$sql = "SELECT course_code FROM course_master WHERE course_code='".$coursecode."'";

   //Obtain result set
	$result = $mysqli->query($sql);

	// Check if the entered class exists and delete
	if($result->num_rows > 0)
	{
		$sql = "DELETE FROM course_master WHERE course_code='".$coursecode."'";
		if($mysqli->query($sql))
		{
			echo "<script>alert('Course deleted successfully');</script>";
			header("refresh:0;url=../addCourseMaster.php");
		}
		else
		{
			echo "<script>alert('Course can not be deleted');</script>";
			header("refresh:0;url=../addCourseMaster.php");
		}
	} 
	else
	{
		echo "<script>alert('Course does not exist');</script>";
		header("refresh:0;url=../addCourseMaster.php");
	}
}

?>
