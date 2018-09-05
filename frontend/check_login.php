<?php
session_start();
require('../connection/connection.php');
$sql = "SELECT * FROM members WHERE account =:account AND password=:password";
$sth = $db ->prepare($sql);
$sth ->bindParam(":account", $_POST['email'], PDO::PARAM_STR);
$sth ->bindParam(":password", $_POST['password'], PDO::PARAM_STR);
$sth ->execute();
$member = $sth->fetch(PDO::FETCH_ASSOC);
$_SESSION['member'] = $member;
if(isset($_SESSION['member']) && $_SESSION['member'] != null ){
    header('Location: customer-account.php');
}else{

    header('Location: login_error.php');
}
?>