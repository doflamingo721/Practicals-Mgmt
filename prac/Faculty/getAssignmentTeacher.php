<?php
session_start();
if($_SESSION["username"] == "faculty")
{
	require("../Assets/db-conn.php");
if(isset($_POST['b_id'])) {
	// $enrollment_id=$_SESSION["enrollment_id"];
	 $course_id = $_POST['c_id'];
   $sem_id = $_POST['s_id'];
   $class_id = $_POST['class_id'];
   $batch_id = $_POST['b_id'];


	$sql ="SELECT DISTINCT assignment_no FROM assignments WHERE sem_id='".$sem_id."' AND course_id='".$course_id."' AND class_id='".$class_id."' AND batch_id='".$batch_id."'";
  $res = mysqli_query($mysqli, $sql);
  if(mysqli_num_rows($res) > 0) {
    echo "<option value=''>------- Select --------</option>";
    while($row = mysqli_fetch_object($res)) {
      echo "<option value='".$row->assignment_no."'>".$row->assignment_no."</option>";
    }
  }


  else
  {
    echo "djfnldsjnfjdl";
  }
} else {
  echo "rjhgfjhg";
 header('location: ./');
}
}
