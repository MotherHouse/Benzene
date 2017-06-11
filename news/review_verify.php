<?php
include_once("functions/is_login.php");
session_start();
if(!is_login()){
	echo "请您登录系统后，再访问该页面！";
	return;
}
include_once("functions/database.php");
$review_id = $_GET["review_id"];
$sql = "update review set state='已审核' where review_id=$review_id";
get_connection();
mysql_query($sql);
close_connection();
header("Location:index.php?url=review_list.php");
?>
