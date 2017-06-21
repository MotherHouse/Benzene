<?php
class Result{
	public $retcode = 0;
	public $message ='';
	}

	$result = new Result();
	$username = isset($_GET['username']) ? $_GET['username'] : NULL;
	$passwd = isset($_GET['passwd']) ? $_GET['passwd'] : NULL;
if ($username == NULL || $passwd == NULL) {
	$result -> retcode = -1;
	$result -> message = '娉ㄥ唽鐢ㄦ埛鍚嶄笉鑳戒负绌�';
}
else {
	$dbms = 'mysql';
	$host = '118.89.26.25';
	$dbName = 'news';
	$user = 'bob';
	$pass = 'Zheng1@06leavenotrace';
	$dsn = "$dbms:host=$host;dbname=$dbName";
	try{
		$dbh = new PDO($dsn, $user, $pass);
		$dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$query = "SELECT * FROM userinfo WHERE username= '". $username ."'";
		if ($dbh -> query($query) -> rowCount() > 0){

			$result -> retcode = -3;
			$result -> message = '鐢ㄦ埛鍚嶅凡瀛樺湪锛岃鎹竴涓敤鎴峰悕锛�';
		}else{
			$insertStat = 'INSERT INTO userinfo(username, passwd) VALUES (?,?)';
			$stmt = $dbh -> prepare($insertStat);
			$stmt -> execute(array($username, $passwd));
			$dbh = NULL;
			$result -> retcode = 0;
			$result -> message = '鐢ㄦ埛娉ㄥ唽鎴愬姛';
		}

	} catch(PDOException $e) {
			$result -> retcode = -2;
			$result -> message = '淇濆瓨鍒版暟鎹簱涓け鏁�' . $e -> getMessage();
		}
   }
   echo json_encode($result);
?>
