<?php session_start();?>
<html>
<head>
<link href="css/style.css" rel="stylesheet">
</head>
<body>
<table width="776" border="0" align="center" cellpadding="0" cellspacing="0" class="tableBorder">
  <tr>
    <td>
	<?php include("navigation.php");?>
	</td>
	</tr>
	<td>
	<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top" bgcolor="#FFFFFF"><table width="99%" height="510"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="tableBorder_gray">
  <tr>
    <td height="510" align="center" valign="top" style="padding:5px;"><table width="98%" height="487"  border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td align="center" valign="top">
		<script language="javascript">
		function checkreader(form){
			if(form.id.value==""){
				alert("���������id!");form.id.focus();return;
			}
			form.submit();
		}
		</script>
<form name="form1" method="post" action="">
		<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tableBorder_gray">
   <tr>
     <td valign="top"><table width="100%" border="0" cellpadding="02" cellspacing="2" bordercolor="#E3F4F7">
       <tr>
         <td height="33" background="Images/bookgh.gif">&nbsp;</td>
       </tr>
       <tr>
         <td valign="top" bgcolor="#D2E6F1">
<?php 
include("conn/conn.php");
$sql=mysql_query("select borr.id as borrid,borr.borrowTime,borr.backTime,borr.ifback,r.*, 
		b.bookname,b.price,pub.pubname,bc.name as bookcase from tb_borrow as borr 
		join tb_reader r on borr.readerid=r.id 
		join tb_bookinfo as b on b.id=borr.bookid 
		join tb_publishing as pub on b.ISBM=pub.ISBN 
		join tb_bookcase as bc on b.bookcase=bc.id
		where r.id='".$_POST[id]."' and borr.ifback=0");
$info=mysql_fetch_array($sql);
?>
		 <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
           <tr>
             <td width="33%"><table width="100%" height="74" border="0" cellpadding="0" cellspacing="0">
               <tr>
                 <td height="27" colspan="2" align="center"><table width="90%" height="21" border="0" cellpadding="0" cellspacing="0">
                   <tr>
                     <td width="132" background="Images/bg_line.gif">&nbsp;</td>
                     <td>&nbsp;</td>
                   </tr>
                 </table></td>
               </tr>
               <tr>
                 <td width="8%" height="27">&nbsp;</td>
                 <td width="92%">����id��</td>
               </tr>
               <tr>
                 <td height="27" colspan="2" align="center"><input name="id" type="text" id="id" value="<?php echo $info[id];?>" size="24">
                   &nbsp;
                   <input name="Button" type="button" class="btn_grey" value="ȷ��" onClick="checkreader(form1)"></td>
               </tr>
             </table></td>
             <td width="1%" align="center" valign="bottom"><img src="Images/borrow_fg.gif" width="18" height="111"></td>
             <td width="66%" align="right">
			 <table width="96%" border="0" cellpadding="0" cellspacing="0">
               <tr>
                 <td height="27">��&nbsp;&nbsp;&nbsp;&nbsp;����
                       <input name="readername" type="text" id="readername" value="<?php echo $info[name];?>"></td>
                 <td>��&nbsp;&nbsp;&nbsp;&nbsp;��
                   <input name="sex" type="text" id="sex" value="<?php echo $info[sex];?>"></td>
               </tr>
               <tr>
                 <td height="27">֤�����ͣ�
                   <input name="paperType" type="text" id="paperType" value="<?php echo $info[paperType];?>"></td>
                 <td>֤�����룺
                   <input name="paperNo" type="text" id="paperNo" value="<?php echo $info[paperNO];?>"></td>
               </tr>
               <tr>
                 <td height="27">�������ͣ�
                   <input name="readerType" type="text" id="readerType" value="<?php echo $info[typename];?>"></td>
                 
               </tr>
             </table>			 </td>
           </tr>
         </table>		 </td>
       </tr>
       <tr>
         <td valign="top" bgcolor="#D2E5F1"><table width="100%" height="35" border="1" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#D2E3E6" bgcolor="#FFFFFF">
                   <tr align="center" bgcolor="#e3F4F7">
                     <td width="24%" height="25" bgcolor="#F0FAFB">ͼ������</td>
                     <td width="12%" bgcolor="#F0FAFB">����ʱ��</td>
                     <td width="13%" bgcolor="#F0FAFB">Ӧ��ʱ��</td>
                     <td width="14%" bgcolor="#F0FAFB">������</td>
                     <td width="12%" bgcolor="#F0FAFB">���</td>
                     <td bgcolor="#F0FAFB">����(Ԫ)</td>
                     <td width="12%" bgcolor="#F0FAFB"><input name="Button22" type="button" class="btn_grey" value="��ɹ黹" onClick="window.location.href='bookBack.php'"></td>
                   </tr>
<?php
if($info){
 do{?>
                   <tr>
                     <td height="25" style="padding:5px;">&nbsp;<?php echo $info[bookname];?></td>
                     <td style="padding:5px;">&nbsp;<?php echo $info[borrowTime];?></td>
                     <td style="padding:5px;">&nbsp;<?php echo $info[backTime];?></td>
                     <td align="center">&nbsp;<?php echo $info[pubname];?></td>
                     <td align="center">&nbsp;<?php echo $info[bookcase];?></td>
                     <td width="13%" align="center">&nbsp;<?php echo $info[price];?></td>
                     <td width="12%" align="center"><a href="bookBack_ok.php?borrid=<?php echo $info[borrid];?>&id=<?php echo $info[id];?>">�黹</a>&nbsp;</td>
                   </tr>
<?php
}while($info=mysql_fetch_array($sql));
}
 ?>
                 </table>                 </td>
       </tr>
     </table></td>
   </tr>
</table>
 </form> </td>
      </tr>
    </table>
</td>
  </tr>
</table><?php include("copyright.php");?></td>
  </tr>
</table>
</td>
</tr>
</table>
</body>
</html>
