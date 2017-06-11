<?php
function upload($file,$file_path){
	$error = $file['error'];
	switch ($error){
		case 0:
			$file_name = $file['name'];
			$file_temp = $file['tmp_name'];
			$destination = $file_path."/".$file_name;
			move_uploaded_file($file_temp,$destination);
			return "�ļ��ϴ��ɹ���";
		case 1:
			return "�ϴ�����������php.ini��upload_max_filesizeѡ�����Ƶ�ֵ��";
		case 2:
			return "�ϴ������Ĵ�С������form��MAX_FILE_SIZEѡ��ָ����ֵ��";
		case 3:
			return "����ֻ�в��ֱ��ϴ���";
		case 4:
			return "û��ѡ���ϴ�������";
	}
}
function download($file_dir,$file_name){
	if (!file_exists($file_dir.$file_name)) { //����ļ��Ƿ���� 
		exit("�ļ������ڻ���ɾ��"); 
	} else {
		$file = fopen($file_dir.$file_name,"r"); // ���ļ� 
		//ȡ���ļ�����չ��
		$extension_name = extension_name($file_name);
		//������չ��ȡ���ļ���MIME����
		$content_type = content_type($extension_name);
		//�����������������Ϣ�Ĵ򿪷�ʽ
		header("Content-Type:$content_type");
		//ǿ���������ʾ����Ի��򣬲��ṩһ���Ƽ����ļ���
		header("Content-Disposition: attachment; filename=".$file_name); 
		// ����ļ�����
		echo fread($file,filesize($file_dir.$file_name)); 
		fclose($file); 
		exit;
	} 
}
function extension_name($file_name){
	$extension = explode(".",$file_name);
	$key = count($extension)-1;
	return $extension[$key];
}
function content_type($extension){
	$mime_types = array(
		'txt' => 'text/plain',
		'htm' => 'text/html',
		'html' => 'text/html',
		'php' => 'text/html',
		'css' => 'text/css',
		'js' => 'application/javascript',
		'xml' => 'application/xml',
		'swf' => 'application/x-shockwave-flash',
		'flv' => 'video/x-flv',
		// images
		'png' => 'image/png',
		'jpe' => 'image/jpeg',
		'jpeg' => 'image/jpeg',
		'jpg' => 'image/jpeg',
		'gif' => 'image/gif',
		'bmp' => 'image/bmp',
		'ico' => 'image/vnd.microsoft.icon',
		// archives
		'zip' => 'application/zip',
		'rar' => 'application/x-rar-compressed',
		'exe' => 'application/x-msdownload',
		// audio/video
		'mp3' => 'audio/mpeg',
		'qt' => 'video/quicktime',
		'mov' => 'video/quicktime',
		// adobe
		'pdf' => 'application/pdf',
		// ms office
		'doc' => 'application/msword',
		'rtf' => 'application/rtf',
		'xls' => 'application/vnd.ms-excel',
		'ppt' => 'application/vnd.ms-powerpoint'
	);
	if(array_key_exists($extension,$mime_types)){
		return $mime_types["$extension"];
	}else{
		return "application/octet-stream";
	}
}

?>
