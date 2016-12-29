<?php
	include_once("dbConnection.php");

	$customerID = $_GET['customerID'];

	$custQuery = "SELECT * FROM customers WHERE customerID = '$customerID'";
	$custResult = mysqli_query($connection,$custQuery);
	$custRow = mysqli_fetch_array($custResult);
	$custName = $custRow["name"];
	$custAddress = $custRow["address"];
	$custNumber = $custRow["number"];

	$taskQuery = "SELECT * FROM tasks WHERE customerID = '$customerID' AND completed = 1";
	$taskResult = mysqli_query($connection,$taskQuery);
?>

<html lang="en">
    <head>
        <meta charset="utf-8">
		
		<?php
			echo "<title>$custName</title>";
		?>

        <meta name="viewport" content="width=device-width, initial-scale=1">


        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/skeleton.css">

        <link rel="icon" type="image/png" href="images/favicon.png">

    </head>
    <body>
<!--Navigation-->
        <header>
            <div class = "nav">
                <div class = "container">
                    <div class = "navItem">
                        <a href = "index.php">Home</a>
                    </div>
                    
                    <div class = "navItem">
                        <a href = "tasks.php">Tasks</a>  
                    </div>  
                    
                    <div class = "navItem">
                        <a href = "customers.php">Customers</a>  
                    </div>  
                </div>
            </div>
        </header>
        
        <div class="container">
            <div class="row">
				<?php
					echo "<h3 style='margin-top: 5%; margin-bottom: 3%;'>$custName</h3>";
				?>
					 
            </div>
            
            <div class="row">
				<?php
					echo"
					<strong>Address: </strong>
					$custAddress
					<br />
					<strong>Phone Number: </strong>
					$custNumber
					";
				?>
            </div>
            
            
            <div class = "row">
                <h4 style = "margin-top: 6rem;">Edit Customer</h4>
                
                <form action = "" method = "post">
                    <div class = "three columns">
                        <label for="name">Name</label>
                        <input type="text" name="name">
                    </div>
                    
                    <div class = "three columns">
                        <label for="address">Address</label>
                        <input type="text" name="address">
                    </div>
                    
                    <div class = "three columns">
                        <label for="number">Phone Number</label>
                        <input type="text" name="number">
                    </div>
                    
                    <div class = "three columns">
                        <input class="button" type="submit" value="Submit" name = "submit" style="margin-top: 3.3rem;">
                    </div>
                </form>
				
				<?php
					if(isset($_POST['submit'])){
						$name = $_POST["name"];
						$address = $_POST["address"];
						$number = $_POST["number"];

						$query = "UPDATE customers SET name = '$name', address = '$address', number = '$number' WHERE customerID = '$customerID'";
						$result = mysqli_query($connection,$query);
						echo"<script> alert('Updated');
				 			window.location.href='customers.php';
				 		</script>";
					}
				?>
            </div>
            
            <div class="row">
                <h4 style = "margin-top: 6rem; margin-bottom: 0;">History</h4>
				
				<?php
					echo "<table class='u-full-width'>
						<thead>
							<tr>
								<th>Date</th>
								<th>Task</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
					";

					while($row = mysqli_fetch_array($taskResult)){
						echo "<tr>";
							echo "<td>".$row['visitDate']."</td>";
							echo "<td>".$row['task']."</td>";
							echo "<td><a href = 'deleteProcessing.php?taskID=$row[taskID]' class = 'button'>Delete</a></td>";
						echo "</tr>";
					}
				?>
            </div>
            
            
        </div>
    </body>
</html>
