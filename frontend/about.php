<?php require('../connection/connection.php'); ?>
<?php 
$query = $db->query("SELECT * FROM pages WHERE pages_id=1");
$about = $query->fetch(PDO::FETCH_ASSOC);

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

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li>
                            <a href="../index.php">首頁</a>
                        </li>
                        <li>關於我們</li>
                    </ul>
                </div>

                <div class="col-md-3">
                    <!-- *** PAGES MENU ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">其他資訊</h3>
                        </div>

                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked">
                                <li>
                                    <a href="about.php">關於我們</a>
                                </li>
                                <li>
                                    <a href="contact.php">聯絡我們</a>
                                </li>
                                <li>
                                    <a href="faq.php">常見問題</a>
                                </li>

                            </ul>

                        </div>
                    </div>

                    <!-- *** PAGES MENU END *** -->

                    <div class="banner">
                        <a href="#"> </a>
                    </div>
                </div>


                    <div class="col-md-9">

                        <div class="box" id="text-page">
                            <h1>
                                <?php echo $about['title']; ?>
                            </h1>

                            <?php echo $about['content']; ?>

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