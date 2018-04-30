<<<<<<< HEAD
<?php
		session_start();
		if(!isset($_SESSION["username"]) && $_SESSION["username"] != "student") {
			echo "Invalid Credentials";
			header("refresh:0;url=../Login/index.php");
		}

		require("../Assets/db-conn.php");
		//$mysqli = new mysqli("localhost","root","","final project");

		//Check if connection is established
			//get all the required parameters from the session
			$sem_id = $_SESSION["sem_id"];
			$sem = $mysqli->real_escape_string($sem_id);

			// $course_id = $_SESSION["course_id"];
			// $course = $mysqli->real_escape_string($course_id);

			$class_id = $_SESSION["class_id"];
			$class = $mysqli->real_escape_string($class_id);

			$batch_id = $_SESSION["batch_id"];
			$batch = $mysqli->real_escape_string($batch_id);

			//write the sql query
			 $sqll = "select * from notice where timee > date_sub(now(),INTERVAL 15 DAY) AND semester_id = '$sem'  AND class_id = '$class' AND batch_id = '$batch'";

//			$sqll = "select * from notice where timee > date_sub(now(),INTERVAL 40 DAY) AND semester_id = 5 AND course_id = 6 AND class_id = 1 AND batch_id = 2";

			$result = $mysqli->query($sqll);

			//Check if the result contains any values by having it greater than 0
			if($result->num_rows > 0)
			{
			   //fetch the values from result set
				while($row = mysqli_fetch_assoc($result))
				{
					$a = $row["description"];
					echo $a;
					echo "<br>";
				}
			}

			else
			{
				echo "<script>alert('No notices for you')</script>";
			}

?>
=======
<?php
	
		//start the session
		session_start();

		require("../Assets/db-conn.php");
		//$mysqli = new mysqli("localhost","root","","final project");

		//Check if connection is established
		if (mysqli_connect_errno())
		{
  			printf("Connection failed: %s\n", mysqli_connect_error());
  		
		}
		else
		{
			//get all the required parameters from the session 
			$sem_id = $_SESSION["sem_id"];
			$sem = mysql_real_escape_string($sem_id);

			$course_id = $_SESSION["course_id"];
			$course = mysql_real_escape_string($course_id);

			$class_id = $_SESSION["class_id"];
			$class = mysql_real_escape_string($class_id);

			$batch_id = $_SESSION["batch_id"];
			$batch = mysql_real_escape_string($batch_id);

			
			//write the sql query	
			// $sqll = "select * from notice where timee > date_sub(now(),INTERVAL 20 DAY) AND semester_id = '$sem' AND course_id = '$course' AND class_id = '$class' AND batch_id = '$batch'";

			$sqll = "select * from notice where timee > date_sub(now(),INTERVAL 40 DAY) AND semester_id = 5 AND course_id = 6 AND class_id = 1 AND batch_id = 2";

			$result = $mysqli->query($sqll);

			//Check if the result contains any values by having it greater than 0
			if($result->num_rows > 0)
			{
			   //fetch the values from result set
				while($row = mysqli_fetch_assoc($result))
				{
					$a = $row["description"];
					echo $a;
					echo "<br>";
				}
			}

			else
			{
				echo "<script>alert('No notices for you')</script>";
			}


		}	//header("refresh:0; url=../addStudentMaster.php");
	

?>
>>>>>>> master
