<?php
session_start();
header('Content-Type: text/html; charset=tis-620');
?>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<?php

$FormatNumber = 6;   // �ӹǹ��ѡ�ͧ��Ҫԡ

//Connection
$connection = 0 ; 	// 0 = sql , 1 = oracle 
$confirm2use = 0 ; 	// 0 = disable , 1 = enable
$printslip = 1 ; // 0 = disable , 1 = enable
$logstatus = 1; // 0 = disable , 1 = enable 
$repassword = 1 ; // 0 = disable , 1 = enable 
$confirmmenu = 0 ; // 0 = disable , 1 = enable 

//���������ͧ�鹷���ʴ�˹���á
$title = '��ͤ. ';
$title1 = '��Ҥ��һ��Ԩʧ��������Ҫԡ�������ˡó������Ѿ������';
$sub_title = '�к���ԡ�â�������Ҫԡ';
$sub_title1 = "��Ҥ��һ��Ԩʧ��������Ҫԡ�������ˡó������Ѿ������";
$address = '<font size="2">-</font></font> ';
$credite = ' Website : <a href="http://www.cwftc.or.th/" target="_blank">www.cwftc.or.th</a> <br/> &copy; 2014  All Rights Reserved Design By <a href="http://www.isocare.co.th" target="_blank">Isocare System Co.,Ltd&#8482; </a>';
$show_lineid_flag=false;
$show_logo_flag=false;
// login
$bg_login_color  = '#0066FF';
$bg_bar_login_color = '#3300FF';
$font_bar_login_color  = '#ffffff';

// register
$email_register = 1 ;			// 0 ��� , 1 �ѧ�Ѻ ������	
$mobile_register = 1 ;		// 0 ��� , 1.�ѧ�Ѻ ������

// menu
$menu_color = '#3300FF';
//$user_memu = array('���������Ҫԡ','���������','�������Թ�ҡ','�������Թ���','�����Ť�ӻ�Сѹ','�ѹ��-����¤׹');
//$user_link = array('','Share','Deposit','Loan','Ref_collno','Dividend');

//$user_memu = array('���������Ҫԡ','���������','�������Թ�ҡ','�������Թ���','�����Ť�ӻ�Сѹ');
//$user_link = array('','Share','Deposit','Loan','Ref_collno');

$user_memu = array('���������Ҫԡ','��������´��Ҫԡ','��¡�ü���Ѻ�Թʧ������','��¡�����¡���Թ','��¡���͹����');
$user_link = array('','Member_info','Codept','Statement','TrnDetail');

if($connection == 0){
//$admin_menu  = array('��������ػ���','�������ǻ�С��','͹��ѵ�-ź ��Ҫԡ','��§ҹ�׹�ѹ�ʹ','����¹���ʼ�ҹ','��駤��','�������к�');
//$admin_link  = array('','News_editer','Management_Member','ConfirmReport','Change_Pwd','Configuration','Information');

$admin_menu  = array('��������ػ���','�Ѵ��â��ǻ�С��');
$admin_link  = array('','News_editer');

}else{
$admin_menu  = array('�������ǻ�С��','����¹���ʼ�ҹ');
$admin_link  = array('News_editer','Change_Pwd');
}

?>




