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
  <h1>新闻列表</h1>
  </div>
  <div class="table-responsive">
  <table class="table">
  <tr><td>type</td><td>content</td><td>物品攻击力</td><td>物品防御力</td><td>物品穿透力</td><td>适合的道</td><td>适合的部位</td><td>物品技能</td><td>背景</td></tr>

<?php

require_once("config.php");
$conn = connectDb();

$result =$conn->query("select * from goods ");


if ($result->num_rows> 0) {
       while($row = $result->fetch_assoc()) {
$goodname=$row['goodname'];
$price=$row['price'];
$goodattack=$row['goodattack'];
$gooddefence=$row['gooddefence'];
$goodpenetration=$row['goodpenetration'];
$job=$row['job'];
$part=$row['part'];
$goodskill=$row['goodskill'];
$goodstory=$row['goodstory'];
         echo "<tr><td>$goodname</td><td>$price</td><td>$goodattack</td><td>$gooddefence</td><td>$goodpenetration</td><td>$job</td><td>$part</td><td>$goodskill</td><td>$goodstory</td></tr>";
         echo "<br>";
    }

 }
 ?>
 </table>
   </div>

 </body>
 </html>
