<?php
require_once("config.php");
$conn = connectDb();

$result =$conn->query("select name from name ");

if ($result->num_rows> 0) {
       while($row = $result->fetch_assoc()){

       }
     }
     else{
       echo "未找到数据！";
     }

// 用名字来填充数组
// $a[]="Anna";
// $a[]="Brittany";
// $a[]="Cinderella";
// $a[]="Diana";
// $a[]="Eva";
// $a[]="Fiona";
// $a[]="Gunda";
// $a[]="Hege";
// $a[]="Inga";
// $a[]="Johanna";
// $a[]="Kitty";
// $a[]="Linda";
// $a[]="Nina";
// $a[]="Ophelia";
// $a[]="Petunia";
// $a[]="Amanda";
// $a[]="Raquel";
// $a[]="Cindy";
// $a[]="Doris";
// $a[]="Eve";
// $a[]="Evita";
// $a[]="Sunniva";
// $a[]="Tove";
// $a[]="Unni";
// $a[]="Violet";
// $a[]="Liza";
// $a[]="Elizabeth";
// $a[]="Ellen";
// $a[]="Wenche";
// $a[]="Vicky";

//获得来自 URL 的 q 参数
$q=$_GET["q"];

//如果 q 大于 0，则查找数组中的所有提示
if (strlen($q) > 0)
  {
  $hint="";
  for($i=0; $i<count($row); $i++)
    {
    if (strtolower($q)==strtolower(substr($row[$i],0,strlen($q))))
      {
      if ($hint=="")
        {
        $hint=$row[$i];
        }
      else
        {
        $hint=$hint." , ".$row[$i];
        }
      }
    }
  }

// 如果未找到提示，则把输出设置为 "no suggestion"
// 否则设置为正确的值
if ($hint == "" then)
  {
  $response="no suggestion";
  }
else
  {
  $response=$hint;
  }

//输出响应
echo $response;
?>
