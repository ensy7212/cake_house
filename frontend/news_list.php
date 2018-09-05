<?php 
session_start();
require('../connection/connection.php');
$limit = 3;
if (isset($_GET["page"])) { 
  $page  = $_GET["page"]; 
} else { 
  $page=1; 
};
$start_from = ($page-1) * $limit;
$query = $db->query("SELECT * FROM news ORDER BY published_date DESC LIMIT ".$start_from.",".$limit);
$data = $query->fetchAll(PDO::FETCH_ASSOC);
$total_rows = count($data);
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

                <!-- *** LEFT COLUMN ***
		     _________________________________________________________ -->

                <div class="col-sm-12" id="blog-listing">

                    <ul class="breadcrumb">

                        <li><a href="../index.php">首頁</a>
                        </li>
                        <li>最新消息</li>
                    </ul>
                    <?php foreach($data as $news){  ?>
                    <div class="post">
                        <h2><a href="news.php?id=<?php echo $news['news_id']; ?>"><?php echo $news['title']; ?></a></h2>
                       
                        <hr>
                        <p class="date-comments">
                        <a href="news.php?id=<?php echo $news['news_id']; ?>"><i class="fa fa-calendar-o"></i> <?php echo $news['published_date']; ?></a>
                           
                        </p>
                       
                        <p class="intro"><?php echo mb_strimwidth(strip_tags($news['content']),0,100,"..."); ?></p>
                        <p class="read-more"><a href="news.php?id=<?php echo $news['news_id']; ?>" class="btn btn-primary">了解更多</a>
                        </p>
                    </div>
                    <?php } ?>

                    
                    <?php  if($total_rows > 0){
                        $sth = $db->query("SELECT * FROM news ORDER BY published_date DESC ");
                        $data_count = count($sth ->fetchAll(PDO::FETCH_ASSOC));
                        $total_pages = ceil($data_count / $limit); //無條件進位
                    ?>
                    <ul class="pagination">
                        <li class="page-item">
                        <?php   if($page > 1){ ?>
                        <!-- 頁數超過1，上一頁可連結 -->
                        <a class="page-link" href="news_list.php?page=<?php echo $page-1; ?>">
                            <span>«</span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <?php }else{ ?>
                        <!-- 頁數不超過1頁，上一頁按鈕不可連結 -->
                        <span class="page-link">«</span>
                        <?php } ?>
                        </li>
                        <?php for($i=1; $i <= $total_pages; $i++){ ?>
                        <li class="page-item">
                        <a class="page-link" href="news_list.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                        </li>
                        <?php } ?>
                        <li class="page-item">
                        <?php   if($page < $total_pages){ ?>
                        <a class="page-link" href="news_list.php?page=<?php echo $page+1; ?>">
                            <span>»</span>
                            <span class="sr-only">Next</span>
                        </a>
                        <?php }else{ ?>
                            <span class="page-link">»</span>
                        <?php } ?>
                        </li>
                    </ul>
                        <?php } ?>


                </div>
                <!-- /.col-md-9 -->

                <!-- *** LEFT COLUMN END *** -->


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