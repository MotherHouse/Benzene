<?php
class Result{
	public $retcode = 0;
	public $message ='';
	}

	$result = new Result();
	$username = isset($_GET['username']) ? $_GET['username'] : NULL;
if ($username == NULL) {
	$result -> retcode = -1;
	$result -> message = '注册用户名不能为空';
}
else {
	$dbms = 'mysql';
	$host = '139.199.164.15';
	$dbName = 'game';
	$user = 'bob';
	$pass = 'Zheng1@06';
	$dsn = "$dbms:host=$host;dbname=$dbName";
	try{
		$dbh = new PDO($dsn, $user, $pass);
		$dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$query = "SELECT * FROM userinfo WHERE username= '". $username ."'";
		if ($dbh -> query($query) -> rowCount() > 0){
			$result -> retcode = -3;
			$result -> message = '用户名已存在，请换一个用户名：';
		}else{
			$result -> retcode = 0;
			$result -> message = '注册用户名可以使用：';
		}
		$dbh = NULL;
		} catch(PDOException $e) {
			$result -> retcode = -2;
			$result -> message = '保存到数据库中失效' . $e -> getMessage();
		}
   }
   echo json_encode($result);
?>
