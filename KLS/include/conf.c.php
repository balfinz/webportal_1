<?php
session_start();
header('Content-Type: text/html; charset=tis-620');
?>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<?php

//Connection
$connection = 0 ; 	// 0 = sql , 1 = oracle 
$confirm2use = 0 ; 	// 0 = disable , 1 = enable
$printslip = 1 ; // 0 = disable , 1 = enable
$logstatus = 1; // 0 = disable , 1 = enable 
$repassword = 1 ; // 0 = disable , 1 = enable 
$confirmmenu = 0 ; // 0 = disable , 1 = enable 

//���������ͧ�鹷���ʴ�˹���á
$title = '�ˡó������Ѿ���١���Թ��� �ӡѴ';
$title1 = '�ˡó������Ѿ���١���Թ��� �ӡѴ';
$sub_title = '�к���ԡ����Ҫԡ';
$sub_title1 = "KALASIN TEACHER'S SAVING AND CREDIT COOPERATIVE LIMITED";
//�� : 043811881 ��� 113
$address = '<font size="2">
8/1 ���ʹ���Թ �Ӻš���Թ��� ��������ͧ�ѧ��Ѵ����Թ��� 46000<br>
�� : 043-840126 , 043-840127&nbsp;&nbsp; <br>
E-Mail : kalasin_tsc@yahoo.co.th&nbsp;&nbsp;&nbsp;, kalasintsc@gmail.com&nbsp;<br></font></font> ';
$credite = '&copy; 2014  All Rights Reserved  <a href="http://kalasintsc.net" target="new">www.kalasintsc.net</a> | Design By <a href="http://www.isocare.co.th" target="new">Isocare System Co.,Ltd&#8482; </a>';
// login
$bg_login_color  = '#6A5ACD';
$bg_bar_login_color = '#ffffff';
$font_bar_login_color  = 'blue';

// register
$email_register = 1 ;			// 0 ��� , 1 �ѧ�Ѻ ������	
$mobile_register = 1 ;		// 0 ��� , 1.�ѧ�Ѻ ������

// menu
$menu_color = '#6A5ACD';
//$user_memu = array('���������Ҫԡ','���������','�������Թ�ҡ','�������Թ���','�����Ť�ӻ�Сѹ','�ѹ��-����¤׹');
//$user_link = array('','Share','Deposit','Loan','Ref_collno','Dividend');

//$user_memu = array('���������Ҫԡ','���������','�������Թ�ҡ','�������Թ���','�����Ť�ӻ�Сѹ');
//$user_link = array('','Share','Deposit','Loan','Ref_collno');

$user_memu = array('���������Ҫԡ','���������','�������Թ�ҡ','�������Թ���','�����Ť�ӻ�Сѹ','��¡���ѡ��Ш���͹','�ѹ��-����¤׹');
$user_link = array('','Share','Deposit','Loan','Ref_collno','Payment','Dividend');

// $user_memu = array('���������Ҫԡ','���������','�������Թ�ҡ','�������Թ���','�����Ť�ӻ�Сѹ','��¡���ѡ��Ш���͹','����¡��','�ѹ��-����¤׹');
// $user_link = array('','Share','Deposit','Loan','Ref_collno','Payment','Payment_temp','Dividend');

if($connection == 0){
//$admin_menu  = array('��������ػ���','�������ǻ�С��','͹��ѵ�-ź ��Ҫԡ','��§ҹ�׹�ѹ�ʹ','����¹���ʼ�ҹ','��駤��','�������к�');
//$admin_link  = array('','News_editer','Management_Member','ConfirmReport','Change_Pwd','Configuration','Information');

//$admin_menu  = array('��������ػ���','�������ǻ�С��','͹��ѵ�-ź ��Ҫԡ','��§ҹ�׹�ѹ�ʹ','����¹���ʼ�ҹ','�������к�');
//$admin_link  = array('','News_editer','Management_Member','ConfirmReport','Change_Pwd','Information');
    
$admin_menu  = array('��������ػ���','�������ǻ�С��','͹��ѵ�-ź ��Ҫԡ','����¹���ʼ�ҹ');
$admin_link  = array('','News_editer','Management_Member','Change_Pwd');

}else{
$admin_menu  = array('�������ǻ�С��','����¹���ʼ�ҹ');
$admin_link  = array('News_editer','Change_Pwd');
}

?>




