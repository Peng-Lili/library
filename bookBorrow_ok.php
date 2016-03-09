<?php
 session_start();
if ($_POST[inputkey]!=""&&$info[id]!=""){
$f=$_POST[f];
$inputkey=trim($_POST[inputkey]);
$barcode=$_POST[barcode];
$readerid=$_POST[readerid];
$borrowTime=date('Y-m-d');
$backTime=date("Y-m-d",(time()+3600*24*30));        //归还图书日期为当前期日期+30天期限
$query=mysql_query("select * from tb_bookinfo where $f='$inputkey'");
$result=mysql_fetch_array($query);   //检索图书信息是否存在
if($result==false){
	echo "<script language='javascript'>alert('该图书不存在！');window.location.href='bookBorrow.php?barcode=$barcode';</script>";
}
else{
	$query1=mysql_query("select r.*,borr.borrowTime,borr.backTime,book.bookname,book.price,pub.pubname,bc.name as bookcase 
			from tb_borrow as borr 
			join tb_reader as r on borr.readerid=r.id 
			join tb_bookinfo as book on book.id=borr.bookid 
			join tb_publishing as pub on book.ISBM=pub.ISBN  
			join tb_bookcase as bc on book.bookcase=bc.id  
			where borr.bookid=$result[id] and borr.readerid=$readerid and ifback=0");   //检索该读者所借阅的图书是否与再借图书重复
	$result1=mysql_fetch_array($query1);
	if($result1==true){    //如果借阅的图书已被该读者借阅，那么提示不能重复借阅 
		echo "<script language='javascript'>alert('该图书已经借阅！');window.location.href='bookBorrow.php?barcode=$barcode';</script>";
	}
	else{    //否则，完成图书借阅操作
			$bookid=$result[id];
			mysql_query("insert into tb_borrow(readerid,bookid,borrowTime,backTime,operator,ifback)values('$readerid','$bookid','$borrowTime','$backTime','$_SESSION[admin_name]',0)");
			mysql_query("update tb_bookinfo as bf ,tb_borrow as br set bf.bookin=bf.bookin-1,bf.bookout=bf.bookout+1  where  bf.id=br.bookid");
	
				
 			echo "<script language='javascript'>alert('图书借阅操作成功！');window.location.href='bookBorrow.php?barcode=$barcode';</script>";
}
}
}

?>