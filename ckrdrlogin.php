<?php
session_start();
$A_name=$_POST[name];          //接收表单提交的用户名
$A_pwd=$_POST[pwd];            //接收表单提交的密码

class chkinput{                //定义类
   var $name; 
   var $pwd;

   function chkinput($x,$y){
     $this->name=$x;
     $this->pwd=$y;
    }

   function checkinput(){
     include("conn/conn.php");   		  //连接数据源    
     $sql=mysql_query("select * from tb_reader where paperNO='".$this->name."' and pwd='".$this->pwd."'",$conn);
     $info=mysql_fetch_array($sql);       //检索
     if($info==false){                    
          echo "<script language='javascript'>alert('您输入的读者证件号码输入错误，请重新输入！');history.back();</script>";
          exit;
       }
      else{                           
          echo "<script>alert('读者登录成功!');window.location='readerindex.php';</script>";
		 $_SESSION[admin_name]=$info[name];
		 $_SESSION[pwd]=$info[pwd];
   }
 }
}
    $obj=new chkinput(trim($A_name),trim($A_pwd));      //创建对象
    $obj->checkinput();          				    //调用类


?>

