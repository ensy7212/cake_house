<?php 
require_once('../function/login_check.php');
require('../../connection/connection.php'); ?>
<?php
$sql = "DELETE FROM product_categories WHERE product_categories_id=".$_GET['product_categories_id'];
$sth = $db->prepare($sql);
$sth->execute();
header('Location: list.php');
?>