<html>
<head>
	  <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
<form action="news_save.php" method="post" enctype="multipart/form-data">
标题<input type="text"  size="60" name="title"><br/>

<?php
include("fckeditor/fckeditor.php");
$oFCKeditor = new FCKeditor('content');
$oFCKeditor->BasePath = 'fckeditor/';
$oFCKeditor->Width = 550;
$oFCKeditor->Height = 350;
$oFCKeditor->Value = "";
$oFCKeditor->ToolbarSet = "Default";
$oFCKeditor->Config['EnterMode'] = 'br';
$oFCKeditor->Create() ;
?>
<br/>
类别
<select name="category_id" size="1">
<?php
require("dbconfig.php");
get_connection();
$result_set = mysql_query("select * from news");
close_connection();
while($row = mysql_fetch_array($result_set)){
?>
	<option value="=------0<?php echo $row['keywords'];?>"></option>
<?php
}
?>
</select><br/>
添加附件	<input type="file" name="news_file" size="50">
<input type="hidden" name="MAX_FILE_SIZE" value="">
<br/>
<input type="submit" value=""><input type="reset" value="">
</form>
</body>
</html>
