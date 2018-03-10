<?php
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	require("../Assets/db-conn.php");

	// Get the values to insert
	$sem_id=$_POST['semester'];
	$course_id=$_POST['course'];
	$class_id=$_POST['class'];
	$batch_id=$_POST['batch'];
	$faculty_id=$_SESSION["faculty_id"];
	$assignment_no=$_POST['assignment_no'];
	$question=$_POST['question'];
	$description=$_POST['description'];
	$start_date=$_POST['start_date'];
	$end_date=$_POST['end_date'];

	$start = date('Y-m-d',strtotime($start_date));
	$end = date('Y-m-d',strtotime($last_date));

	//Insert data 
	 // Check if assignment already exists
		$sql = "Select assignment_no from assignments where assignment_no='".$assignment_no."' and course_id='".$course_id."' and class_id='".$class_id."' and batch_id='".$batch_id."' and faculty_id='".$faculty_id."'";

		// Obtain result set
		$result = $mysqli->query($sql);

		if($result->num_rows > 0)
		{
			echo "<script>alert('Assignment already exists')</script>" ;
			header("refresh:0; url=addAssignmentMaster.php");
		}
		else
		{
			// Insert student into database
			$sql = "insert into assignments(assignment_no,question,description,sem_id,course_id,class_id,faculty_id,batch_id,start_date,end_date) values('$assignment_no','$question','$description','$sem_id','$course_id','$class_id','$faculty_id','$batch_id','$start','$end')";

			//Check if query executes successfully
			if($mysqli->query($sql))
			{
				echo "<script>alert('Assignment Added Successfully')</script>" ;
				header("refresh:0; url=addAssignmentMaster.php");
			}
			else 
			{
				//echo $mysqli->error;
				// echo "<script>alert('Assignment could not be added')</script>" ;
				header("refresh:0; url=addAssignmentMaster.php");
			}
		}
}
?>