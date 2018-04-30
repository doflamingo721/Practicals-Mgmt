<html>
<link rel="stylesheet" href="../Assets/css/style.css">
<?php
	session_start();
if(!isset($_SESSION["username"]) && $_SESSION["username"] != "admin") {
	echo "Invalid Credentials";
	header("refresh:0;url=../Login/index.php");
}
?>

<script src="../Assets/allValidations.js">
</script>
	<!-- add course-->
	<h3>Add a Course</h3>
	<FORM method="POST" action="php/addCourseMaster.php">
		<label id="stylelabel">Enter Course Name:</label>
		<input type="text" id="coursename" name="coursename" onchange="validateCourseName()" required><br>
		<label id="stylelabel">Enter Course Code:</label>&nbsp;
		<input type="text" id="coursecode" name="coursecode" onchange="validateCourseCode()" required><br><br>
		<table cellspacing="10">
			
			<th>&nbsp;<label>Evaluation Scheme :</label></th>
			<th> &nbsp;<label>Teaching Scheme :</label></th>
			<tr>
				
				<td>
				<input type="checkbox" name="theory" id="theory" checked>Theory<br>
				<input type="checkbox" name="oral" id="oral">Oral<br>
				<input type="checkbox" name="practical" id="practical">Practical<br>
				<input type="checkbox" name="termwork" id="termwork">Term Work<br><br> 
				</td>
				
				
				<td>
				<input type="checkbox" name="Theory" id="theory" checked>Theory<br>
				<input type="checkbox" name="Practical" id="practical">Practical<br>
				<input type="checkbox" name="Termwork" id="termwork">Tutorial<br><br> 	
				</td>
			</tr>
		<table>
	<input type="submit" value="Add Course" id="submit"><br> 
	</FORM>
	<!--delete course -->
	<h3>Delete a Course</h3>
	<FORM method="POST" action="php/deleteCourseMaster.php">
		<label id="stylelabel">Enter Course Code:</label>
		<input type="text" id="coursecode" name="course_delete"><br>
		<input type="submit" value="Delete Course"><br>
	</FORM>
</html>
