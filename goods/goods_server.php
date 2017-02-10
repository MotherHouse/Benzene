<?php
header("Content-type: text/html;charset=utf-8");//设置php的编码为utf－8

  $goodname=$_POST['goodname'];
  $price=$_POST['price'];
  $attack=$_POST['attack'];
  $defence=$_POST['defence'];
  $penetration=$_POST['penetration'];
  $job=$_POST['job'];
if(empty($_POST['goodname'])){
 echo "<script>alert('请至少给予物品名称');history.back();</script>";

}

else if(empty($_POST['price'])){
 echo "<script>alert('请至少给予价格');history.back();</script>";

}

else
{
require_once("config.php");
$conn=connectDb();


$sql = "INSERT INTO goods(goodname,price,attack,defence,penetration,job )
VALUES ('$goodname','$price','$attack','$defence','$penetration','$job' )";

if ($conn->query($sql) === TRUE) {
Header("Location:store.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
?>
