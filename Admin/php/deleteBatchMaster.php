<?php
//Php file to delete a existing batch from the database

//Check if coming from a POST method
if($_SERVER["REQUEST_METHOD"] == "POST") {
	//Include the DB Connection file
	require("../../Assets/db-conn.php");
	
	//Capture the info sent previously by POST Method
	$batch = mysqli_real_escape_string($mysqli,$_POST["batch"]);

	// Sql query to retrieve entered Batch
	$sql = "SELECT Batch_name FROM batch_master WHERE Batch_name='".$batch."'";

   //Obtain result set
	$result = $mysqli->query($sql);

	// Check if the entered Batch exists and delete
	if($result->num_rows > 0)
	{
		$sql = "DELETE FROM batch_master WHERE batch_name='".$batch."'";
		if($mysqli->query($sql))
		{
			echo "<script>alert('Batch deleted successfully');</script>";
			header("refresh:0;url=../addBatchMaster.php");
		}
		else
		{
			echo "<script>alert('Batch can not be deleted');</script>";
			header("refresh:0;url=../addBatchMaster.php");
		}
	} 
	else
	{
		echo "<script>alert('Batch does not exist');</script>";
		header("refresh:0;url=../addBatchMaster.php");
	}
}

?>
