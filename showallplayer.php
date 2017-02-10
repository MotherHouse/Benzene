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
  <h1>用户列表</h1>
  </div>
  <div class="table-responsive">
  <table class="table">
  <tr><td>用户名</td><td>职业</td><td>等级</td><td>战力</td></tr>

<?php

require_once("config.php");
$conn = connectDb();

$result =$conn->query("select username,job from user ;");

if ($result->num_rows> 0) {
       while($row = $result->fetch_assoc()) {
         $username=$row['username'];
        $job = $row['job'];

         echo "<tr><td>$username</td><td>$job</td></tr>";
         echo "<br>";
    }

 }
 ?>
 </table>
   </div>
 </body>
 </html>
