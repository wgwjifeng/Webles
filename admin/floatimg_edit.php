<?php
session_start();
require("check_admin.php");
require("config.php");
?>

<HEAD>
<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<META HTTP-EQUIV="Cache-Control" CONTENT="no-cache">
<META HTTP-EQUIV="Expires" CONTENT="0">
</HEAD>

<link rel="STYLESHEET" type="text/css" href="style.css">

<body topmargin=0 leftmargin=0 rightmargin=0 bottommargin=0 bgcolor=555555>

<table bgcolor=f0f0f0 cellpadding=0 cellspacing=0 width=100%  background="images/admin_top_bg.gif" height=36>
<tr><td width=30><img src=images/admin_top_close.gif></td><td style="font-weight:800;color:white"> �༭����ͼ��</td></tr>
</table>



<table bgcolor=f0f0f0 cellpadding=0 cellspacing=0 width=100%>
<tr><td>

<?

$Query = "select * from floatimg order by id desc";

$result = mysql_query($Query, $mysql_link); 
?>
<table width=100% cellpadding=5 cellspacing=1 style="font-size:9pt" bgcolor=dddddd>
<tr bgcolor=f0f0f0 style="font-weight:800">
<td background=images/topbar_bg.gif>ID</td>
<td background=images/topbar_bg.gif>ͼƬ</td>
<td background=images/topbar_bg.gif>����</td>
<td background=images/topbar_bg.gif>λ��</td>
<td background=images/topbar_bg.gif>����</td>
<td background=images/topbar_bg.gif>״̬</td>
<td background=images/topbar_bg.gif>����</td>
</tr>
<?
while($r=mysql_fetch_array($result))
{
?>
<tr bgcolor=f0f0f0>
<td><?echo $r["id"];?></td>
<td><img src="../<?echo $r["imgurl"];?>"  width=100 height=100></td>
<td><?echo $r["linkurl"];?></td>
<td>

<?
if($r["position"]=='0')
{
echo "������";
}
if($r["position"]=='1')
{
echo "���";
}
if($r["position"]=='2')
{
echo "�Ҳ�";
}

?>

</td>
<td>
<?echo $r["paixu"];?>


</td>
<td>

<?
if($r["pass"]=='0')
{
echo "�ر�";
}
if($r["pass"]=='1')
{
echo "��ͨ";
}
?>
</td>
<td>

<a href="edit_floatimg.php?id=<?echo $r["id"];?>">�޸�</a>&nbsp;&nbsp;

<a href="del_floatimg.php?id=<?echo $r["id"];?>" onclick='{if(confirm("��ȷ��ɾ����?�˲��������ָܻ�!")){return true;}return false;}'>ɾ��</a>

</td>
</tr>

<?
}
?>

</table>

<table bgcolor=f0f0f0 cellpadding=0 cellspacing=0 width=100%  background="images/admin_bg_bottom.gif" height=56>
<tr><td></td></tr>
</table>

<?
mysql_close($mysql_link);
?>