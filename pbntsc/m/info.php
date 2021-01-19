<?php
session_start();
header('Content-Type: text/html; charset=tis-620');
$ses_userid =$_SESSION['ses_userid'];
$member_no = $_SESSION['ses_member_no'];
if($ses_userid <> session_id() or $member_no ==""){
	header("Location: index.php");
}
	require "../include/conf.conn.php";
	require "../include/conf.c.php";
	require "../include/lib.Etc.php";
	require "../include/lib.Oracle.php";
	require "../include/lib.MySql.php";
	$ipconnect = $_SERVER['REMOTE_ADDR'];
	$date_log = date('Y-m-d H:i:s');
	$connectby = "mobile";
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?=$title?></title>
	<link rel="stylesheet"  href="../css/jquery.mobile-1.3.2.min.css">
	<link rel="stylesheet" href="../css/jqm-demos.css">
	<link rel="shortcut icon" href="../img/logo.png">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <script src="../js/jquery.js"></script>
	<script src="../js/index.js"></script>
	<script src="../js/jquery.mobile-1.3.2.min.js"></script>
</head>
<body>
<div data-role="header">
    <h1>��.���ྪú�ó�</h1>
    <a href="../m/info.php"  data-inline="true" data-icon="HOME" data-theme="b" data-transition="pop" data-iconpos="notext" >HOME</a>
    <div data-role="popup" id="popupNested" data-theme="none">
       <ul data-role="listview" data-ajax="false" data-inset="false" data-theme="c">
            <li><a href="../m/info.php" data-transition="flip">���������Ҫԡ</a></li>
            <li><a href="../m/info.php?menu=Share" data-transition="flip">���������</a></li>
            <li><a href="../m/info.php?menu=Deposit" data-transition="flip">�������Թ�ҡ</a></li>
            <li><a href="../m/info.php?menu=Loan" data-transition="flip">�������Թ���</a></li>
			 <li><a href="../m/info.php?menu=LoanPermission" data-transition="flip">�Է�����</a></li>
            <li><a href="../m/info.php?menu=Ref_collno" data-transition="flip">�����Ť�ӻ�Сѹ</a></li>
			<li><a href="../m/info.php?menu=Payment" data-transition="flip">��¡���ѡ��Ш���͹</a></li>
            <li><a href="../m/info.php?menu=Dividend" data-transition="flip">�ѹ��-����¤׹</a></li>
            <li><a href="../m/info.php?menu=Member_info" data-transition="flip">��������ǹ���</a></li>
            <!--<li><a href="../m/info.php?menu=Beneficiary" data-transition="flip">����Ѻ�Ż���ª��</a></li>-->
            <li><a href="../m/info.php?menu=Change_Pwd" data-transition="flip">����¹���ʼ�ҹ</a></li>
            <li><a href="../m/info.php?menu=SigeOut" data-rel="dialog" >�͡�ҡ�к�</a>
        </ul>
    </div><!-- /popup -->
</div>
<div data-role="content" class="jqm-content">
<?php if($_REQUEST["menu"] == ""){ ?>
<ul data-role="listview" >
    <li  data-theme="f"><a href="../m/info.php?menu=News" data-transition="flip">���������Ҫԡ</a></li>
	<li  data-theme="f"><a href="../m/info.php?menu=Share" data-transition="flip">���������</a></li>
	<li  data-theme="f"><a href="../m/info.php?menu=Deposit" data-transition="flip">�������Թ�ҡ</a></li>
	<li  data-theme="f"><a href="../m/info.php?menu=Loan" data-transition="flip">�������Թ���</a></li>
	<li  data-theme="f"><a href="../m/info.php?menu=LoanPermission" data-transition="flip">�Է�����</a></li>
	<li  data-theme="f"><a href="../m/info.php?menu=Ref_collno" data-transition="flip">�����Ť�ӻ�Сѹ</a></li>
	<li  data-theme="f"><a href="../m/info.php?menu=Payment" data-transition="flip">��¡���ѡ��Ш���͹</a></li>
    <li  data-theme="f"><a href="../m/info.php?menu=Dividend" data-transition="flip">�ѹ��-����¤׹</a></li>
	    <li  data-theme="f"><a href="../m/info.php?menu=Fund" data-transition="flip">�����šͧ�ع</a></li>
	<li  data-theme="f"><a href="../m/info.php?menu=Member_info" data-transition="flip">��������ǹ���</a></li>
	<!--<li  data-theme="f"><a href="../m/info.php?menu=Beneficiary" data-transition="flip">����Ѻ�Ż���ª��</a></li>-->
        <li  data-theme="f"><a href="../m/info.php?menu=Change_Pwd" data-transition="flip">����¹���ʼ�ҹ</a></li>
    <li  data-theme="a"><a href="../m/info.php?menu=SigeOut" data-rel="dialog" data-theme="a" >�͡�ҡ�к�</a></li>	
</ul>


<?php } ?>
<?php
if($_REQUEST["menu"] == "News"){
	require "../lib/m.news.php";
}else if($_REQUEST["menu"] == "Share"){
	require "../lib/m.share.php";
}else if($_REQUEST["menu"] == "Deposit"){
	require "../lib/m.deposit.php";
}else if($_REQUEST["menu"] == "Loan"){
	require "../lib/m.loan.php";
}else if($_REQUEST["menu"] == "LoanPermission"){
	require "../lib/m.LoanPermission.php";
}else if($_REQUEST["menu"] == "Ref_collno"){
	require "../lib/m.ref_collno.php";
}else if($_REQUEST["menu"] == "Payment"){
	require "../lib/m.payment.php";
}else if($_REQUEST["menu"] == "Payment_Show"){
	require "../lib/m.payment1.php";
}else if($_REQUEST["menu"] == "Payment_Show"){
	require "../lib/m.payment1.php";
}else if($_REQUEST["menu"] == "Member_info"){
	require "../lib/m.member_info.php";
}else if($_REQUEST["menu"] == "Dividend"){
	require "../lib/m.dividend.php";
}else if($_REQUEST["menu"] == "Fund"){
	require "../lib/m.Fund.php";
}
//else if($_REQUEST["menu"] == "Beneficiary"){
	//require "../lib/m.beneficiary.php";
//}
else if($_REQUEST["menu"] == "Change_Pwd"){
	require "../lib/m.Change_Pwd.php";
}
else if($_REQUEST["menu"] == "SigeOut"){
	 if($_REQUEST["confirm"] == "yes"){		 
		unset ( $_SESSION['ses_userid'] );
		unset ( $_SESSION['ses_member_no'] );
		session_destroy(); 
		oci_close($objConnect);
		echo "<script>window.location = 'index.php'</script>";
	 }else{
?> 
<div data-role="page" class="dialog-actionsheet">
	<div data-role="content" data-theme="b" align="center">
		<h3>��ҹ��ͧ����͡�ҡ�к� �� ���� ���</h3>
		<a href="../m/info.php?menu=SigeOut&confirm=yes" data-role="button" data-theme="b">�͡�ҡ�к�</a>
		<a href="#foo" data-role="button" data-rel="back" data-theme="c">¡��ԡ</a>   
	</div>
</div>
<?php 
 }
}
?>
</div><!-- /content -->
<div data-role="footer" class="jqm-footer">
	<p><?=$credite?> </p>
</div><!-- /footer -->


</body>
</html>
