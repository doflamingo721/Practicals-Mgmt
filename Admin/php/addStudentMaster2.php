<?php
	session_start();

	if(!isset($_SESSION["username"]) && $_SESSION["username"] != "admin") {
		echo "Invalid Credentials";
		header("refresh:0;url=../Login/index.php");
	}

	if($_SESSION["username"] == "admin")
	{
		if(isset($_POST['submit']))
		{
					// Include the database connection file
					require("../../Assets/db-conn.php");

			if($_FILES['csv_data']['name'])
			{

				$arrFileName = explode('.',$_FILES['csv_data']['name']);
				if($arrFileName[1] == 'csv')
				{

				$handle = fopen($_FILES['csv_data']['tmp_name'], "r");
				while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
				{

					$enrollment_id = mysqli_real_escape_string($mysqli,$data[0]);
					$fname= mysqli_real_escape_string($mysqli,$data[1]);
					// $lname= mysqli_real_escape_string($mysqli,$data[2]);
					$student_access=3;

					$name = explode(' ',$data[1]);
					$fname = $name[1];
					$lname = $name[0];

					// echo $enrollment_id." ".$fname." ".$lname."<br>";

					$sql="INSERT into student_master(enrollment_id,fname,lname) values('$enrollment_id','$fname','$lname')";

					$sql2 = "INSERT INTO login(username,password,access_level) VALUES('$enrollment_id','$enrollment_id','$student_access')";

					if($bool=$mysqli->query($sql)) {
						$mysqli->query($sql2);
					}else {
						echo $enrollment_id." is not added";
						echo $mysqli->error;
					}
				}

				fclose($handle);
				echo "<script>alert('Students Added Successfully')</script>";
				header("refresh:0; url=../addStudentMaster.php");
			} else {
				echo "File Format not supported. Must be a CSV file";
			}
			}
		}
	 }
?>
