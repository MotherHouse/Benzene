<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <table class="table" >
  <tr>
  <th>道</th>
  <th>法力值</th>
  <th>生命值</th>
  <th>上限</th>
  <th>攻击力</th>
  <th>防御</th>
  <th>定位</th>
  </tr>

<?php

$q=$_GET["q"];


require_once("config.php");
$conn=connectDb();


$sql="SELECT * FROM job WHERE id = '".$q."'";

$result = $conn->query($sql);



 while($row = $result->fetch_assoc())
 {
 echo "<tr>";
 echo "<td>" . $row['jobname'] . "</td>";
 echo "<td>" . $row['power'] . "</td>";
 echo "<td>" . $row['soul'] . "</td>";
 echo "<td>" . $row['limit'] . "</td>";
 echo "<td>" . $row['attack'] . "</td>";
 echo "<td>" . $row['defence'] . "</td>";
 echo "<td>" . $row['location'] . "</td>";
 echo "</tr>";
 }
echo "</table>";

$conn->close();
?>
</body>
  </html>
