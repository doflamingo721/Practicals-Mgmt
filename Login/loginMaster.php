 <?php

 //start the session
  session_start();

  if($_SERVER['REQUEST_METHOD'] == 'POST')
  {
      //Connection file 
      require("../Assets/db-conn.php");
      $username = $_POST['username'];
      $password = $_POST['password'];
      
      // mysql query here....
      $sql = "SELECT * FROM login WHERE username = '$username' and password = '$password'";

      //Execute the query
      $result = $mysqli->query($sql);

      //Get the number of rows retrived with that username and password
      $count = mysqli_num_rows($result);

      //check if only one row is retrieved because there should be only one entry for a username and password in db
      if($count == 1)
      {
            while($rows = mysqli_fetch_assoc($result))
            {

              //get the access level
              //if access level = 1 then it is admin
              //if access level = 2 then it is faculty
              //if access level = 3 then it is student


                $access_level = $rows["access_level"];


                if($access_level == 1)//it is admin
                {
                    $_SESSION["username"] = "admin";
                    header("location: addAssign.php");
                }

                elseif($access_level == 2)//it is faculty
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
                    	//header("location: ../Faculty/evaluateAssignment.php");
                      header("location: ../Faculty/addNoticeMaster.php");
                	  }
                }

                elseif($access_level == 3)//it is student
                {
                    $_SESSION["username"] = "student";
                    $s1 = "select enrollment_id , sem_id , course_id , class_id , batch_id from student_allocation where enrollment_id = '$username'";
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
  	                  
                  		    header("location: ../Student/showNotices.php");  
               		 	      }
	                  }
		                else
		                {
		                  echo "<script>alert('No data Retrieved')</script>";
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
  

  ?>
  
  
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  Username : <input type="text" name="username" required> <br>
  Password : <input type="password" name="password" required> <br>
  <input type="submit" id="submit" value="Login"/>
  </form>
  </body>
  </html>