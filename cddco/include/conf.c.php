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

//���������ͧ�鹷���ʴ�˹���á
$title = '�ˡó������Ѿ������þѲ�Ҫ���� �ӡѴ';
$title1 = '��.��';
$sub_title = '�к���ԡ����Ҫԡ';
$sub_title1 = "COMMUNITY DEVELOPMENT DEPARTMENT SAVINGS AND CREDIT CO-OPERATIVE LD.,";
$address = '120 ������ 3, �Ҥ�ú� ��� 1 �ٹ���Ҫ�������������õ� 80 ����� 5 �ѹ�Ҥ� 2550, ������Ѳ��, �ǧ����ͧ��ͧ ࢵ��ѡ��� ��ا෾��ҹ��, 10210 �� :
02-1438144';
$credite = '&copy; 2014  All Rights Reserved  <a href="http://www.cddco-op.com//" target="new">www.cddco-op.com</a> | Desige By <a href="http://www.isocare.co.th" target="new">Isocare System Co.,Ltd&#8482; </a>';
// login
$bg_login_color  = '6699FF';
$bg_bar_login_color = '#ffffff';
$font_bar_login_color  = '#2d2e90';

// register
$email_register = 0 ;		// 0 ��� , 1 �ѧ�Ѻ ������	
$mobile_register = 0 ;		// 0 ��� , 1.�ѧ�Ѻ ������

// menu
$menu_color = '3399FF';

//$user_memu = array('���������Ҫԡ','���������','�������Թ�ҡ','�������Թ���','�����Ť�ӻ�Сѹ','��¡���ѡ��Ш���͹','�ѹ��-����¤׹');
//$user_link = array('','Share','Deposit','Loan','Ref_collno','Payment','Dividend');

$user_memu = array('���������Ҫԡ','���������','�������Թ�ҡ','�������Թ���','�����Ť�ӻ�Сѹ','��¡���ѡ��Ш���͹','�ѹ��-����¤׹','�����ż���Ѻ�͹����ª��','�����Ż�Сѹ');
$user_link = array('','Share','Deposit','Loan','Ref_collno','Payment','Dividend','Beneficiary','Insurance');

if($connection == 0){
$admin_menu  = array('��������ػ���','�������ǻ�С��','͹��ѵ�-ź ��Ҫԡ','����¹���ʼ�ҹ','�������к�');
$admin_link  = array('','News_editer','Management_Member','Change_Pwd','Information');
}else{
$admin_menu  = array('�������ǻ�С��','����¹���ʼ�ҹ');
$admin_link  = array('News_editer','Change_Pwd');
}

?>




