<?php session_start();?>
<html>
<head>
<title>ͼ��ݹ���ϵͳ</title>
<link href="css/style.css" rel="stylesheet">
</head>
<body>
<table width="776" border="0" align="center" cellpadding="0" cellspacing="0" class="tableBorder">
  <tr>
    <td>
	<?php include("navigationreader.php");?>
	</td>
  </tr>
	<td>
	<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top" bgcolor="#FFFFFF"><table width="99%" height="510"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="tableBorder_gray">
  <tr>
    <td height="510" align="center" valign="top" style="padding:5px;"><table width="98%" height="487"  border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td height="22" valign="top" class="word_orange">��ǰλ�ã�ͼ�鵵������ &gt; ͼ����ϸ��Ϣ &gt;&gt;&gt;</td>
      </tr>
      <tr>
        <td align="center" valign="top"><table width="100%" height="493"  border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="top">
		<?php 
        include("conn/conn.php");
        $sql=mysql_query("select book.barcode,book.id as bookid,book.bookname,bt.typename,book.author,book.translator,pb.pubname,book.price,book.page,bc.name from tb_bookinfo book join tb_booktype bt on book.typeid=bt.id join tb_publishing pb on book.ISBM=pb.ISBN join tb_bookcase bc on book.bookcase=bc.id where book.id=$_GET[id]");
		$info=mysql_fetch_array($sql);
		?>
	<table width="600" height="432"  border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
      <tr>
        <td width="173" align="center">��&nbsp;��&nbsp;�룺</td>
        <td width="427" height="39">
          <input name="barcode" type="text" id="barcode" value="<?php echo $info[barcode];?>"readonly="yes"></td>
      </tr>
      <tr>
        <td align="center">ͼ�����ƣ�</td>
        <td height="39"><input name="bookName" type="text"  id="bookName" value="<?php echo $info[bookname];?>" readonly="yes" border="0"> </td>
      </tr>
      <tr>
        <td align="center">ͼ�����ͣ�</td>
        <td>
		<input type="text" value="<?php echo $info[typename];?>" readonly="yes">
         </td>
      </tr>
      <tr>
        <td align="center">��&nbsp;&nbsp;�ߣ�</td>
        <td><input name="author" type="text" id="author" value="<?php echo $info[author];?>" readonly="yes"></td>
      </tr>
      <tr>
        <td align="center">��&nbsp;&nbsp;�ߣ�</td>
        <td><input name="translator" type="text" id="translator" value="<?php echo $info[translator];?>"readonly="yes" ></td>
      </tr>
      <tr>
        <td align="center">��&nbsp;��&nbsp;�磺</td>
        <td>
		<input name="isbn" type="text"  value="<?php echo $info[pubname];?>" readonly="yes">
        </td>
      </tr>
      <tr>
        <td align="center">��&nbsp;&nbsp;��</td>
        <td><input name="price" type="text" id="price" value="<?php echo $info[price];?>"readonly="yes">
        (Ԫ)</td>
      </tr>
      <tr>
        <td align="center">ҳ&nbsp;&nbsp;�룺</td>
        <td><input name="page" type="text" id="page" value="<?php echo $info[page];?>"readonly="yes"></td>
      </tr>
      <tr>
        <td align="center">��&nbsp;&nbsp;�ܣ�</td>
        <td><input name="bookcaseid"  value="<?php echo $info[name];?>"readonly="yes">
      </tr>
      <tr>
        <td colspan="2" align="center">
			  <input name="Submit2" type="button" class="btn_grey" value="����" onClick="history.back();"></td>
        </tr>
    </table>
	</td>
  </tr>
</table></td>
      </tr>
    </table></td>
  </tr>
</table><?php include("copyright.php");?></td>
  </tr>
</table>
</td>
  </tr>
</table>
</body>
</html>
