<?php
include("header.php");

$customerID = $_GET['customerID'];

$cQuery = "SELECT * FROM customers WHERE customerID = '$customerID'";
$cResult = $conn->query($cQuery);
$cRow = $cResult->fetch_assoc();

$name = $cRow['name'];
$address = $cRow['address'];
$number = $cRow['number'];
$notes = $cRow['notes'];


$tQuery = "SELECT * FROM tasks WHERE customerID LIKE '$customerID' AND completed LIKE false ORDER BY visitDate ASC";
$tResult = $conn->query($tQuery);
$tRow = $tResult->fetch_assoc();

$taskID = $tRow['taskID'];
$visitDate = $tRow['visitDate'];



?>

<div class="grid-container side_menu_offset">


	<div class="grid-x grid-margin-x">
		<div class="large-12 cell">
			<h1><?php echo $name; ?></h1>
		</div>
	</div>

	<div class="grid-x grid-margin-x">
		<div class="medium-4 cell">
			<p><strong>Address:</strong> <?php echo $address; ?></p>
			<p><strong>Phone Number:</strong> <?php echo $number; ?></p>
			<p><strong>Next Visit:</strong> <a href = "task-info.php?taskID=<?php echo $taskID; ?>"><?php echo $visitDate; ?></a></p>
		</div>

		<div class="medium-8 cell">
			<p style = "margin-bottom: 0;"><strong>Notes:</strong></p>
			<p><?php echo $notes; ?></p>
		</div>


	</div>
	<hr>
	<div class="grid-x grid-margin-x">
		<div class="large-12 cell">
			<h3>Edit Customer</h3>
		</div>

	</div>


	<?php
	if(isset($_POST['submit'])){
		$name = $_POST["name"];
		$address = $_POST["address"];
		$number = $_POST["number"];
		$notes = $_POST["notes"];

		$query = "UPDATE customers SET name = '$name', address = '$address', number = '$number', notes = '$notes' WHERE customerID = '$customerID'";
		if ($conn->query($query) === TRUE) {
			echo "<h4>Customer information updated.</h4>";
			echo "<script>location.href = 'profile.php?customerID=".$customerID."';</script>";

		} else {
			echo "Error: " . $query . "<br>" . $conn->error;
		}

	}
	?>


	<div class="grid-x grid-margin-x">
		<div class="large-12 cell">
			<form action = "" method = "post">
				<div class = "grid-x grid-margin-x">
					<div class = "medium-6 cell">
						<label><strong>Customer</strong>
							<input name = "name" type="text" value="<?php echo $name; ?>">
						</label>

						<label><strong>Address</strong>
							<input name = "address" type="text" value="<?php echo $address; ?>">
						</label>

						<label><strong>Phone Number</strong>
							<input name = "number" type="text" value="<?php echo $number; ?>">
						</label>

					</div>
					<div class = "medium-6 cell">
						<label><strong>Notes</strong>
							<textarea name = "notes" class = "profile_notebox" ><?php echo $notes; ?></textarea>
						</label>
					</div>
				</div>

				<div class = "button-center">
					<a href ="remove-customer-confirm.php?customerID=<?php echo $customerID; ?>" class = 'delete button'>Remove Customer</a>
					<input type = "submit" name = "submit" value = "Make Changes" class = "primary button">
				</div>
			</form>
		</div>

	</div>



	<hr>
	<div class="grid-x grid-margin-x">
		<div class="large-12 cell">
			<h3>Task History</h3>
		</div>

		<div class="large-12 cell">
			<table>
				<thead>
					<tr>
						<th>Date</th>
						<th>Task</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$query = "SELECT * FROM tasks WHERE customerID LIKE $customerID AND completed LIKE true ORDER BY visitDate ASC";
					$result = $conn->query($query);


					if ($result->num_rows > 0) {
						?>


						<?php
						while($row = $result->fetch_assoc()) {
							$taskID = $row["taskID"];
							$task = $row["task"];
							$visitDate = $row["visitDate"];


							echo "<tr>";
							echo "<td><a href='task-info.php?taskID=".$taskID."'>".$visitDate."</td>";
							echo "<td>".$task."</td>";
							echo "</tr>";
						}
						?>
						<?php 
					}
					?>



				</tbody>
			</table>
		</div>
	</div>






</div>




<?php
include("footer.php");
?>