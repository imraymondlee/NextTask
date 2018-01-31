<?php
	include_once("dbConnection.php");
	$taskID = $_GET['taskID'];

	$tQuery = "DELETE FROM tasks WHERE taskID = '$taskID'";
	$tResult = $conn->query($tQuery);
	header('Location: index.php');
?>