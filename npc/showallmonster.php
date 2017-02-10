<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="alert alert-success">
  <h1>怪物列表</h1>
  </div>
  <div class="table-responsive">
  <table class="table">
  <tr><td>怪物名称</td><td>生命值</td><td>法力值</td><td>攻击力</td><td>防御力</td><td>等级</td><td>击杀所得经验</td><td>技能</td><td>背景</td></tr>

<?php

require_once("config.php");
$conn = connectDb();

$result =$conn->query("select * from monster ");


if ($result->num_rows> 0) {
       while($row = $result->fetch_assoc()) {
$name=$row['name'];
$life=$row['life'];
$soul=$row['soul'];
$monster_attack=$row['monster_attack'];
$monster_defence=$row['monster_defence'];
$monster_level=$row['monster_level'];
$monster_exp=$row['monster_exp'];
$monster_skill=$row['monster_skill'];
$monster_story=$row['monster_story'];
         echo "<tr><td>$name</td><td>$life</td><td>$soul</td><td>$monster_attack</td><td>$monster_defence</td><td>$monster_level</td><td>$monster_exp</td><td>$monster_skill</td><td>$monster_story</td></tr>";
         echo "<br>";
    }

 }
 ?>
 </table>
   </div>
     <input type="submit" class="btn btn-info btn-lg" onclick="location.href='addmonster.html'" value="增加怪物">
     <input type="submit" class="btn btn-info btn-lg" onclick="location.href='deletermonster.php'" value="删除怪物">

 </body>
 </html>
