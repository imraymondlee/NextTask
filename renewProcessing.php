<?php
	include_once("dbConnection.php");
	$taskID = $_GET['taskID'];

	$taskQuery = "UPDATE tasks SET completed = 1 WHERE taskID = '$taskID'";
	$taskResult = mysqli_query($connection,$taskQuery);

//Create new task
	$query = "SELECT * FROM tasks WHERE taskID = '$taskID'";
	$result = mysqli_query($connection,$query);
	$row = mysqli_fetch_array($result);
	$custID = $row["customerID"];
	$task = $row["task"];
	$date = $row["visitDate"];
	$renew = $row["renew"];

	if($renew == 1){
		$dateAdd = date('Y-m-d', strtotime($date. ' + 7 days'));
	}else if($renew == 2){
		$dateAdd = date('Y-m-d', strtotime($date. ' + 14 days'));
	}

	$newQuery = "INSERT INTO tasks VALUES ($connection->insert_id, '$custID', '$task', '$dateAdd', DEFAULT, '$renew')";
	$newResult = mysqli_query($connection,$newQuery);

	header('Location: tasks.php');

?>