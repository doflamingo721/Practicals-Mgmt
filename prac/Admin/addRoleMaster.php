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
			Enter First Name:<input type="text" id="fname" name="fname"><br>
			Enter Middle Name:<input type="text" id="mname" name="mname"><br>
			Enter Last Name:<input type="text" id="lastname" name="lname"><br>
			Enter Username:<input type="text" id="username" name="uname"><br>
			Enter Password:<input type="text" id="password" name="password"><br>
			<input type="submit" value="submit"> 
		</FORM>
		<h3>Remove a Role Master</h3>
		<FORM action="php/deleteRoleMaster.php" method="POST">
			Enter Username:<input type="text" id="username" name="uname"><br>
			Enter Password:<input type="text" id="password" name="password"><br>
			<input type="submit" name="submit">
		</FORM>
	</BODY>
</HTML>