<?php
session_start();
header('Content-Type: text/html; charset=tis-620');
?>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<?php

$webtimeout=10; //˹����� �ҷ� 
$webtimeout_showflag=0; // 1 �ʴ� 0 ��͹ 

//Connection
$connection = 0 ; 	// 0 = sql , 1 = oracle 
$confirm2use = 0 ; 	// 0 = disable , 1 = enable
$printslip = 1 ; // 0 = disable , 1 = enable
$logstatus = 1; // 0 = disable , 1 = enable 
$repassword = 1 ; // 0 = disable , 1 = enable 
$confirmmenu = 0 ; // 0 = disable , 1 = enable 

//���������ͧ�鹷���ʴ�˹���á
$title = '�ˡó������Ѿ�� �Ҹ�ó�آ�����ҹ� �ӡѴ';
$title1 = '�ˡó������Ѿ�� �Ҹ�ó�آ�����ҹ� �ӡѴ';
$sub_title = '�к���ԡ����Ҫԡ';
$sub_title1 = "PATHUMTHANI PUBLIC HEALTH SAVING AND CREDIT COOPERATIVE, LIMITED";
$address = '<font size="2">
83 �������-�ѧ�Ե �.�ҧ��͡ �.���ͧ�����ҹ� �.�����ҹ� 12000  <br>
��.02-000-6704,088-554-2420 �����.0-2000-6704 
<br></font></font> ';
$credite = '&copy; 2014  All Rights Reserved  <a href="http://www.cooppathum.com/ " target="new">www.cooppathum.com </a> | Design By <a href="http://www.isocare.co.th" target="new">Isocare System Co.,Ltd&#8482; </a>';
// login
$bg_login_color  = '#3DB013';
$bg_bar_login_color = '#ffffff';
$font_bar_login_color  = '#3DB013';

// register
$email_register = 1 ;			// 0 ��� , 1 �ѧ�Ѻ ������	
$mobile_register = 1 ;		// 0 ��� , 1.�ѧ�Ѻ ������

// menu
$menu_color = '#3DB013';
//$user_memu = array('���������Ҫԡ','���������','�������Թ�ҡ','�������Թ���','�����Ť�ӻ�Сѹ','�ѹ��-����¤׹');
//$user_link = array('','Share','Deposit','Loan','Ref_collno','Dividend');

//$user_memu = array('���������Ҫԡ','���������','�������Թ�ҡ','�������Թ���','�����Ť�ӻ�Сѹ');
//$user_link = array('','Share','Deposit','Loan','Ref_collno');

$user_memu = array('���������Ҫԡ','���������','�������Թ�ҡ','�������Թ���','�����Ť�ӻ�Сѹ','��¡���ѡ��Ш���͹','�ѹ��-����¤׹');
$user_link = array('','Share','Deposit','Loan','Ref_collno','Payment','Dividend');

if($connection == 0){
//$admin_menu  = array('��������ػ���','�������ǻ�С��','͹��ѵ�-ź ��Ҫԡ','��§ҹ�׹�ѹ�ʹ','����¹���ʼ�ҹ','��駤��','�������к�');
//$admin_link  = array('','News_editer','Management_Member','ConfirmReport','Change_Pwd','Configuration','Information');

//$admin_menu  = array('��������ػ���','�������ǻ�С��','͹��ѵ�-ź ��Ҫԡ','��§ҹ�׹�ѹ�ʹ','����¹���ʼ�ҹ','�������к�');
//$admin_link  = array('','News_editer','Management_Member','ConfirmReport','Change_Pwd','Information');
    
$admin_menu  = array('��������ػ���','�������ǻ�С��','͹��ѵ�-ź ��Ҫԡ','��§ҹ��Ѥ����ԡ��','����¹���ʼ�ҹ');
$admin_link  = array('','News_editer','Management_Member','Report_Register','Change_Pwd');

}else{
$admin_menu  = array('�������ǻ�С��','����¹���ʼ�ҹ');
$admin_link  = array('News_editer','Change_Pwd');
}

?>




