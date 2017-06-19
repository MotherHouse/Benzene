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
                    <img src="Public/images/logo.png" alt="">
                </a>
            </div>
            <ul class="nav navbar-nav navbar-left">
                <li><a href="index.php" <?php if($result['catId'] == 0): ?>class="curr"<?php endif; ?>>首页</a></li>
                <?php if(is_array($navs)): foreach($navs as $key=>$vo): ?><li><a href="index.php?c=cat&id=<?php echo ($vo["menu_id"]); ?>" <?php if($vo['menu_id'] == $result['catId']): ?>class="curr"<?php endif; ?>><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; ?>
            </ul>
        </div>
    </div>
</header>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-9 col-md-9">

                    <div class="news-list">
                        <?php if(is_array($result['listNews'])): $i = 0; $__LIST__ = $result['listNews'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dl>
                            <dt><?php echo ($vo["title"]); ?></dt>
                            <dd class="news-img">
                                <a target="_blank" href="index.php?c=detail&id=<?php echo ($vo["news_id"]); ?>"><img width="200" height="120" src="<?php echo ($vo["thumb"]); ?>" alt="<?php echo ($vo["title"]); ?>"></a>
                            </dd>
                            <dd class="news-intro">
                                <?php echo ($vo["description"]); ?>
                            </dd>
                            <dd class="news-info">
                                <?php echo ($vo["keywords"]); ?> <span><?php echo (date("Y-m-d H:i:s",$vo["create_time"])); ?></span>阅读
                            </dd>
                        </dl><?php endforeach; endif; else: echo "" ;endif; ?>
                        <nav>
                            <ul class="pagination">
                                <?php echo ($result["pageRes"]); ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>