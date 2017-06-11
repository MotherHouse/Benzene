<?php 
$database_connection = null;
function get_connection(){
	$hostname = "localhost"; //数据库服务器主机名,可以用IP代替
	$database = "news"; //数据库名
	$username = "root"; //数据库服务器用户名
	$password = ""; //数据库服务器密码
	global $database_connection;
	$database_connection = @mysql_connect($hostname, $username, $password) or die(mysql_error()); //连接数据库服务器
	mysql_query("set names 'gbk'");//设置字符集
	@mysql_select_db($database, $database_connection) or die(mysql_error());
}
function close_connection(){
	global $database_connection;
	if($database_connection){
		mysql_close($database_connection) or die(mysql_error());
	}
}
?>
