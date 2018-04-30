<?php
	session_start();
	if(!isset($_SESSION["username"]) && $_SESSION["username"] != "admin") {
		echo "Invalid Credentials";
		header("refresh:0;url=../Login/index.php");
	}
	
	require("../Assets/db-conn.php");

	// Create query to retrieve class names
	$sql = "SELECT username FROM faculty_master ORDER BY username";

	// Obtain result set
	$result = $mysqli->query($sql);

	$i = 1;
?>
<HTML>
	<link rel="stylesheet" href="../Assets/css/style.css">
	<HEAD>
		<script src="../Assets/allValidations.js">

</script>


	</HEAD>
	<BODY>
		<h3> Faculty List </h3>
		<table>
			<tr>
				<th>Sr No</th>
				<th>Username</th>
			</tr>
			<?php while($row = $result->fetch_assoc()) { ?>
			<tr>
			<td> <?php echo $i; ?></td>
				<td> <?php echo $row["username"];
					echo "<script>
						users.push('".$row['username']."');
					</script>";
				 ?></td>
			</tr>
			<?php  $i++; } ?>
		</table>

		<h3>Add Faculty</h3>
		<FORM name="facultyInfo" method="POST" action="php/addFacultyMaster.php">
			<label id="stylelabel">Enter First Name:</label>&emsp;
			<input type="text" id="fname" name="fname" onchange="createUsername(),validateFName()" required><br>
				<label id="stylelabel">Enter Middle Name:</label>
			<input type="text" id="mname" name="mname" onchange="createUsername(),validateMName()" required><br>
				<label id="stylelabel">Enter Last Name:</label>&emsp;
			<input type="text" id="lname" name="lname" onchange="createUsername(),validateLName()" required><br>
				<label id="stylelabel">UserName:</label>&emsp;&emsp;&emsp;&nbsp;&nbsp;
				<input type="text" id="uname" name="uname" readonly="readonly" ><br>
			<input type="submit" value="Add Faculty" id="submit">
		</FORM>

		<h3>Remove Faculty</h3>
		<FORM name="facultyInfo" method="POST" action="php/deleteFacultyMaster.php">
			<label id="stylelabel">Enter username:</label>&emsp;&nbsp;
			<input type="text" name="faculty_delete" id="username"><br>
			<input type="submit" name="submit" value="Delete Faculty">
		</FORM>
	</BODY>

	<script>
		console.log(users);
	</script>
</HTML>
