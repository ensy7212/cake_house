<?php
require('../../connection/connection.php');

$query = $db->query("SELECT * FROM news");
$data = $query->fetchAll(PDO::FETCH_ASSOC);
print_r($data);
?>
