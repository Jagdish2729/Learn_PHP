<?php
include('connection.php');
if (isset($_POST['name'])) {
   
    $first_name = $conn->real_escape_string($_POST['name']);
    $sql = "SELECT * FROM details WHERE name LIKE '%$first_name%'"; // Adjust 'users' and 'first_name' to your table and column names
        $result = $conn->query($sql);
        // Check if there are results
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                echo "<p>Name: " . $row['name'] ." ". $row['age'] ." ". $row['email'] ." ". $row['phone'] ."</p>";// Adjust 'first_name' and 'last_name' to your columns
            }
        } else {
            echo "<p>No results found for '$first_name'.</p>";
        }

    
}



?>