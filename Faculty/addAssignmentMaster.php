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
	<form action="insertAssignment.php" method="POST">
	    <label id="stylelabel">Semester :</label>&emsp;&emsp;&nbsp;&nbsp;
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
			<label id="stylelabel">Course :</label>&emsp;&emsp;&emsp;&nbsp;
	    	<select name="course" id="course"><option>------- Select Course --------</option></select>
	    	<br>
	    	<label id="stylelabel">Class :</label>&emsp;&emsp;&emsp;&emsp;
	    	<select name="class" id="class"><option>------- Select Class--------</option></select>

	    	<br>
	    	<label id="stylelabel">Batch :</label>&emsp;&emsp;&emsp;&emsp;
	    	<select name="batch" id="batch"><option>------- Select Batch--------</option></select>

	    	<br>
	    	<label id="stylelabel">Assignment No :</label>
	    	<input type="text" name="assignment_no" id="assignment_no" value="">

	    	<br>
	    	<label id="stylelabel">Question :  </label><br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;
	    	<textarea rows="2" cols="40" name="question" id="question"></textarea>

	    	<br>
	    	<label>Description :</label><br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;
	    	<textarea rows="2" cols="40" name="description" id="description"></textarea>

	    	<br>
	    	<label id="stylelabel">Start date : </label>
	    	<input type="date" name="start_date" value="">

	    	<br>
	    	<label id="stylelabel">End date : </label>
	    	<input type="date" name="end_date" value="">

	    	<br><br>
	    	<input type="submit" name="submit" value="submit">
	    	<input type="reset" name="reset" value="reset">



	<?php

		}
		else
		{
			echo "Invalid credentials";
			header("refresh:0;url=../Login/index.php");
		}
	?>

</form>
</body>
</html>
