<?php
session_start();
@header('Content-Type: text/html; charset=tis-620');
require "../include/conf.d.php";
?>
	<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
    <link rel="stylesheet" href="../css/validationEngine.jquery.css" type="text/css">
	<link type="text/css" href="../css/ui-lightness/jquery-ui-1.8.10.custom.css" rel="stylesheet" />	
    <script src="../js/jquery-1.6.min.js" type="text/javascript"></script>
	<script src="../js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="tis-620"></script>
	<script src="../js/jquery.validationEngine.js" type="text/javascript" charset="tis-620"></script>
	<script type="text/javascript">
				jQuery(document).ready(function(){
						jQuery("#formID1").validationEngine('attach', {promptPosition : "topRight", autoPositionUpdate : true});
			});
     </script>

<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"class="txtShadow1">
  <tr>
    <td align="left"><strong><font size="4" face="Tahoma">����¹���ʼ�ҹ</font></strong><br />
    <font color="#FF6600" size="2" face="Tahoma">Change Password</font></td>
  </tr>
  <tr>
    <td align="right"><hr color="#999999" size="1"/></td>
  </tr>
</table>
<form id="formID1" name="formID1" method="post" action="">
  <table width="400" border="0" align="center" cellpadding="6" cellspacing="2">
    <tr>
      <td colspan="2" align="center"><strong><font size="2" face="Tahoma" color="#FF0000">��˹����ʼ�����������ҧ���� 8 ����ѡ�� ������Թ 13 ����ѡ��</font></strong></td>
    </tr>
    <tr>
      <td width="140" align="right">�������� :</td>
      <td width="280" align="left"><input name="npwd" type="password" class="validate[required,minSize[8]]" id="npwd" size="25" maxlength="13" autocomplete="off" /></td>
    </tr>
    <tr>
      <td align="right">�׹�ѹ�������� :</td>
      <td align="left"><input name="npwd1" type="password" class="validate[required,equals[npwd]]" id="npwd1" size="25" maxlength="13" autocomplete="off" /></td>
    </tr>
  </table>
  <hr align="center" size="1"  color="#999999" style="width:95%"/>
  <table width="400" border="0" align="center" cellpadding="6" cellspacing="2">
    <tr>
      <td align="center"colspan="2"><strong><font size="2" face="Tahoma" color="#FF0000">�ֹ�ѹ������������׹�ѹ�������¹���ʼ�ҹ</font></strong></td>
    </tr>
    <tr>
	  <td width="140" align="right">������� :</td>
      <td align="left"width="280"><label for="textfield"></label>
      <input name="oldpwd" type="password" class="validate[required]" id="oldpwd" size="25" maxlength="13" autocomplete="off"></td>
    </tr>
    <tr>
      <td align="center"colspan="2"><input type="submit" name="button" id="button" value="�׹�ѹ" />
      <input name="ChkPwd" type="hidden" id="ChkPwd" value="ChkPwd" /></td>
    </tr>
  </table>
</form>
<?php
if($_POST["ChkPwd"] != null){

	$chkpassword = md5($_POST["oldpwd"]);
	$npwd = md5($_POST["npwd"]);
	$strSQL = "select password from webmbmembmaster where member_no = '$member_no' "; 		
	$value = "password"; 
	$oldPassword = get_single_value_sql($strSQL,$value);

	if($chkpassword == $oldPassword){
		if($npwd == $oldPassword){
			echo '<script type="text/javascript"> window.alert("�������ö����¹���ʼ�ҹ������ ��س�����¹���ʼ�ҹ��������ҧ�ҡ���") </script> ';
			echo "<script>window.location = 'info.php?menu=Change_Pwd'</script>";
			$ChkPwd = null;
			exit;
		}else{
			$table="webmbmembmaster";
			$value="password = '".$npwd."'";
			$condition="where member_no = '$member_no'";
			if(update_value_sql($table,$condition,$value)){
				$action_page = 'Change Password';
				$table = "weblog_action";
				$condition = "(action_do,user,ipconnect,date_log,connectby)";
				$value  = "('".$action_page."','".$member_no."','".$ipconnect."','".$date_log."','".$connectby."')";
				$status = insert_value_sql($table,$condition,$value);
				if($status){
					echo '<script type="text/javascript"> window.alert("�к���ѹ�֡���ʼ�ҹ����ͧ��ҹ���� ��س�����������ʼ�ҹ����") </script> ';
					echo "<script>window.location = 'info.php'</script>";
				}else{
					echo '<script type="text/javascript"> window.alert("�Դ��ͼԴ��Ҵ !!! ��س���������ա����") </script> ';
					echo "<script>window.location = 'index.php'</script>";
				}	
      		}else{
				echo '<script type="text/javascript"> window.alert("�������ö����¹���ʼ�ҹ������ ��س��ͧ����������ѧ") </script> ';
				echo "<script>window.location = 'info.php?menu=Change_Pwd'</script>";
				$ChkPwd = null;
				exit;
      	 	}
		}
	}else{
		echo '<script type="text/javascript"> window.alert("�������ö����¹���ʼ�ҹ������ ��ҹ�������������١��ͧ") </script> ';
		echo "<script>window.location = 'info.php?menu=Change_Pwd'</script>";
		$ChkPwd = null;
		exit;
	}

}

?>