<?php
header("Content-type: text/html;charset=utf-8");//设置php的编码为utf－8

  $name=$_POST['name'];
  $life=$_POST['life'];
  $soul=$_POST['soul'];
  $monster_attack=$_POST['monster_attack'];
  $monster_defence=$_POST['monster_defence'];
  $monster_level=$_POST['monster_level'];
    $monster_exp=$_POST['monster_exp'];
    $monster_skill=$_POST['monster_skill'];
    $monster_story=$_POST['monster_story'];
if(empty($_POST['name'])){
 echo "<script>alert('请至少给予怪物名称');history.back();</script>";

}

else
{
require_once("config.php");
$conn=connectDb();


$sql = "INSERT INTO monster(name,life,soul,monster_attack,monster_defence,monster_level,monster_exp,monster_skill,monster_story )
VALUES ('$name','$life','$soul','$monster_attack','$monster_defence','$monster_level','$monster_exp','$monster_skill','$monster_story' )";

if ($conn->query($sql) === TRUE) {
Header("Location:showallmonster.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
?>
