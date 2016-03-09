<?php 
session_start();
include("Conn/conn.php");
$operator=$_SESSION[admin_name];
$barcode=$_POST[barcode];
$bookname=$_POST[bookName];
$typeid=$_POST[typeId];
$author=$_POST[author];
$translator=$_POST[translator];
$isbn=$_POST[isbn];
$sum=$_POST[sum];
$price=$_POST[price];
$page=$_POST[page];
$bookcaseid=$_POST[bookcaseid];
$inTime=date("Y-m-d");
$sql=mysql_query("insert into tb_bookinfo(barcode,bookname,
		typeid,author,translator,ISBM,price,bookcase,
		inTime,
		operator,
		page,
		storage,
		bookin
		)
		values('$barcode','$bookname','$typeid','$author',
		'$translator','$isbn','$price','$bookcaseid',
		'$inTime','$operator','$page','$sum','$sum')");

echo "<script language='javascript'>alert('图书信息添加成功!');history.back();</script>";

?>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">

