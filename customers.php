<?php
	include_once("dbConnection.php");

	$custQuery = "SELECT * FROM customers";
	$custResult = mysqli_query($connection,$custQuery);
?>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Customers</title>


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
                <h3 style="margin: 5% 0">Customers</h3>
            </div>
            
            <div class = "row">
                <div class = "u-pull-left">
                    <a href = "newCustomer.php" class = "button">New Customer</a>
                </div>    
                
            </div>
            
            <div class="row">
				
				<?php
					echo "<table class='u-full-width'>
					<thead>
						<tr>
							<th>Name</th>
                            <th>Address</th>
                            <th>Phone Number</th>
                            <th>Next Visit</th>
						</tr>
					</thead>
					<tbody>
					";

					while($row = mysqli_fetch_array($custResult)){
						$custID = $row['customerID'];
				
//						CHANGE COMPLETED TO 0 FOR NEXT VISIT
						$taskQuery = "SELECT * FROM tasks WHERE customerID LIKE '$custID' AND completed = 0 ORDER BY visitDate DESC LIMIT 1;";
						$taskResult = mysqli_query($connection,$taskQuery);
						$taskRow = mysqli_fetch_array($taskResult);
						$visitDate = $taskRow["visitDate"];
						
						echo "<tr>";
							echo "<td><a href='customerProfile.php?customerID=".$custID."'>".$row['name']."</a></td>";
							echo "<td>".$row['address']."</td>";
							echo "<td>".$row['number']."</td>";
							echo "<td>".$visitDate."</td>";
						echo "</tr>";
					}

					echo"</tbody>
					</table>";
				?>
           
            </div>
        </div>
        
    </body>
</html>
