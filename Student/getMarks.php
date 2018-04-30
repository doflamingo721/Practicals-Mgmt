<?php
session_start();
if(isset($_SESSION["username"]) && $_SESSION["username"] == "student")
{
	require("../Assets/db-conn.php");
if(isset($_POST['s_id'])) {
	$enrollment=$_SESSION["enrollment_id"];
  // echo $enrollment;

	 $sem_id = $_POST["s_id"];
   $course = $_POST["c_id"];
   $class = $_POST["class_id"];
   $batch = $_POST["b_id"];


$sql = "Select assignment_no from assignment_submission where enrollment_id='$enrollment' and sem_id='$sem_id' and course_id='$course' and class_id='$class' and batch_id='$batch' ";

$result = $mysqli->query($sql);

  if($result->num_rows > 0) {
    echo "<table border='1'>";
          echo "<tr>";
          echo "<td> Assignment No </td>";
          echo "<td> Marks </td>";
          echo "</tr>";
      while($row = $result->fetch_assoc()) {

        $assignment_no=$row['assignment_no'];
        // echo $assignment_no;

        $sqll = "Select submission_id from assignment_submission where assignment_no='$assignment_no' and enrollment_id='$enrollment' and sem_id='$sem_id' and course_id='$course' and class_id='$class' and batch_id='$batch' ";

        $result2 = $mysqli->query($sqll);

         if($result2->num_rows > 0) {

          
           while($row2 = $result2->fetch_assoc()) {
            $submission_id=$row2['submission_id'];
            // echo $submission_id;

            $sql2 = "Select marks from assignment_marks where submission_id='$submission_id' and enrollment_id='$enrollment' ";

             $result3 = $mysqli->query($sql2);

              if($result3->num_rows > 0) {
                
           while($row3 = $result3->fetch_assoc()) {
              $marks=$row3['marks'];
              // echo $marks;

              
              
              echo "<tr>";
               echo "<td>";
               echo $assignment_no;
               echo "</td>";
               echo "<td>";
               echo $row3['marks'];
              echo "</td>";

              echo "</tr>";

          }
         }
         
      }
    }

}

}
else
 {
          echo"No data found";
 }
} else {
  echo "Error";
 	header("refresh:0;url=index.php");
}
} else {
	echo "Invalid Credentials";
	header("refresh:0;url=../Login/index.php");
}
