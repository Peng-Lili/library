<?php session_start();?>
<html>
<script language="jscript">
function check(form){
	if(form.name.value==""){
		alert("�������������!");form.name.focus();return false;
	}
	
	if(form.paperNO.value==""){
		alert("������֤������!");form.paperNO.focus();return false;
	}
}
</script>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link href="css/style.css" rel="stylesheet">
</head>
<body>
<table width="776" border="0" align="center" cellpadding="0" cellspacing="0" class="tableBorder">
  <tr>
    <td>
	<?php include("scan_top.php");?>
	</td>
  </tr>
	<td>
	<table width="100%"  border="0" cellspacing="0" cellpadding="0">
	  <tr>
	    <td valign="top" bgcolor="#FFFFFF">
	      <table width="99%" height="510"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="tableBorder_gray">
	        <tr>
	         <td height="510" valign="top" style="padding:5px;">
	         
	          <table width="98%" height="487"  border="0" cellpadding="0" cellspacing="0">
	           <tr>
	            <td height="22" valign="top" class="word_orange">��ǰλ�ã����߹��� &gt; ���ߵ������� &gt; ��Ӷ�����Ϣ &gt;&gt;&gt;</td>
	           </tr>
	           
	           <tr>
	            <td align="center" valign="top">
	             <table width="100%" height="493"  border="0" cellpadding="0" cellspacing="0">
	              <tr>
                  <td align="center" valign="top">
                  
	               <form name="form1" method="post" action="zhuce_ok.php">
	                 <table width="600" height="432"  border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                       <tr>
				        <td width="173" align="center">������</td>
				        <td width="427" height="39"><input name="name" type="text">           *         </td>
     				   </tr>
      				  <tr>
				       <td width="173" align="center">�Ա�</td>
				       <td height="35"><input name="sex" type="radio" class="noborder" id="radiobutton" value="��" checked>
				                       <label for="radiobutton">�� </label>
          							<label><input name="sex" type="radio" class="noborder" value="Ů"> Ů</label></td>
     				 </tr>
				     <tr>
				        <td align="center">ְҵ��</td>
				        <td><input name="vocation" type="text" id="vocation"></td>
				     </tr>
				     <tr>
				        <td align="center">��Ч֤����</td>
				        <td><select name="paperType" class="wenbenkuang" id="paperType">
				          <option value="���֤" selected>���֤</option>
				          <option value="ѧ��֤">ѧ��֤</option>
				          <option value="����֤">����֤</option>
				          <option value="����֤">����֤</option>
				          </select></td>
				      </tr>
				      <tr>
				        <td align="center">֤�����룺</td>
				        <td><input name="paperNO" type="text" id="paperNO">* </td>
				      </tr>
				      <tr>
				        <td align="center">�绰��</td>
				        <td><input name="tel" type="text" id="tel"></td>
				      </tr>
				      <tr>
				          <td align="center">���룺</td>
				          <td><input name="code" type="text" id="code" value="<?php echo $result[code];?>"></td>
				       </tr>
				      <tr>
				        <td align="center">&nbsp;</td>
				        <td><input name="Submit" type="submit" class="btn_grey" value="����" onClick="return check(form1)">&nbsp;
				            <input name="Submit2" type="button" class="btn_grey" value="����" onClick="history.back()"></td>
				      </tr>
    				 </table>
				    </form>
			      </td>
                 </tr>
                </table>
               </td>
              </tr>
             </table>
            </td>
           </tr>
       </table>
	   <?php include("copyright.php");?>
     </td>
    </tr>
   </table>
  </td>
  </tr>
</table>
</body>
</html>
