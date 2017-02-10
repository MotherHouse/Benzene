<?php
header("Content-type: text/html;charset=utf-8");//设置php的编码为utf－8
$idmonster=$_POST['idmonster'];
$name=$_POST['name'];
$life=$_POST['life'];//生命值
$soul=$_POST['soul'];//法力值
$monster_attack=$_POST['monster_attack'];
$monster_defence=$_POST['monster_defence'];
$monster_level=$_POST['monster_level'];
$monster_exp=$_POST['monster_exp'];
$monster_skill=$_POST['monster_skill'];
$monster_story=$_POST['monster_story'];


require_once("config.php");
$conn=connectDb();



$sql = "update monster set name='".$name."'life=".$life."soul=".$soul."monster_attack=".$monster_attack."
monster_defence=".$monster_defence."monster_exp=".$monster_exp."monster_skill='".$monster_skill."
'monster_story='".$monster_story."' where idmonster=".$idmonster.";

if ($conn->query($sql) === TRUE) {
Header("Location:showallmonster.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
