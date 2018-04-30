<<<<<<< HEAD
<?php
session_start();
if(isset($_SESSION["username"]) && $_SESSION["username"] == "faculty")
{
	require("../Assets/db-conn.php");
if(isset($_POST['a_id'])) {
	  $course_id = $_POST['c_id'];
   $sem_id = $_POST['s_id'];
   $class_id = $_POST['class_id'];
   $batch_id = $_POST['b_id'];
   $assignment_no = $_POST['a_id'];


	$sql = "SELECT DISTINCT description FROM assignments WHERE sem_id='".$sem_id."' AND course_id='".$course_id."' AND class_id='".$class_id."' AND batch_id='".$batch_id."' AND assignment_no='".$assignment_no."'";

  $res = mysqli_query($mysqli, $sql);
  if(mysqli_num_rows($res) > 0)
  {
    while($row = mysqli_fetch_object($res))
    {
      echo $row->description;
    }
  }
  else
  {
     echo "Error In Query";
  }
} else {
 header("refresh:0;url=../Login/index.php");
}
}
=======
<?php
session_start();
if($_SESSION["username"] == "faculty")
{
	require("../Assets/db-conn.php");
if(isset($_POST['a_id'])) {
	  $course_id = $_POST['c_id'];
   $sem_id = $_POST['s_id'];
   $class_id = $_POST['class_id'];
   $batch_id = $_POST['b_id'];
   $assignment_no = $_POST['a_id'];


	$sql = "SELECT DISTINCT description FROM assignments WHERE sem_id='".$sem_id."' AND course_id='".$course_id."' AND class_id='".$class_id."' AND batch_id='".$batch_id."' AND assignment_no='".$assignment_no."'";

  $res = mysqli_query($mysqli, $sql);
  if(mysqli_num_rows($res) > 0) 
  {
    while($row = mysqli_fetch_object($res)) 
    {
      echo $row->description;
    }
  }



  // $sqll = "SELECT assignment_submission.enrollment_id , student_master.fname , student_master.lname FROM assignment_submission INNER JOIN student_master ON student_master.enrollment_id = assignment_submission.enrollment_id  WHERE assignment_submission.sem_id='".$sem_id."' AND assignment_submission.course_id='".$course_id."' AND assignment_submission.class_id='".$class_id."' AND assignment_submission.batch_id='".$batch_id."' AND assignment_submission.assignment_no='".$assignment_no."'";



  else
  {
     echo "errrdhfgjsa";
  }




} else {
 header('location: ./');
}
}
>>>>>>> master
