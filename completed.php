<?php
	include_once("dbConnection.php");
	$taskID = $_GET['taskID'];

	$tQuery = "UPDATE tasks SET completed = true WHERE taskID = '$taskID'";
	$tResult = $conn->query($tQuery);
	header('Location: index.php');
?>