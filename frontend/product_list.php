<?php
session_start();
require_once('../connection/connection.php');
$query = $db->query("SELECT * FROM products WHERE product_categories_id=".$_GET['category_id']);
$product_list = $query->fetchAll(PDO::FETCH_ASSOC);
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

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="../index.php">首頁</a>
                        </li>
                        <li><a href="#">產品介紹</a>
                        </li>
                        <li>產品分類</li>
                    </ul>

                </div>

                <div class="col-md-3">
                    <!-- *** MENUS AND FILTERS ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">產品分類</h3>
                        </div>

                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked category-menu">
                            <?php foreach($categories as $side_categories){  
                                $query = $db->query("SELECT * FROM products WHERE product_categories_id=".$side_categories
                                ['product_categories_id']);
                                $total_products = count($query->fetchAll(PDO::FETCH_ASSOC));
                                ?>
                                <li>
                                    <a href="product_list.php?category_id=<?php echo $side_categories['product_categories_id']; ?>"> 
                                    <?php echo $side_categories['category']; ?> <span class="badge pull-right"><?php echo $total_products; ?></span></a>
                                    
                                </li>
                            <?php } ?>

                            </ul>

                        </div>
                    </div>


                    
                    

                    <!-- *** MENUS AND FILTERS END *** -->

                    <div class="banner">
                        <a href="#">
                        
                        </a>
                    </div>
                </div>

                <div class="col-md-9">

                    <div class="row">
                        <div class="col-sm-12">
                        <?php foreach($product_list as $product){ ?>
                        <div class="col-sm-3">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="product.php?id=<?php echo $product['products_id']; ?> ">
                                                <img src="../uploads/products/<?php echo $product['picture']; ?>" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="product.php?id=<?php echo $product['products_id']; ?> ">
                                                <img src="../uploads/products/<?php echo $product['picture']; ?>" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="product.php?id=<?php echo $product['products_id']; ?> " class="invisible">
                                    <img src="../uploads/products/<?php echo $product['picture']; ?>" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><a href="product.php?id=<?php echo $product['products_id']; ?>"><?php echo $product['name']; ?></a></h3>
                                    <p class="price">$NT <?php echo $product['price']; ?></p>

                                </div>

                                <!-- /.text -->
                                <?php if($product['type'] == 1){ ?>
                                <div class="ribbon new">
                                    <div class="theribbon">NEW</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <?php }else if($product['type'] == 2){ ?>
                                <!-- /.ribbon -->
                                <div class="ribbon sale">
                                    <div class="theribbon">SALE</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <?php }?>

                            </div>
                            <!-- /.product -->
                        </div>
                        <?php } ?>
                   
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