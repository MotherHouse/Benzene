<?php
header("Content-type: text/html;charset=utf-8");//设置php的编码为utf－8
$idmonster=$_POST['idmonster'];


require_once("config.php");
$conn=connectDb();



$sql = "DELETE FROM monster WHERE idmonster='".$idmonster."'";

if ($conn->query($sql) === TRUE) {
Header("Location:showallmonster.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
