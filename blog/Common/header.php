<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <title>Home</title>
  <meta name="author" content="JeJe">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta property="og:site_name" content="JeJe~"/>
  <meta property="og:image" content="undefined"/>
  <link rel="stylesheet" href="./public/css/style.css" media="screen" type="text/css">
  <link rel="stylesheet" href="./public/css/bootstrap.min.css">
</head>

<body>
<header id="header" class="inner"><div class="alignleft">
</div>
<nav id="main-nav" class="alignleft">
  <ul>
      <li><a style="font-size:16px;" href="./"><span style="color: #999;" class="glyphicon glyphicon-home" ></span> Home</a></li>
      <?php if (empty($_SESSION['userInfo'])) {?>
      <li><a style="font-size:16px;" href="./login.php"><span style="color: #999;" class="glyphicon glyphicon-plus" ></span> Writer</a></li>
      <?php }else {?>
      <li><a style="font-size:16px;" href="./create.php"><span style="color: #999;" class="glyphicon glyphicon-plus" ></span> Writer</a></li>
      <?php }?>
  </ul>
  <div class="clearfix"></div>
</nav>
<nav id="main-nav" class="alignright">
    <ul>
    <?php if (empty($_SESSION['userInfo'])){?>
        
        <li><a style="font-size:16px;" href="./login.php"><span style="color: #999;" class="glyphicon glyphicon-log-in" ></span> Sign In</a>
          &nbsp;&nbsp;<span style="font-size: 14px;">Or</span>&nbsp;&nbsp;<a  style="font-size:16px;" href="./register.php"><span style="color: #999;" class="glyphicon glyphicon-user" ></span>  Sign Up</a></li>
          <?php } else {?>
        
        <li><a style="font-size:16px;" href="./action.php?a=logout"><span style="color: #999;" class="glyphicon glyphicon-log-out" ></span>  <?php echo $_SESSION['userInfo']['nikename']?> </a></li>
        <?php } ?>
    </ul>
    <div class="clearfix"></div>
</nav>

<div class="clearfix"></div>
<div></div>
</header>