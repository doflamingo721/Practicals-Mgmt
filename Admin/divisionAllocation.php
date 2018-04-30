<?php
	session_start();
  if(!isset($_SESSION["username"]) && $_SESSION["username"] != "admin") {
    echo "Invalid Credentials";
    header("refresh:0;url=../Login/index.php");
  }

  require("../Assets/db-conn.php");

  $classSQL = "SELECT * from class_master ORDER BY class_name";
  $batchSQL = "SELECT * from batch_master";
  $courseSQL = "SELECT course_id, course_code from course_master";
  $courseNameSQL = "SELECT course_id,course_name from course_master";
  $semSQL = "SELECT * from semester_master";
  $facultySQL = "SELECT faculty_id, fname, lname from faculty_master";

  $classResult = $mysqli->query($classSQL);
  $batchResult = $mysqli->query($batchSQL);
  $courseResult = $mysqli->query($courseSQL);
  $courseNameResult = $mysqli->query($courseNameSQL);
  $semResult = $mysqli->query($semSQL);
  $facultyResult = $mysqli->query($facultySQL);

?>

<html>
	<link rel="stylesheet" href="../Assets/css/style.css">
  <form action="php/allocation.php" method="post">
   <label id="stylelabel"> Select Class:</label>&emsp;&emsp;&emsp;&nbsp;
	  <select name ="class">
      <?php while($row = $classResult->fetch_assoc()) { ?>
        <option value = "<?php echo $row["class_id"]; ?>"> <?php echo $row["class_name"];?></option>
      <?php } ?>
    </select>
    <br>
    <label id="stylelabel">Select Batch:</label>&emsp;&emsp;&emsp;&nbsp;
	  <select name ="batch">
      <?php while($row = $batchResult->fetch_assoc()) { ?>
        <option value = "<?php echo $row["batch_id"]; ?>"> <?php echo $row["batch_name"];?></option>
      <?php } ?>
    </select>
<br>
    <!-- <label id="stylelabel">Select Course:</label>
	  &emsp;&emsp;&nbsp;&nbsp;
	  <select name ="course">
      <//?php while($row = $courseResult->fetch_assoc()) { ?>
        <option value = "<//?php echo $row["course_id"]; ?>"> <?php echo $row["course_code"];?></option>
      <//?php } ?>
    </select> -->
<br>
    <label id="stylelabel">Select Course </label>&emsp;&emsp;&nbsp;&nbsp;
	  <select name ="course">
      <?php while($row = $courseNameResult->fetch_assoc()) { ?>
        <option value = "<?php echo $row["course_id"]; ?>"> <?php echo $row["course_name"];?></option>
      <?php } ?>
    </select>
<br>
    <label id="stylelabel">Select Semester:</label>
	  &emsp;&nbsp;&nbsp;
	  <select name ="semester">
      <?php while($row = $semResult->fetch_assoc()) { ?>
        <option value = "<?php echo $row["sem_id"]; ?>"> <?php echo $row["sem_name"];?></option>
      <?php } ?>
    </select>
<br>
		<label id="stylelabel">Select Faculty:</label>
	  &emsp;&emsp;&nbsp;
	  <select name ="faculty">
      <?php while($row = $facultyResult->fetch_assoc()) { ?>
        <option value = "<?php echo $row["faculty_id"]; ?>"> <?php echo $row["fname"]." ".$row["lname"]; ?></option>
      <?php } ?>
    </select>

    <br>

	  <label id="stylelabel">Enrollment number:</label>&nbsp;
		 <input type="text" id="startenrollmentno" name="startenrollmentno">To

    <input type="text" id="endenrollmentno" name="endenrollmentno"><br>

    <br>

    <input type="submit">
  </form>
</html>
