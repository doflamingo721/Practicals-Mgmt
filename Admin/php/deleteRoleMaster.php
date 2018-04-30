<?php
//Php file to delete a existing RoleMaster master from the database

if(!isset($_SESSION["username"]) && $_SESSION["username"] != "admin") {
	echo "Invalid Credentials";
	header("refresh:0;url=../Login/index.php");
}

//Check if coming from a POST method
if($_SERVER["REQUEST_METHOD"] == "POST") {
	//Include the DB Connection file
	require("../../Assets/db-conn.php");

	//Capture the info sent previously by POST Method
	$username = mysqli_real_escape_string($mysqli,$_POST["uname"]);
	$password = mysqli_real_escape_string($mysqli,$_POST["password"]);

	// Sql query to retrieve entered RoleMaster
	$sql = "SELECT username,password FROM role_master WHERE username='".$username."' and password='".$password."'";

   //Obtain result set
	$result = $mysqli->query($sql);

	// Check if the entered RoleMaster exists and delete
	if($result->num_rows > 0)
	{
		$sql = "DELETE FROM role_master WHERE username='".$username."'";
		if($mysqli->query($sql))
		{
			echo "<script>alert('RoleMaster deleted successfully');</script>";
			header("refresh:0;url=../addRoleMaster.php");
		}
		else
		{
			echo "<script>alert('RoleMaster can not be deleted');</script>";
			header("refresh:0;url=../addRoleMaster.php");
		}
	}
	else
	{
		echo "<script>alert('RoleMaster does not exist');</script>";
		header("refresh:0;url=../addRoleMaster.php");
	}
}

?>
