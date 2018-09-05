<?php 
require_once('../function/login_check.php');
require('../../connection/connection.php'); ?>
<?php
$sql = "DELETE FROM products WHERE products_id=".$_GET['products_id'];
$sth = $db->prepare($sql);
$sth->execute();
header('Location: list.php?product_categories_id='.$_GET['product_categories_id']);
?>