<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
define('myeshop', true); 
include("../include/db_connect.php"); 

          $delete = mysqli_query($link,"DELETE FROM category WHERE id = '{$_POST["id"]}'"); 
          echo "delete";   

}
?>