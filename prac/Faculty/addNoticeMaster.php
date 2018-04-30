

<!DOCTYPE html>
<html>
	<head>
	
		<script type="text/javascript" src="jquery.min.js"></script>
		<script type="text/javascript" src="ajaxTeacher.js"></script>	

	</head>
	<?php

		session_start();
		if($_SESSION["username"] == "faculty")
		{
			require("../Assets/db-conn.php");

	?>

	<body>
		<form action="addNoticePHP.php" method="POST" >
	    <label>Semester :</label>
	    <select name="semester" id="semester">
	      <option>------- Select semester--------</option>

	<?php 
	      $sql = "SELECT * FROM semester_master";

			// Obtain result set
			$result = $mysqli->query($sql);

			echo $_SESSION["faculty_id"];

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
	    	Notice : <textarea rows="10" cols="50" name="notice" id="notice"></textarea>
	 

	    	<br>
	    	<br>
	    	<input type="submit" name="submit" value="Add Notice">
		    <input type="reset" name="reset" value="reset">

		</form>


		<?php  
				
			}
			else
			{
				echo "Invalid credentials";
			}
		?>

    
	</body>
</html>