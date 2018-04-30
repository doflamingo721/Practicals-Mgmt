<<<<<<< HEAD
<?php
session_start();
if(isset($_SESSION["username"]) && $_SESSION["username"] == "faculty")
{
	require("../Assets/db-conn.php");
if(isset($_POST['a_id'])) {
	$faculty_id=$_SESSION["faculty_id"];
	 $sem_id = $_POST["s_id"];
   $course = $_POST["c_id"];
   $class = $_POST["class_id"];
   $batch = $_POST["b_id"];
   $assignment_no = $_POST["a_id"];



  $sqll = "SELECT assignment_submission.enrollment_id , student_master.fname , student_master.lname,CONVERT(assignment_submission.input_file USING utf8) as input_file, assignment_submission.output_image
    FROM assignment_submission
    INNER JOIN student_master ON student_master.enrollment_id = assignment_submission.enrollment_id
    WHERE assignment_submission.sem_id='$sem_id' AND assignment_submission.course_id='$course' AND assignment_submission.class_id='$class' AND assignment_submission.batch_id='$batch' AND assignment_no='$assignment_no' AND assignment_submission.attempted = 0
    ORDER BY submission_date";


  $result = $mysqli->query($sqll);
  if($mysqli->query($sqll) && $result->num_rows > 0)
   {

    echo "<table border='1'>";
    echo "<tr>";
    echo "<td> SR NO </td>";
    echo "<td> Enrollment ID </td>";

    echo "<td> Name </td>";

    echo "<td> Input File </td>";

    echo "<td> Output File </td>";

    echo "<td> Marks </td>";

    echo "<td> Insert Marks </td>";
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
          echo $row['fname'];
          echo $row['lname'];
        echo "</td>";

        echo "<td>";
          echo '<input type="button" name="inputFile" id="inputFile" class="button" onclick="openInputFile(this)" value = "View Input File">';
        echo "</td>";

        echo "<td>";
          echo '<input type="button" name="outputFile" id="outputFile" class="button"  onclick="openOutputFile(this)" value = "View Output File">';
        echo "</td>";

        echo "<td>";
          echo '<input type="text" name="marks" id="marks">';
        echo "</td>";

        echo "<td>";
          echo '<input type="button" name="giveMarks" id="giveMarks" class="button"  value="Submit" onclick="openInsertMarks(this)">';
        echo "</td>";
      echo "</tr>";



  }
  echo "</table>";


  echo "
      <script>
        function openInputFile(input) {
          var enrollmentid = input.parentElement.previousElementSibling.previousElementSibling.innerHTML;
          console.log(enrollmentid);
          var win = window.open('inputFile.php?class_id=".$class."&sem_id=".$sem_id."&course_id=".$course."&batch_id=".$batch."&assignment_no=".$assignment_no."&enrollment_id=' + enrollmentid,
          'inputFile','height=400,width=600');
        }

        function openOutputFile(output) {
          var enrollmentid = output.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.innerHTML;
          console.log(enrollmentid);
          var win = window.open('outputFile.php?class_id=".$class."&sem_id=".$sem_id."&course_id=".$course."&batch_id=".$batch."&assignment_no=".$assignment_no."&enrollment_id=' + enrollmentid,
          'inputFile','height=400,width=600');
        }

        function openInsertMarks(output){
           var enrollmentid = output.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.innerHTML;

           var marks = output.parentElement.previousElementSibling.childNodes[0].value;
          console.log(marks);
          var win = window.open('insertMarks.php?marks=' + marks + '&class_id=".$class."&sem_id=".$sem_id."&course_id=".$course."&batch_id=".$batch."&assignment_no=".$assignment_no."&enrollment_id=' + enrollmentid);
        }
      </script>
      ";

}

  else
  {
     echo "No data found";
  }
} else {
  echo "Error";
 	header("refresh:0;url=index.php");
}
} else {
	echo "Invalid Credentials";
	header("refresh:0;url=../Login/index.php");
}
=======
<?php
session_start();
if($_SESSION["username"] == "faculty")
{
	require("../Assets/db-conn.php");
if(isset($_POST['a_id'])) {
	$faculty_id=$_SESSION["faculty_id"];
	 $sem_id = $_POST["s_id"];
   $course = $_POST["c_id"];
   $class = $_POST["class_id"];
   $batch = $_POST["b_id"];
   $assignment_no = $_POST["a_id"];
   


  $sqll = "SELECT assignment_submission.enrollment_id , student_master.fname , student_master.lname,CONVERT(assignment_submission.input_file USING utf8) as input_file, assignment_submission.output_image 
    FROM assignment_submission 
    INNER JOIN student_master ON student_master.enrollment_id = assignment_submission.enrollment_id  
    WHERE assignment_submission.sem_id='$sem_id' AND assignment_submission.course_id='$course' AND assignment_submission.class_id='$class' AND assignment_submission.batch_id='$batch' AND assignment_no='$assignment_no' 
    ORDER BY submission_date";


  $result = $mysqli->query($sqll);
  if($result->num_rows > 0)
   {

    echo "<table border='1'>";
    echo "<tr>";
    echo "<td> SR NO </td>";
    echo "<td> Enrollment ID </td>";

    echo "<td> Name </td>";

    echo "<td> Input File </td>";

    echo "<td> Output File </td>";

    echo "<td> Marks </td>";

    echo "<td> Insert Marks </td>";
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
          echo $row['fname'];
          echo $row['lname'];
        echo "</td>";

        echo "<td>";
          echo '<input type="button" name="inputFile" id="inputFile" onclick="openInputFile(this)" value = "View Input File">';
        echo "</td>";

        echo "<td>";
          echo '<input type="button" name="outputFile" id="outputFile" onclick="openOutputFile(this)" value = "View Output File">';
        echo "</td>";

        echo "<td>";
          echo '<input type="text" name="marks" id="marks">';
        echo "</td>";

        echo "<td>";
          echo '<input type="button" name="giveMarks" id="giveMarks" value = "Submit">';
        echo "</td>";
      echo "</tr>";

     
      
  }
  echo "</table>";

  echo "
      <script>
        function openInputFile(input) { 
          var enrollmentid = input.parentElement.previousElementSibling.previousElementSibling.innerHTML;
          console.log(enrollmentid);
          var win = window.open('inputFile.php?class_id=".$class."&sem_id=".$sem_id."&course_id=".$course."&batch_id=".$batch."&assignment_no=".$assignment_no."&enrollment_id=' + enrollmentid,
          'inputFile','height=400,width=600');
        }

        function openOutputFile(output) { 
          var enrollmentid = output.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.innerHTML;
          console.log(enrollmentid);
          var win = window.open('outputFile.php?class_id=".$class."&sem_id=".$sem_id."&course_id=".$course."&batch_id=".$batch."&assignment_no=".$assignment_no."&enrollment_id=' + enrollmentid,
          'inputFile','height=400,width=600');
        }
      </script>
      ";

}

  else
  {
     echo "No data found";
  }
} else {
  echo "Error";
 header('location: ./');
}
}
>>>>>>> master
