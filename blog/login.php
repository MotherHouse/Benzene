<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sign In</title>
    <style>
        #embed-captcha {
            width: 300px;
            margin: 0 auto;
        }
        .show {
            display: block;
        }
        .hide {
            display: none;
        }
        #notice {
            color: red;
        }
    </style>
    <link href="./public/css/bootstrap.min.css" rel="stylesheet">
    <link href="./public/css/signin.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <form class="form-signin" method="POST" action="./action.php?a=login">
        <h2 class="form-signin-heading"><span  class="glyphicon glyphicon-log-in" ></span>  Sign In</h2>
        <div style="float: right; margin-bottom: 10px;">
            <a style="color:#999;" href="./register.php" ><span style="color: #999;" class="glyphicon glyphicon-user" ></span> Sign Up</a>
        </div>
        <label for="inputEmail" class="sr-only">邮箱</label>
        <input type="text" name="email" id="inputEmail"  value="" class="form-control" placeholder="Enter You Email Address" required autofocus>
        <span style="color: #a94442;"> </span>
        <br>
        <label for="inputPassword" class="sr-only">密码</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <span style="color: #a94442;"> </span>
        <br>

        <div id="embed-captcha"></div>
        <p id="wait" class="show">正在加载验证码......</p>
        <p id="notice" class="hide">请先完成验证</p>
        <br>

        <button class="btn btn-lg btn-primary btn-block"   type="submit" id="btn">Sign In</button>

        <div style="margin-top: 10px;text-align: center;">
            <a style="color:#999;" href="./" ><span style="color: #999;font-size: 16px;" class="glyphicon glyphicon-home" ></span> Home</a>
        </div>
    </form>
    <script src="./public/js/jquery-3.2.1.min.js"></script>
    <script src="./public/js/gt.js"></script>
    <script>
    var handlerEmbed = function (captchaObj) {
        $("#btn").click(function (e) {
            var validate = captchaObj.getValidate();
            if (!validate) {
                $("#notice")[0].className = "show";
                setTimeout(function () {
                    $("#notice")[0].className = "hide";
                }, 2000);
                e.preventDefault();
            }
        });
        // 将验证码加到id为captcha的元素里，同时会有三个input的值：geetest_challenge, geetest_validate, geetest_seccode
        captchaObj.appendTo("#embed-captcha");
        captchaObj.onReady(function () {
            $("#wait")[0].className = "hide";
        });
        // 更多接口参考：http://www.geetest.com/install/sections/idx-client-sdk.html
    };

    $.ajax({
        // 获取id，challenge，success（是否启用failback）
        url: "./action.php?a=code&t=" + (new Date()).getTime(), // 加随机数防止缓存
        type: "get",
        dataType: "json",
        success: function (data) {
            console.log(data);
            // 使用initGeetest接口
            // 参数1：配置参数
            // 参数2：回调，回调的第一个参数验证码对象，之后可以使用它做appendTo之类的事件
            initGeetest({
                gt: data.gt,
                challenge: data.challenge,
                new_captcha: data.new_captcha,
                product: "embed", // 产品形式，包括：float，embed，popup。注意只对PC版验证码有效
                offline: !data.success // 表示用户后台检测极验服务器是否宕机，一般不需要关注
                // 更多配置参数请参见：http://www.geetest.com/install/sections/idx-client-sdk.html#config
            }, handlerEmbed);
        }
    });
</script>
</body>
</html>

