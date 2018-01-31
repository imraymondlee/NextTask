<?php
include("header.php");
?>

	<div class="grid-container side_menu_offset">


		<div class="grid-x grid-margin-x">
			<div class="large-12 cell">
				<h1>New Customer</h1>
			</div>

		</div>


		<div class="grid-x grid-margin-x">
			<div class="large-12 cell">
				<form action = "" method="post">
					<div class = "grid-x grid-margin-x">
						<div class = "medium-6 cell">
							<label><strong>Customer</strong>
								<input type="text" name = "customer">
							</label>

							<label><strong>Address</strong>
								<input type="text" name = "address">
							</label>

							<label><strong>Phone Number</strong>
								<input type="text" name = "number">
							</label>

						</div>
						<div class = "medium-6 cell">
							<label><strong>Notes</strong>
								<textarea name = "notes" class = "profile_notebox"></textarea>
							</label>
						</div>
					</div>

					<div class = "button-center">
						<input type = "submit" name = "submit" value = "Create Customer" class = "primary button">
					</div>
				</form>
			</div>
		</div>

	</div>


<?php
if(isset($_POST['submit'])){
	$name = $_POST["customer"];
	$address = $_POST["address"];
	$number = $_POST["number"];
	$notes = $_POST["notes"];


	$query = "INSERT INTO customers (customerID, name, address, number, notes) VALUES ($conn->insert_id, '$name', '$address', '$number', '$notes')";
	if ($conn->query($query) === TRUE) {
		echo "<h4>New customer created.</h4>";
?>
		<script>location.href = 'customers.php';</script>
<?php		
	} else {
		echo "Error: " . $query . "<br>" . $conn->error;
	}

}
?>

<?php
include("footer.php");
?>