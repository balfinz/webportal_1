<?php
session_start();
@header('Content-Type: text/html; charset=tis-620');
$ses_userid =$_SESSION['ses_userid'];
$member_no = $_SESSION['ses_member_no'];
if($ses_userid <> session_id() or $member_no ==""){
	header("Location: index.php");
}
	require "../include/conf.conn.php";
	require "../include/conf.c.php";
	require "../include/conf.d.php";
	require "../include/lib.Etc.php";
	require "../include/lib.Oracle.php";
	require "../include/lib.MySql.php";
	require "../s/my.news.php";
	$ipconnect = $_SERVER['REMOTE_ADDR'];
	$date_log = date('Y-m-d H:i:s');
	$connectby = "desktop";
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
	<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?=$title?></title>
	<link rel="shortcut icon" href="../img/logo.png">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
</head>
<body>
<div style="position:absolute;left:0;top:5;width:100%;">
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="top">
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"  bgcolor="#FFFFFF">
      <tr>
        <td height="110" colspan="2" background="../img/title.jpg">
        <table width="994" border="0" cellspacing="3" cellpadding="0"class="txtShadow">
          <tr>
            <td width="140" height="105" align="center"><img src="../img/logo.png" width="90" height="90"></td>
            <td width="845"><table width="100%" border="0" cellspacing="5" cellpadding="0">
              <tr>
                <th>
					<font face="microsoft sans serif"size="+4" color="#FFFFFF"><strong><?=$sub_title?></strong></font><br/><br/>
					<font face='microsoft sans serif' size="+1" color="#FFFFFF"><?=$title?></font><br/>
					<font face='tahoma' size="-1" color="#FFFFFF"><i><?=$sub_title1?></i></font>
				  </th>
              </tr>
            </table></td>
			<!--td width="140" height="105" align="center"><img src="../img/logo.png" width="90" height="90"></td-->
          </tr>
        </table></td>
        </tr>
      <tr bgcolor="#000069">
        <td height="20" colspan="2" align="right" valign="middle">
			<marquee scrollamount="5"onmouseover="this.setAttribute('scrollamount',0,0);"onmouseout="this.setAttribute('scrollamount',10,0)">
				<font style="font-size:12px;color:#ffffff"behavior="scroll">
				<!--b>�Թ�յ�͹�Ѻ�������к���ԡ�â�������Ҫԡ&nbsp;&nbsp;&nbsp;�ˡó������Ѿ���ٺ�������� �ӡѴ</b-->
				<?PHP
					for($i=0;$i<$Num_Rows;$i++)
					{
						echo "&nbsp;&nbsp; ::::::::::&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".DateThai($n_date[$i])."&nbsp;&nbsp;>>&nbsp;&nbsp;".$n_details[$i];
					}
				?>
					
				</font> 
			</marquee>
		</td>
        </tr>
      <tr>
        <td width="170" valign="top"><?php require "../lib/menu.php" ?></td>
        <td width="825" height="90%" valign="top">
        <span class="class2">
        <table width="100%" border="0" cellspacing="1" cellpadding="6">
          <tr>
            <td>
			<?php
				if($_REQUEST["menu"] == ""){
					 require "../lib/d.news.php";
				}else if($_REQUEST["menu"] == "Img"){
					require "../lib/d.member_info.php";
					require "../lib/d.img_member.php";
					//require "../d/closed.php";
				}else if($_REQUEST["menu"] == "Share"){
					require "../lib/d.member_info.php";
					require "../lib/d.share.php";
					//require "../d/closed.php";
				}else if($_REQUEST["menu"] == "Deposit"){
					require "../lib/d.member_info.php";
					require "../lib/d.deposit.php";
					//require "../d/closed.php";
				}else if($_REQUEST["menu"] == "Loan"){
					require "../lib/d.member_info.php";
					require "../lib/d.loan.php";
					//require "../d/closed.php";
				}else if($_REQUEST["menu"] == "Ref_collno"){
					require "../lib/d.member_info.php";
					require "../lib/d.ref_collno.php";
					//require "../d/closed.php";
				}else if($_REQUEST["menu"] == "Payment"){
					require "../lib/d.member_info.php";
					require "../lib/d.payment.php";
					//require "../d/closed.php";
				}else if($_REQUEST["menu"] == "Dividend"){
					require "../lib/d.member_info.php";
					require "../lib/d.dividend.php";
					//require "../d/closed.php";
				}else if($_REQUEST["menu"] == "ins"){
					require "../lib/d.member_info.php";
					require "../lib/d.ins.php";
					//require "../d/closed.php";
				}else if($_REQUEST["menu"] == "WF"){
					require "../lib/d.member_info.php";
					require "../lib/d.member_wf.php";
				}else if($_REQUEST["menu"] == "Change_Pwd" and $connection != 1){
					require "../lib/d.Change_Pwd.php";
				}else if($_REQUEST["menu"] == "SigeOut"){
					unset ( $_SESSION['ses_userid'] );
					unset ( $_SESSION['ses_member_no'] );
					session_destroy(); 
					oci_close($objConnect);
					echo "<script>window.location = 'index.php'</script>";
				}
				?>
                </td>
          </tr>
        </table>
        </span>
        </td>
      </tr>
      <tr>
        <td height="80" colspan="2" align="center"style="background-image:url('../img/bg2.jpg');">
				<table width="100%"border="0"class="txtShadow1">
					<tr>
					<td align="center">
							<br>
							<font size="+1" color="#FFFFFF"><strong><?=$title?></strong></font><br/><font size="+1" color="#FFFFFF"><?=$address?><br/>
							<span class="class1"><?=$credite?></span></font><br><br><br>
					</td>
					</tr>
				</table>
		</td>
  </tr>
</table><br>
</div>

</body>
</html>