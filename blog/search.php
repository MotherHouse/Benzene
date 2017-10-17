<?php
  include './Common/header.php';
  //获取搜索关键字
  $keyword = $_GET['q'];
  // echo $keyword;exit;
require_once("connectdb.php");
  //4.准备sql语句  like 模糊搜索
  $sql = "select * from posts where title like '%$keyword%'order by id desc";
  //5.发送并且执行sql语句
  $result = mysqli_query($link, $sql);
  //6.获取所有结果集存入自定义数组
  while($row = mysqli_fetch_assoc($result)) {
      $list[] = $row;
  }
?>
  <div id="content" class="inner">
    <div id="main-col" class="alignleft"><div id="wrapper">
<h2 class="archive-title">搜索结果</h2>
  <div class="archive">
    <?php if (empty($list)) { ?>
     <article class="post">
        <div class="post-content">
          <header>
              <h1 class="title"><a href="./list.php">暂无数据....</a></h1>
          </header>
        </div>
      </article>
    <?php }else { ?>
    <?php foreach($list as $val):?>
      <article class="post">
        <div class="post-content">
          <header>
            <div class="icon"></div>
            <time datetime="2017-06-22T11:33:48.000Z"><a href="./list.php?id=<?php echo $val['id'];?>">2017-06-22</a></time>
              <h1 class="title"><a href="./list.php?id=<?php echo $val['id'];?>"><?php echo $val['title']?></a></h1>
          </header>
        </div>
      </article>
    <?php endforeach;?>
    <?php } ?>
  </div>
</div></div>
    <aside id="sidebar" class="alignright">
  <div class="search">
  <form action="./search.php" method="get" accept-charset="utf-8">
    <input type="search" name="q" results="0" placeholder="Suche">
  </form>
</div>

<section id="comment">
  <h1 class="title" style="font-size: 18px;">友情连接</h1>
  <div class="hr"></div>
  <div id="fb-root">
    <a href="http://www.3maio.com" target="_blank">Cpphp</a>
  </div>
</section>

</aside>
    <div class="clearfix"></div>
  </div>
<?php
  include './Common/footer.php';
?>
