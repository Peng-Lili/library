<?php 
session_start();
include("conn/conn.php");
$id=$_POST[readerid];
$name=$_POST[name];
$sex=$_POST[sex];
$vocation=$_POST[vocation];
$paperType=$_POST[paperType];
$paperNO=$_POST[paperNO];
$tel=$_POST[tel];
$remark=$_POST[remark];
mysql_query("update tb_reader set name='$name',sex='$sex',vocation='$vocation',
		paperType='$paperType',paperNO='$paperNO',tel='$tel',remark='$remark'
		where name='$_SESSION[admin_name]'");
echo "<script language='javascript'>alert('读者信息修改成功!');window.location.href='pwd_readerchange.php';</script>";
?>
       
