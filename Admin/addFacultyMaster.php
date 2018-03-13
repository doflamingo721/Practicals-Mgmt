<?php
	require("../Assets/db-conn.php");

	// Create query to retrieve class names
	$sql = "SELECT username FROM faculty_master ORDER BY username";

	// Obtain result set
	$result = $mysqli->query($sql);

	$i = 1;
?>
<HTML>
	<HEAD>
		<script src="../Assets/allValidations.js">
			

</script>
	</HEAD>
	<BODY>
		<h3> Faculty already added </h3>
		<table>
			<tr>
				<th>Sr No</th>
				<th>Username</th>
			</tr>
			<?php while($row = $result->fetch_assoc()) { ?>
			<tr>
				<td> <?php echo $i; ?></td>
				<td> <?php echo $row["username"]; ?></td>
			</tr>
			<?php  $i++; } ?>
		</table>

		<h3>Add Faculty</h3>
		<FORM name="facultyInfo" method="POST" action="php/addFacultyMaster.php">
			Enter First Name:<input type="text" id="fname" name="fname" onchange="createUsername(),validateFName()" required><br>
			Enter Middle Name:<input type="text" id="mname" name="mname" onchange="createUsername(),validateMName()" required><br>
			Enter Last Name:<input type="text" id="lname" name="lname" onchange="createUsername(),validateLName()" required><br>
			UserName:<input type="text" id="uname" name="uname" readonly="readonly" ><br>
			<input type="submit" value="Add Faculty" id="submit"> 
		</FORM>

		<h3>Remove Faculty</h3>
		<FORM name="facultyInfo" method="POST" action="php/deleteFacultyMaster.php">
			Enter username:<input type="text" name="faculty_delete" id="username">
			<input type="submit" name="submit" value="Delete Faculty">
		</FORM>
	</BODY>
</HTML>