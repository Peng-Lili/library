<?php
 session_start();
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
			mysql_query("update tb_bookinfo as bf ,tb_borrow as br set bf.bookin=bf.bookin-1,bf.bookout=bf.bookout+1  where  bf.id=br.bookid");
	
				
 			echo "<script language='javascript'>alert('ͼ����Ĳ����ɹ���');window.location.href='bookBorrow.php?barcode=$barcode';</script>";
}
}
}

?>