<?php
session_start();
if(isset($_SESSION["username"]) && $_SESSION["username"] == "faculty")
{
	require("../Assets/db-conn.php");
if(isset($_POST['class_id'])) {
	$faculty_id=$_SESSION["faculty_id"];
	 $course_id = $_POST['c_id'];
   $sem_id = $_POST['s_id'];
   $class_id = $_POST['class_id'];



	$sql ="SELECT DISTINCT batch_master.batch_id,batch_master.batch_name
FROM batch_master INNER JOIN student_allocation ON batch_master.batch_id = student_allocation.batch_id WHERE student_allocation.sem_id='".$sem_id."' AND student_allocation.faculty_id='".$faculty_id."' AND student_allocation.course_id='".$course_id."' AND student_allocation.class_id='".$class_id."'";

  $res = mysqli_query($mysqli, $sql);
  if(mysqli_num_rows($res) > 0) {
    echo "<option value=''>------- Select --------</option>";
    while($row = mysqli_fetch_object($res)) {
      echo "<option value='".$row->batch_id."'>".$row->batch_name."</option>";
    }
  } else {
		Echo "Error In Query";
	}
} else {
   echo "Invalid Credentials";
 header("refresh:0;url=../Login/index.php");
}
}
