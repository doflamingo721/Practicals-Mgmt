<?php
session_start();
if($_SESSION["username"] == "faculty")
{
	require("../Assets/db-conn.php");
if(isset($_POST['s_id'])) {
	$faculty_id=$_SESSION["faculty_id"];
	 $sem_id = $_POST['s_id'];


	$sql = "SELECT DISTINCT course_master.course_id,course_master.course_name
FROM course_master INNER JOIN student_allocation ON course_master.course_id=student_allocation.course_id WHERE student_allocation.sem_id='".$sem_id."' AND student_allocation.faculty_id='".$faculty_id."'";

  $res = mysqli_query($mysqli, $sql);
  if(mysqli_num_rows($res) > 0) {
    echo "<option value=''>------- Select --------</option>";
    while($row = mysqli_fetch_object($res))
     {
      echo "<option value='".$row->course_id."'>".$row->course_name."</option>";
    }
  }
  else
  {
     echo "errrdhfgjsjhgfha";
  }
} else {
  echo "errrrrrrrrrrrrrrrrrrrrrrrrrrr";
  echo $mysqli->error;
 header('location: ./');
}
}
