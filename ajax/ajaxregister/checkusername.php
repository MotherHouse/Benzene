<?php
class Result{
	public $retcode = 0;
	public $message ='';
	}

	$result = new Result();
	$username = isset($_GET['username']) ? $_GET['username'] : NULL;
if ($username == NULL) {
	$result -> retcode = -1;
	$result -> message = 'ע���û�������Ϊ��';
}
else {
	$dbms = 'mysql';
	$host = '';
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
			$result -> message = '�û����Ѵ��ڣ��뻻һ���û�����';
		}else{
			$result -> retcode = 0;
			$result -> message = 'ע���û�������ʹ�ã�';
		}
		$dbh = NULL;
		} catch(PDOException $e) {
			$result -> retcode = -2;
			$result -> message = '���浽���ݿ���ʧЧ' . $e -> getMessage();
		}
   }
   echo json_encode($result);
?>
