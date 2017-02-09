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
  <h1>物品列表</h1>
  </div>
  <div class="table-responsive">
  <table class="table">
  <tr><td>物品名</td><td>价格</td><td>攻击</td><td>防御</td><td>穿透</td><td>适合的道</td></tr>

<?php

require_once("config.php");
$conn = connectDb();

$result =$conn->query("select goodname, price, attack, defence, penetration, job from goods ;");

if ($result->num_rows> 0) {
       while($row = $result->fetch_assoc()) {
         $goodname=$row['goodname'];
         $price=$row['price'];
         $attack=$row['attack'];
         $defence=$row['defence'];
         $penetration=$row['penetration'];
         $job=$row['job'];
         echo "<tr><td>$goodname</td><td>$price</td><td>$attack</td><td>$defence</td><td>$penetration</td><td>$job</td></tr>";
         echo "<br>";
    }

 }
 ?>
 </table>
   </div>
 </body>
 </html>
