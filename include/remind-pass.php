<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
define('myeshop', true);    
include("db_connect.php");
include("../functions/functions.php");

$email = clear_string($_POST["email"]);

if ($email != "")
{
    
   $result = mysqli_query($link,"SELECT email FROM reg_user WHERE email='$email'");
If (mysqli_num_rows($result) > 0)
{
    
// ��������� ������.
    $newpass = fungenpass();
    
// ���������� ������.
    $pass   = md5($newpass);
    $pass   = strrev($pass);
    $pass   = strtolower("9nm2rv8q".$pass."2yo6z");    
 
// ���������� ������ �� �����.
$update = mysqli_query($link,"UPDATE reg_user SET pass='$pass' WHERE email='$email'");

    
// �������� ������ ������.
   
	         // send_mail( 'noreply@shop.ru',
			             // $email,
						// '����� ������ ��� ����� MyShop.ru',
						// '��� ������: '.$newpass);   
   
   echo 'yes';
    
}else
{
    echo '������ E-mail �� ������!';
}

}
else
{
    echo '������� ���� E-mail';
}

}



?>