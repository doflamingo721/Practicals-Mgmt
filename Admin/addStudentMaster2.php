<html>

<?php
	session_start();
if(!isset($_SESSION["username"]) && $_SESSION["username"] != "admin") {
	echo "Invalid Credentials";
	header("refresh:0;url=../Login/index.php");
}
?>

<body>
<form method='POST' enctype='multipart/form-data' action="php/addStudentMaster2.php">
Upload CSV FILE: <input type='file' name='csv_data' /> <input type='submit' name='submit' value='Upload File' />
</form>
</body>
</html>
