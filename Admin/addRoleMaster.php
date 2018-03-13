<?php
	require("../Assets/db-conn.php");

	// Create query to retrieve class names
	$sql = "SELECT username FROM role_master ORDER BY username";

	// Obtain result set
	$result = $mysqli->query($sql);

	$i = 1;
?>
<HTML>
	<BODY>
	<script src="../Assets/allValidations.js">
	
	</script>
		<h3> Role Master already added </h3>
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

		<h3>Add a Role Master</h3>
		<FORM action="php/addRoleMaster.php" method="POST">
			Enter First Name:<input type="text" id="fname" name="fname" value="" onchange="validateFName()" required><br>
			Enter Middle Name:<input type="text" id="mname" name="mname" value="" onchange="validateMName()" required><br>
			Enter Last Name:<input type="text" id="lname" name="lname" value="" onchange="validateLName()" required><br>
			Enter Username:<input type="text" id="uname" name="uname" onchange="validateUName()" required><br>
			Enter Password:<input type="password" id="password" name="password" required><br>
			<input type="submit" value="Add Admin" id="submit"> 
		</FORM>
		<h3>Remove a Role Master</h3>
		<FORM action="php/deleteRoleMaster.php" method="POST" name="deleteRoleMaster">
			Enter Username:<input type="text" id="username" name="uname" onchange="validateDeleteName()" required><br>
			Enter Password:<input type="text" id="password" name="password" onchange="validateDeletePassword()" required><br>
			<input type="submit" name="submit" value="Delete Admin">
		</FORM>
	</BODY>
</HTML>