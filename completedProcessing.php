<?php
	include_once("dbConnection.php");
	$taskID = $_GET['taskID'];

	$taskQuery = "UPDATE tasks SET completed = 1 WHERE taskID = '$taskID'";
	$taskResult = mysqli_query($connection,$taskQuery);
	header('Location: tasks.php');

?>