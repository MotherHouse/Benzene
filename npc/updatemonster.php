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
      <h1>修改怪物</h1>
      </div>
      <label>选择你要修改的怪物</label>
      <label for="disabledSelect"></label>
      <form action="updatemonster_server.php" method="post">
      <select class="form-control" name="idmonster">
    <?php
    header("Content-type: text/html;charset=utf-8");

      require_once("config.php");
      $conn=connectDb();


      $result =$conn->query("select idmonster,name from monster;");
      if ($result->num_rows> 0) {
             while($row = $result->fetch_assoc()) {


      echo '<option value="'.$row['idmonster'].'">'.$row['name'].'</option>';


      }
    }

      ?>
        </select>

        <label>修改后的怪物名称</label>
        <input class="form-control" name="name">
        <p class="help-block"></p>
        <label>修改后的怪物生命值</label>
        <input class="form-control" name="life" >
        <p class="help-block"></p>
        <label>修改后的怪物法力值</label>
        <input class="form-control" name="soul" >
        <p class="help-block"></p>
        <label>修改后的怪物攻击力</label>
        <input class="form-control" name="monster_attack" >
        <p class="help-block"></p>
        <label>修改后的怪物防御力</label>
        <input class="form-control" name="monster_defence" >
        <p class="help-block"></p>
        <label>修改后的怪物等级</label>
        <input class="form-control" name="monster_level" >
        <p class="help-block"></p>
        <label>修改后的击杀所得经验</label>
        <input class="form-control" name="monster_exp" >
        <p class="help-block"></p>
        <label>修改后的技能</label>
        <input class="form-control" name="monster_skill" >
        <p class="help-block"></p>
        <label>修改后的背景故事</label>
        <input class="form-control" name="monster_story" >
        <p class="help-block"></p>






        <div class="panel-body">
      <input type="submit" class="btn btn-info btn-lg" value="修改怪物">
        </div>
      </form>



    </body>
</html>
