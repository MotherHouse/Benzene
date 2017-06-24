<?php
//公共信息配置文件
function get_connection{
//数据库信息配
define("HOST","localhost"); //主机名
define("USER","root");		//用户名
define("PASS","root");		//密码
define("DBNAME","demodb");	//数据库名

$link = @mysql_connect(HOST,USER,PASS) or die("数据库连接失败！");
mysql_select_db(DBNAME,$link);


}
