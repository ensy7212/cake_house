<?php 
session_start();
require_once('../connection/connection.php');

$created_at = date('Y-m-d H:i:s');
$sql= "INSERT INTO members  (`name`, account, `password`, created_at) VALUES ( :name, :account, :password, :created_at)";
$sth = $db ->prepare($sql);
$sth ->bindParam(":name", $_POST['name'], PDO::PARAM_STR);
$sth ->bindParam(":account", $_POST['email'], PDO::PARAM_STR);
$sth ->bindParam(":password", $_POST['password'], PDO::PARAM_STR);
$sth ->bindParam(":created_at", $created_at, PDO::PARAM_STR);
$result = $sth ->execute();
if($result){
    $status = "success";
}else{
    $status = "error";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Cake House 帶給你最天然健康的幸福滋味">
    <meta name="author" content="Ondrej Svestka | ondrejsvestka.cz">
    <meta name="keywords" content="">
    <meta http-equiv="refresh" content="5;../index.php">

    <title>
        Cake House : 帶給你最天然健康的幸福滋味
    </title>

    <meta name="keywords" content="">

    <?php require_once('template/head_files.php'); ?>



</head>

<body>
<?php require_once('template/navbar.php'); ?>
    <!-- *** NAVBAR END *** -->

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="../index.php">首頁</a>
                        </li>
                        <li>會員登出</li>
                        <li>登出成功</li>
                    </ul>


                    <div class="row" id="error-page">
                        <div class="col-sm-6 col-sm-offset-3">
                            <div class="box">

                                <p class="text-center">
                                    <img src="../images/logo.png" alt="Cake House template">
                                </p>
                                <h3>登出成功</h3>
                                <p class="text-center">5秒後自動跳首頁，或可點選
                                <a href="product_list.php?category_id=1">產品瀏覽</a>
                                </p>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- /.col-md-9 -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


        <?php require_once('template/footer.php'); ?>



</body>

</html>