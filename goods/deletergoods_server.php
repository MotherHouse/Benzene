<?php
header("Content-type: text/html;charset=utf-8");//设置php的编码为utf－8
$idgoods=$_POST['idgoods'];


require_once("config.php");
$conn=connectDb();



$sql = "DELETE FROM goods WHERE idgoods='".$idgoods."'";

if ($conn->query($sql) === TRUE) {
Header("Location:showallgoods.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
