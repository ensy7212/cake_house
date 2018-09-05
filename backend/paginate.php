<?php
require('../function/connection.php'); 
$limit = 2;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
$start_from = ($page-1) * $limit;
$query = $db->query("SELECT * FROM news ORDER BY PublishedDate DESC LIMIT ".$start_from.",". $limit);

$news = $query->fetchAll(PDO::FETCH_ASSOC);
$totalRows = count($news);
 ?>
<html><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../css/admin.css" rel="stylesheet" type="text/css">
  </head><body>
    <div class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">CakeHouse<br></a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-ex-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">頁面管理 &nbsp;<i class="fa fa-caret-down"></i></a>
              <ul class="dropdown-menu" role="menu">
                <li>
                  <a href="../page/edit.php?PageID=1">關於我們</a>
                </li>
                <li>
                  <a href="../page/edit.php?PageID=2">購物說明</a>
                </li>
                <li>
                  <a href="../page/edit.php?PageID=3">會員條款</a>
                </li>
              </ul>
            </li>
            <li class="active">
              <a href="../news/list.php">最新消息管理</a>
            </li>
            <li>
              <a href="../product_category/list.php">產品管理<br></a>
            </li>
            <li>
              <a href="#">會員管理</a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">訂單管理 &nbsp;<i class="fa fa-caret-down"></i></a>
              <ul class="dropdown-menu" role="menu">
                <li>
                  <a href="#">新訂單</a>
                </li>
                <li>
                  <a href="#">已付款</a>
                </li>
                <li>
                  <a href="#">出貨中</a>
                </li>
                <li class="divider"></li>
                <li>
                  <a href="#">已出貨</a>
                </li>
                <li class="divider"></li>
                <li>
                  <a href="#">已送達(交易完成)</a>
                </li>
                <li class="divider"></li>
                <li>
                  <a href="#">取消訂單</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1>最新消息管理</h1>
          </div>
        </div>
      </div>
    </div>
    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <ul class="breadcrumb">
              <li>
                <a href="#">主控台</a>
              </li>
              <li class="active">最新消息管理</li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <a href="create.php" class="btn btn-primary">新增一筆</a>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <hr>
            <?php if($totalRows > 0){ ?>
            <table class="table">
              <thead>
                <tr>
                  <th>發佈日期</th>
                  <th>新聞標題</th>
                  <th>新聞內容</th>
                  <th>編輯</th>
                  <th>刪除</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($news as $row){ ?>
                <tr>
                  <td><?php echo $row['PublishedDate']; ?></td>
                  <td><?php echo $row['Title']; ?></td>
                  <td><?php echo $row['Content']; ?></td>
                  <td><a href="edit.php?NewsID=<?php echo $row['NewsID']; ?>" class="btn btn-default"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
                  <td><a href="delete.php?NewsID=<?php echo $row['NewsID']; ?>" class="btn btn-default" onclick="if(!confirm('是否確定刪除此筆資料?刪除後無法回復')){return false;};"><i class="fa fa-times" aria-hidden="true"></i></a></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
            <?php }else{ ?>
              <p>
                目前無資料，請新增一筆。
              </p>
              <?php } ?>
          </div>
        </div>
        <?php  if($totalRows > 0){
            $sth = $db->query("SELECT * FROM news ORDER BY PublishedDate DESC ");
            $data_count = count($sth ->fetchAll(PDO::FETCH_ASSOC));
            $total_pages = ceil($data_count / $limit);
           ?>
        <div class="row">
          <div class="col-md-12 text-center">
            <ul class="pagination">
              <?php   if($page > 1){ ?>
                <li>
                  <a href="list.php?page=<?php echo $page-1;?>">上一頁</a>
                </li>
                <?php }else{ ?>
                  <li>
                    <a href="#">上一頁</a>
                  </li>
                  <?php } ?>
              <?php for ($i=1; $i<=$total_pages; $i++) { ?>

              <li>
                <a href="list.php?page=<?php echo $i;?>"><?php echo $i;?></a>
              </li>
              <?php } ?>
              <?php if($page < $total_pages){ ?>
              <li>
                <a href="list.php?page=<?php echo $page+1;?>">下一頁</a>
              </li>
              <?php }else{ ?>
                <li>
                  <a href="#">下一頁</a>
                </li>
                <?php } ?>
            </ul>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
    <footer class="section section-primary">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <h1>Cake House</h1>
            <p>2016 © Cake House Co. Ltd. All Right Reserved.
              <br>
              <br>
            </p>
          </div>
        </div>
      </div>
    </footer>


</body></html>
