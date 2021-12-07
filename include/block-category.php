<?php
	defined('myeshop') or die('Доступ запрещён!');
?>
<div id="block-category">
<p class="header-title" >Категории товаров</p>

<ul>

<li><a id="index1" ><img src="/images/tshirt-icon.gif" id="tshirt-images" />Футболки</a>
<ul class="category-section">
<li><a href="view_cat.php?type=tshirt"><strong>Все модели</strong> </a></li>

<?php

  $result = mysqli_query($link,"SELECT * FROM category WHERE type='tshirt'");
  
 If (mysqli_num_rows($result) > 0)
{
$row = mysqli_fetch_array($result);
do
{
	echo '
    
  <li><a href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>
    
    ';
}
 while ($row = mysqli_fetch_array($result));
} 
	
?>

</ul>
</li>

<li><a id="index2" ><img src="/images/ball-icon.gif" id="ball-images" />Мячи</a>
<ul class="category-section">
<li><a href="view_cat.php?type=ball"><strong>Все модели</strong> </a></li>

<?php

  $result = mysqli_query($link,"SELECT * FROM category WHERE type='ball'");
  
 If (mysqli_num_rows($result) > 0)
{
$row = mysqli_fetch_array($result);
do
{
	echo '
    
  <li><a href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>
    
    ';
}
 while ($row = mysqli_fetch_array($result));
} 
	
?>

</ul>
</li>

<li><a id="index3" ><img src="/images/gloves-icon.gif" id="gloves-images" />Перчатки</a>
<ul class="category-section">
<li><a href="view_cat.php?type=gloves"><strong>Все модели</strong> </a></li>
<?php

  $result = mysqli_query($link,"SELECT * FROM category WHERE type='gloves'");
  
 If (mysqli_num_rows($result) > 0)
{
$row = mysqli_fetch_array($result);
do
{
	echo '
    
  <li><a href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>
    
    ';
}
 while ($row = mysqli_fetch_array($result));
} 
	
?>
</ul>
</li>

</ul>

</div>