<?php if (!defined('THINK_PATH')) exit(); $config = D("Basic")->select(); $navs = D("Menu")->getBarMenus(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo ($config["title"]); ?></title>
    <meta name="keywords" content="<?php echo ($config["keywords"]); ?>">
    <meta name="description" content="<?php echo ($config["description"]); ?>">
    <link rel="stylesheet" href="Public/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="Public/css/home/main.css" type="text/css" />
</head>
<body>
<header id="header">
    <div class="navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <a href="index.php">
                    <img src="Public/images/logo1.png" alt="">
                </a>
            </div>
            <ul class="nav navbar-nav navbar-left">
                <li><a href="index.php" <?php if($result['catId'] == 0): ?>class="curr"<?php endif; ?>>首页</a></li>
                <?php if(is_array($navs)): foreach($navs as $key=>$vo): ?><li><a href="index.php?c=cat&id=<?php echo ($vo["menu_id"]); ?>" <?php if($vo['menu_id'] == $result['catId']): ?>class="curr"<?php endif; ?>><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; ?>
            </ul>
        </div>
    </div>
</header>
<?php
$vo = $result['news']; ?>
<section>
    <div class="container">
        <div class="row">
            <div>
                <div class="news-detail">
                    <h1><?php echo ($vo["title"]); ?></h1>
                    <br />
                    <?php echo ($vo["content"]); ?>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
<script src="public/js/jquery.js"></script>
</html>