<?php
session_start();
if(isset($_SESSION["username"]) && $_SESSION["username"] == "faculty")
{
	require("../Assets/db-conn.php");

   if(isset($_POST['b_id'])) {
	 $faculty_id=$_SESSION["faculty_id"];
	 $sem_id = $_POST["s_id"];
   $course_id = $_POST["c_id"];
   $class_id = $_POST["class_id"];
   $batch_id = $_POST["b_id"];

	 $sql = "SELECT assignment_marks.enrollment_id, assignment_marks.marks, assignment_submission.assignment_no, student_master.fname, student_master.lname
	 FROM assignment_marks
	 INNER JOIN student_master ON assignment_marks.enrollment_id = student_master.enrollment_id
	 INNER JOIN assignment_submission ON assignment_marks.submission_id = assignment_submission.submission_id
	 WHERE assignment_submission.attempted = 1 AND assignment_submission.sem_id = '$sem_id' AND assignment_submission.class_id = '$class_id' AND assignment_submission.course_id = '$course_id' AND assignment_submission.batch_id = '$batch_id'";

	 $result = $mysqli->query($sql);
	 if($result && $result->num_rows > 0) {

	 echo "<table border='1'>";
    echo "<tr>";
    echo "<td> SR NO </td>";
    echo "<td> Enrollment ID </td>";

    echo "<td> Name </td>";

    echo "<td> Assignment No </td>";

    echo "<td> Marks </td>";

    echo "</tr>";

    $i = 0;

   while($row = $result->fetch_assoc())
    {
      $i++;
      echo "<tr>";
        echo "<td>";
          echo $i;
        echo "</td>";

        echo "<td>";
          echo $row['enrollment_id'];
        echo "</td>";

        echo "<td>";
          echo $row['fname']." ";
          echo $row['lname'];
        echo "</td>";

        echo "<td>";
          echo $row['assignment_no'];
        echo "</td>";

        echo "<td>";
          echo $row['marks'];
        echo "</td>";
  }
		 
	  echo "</table>";

	} else {
		echo "No Data Found";
		//header("refresh:0;url=index.php");
	}

} else {
  echo "Error";
 	header("refresh:0;url=index.php");
}
} else {
	echo "Invalid Credentials";
	header("refresh:0;url=../Login/index.php");
}


//query
// SELECT assignment_marks.enrollment_id, assignment_marks.marks, assignment_submission.assignment_no, student_master.fname, student_master.lname
// FROM assignment_marks
// INNER JOIN student_master ON assignment_marks.enrollment_id = student_master.enrollment_id
// INNER JOIN assignment_submission ON assignment_marks.submission_id = assignment_submission.submission_id
// WHERE assignment_submission.attempted = 1 AND assignment_submission.sem_id = 1 AND assignment_submission.class_id = 11 AND assignment_submission.course_id = 4 AND assignment_submission.batch_id = 3;
