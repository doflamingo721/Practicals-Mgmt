

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
	    <label id="stylelabel">Semester :</label>&emsp;&nbsp;
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
			<label id="stylelabel">Course :</label>&emsp;&emsp;
	    	<select name="course" id="course"><option>------- Select Course --------</option></select>

	    	<br>
	    	<label id="stylelabel">Class :</label>&emsp;&emsp;&nbsp;&nbsp;&nbsp;
	    	<select name="class" id="class"><option>------- Select Class--------</option></select>

	    	<br>
	    	<label id="stylelabel">Batch :</label>&emsp;&emsp;&nbsp;&nbsp;
	    	<select name="batch" id="batch"><option>------- Select Batch--------</option></select>

	    	<br>
    	<label id="stylelabel">Assignment :</label>
    	<select name="assignment" id="assignment"><option>------- Select Assignment --------</option></select>

    	<br>
    	<label id="stylelabel">Question :  </label><br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
    	<textarea rows="2" cols="40" name="question" id="question" readonly></textarea>

    	<br>
    	<label id="stylelabel">Description :</label><br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
    	<textarea rows="2" cols="40" name="description" id="description" readonly></textarea>

	   <br>
	   <input type="button" name="b1" id="b1" value="See marks">

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
