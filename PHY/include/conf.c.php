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
$title = '�ˡó������Ѿ���پ���� �ӡѴ';
$title1 = '�ˡó������Ѿ���پ���� �ӡѴ';
$sub_title = '�к���ԡ����Ҫԡ';
$sub_title1 = "Phayao Teacher Saving Cooperative Limited";
$address = '<font size="2">
�Ţ��� 672 �����§��� - ������ä� ������ 3 �Ӻŷ���ѧ�ͧ ��������ͧ �ѧ��Ѵ����� 56000 <br>
���Ѿ�� 054-431994 , 054-410185   ����� 054-481501 <br>
Web site : www.phayaotcl.com    E-mail : phayaotcl@hotmail.co.th , phayaotcl@gmail.com<br></font></font> ';
$credite = '&copy; 2014  All Rights Reserved  <a href="http://www.phayaotcl.com" target="new">www.phayaotcl.com</a> | Design By <a href="http://www.isocare.co.th" target="new">Isocare System Co.,Ltd&#8482; </a>';
// login
$bg_login_color  = '#3399CC';
$bg_bar_login_color = '#ffffff';
$font_bar_login_color  = '#3399CC';

// register
$email_register = 1 ;			// 0 ��� , 1 �ѧ�Ѻ ������	
$mobile_register = 1 ;		// 0 ��� , 1.�ѧ�Ѻ ������

// menu
$menu_color = '#3399CC';

//$user_memu = array('���������Ҫԡ','���������','�������Թ�ҡ','�������Թ���','�����Ť�ӻ�Сѹ','����稻�Ш���͹','�ѹ��-����¤׹');
//$user_link = array('','Share','Deposit','Loan','Ref_collno','Payment','Dividend');

$user_memu = array('���������Ҫԡ','���������','�������Թ�ҡ','�������Թ���','�����Ť�ӻ�Сѹ','��¡���ѡ��Ш���͹','����稻�Ш���͹','�ѹ��-����¤׹');
$user_link = array('','Share','Deposit','Loan','Ref_collno','Payment2','Payment','Dividend');

if($connection == 0){
    
$admin_menu  = array('��������ػ���','�������ǻ�С��','͹��ѵ�-ź ��Ҫԡ','����¹���ʼ�ҹ');
$admin_link  = array('','News_editer','Management_Member','Change_Pwd');

}else{
$admin_menu  = array('�������ǻ�С��','����¹���ʼ�ҹ');
$admin_link  = array('News_editer','Change_Pwd');
}

?>




