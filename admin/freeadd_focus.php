<?php
session_start();
require("check_admin.php");
require("config.php");
?>






<script language="javascript">
function pic()
{


  var arr = showModalDialog("getpic.html", "", "dialogWidth:500px; dialogHeight:200px; help: no; scroll: no; status: no");  
   document.myform.imgurl.value=arr;
}
</script>



<HEAD>
<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<META HTTP-EQUIV="Cache-Control" CONTENT="no-cache">
<META HTTP-EQUIV="Expires" CONTENT="0">
</HEAD>

<link rel="STYLESHEET" type="text/css" href="style.css">

<body topmargin=0 leftmargin=0 rightmargin=0 bottommargin=0 bgcolor=555555>


<table bgcolor=f0f0f0 cellpadding=0 cellspacing=0 width=100%  background="images/admin_top_bg.gif" height=36>
<tr><td width=30><img src=images/admin_top_close.gif></td><td style="font-weight:800;color:white"> 添加焦点图片</td></tr>
</table>
	




<table bgcolor=dddddd cellpadding=5 cellspacing=1 width=100%>
<form name="myform" action="add_focus.php" method=post>
<tr bgcolor=f0f0f0><td align=right width=80><strong>标题：</strong></td><td><input name="title" style="width:300">
</td></tr>

<tr bgcolor=f0f0f0><td align=right><strong>图片：</strong></td><td><input name="imgurl" style="width:300">
<input type="button" value="上传图片" onclick="javascript:pic()">
</td></tr>
<tr bgcolor=f0f0f0><td align=right><strong>链接：</strong></td><td><input name="linkurl" style="width:300">
</td></tr>

<tr bgcolor=f0f0f0><td align=right><strong>摘要：</strong></td><td><textarea name="text" style="width:300;height:100px;"></textarea>
</td></tr>

    <tr bgcolor=f0f0f0>
<td></td>
    <td align=left height=50>


      <input
  name="Add" type="submit"  id="Add" value=" 保&nbsp;&nbsp;存" style="cursor: hand;background-color: #cccccc;">

 </td></tr>


</form>
</table>
<table bgcolor=f0f0f0 cellpadding=0 cellspacing=0 width=100%  background="images/admin_bg_bottom.gif" height=56>
<tr><td></td></tr>
</table>

<?
mysql_close($mysql_link);
?>
