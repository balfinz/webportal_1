<?php
session_start();
header('Content-Type: text/html; charset=tis-620');
?>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<?php

                       $servername = "localhost";
                        $username = "root";
                        $password = "WebServer";
                        $dbname = "dol";

                        // Create connection
                        $conn = new mysqli($servername, $username, $password, $dbname);

                        $sql = "select time_out from config_mode";
                        $result = $conn->query($sql);

                        while($row = $result->fetch_assoc()) {
							
                           $time_out = $row["time_out"];
						}


 $time_out = intval($time_out);

$webtimeout=$time_out; //˹����� �ҷ� 
$webtimeout_showflag=0; // 1 �ʴ� 0 ��͹ 

//Connection
$connection = 0 ; 	// 0 = sql , 1 = oracle 
$confirm2use = 0 ; 	// 0 = disable , 1 = enable
$printslip = 1 ; // 0 = disable , 1 = enable
$logstatus = 1; // 0 = disable , 1 = enable 
$repassword = 1 ; // 0 = disable , 1 = enable 
$confirmmenu = 0 ; // 0 = disable , 1 = enable 

//���������ͧ�鹷���ʴ�˹���á
$title = '�ˡó������Ѿ�������Թ �ӡѴ';
$title1 = '�ˡó������Ѿ�������Թ �ӡѴ';
$sub_title = '�к���ԡ����Ҫԡ';
$sub_title1 = "The Co-operative of the Department of Land's Officers Limited";
$address = '<font size="2">
117 ���� 9 ������ҹ��� �Ӻźҧ�ٴ
 ����ͻҡ��� �ѧ��Ѵ������� 11120<br>   ���Ѿ�� 0-2194-2377-79 ����� 0-2194-2380
<br>www.Landcoop.com ID LINE:landcoop <br>
�Ţ��Шӵ�Ǽ���������� 0994000167920
<br>
</font></font> ';
$credite = '&copy; 2014  All Rights Reserved  <a href="http://www.landcoop.com/" target="new">www.Landcoop.com</a> | Design By <a href="http://www.isocare.co.th" target="new">Isocare System Co.,Ltd&#8482; </a> &nbsp;|&nbsp; Webportal Version 1.3';
// login
$bg_login_color  = '#6A5ACD';
$bg_bar_login_color = '#ffffff';
$font_bar_login_color  = 'blue';

// register
$email_register = 1 ;			// 0 ��� , 1 �ѧ�Ѻ ������	
$mobile_register = 1 ;		// 0 ��� , 1.�ѧ�Ѻ ������

// menu
$menu_color = '#6A5ACD';


$user_memu = array('��������Ҫԡ','���������','�������Թ�ҡ','�������Թ���','��¡���ѡ��Ш���͹','��¡��㺤Ӣ͡��','�ѹ��-����¤׹');
$user_link = array('','Share','Deposit','Loan','Payment','LoanRequest','Dividend');

//$user_memu = array('��¡���ѡ��Ш���͹','��¡��㺤Ӣ͡��');
//$user_link = array('','LoanRequest');

if($connection == 0){
//$admin_menu  = array('��������ػ���','�������ǻ�С��','͹��ѵ�-ź ��Ҫԡ','��§ҹ�׹�ѹ�ʹ','����¹���ʼ�ҹ','��駤��','�������к�');
//$admin_link  = array('','News_editer','Management_Member','ConfirmReport','Change_Pwd','Configuration','Information');

//$admin_menu  = array('��������ػ���','�������ǻ�С��','͹��ѵ�-ź ��Ҫԡ','��§ҹ�׹�ѹ�ʹ','����¹���ʼ�ҹ','�������к�');
//$admin_link  = array('','News_editer','Management_Member','ConfirmReport','Change_Pwd','Information');
    
$admin_menu  = array('��������ػ���','͹��ѵ�-ź ��Ҫԡ','��¡�äӢ͡��','��§ҹ��������´�͡��','Log Acess','��Ҥ����','����¹���ʼ�ҹ');
$admin_link  = array('','Management_Member','LoanRequest','LoanRequest_Report','Acess','Config','Change_Pwd');

}else{
$admin_menu  = array('��¡�äӢ͡��','����¹���ʼ�ҹ');
$admin_link  = array('LoanRequest','Change_Pwd');
}

?>




