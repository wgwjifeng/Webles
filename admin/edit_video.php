<?php
session_start();
require("check_admin.php");
require("config.php");
$admin_classid=$_SESSION['admin_classid'];
?>

<script language = "JavaScript">
function getfile1()
{
  var arr = showModalDialog("getfile.html", "", "dialogWidth:500px; dialogHeight:200px; help: no; scroll: no; status: no");  
   document.myform.linkurl.value=arr;
}
function getpic()
{
  var arr = showModalDialog("getpic.html", "", "dialogWidth:500px; dialogHeight:200px; help: no; scroll: no; status: no");  
   document.myform.imgurl.value=arr;
}
function CheckForm()
{
    if (document.myform.ctype.value=="")
	{
        alert("请选择类别!")
        document.myform.ctype.focus();
        return false;
    }
    if (document.myform.title.value=="")
	{
        alert("视频标题不能为空!")
        document.myform.title.focus();
        return false;
    }
  return true;  
}
</script>
<html>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<META HTTP-EQUIV="Cache-Control" CONTENT="no-cache">
<META HTTP-EQUIV="Expires" CONTENT="0">
<link rel="STYLESHEET" type="text/css" href="style.css">
</HEAD>

<?
$id=$_GET['id'];
$Query1 = "select * from video where id='$id'";
$result1 = mysql_query($Query1, $mysql_link); 
?>
<?if($r1=mysql_fetch_array($result1))
{
$ctype=$r1['ctype'];
$title=$r1['title'];
$content=$r1['content'];
$writer=$r1['writer'];
$isrec=$r1['isrec'];
$linkurl=$r1['linkurl'];
$imgurl=$r1['imgurl'];
$adddate=$r1['adddate'];
}
?>
<?
mysql_close($mysql_link);
?>
<body topmargin=0 leftmargin=0 rightmargin=0 bottommargin=0 bgcolor=555555>

<table bgcolor=f0f0f0 cellpadding=0 cellspacing=0 width=100%  background="images/admin_top_bg.gif" height=36>
<tr><td width=30><img src=images/admin_top_close.gif></td><td style="font-weight:800;color:white"> 添加视频</td></tr>
</table>
<form name="myform" action="save_video.php" method=post onSubmit="return CheckForm();">
<table bgcolor=dddddd cellpadding=5 cellspacing=1 width=100%>

<tr bgcolor=f0f0f0>
<td width=100 align=right><strong>视频类别：</strong></td>
<td>

  <select   name="ctype">   
<?
require("config.php");
?>                   
    <?   

        $sql   =   "select   *   from   articleclass   where   parentid=65 and classid IN ($admin_classid) order by classorder asc";   

        $result   =   mysql_query(   $sql   );   
        while($res   =   mysql_fetch_array($result)){   
    ?>   
    
          <option   value="<?   echo   $res["classid"];   ?>" <?if($ctype==$res["classid"]){?>selected<?}?>><?   echo   $res["name"];   ?></option>   
      <?   }   ?>   
                    
                </select> 
<?
mysql_close($mysql_link);
?>
</td>
</tr>










<tr bgcolor=f0f0f0><td align=right><strong>视频标题：</strong></td><td><input name="title" style="width:400px" value="<?echo $title;?>"> 必填

</td></tr>
<tr bgcolor=f0f0f0><td align=right><strong>术者姓名：</strong></td><td><input name="writer" style="width:200px"  value="<?echo $writer;?>"></td></tr>
<tr bgcolor=f0f0f0><td align=right><strong>添加时间：</strong></td><td><input name="adddate"  value="<?echo $adddate;?>" style="width:200px"></td></tr>
<tr bgcolor=f0f0f0><td align=right><strong>视频地址：</strong></td><td><input name="linkurl" style="width:400px" value="<?echo $linkurl;?>"> <input type="button" onclick="getfile1()" value="上传文件"></td></tr>
<tr bgcolor=f0f0f0><td align=right><strong>视频摘要：</strong></td><td><textarea name="content" style="width:600px;height:200px"><?echo $content;?></textarea></td></tr>
          <tr bgcolor=f0f0f0> 
            <td width="100" align="right"><strong>是否推荐：</strong></td>
            <td colspan="2"><input name="isrec" type="checkbox" id="isrec" value="1" style="border: 0px;background-color: #eeeeee;" <?if($isrec==1){?>checked<?}?>>
              推荐</td>
          </tr>
<tr bgcolor=f0f0f0> 
            <td width="100" align="right"><strong>首页图片：</strong></td>
            <td colspan="2"><input name="imgurl" type="text" style="width:400px"  value="<?echo $imgurl;?>">  <input type="button" onclick="getpic()" value="上传图片">
            </td>
          </tr>
    <tr bgcolor=f0f0f0>
<td></td>
     <td align=left height=50>
<input type="hidden" name="id" value="<?echo $id;?>">

      <input
  name="Add" type="submit"  id="Add" value=" 保&nbsp;&nbsp;存" style="cursor: hand;background-color: #cccccc;">
 </td></tr>



</table>
</form>
<table bgcolor=f0f0f0 cellpadding=0 cellspacing=0 width=100%  background="images/admin_bg_bottom.gif" height=56>
<tr><td></td></tr>
</table>

</body>
</html>

