<?php
include("header.php");

$taskID = $_GET['taskID'];
$tQuery = "SELECT * FROM tasks WHERE taskID = '$taskID'";
$tResult = $conn->query($tQuery);
$tRow = $tResult->fetch_assoc();

$task = $tRow['task'];



?>

<div class="grid-container side_menu_offset">


	<div class="grid-x grid-margin-x">
		<div class="large-12 cell button-center">
			<h1>Are you sure you want to remove: <?php echo $task; ?>?</h1>
			<a href ="task-info.php?taskID=<?php echo $taskID; ?>" class = 'primary button'>Go Back</a>
			<a href ="remove-task.php?taskID=<?php echo $taskID; ?>" class = 'delete button'>Remove Task</a>
		</div>

	</div>











</div>




<?php
include("footer.php");
?>