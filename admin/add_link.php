<?php
session_start();
require("check_admin.php");
require("config.php");
?>
<?

$classid=$_POST['classid'];
$linkname=$_POST['linkname'];
$linkurl=$_POST['linkurl'];
$imgurl=$_POST['imgurl'];
$Query = "
    INSERT INTO 
      link
    (
      classid
      ,linkname
      ,linkurl
      ,imgurl
       )
    VALUES
    (
      '$classid'
      ,'$linkname'
      ,'$linkurl'
      ,'$imgurl'
         )
   ";
$result = mysql_query($Query, $mysql_link); 
 
/*判断SQL语句的执行是否发生错误，若是则提示插入失败， 
并给出相应的错误号。若执行成功，提示留言发送成功*/ 
if (! $result) { 
  $errno = mysql_errno(); 
  $error = mysql_error(); 
  echo '<html><head><title>Error</title></head><body>'; 
  echo 'SQL插入失败.'; 
  echo "<br>Error: ($errno) $error<br>"; 
  echo '</body></html>'; 
  exit(); 
} 

echo "<script language=javascript>alert('保存成功');window.location='link_edit.php';</script>"; 

mysql_close($mysql_link);
?>