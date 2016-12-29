<?php
	include_once("dbConnection.php");
	
//WHERE visitDate compared to today's date is the difference between sorted
	$taskQuery = "SELECT * FROM tasks WHERE completed = 0 ORDER BY visitDate ASC";
	$taskResult = mysqli_query($connection,$taskQuery);
?>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Tasks</title>


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
                <h3 style="margin: 5% 0">Tasks</h3>
            </div>
            
            <div class = "row">
                
<!--
                <form action='' method = 'post' class = "u-pull-left">
                    <label for="sortBy">Sort By</label>
                    <select name="sortBy">
                        <option value="today">Today</option>
                        <option value="upcoming">Upcoming</option>        
                    </select>
                    <input class="button" type="submit" value="Submit" name = "submit">
                    
                </form>
-->
            
                <div class = "u-pull-left">
                    <a href = "newTask.php" class = "button" style="margin-bottom: 3.2rem">New Tasks</a>
                </div>    
                
            </div>
            
            
            
            <div class="row">

				<?php
					echo "<table class='u-full-width'>
					<thead>
						<tr>
							<th>Name</th>
                            <th>Address</th>
                            <th>Task</th>
							<th>Date</th>
                            <th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					";

					while($row = mysqli_fetch_array($taskResult)){
						$custID = $row['customerID'];
						
						$custQuery = "SELECT * FROM customers WHERE customerID LIKE '$custID'";
						$custResult = mysqli_query($connection,$custQuery);
						$custRow = mysqli_fetch_array($custResult);
						$custName = $custRow["name"];
						$custAddress = $custRow["address"];
						
						echo "<tr>";
							echo "<td><a href='customerProfile.php?customerID=".$custID."'>".$custName."</a></td>";
							echo "<td>".$custAddress."</td>";
							echo "<td>".$row['task']."</td>";
							echo "<td>".$row['visitDate']."</td>";
							echo "<td><a href = 'completedProcessing.php?taskID=$row[taskID]' class = 'button' style = 'margin-right: 0.75rem;'>Completed</a>";
						
							if($row['renew'] != 0){
								echo "<a href = 'renewProcessing.php?taskID=$row[taskID]' class = 'button'>Renew</a>";
							}
							
							echo "</td>";
							

						echo "</tr>";
					}

					echo"</tbody>
					</table>";
				?>
			

            </div>
        </div>
        
    </body>
</html>
