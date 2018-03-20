<?php
/*session_start();
if($_SESSION["username"] == "faculty")
{
	require("../Assets/db-conn.php");
if(isset($_POST['a_id'])) {
	$faculty_id=$_SESSION["faculty_id"];
	 $sem_id = $_POST['s_id'];
   $course = $_POST["c_id"];
   $class = $_POST["class_id"];
   $batch = $_POST["b_id"];
   $enrollment_id = $_POST['enrollment_id'];


	$sql = "SELECT output_image FROM assignment_submission where sem_id = '$sem_id' AND course_id = '$course' AND class_id = '$class' AND batch_id = '$batch' AND enrollment_id = '$enrollment_id'";

  $res = mysqli_query($mysqli, $sql);
  if(mysqli_num_rows($res) > 0)
   {
    echo "<option value=''>------- Select --------</option>";
    while($row = mysqli_fetch_object($res))
     {
      echo $row['output_image'];
    }
  }
  else
  {
     echo "errrdhfgjsa";
  }
} else {
  echo "errr";
 header('location: ./');
}
}*/






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
   $enrollment_id = $_POST["e_id"];


  // $sql = "SELECT CONVERT(input_file USING utf8) FROM assignment_submission where sem_id = '$sem_id' AND course_id = '$course' AND class_id = '$class' AND batch_id = '$batch' AND enrollment_id = '$enrollment_id'";


$sql = "SELECT output_image  FROM assignment_submission where sem_id = '$sem_id' AND course_id = '$course' AND class_id = '$class' AND batch_id = '$batch' AND enrollment_id = '$enrollment_id'";

  $res = mysqli_query($mysqli, $sql);
  if(mysqli_num_rows($res) > 0)
   {

      // $result=mysqli_fetch_array($res);
      // echo '<img src="data:image/jpeg;base64,'.base64_encode( $result['output_image'] ).'"/>';


    // echo "<option value=''>------- Select --------</option>";
    while($row = mysqli_fetch_array($res))
    {

      //$file_contents = $mysqli->escape_string($row[0]);
      echo "
        <script>
        var win = window.open('','Input File','height=400,width=600');
        // win.document.write('"<img src="data:image/jpeg;base64,'.base64_encode( $result['output_image'] ).'"/>"');
         win.document.write('$row["output_image"]');
        </script>
      ";
    }


  // $array = mysqli_fetch_row($res);

  //   echo json_encode($array);


  }
  else
  {
     echo "errrdhfgjsa";
  }
} else {
  echo "errr";
 header('location: ./');
}
}







