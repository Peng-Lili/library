<?php
session_start();
include("conn/conn.php");
$query=mysql_query("select r.* from tb_reader r where name='$_SESSION[admin_name]'");
$info=mysql_fetch_array($query);
?>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<script src="JS/menu.JS"></script>
<div class=menuskin id=popmenu
      onmouseover="clearhidemenu();highlightmenu(event,'on')"
      onmouseout="highlightmenu(event,'off');dynamichide(event)" style="Z-index:100;position:absolute;"></div>
<table width="776" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="115" align="right" valign="bottom" background="Images/scantop.png" bgcolor="#FD9C11"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="26" align="right">��ǰ��¼���û���<?php echo $_SESSION[admin_name];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="33" align="right" background="Images/scantop.png" bgcolor="#FD9C11"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="5%"></td>
        <td width="23%"><script type=text/javascript>
		document.write("<span id='labtime' width='120px' Font-Size='9pt'></span>")
		setInterval("labtime.innerText=new Date().toLocaleString()",1000)
		</script></td>
        <td width="70%" align="right"><a href="readerindex.php" class="a1">��ҳ</a> ��
        <a  href="readerhistory.php" class="a1">��ʷ��¼</a> �� 
        <a  href="pwd_readerchange.php" class="a1">������Ϣ</a> �� <a href="safequit.php" class="a1">ע��</a></td>
        <td width="2%">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
