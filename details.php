<?php

$severname = "localhost";
$username = "root";
$password = "";
$dbname = "contact_manager";

$conn = mysqli_connect($severname, $username, $password, $dbname);

if($conn){
    echo "";
}else{
    echo "Connection Failed";
}

error_reporting(0);

$query = "SELECT * FROM contacts;";
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);

if ($total != 0) {
    ?>

    <style>
        
.update, .delete{
    background-color: green;
    color: white;
    border: 0;
    outline: none;
    border-radius: 5px;
    height: 22px;
    width: 80px;
    
    cursor: pointer;
}

.delete{
    background-color: red;
}

    </style>
    
    <center>

    <table border="2">
    <tr>
            
            <th>NAME</th>
            <th>EMAIL ID</th>
            <th>PHONE</th>
            <th>OPTIONS</th>
            
            
        </tr>

        <?php
        while ($result = mysqli_fetch_assoc($data)) {
            echo "<tr>
                       
                        <td>" . $result['name'] . "</td>
                        <td>" . $result['email'] . "</td>
                        <td>" . $result['phone'] . "</td>
                        
                        <td><a href= 'update.php?email=$result[email]'><input type='submit' value='UPDATE' class='update'></a>
                        <a href= 'delete.php?email=$result[email]'><input type='submit' value='DELETE' class='delete' onclick='return checkDelete()'></a>
                        </td>
                        
                        
                </tr>";
        }

        echo "</table>
        </center>
        
        <script>
            function checkDelete(){
                 return confirm('Are you sure you want to delete ?');   
            }
        </script>
        
        ";

} else {
    echo "No records found !";
}

?>