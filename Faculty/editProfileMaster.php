<?php
  session_start();
  if($_SERVER['REQUEST_METHOD'] == 'POST')
  { 
        require("../Assets/db-conn.php");

        //get the values entered
        $username = $_POST['username'];
        $oldpassword = $_POST['oldpassword'];
        $newpassword = $_POST['newpassword'];
        $confirmnewpassword = $_POST['confirmnewpassword'];
        // mysql connect function here....
        // mysql query here....
        $sql = "SELECT * FROM login WHERE username = '$username' and password = '$oldpassword'";

        //Execute the query
        $result = $mysqli->query($sql);

        //Get the number of rows retrived 
        $count = mysqli_num_rows($result);

        //if that login id exists in the db
        if($count > 0)
        {

            //Check if new password entered twice matches
            if($newpassword === $confirmnewpassword)
            {
              $s1 = "update login set password = '$confirmnewpassword' where username = '$username'";
              $rs = $mysqli->query($s1);
              echo "<script>alert('Password changed successfully')</script>";
				header("refresh:0; url=../index.php#editProfileMaster");

            }
            else
            {
              echo "<script>alert('The new password does not match')</script>";
				header("refresh:0; url=../index.php#editProfileMaster");
            }
        }
        else
        {
                echo "<script>alert('Invalid old password')</script>";
			header("refresh:0; url=../index.php#editProfileMaster");
        }
      
   } 
  


  ?>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	  <label id="stylelabel">Enter your Username : </label>&nbsp;
	  <input type="text" name="username" ><br>
  <label id="stylelabel">Enter old Password : </label>&emsp;&nbsp;
	  <input type="password" name="oldpassword"><br>
  <label id="stylelabel">Enter new password : </label>&emsp;
	  <input type="password" name="newpassword"><br>
  <label id="stylelabel">Confirm new password :</label>
	  <input type="password" name="confirmnewpassword"><br>
  <input type="submit" value="CHANGE" />
  </form>