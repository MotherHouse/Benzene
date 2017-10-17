<?php
  session_start();
  //包含外部文件
  include './Common/header.php';

  require_once("connectdb.php");
  //4.准备sql语句
  $sql = "select * from posts order by id desc";
  //5.发送并且执行sql语句
  $result = mysqli_query($link,$sql);
  //6.获取所有结果集存入自定义数组
  while ($row = mysqli_fetch_assoc($result)) {
    $list[] = $row;
  }
?>
  <div id="content" class="inner">
    <div id="main-col" class="alignleft"><div id="wrapper">
    <!-- 数组的遍历输出 -->
  <?php
  if(empty($list)){?>
      <article class="post">
        <div class="post-content">
          <header>
              <div class="icon"></div>
              <h1 class="title"><a href="./list.php">暂无数据.......</a></h1>
          </header>
        </div>
      </article>
  <?php }else {  ?>
  <?php foreach($list as $val):?>
      <article class="post">
        <div class="post-content">
          <header>
              <div class="icon"></div>
              <time><?php echo date('Y-m-d', $val['addtime']);?></time>
          <h1 class="title"><a href="./list.php?id=<?php echo $val['id'];?>"><?php echo $val['title'];?></a></h1>
          </header>
          <div class="entry" style="word-wrap: break-word;">
              <p><?php echo mb_substr($val['content'], 0, 100).'....';?></p>
          </div>
          <footer>
                <div class="alignleft">
                  <a href="./list.php?id=<?php echo $val['id'];?>" class="more-link">More</a>
                </div>
            <div class="clearfix"></div>
          </footer>
        </div>
      </article>
  <?php endforeach;?>
  <?php } ?>
    <nav id="pagination">
      <div class="clearfix"></div>
    </nav>
    </div></div>
    <aside id="sidebar" class="alignright">
      <div class="search">
        <!-- <form action="//google.com/search" method="get" accept-charset="utf-8"> -->
        <form action="./search.php" method="get" accept-charset="utf-8">
          <input type="search" name="q" results="0" placeholder="Suche">
        </form>
      </div>
       <br>
    <section id="comment">
      <h1 class="title" style="font-size: 18px;">友情连接</h1>
      <div class="hr"></div>
      <div id="fb-root">
        <a href="http://www.3maio.com" target="_blank">Cpphp</a>
      </div>
    </section>
    </aside>
    <div class="clearfix"></div></div>
<?php
  //包含外部文件
  include './Common/footer.php';
?>
