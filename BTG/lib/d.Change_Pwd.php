<?php
session_start();
@header('Content-Type: text/html; charset=tis-620');
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

<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="right"><strong><font size="4" face="Tahoma">����¹���ʼ�ҹ</font></strong><br />
    <font color="#0000FF" size="2" face="Tahoma">Change Password</font></td>
  </tr>
  <tr>
    <td align="right"><hr color="#999999" size="1"/></td>
  </tr>
</table>
<form id="formID1" name="formID1" method="post" action="">
  <table width="470" border="0" align="center" cellpadding="6" cellspacing="2">
    <tr>
      <td colspan="2" ><p><strong><font size="2" face="Tahoma" color="#0000FF">1. ��˹����ʼ�����������ҧ���� 6 ����ѡ�� ������Թ 14 ����ѡ��  </font></strong></p>
        <p><strong><font size="2" face="Tahoma" color="#0000FF">2. ���ʼ�ҹ��ͧ��Сͺ���µ�Ǿ�����˭�
      �������� ����Ţ</font></strong></p></td>
    </tr>
    <tr>
      <td width="140" align="right">�������� :</td>
      <td width="280" align="left"><input name="npwd" type="password" class="validate[required,minSize[6]]" id="npwd" size="25" maxlength="14" autocomplete="off" /></td>
    </tr>
    <tr>
      <td align="right">�׹�ѹ�������� :</td>
      <td align="left"><input name="npwd1" type="password" class="validate[required,equals[npwd]]" id="npwd1" size="25" maxlength="14" autocomplete="off" /></td>
    </tr>
  </table>
  <hr align="center" size="1"  color="#999999" style="width:95%"/>
  <table width="400" border="0" align="center" cellpadding="6" cellspacing="2">
    <tr>
      <td align="center"><strong><font size="2" face="Tahoma" color="#0000FF">�ֹ�ѹ������������׹�ѹ�������¹���ʼ�ҹ</font></strong></td>
    </tr>
    <tr>
      <td align="center"><label for="textfield"></label>
      <input name="oldpwd" type="password" class="validate[required]" id="oldpwd" size="25" maxlength="14" autocomplete="off"></td>
    </tr>
    <tr>
      <td align="center"><input type="submit" name="button" id="button" value="�׹�ѹ" />
      <input name="ChkPwd" type="hidden" id="ChkPwd" value="ChkPwd" /></td>
    </tr>
  </table>
</form>
<?php

/*
$pwd="123aA5678";
$valid_digit=isHaveDigit($pwd);
$valid_c=isHaveEngLower($pwd);
$valid_C=isHaveEngUpper($pwd);
$valid_T=isHaveTh($pwd);
*/
//echo ($valid_digit?"true":"false")."|".($valid_c?"true":"false")."|".($valid_C?"true":"false")."|".($valid_T?"true":"false")."|";

if($_POST["ChkPwd"] != null){
        
    $date_log = date('Y-m-d H:i:s');
	$chkpassword = getEncryptData($_POST["oldpwd"]);
	
	$pwd=$_POST["npwd"];
	$valid_digit=isHaveDigit($pwd);
	$valid_c=isHaveEngLower($pwd);
	$valid_C=isHaveEngUpper($pwd);
	$valid_T=isHaveTh($pwd);
	$valid=$valid_digit&$valid_c&$valid_C;
	
	if($valid==false){
            echo '<script type="text/javascript"> window.alert("���ʼ�ҹ������ ��ͧ�ա�á�˹� ����� ����ѡ�� �����ѧ��� �������� ������˭� ��� ����Ţ ���ҧ���� ���ҧ�� 1 ��� ���������������¡��� 6 ���") </script> ';
			echo "<script>window.location = 'info.php?menu=Change_Pwd'</script>";
			$ChkPwd = null;
			exit;
	}
	
	$npwd = getEncryptData($_POST["npwd"]);
	$strSQL = "select password from mbmembmaster where member_no = '$member_no' "; 		
	$value = "password"; 
	$oldPassword = get_single_value_sql($strSQL,$value);
        
        $strSQL_check_password = "select count(password) as password_3 from check_password where member_no = '$member_no' and password = '$npwd'"; 		
	$value_check_password = "password_3"; 
	$password_3 = get_single_value_sql($strSQL_check_password,$value_check_password);
        
       
        
      /*  $strSQL_check_last = "select count(password) as password_last from check_password where member_no = '$member_no' and password = '$npwd' and seq_no = (select max(seq_no) from check_password where member_no = '$member_no')"; 		
	$value_check_last = "password_last"; 
	$password_last = get_single_value_sql($strSQL_check_last,$value_check_last);*/

	if($chkpassword == $oldPassword){
            
            
		if($password_3 > 0){
                
            echo '<script type="text/javascript"> window.alert("�������ö����¹���ʼ�ҹ������ ���ͧ�ҡ��ӡѺ��õ�����ʼ�ҹ 3 ���駷���ҹ��") </script> ';
			echo "<script>window.location = 'info.php?menu=Change_Pwd'</script>";
			$ChkPwd = null;
			exit;
                
                }else{
			$table="mbmembmaster";
			$value="password = '".$npwd."', temporary_password = 0";
			$condition="where member_no = '$member_no'";
			if(update_value_sql($table,$condition,$value)){
				$action_page = 'Change Password';
				//$os = php_uname('n');
				$os = "";
				$table = "log_action";
				$condition = "(action_do,user,ipconnect,date_log,connectby,system_os)";
				$value  = "('".$action_page."','".$member_no."','".$ipconnect."','".$date_log."','".$connectby."','".$os."')";
				$status = insert_value_sql($table,$condition,$value);
                                
                                
                                $strSQL = "select count(seq_no) as count_seq_no from check_password where member_no = '$member_no' "; 		
                                $value = "count_seq_no"; 
                                $count_seq_no = get_single_value_sql($strSQL,$value);
                                
                                if($count_seq_no == 3){ // ��� = 3 ź min seq_no �͡����� insert �ѹ����ش�෹ 1 member_no ���� password ��� 3 ��������ش
                                
                                $strSQL = "select min(seq_no) as min_seq_no from check_password where member_no = '$member_no' "; 		
                                $value = "min_seq_no"; 
                                $min_seq_no = get_single_value_sql($strSQL,$value);
                                $strSQL_delete = "DELETE FROM check_password WHERE seq_no = $min_seq_no ";
		                $objQuery_delete = mysql_query($strSQL_delete) or die ("Error Query [".$strSQL_delete."]");
                                    
                                }
                                
                                $strSQL = "select max(seq_no) as max_seq_no from check_password where member_no = '$member_no' "; 		
                                $value = "max_seq_no"; 
                                $max_seq_no = get_single_value_sql($strSQL,$value);
                                $max_seq_no = $max_seq_no + 1;
                                
				$table = "check_password";
				$condition = "(member_no,seq_no,password)";
				$value  = "('".$member_no."',$max_seq_no,'".$npwd."')";
				$status = insert_value_sql($table,$condition,$value);
                                
                                
                                
				if($status){
                                    
                                    $table="mbmembmaster";
			            $value="freez_flag = 0 , date_chang_pass = '".$date_log."'";
			            $condition="where member_no = '$getUsr'";
                                    update_value_sql($table,$condition,$value);
                                    
					echo '<script type="text/javascript"> window.alert("�к���ѹ�֡���ʼ�ҹ����ͧ��ҹ���� ��س�����������ʼ�ҹ����") </script> ';
					echo "<script>window.location = 'index.php'</script>";
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