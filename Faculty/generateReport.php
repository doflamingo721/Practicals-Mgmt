

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="../Assets/css/style.css">
<head>
	<script type="text/javascript" src="../Assets/jquery.min.js"></script>
	<script type="text/javascript" src="ajaxTeacher.js"></script>

	<title></title>
</head>

<?php
	session_start();
	if(isset($_SESSION["username"]) && $_SESSION["username"] == "faculty")
	{
		require("../Assets/db-conn.php");
?>
	<body>
	<form>
	    <label id="stylelabel">Semester :</label>
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
			<label id="stylelabel">Course :</label>&nbsp;&nbsp;
	    	<select name="course" id="course"><option>------- Select Course --------</option></select>

	    	<br>
	    	<label id="stylelabel">Class :</label>&emsp;&nbsp;
	    	<select name="class" id="class"><option>------- Select Class--------</option></select>

	    	<br>
	    	<label id="stylelabel">Batch :</label>&emsp;
	    	<select name="batch" id="batch"><option>------- Select Batch--------</option></select>


	   <br>
	   <input type="button" name="generateReport" id="generateReport" value="Generate Report">

	 </form>

	 <div id="output"></div>

	<?php

		}
		else
		{
			echo "Invalid credentials";
			header("refresh:0;url=../Login/index.php");
		}
	?>

</body>
</html>
