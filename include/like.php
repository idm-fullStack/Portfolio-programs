<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
define('myeshop', true);    
session_start();
if ($_SESSION['likeid'] != (int)$_POST["id"])
{
	 include("db_connect.php");
  
     $id = (int)$_POST["id"];	
	
$result = mysqli_query($link,"SELECT * FROM table_products WHERE products_id = '$id'");
If (mysqli_num_rows($result) > 0)
{
$row = mysqli_fetch_array($result); 
   
$new_count = $row["yes_like"] + 1;
$update = mysqli_query($link,"UPDATE table_products SET yes_like='$new_count' WHERE products_id='$id'");
echo $new_count;
   
}
$_SESSION['likeid'] = (int)$_POST["id"]; 
}
else
{
    echo 'no';
}
}
?>