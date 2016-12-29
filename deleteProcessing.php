<?php
	include_once("dbConnection.php");
	$taskID = $_GET['taskID'];

	$taskQuery = "DELETE FROM tasks WHERE taskID = '$taskID'";
	$taskResult = mysqli_query($connection,$taskQuery);
	header('Location: customers.php');
?>