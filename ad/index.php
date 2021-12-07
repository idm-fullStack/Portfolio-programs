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

  $_SESSION['urlpage'] = "<a href='index.php' >Ãëàâíàÿ</a>";
  
  include("include/db_connect.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <link href="css/reset.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
	<title>Ïàíåëü Óïðàâëåíèÿ</title>
</head>
<body>
<div id="block-body">
<?php
	include("include/block-header.php");
    
     // Îáùåå êîëè÷åñòâî çàêàçîâ 
 $query1 = mysqli_query($link,"SELECT * FROM orders");
 $result1 = mysqli_num_rows($query1);
 // Îáùåå êîëè÷åñòâî òîâàðîâ 
 $query2 = mysqli_query($link,"SELECT * FROM table_products");
 $result2 = mysqli_num_rows($query2);   
 // Îáùåå êîëè÷åñòâî îòçûâîâ 
 $query3 = mysqli_query($link,"SELECT * FROM table_reviews");
 $result3 = mysqli_num_rows($query3);
  // Îáùåå êîëè÷åñòâî êëèåíòîâ 
 $query4 = mysqli_query($link,"SELECT * FROM reg_user");
 $result4 = mysqli_num_rows($query4);
?>
<div id="block-content">
<div id="block-parameters">
<p id="title-page" >Îáùàÿ ñòàòèñòèêà</p>
</div>

<ul id="general-statistics">
<li><p>Âñåãî çàêàçîâ - <span><?php echo $result1; ?></span></p></li>
<li><p>Òîâàðîâ - <span><?php echo $result2; ?></span></p></li>
<li><p>Îòçûâû - <span><?php echo $result3; ?></span></p></li>
<li><p>Êëèåíòû - <span><?php echo $result4; ?></span></p></li>
</ul>

<h3 id="title-statistics">Ñòàòèñòèêà ïðîäàæ</h3>

<TABLE align="center" CELLPADDING="10" WIDTH="100%">
<TR>
<TH>Äàòà</TH>
<TH>Òîâàð</TH>
<TH>Öåíà</TH>
<TH>Ñòàòóñ</TH>
</TR>


<?php

$result = mysqli_query($link,"SELECT * FROM orders,buy_products WHERE orders.order_pay='accepted' AND orders.order_id=buy_products.buy_id_order");
 
 If (mysqli_num_rows($result) > 0)
{
$row = mysqli_fetch_array($result);
do
{

 $result2 = mysqli_query($link,"SELECT * FROM table_products WHERE products_id='{$row["buy_id_product"]}'");   
  If (mysqli_num_rows($result2) > 0)
{
 $row2 = mysqli_fetch_array($result2);
}
    
$statuspay = "";
if ($row["order_pay"] == "accepted") $statuspay = "Îïëà÷åíî";

echo '
 <TR>
<TD  align="CENTER" >'.$row["order_datetime"].'</TD>
<TD  align="CENTER" >'.$row2["title"].'</TD>
<TD  align="CENTER" >'.$row2["price"].'</TD>
<TD  align="CENTER" >'.$statuspay.'</TD>
</TR>
';

	}
     while ($row = mysqli_fetch_array($result));
}     
?>

</TABLE>
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