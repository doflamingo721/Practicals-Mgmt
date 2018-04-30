// Add Assignment

<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="jquery.min.js"></script>
	<script type="text/javascript" src="ajaxTeacher.js"></script>


	
	
	<title></title>
</head>
<?php
	session_start();
	if($_SESSION["username"] == "faculty")
	{
		require("../Assets/db-conn.php");
?>
	<body>
	<form action="insertAssignment.php" method="POST">
	    <label>Semester :</label>
	    <select name="semester" id="semester">
	      <option>------- Select semester--------</option>
	<?php 
	      $sql = "SELECT * FROM semester_master";

			// Obtain result set
			$result = $mysqli->query($sql);

			if($result->num_rows > 0)
			{
				while($row = $result->fetch_assoc())
				{

				   echo "<option value='$row[sem_id]'>$row[sem_name]</option>";
				}		
			}
			else
			{
				echo "no entries found";
			}  
	?>
			</select>
			<br>
			<label>Course :</label>
	    	<select name="course" id="course"><option>------- Select Course --------</option></select>
	    	<br>
	    	<label>Class :</label>
	    	<select name="class" id="class"><option>------- Select Class--------</option></select>

	    	<br>
	    	<label>Batch :</label>
	    	<select name="batch" id="batch"><option>------- Select Batch--------</option></select>

	    	<br>
	    	<label>Assignment No :</label>
	    	<input type="text" name="assignment_no" id="assignment_no" value="">

	    	<br>
	    	<label>Question :  </label>
	    	<textarea rows="2" cols="40" name="question" id="question"></textarea>

	    	<br>
	    	<label>Description :</label>
	    	<textarea rows="2" cols="40" name="description" id="description"></textarea>

	    	<br>
	    	<label>Start date : </label>
	    	<input type="date" name="start_date" value="">

	    	<br>
	    	<label>End date : </label>
	    	<input type="date" name="end_date" value="">

	    	<br>
	    	<input type="submit" name="submit" value="submit">
	    	<input type="reset" name="reset" value="reset">



	<?php  
			
		}
		else
		{
			echo "Invalid credentials";
		}
	?>

</form>
</body>
</html>