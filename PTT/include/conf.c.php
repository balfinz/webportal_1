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
$confirmmenu = 1 ; // 0 = disable , 1 = enable 

//���������ͧ�鹷���ʴ�˹���á
$title = '�ˡó������Ѿ�� ��� �ӡѴ';
$title1 = '��.���';
$sub_title = '�к���ԡ����Ҫԡ';
$sub_title1 = "";
$address = '<font size="2">
555 ����Ǵ�-�ѧ�Ե �ǧ ��بѡ� ࢵ ��بѡ� ��ا෾��ҹ�� 10900 <br>
Web site:http://www.pttsc.com/ Tel: 02-5371494-9 &nbsp;&nbsp; 02-5372114-5 <br>
Fax: 02-5372112<br></font></font> ';
$credite = '&copy; 2014  All Rights Reserved  <a href="http://www.pttsc.com/" target="new">www.pttsc.com</a> | Design By <a href="http://www.isocare.co.th" target="new">Isocare System Co.,Ltd&#8482; </a>';
// login
$bg_login_color  = '#3366CC';
$bg_bar_login_color = '#ffffff';
$font_bar_login_color  = 'blue';

// register
$email_register = 1 ;			// 0 ��� , 1 �ѧ�Ѻ ������	
$mobile_register = 1 ;		// 0 ��� , 1.�ѧ�Ѻ ������

// menu
$menu_color = '#3366CC';
//$user_memu = array('���������Ҫԡ','���������','�������Թ�ҡ','�������Թ���','�����Ť�ӻ�Сѹ','�ѹ��-����¤׹');
//$user_link = array('','Share','Deposit','Loan','Ref_collno','Dividend');

//$user_memu = array('���������Ҫԡ','���������','�������Թ�ҡ','�������Թ���','�����Ť�ӻ�Сѹ');
//$user_link = array('','Share','Deposit','Loan','Ref_collno');

//$user_memu = array('���������Ҫԡ','���������','�������Թ�ҡ','�������Թ���','�����Ť�ӻ�Сѹ','��¡���ѡ��Ш���͹','�ѹ��-����¤׹');
//$user_link = array('','Share','Deposit','Loan','Ref_collno','Payment','Dividend');

//$user_memu = array('���������Ҫԡ','���������','�������Թ�ҡ','�������Թ���','�����Ť�ӻ�Сѹ','��¡���ѡ��Ш���͹');
//$user_link = array('','Share','Deposit','Loan','Ref_collno','Payment');

$user_memu = array('���������Ҫԡ','���������','�������Թ�ҡ','�������Թ���','�����Ť�ӻ�Сѹ','��¡���ѡ��Ш���͹','��ʶҹ��Ҿ','�ѹ��-����¤׹','�����ż���Ѻ�Ż���ª��');
$user_link = array('New','Share','Deposit','Loan','Ref_collno','Payment','Year_month','Dividend','Beneficiary');

if($connection == 0){
//$admin_menu  = array('��������ػ���','�������ǻ�С��','͹��ѵ�-ź ��Ҫԡ','��§ҹ�׹�ѹ�ʹ','����¹���ʼ�ҹ','��駤��','�������к�');
//$admin_link  = array('','News_editer','Management_Member','ConfirmReport','Change_Pwd','Configuration','Information');

//$admin_menu  = array('��������ػ���','�������ǻ�С��','͹��ѵ�-ź ��Ҫԡ','��§ҹ�׹�ѹ�ʹ','����¹���ʼ�ҹ','�������к�');
//$admin_link  = array('','News_editer','Management_Member','ConfirmReport','Change_Pwd','Information');

$admin_menu  = array('��������ػ���','�������ǻ�С��','͹��ѵ�-ź ��Ҫԡ','������Ҫԡ�ҡ����','����¹���ʼ�ҹ');
$admin_link  = array('','News_editer','Management_Member','Management_Member_name','Change_Pwd');

}else{
$admin_menu  = array('�������ǻ�С��','����¹���ʼ�ҹ');
$admin_link  = array('News_editer','Change_Pwd');
}

?>




