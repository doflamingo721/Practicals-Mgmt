<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../Assets/css/style.css">
	<script type="text/javascript" src="../Assets/jquery.min.js"></script>
	<script type="text/javascript" src="ajax.js"></script>
	<script type="text/javascript" src="../Assets/allValidations.js"></script>
	<title></title>
</head>
<?php
	session_start();

	if(!isset($_SESSION["username"]) && $_SESSION["username"] != "student") {
		echo "Invalid Credentials";
		header("refresh:0;url=../Login/index.php");
	}

	require("../Assets/db-conn.php");
?>
	<body>
	<form action="insertAssignment.php" method="POST" enctype="multipart/form-data">
    <label id="stylelabel">Semester :</label>&emsp;&nbsp;&nbsp;
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
			echo "No Entries Found";
		}
?>
		</select>
		<br>
		<label id="stylelabel">Course :</label>&emsp;&emsp;&nbsp;
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
    	<label id="stylelabel">Assignment Title:  </label><br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
    	<textarea rows="2" cols="40" name="question" id="question" readonly></textarea>

    	<br>
    	<label id="stylelabel">Description :</label><br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
    	<textarea rows="2" cols="50" name="description" id="description" readonly></textarea>

    	<br>
    	<label  id="stylelabel">Upload program file : </label>
    	<input type="file" name="input_file" value="input_file" id="input_file" accept=".txt" onchange="validateInputFile()">
    	<br>&emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;
    	<input type="text" id="ihidden" value="" style="border-color:red; display:none" hidden>
    	<br>
    	<label  id="stylelabel">Upload output file : </label>
    	<input type="file" name="output_file" value="output_file" id="output_file" accept=".jpg,.jpeg" onchange="validateOutputFile()">
    	<br>&emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;
    	<input type="text" id="ohidden" value="" style="border-color:red; display:none" hidden>
    	<br>
    	<input type="submit" name="submit" value="submit">
	    <input type="reset" name="reset" value="reset">

  </div>
</body>
</html>
