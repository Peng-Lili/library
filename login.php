<html>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<head>
<title>ѧУͼ��ݹ���ϵͳ</title>
<link href="css/style.css" rel="stylesheet">
<script language="javascript">
function check(form){
	if (form.name.value==""){
		alert("���������Ա����!");form.name.focus();return false;
	}
	if (form.pwd.value==""){
		alert("����������!");form.pwd.focus();return false;
	}	
}
</script>
</head>
<body>
<table width="776" border="0" align="center" cellpadding="0" cellspacing="0" class="tableBorder">
  <tr>
    <td>
	<?php include("scan_top.php");?>
	</td>
	</tr>

<form name="form1" method="post" action="chklogin.php">
  <table width="776"  border="0"  align="center"cellspacing="0" cellpadding="0" bordercolorlight="#86C1E6" bordercolordark="#D2E3E6">
    <tr>
      <td width="30%" bgcolor="#86C1E6">&nbsp;</td>
      <td width="32%" background="Images/subBG.jpg">
      
        <table width="603" height="410"  border="0" align="center" cellpadding="0" cellspacing="0" bordercolorlight="#FFFFFF" bordercolordark="#D2E3E6">
        
        <tr>
          <td width="50%" height="100" align="center">&nbsp;</td>
          <td width="50%">&nbsp;          </td>
        </tr>
        
        <tr>
          <td height="30" align="center">����Ա���ƣ�
            <input name="name" type="text" class="logininput" id="name3" size="25"></td>
          <td height="30" valign="top">&nbsp;</td>
        </tr>
        
        <tr>
          <td height="30" align="center">����Ա���룺
            <input name="pwd" type="password" class="logininput" id="pwd2" size="25"></td>
          <td height="30" valign="top">&nbsp;</td>
        </tr>
        
        <tr>
          <td height="30" align="center"><input name="submit" type="submit" class="btn_grey" value="ȷ��" onClick="return check(form1)">&nbsp;
											<input name="submit1" type="reset" class="btn_grey" value="����">&nbsp;
											<input name="submit2" type="button" class="btn_grey" value="�ر�" onClick="window.close();"></td>
          <td height="30" align="center" valign="top">&nbsp;</td>
        </tr>
        
        <tr>
          <td height="53" colspan="2" align="center"></td>
        </tr>
      </table>
      </td>
      <td width="30%" bgcolor="86C1E6"><br></td>
    </tr>
  </table>
  <?php include("copyright.php"); ?></td>
  </tr>
</form>
</table>
</body>
</html>
