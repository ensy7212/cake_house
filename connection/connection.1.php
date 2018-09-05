<!-- 本機端的 -->

<?php
define('DB_SERVER', "localhost");
define('DB_USER', "ensy7212");
define('DB_PASSWORD', "she005435");
define('DB_DATABASE', "cake_house");
define('DB_DRIVER', "mysql");

$db = new PDO(DB_DRIVER . ":dbname=" . DB_DATABASE . ";host=" . DB_SERVER, DB_USER, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

date_default_timezone_set("Asia/Taipei");


?>

********************************************************************************************************************************************************************************
<!-- 000webhost -->

<?php
define('DB_SERVER', "localhost");
define('DB_USER', "id6896623_admin");
define('DB_PASSWORD', "aa123123");
define('DB_DATABASE', "id6896623_admin");
define('DB_DRIVER', "mysql");

$db = new PDO(DB_DRIVER . ":dbname=" . DB_DATABASE . ";host=" . DB_SERVER, DB_USER, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

date_default_timezone_set("Asia/Taipei");


?>

