<?php
session_start();
include("conn/conn.php");
$backTime=date("Y-m-d");        //�黹ͼ������
$borrid=$_GET[borrid];
mysql_query("update tb_borrow as br,tb_bookinfo as bf set br.backTime='$backTime',br.ifback=1,br.operator='$_SESSION[admin_name]',
		bf.bookin=bf.bookin+1,bf.bookout=bf.bookout-1 
		where br.id=$borrid and bf.id=br.bookid");
echo "<script language='javascript'>alert('ͼ��黹�����ɹ���');window.location.href='bookBack.php?id=$id';</script>";
?>