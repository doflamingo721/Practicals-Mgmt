<?php

if(isset($_SESSION["username"])) {
  if($_SESSION["username"] == "admin") header("refresh:0;url=../Admin/index.php");
  if($_SESSION["username"] == "faculty") header("refresh:0;url=../Faculty/index.php");
  if($_SESSION["username"] == "student") header("refresh:0;url=../Student/index.php");
} else {
  header("refresh:0;url=./Login/");
}

?>
