<?php
session_start();
header('Content-Type: text/html; charset=tis-620');
$ses_userid =$_SESSION[ses_userid];
$member_no = $_SESSION[ses_member_no];
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
	<link rel="shortcut icon" href="../img/logo_.png">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <script src="../js/jquery.js"></script>
	<script src="../js/index.js"></script>
	<script src="../js/jquery.mobile-1.3.2.min.js"></script>
</head>
<body>
<div data-role="header">
    <h1>��ԡ����Ҫԡ</h1>
    <a href="#popupNested" data-rel="popup" data-role="button" data-inline="true" data-icon="bars" data-theme="b" data-transition="pop" data-iconpos="notext" >menu</a>
    <div data-role="popup" id="popupNested" data-theme="none">
       <ul data-role="listview" data-ajax="false" data-inset="false" data-theme="c">
            <li><a href="../m/info.php" data-transition="flip">���������Ҫԡ</a></li>
            <li><a href="../m/info.php?menu=Share" data-transition="flip">���������</a></li>
            <li><a href="../m/info.php?menu=Deposit" data-transition="flip">�������Թ�ҡ</a></li>
            <li><a href="../m/info.php?menu=Loan" data-transition="flip">�������Թ���</a></li>
			<li><a href="../m/info.php?menu=Payment" data-transition="flip">��¡���ѡ��Ш���͹</a></li>
            <li><a href="../m/info.php?menu=Member_info" data-transition="flip">��������ǹ���</a></li>
            <li><a href="../m/info.php?menu=SigeOut" data-rel="dialog" >�͡�ҡ�к�</a>
        </ul>
    </div><!-- /popup -->
</div>
<div data-role="content" class="jqm-content">
<?php
if($_REQUEST["menu"] == ""){
	require "../lib/m.news.php";
}else if($_REQUEST["menu"] == "Share"){
	require "../lib/m.share.php";
}else if($_REQUEST["menu"] == "Deposit"){
	require "../lib/m.deposit.php";
}else if($_REQUEST["menu"] == "Loan"){
	require "../lib/m.loan.php";
}else if($_REQUEST["menu"] == "Payment"){
	require "../lib/m.payment.php";
}else if($_REQUEST["menu"] == "Payment_Show"){
	require "../lib/m.payment1.php";
}else if($_REQUEST["menu"] == "Member_info"){
	require "../lib/m.member_info.php";
}else if($_REQUEST["menu"] == "SigeOut"){
	 if($_REQUEST["confirm"] == "yes"){		 
		unset ( $_SESSION['ses_userid'] );
		unset ( $_SESSION['ses_member_no'] );
		session_destroy(); 
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
