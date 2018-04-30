

<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="jquery.min.js"></script>
	<script type="text/javascript" src="ajaxTeacher2.js"></script>


	
	
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
    	<label>Assignment :</label>
    	<select name="assignment" id="assignment"><option>------- Select Assignment --------</option></select>

    	<br>
    	<label>Question :  </label>
    	<textarea rows="2" cols="40" name="question" id="question" readonly></textarea>

    	<br>
    	<label>Description :</label>
    	<textarea rows="2" cols="40" name="description" id="description" readonly></textarea>

	   <br>
	   <input type="button" name="b1" id="b1" value="See marks">


	<?php  
			
		}
		else
		{
			echo "Invalid credentials";
		}
	?>

</form>

<div id="output"></div>

</body>
</html>