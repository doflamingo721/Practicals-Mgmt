<?php
session_start();
if(isset($_SESSION["username"]) && $_SESSION["username"] == "faculty")
{
	require("../Assets/db-conn.php");
if(isset($_POST['c_id'])) {
	$faculty_id=$_SESSION["faculty_id"];
	 $course_id = $_POST['c_id'];
   $sem_id = $_POST['s_id'];


	$sql = "SELECT DISTINCT class_master.class_id,class_master.class_name
FROM class_master INNER JOIN student_allocation ON class_master.class_id = student_allocation.class_id WHERE student_allocation.sem_id='".$sem_id."' AND student_allocation.faculty_id='".$faculty_id."' AND student_allocation.course_id='".$course_id."'";

  $res = mysqli_query($mysqli, $sql);
  if(mysqli_num_rows($res) > 0) {
    echo "<option value=''>------- Select --------</option>";
    while($row = mysqli_fetch_object($res)) {
      echo "<option value='".$row->class_id."'>".$row->class_name."</option>";
    }
  } else {
		echo "Error in Query";
	}
} else {
<<<<<<< HEAD
  echo "Invalid Credentials";
 header("refresh:0;url=../Login/index.php");
=======
  echo "smdhfg";
 header('location: ./');
>>>>>>> master
}
}
