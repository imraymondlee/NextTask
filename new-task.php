<?php
include("header.php");
?>

<div class="grid-container side_menu_offset">


	<div class="grid-x grid-margin-x">
		<div class="large-12 cell">
			<h1>New Task</h1>
		</div>

	</div>



	<div class="grid-x grid-margin-x">
		<div class="large-12 cell">
			<form action = "" method="post">
				<div class = "grid-x grid-margin-x">
					<div class = "medium-6 cell">
						<label><strong>Task Name</strong>
							<input type="text" name = "task">
						</label>

						<label><strong>Date</strong>
							<input type="date" name = "visitDate">
						</label>

						<label><strong>Customer</strong>
							<div class="grid-x grid-margin-x">
								<div class="large-6 cell">
									<select name="customer">

										<?php
											$cQuery = "SELECT * FROM customers";
											$cResult = $conn->query($cQuery);


											while($cRow = $cResult->fetch_assoc()) {
												echo "<option value='$cRow[customerID]'>".$cRow['name']." (".$cRow['address'].")</option>";
											}
										?>


									</select>
								</div>
								<div class="large-6 cell adjust_primary">
									<div class = "or">or</div>
									<a href = "new-customer.php" class = 'primary button'>New Customer</a>
								</div>
							</div>
						</label>

						<label><strong>Frequency (days)</strong>
							<input type="number" name = "frequency">
						</label>
					</div>
					<div class = "medium-6 cell">
						<label><strong>Notes</strong>
							<textarea name = "notes" class = "task_notebox"></textarea>
						</label>
					</div>
				</div>
				<div class = "button-center">
					<input type = "submit" name = "submit" value = "Create Task" class = "primary button">
				</div>
			</form>
		</div>
	</div>



</div>


<?php
if(isset($_POST['submit'])){
	$task = $_POST["task"];
	$visitDate = $_POST["visitDate"];
	$customerID = $_POST["customer"];
	$frequency = $_POST["frequency"];
	$notes = $_POST["notes"];


	$query = "INSERT INTO tasks (taskID, customerID, task, visitDate, frequency, notes, completed) VALUES ($conn->insert_id, '$customerID', '$task', '$visitDate', '$frequency', '$notes', 'false')";
	if ($conn->query($query) === TRUE) {
		echo "<h4>New task created.</h4>";
?>
		<script>location.href = 'index.php';</script>
<?php
	} else {
		echo "Error: " . $query . "<br>" . $conn->error;
	}

}
?>

<?php
include("footer.php");
?>