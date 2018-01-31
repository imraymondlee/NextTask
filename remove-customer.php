<?php
	include_once("dbConnection.php");
	$customerID = $_GET['customerID'];

	$cQuery = "DELETE FROM customers WHERE customerID = '$customerID'";
	$cResult = $conn->query($cQuery);
	header('Location: customers.php');
?>