<?php
session_start();
//header('Content-Type: text/html; charset=tis-620');
?>

<!--<head>
	<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
-->

<?php

//Connection
$connection = 0 ; 	// 0 = sql , 1 = oracle 
$confirm2use = 0 ; 	// 0 = disble , 1 = enable
$printslip = 1 ; // 0 = disble , 1 = enable
$repassword = 1 ; // 0 = disble , 1 = enable 

//���������ͧ�鹷���ʴ�˹���á
$title = '�ˡó������Ѿ����ྪú�ó� �ӡѴ';
$title1 = 'Phetchabun Teacher Savings and Credit Cooperrative LTD';
$sub_title = '�к���ԡ����Ҫԡ';
$address = '<b>�ˡó������Ѿ����ྪú�ó� �ӡѴ 116 ������ 2 �Ӻ�����§ ��������ͧ  �ѧ��Ѵྪú�ó� 67000<b> <br>�ӹѡ�ҹ�˭� ���Ѿ�� 0-5671-1101,0-5674-4090  ����� 0-5672-1931 <br>�Ң� 2 ����������ѡ ���Ѿ�� 0-5671-3574 ����� 0-5671-3575 <br>�Ң� 3 ����ͺ֧����ѹ ���Ѿ�� 0-5673-2643  ����� 0-5673-2642';
$credite = '&copy; 2015  All Rights Reserved  <a href="http://www.pbntsc.org/" target="new">�ˡó������Ѿ����ྪú�ó�</a> | Design By <a href="http://www.isocare.co.th" target="new">Isocare System Co.,Ltd&#8482; </a>';
// login
$bg_login_color  = 'blue';
$bg_bar_login_color = '#ffffff';
$font_bar_login_color  = 'blue';

// register
$email_register = 0 ;			// 0 ��� , 1 �ѧ�Ѻ ������	
$mobile_register = 0 ;		// 0 ��� , 1.�ѧ�Ѻ ������

// menu
$menu_color = '#1CB5E8';
//$menu_color = '#555555';
$undertop = '#8b8c8c';
$user_memu = array('���������Ҫԡ','���������','�������Թ�ҡ','�������Թ���','�Է�����','�����Ť�ӻ�Сѹ','��¡���ѡ��Ш���͹','�ѹ��-����¤׹','���ʴԡ��','�����šͧ�ع');
$user_link = array('','Share','Deposit','Loan','LoanPermission','Ref_collno','Payment','Dividend','Benefits','Fund');

//$user_memu = array('���������Ҫԡ','���������','�������Թ�ҡ','�������Թ���','�Է�����','�����Ť�ӻ�Сѹ','��¡���ѡ��Ш���͹','�ѹ��-����¤׹','�����šͧ�ع');
//$user_link = array('','Share','Deposit','Loan','LoanPermission','Ref_collno','Payment','Dividend','Fund');


if($connection == 0){
$admin_menu  = array('��������ػ���','�������ǻ�С��','͹��ѵ�-ź ��Ҫԡ','��ª�����Ҫԡ������','����¹���ʼ�ҹ');
$admin_link  = array('','News_editer','Management_Member','Member_Detail','Change_Pwd');
}else{
$admin_menu  = array('�������ǻ�С��','����¹���ʼ�ҹ');
$admin_link  = array('News_editer','Change_Pwd');
}

?>




