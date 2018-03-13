<html>
<script src="../Assets/allValidations.js">
</script>
	<!-- add course-->
	<h3>Add a Course</h3>
	<FORM method="POST" action="php/addCourseMaster.php">
	Enter Course Name:<input type="text" id="coursename" name="coursename" onchange="validateCourseName()" required><br>
	Enter Course Code:<input type="text" id="coursecode" name="coursecode" onchange="validateCourseCode()" required><br>
		<input type="checkbox" name="theory" id="theory" checked>Theory<br>
		<input type="checkbox" name="oral" id="oral">Oral<br>
		<input type="checkbox" name="practical" id="practical">Practical<br>
		<input type="checkbox" name="termwork" id="termwork">Term Work<br>
	<input type="submit" value="Add Course" id="submit"><br> 
	</FORM>
	<!--delete course -->
	<h3>Delete a Course</h3>
	<FORM method="POST" action="php/deleteCourseMaster.php">
		Enter Course Code:<input type="text" id="coursecode" name="course_delete"><br>
		<input type="submit" value="Delete Course"><br>
	</FORM>
</html>