<?php
header("Content-type: text/html;charset=utf-8");//设置php的编码为utf－8

  $goodname=$_POST['goodname'];
  $price=$_POST['price'];
  $goodattack=$_POST['goodattack'];
  $gooddefence=$_POST['gooddefence'];
  $goodpenetration=$_POST['goodpenetration'];
  $job=$_POST['job'];
  $part=$_POST['part'];
  $goodskill=$_POST['goodskill'];
  $goodstory=$_POST['goodstory'];
if(empty($_POST['goodname'])){
 echo "<script>alert('请至少给予物品名称');history.back();</script>";

}


else
{
require_once("config.php");
$conn=connectDb();


$sql = "INSERT INTO goods(goodname,price,goodattack,gooddefence,goodpenetration,job,part,goodskill,goodstory )
VALUES ('$goodname','$price','$goodattack','$gooddefence','$goodpenetration','$job','$part','$goodskill','$goodstory')";

if ($conn->query($sql) === TRUE) {
Header("Location:showallgoods.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
?>
