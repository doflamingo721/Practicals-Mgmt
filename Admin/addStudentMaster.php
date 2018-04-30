<<<<<<< HEAD
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
=======
<html>
<script src="../Assets/allValidations.js">

</script>
	<h3>Add a Student</h3>
	<form method="post" action="php/addStudentMaster.php">
		Enter Enrollment Number:<input type="text" id="enrollmentid" name="enrollmentid" onchange="validateEnrollNo()" required>
		<br>
		Enter First Name:<input type="text" id="fname" name="fname" onchange="validateFName()" required><br>
		Enter Last Name:<input type="text" id="lname" name="lname" onchange="validateLName()" required><br>
		<input type="submit" value="Add Student" id="submit"><br><br>
 	</form>

 	<h3>Delete a Student</h3>
 	<form method="post" action="php/deleteStudentMaster.php" name="deleteStudentMaster"> 
 		Enter Enrollment Number:<input type="text" id="enrollmentid" name="enrollment_delete" value="" onchange="validateDeleteStudent()" required>
 		<input type="submit" name="submit" value="Delete Student" >
 	</form>
</html>
>>>>>>> master
