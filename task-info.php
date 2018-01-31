<?php
include("header.php");

$taskID = $_GET['taskID'];
$tQuery = "SELECT * FROM tasks WHERE taskID = '$taskID'";
$tResult = $conn->query($tQuery);
$tRow = $tResult->fetch_assoc();

$task = $tRow['task'];
$visitDate = $tRow['visitDate'];
$frequency = $tRow['frequency'];
$notes = $tRow['notes'];
$customerID = $tRow['customerID'];

$cQuery = "SELECT * FROM customers WHERE customerID = '$customerID'";
$cResult = $conn->query($cQuery);
$cRow = $cResult->fetch_assoc();

$name = $cRow['name'];
$address = $cRow['address'];
$number = $cRow['number'];

?>

<div class="grid-container side_menu_offset">


	<div class="grid-x grid-margin-x">
		<div class="large-12 cell">
			<h1><?php echo $task; ?></h1>
		</div>
	</div>

	<div class="grid-x grid-margin-x">
		<div class="medium-4 cell">
			<p><strong><?php echo $visitDate; ?></strong></p>
			<p><strong>Name:</strong> <a href ="profile.php?customerID=<?php echo $customerID; ?>"><?php echo $name; ?></a></p>
			<p><strong>Address:</strong> <?php echo $address; ?></p>
			<p><strong>Phone Number:</strong> <?php echo $number; ?></p>
			<p><strong>Renewal Frequency:</strong> <?php echo $frequency ?> days</p>
		</div>

		<div class="medium-8 cell">
			<p style = "margin-bottom: 0;"><strong>Notes:</strong></p>
			<p><?php echo $notes; ?></p>
		</div>


	</div>
	<hr>
	<div class="grid-x grid-margin-x">
		<div class="large-12 cell">
			<h3>Edit Task</h3>
		</div>

	</div>

	<?php
	if(isset($_POST['submit'])){
		$task = $_POST["task"];
		$visitDate = $_POST["visitDate"];
		$customerID = $_POST["customer"];
		$frequency = $_POST["frequency"];
		$notes = $_POST["notes"];

		$query = "UPDATE tasks SET customerID = '$customerID', task = '$task', visitDate = '$visitDate', frequency = '$frequency', notes = '$notes' WHERE taskID = '$taskID'";
		if ($conn->query($query) === TRUE) {
			echo "<h4>Task updated.</h4>";
			echo "<script>location.href = 'task-info.php?taskID=".$taskID."';</script>";
		} else {
			echo "Error: " . $query . "<br>" . $conn->error;
		}

	}
	?>


	<div class="grid-x grid-margin-x">
		<div class="large-12 cell">
			<form action = "" method="post">
				<div class = "grid-x grid-margin-x">
					<div class = "medium-6 cell">
						<label><strong>Task Name</strong>
							<input name = "task" type="text" value="<?php echo $task; ?>">
						</label>

						<label><strong>Date</strong>
							<input name = "visitDate" type="date" value="<?php echo $visitDate; ?>">
						</label>

						<label><strong>Customer</strong>
							<select name="customer">
								<?php
								$cQuery = "SELECT * FROM customers";
								$cResult = $conn->query($cQuery);


								while($cRow = $cResult->fetch_assoc()) {
									echo "<option value='$cRow[customerID]'>".$cRow['name']." (".$cRow['address'].")</option>";
								}
								?>
							</select>
						</label>

						<label><strong>Frequency (days)</strong>
							<input name = "frequency" type="number" value="<?php echo $frequency; ?>">
						</label>
					</div>
					<div class = "medium-6 cell">
						<label><strong>Notes</strong>
							<textarea name = "notes" class = "task_notebox"><?php echo $notes; ?></textarea>
						</label>
					</div>
				</div>
				<div class = "button-center">
					<a href ="remove-task-confirm.php?taskID=<?php echo $taskID; ?>" class = 'delete button'>Remove Task</a>
					<input type = "submit" name = "submit" value = "Make Changes" class = "primary button">
				</div>




			</form>



		</div>


	</div>

</div>




<?php
include("footer.php");
?>