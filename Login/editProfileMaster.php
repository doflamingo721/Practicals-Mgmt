<?php
  session_start();
  if($_SERVER['REQUEST_METHOD'] == 'POST')
  { 
        $mysqli = new mysqli("localhost","root","","final project");
        $username = $_POST['username'];
        $oldpassword = $_POST['oldpassword'];
        $newpassword = $_POST['newpassword'];
        $confirmnewpassword = $_POST['confirmnewpassword'];
        // mysql connect function here....
        // mysql query here....
        $sql = "SELECT * FROM login WHERE username = '$username' and password = '$oldpassword'";

        $result = $mysqli->query($sql);
        $count = mysqli_num_rows($result);

        if($count > 0)
        {
            if($newpassword === $confirmnewpassword)
            {
              $s1 = "update login set password = '$confirmnewpassword' where username = '$username'";
              $rs = $mysqli->query($s1);
              echo "<script>alert('Password changed successfully')</script>";

                //header("location: showNotices.php");
            }
            else
            {
              echo "<script>alert('the new password does not matches')</script>";
            }
        }
        else
        {
                echo "<script>alert('Invalid old password')</script>";
        }
      
   } 
  

    // else
    // {
    //     echo "<script>alert('Username or Password Incorrect')</script>";
    //     //header("refresh:0 ; url=login_master.php");
    // }
  


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
  Enter your Username : <input type="text" name="username">
  Enter old Password : <input type="password" name="oldpassword">
  Enter new password : <input type="password" name="newpassword">
  Confirm new password : <input type="password" name="confirmnewpassword">
  <input type="submit" value="CHANGE" />
  </form>