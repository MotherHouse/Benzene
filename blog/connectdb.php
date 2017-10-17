<?php

//2.2验证用户的邮箱地址是否重复，已经存在。
  //2.2.1连接数据库

  $link = new mysqli('139.199.164.15','root','Zheng1@06','myblog') or die('数据库连接失败');

  $conn->query("set character set 'utf8'");//读库
  $conn->query("set names 'utf8'");//写库



 ?>
