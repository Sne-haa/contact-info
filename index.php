<?php

if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password ="";
    $db_name = "contact_manager";
    $con = mysqli_connect($server,$username,$password);

    if(!$con){
        die("Connection to this database failed due to " . mysqli_connect_error());
    }

    mysqli_select_db($con, $db_name);

    echo "Success connecting to database";

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $sql = "INSERT INTO `contacts` (`name`, `email`, `phone`) VALUES ('$name', '$email', '$phone');";
    echo "Query created";
    if($con->query($sql) === true){
        echo "Successfully inserted";
        header('location:index.php');
    }else{
        echo "ERROR: $sql <br> $conn->error";
    }

    $con->close();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="container" >
        <h3>Enter Details</h3><br>
        <form action="index.php" method="post">
        <input type="text" id="name" placeholder="Name" name="name" required>
        <input type="text" id="email" placeholder="Email" name="email" required>
        <input type="text" id="phone" placeholder="Phone" name="phone" required>
            <center> <button id="submit">Add Contact</button> <br> <br>
            <a href="details.php">Show Details</a></center>
            
        </form>
    </div>

   
    
   
    
    <!-- <script src="script.js"></script> -->
</body>
</html>