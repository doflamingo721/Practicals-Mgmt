

<!DOCTYPE html>
<html>
<<<<<<< HEAD
	<link rel="stylesheet" href="../Assets/css/style.css">
	<head>

		<script type="text/javascript" src="../Assets/jquery.min.js"></script>
		<script type="text/javascript" src="ajaxTeacher.js"></script>

	</head>
	<?php
		session_start();
		if(isset($_SESSION["username"]) && $_SESSION["username"] == "faculty")
=======
	<head>
	
		<script type="text/javascript" src="jquery.min.js"></script>
		<script type="text/javascript" src="ajaxTeacher.js"></script>	

	</head>
	<?php

		session_start();
		if($_SESSION["username"] == "faculty")
>>>>>>> master
		{
			require("../Assets/db-conn.php");

	?>

	<body>
		<form action="addNoticePHP.php" method="POST" >
<<<<<<< HEAD
	    <label id="stylelabel">Semester :</label>
	    <select name="semester" id="semester">
	      <option>------- Select semester--------</option>

	<?php
=======
	    <label>Semester :</label>
	    <select name="semester" id="semester">
	      <option>------- Select semester--------</option>

	<?php 
>>>>>>> master
	      $sql = "SELECT * FROM semester_master";

			// Obtain result set
			$result = $mysqli->query($sql);

			echo $_SESSION["faculty_id"];

			if($result->num_rows > 0)
			{
				while($row = $result->fetch_assoc())
				{
				   echo "<option value='$row[sem_id]'>$row[sem_name]</option>";
<<<<<<< HEAD
				}
=======
				}		
>>>>>>> master
			}
			else
			{
				echo "no entries found";
<<<<<<< HEAD
			}
=======
			}  
>>>>>>> master
	?>
			</select>

			<br>
<<<<<<< HEAD
			<label id="stylelabel">Course :</label>&nbsp;&nbsp;&nbsp;
	    	<select name="course" id="course"><option>------- Select Course --------</option></select>

	    	<br>
	    	<label id="stylelabel">Class :</label>&emsp;&nbsp;
	    	<select name="class" id="class"><option>------- Select Class--------</option></select>

	    	<br>
	    	<label id="stylelabel">Batch :</label>&emsp;&nbsp;
	    	<select name="batch" id="batch"><option>------- Select Batch--------</option></select>


	    	<br>
			<label id="stylelabel">Notice : </label><br>&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;
				<textarea   name="notice" id="notice" resizeable="noresize"></textarea>

=======
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
	 
>>>>>>> master

	    	<br>
	    	<br>
	    	<input type="submit" name="submit" value="Add Notice">
		    <input type="reset" name="reset" value="reset">

		</form>


<<<<<<< HEAD
		<?php

			}
			else
			{
				echo "Invalid Credentials";
				header("refresh:0;url=../Login/index.php");
			}
		?>


	</body>
</html>
=======
		<?php  
				
			}
			else
			{
				echo "Invalid credentials";
			}
		?>

    
	</body>
</html>
>>>>>>> master
