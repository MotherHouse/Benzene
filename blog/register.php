<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sign Up</title>
    <link href="./public/css/bootstrap.min.css" rel="stylesheet">
    <link href="./public/css/signin.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <form class="form-signin" method="POST" action="./action.php?a=register">
        <h2 class="form-signin-heading"><span class="glyphicon glyphicon-user" ></span> Sign Up</h2>
        <div style="float: right; margin-bottom: 10px;">
            <a style="color:#999;" href="./login.php" ><span style="color: #999;" class="glyphicon glyphicon-log-in" ></span> Sign In</a>
        </div>
        <label for="name" class="sr-only">昵称</label>
        <input type="text" name="nikename" id="name" class="form-control"  value="" placeholder="NickName" required autofocus>
        <span style="color: #a94442;"> </span>
        <br>
        <label for="inputEmail" class="sr-only">邮箱</label>
        <input type="email" name="email"  value="" id="inputEmail" class="form-control" placeholder="Email Address For Login" required autofocus>
        <span style="color: #a94442;"> </span>
        <br>
        <label for="inputPassword" class="sr-only">密码</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <br>
        <label class="sr-only">重复密码</label>
        <input type="password" name="repassword" class="form-control" placeholder="Repeat Password" required>
        <span style="color: #a94442;"> </span>
        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button>
        <div style="margin-top: 10px;text-align: center;">
            <a style="color:#999;" href="./" ><span style="color: #999;font-size: 16px;" class="glyphicon glyphicon-home" ></span> Home</a>
        </div>
    </form>
</div>
</body>
</html>
