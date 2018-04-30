<?php
	// php file to add students to database
	
	// Check the request method
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		// Include the database connection file
		require("../../Assets/db-conn.php");

		//Capture the info sent previously by POST Method
		$username= mysqli_real_escape_string($mysqli,$_POST["uname"]);
		$password= mysqli_real_escape_string($mysqli,$_POST["password"]);
		$fname= mysqli_real_escape_string($mysqli,$_POST["fname"]);
		$mname= mysqli_real_escape_string($mysqli,$_POST["mname"]);
		$lname= mysqli_real_escape_string($mysqli,$_POST["lname"]);

		// Check the username  already exists
		$sql = "SELECT username FROM role_master WHERE username='".$username."'";

		// Obtain result set
		$result = $mysqli->query($sql);

		if($result->num_rows > 0)
		{
			echo "<script>alert('RoleMaster already exists')</script>" ;
			header("refresh:0; url=../addRoleMaster.php");
		}
		else
		{
			// Insert student into database
			$sql = "insert into role_master(fname,mname,lname,username,password) values('$fname','$mname','$lname','$username','$password')";

			//Check if query executes successfully
			if($mysqli->query($sql))
			{
				echo "<script>alert('RoleMaster added successfully')</script>" ;
				header("refresh:0; url=../addRoleMaster.php");
			}
			else 
			{
				//echo $mysqli->error;
				echo "<script>alert('RoleMaster can not be added')</script>" ;
				header("refresh:0; url=../addRoleMaster.php");
			}
		}
	}

		
?>