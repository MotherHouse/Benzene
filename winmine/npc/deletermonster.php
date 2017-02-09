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
      <h1>删除怪物</h1>
      </div>
      <label>选择你要删除的怪物</label>
      <label for="disabledSelect"></label>
      <form action="deletermonster_server.php" method="post">
      <select class="form-control" name="idmonster">
    <?php
    header("Content-type: text/html;charset=utf-8");

      require_once("config.php");
      $conn=connectDb();


      $result =$conn->query("select ＊ from monster;");

      if ($result->num_rows> 0) {
             while($row = $result->fetch_assoc()) {


      echo '<option value="'.$row['idmonster'].'">'.$row['name'].'</option>';


      }
    }

      ?>
        </select>






        <div class="panel-body">
      <input type="submit" class="btn btn-info btn-lg" value="删除怪物">
        </div>
      </form>



    </body>
</html>
