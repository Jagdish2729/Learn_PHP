<?php
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Confirmation Form</title>
    <link rel="stylesheet" href="style.css">
 </head>
<body>
<img class="bg" src="bg.jfif" alt="Photo">
    <div class="container">
        <h1>Player Details</h1>
        <p> Enter Your Details Here</p>
      <form action="index.php" method="post">
         <input type="text" name="name" id="name" placeholder="Enter Your Name">
         <input type="text" name="age" id="age" placeholder="Enter Your Age">
         <input type="email" name="email" id="email" placeholder="Enter Your Email">
         <input type="phone" name="phone" id="phone" placeholder="Enter Your Phone Number">
         <input type="text" name="battingstyle" id="battingstyle" placeholder="Enter Your Batting Style Here ">
         <input type="text" name="bowlingstyle" id="bowlingstyle" placeholder="Enter Your Bowling Style Here ">
         <textarea name="desc" id="desc" cols="20" rows="10" placeholder="Enter any other info"></textarea>     
         <button class="btn" type = "submit">Submit</button>       
        </form>
     </div>
<script src="index.js"></script>
</body>
 </html> 
 <?php

// if(isset($_POST['name']))
// {
// $name = $_POST['name'];
// $age = $_POST['age'];
// $email = $_POST['email'];
// $phone = $_POST['phone'];
// $battingstyle = $_POST['battingstyle'];
// $bowlingstyle = $_POST['bowlingstyle'];
// $desc = $_POST['desc'];



// $query = "INSERT INTO `player_details`.`details` (`name`, `age`, `email`, `phone`, `battingstyle`, 
// `bowlingstyle`, `other`, `dt`) VALUES ( '$name', '$age' , '$email' , '$phone',
// '$battingstyle', '$bowlingstyle', '$desc' , current_timestamp())";

// $data = mysqli_query($conn,$query); //isse query execute ho jaayegi

// if($data){
//     echo "data inserted sucessfully";
// }else{
//     echo "failed";
// }
// $conn ->close();
// }
// header('Location: display.php');
?>

