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
	$enrollment_id=$_SESSION["enrollment_id"];
	$assignment_no=$_POST['assignment'];
	$date = date('Y-m-d',strtotime("now"));

	// Get the file values to insert
	$file = $_FILES['output_file'];
	$file_name = $file['name'];
	$file_type = $file ['type'];
	$file_size = $file ['size'];

	$input_file = $_FILES['input_file'];
	$input_file_name = $input_file['name'];
	$input_file_type = $input_file['type'];
	$input_file_size = $input_file['size'];
	echo $assignment_no;

	//storing all necessary data into the respective variables.
	$input_file =addslashes(file_get_contents($_FILES['input_file']['tmp_name']));
	$output_file = addslashes(file_get_contents($_FILES['output_file']['tmp_name']));
	
	// Check the input file size
	if($file_name!="" && ($file_type="image/jpg" || $file_type="image/jpeg"||$file_type="image/png"||$file_type="image/gif") &&  ($input_file_type="plain/text" || $input_file_type="plain/html")&& $file_size<=60000 && $input_file_size<=60000)
	{
		//Insert data 
	 // Check if assignment already exists
		$sql = "Select attempted from assignment_submission where assignment_no='".$assignment_no."' and course_id='".$course_id."' and class_id='".$class_id."' and batch_id='".$batch_id."' and enrollment_id='".$enrollment_id."'";

		// Obtain result set
		$result = $mysqli->query($sql);

		$row = $result->fetch_assoc();

		if($row['attempted'])
		{
			echo "<script>alert('Assignment already exists')</script>" ;
			header("refresh:0; url=assignmentUpload.php");
		}
		else
		{
			// Insert student into database
			$sql = "insert into assignment_submission(assignment_no,enrollment_id,sem_id,class_id,course_id,batch_id,input_file,output_image,submission_date,attempted) values('$assignment_no','$enrollment_id','$sem_id','$class_id','$course_id','$batch_id','$input_file','$output_file','$date',1)";

			//Check if query executes successfully
			if($mysqli->query($sql))
			{
				echo "<script>alert('Assignment Added Successfully')</script>" ;
				header("refresh:0; url=assignmentUpload.php");
			}
			else 
			{
				//echo $mysqli->error;
				echo "<script>alert('Assignment could not be added')</script>";
				echo $mysqli->error;
				// header("refresh:0; url=assignmentUpload.php");
			}
		}
	}
	else
	{
		echo "<script>alert('Invalid file')</script>" ;
		header("refresh:0; url=assignmentUpload.php");
	}

}
	


	
?>
