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
$title = '�ˡó������Ѿ��ʶҺѹ�ѳ�Ե�Ѳ���������ʵ�� �ӡѴ';
$title1 = '�ˡó������Ѿ��ʶҺѹ�ѳ�Ե�Ѳ���������ʵ�� �ӡѴ';
$sub_title = 'http://coop.nida.ac.th';
$sub_title1 = "National Institute of Development Administration Savings Co-Operative Ltd.";
$address = '<font size="2">
    
 118 ��� ������ �ǧ ��ͧ��� ࢵ�ҧ�л� ��ا෾��ҹ�� 10240
<br>
��. 0-2375-7568, 0-2727-3508-13
 <br>
</font></font> ';
$credite = '&copy; 2014  All Rights Reserved  <a href="http://coop.nida.ac.th/" target="new"><u><font color = "blue">coop.nida.ac.th</font></u> </a>| Design By <a href="http://www.isocare.co.th/" target="new"><u><font color = "blue">Isocare System Co.,Ltd&#8482; </font></u></a>';
// login
$bg_login_color  = '#4abdd8';
$bg_bar_login_color = '#0776bd';
$font_bar_login_color  = '#fbfdfd';

// register
$email_register = 1 ;			// 0 ��� , 1 �ѧ�Ѻ ������	
$mobile_register = 1 ;		// 0 ��� , 1.�ѧ�Ѻ ������

// menu
$menu_color = '#4abdd8';
//$user_memu = array('���������Ҫԡ','���������','�������Թ�ҡ','�������Թ���','�����Ť�ӻ�Сѹ','�ѹ��-����¤׹');
//$user_link = array('','Share','Deposit','Loan','Ref_collno','Dividend');

//$user_memu = array('���������Ҫԡ','���������','�������Թ�ҡ','�������Թ���','�����Ť�ӻ�Сѹ');
//$user_link = array('','Share','Deposit','Loan','Ref_collno');

$user_memu = array('���������Ҫԡ','���������','�������Թ�ҡ','�������Թ���','�����Ť�ӻ�Сѹ','��¡���ѡ��Ш���͹');
$user_link = array('','Share','Deposit','Loan','Ref_collno','Payment');

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




