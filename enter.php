<?php
header("Content-type: text/html;charset=utf-8");//设置php的编码为utf－8

$username=$_POST['username'];//从enter.html得到username这个值
$job=$_POST['job'];//从enter.html得到job这个值
$psd=$_POST['psd'];//从enter.html得到password这个值


if(empty($_POST['username'])){
 echo "<script>alert('请输入用户名');history.back();</script>";

}

else if(empty($_POST['psd'])){
 echo "<script>alert('请输入密码');history.back();</script>";

}

else
{
require_once("config.php");
$conn=connectDb();


$sql = "INSERT INTO user (username,job,psd,power)
VALUES ('$username', '$job', '$psd','100')";

if ($conn->query($sql) === TRUE) {
Header("Location:index.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
?>
