<?php
	include_once("dbConnection.php");

?>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>New Customer</title>


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
                <h3 style="margin-top: 5%; margin-bottom: 3%;">New Customer</h3>

    
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

                    <div class = "twelve columns" style = "text-align: center;">
                        <input class="button" type="submit" name = "submit" value="Submit" style="margin-top: 3.3rem;">
                    </div>
                </form>
    			
				<?php
					if(isset($_POST['submit'])){
						$name = $_POST["name"];
						$address = $_POST["address"];
						$number = $_POST["number"];

//						echo $name;
						$query = "INSERT INTO customers VALUES ($connection->insert_id, '$name', '$address', '$number')";
						$result = mysqli_query($connection,$query);
						echo"<script> alert('Posted');
				 			window.location.href='customers.php';
				 		</script>";
					}
				?>
				
            </div>
        </div>
    </body>
</html>
