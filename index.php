
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
header('Location: ' . $_SERVER['PHP_SELF']); // Redirect to the same page or another page
exit();
}


$limit = 5;
if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 1;
}
$offset = ($page-1)* $limit ;
$query = "SELECT * FROM details LIMIT {$offset},{$limit}" ;  //will call everything from details table
//yaha query direct nahi chalti ,use execute krwana pdta h 
$data = mysqli_query($conn,$query); //query execute ho jaayegi 

$total = mysqli_num_rows($data); //this will show the total number of rows present in the table 
//echo $total; 
// $result =  mysqli_fetch_assoc($data) //data ko fetch krne k liye (data ko array k format m lekr aayega)

if($total!=0)   //agr total rows zero se jyada h toh 
{
    ?>
    <button class = "add"><a href = "form.php"> ADD USER</a></button>
    <style>
        .add{
            position: fixed; 
            top: 10px;       /* Position from the top */
            right: 10px;     /* Position from the right */
            padding: 10px 20px; /* Button padding */
            background-color: #4CAF50; /* Green background */
            color: white;    /* White text */
            border: none;    /* No border */
            border-radius: 5px; 
            cursor: pointer; 
        }
        </style>

    <h2 align = "center" > <mark> Displaying All Records </mark></h2>
    <center>
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
<?php

$sql1 = "SELECT * FROM details" ;
$result1 = mysqli_query($conn,$sql1) or die("query failed");

if(mysqli_num_rows($result1)>0){

    $total_records = mysqli_num_rows($result1);
  
    $total_page = ceil($total_records/$limit);
    echo '<ul class = "pagination">';
    if($page>1){
        echo'<li><a href = "index.php?page='.($page-1).'"> Previous </a></li>';
    }
   
    for($i=1; $i<$total_page; $i++){
        if($i==$page){
          $active = "active";
        }else{
            $active = "";
        }
       echo '<li class = "'.$active.'"><a href ="index.php?page='.$i.'">'.$i.'</a></li>';
   }
   if($total_page> $page){
    echo'<li><a href = "index.php?page='.($page+1).'"> Next </a></li>';
   }
   
    echo '</ul>';
}

?>
<style>
   .pagination {
            display: flex;               /* Flexbox to align items horizontally */
            list-style-type: none;        /* Remove bullets */
            padding: 0;
            margin: 20px 0;
            justify-content: center;      /* Center the pagination */
        }
        .pagination li {
            margin: 0 5px;                /* Add space between pagination items */
        }
        .pagination a {
            display: block;
            padding: 10px 15px;           /* Padding inside the buttons */
            text-decoration: none;        /* Remove underline from links */
            color: #007bff;               /* Default color for links */
            border: 1px solid #ddd;       /* Border around each page number */
            border-radius: 5px;           /* Rounded corners */
            transition: background-color 0.3s, color 0.3s; /* Smooth transition */
        }
         /* Hover effect for pagination links */
         .pagination a:hover {
            background-color: #007bff;    /* Change background color on hover */
            color: white;                 /* Change text color on hover */
        }
       
</style>


</center>
<script>
   function checkdelete (){
    return confirm('Are you sure you want to delete this record?');
   }
   
</script>

