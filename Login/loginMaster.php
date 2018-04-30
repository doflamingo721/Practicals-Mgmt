<?php
  session_start();
  if($_SERVER['REQUEST_METHOD'] == 'POST')
  {
        require("../Assets/db-conn.php");
        $username = $_POST['username'];
        $password = $_POST['password'];
        // mysql connect function here....
        // mysql query here....
        $sql = "SELECT * FROM login WHERE username = '$username' and password = '$password'";

        $result = $mysqli->query($sql);
        $count = mysqli_num_rows($result);

        if($count == 1)
        {
              while($rows = mysqli_fetch_assoc($result))
              {
                  $access_level = $rows["access_level"];
                  if($access_level == 1)
                  {
                      $_SESSION["username"] = "admin";
                      header("location: addAssign.php");
                  }

                  elseif($access_level == 2)
                  {
                      $_SESSION["username"] = "faculty";
                      $s1 = "select faculty_id from faculty_master where username = '$username'";
                      $rs = $mysqli->query($s1);
                      if($rs->num_rows > 0)
                      {
	                      while($row = mysqli_fetch_assoc($rs))
	                      {
	            
	                      	$_SESSION["faculty_id"] = $row["faculty_id"];
	                  	  }
                      	header("location: ../Faculty/addAssignmentMaster.php");
                  	  }
                  	}

                  elseif($access_level == 3)
                  {
                      $_SESSION["username"] = "student";
                      $s1 = "select enrollment_id,sem_id , course_id , class_id , batch_id from student_allocation where enrollment_id = '$username'";
                      $rs = $mysqli->query($s1);
                      if($rs->num_rows > 0)
                      {
	                      while($row = mysqli_fetch_assoc($rs))
	                      {
	                      $_SESSION["enrollment_id"] = $row["enrollment_id"];
	                      $_SESSION["sem_id"] = $row["sem_id"];
	                      $_SESSION["course_id"] = $row["course_id"];
	                      $_SESSION["class_id"] = $row["class_id"];
	                      $_SESSION["batch_id"] = $row["batch_id"];

	                      $a = $_SESSION["sem_id"];
	                  
                		header("location: ../Student/assignmentUpload.php");
             		 	  }
		              }
		              else
		              {
		                echo "<script>alert('errrroorrr')</script>";
		              }
          		  }
        	}
    }

    else
    {
        echo "<script>alert('Username or Password Incorrect')</script>";
        //header("refresh:0 ; url=login_master.php");
    }
  }


    // $result = mysql_query($sql);
    // $count = mysql_num_rows($result);

    // if($count == 1) {
    //   session_register(username);
    //   session_register(password);
    //   header('location: addAssign.php');
    // }
    // else {
    //   $error = "Invalid Username or Password Please Try Again";
    


  ?>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  Username : <input type="text" name="username">
  Password : <input type="password" name="password">
  <input type="submit" />
  </form>
