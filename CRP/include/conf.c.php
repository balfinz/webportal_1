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
$printslip = 0 ; // 0 = disable , 1 = enable  ����稻�Ш���͹
$printcollno = 1; //�����������
$logstatus = 1; // 0 = disable , 1 = enable 
$repassword = 1 ; // 0 = disable , 1 = enable 
$confirmmenu = 0 ; // 0 = disable , 1 = enable 

//���������ͧ�鹷���ʴ�˹���á
$title = '�ˡó������Ѿ���Ҹ�ó�آ��§��� �ӡѴ';
$title1 = '�ˡó������Ѿ���Ҹ�ó�آ��§��� �ӡѴ';
$sub_title = '�к���ԡ����Ҫԡ';
$sub_title1 = "Chiangrai Public Health Saving And Credit Co-operative Limited";
$address = '<font size="3">
1039/74 ��������Ե���� �Ӻ����§ ��������ͧ �ѧ��Ѵ��§���57000<br>
�� : 053-712585  ,053-756203&nbsp;&nbsp; �� : 053-756251 ��� 23 <br>
E-Mail : cr.health.coop@gmail.com;<br></font></font> ';
$credite = '&copy; 2014  All Rights Reserved <a href="http://cricoop.com" target="new">cricoop.com</a>| Design By <a href="http://www.isocare.co.th" target="new">Isocare System Co.,Ltd&#8482; </a>';
// login
$bg_login_color  = '#44bb58';
$bg_bar_login_color = '#094a1f';
$font_bar_login_color  = '#ffffff';

// register
$email_register = 1 ;			// 0 ��� , 1 �ѧ�Ѻ ������	
$mobile_register = 1 ;		// 0 ��� , 1.�ѧ�Ѻ ������

// menu
$menu_color = '#378839';
//$user_memu = array('���������Ҫԡ','���������','�������Թ�ҡ','�������Թ���','�����Ť�ӻ�Сѹ','�ѹ��-����¤׹');
//$user_link = array('','Share','Deposit','Loan','Ref_collno','Dividend');

//$user_memu = array('���������Ҫԡ','���������','�������Թ�ҡ','�������Թ���','�����Ť�ӻ�Сѹ');
//$user_link = array('','Share','Deposit','Loan','Ref_collno');

//$user_memu = array('���������Ҫԡ','���������','�������Թ�ҡ','�������Թ���','�����Ť�ӻ�Сѹ','��¡���ѡ��Ш���͹','��¡���ѡ��Ш���͹(�һ��Ԩ)','�ѹ��-����¤׹');
//$user_link = array('','Share','Deposit','Loan','Ref_collno','Payment','Payment_Etc','Dividend');

$user_memu = array('���������Ҫԡ','�����ż���Ѻ�Ż���ª��','���������','�������Թ�ҡ','�������Թ���','�����Ť�ӻ�Сѹ','��¡���ѡ��Ш���͹','��¡���ѡ��Ш���͹(�һ��Ԩ)','�ѹ��-����¤׹');
$user_link = array('','Beneficiary','Share','Deposit','Loan','Ref_collno','Payment','Payment_Etc','Dividend');

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




