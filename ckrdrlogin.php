<?php
session_start();
$A_name=$_POST[name];          //���ձ��ύ���û���
$A_pwd=$_POST[pwd];            //���ձ��ύ������

class chkinput{                //������
   var $name; 
   var $pwd;

   function chkinput($x,$y){
     $this->name=$x;
     $this->pwd=$y;
    }

   function checkinput(){
     include("conn/conn.php");   		  //��������Դ    
     $sql=mysql_query("select * from tb_reader where paperNO='".$this->name."' and pwd='".$this->pwd."'",$conn);
     $info=mysql_fetch_array($sql);       //����
     if($info==false){                    
          echo "<script language='javascript'>alert('������Ķ���֤����������������������룡');history.back();</script>";
          exit;
       }
      else{                           
          echo "<script>alert('���ߵ�¼�ɹ�!');window.location='readerindex.php';</script>";
		 $_SESSION[admin_name]=$info[name];
		 $_SESSION[pwd]=$info[pwd];
   }
 }
}
    $obj=new chkinput(trim($A_name),trim($A_pwd));      //��������
    $obj->checkinput();          				    //������


?>

