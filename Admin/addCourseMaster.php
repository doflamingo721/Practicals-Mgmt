<html>
	<!-- add course-->
	<h3>Add a Course</h3>
	<FORM method="POST" action="php/addCourseMaster.php">
	Enter Course Name:<input type="text" id="coursename" name="coursename"><br>
	Enter Course Code:<input type="text" id="coursecode" name="coursecode"><br>
		<input type="checkbox" name="theory" id="theory">Theory<br>
		<input type="checkbox" name="oral" id="oral">Oral<br>
		<input type="checkbox" name="practical" id="practical">Practical<br>
		<input type="checkbox" name="termwork" id="termwork">Term Work<br>
	<input type="submit" value="submit"><br> 
	</FORM>
	<!--delete course -->
	<h3>Delete a Course</h3>
	<FORM method="POST" action="php/deleteCourseMaster.php">
		Enter Course Code:<input type="text" id="coursecode" name="course_delete"><br>
		<input type="submit" value="submit"><br>
	</FORM>
</html>