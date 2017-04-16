<?php
session_start();

class Result {
	public $retcode = 0;
	public $message = '';
}

$result = new Result();
$username = isset($_GET['username']) ? $_GET['username'] : NULL;
$passwd = isset($_GET['passwd']) ? $_GET['passwd'] : NULL;
$checkCode = isset($_GET['checkCode']) ? $_GET['checkCode'] : NULL;

if ($checkCode == NULL) {
	$result -> retcode = -1;
	$result -> message = '验证码不能为空';

	echo json_encode($result);
	return;
} else {
	$sessionCheckCode = isset($_SESSION['authnum_session']) ? $_SESSION['authnum_session'] : NULL;

	if ($sessionCheckCode == NULL || strtoupper($checkCode) != strtoupper($sessionCheckCode)) {
	$result -> retcode = -4;
	$result -> message = '验证码错误';

	echo json_encode($result);
	return;
	}
}



if ($username == NULL || $passwd == NULL) {
	$result -> retcode = -1;
	$result -> message = '用户名或密码不能为空';
} else {

	$dbms = 'mysql';
	$host = '139.199.164.15';
	$dbName = 'cube ';
	$user = 'root';
	$pass = 'zheng1206';
	$dsn = "$dbms:host=$host;dbname=$dbName";

	try {
		$dbh = new PDO($dsn, $user, $pass);
		$dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$selectStat = 'SELECT * FROM UserInfo WHERE username=? and passwd=?';
		$stmt = $dbh -> prepare($selectStat);
		$stmt -> execute(array($username,$passwd));

		$stmt -> setFetchMode(PDO::FETCH_ASSOC);
		$queryResult = $stmt -> fetchAll();

		if(count($queryResult,COUNT_NORMAL) > 0){

			$result -> retcode = 0;
			$result -> message = '登陆成功';
		} else {

			$result -> retcode = -3;
			$result -> message = '用户名或密码错误';
		}

		$dbh = null;
	} catch (PDOException $e) {

		$result -> retcode = -2;
		$result -> message = '保存到数据库失败！' . $e -> getMessage();
	}

}

echo json_encode($result);
?>
