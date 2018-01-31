<?php
include("header.php");
?>

	<div class="grid-container side_menu_offset">
		<div class="grid-x grid-margin-x">
			<div class="small-6 cell">
				<h1>Tasks</h1>
			</div>
			<div class="small-6 cell">
				<a href ="new-task.php" class = 'primary small button table-button'>New Task</a>
			</div>
		</div>

		<div class="grid-x grid-margin-x">
			<table class = "stack">
				<thead>
					<tr>
						<th>Task</th>
						<th>Date</th>
						<th>Customer</th>
						<th>Address</th>
						<th></th>
					</tr>
				</thead>
				<tbody>

					<?php
					$query = "SELECT * FROM tasks WHERE completed LIKE false ORDER BY visitDate ASC";
					$result = $conn->query($query);


					if ($result->num_rows > 0) {
						?>


							<?php
							while($row = $result->fetch_assoc()) {
								$customerID = $row["customerID"];
								$taskID = $row["taskID"];
								$task = $row["task"];
								$visitDate = $row["visitDate"];

								$cQuery = "SELECT * FROM customers WHERE customerID LIKE '$customerID'";
								$cResult = $conn->query($cQuery);
								$cRow = $cResult->fetch_assoc();

								$address = $cRow["address"];
								$name = $cRow["name"];


								echo "<tr>";
								echo "<td><a href='task-info.php?taskID=".$taskID."'>".$task."</td>";
								echo "<td>".$visitDate."</td>";
								echo "<td><a href='profile.php?customerID=".$customerID."'>".$name."</a></td>";
								echo "<td>".$address."</td>";
								echo "<td><a href = 'completed.php?taskID=".$taskID."' class = 'completed small button'>Completed</a> <a href ='renew.php?taskID=".$taskID."' class = 'renew small button'>Renew</a></td>";
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