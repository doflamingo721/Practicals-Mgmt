<?php
	require("../Assets/db-conn.php");

	// Create query to retrieve class names
	$sql = "SELECT batch_name FROM batch_master ORDER BY batch_name";

	// Obtain result set
	$result = $mysqli->query($sql);

	$i = 1;
?>

<HTML>
	<BODY>
		<h3> Batch Already Created </h3>
		<table>
			<tr>
				<th>Sr No</th>
				<th>Batch Name</th>
			</tr>
			<?php while($row = $result->fetch_assoc()) { ?>
			<tr>
				<td> <?php echo $i; ?></td>
				<td> <?php echo $row["batch_name"]; ?></td>
			</tr>
			<?php  $i++; } ?>
		</table>
		<h3>Add Batch</h3>
		<FORM action="php/addBatchMaster.php" method="post">
			Add batch:<input type="text" name="batch" id="batch">
				<input type="submit" value="Add Batch" >	
		</FORM>
		<h3>Delete Batch</h3>
		<FORM action="php/deleteBatchMaster.php" method="post">
			Batch:<input type="text" name="batch" id="batch">
				<input type="submit" value="Delete Batch">	
		</FORM>

	</BODY>
</HTML>