<?php
	require("../Assets/db-conn.php");

	// Create query to retrieve sem names
	$sql = "SELECT sem_name FROM semester_master ORDER BY sem_name";

	// Obtain result set
	$result = $mysqli->query($sql);

	$i = 1;
?>

<html>
	<link rel="stylesheet" href="../Assets/css/style.css">
<script src="../Assets/allValidations.js">
		</script>
	
	<h3> Semesters Already Created </h3>
	<table>
		<tr>
			<th>Sr No</th>
			<th>Semester Name</th>
		</tr>
		<?php while($row = $result->fetch_assoc()) { ?>
		<tr>
			<td> <?php echo $i; ?></td>
			<td> <?php echo $row["sem_name"]; ?></td>
		</tr>
		<?php  $i++; } ?>
	</table>
	<h3>Add a new Semester</h3>
	<form action="php/addSemesterMaster.php" method="post">
		Enter Semester Name: <input type="text" id="semadd" value="for example :EVEN2017" name="semadd" onchange="validateSemester()" required><br>
		<input type="submit" value="Add Semester">	
	</form>

	<h3>Delete a Semester</h3>
	<form action="php/deleteSemesterMaster.php" method="post">
		Enter Semester Name: <input type="text" id="semdelete" name="semdelete"><br>
		<input type="submit" value="Delete Semester">	
	</form>


	
		
</html>