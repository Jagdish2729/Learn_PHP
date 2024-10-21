<?php
require_once('../../config/connection.php');
$id =  $_GET['name'];

$query = "DELETE FROM details WHERE name = '$id'";
$data =  mysqli_query($conn,$query);
if($data){
    echo "<script> alert('Record Deleted successfully')</script>";
    ?>
    <meta http-equiv = "refresh" content = "0; url = http://localhost/first/index.php "/>
    <?php
}else{
    echo "failed";
}

?>