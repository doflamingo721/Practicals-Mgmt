<html>
<link rel="stylesheet" href="../Assets/css/style.css">
<?php
	session_start();
if(!isset($_SESSION["username"]) && $_SESSION["username"] != "admin") {
	echo "Invalid Credentials";
	header("refresh:0;url=../Login/index.php");
}
?>

	<h3>Add a Student</h3>
	<form method="post" action="php/addStudentMaster.php">
		<label id="stylelabel">Enter Enrollment Number:</label>
			<input type="text" id="enrollmentid" name="enrollmentid">
		<br>
		<label id="stylelabel">Enter First Name:</label>&emsp;&emsp;&emsp;&nbsp;&nbsp;
			<input type="text" id="fname" name="fname"><br>
		<label id="stylelabel">Enter Last Name:</label>&emsp;&emsp;&emsp;&nbsp;&nbsp;
		<input type="text" id="lname" name="lname"><br>
		<input type="submit" value="submit"><br><br>
 	</form>

 	<form method='POST' enctype='multipart/form-data' action="php/addStudentMaster2.php">
		Upload CSV FILE: <input type='file' name='csv_data' /> <input type='submit' name='submit' value='Upload File' />
	</form>

 	<h3>Delete a Student</h3>
 	<form method="post" action="php/deleteStudentMaster.php">
 		Enter Enrollment Number:<input type="text" id="enrollmentid" name="enrollment_delete"><br>
 		<input type="submit" name="submit">
 	</form>
</html>
