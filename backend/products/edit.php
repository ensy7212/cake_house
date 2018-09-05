<?php 
require_once('../function/login_check.php');
require('../../connection/connection.php'); ?>
<?php


if(isset($_POST['EditForm']) && $_POST['EditForm'] == "UPDATE"){
  $filename = $_POST['old_picture'];
  if(isset($_FILES['picture']['name']) && $_FILES['picture']['name'] != null){
    unlink("../../uploads/products/".$_POST['old_picture']);
    $filename = $_FILES['picture']['name'];
    $file_path = "../../uploads/products/".$_FILES['picture']['name'];
    move_uploaded_file($_FILES['picture']['tmp_name'], $file_path);
  }else{
    $filename = $_POST['old_picture'];
  }

  $sql= "UPDATE products SET picture=:picture, name=:name, price=:price, description=:description, updated_at=:updated_at WHERE products_id=:products_id";
  $sth = $db ->prepare($sql);
  $sth ->bindParam(":picture", $filename, PDO::PARAM_STR);
  $sth ->bindParam(":name", $_POST['name'], PDO::PARAM_STR);
  $sth ->bindParam(":price", $_POST['price'], PDO::PARAM_STR);
  $sth ->bindParam(":description", $_POST['description'], PDO::PARAM_STR);
  $sth ->bindParam(":updated_at", $_POST['updated_at'], PDO::PARAM_STR);
  $sth ->bindParam(":products_id", $_POST['products_id'], PDO::PARAM_INT);
  $sth ->execute();

  header('Location: list.php?product_categories_id='.$_POST['product_categories_id']);
}else{
  $query = $db->query("SELECT * FROM products WHERE products_id =".$_GET['products_id']);
  $products = $query->fetch(PDO::FETCH_ASSOC);
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
          <h1 class="">產品管理</h1>
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
            <li class="breadcrumb-item">產品管理</li>
            <li class="breadcrumb-item active">編輯</li>
          </ul>
          <br>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<form class="" action="edit.php" method="post" enctype="multipart/form-data" id="Form" data-toggle="validator">
						<div class="form-group form-row">
							<label class="col-sm-2 col-form-label">產品圖片</label>
							<div class="col-sm-10">
								<img src="../../uploads/products/<?php echo $products['picture']; ?>" alt="" width="40%">
								<input type="file" class="form-control" name="picture" id="picture"> </div>
							<input type="hidden" name="old_picture" value="<?php echo $products['picture']; ?>">
						</div>
						<div class="form-group form-row">
							<label class="col-sm-2 col-form-label">產品名稱</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="name" id="name" value="<?php echo $products['name']; ?>" data-error="請輸入產品名稱" required>
                <div class="help-block with-errors text-left alert-danger"></div>
						  </div>
            </div>
						<div class="form-group form-row">
							<label class="col-sm-2 col-form-label">價格</label>
							<div class="col-sm-10">
								<input row="8" class="form-control" name="price" value="<?php echo $products['price']; ?>" data-error="請輸入價格" required>
                <div class="help-block with-errors text-left alert-danger"></div>
							</div>
						</div>
						<div class="form-group form-row">
							<label class="col-sm-2 col-form-label">產品說明</label>
							<div class="col-sm-10">
								<textarea row="8" class="form-control" name="description">
									<?php echo $products['description']; ?>
								</textarea>
							</div>
						</div>
						<div class="col-md-12 text-right">
							<a href="list.php?product_categories_id=<?php echo $_GET['product_categories_id']; ?>" class="btn btn-primary">取消並回上一頁</a>
							<!-- <input type="reset" class="btn btn-primary" value="取消並回上一頁"> -->
							<button type="submit" class="btn btn-primary">確認送出</button>
							<input type="hidden" name="product_categories_id" value="<?php echo $_GET['product_categories_id']; ?>">
							<input type="hidden" name="products_id" value="<?php echo $_GET['products_id']; ?>">
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
    // Tinymce
    tinymce.init({
  selector: 'textarea',
  height: 500,
  menubar: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor textcolor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code help wordcount'
  ],
  toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css']
});
  </script>
	<script>
		$(function () {
			$("#published_date").datepicker({
				dateFormat: "yy-mm-dd"
			});
		});
	</script>
	<script>
		$(".na4").css({
			"color": "white",
			"font-size": "17px",
		});
	</script>


</body>

</html>