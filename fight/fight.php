<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <head>
    <body>

    <div class="alert alert-success">
    <h1>战斗</h1>
    </div>
    <table class="table">
<tr>
        <th>
    <div class="alert alert-info">
    <h2>主角状态</h2>
    </div>
  </th>
  <td>
    <div class="alert alert-info">
    <h2>敌人状态</h2>
    </div>
  </td>
</tr>
    <div>

<table class="table">

    <tr>
        <th><table class="table">
<?php
require_once("config.php");
$conn = connectDb();

$result =$conn->query("select * from user where user_id=67");
if ($result->num_rows> 0) {
       while($row = $result->fetch_assoc()) {
         $username=$row['username'];
         $power=$row['power'];
         $soul=$row['soul'];
         $attack=$row['attack'];
         $defence=$row['defence'];
         $level=$row['level'];
         echo "<tr>";
         echo "<th>玩家姓名</th>";
         echo "<td>$username</td>";
         echo "</tr>";
           echo "<tr>";
           echo "<th>生命值</th>";
           echo "<td>$power</td>";
           echo "</tr>";
           echo "<tr>";
                echo "<th>法力值</th>";
                echo "<td>$soul</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<th>攻击力</th>";
                echo "<td>$attack</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<th>防御力</th>";
                echo "<td>$defence</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<th>等级</th>";
                echo "<td>$level</td>";
            echo "</tr>";

        echo "</table>";
      echo "</th>";
        echo "<td>";

 }
}

        ?>


          <table class="table">
            <?php
            require_once("config.php");
            $conn = connectDb();

            $result =$conn->query("select * from monster where idmonster=26");
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
                echo "<tr>";
                echo "<th>怪物名字</th>";
                echo "<td>$name</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<th>生命值</th>";
                echo "<td>$life</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<th>法力值</th>";
                echo "<td>$soul</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<th>攻击力</th>";
                echo "<td>$monster_attack</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<th>防御力</th>";
                echo "<td>$monster_defence</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<th>等级</th>";
                echo "<td>$monster_level</td>";
            echo "</tr>";
        echo "</table>";
      echo "</td>";
    echo "</tr>";
  }
}

    ?>

</table>


  </table>
  <input type="submit" class="btn btn-info btn-lg" onclick="location.href='attack.php'" value="攻击">
  <input type="submit" class="btn btn-info btn-lg" onclick="location.href='skill.php'"value="技能">
  <input type="submit" class="btn btn-info btn-lg" onclick="location.href='goods.php'"value="物品">
  <input type="submit" class="btn btn-info btn-lg" onclick="location.href='defence.php'"value="防御">
  <input type="submit" class="btn btn-info btn-lg" onclick="location.href='flee.php'"value="逃走">
</body>
</html>
