<?php
session_start();
require("check_admin.php");
require("config.php");
?>
<?
$Query = "update article set deleted='0' ";
$result = mysql_query($Query, $mysql_link); 
echo "<script language=javascript>alert('操作成功');history.back();</script>"; 

//关闭数据库连结
mysql_close($mysql_link);
?>