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
      <label>你角色的状态</label>
      <label for="disabledSelect"></label>
      <select class="form-control" name="idgoods">
    <?php
    header("Content-type: text/html;charset=utf-8");

      require_once("config.php");
      $conn=connectDb();


      $result =$conn->query("select user from goods;");

      if ($result->num_rows> 0) {
             while($row = $result->fetch_assoc()) {


      echo '<option value="'.$row['idgoods'].'">'.$row['goodname'].'</option>';


      }
    }

      ?>
        </select>



          <form action="goodsupdata_server.php" method="post">
          <label>物品名称</label>
          <input class="form-control" name="goodname">
          <p class="help-block"></p>
          <label>价格</label>
          <input class="form-control" name="price" >
          <p class="help-block"></p>
          <label>攻击</label>
          <input class="form-control" name="attack" >
          <p class="help-block"></p>
          <label>防御</label>
          <input class="form-control" name="defence" >
          <p class="help-block"></p>
          <label>穿透</label>
          <input class="form-control" name="penetration" >
          <p class="help-block"></p>




      <label>适合的道</label>
      <label for="disabledSelect"></label>
      <select class="form-control" name="job">
          <option value="天道">天道（群伤，治疗）</option>
          <option value="阿修罗道">阿修罗道（爆发，控制）</option>
          <option value="人道">人道（控制，解控）</option>
          <option value="畜生道">畜生道（肉盾，辅助）</option>
          <option value="饿鬼道">饿鬼道（吸血，再生）</option>
          <option value="地狱道">地狱道（控制，群伤</option>）
      </select>


        <div class="panel-body">
      <input type="submit" class="btn btn-info btn-lg" value="修改物品">
        </div>
      </form>



    </body>
</html>
