<?php
include_once("dbConnection.php");
$taskID = $_GET['taskID'];


$tQuery = "SELECT * FROM tasks WHERE taskID = '$taskID'";
$tResult = $conn->query($tQuery);
$tRow = $tResult->fetch_assoc();

$task = $tRow['task'];
$visitDate = $tRow['visitDate'];

$frequency = $tRow['frequency'];

$visitDate = date('Y-m-d', strtotime($visitDate. ' + '.$frequency.' days'));

$notes = $tRow['notes'];
$customerID = $tRow['customerID'];

$rQuery = "INSERT INTO tasks (taskID, customerID, task, visitDate, frequency, notes, completed) VALUES ($conn->insert_id, '$customerID', '$task', '$visitDate', '$frequency', '$notes', 'false')";
if ($conn->query($rQuery) === TRUE) {
	echo "New record created successfully";
} else {
	echo "Error: " . $rQuery . "<br>" . $conn->error;
}

$tcQuery = "UPDATE tasks SET completed = true WHERE taskID = '$taskID'";
$tcRow = $conn->query($tcQuery);

	header('Location: index.php');
?>