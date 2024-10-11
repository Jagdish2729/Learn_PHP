
<?php

include("connection.php");
if(isset($_POST['name']))
{
$name = $_POST['name'];
$age = $_POST['age'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$battingstyle = $_POST['battingstyle'];
$bowlingstyle = $_POST['bowlingstyle'];
$desc = $_POST['desc'];


$query = "INSERT INTO `player_details`.`details` (`name`, `age`, `email`, `phone`, `battingstyle`, 
`bowlingstyle`, `other`, `dt`) VALUES ( '$name', '$age' , '$email' , '$phone',
'$battingstyle', '$bowlingstyle', '$desc' , current_timestamp())";

$data = mysqli_query($conn,$query); //isse query execute ho jaayegi

if($data){
    echo "data inserted sucessfully";
}else{
    echo "failed";
}
}





$query = "SELECT * FROM details" ;  //will call everything from details table

if(isset($_GET['search_name']))
{
    $search_name = $_GET['search_name'];
    $query .= " WHERE name LIKE '%{$search_name}%'";
}
echo "SQL = ".$query;
//yaha query direct nahi chalti ,use execute krwana pdta h 
$data = mysqli_query($conn,$query); //query execute ho jaayegi 

$total = mysqli_num_rows($data); //this will show the total number of rows present in the table 
//echo $total; 
// $result =  mysqli_fetch_assoc($data) //data ko fetch krne k liye (data ko array k format m lekr aayega)

if($total!=0)   //agr total rows zero se jyada h toh 
{
    ?>
    <h2 align = "center" > <mark> Displaying All Records </mark></h2>
    <center>
    <form action="search.php" method="POST"> <!-- or POST, depending on your preference -->
        <label for="name">First Name:</label>
        <input type="text" name="name" id="name" placeholder="Enter first name" required>
        <input type="submit" value="Search">

   <table border = "1" cellspacing = "6"> 
    <tr>
    <th width = "10%">Name</th>
    <th width = "5%">Age</th>
    <th width = "20%">Email</th>
    <th width = "10%">Phone</th>
    <th width = "10%">Batting Style</th>
    <th width = "10%">Bowling Style</th>
    <th width = "6.5%">Operation</th>
    </tr>
   <style> 
   .edit{
    background-color : lightgreen;
   }
   .delete{
    background-color: red;
   }
</style>

<?php
    while($result =  mysqli_fetch_assoc($data))
    {
        echo "<tr>
               <td>".$result['name']."</td>
               <td>".$result["age"]."</td>
               <td>".$result["email"]."</td>
               <td>".$result["phone"]."</td>
               <td>".$result["battingstyle"]."</td>
               <td>".$result["bowlingstyle"]."</td>
               <td> <a href = 'update_design.php?name=$result[name]'> <button class = 'edit'> Edit </button> </a> 
                <a href = 'delete.php?name=$result[name]'> <button class = 'delete' onclick = 'return checkdelete()'> Delete </button> </a> </td>
               </tr>";
    }
}
else{
    echo "no records found";
}



?>

</table>
</center>
<script>
   function checkdelete (){
    return confirm('Are you sure you want to delete this record?');
   }
   
</script>

