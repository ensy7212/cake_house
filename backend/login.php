<!DOCTYPE html>
<html lang="en">
<head>
	<title>Cake House後台管理系統</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('../images/bg_1.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					管理者登入
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5" action="check_user.php" method="post">

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="User name">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>
					<?php if(isset($_GET['Error']) && $_GET['Error'] != null){ ?>
					<div class="wrap-input100 text-center" style="color:#f00;">
					帳號密碼錯誤，請重新登入
					</div>
					<?php } ?>
					<?php if(isset($_GET['msg']) && $_GET['msg'] != null){ ?>
					<div class="wrap-input100 text-center" style="color:#333;">
					<?php echo $_GET['msg']; ?>
					</div>
					<?php } ?>
					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn">
							登入
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>

</body>
</html>