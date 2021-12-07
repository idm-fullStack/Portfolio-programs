<?php
session_start();
if ($_SESSION['auth_admin'] == "yes_auth")
{
	define('myeshop', true);
       
       if (isset($_GET["logout"]))
    {
        unset($_SESSION['auth_admin']);
        header("Location: login.php");
    }

  $_SESSION['urlpage'] = "<a href='index.php' >�������</a> \ <a href='administrators.php' >��������������</a>";
  
include("include/db_connect.php");
include("include/functions.php");             
$id = clear_string($_GET["id"]);
$action = $_GET["action"];
if (isset($action))
{
   switch ($action) {
        
        case 'delete':
      if ($_SESSION['auth_admin_login'] == 'admin')
      {
        $delete = mysqli_query($link,"DELETE FROM reg_admin WHERE id = '$id'"); 
      }else
      {
         $msgerror = '� ��� ��� ���� �� �������� ���������������!';
      }
              

	    break;
        
	} 
    
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <link href="css/reset.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="jquery_confirm/jquery_confirm.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script> 
    <script type="text/javascript" src="js/script.js"></script> 
    <script type="text/javascript" src="jquery_confirm/jquery_confirm.js"></script>     
	<title>������ ���������� - ��������������</title>
</head>
<body>
<div id="block-body">
<?php
	include("include/block-header.php"); 
?>
<div id="block-content">
<div id="block-parameters">
<p id="title-page" >��������������</p>
<p align="right" id="add-style"><a href="add_administrators.php" >�������� ������</a></p>
</div>

<?php
if (isset($msgerror)) echo '<p id="form-error" align="center">'.$msgerror.'</p>';

if ($_SESSION['view_admin'] == '1')
{


	$result = mysqli_query($link,"SELECT * FROM reg_admin ORDER BY id DESC");
 
 If (mysqli_num_rows($result) > 0)
{
$row = mysqli_fetch_array($result);
do
{  
    
echo '
<ul id="list-admin" >
<li>
<h3>'.$row["fio"].'</h3>
<p><strong>���������</strong> - '.$row["role"].'</p>
<p><strong>E-mail</strong> - '.$row["email"].'</p>
<p><strong>�������</strong> - '.$row["phone"].'</p>
<p class="links-actions" align="right" ><a class="green" href="edit_administrators.php?id='.$row["id"].'" >��������</a> | <a class="delete" rel="administrators.php?id='.$row["id"].'&action=delete" >�������</a></p>
</li>
</ul>   
    ';
    
    
} while ($row = mysqli_fetch_array($result));
}
    
}else{
   echo '<p id="form-error" align="center">� ��� ��� ���� �� �������� ���������������!</p>'; 
}
?>

</div>
</div>
</body>
</html>
<?php
}else
{
    header("Location: login.php");
}
?>