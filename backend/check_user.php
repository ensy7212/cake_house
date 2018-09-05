<?php
session_start();
require('../connection/connection.php');
$sql = "SELECT * FROM users WHERE account =:account AND password=:password";
$sth = $db ->prepare($sql);
$sth ->bindParam(":account", $_POST['username'], PDO::PARAM_STR);
$sth ->bindParam(":password", $_POST['pass'], PDO::PARAM_STR);
$sth ->execute();
$user = $sth->fetch(PDO::FETCH_ASSOC);
$_SESSION['account'] = $user['account'];
if(isset($user) && $user != null ){
    header('Location: news/list.php');
}else{

    header('Location: login.php?Error=true');
}

?>