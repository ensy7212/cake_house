<?php
session_start();
require_once('../connection/connection.php');
if(isset($_POST['EditForm']) && $_POST['EditForm'] == "UPDATE"){
    $updated_at = date('Y-m-d H:i:s');
    $sql= "UPDATE members SET name=:name, birthday=:birthday, gender=:gender, zipcode=:zipcode, county=:county, district=:district,address=:address,phone=:phone, mobile=:mobile, email=:email, updated_at=:updated_at WHERE members_id=:members_id";
    $sth = $db ->prepare($sql);
    $sth ->bindParam(":name", $_POST['name'], PDO::PARAM_STR);
    $sth ->bindParam(":birthday", $_POST['birthday'], PDO::PARAM_STR);
    $sth ->bindParam(":gender", $_POST['gender'], PDO::PARAM_STR);
    $sth ->bindParam(":zipcode", $_POST['zipcode'], PDO::PARAM_STR);
    $sth ->bindParam(":county", $_POST['county'], PDO::PARAM_STR);
    $sth ->bindParam(":district", $_POST['district'], PDO::PARAM_STR);
    $sth ->bindParam(":address", $_POST['address'], PDO::PARAM_STR);
    $sth ->bindParam(":phone", $_POST['phone'], PDO::PARAM_STR);
    $sth ->bindParam(":mobile", $_POST['mobile'], PDO::PARAM_STR);
    $sth ->bindParam(":email", $_POST['email'], PDO::PARAM_STR);
    $sth ->bindParam(":updated_at", $updated_at, PDO::PARAM_STR);
    $sth ->bindParam(":members_id", $_SESSION['member']['members_id'], PDO::PARAM_INT);
    $result = $sth ->execute();
    if($result){
        $query = $db->query("SELECT * FROM members WHERE members_id=".$_SESSION['member']['members_id']);
        $_SESSION['member'] = $query->fetch(PDO::FETCH_ASSOC);

        header('Location: customer-account.php?msg="success"');
    }else{
        echo "error";
    }
  }
  //改密碼
  if(isset($_POST['EForm']) && $_POST['EForm'] == "UPDATE"){
    if($_POST['password_check'] == $_POST['password_new'] && $_POST['password_old'] == $_SESSION['member']['password']){
        $chang_password_syntax = "UPDATE members SET password=:password WHERE account=:account";
        $sth2 = $db ->prepare($chang_password_syntax);
        $sth2 ->bindParam(":password", $_POST['password_new'], PDO::PARAM_STR);
        $sth2 ->bindParam(":account", $_SESSION['member']['account'], PDO::PARAM_STR);
        $sth2 ->execute();
      }
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
                        <li>會員資料</li>
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
                                <li>
                                    <a href="customer-orders.php"><i class="fa fa-list"></i> 我的訂單</a>
                                </li>
                                <li class="active">
                                    <a href="customer-account.php"><i class="fa fa-user"></i> 會員資料</a>
                                </li>
                                <li>
                                    <a href="logout.php"><i class="fa fa-sign-out"></i> 登出</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <!-- /.col-md-3 -->

                    <!-- *** CUSTOMER MENU END *** -->
                </div>

                <div class="col-md-9">
                    <div class="box">
                        <h1>會員基本資料</h1>
                        <p class="lead">編輯您的會員資料</p>
                        <p class="text-muted">此資料協助我們寄送產品與提供更多優惠訊息，請務必填寫真實資料</p>
                        <?php if(isset($_GET['msg']) && $_GET['msg'] != null){ ?>
                        <div class="alert alert-success">
                            <strong>更新成功!</strong>
                        </div>
                        <?php } ?>
                        <h3>變更密碼</h3>

                        <form action="customer-account.php" method="post">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="password_old">舊密碼</label>
                                        <input type="password" class="form-control" id="password_old" name="password_old">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="password_1">新密碼</label>
                                        <input type="password" class="form-control" id="password_new" name="password_new">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="password_2">再次輸入新密碼</label>
                                        <input type="password" class="form-control" id="password_check" name="password_check">
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->

                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> 修改密碼</button>
                                <input type="hidden" name="EForm" value="UPDATE">
                            </div>
                        </form>

                        <hr>

                        <h3>個人資料</h3>
                        <form action="customer-account.php" method="post">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="firstname">姓名</label>
                                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $_SESSION['member']['name']; ?>">
                                    </div>
                                </div>

                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="company">生日</label>
                                        <input type="text" class="form-control" id="birthday" name="birthday" value="<?php echo $_SESSION['member']['birthday']; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="street">性別</label>
                                        <div class="form-control" style="border:none;">
                                            <label class="radio-inline"><input type="radio" name="gender" value="1" checked>男</label>
                                            <label class="radio-inline"><input type="radio" name="gender" value="0" >女</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->

                            <div class="row">
                            <div id="twzipcode">
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="zip">郵遞區號</label>
                                        <input type="text" class="form-control" id="zipcode" name="zipcode" value="<?php echo $_SESSION['member']['zipcode']; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="state">城市</label>
                                        <select class="form-control" id="county" name="county"></select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="country">地區</label>
                                        <select class="form-control" id="district" name="district"></select>
                                    </div>
                                </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="city">地址</label>
                                        <input type="text" class="form-control" id="address" name="address" value="<?php echo $_SESSION['member']['address']; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="phone">家用電話</label>
                                        <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $_SESSION['member']['phone']; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="phone">行動電話</label>
                                        <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $_SESSION['member']['mobile']; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">備用Email</label>
                                        <input type="text" class="form-control" id="email" name="email" value="<?php echo $_SESSION['member']['email']; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-12 text-center">
                                    <input type="hidden" name="EditForm" value="UPDATE">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> 更新資料</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


        <?php require_once('template/footer.php'); ?>
        <script src="../js/jquery.twzipcode.min.js"></script>
                 
        <script>
        $(function(){
            $('#twzipcode').twzipcode({
                'zipcodeSel'  : '106', // 此參數會優先於 countySel, districtSel
                'countySel'   : '臺北市',
                'districtSel' : '大安區'
            });
            $('#twzipcode').find('select[name="county"]').eq(1).remove();
            $('#twzipcode').find('select[name="district"]').eq(1).remove();
            $('#twzipcode').find('input[name="zipcode"]').eq(1).remove();
        });
        </script>


</body>

</html>
