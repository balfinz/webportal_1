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
$title = '�ˡó������Ѿ���ٺ�������� �ӡѴ';
$title1 = '�ˡó������Ѿ���ٺ�������� �ӡѴ';
$sub_title = '�к���ԡ�â�������Ҫԡ';
$sub_title1 = "The Buriram Teachers Savings Cooperative Limited";
$address = '<font size="2">
36/100 �.�Թ�ѹ���ç�� �.����ͧ �.���ͧ �.��������� 31000 
<br>
���Ѿ�� 044611581 ��� 044612264 ::: Fax ��� 121(����Թ),123(��á��) <br>
E-mail : brr-tsc@hotmail.co.th <br>
</font></font> ';
$credite = '&copy; 2014  All Rights Reserved  <a href="http://br-tsc.com/" target="new">www.br-tsc.com/cypg</a> | Design By <a href="http://www.isocare.co.th/" target="new">Isocare System Co.,Ltd&#8482; </a>';
// login
$bg_login_color  = '#3399ff';
$bg_bar_login_color = '#ffffff';
$font_bar_login_color  = '#3366ff';

// register
$email_register = 1 ;			// 0 ��� , 1 �ѧ�Ѻ ������
$mobile_register = 1 ;		// 0 ��� , 1.�ѧ�Ѻ ������

// menu
$menu_color = '#3399ff';
//$user_memu = array('���������Ҫԡ','���������','�������Թ�ҡ','�������Թ���','�����Ť�ӻ�Сѹ','�ѹ��-����¤׹');
//$user_link = array('','Share','Deposit','Loan','Ref_collno','Dividend');

//$user_memu = array('���������Ҫԡ','���������','�������Թ�ҡ','�������Թ���','�����Ť�ӻ�Сѹ');
//$user_link = array('','Share','Deposit','Loan','Ref_collno');

$user_memu = array('���������Ҫԡ','�����ŷ����','���������','�������Թ�ҡ','�������Թ���','�����Ť�ӻ�Сѹ','�����Ż�Сѹ���Ե�����','��¡���ѡ��Ш���͹','�ѹ��-����¤׹');
$user_link = array('','Img','Share','Deposit','Loan','Ref_collno','ins','Payment','Dividend');

//$user_memu = array('���������Ҫԡ','���������','�������Թ�ҡ','�������Թ���','�����Ť�ӻ�Сѹ','�ѹ��-����¤׹');
//$user_link = array('','Share','Deposit','Loan','Ref_collno','Dividend');

if($connection == 0){
//$admin_menu  = array('��������ػ���','�������ǻ�С��','͹��ѵ�-ź ��Ҫԡ','��§ҹ�׹�ѹ�ʹ','����¹���ʼ�ҹ','��駤��','�������к�');
//$admin_link  = array('','News_editer','Management_Member','ConfirmReport','Change_Pwd','Configuration','Information');

//$admin_menu  = array('��������ػ���','�������ǻ�С��','͹��ѵ�-ź ��Ҫԡ','��§ҹ�׹�ѹ�ʹ','����¹���ʼ�ҹ','�������к�');
//$admin_link  = array('','News_editer','Management_Member','ConfirmReport','Change_Pwd','Information');
    
$admin_menu  = array('��������ػ���','�������ǻ�С��','͹��ѵ�-ź ��Ҫԡ','����¹���ʼ�ҹ','��дҹʹ���');
$admin_link  = array('','News_editer','Management_Member','Change_Pwd','Webboard');

}else{
$admin_menu  = array('�������ǻ�С��','����¹���ʼ�ҹ');
$admin_link  = array('News_editer','Change_Pwd');
}

?>




