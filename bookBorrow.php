<?php session_start();?>
<html>
<head>
<link href="css/style.css" rel="stylesheet">
		<script language="javascript">
		function checkreader(form){
			if(form.id.value==""){
				alert("���������id!");form.id.focus();return false;
			}
			form.submit();
		}
		function checkbook(form){
			if(form.id.value==""){
				alert("���������id!");form.id.focus();return false;
			}		
			if(form.inputkey.value==""){
				alert("�������ѯ�ؼ���!");form.inputkey.focus();return false;
			}

			if(form.number.value-form.borrowNumber.value<=0){
				alert("�������ٽ�������ͼ����!");return false;
			}
        form.submit();
	   }
		</script>
</head>
<body>
<?php include("navigation.php");?>
<table width="776"  border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td valign="top" bgcolor="#FFFFFF"><table width="100%" height="509"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="tableBorder_gray">
  <tr>
    <td align="left" valign="top" style="padding:5px;"> &nbsp; <span class="word_orange">&nbsp;��ǰλ�ã�ͼ��軹 &gt; ͼ�����&gt;&gt;&gt; </span>      <table width="100%"  border="0" cellpadding="0" cellspacing="0">
	<?php
		include("conn/conn.php");
		
		$sql=mysql_query("select r.*,t.name as typename,t.number from tb_reader r left join tb_readertype t on r.typeid=t.id where r.id='".$_POST[id]."'");
		$info=mysql_fetch_array($sql);
	?>
	<form name="form1" method="post" action="bookBorrow.php">
        <tr>
          <td height="72" align="center" valign="top" background="Images/main_booksort_1.gif" bgcolor="#F8BF73">
          <br>		  
          <table width="96%" border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" bgcolor="#9ECFEE" class="tableBorder_grey">
          <tr>
              <td height="33" valign="top" background="Images/bookborr.gif">
                  <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  
				
                    <tr>
                      <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td height="33" background="Images/bookborr.gif">&nbsp;</td>
                        </tr>
                      </table>
                        <table width="100%" height="21" border="0" cellpadding="0" cellspacing="0">
                          <tr>
                            <td width="24%" height="18" style="padding-left:7px;padding-top:7px;"><img src="Images/bg_line.gif" width="132" height="20"></td>
                            <td width="76%" style="padding-top:7px;">����id��
                              <input name="id" type="text" id="id" size="24" value="<?php echo $info[id];?>">
                            &nbsp;
                              <input name="Button" type="submit" class="btn_grey" value="ȷ��" onClick="checkreader(form1)"></td>
                          </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td height="13" align="left" style="padding-left:7px;"><hr width="90%" size="1"></td>
                      </tr>
                    <tr>
                      <td align="center"><table width="96%" border="0" cellpadding="0" cellspacing="0">
                          <tr>
                            <td height="27">��&nbsp;&nbsp;&nbsp;&nbsp;����
                              <input name="readername" type="text" id="readername" value="<?php echo $info[name];?>">
                              <input name="readerid" type="hidden" id="readerid" value="<?php echo $info[id];?>"></td>
                            <td>��&nbsp;&nbsp;&nbsp;&nbsp;��
                              <input name="sex" type="text" id="sex" value="<?php echo $info[sex];?>"></td>
                            <td>�������ͣ�
                              <input name="readerType" type="text" id="readerType" value="<?php echo $info[typename];?>"></td>
                          </tr>
                          <tr>
                            <td height="27">֤�����ͣ�
                              <input name="paperType" type="text" id="paperType" value="<?php echo $info[paperType];?>"></td>
                            <td>֤�����룺
                              <input name="paperNo" type="text" id="paperNo" value="<?php echo $info[paperNO];?>"></td>
                          </tr>
                      </table></td>
                    </tr>
                </table></td>
            </tr>
                 <tr>
                   <td height="32">&nbsp;��ӵ����ݣ�
                     <input name="f" type="radio" class="noborder" value="barcode" checked>
                     ͼ�������� &nbsp;&nbsp;
                     <input name="f" type="radio" class="noborder" value="bookname"checked>
  ͼ������&nbsp;&nbsp;
  <input name="inputkey" type="text" id="inputkey" size="50">
                     <input name="Submit" type="submit" class="btn_grey" id="Submit" onClick="checkbook(form1);" value="ȷ��">
                     <input name="operator" type="hidden" id="operator" value="<?php echo $_SESSION[adminname];?>">
    <input name="Button2" type="button" class="btn_grey" id="Button2" onclick="window.location.href='bookBorrow.php'" value="��ɽ���">                   </td>
                 </tr> 
            <tr>
              <td valign="top" bgcolor="#D2E5F1" style="padding:5px"><table width="99%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#9ECFEE" bgcolor="#FFFFFF">
                     <tr align="center" bgcolor="#E2F4F6">
                       <td width="29%" height="25">ͼ������</td>
                       <td width="12%">����ʱ��</td>
                       <td width="14%">Ӧ��ʱ��</td>
                       <td width="17%">������</td>
                       <td width="14%">���</td>
                       <td colspan="2">����(Ԫ)</td>
                     </tr>
<?php
$readerid=$info[id];
$sql1=mysql_query("select r.*,borr.borrowTime,borr.backTime,book.bookname,book.price,pub.pubname,bc.name as bookcase 
		from tb_borrow as borr join tb_bookinfo as book on book.id=borr.bookid join tb_publishing as pub on book.ISBM=pub.ISBN 
		join tb_bookcase as bc on book.bookcase=bc.id join tb_reader as r on borr.readerid=r.id  
		where borr.readerid='$readerid' and borr.ifback=0");
$info1=mysql_fetch_array($sql1);
$borrowNumber=mysql_num_rows($sql1);     //��ȡ��������е���Ŀ
do{
?>
                     <tr>
                       <td height="25" style="padding:5px;">&nbsp;<?php echo $info1[bookname];?></td>
                       <td style="padding:5px;">&nbsp;<?php echo $info1[borrowTime];?></td>
                       <td style="padding:5px;">&nbsp;<?php echo $info1[backTime];?></td>
                       <td align="center">&nbsp;<?php echo $info1[pubname];?></td>
                       <td align="center">&nbsp;<?php echo $info1[bookcase];?></td>
                       <td width="14%" align="center">&nbsp;<?php echo $info1[price];?></td>
                     </tr>
<?php 
}while($info1=mysql_fetch_array($sql1));
?>
   <input name="borrowNumber" type="hidden" id="borrowNumber" value="<?php echo $borrowNumber; ?>">

                   </table>			</td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td height="19" background="Images/main_booksort_2.gif">&nbsp;</td>
        </tr>
	   </form>
<?php
if ($_POST[inputkey]!=""&&$info[id]!=""){
$f=$_POST[f];
$inputkey=trim($_POST[inputkey]);
$barcode=$_POST[barcode];
$readerid=$_POST[readerid];
$borrowTime=date('Y-m-d');
$backTime=date("Y-m-d",(time()+3600*24*30));        //�黹ͼ������Ϊ��ǰ������+30������
$query=mysql_query("select * from tb_bookinfo where $f='$inputkey'");
$result=mysql_fetch_array($query);   //����ͼ����Ϣ�Ƿ����
if($result==false){
	echo "<script language='javascript'>alert('��ͼ�鲻���ڣ�');window.location.href='bookBorrow.php?barcode=$barcode';</script>";
}
else{
	$query1=mysql_query("select r.*,borr.borrowTime,borr.backTime,book.bookname,book.price,pub.pubname,bc.name as bookcase 
			from tb_borrow as borr 
			join tb_reader as r on borr.readerid=r.id 
			join tb_bookinfo as book on book.id=borr.bookid 
			join tb_publishing as pub on book.ISBM=pub.ISBN  
			join tb_bookcase as bc on book.bookcase=bc.id  
			where borr.bookid=$result[id] and borr.readerid=$readerid and ifback=0");   //�����ö��������ĵ�ͼ���Ƿ����ٽ�ͼ���ظ�
	$result1=mysql_fetch_array($query1);
	if($result1==true){    //������ĵ�ͼ���ѱ��ö��߽��ģ���ô��ʾ�����ظ����� 
		echo "<script language='javascript'>alert('��ͼ���Ѿ����ģ�');window.location.href='bookBorrow.php?barcode=$barcode';</script>";
	}
	else{    //�������ͼ����Ĳ���
			$bookid=$result[id];
			mysql_query("insert into tb_borrow(readerid,bookid,borrowTime,backTime,operator,ifback)values('$readerid','$bookid','$borrowTime','$backTime','$_SESSION[admin_name]',0)");
			mysql_query("update tb_bookinfo as bf ,tb_borrow as br 
					set bf.bookin=bf.bookin-1,bf.bookout=bf.bookout+1
					where br.bookid='$bookid' and  bf.id=br.bookid");
	
				
 			echo "<script language='javascript'>alert('ͼ����Ĳ����ɹ���');window.location.href='bookBorrow.php?barcode=$barcode';</script>";
}
}
}

?>
    </table></td>
  </tr>
</table>
    <?php include("copyright.php");?></td>
  </tr>
</table>
</body>
</html>