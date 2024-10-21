<?php
require_once('../../config/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Confirmation Form</title>
    <link rel="stylesheet" href="../../assests/css/style.css">
 </head>
<body>
<img class="bg" src="../../assests/img/bg.jfif" alt="Photo">
    <div class="container">
        <h1>Player Details</h1>
        <p> Enter Your Details Here</p>
      <form action="read.php" method="post">
         <input type="text" name="name" id="name" placeholder="Enter Your Name">
         <input type="text" name="age" id="age" placeholder="Enter Your Age">
         <input type="email" name="email" id="email" placeholder="Enter Your Email">
         <input type="phone" name="phone" id="phone" placeholder="Enter Your Phone Number">
         <input type="text" name="battingstyle" id="battingstyle" placeholder="Enter Your Batting Style Here ">
         <input type="text" name="bowlingstyle" id="bowlingstyle" placeholder="Enter Your Bowling Style Here ">
         <textarea name="desc" id="desc" cols="20" rows="10" placeholder="Enter any other info"></textarea>     
        <div class = "btn"> 
          <button type = "submit">Submit</button>   
          <button type = "button"><a href = "read.php"> Cancel </a></button>   
</div>     
        </form>

     </div>
<script src="index.js"></script>
</body>
 </html> 
 
