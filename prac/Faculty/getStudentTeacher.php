<?php
session_start();
if($_SESSION["username"] == "faculty")
{
	require("../Assets/db-conn.php");
if(isset($_POST['a_id'])) {
	$faculty_id=$_SESSION["faculty_id"];
	 $sem_id = $_POST['s_id'];
   $course = $_POST["c_id"];
   $class = $_POST["class_id"];
   $batch = $_POST["b_id"];


	$sql = "SELECT enrollment_id FROM student_allocation where sem_id = '$sem_id' AND course_id = '$course' AND class_id = '$class' AND batch_id = '$batch'";

  $res = mysqli_query($mysqli, $sql);
  if(mysqli_num_rows($res) > 0) {
    echo "<option value=''>------- Select --------</option>";
    while($row = mysqli_fetch_object($res)) {
      echo "<option value='".$row->enrollment_id."'>".$row->enrollment_id."</option>";
    }
  }
  else
  {
     echo "errrdhfgjsa";
  }
} else {
  echo "errr";
 header('location: ./');
}
}
