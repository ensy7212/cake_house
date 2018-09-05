<?php 
require_once('../function/login_check.php');
require('../../connection/connection.php'); ?>
<?php


if(isset($_POST['EditForm']) && $_POST['EditForm'] == "UPDATE"){
  $sql= "UPDATE product_categories SET created_at=:created_at, category=:category, orders=:orders WHERE product_categories_id=:product_categories_id";
  $sth = $db ->prepare($sql);
  $sth ->bindParam(":created_at", $_POST['created_at'], PDO::PARAM_STR);
  $sth ->bindParam(":category", $_POST['category'], PDO::PARAM_STR);
  $sth ->bindParam(":orders", $_POST['orders'], PDO::PARAM_INT);
  $sth ->bindParam(":product_categories_id", $_POST['product_categories_id'], PDO::PARAM_INT);
  $sth ->execute();

  header('Location: list.php');
}else{
  $query = $db->query("SELECT * FROM product_categories WHERE product_categories_id =".$_GET['product_categories_id']);
  $product_categories = $query->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="../../js/jquery-ui-1.12.1/jquery-ui.min.css" type="text/css">
  <link rel="stylesheet" href="../css/theme.css" type="text/css"> 
</head>

<body>
  <?php require_once('../function/backend_nav.php'); ?>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="">產品分類管理</h1>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5 text-center">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-left">
          <ul class="breadcrumb" style="margin-bottom: 0px; margin-top: 0px;">
            <li class="breadcrumb-item">
              <a href="#">主控台</a>
            </li>
            <li class="breadcrumb-item">產品分類管理</li>
            <li class="breadcrumb-item active">編輯</li>
          </ul>
          <br>
          <!-- <a href="list.php" class="btn btn-outline-primary m-2">回上一頁</a> -->
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <form class="" action="edit.php" method="post" id="Form" data-toggle="validator">
            <div class="form-group form-row">
              <label class="col-sm-2 col-form-label">產品分類</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="category" value="<?php echo $product_categories['category']; ?>" data-error="請輸入產品分類" required>
                <div class="help-block with-errors text-left alert-danger"></div>
              </div>
            </div>
            <div class="form-group form-row">
							<label class="col-sm-2 col-form-label">排序</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="orders" value="<?php echo $product_categories['orders']; ?>" data-error="請輸入排序" required>
                <div class="help-block with-errors text-left alert-danger"></div>
							</div>
						</div>
            <div class="col-md-12 text-right">
              <a href="list.php" class="btn btn-primary">取消並回上一頁</a>
              <button type="submit" class="btn btn-primary">確認送出</button>
              <input type="hidden" name="product_categories_id" value="<?php echo $product_categories['product_categories_id']; ?>">
              <input type="hidden" name="updated_at" value="<?php echo date('Y-m-d H:i:s'); ?>">
              <input type="hidden" name="EditForm" value="UPDATE">
            </div>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12"> </div>
      </div>
    </div>
  </div>
  <div class="py-5 bg-dark text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mt-3 text-center">
          <p>© Copyright 2018 Cake House - All rights reserved.</p>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
	    crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
	    crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
	    crossorigin="anonymous"></script>
	<script src="../../js/jquery.js"></script>
	<script src="../../js/jquery-ui-1.12.1/jquery-ui.min.js"></script>
	<script src="../../js/tinymce/tinymce.min.js"></script>
	<script src="../../js/validator.js"></script>

	<script>
		$(".na4").css({
			"color": "white",
			"font-size": "17px",
		});
	</script>

</body>

</html>