<?php 
session_start();
require_once('../connection/connection.php');

$query = $db->query("SELECT * FROM customer_orders WHERE members_id=". $_SESSION['member']['members_id']." ORDER BY order_date DESC");
$member = $query->fetch(PDO::FETCH_ASSOC);
$query = $db->query("SELECT * FROM order_details WHERE customer_orders_id=".$member['customer_orders_id']);
$order_details = $query->fetchAll(PDO::FETCH_ASSOC);
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
                        <li><a href="customer-orders.php">我的訂單</a>
                        </li>
                        <li>訂單 <?php echo $member['order_no'];?></li>
                    </ul>

                </div>

                <div class="col-md-3">
                    <!-- *** CUSTOMER MENU ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">會員專區</h3>
                        </div>

                        <div class="panel-body">

                            <ul class="nav nav-pills nav-stacked">
                                <li class="active">
                                    <a href="customer-orders.php"><i class="fa fa-list"></i> 訂單明細</a>
                                </li>
                                <li>
                                    <a href="customer-account.php"><i class="fa fa-user"></i> 會員資料</a>
                                </li>
                                <li>
                                    <a href="logout_success.php"><i class="fa fa-sign-out"></i> 登出</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <!-- /.col-md-3 -->

                    <!-- *** CUSTOMER MENU END *** -->
                </div>

                <div class="col-md-9" id="customer-order">
                    <div class="box">
                        <h1>訂單 <?php echo $member['order_no'];?></h1>

                        <p class="lead">訂單 <?php echo $member['order_no'];?> 於 <strong><?php echo $member['order_date'];?></strong> 成立，目前狀態為<strong>
                                        <?php if($member['status'] == 0){ ?>
                                        待付款
                                        <?php } ?>
                                        <?php if($member['status'] == 1){ ?>
                                        已付款
                                        <?php } ?>
                                        <?php if($member['status'] == 99){ ?>
                                        取消訂單
                                        <?php } ?>
                                        <?php if($member['status'] == 3){ ?>
                                        出貨中
                                        <?php } ?>
                                        <?php if($member['status'] == 2){ ?>
                                        運送中
                                        <?php } ?>
                                        </strong></p>
                        <p class="text-muted">有任何問題請 <a href="contact.php">聯絡我們</a>, 我們將盡快回覆您.</p>

                        <hr>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th colspan="2" >產品圖片</th>
                                    <th >產品名稱</th>
                                    <th>數量</th>
                                    <th>單價</th>
                                    <th>小計</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($order_details as $customer_orders) { ?>
                                    <tr>
                                    
                                        <td colspan="2">
                                            <a href="#">
                                                <img src="../uploads/products/<?php echo $customer_orders['picture'];?>" alt="">
                                            </a>
                                        </td>
                                        <td><?php echo $customer_orders['name'];?></td>
                                        <td><?php echo $customer_orders['quantity'];?></td>
                                        <td><?php echo $customer_orders['price'];?></td>
                                      
                                        <td >$NT <?php echo $customer_orders['quantity']*$customer_orders['price'];?></td>
                                 
                                    </tr>   <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="5" class="text-right">訂單總計</th>
                                        <th>$NT <?php echo $member['total_price'];?></th>
                                    </tr>
                                    <tr>
                                        <th colspan="5" class="text-right">運費</th>
                                        <th>$NT <?php echo $member['shipping'];?></th>
                                    </tr>
                                   
                                    <tr>
                                        <th colspan="5" class="text-right">合計</th>
                                        <th>$NT <?php echo $member['total_price']+$member['shipping'];?></th>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                        <!-- /.table-responsive -->

                        <div class="row addresses">
                            <div class="col-md-12">
                                <h2>收件者資訊</h2>
                                <p><?php echo $_SESSION['member']['name'];?> 先生 / 小姐
                                    <br><?php echo $_SESSION['member']['zipcode'].$_SESSION['member']['county'].$_SESSION['member']['district'].$member['address'];?>
                                    <br><?php echo $member['memo'];?>
                                    </p>
                            </div>
                            
                        </div>

                    </div>
                </div>

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


       <?php require_once('template/footer.php'); ?>



</body>

</html>
