<?php
session_start();
require('../connection/connection.php');
$query = $db->query("SELECT * FROM news WHERE news_id =".$_GET['id']);
$news = $query->fetch(PDO::FETCH_ASSOC);
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

                <div class="col-sm-12">

                    <ul class="breadcrumb">

                        <li><a href="../index.php">首頁</a>
                        </li>
                        <li><a href="news_list.php">最新消息</a>
                        </li>
                        <li><?php echo $news['title']; ?></li>
                    </ul>
                </div>

                <div class="col-sm-12" id="blog-post">


                    <div class="box">

                        <h1><?php echo $news['title']; ?></h1>
                        <p class="author-date"><i class="fa fa-calendar-o"></i>  <?php echo $news['published_date']; ?></p>
                       

                        <div id="post-content">
                        <?php echo $news['content']; ?>
                        </div>
                        <!-- /#post-content -->


                    </div>
                    <!-- /.box -->
                </div>
                <!-- /#blog-post -->

                <div class="col-md-3">
                    <!-- *** BLOG MENU ***
 _________________________________________________________ -->

                    <!-- *** BLOG MENU END *** -->

                    <div class="banner">
                        <a href="#">

                        </a>
                    </div>
                </div>


            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

        <?php require_once('template/footer.php'); ?>







</body>

</html>