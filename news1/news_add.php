<html>
<head>
</head>
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
include_once("functions/database.php");
get_connection();
$result_set = mysql_query("select * from category");
close_connection();
while($row = mysql_fetch_array($result_set)){
?>
	<option value="<?php echo $row['category_id'];?>"><?php echo $row['name'];?></option>
<?php
}
?>
</select><br/>
添加附件	<input type="file" name="news_file" size="50">
<input type="hidden" name="MAX_FILE_SIZE" value="10485760000000">
<br/>
<input type="submit" value="�ύ"><input type="reset" value="">
</form>
