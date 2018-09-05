<?php 
require_once('../function/login_check.php');
require('../../connection/connection.php'); ?>
<?php 
$sql = "DELETE FROM news WHERE news_id=".$_GET['news_id'];
$sth = $db->prepare($sql);
$sth->execute();
header('Location: list.php');
?>