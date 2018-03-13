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