<?php

require_once '../config.php';

//TODO: 校验并持久化
function login(){
    global $imasge;

    if (empty($_POST['email'])){
        $imasge = "请输入邮箱";
        return;
    }
    if(empty($_POST['password'])){
        $imasge = "请输入密码";
        return;
    }
    //接收输入的用户名与密码
    $email = $_POST['email'];
    $pwd = $_POST['password'];

 
    //TODO: 连接数据库校验用户名与密码


//-----------------登陆成功------------------------

    //TODO: 设置访问控制

  

}
if ($_SERVER['REQUEST_METHOD'] === 'POST'){

        login();

}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Sign in &laquo; Admin</title>
  <link rel="stylesheet" href="/static/assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="/static/assets/css/admin.css">
</head>
<body>
  <div class="login">
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" class="login-wrap">
      <img class="avatar" src="/static/assets/img/default.png">
      <!-- 有错误信息时展示 -->
        <?php if (isset($imasge)): ; ?>
       <div class="alert alert-danger">
        <strong>错误！</strong><?php echo $imasge; ?>
      </div>
        <?php endif ?>
      <div class="form-group">
        <label for="email" class="sr-only">邮箱</label>
        <input id="email" name="email" type="email" class="form-control" placeholder="邮箱" autofocus value="<?php echo isset($_POST['email'])? $_POST['email']:''; ?>">
      </div>
      <div class="form-group">
        <label for="password" class="sr-only">密码</label>
        <input id="password" name="password" type="password" class="form-control" placeholder="密码">
      </div>
      <button class="btn btn-primary btn-block">登 录</button>
    </form>
  </div>
<script src="/static/assets/vendors/jquery/jquery.js"></script>
<script>

    $(function ($) {
        $('#email').on('blur',function () {
            var reg=/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
            var val = $(this).val();
           if (reg.test(val)) {

               $.get('/admin/api/avatar.php',{email:val},function (data) {
                   if (!data){
                       return;
                   }
                    console.log(data);
                    $('.avatar').attr('src',data);
               });
           }

        });
    });

</script>
</body>
</html>
