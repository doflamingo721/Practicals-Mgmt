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

                //header("location: showNotices.php");
            }
            else
            {
              echo "<script>alert('The new password does not match')</script>";
            }
        }
        else
        {
                echo "<script>alert('Invalid old password')</script>";
        }
      
   } 
  


  ?>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  Enter your Username : <input type="text" name="username" >
  Enter old Password : <input type="password" name="oldpassword">
  Enter new password : <input type="password" name="newpassword">
  Confirm new password : <input type="password" name="confirmnewpassword">
  <input type="submit" value="CHANGE" />
  </form>