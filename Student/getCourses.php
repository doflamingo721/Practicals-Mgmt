
?>
 <?php 
	session_start();
	if($_SESSION["username"] == "student")
	{
		if(isset($_POST['s_id'])) {
			echo "error";
			require("../Assets/db-conn.php");

			$sem_id = $_POST['s_id'];
			$enrollment_id = $_SESSION['enrollment_id'];

			  $sql = "SELECT course_id FROM student_allocation WHERE sem_id='$sem_id';

			  $result = $mysqli->query($sql);

			  if($result->num_rows > 0) {
			  	echo"<select>";
				    while($row = $result->fetch_assoc()) {
				      echo "<option value='".$row->course_id."'>".$row->course_id."</option>";
		    	}
		    	echo"</select>"
		    	else
		    	{
		    		echo "error";
		    		header('location: assignmentUpload.php');
		    	}
  			}
  		}
  		else
  		{
  			echo "error else";
  		}
  	}
} else {
  echo "Invalid credentials";
}
?> -->