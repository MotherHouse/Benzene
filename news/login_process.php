<?php
include_once("functions/database.php");
$name = $_POST["name"];
if(isset($_COOKIE["password"])){
	$first_password = $_COOKIE["password"];
}else{
	$first_password = md5($_POST["password"]);
}
if(empty($_POST["expire"])){
		setcookie("name",$name,time()-1);
		setcookie("password",$first_password,time()-1);
}
$password = md5($first_password);
$sql = "select * from users where name='$name' and password ='$password'";
get_connection();
$result_set = mysql_query($sql);
if(mysql_num_rows($result_set)>0){
	if(isset($_POST["expire"])){
		$expire = time()+intval($_POST["expire"]);
		setcookie("name",$name,$expire);
		setcookie("password",$first_password,$expire);
	}
	session_start();
	$admin = mysql_fetch_array($result_set);
	$_SESSION['user_id'] = $admin['user_id'];
	$_SESSION['name'] = $admin['name'];
	header("Location:index.php?login_message=password_right");
}else{
	header("Location:index.php?login_message=password_error");
}
close_connection();
?>
