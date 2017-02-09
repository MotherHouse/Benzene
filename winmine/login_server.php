

<?php
session_start();
if($_POST['username']&&$_POST['psd'])
{
 $username=$_POST['username']; //接受传递值
 $psd=$_POST['psd'];
}
else
{
  echo "$username";
  echo "$job";
 echo '用户名或密码不能为空';//当然也可以进行其他操作，比如使用header('Location:error.php')来把用户重定向到一个错误提示页
 exit;
}
require_once("config.php");
$conn=connectDb();//连接数据库
// $username=mysql_real_escape_string($username); //过滤信息
// $pass=mysql_real_escape_string($psd);
$sql="select username,psd from user where username='".$username."' and psd='".$psd."'";//从数据库中取出用户信息

$result=$conn->query($sql);

if ($result->num_rows == 0)
 {
  echo '用户名不存在';
  exit;
 }
else
{
while($row = $result->fetch_assoc()){
 if($psd!=$row['psd'])
 {
  echo '用户密码错误';
  exit;
 }
 else
 {
  $_SESSION['user']=$username; //创建SESSION
  Header("Location:index.html");
 }
}
}
?>
