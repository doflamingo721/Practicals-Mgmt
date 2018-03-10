<?php

  require("../Assets/db-conn.php");

  $classSQL = "SELECT * from class_master ORDER BY class_name";
  $batchSQL = "SELECT * from batch_master";
  $courseSQL = "SELECT course_id, course_name from course_master";
  $semSQL = "SELECT * from semester_master";
  $facultySQL = "SELECT faculty_id, fname, lname from faculty_master";

  $classResult = $mysqli->query($classSQL);
  $batchResult = $mysqli->query($batchSQL);
  $courseResult = $mysqli->query($courseSQL);
  $semResult = $mysqli->query($semSQL);
  $facultyResult = $mysqli->query($facultySQL);

?>

<html>
  <form action="php/allocation.php" method="post">
    <select name ="class">
      <?php while($row = $classResult->fetch_assoc()) { ?>
        <option value = "<?php echo $row["class_id"]; ?>"> <?php echo $row["class_name"];?></option>
      <?php } ?>
    </select>

    <select name ="batch">
      <?php while($row = $batchResult->fetch_assoc()) { ?>
        <option value = "<?php echo $row["batch_id"]; ?>"> <?php echo $row["batch_name"];?></option>
      <?php } ?>
    </select>

    <select name ="course">
      <?php while($row = $courseResult->fetch_assoc()) { ?>
        <option value = "<?php echo $row["course_id"]; ?>"> <?php echo $row["course_name"];?></option>
      <?php } ?>
    </select>

    <select name ="semester">
      <?php while($row = $semResult->fetch_assoc()) { ?>
        <option value = "<?php echo $row["sem_id"]; ?>"> <?php echo $row["sem_name"];?></option>
      <?php } ?>
    </select>

    <select name ="faculty">
      <?php while($row = $facultyResult->fetch_assoc()) { ?>
        <option value = "<?php echo $row["faculty_id"]; ?>"> <?php echo $row["fname"]." ".$row["lname"]; ?></option>
      <?php } ?>
    </select>

    <br>

    <input type="text" id="startenrollmentno" name="startenrollmentno">

    <input type="text" id="endenrollmentno" name="endenrollmentno">

    <br>

    <input type="submit">
  </form>
</html>
