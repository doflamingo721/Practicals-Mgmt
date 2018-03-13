<?php
session_start();
if($_SESSION["username"] == "faculty")
{
	require("../Assets/db-conn.php");
if(isset($_POST['a_id'])) {
	$faculty_id=$_SESSION["faculty_id"];
	 $sem_id = $_POST['s_id'];
   $course = $_POST["c_id"];
   $class = $_POST["class_id"];
   $batch = $_POST["b_id"];
   $enrollment_id = $_POST['e_id'];


	$sql = "SELECT input_file FROM assignment_submission where sem_id = '$sem_id' AND course_id = '$course' AND class_id = '$class' AND batch_id = '$batch' AND enrollment_id = 1506066";

  $res = mysqli_query($mysqli, $sql);
  if(mysqli_num_rows($res) > 0)
   {





//       $result=mysqli_fetch_array($res);
// echo '<img src="data:image/jpeg;base64,'.base64_encode( $result['input_file'] ).'"/>';


    // echo "<option value=''>------- Select --------</option>";
    while($row = mysqli_fetch_array($res))
    {
      $fileName = $row['input_file'];
      //header("content-disposition: inline; filename=$fileName");
            echo '<img width="900" height="900" src="data:image/jpeg;base64,'.base64_encode( $row['input_file'] ).'"/>';
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
