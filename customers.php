<?php
include("header.php");
?>



	<div class="grid-container side_menu_offset">
		<div class="grid-x grid-margin-x">
			<div class="small-6 cell">
				<h1>Customers</h1>
			</div>
			<div class="small-6 cell">
				<a href ="new-customer.php" class = 'primary small button table-button'>New Customer</a>
			</div>
		</div>
		<div class="grid-x grid-margin-x">
			<table class = "stack">
				<thead>
					<tr>
						<th>Customer</th>
						<th>Address</th>
						<th>Phone Number</th>
						<th>Next Visit</th>
					</tr>
				</thead>
				<tbody>


					<?php
					$query = "SELECT * FROM customers";
					$result = $conn->query($query);


					if ($result->num_rows > 0) {
						?>
							<?php
							while($row = $result->fetch_assoc()) {
								$customerID = $row["customerID"];
								$name = $row["name"];
								$address = $row["address"];
								$number = $row["number"];


								$tQuery = "SELECT * FROM tasks WHERE customerID LIKE '$customerID' AND completed LIKE false ORDER BY visitDate ASC";
								$tResult = $conn->query($tQuery);
								$tRow = $tResult->fetch_assoc();

								$taskID = $tRow["taskID"];
								$visitDate = $tRow["visitDate"];


								echo "<tr>";
								echo "<td><a href='profile.php?customerID=".$customerID."'>".$name."</a></td>";
								echo "<td>".$address."</td>";
								echo "<td>".$number."</td>";
								echo "<td><a href='task-info.php?taskID=".$taskID."'>".$visitDate."</td>";
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


<?php
include("footer.php");
?>