<?php
	include_once("dbConnection.php");
?>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>New Task</title>


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
                <h3 style="margin-top: 5%; margin-bottom: 3%;">New Task</h3>

    
                <form action = "" method = "post">
                    <div class = "three columns">
                        <label for="customer">Customer</label>
						<select name="customer">
							
						<?php
							$cQuery = "SELECT * FROM customers";
							$cResult = mysqli_query($connection,$cQuery);

							while($row = mysqli_fetch_array($cResult)){
								echo "<option value='$row[customerID]'>".$row['name']." (".$row['address'].")</option>";
							}

						?>
						</select>
						
                    </div>

                    <div class = "three columns">
                        <label for="task">Task</label>
                        <input type="text" name="task">
                    </div>
					
                    <div class = "three columns">
                        <label for="date">Date</label>
                        <input type="date" name="date">
                    </div>
					
					<div class = "three columns">
						<label for="renew">Renew</label>
						<select name="renew">
						  <option value="0">None</option>
						  <option value="1">Weekly</option>
						  <option value="2">Biweekly</option>
						</select>
					</div>


                    <div class = "twelve columns" style = "text-align: center;">
                        <input class="button" type="submit" value="Submit" name = "submit" style="margin-top: 3.3rem;">
                    </div>
                </form>
				
				<?php
					if(isset($_POST['submit'])){
						$custID = $_POST["customer"];
						$task = $_POST["task"];
						$date = $_POST["date"];
						$renew = $_POST["renew"];
						
						
						$query = "INSERT INTO tasks VALUES ($connection->insert_id, '$custID', '$task', '$date', DEFAULT, '$renew')";
						$result = mysqli_query($connection,$query);
						echo"<script> alert('Posted');
				 			window.location.href='tasks.php';
				 		</script>";
					}
				?>
                
            </div>
        </div>
    </body>
</html>
