<?php
$_SESSION['Cart'][]['ProductName'] = "起司蛋糕";
$Cart="草莓蛋糕";

setcookie("Cart", $Cart);

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Session Test</title>
  </head>
  <body>
    <?php echo $_SESSION['Cart'][]['ProductName']; ?>
    <?php echo $_COOKIE['Cart']; ?>
  </body>
</html>
