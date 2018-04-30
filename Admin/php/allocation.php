<?php
session_start();
if(!isset($_SESSION["username"]) && $_SESSION["username"] != "admin") {
  echo "Invalid Credentials";
  header("refresh:0;url=../Login/index.php");
}

if($_SERVER["REQUEST_METHOD"] == "POST") {

  require("../../Assets/db-conn.php");

  $class = $_POST["class"];
  $batch = $_POST["batch"];
  $semester = $_POST["semester"];
  $course = $_POST["course"];
  $faculty = $_POST["faculty"];

  $startingEnroll = $_POST["startenrollmentno"];
  $endingEnroll = $_POST["endenrollmentno"];

  //Before this ensure that $startingEnroll and $endingEnroll are realistic and in database or not

  while($startingEnroll <= $endingEnroll) {
    $sql = "INSERT into student_allocation(enrollment_id,class_id,sem_id,course_id,faculty_id,batch_id) VALUES
            ('$startingEnroll','$class','$semester','$course','$faculty','$batch')";
    if($mysqli->query($sql)) {
      header("refresh:0;url=../index.php#divisionAllocation");
    }else {
      echo "Error while adding ".$startingEnroll."<br>";
    }
    $startingEnroll++;
  }

}else {
  echo "Error Occured";
}

?>
