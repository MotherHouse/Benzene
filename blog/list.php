<?php
  include './Common/header.php';

      //获取文章对应的ID
      $id = $_GET['id'];
      if (empty($id) || !is_numeric($id)) {
          echo "<script>";
          echo 'alert("非法操作")';
          echo "</script>";
          //跳转
          echo "<script>";
          echo "window.history.back()";
          echo "</script>";
          exit();
      }

      //1.连接数据库
      $link = mysqli_connect('localhost','root','') or die('连接数据库失败');
      //2.选择数据库
      mysqli_select_db($link,'myblog') or die('选择数据库失败');
      //3.设置字符集
      mysqli_set_charset($link,'utf8');
      //4.准备sql语句
      $sql = "select * from posts where id = $id";
      //5.发送并且执行sql语句
      $result = mysqli_query($link,$sql);
      //6.获取所有结果集存入自定义数组
      while ($row = mysqli_fetch_assoc($result)) {
        $list[] = $row;
      }
?>
  <div id="content" class="inner">
  <div id="main-col" class="alignleft"><div id="wrapper">
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
  <?php }else{ ?>
  <?php foreach($list as $val):?>
    <article class="post">
        <div class="post-content">
          <header>
          <div class="icon"></div>
          <time datetime="2017-06-19T02:47:02.000Z"><a href="#"><?php echo date('Y-m-d', $val['addtime'])?></a></time>
      <h1 class="title"><?php echo $val['title'];?></h1>

      <!-- 判断当前登录用户是否为文章所属用户 -->
      <?php if($_SESSION['userInfo']['id'] == $val['userid']) {?>
      <a style="margin: auto"  href="./edit.php?id=<?php echo $val['id'];?>">
          <span style="color: #999;" class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
      </a>
      <a  onclick="return confirm('确定删除吗?')" style="margin: auto" href="./action.php?a=del&id=<?php echo $val['id'];?>">
          <span style="color: #999;" class="glyphicon glyphicon-trash" aria-hidden="true"></span>
      </a>
      <?php } ?>
      </header>
          <div class="entry">
         <?php echo $val['content'];?>
      </div>
      <footer>
        <div class="clearfix"></div>
      </footer>
        </div>
  </article>
<?php endforeach;?>
<?php } ?>
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
  include './Common/footer.php';
?>