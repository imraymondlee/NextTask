<?php
include("header.php");

$customerID = $_GET['customerID'];
$cQuery = "SELECT * FROM customers WHERE customerID = '$customerID'";
$cResult = $conn->query($cQuery);
$cRow = $cResult->fetch_assoc();

$name = $cRow['name'];



?>

<div class="grid-container side_menu_offset">


	<div class="grid-x grid-margin-x">
		<div class="large-12 cell button-center">
			<h1>Are you sure you want to remove <?php echo $name; ?>?</h1>
			<a href ="profile.php?customerID=<?php echo $customerID; ?>" class = 'primary button'>Go Back</a>
			<a href ="remove-customer.php?customerID=<?php echo $customerID; ?>" class = 'delete button'>Remove Customer</a>
		</div>

	</div>











</div>




<?php
include("footer.php");
?>