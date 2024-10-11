<?php
include("connection.php");
$id =  $_GET['name'];
$query = "SELECT * FROM details where name = '$id'" ; 
$data = mysqli_query($conn,$query); 

$total = mysqli_num_rows($data); 
$result =  mysqli_fetch_assoc($data);
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
        <h1>Update</h1>
        <p> Update Your Details Here</p>
      <form action="" method="post">
         <input type="text" name="name" value = "<?php echo $result['name'];?>" id="name" placeholder="Enter Your Name">
         <input type="text" name="age" id="age" value = " <?php echo $result['age'];?>" placeholder="Enter Your Age">
         <input type="email" name="email" value = "<?php echo $result['email'];?>" id="email" placeholder="Enter Your Email">
         <input type="phone" name="phone" value = "<?php echo $result['phone'];?>" id="phone" placeholder="Enter Your Phone Number">
         <input type="text" name="battingstyle" value = "<?php echo $result['battingstyle'];?>" id="battingstyle" placeholder="Enter Your Batting Style Here ">
         <input type="text" name="bowlingstyle" value = "<?php echo $result['bowlingstyle'];?>"id="bowlingstyle" placeholder="Enter Your Bowling Style Here ">
         <textarea name="desc" id="desc" cols="20" rows="10" placeholder="Enter any other info"></textarea>     
         <button class="btn">Update</button>       
        </form>
     </div>
<script src="index.js"></script>
</body>
 </html> 
 <?php

if(isset($_POST['name']))
{
$name = $_POST['name'];
$age = $_POST['age'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$battingstyle = $_POST['battingstyle'];
$bowlingstyle = $_POST['bowlingstyle'];
$desc = $_POST['desc'];



$query = "UPDATE details set name = '$name',age = '$age',email = '$email',phone='$phone',battingstyle='$battingstyle',bowlingstyle = '$bowlingstyle'WHERE name = '$id'";
$data = mysqli_query($conn,$query); //isse query execute ho jaayegi

if($data){
    echo "data Updated sucessfully";
    ?>
    <meta http-equiv = "refresh" content = "0; url = http://localhost/first/display.php "/>
    <?php
}else{
    echo "failed";
}
$conn ->close();
}

?>






















