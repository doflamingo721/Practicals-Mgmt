<?php
session_start();
if($_SESSION["username"] == "student")
{
	require("../Assets/db-conn.php");
if(isset($_POST['s_id'])) {
	$enrollment_id=$_SESSION["enrollment_id"];
	 $sem_id = $_POST['s_id'];


	$sql = "SELECT course_master.course_id,course_master.course_name
FROM course_master INNER JOIN student_allocation ON course_master.course_id=student_allocation.course_id WHERE student_allocation.sem_id='".$sem_id."' AND student_allocation.enrollment_id='".$enrollment_id."'";

  $res = mysqli_query($mysqli, $sql);
  if(mysqli_num_rows($res) > 0) {
    echo "<option value=''>------- Select --------</option>";
    while($row = mysqli_fetch_object($res)) {
      echo "<option value='".$row->course_id."'>".$row->course_name."</option>";
    }
  }
} else {
 header('location: ./');
}
}
