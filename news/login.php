<?php
session_start();
include_once("functions/is_login.php");
if(isset($_GET["login_message"])){
	if($_GET["login_message"]=="password_error"){
		echo "�������,���µ�¼��<br/>";
	}else if($_GET["login_message"]=="password_right"){
		echo "��¼�ɹ���<br/>";
	}
}
if(is_login()){
	echo "��ӭ".$_SESSION['name']."����ϵͳ��<br/>";
	echo "<a href='logout.php'>ע��</a>";
	return;
}
$name = "";
if(isset($_COOKIE["name"])){
	$name = $_COOKIE["name"];
}
$password = "";
if(isset($_COOKIE["password"])){
	$password = $_COOKIE["password"];
}
?>
<form action="login_process.php" method="post">
�û�����<input type="text" name="name" size="11" value="<?php echo $name?>" /><br/>
�� �� ��<input type="password" name="password" size="11" value="<?php echo $password?>" /><br/>
<input type="checkbox" name="expire" value="3600" checked/>Cookie����1Сʱ<br/>
<input type="submit" value="��¼" />
</form>
