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
$title = '�ˡó������Ѿ�쾹ѡ�ҹ��Ҥ������Թ �ӡѴ';
$title1 = '��.����Թ';
$sub_title = '�к���ԡ����Ҫԡ';
$sub_title1 = "THRIFT AND CREDIT COOPERATIVE OF GSB EMPLOYEES LTD";
$address = '<font size="2">
470 �������¸Թ ����ʹ� ���� ��ا෾��ҹ�� 10400 &nbsp;&nbsp;&nbsp;&nbsp;��� �.�. 205 ����ʹ�<br>
Web site:http//gsb-coop.com E-mail address: gsb-coop@hotmail.com ���Ѿ�� 0-2299 8265-8&nbsp;&nbsp; 0-2299 8000 ��� 050105-6 <br>
08 1350 5463&nbsp;&nbsp;&nbsp; 08 9896 5028&nbsp;&nbsp;&nbsp; 09 3329 3955 ����� 0-2278 0090&nbsp;&nbsp; 0-2298 8267<br></font></font> ';
$credite = '&copy; 2014  All Rights Reserved  <a href="http://www.gsb-coop.com/" target="new">www.gsb-coop.com</a> | Design By <a href="http://www.isocare.co.th" target="new">Isocare System Co.,Ltd&#8482; </a>';
// login
$bg_login_color  = '#d62e8e';
$bg_bar_login_color = '#ffffff';
$font_bar_login_color  = 'blue';

// register
$email_register = 1 ;			// 0 ��� , 1 �ѧ�Ѻ ������	
$mobile_register = 1 ;		// 0 ��� , 1.�ѧ�Ѻ ������

// menu
$menu_color = '#d62e8e';
//$user_memu = array('���������Ҫԡ','���������','�������Թ�ҡ','�������Թ���','�����Ť�ӻ�Сѹ','�ѹ��-����¤׹');
//$user_link = array('','Share','Deposit','Loan','Ref_collno','Dividend');

//$user_memu = array('���������Ҫԡ','���������','�������Թ�ҡ','�������Թ���','�����Ť�ӻ�Сѹ','��¡���ѡ�����͹ ���������Ѻ�Թ');  //***��ó� Close ���ٻѹ������¤׹
//$user_link = array('','Share','Deposit','Loan','Ref_collno','Payment');

$user_memu = array('���������Ҫԡ','���������','�������Թ�ҡ','�������Թ���','�����Ť�ӻ�Сѹ','��¡���ѡ�����͹ ���������Ѻ�Թ','�ѹ��-����¤׹');		//**��ó� Open ���ٻѹ������¤׹
$user_link = array('','Share','Deposit','Loan','Ref_collno','Payment','Dividend');

if($connection == 0){
//$admin_menu  = array('��������ػ���','�������ǻ�С��','͹��ѵ�-ź ��Ҫԡ','��§ҹ�׹�ѹ�ʹ','����¹���ʼ�ҹ','��駤��','�������к�');
//$admin_link  = array('','News_editer','Management_Member','ConfirmReport','Change_Pwd','Configuration','Information');

$admin_menu  = array('��������ػ���','�������ǻ�С��','͹��ѵ�-ź ��Ҫԡ','��§ҹ�׹�ѹ�ʹ','����¹���ʼ�ҹ','�������к�');
$admin_link  = array('','News_editer','Management_Member','ConfirmReport','Change_Pwd','Information');

}else{
$admin_menu  = array('�������ǻ�С��','����¹���ʼ�ҹ');
$admin_link  = array('News_editer','Change_Pwd');
}

?>




