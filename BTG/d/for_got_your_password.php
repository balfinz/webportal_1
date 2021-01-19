<?php
session_start();
header('Content-Type: text/html; charset=tis-620');
	require "../include/conf.conn.php";
	require "../include/conf.c.php";
	require "../include/lib.Etc.php";
	require "../include/lib.Oracle.php";
	require "../include/lib.MySql.php";
	$connectby = "desktop";
        
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?=$title?></title>
	<link rel="shortcut icon" href="../img/LogoMUCOOP(3).png">
    <link rel="stylesheet" href="../css/validationEngine.jquery.css" type="text/css">
	<link rel="stylesheet" href="../css/template.css" type="text/css">
    <script src="../js/jquery-1.6.min.js" type="text/javascript"></script>
	<script src="../js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="tis-620"></script>
	<script src="../js/jquery.validationEngine.js" type="text/javascript" charset="tis-620"></script>
	<script type="text/javascript">
			jQuery(document).ready(function(){
						jQuery("#formID1").validationEngine('attach', {promptPosition : "topRight", autoPositionUpdate : true});
						jQuery("#formID2").validationEngine('attach', {promptPosition : "topRight", autoPositionUpdate : true});
			});
	</script>

</head>
<body>
<?php require "../include/conf.d.php" ?>
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="middle" bgcolor="#333333">
    <table width="995" border="0" align="center" cellpadding="0" cellspacing="0"  bgcolor="#FFFFFF">
      <tr>
        <td height="120"  background="../img/head_info_bg.png"><table width="994" border="0" cellspacing="3" cellpadding="0">
          <tr>
            <td width="109" height="100" align="right"><img src="../img/logo.png" width="100" height="100"></td>
            <td width="876"><table width="100%" border="0" cellspacing="5" cellpadding="0">
              <tr>
                <td><font face='Tahoma' size="5" color="#FFFFFF"><strong>
                  <?=$title?>
                </strong></font><br/>
				<font face='Tahoma' size="2" color="#FFFFFF">
					<?=$sub_title1?>
					</font><br/>
                <font face='Tahoma' size="2" color="#FFFFFF">
                <?=$sub_title2?>
                </font></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
            </table></td>
          </tr>
        </table></td>
        </tr>
      <tr>
        <td height="390">
<?php if($_POST["agree"] != "agree" ){  ?>
        <table width="95%" border="0" align="center" cellpadding="0" cellspacing="6">
          <tr>
            <td align="center"><table width="75%" border="1" align="center" bordercolor = "green" cellpadding="20" cellspacing="0">
					<tr><td><B>
              **���͹� 㹡������¹�����к���������Ҫԡ**<br><br>

					1.��͡������  �Ţ����¹��Ҫԡ , �Ţ���ѵû�ЪҪ� , �ѹ�Դ , ���� ���� ���ʡ�Š<br>
					2.��ԡ '��Ҿ�������Ѻ���͹䢷�����'�<br>
					3.�к��� set password (���Ǥ���) ����������Һ�ҧ����� <br>
					</tr></table>
			</td>
          </tr>
          <tr>
            <td align="center">
            <form name="formID1" id="formID1" method="post" action="" >
              <table width="70%" border="0" align="center" cellpadding="2" cellspacing="2">
                <tr>
                  <td width="39%" align="right"><font face="Tahoma" size="2"><strong><strong>�Ţ����¹��Ҫԡ :</strong></strong></font></td>
                  <td width="61%"><input name="member_no" type="text" class="validate[required]" id="member_no" size="20" maxlength="10" autocomplete="off" style="width: 161px;"/></td>
                </tr>
                <tr>
                  <td align="right"><font face="Tahoma" size="2"><strong><strong>�Ţ���ѵû�ЪҪ� :</strong></strong></font></td>
                  <td><input name="idchk" type="text" class="validate[required]" id="idchk" size="20" maxlength="13" autocomplete="off" style="width: 161px;"/></td>
                </tr>
                <tr>
                  <td align="right"><font face="Tahoma" size="2"><strong><strong>�ѹ�Դ :</strong></strong></font></td>
                  <td><input name="idhbd" type="text" id="idhbd" size="20" maxlength="13" autocomplete="off" style="width: 161px;"/> <font color="blue">** ������ҧ�� 22112523 (�ѹ��͹��(�.�))</font></td>
                </tr>
                 <tr>
                  <td align="right"><font face="Tahoma" size="2"><strong><strong>���� :</strong></strong></font></td>
                  <td><input name="idname" type="text" id="idname" size="20" maxlength="50" autocomplete="off" style="width: 161px;"/> <font color="#FF0000"></font></td>
                </tr>
                 <tr>
                  <td align="right"><font face="Tahoma" size="2"><strong><strong>ʡ�� :</strong></strong></font></td>
                  <td><input name="idsurname" type="text" id="idsurname" size="20" maxlength="50" autocomplete="off" style="width: 161px;"/> <font color="#FF0000"></font></td>
                </tr>
                <tr>
                  <td align="right"><input name="agree" type="checkbox" class="validate[required]" id="agree" value="agree">
                    <label for="agree"></label></td>
                  <td><font face="Tahoma" size="2">��Ҿ�������Ѻ���͹�㹡������¹ password</font></td>
                </tr>
                <tr>
                  <td align="right">&nbsp;</td>
                  <td><input type="submit" name="Submit" id="button" value="��ŧ" />
                    <input name="¡��ԡ" type="reset" id="¡��ԡ" onclick="location.href='index.php'" value="¡��ԡ" />
                    <input name="ref" type="hidden" id="ref" value="checkuser" /></td>
                </tr>
              </table>
            </form>
            </td>
          </tr>
        </table>
		
		<table width="75%" border="0" align="center" bordercolor = "red" cellpadding="20" cellspacing="0">
					<tr><td><B>
                                                    email �����: <span id="showemail"></span><br><br>
					����ͧ����� : <?php 
                                                        echo $_SERVER['REMOTE_ADDR'];?> <br>
					
			</td>
          </tr>
        </table>
		
<?php
}else{
 	require "../s/s.member_info.php" ;
	$repassword = true;
	if($Num_Rows == 0){ // ��辺����¹ 
		$repassword = false;
		echo '<script type="text/javascript"> window.alert("�������ö���Թ����� ��سҵԴ����ˡó� ���͵�ǨʶҹС������Ҫԡ") </script> ';
		echo "<script>window.location = 'for_got_your_password.php'</script>";
		exit;
	}	
        

	if($card_person	 != $idchk){ // �Ţ�ѵ����١��ͧ
		$repassword = false;
		echo '<script type="text/javascript"> window.alert("�������ö���Թ����� ����¹��Ҫԡ�����Ţ�ѵû�ЪҪ����١��ͧ ��سҵ�Ǩ�ͺ") </script> ';
		echo "<script>window.location = 'for_got_your_password.php'</script>";
		exit;
	}
        
      // echo $birthday ;
       //echo '<br>';
       //echo $idhbd ; 
       
       //exit();
       /*echo "$birthday = ".$birthday = $birthday +543;*/
        
        $day_c = substr($birthday, 0, 2);
       echo '<br>';
        $month_c = substr($birthday, 3, 2);
       echo '<br>';
        $year_c = substr($birthday, 6, 9);
       echo '<br>';
        $year_ps = $year_c + 543;
       echo '<br>';
       // $bd_ps = $day_c.$month_c.$year_ps;

       echo '<br>';
       
         //$$idhbd = $_POST["idhbd"];

        if($bd_ps != $_POST["idhbd"]){ // �ѹ�Դ���١��ͧ
		$repassword = false;
		echo '<script type="text/javascript"> window.alert("�������ö���Թ����� �ѹ�Դ�ͧ��ҹ���١��ͧ ��سҵ�Ǩ�ͺ") </script> ';
		echo "<script>window.location = 'for_got_your_password.php'</script>";
		exit;
	}
        
        $idname = $_POST["idname"];
        
        if($name != $idname){ // �������١��ͧ
		$repassword = false;
		echo '<script type="text/javascript"> window.alert("�������ö���Թ����� ���ͧ͢��ҹ���١��ͧ ��سҵ�Ǩ�ͺ") </script> ';
		echo "<script>window.location = 'for_got_your_password.php'</script>";
		exit;
	}
        
         $idsurname = $_POST["idsurname"];
        
        if($surname != $idsurname){ // ���ʡ�� ���١��ͧ
		$repassword = false;
		echo '<script type="text/javascript"> window.alert("�������ö���Թ����� ���ʡ�Ţͧ��ҹ���١��ͧ ��سҵ�Ǩ�ͺ") </script> ';
		echo "<script>window.location = 'for_got_your_password.php'</script>";
		exit;
	}

        $strMySQL = "SELECT member_no AS check_member  FROM mbmembmaster where member_no = '$member_no'";
        $valueSQL = "check_member";
        $check_member = get_single_value_sql($strMySQL,$valueSQL);
        
        if($check_member == ""){
            $repassword = false;
                echo '<script type="text/javascript"> window.alert("�������ö���Թ����� ��ҹ�ѧ�������Ѥ���Ҫԡ ��سҷӡ����Ѥ���Ҫԡ��͹") </script> ';
		echo "<script>window.location = 'index.php'</script>";
		exit;
        }
        
        
	if($repassword){ // ���������¹���ʼ�ҹ
		?>
        <?php 
		$date_log = date("Y-m-d H:i:s");
		 // $pass_="".rand(1000, 9999) ; 
		 $pass_ = str_pad(mt_rand(0, 999), 3, '0', STR_PAD_LEFT);
		 $pass_ = "Sahakorn.01".$pass_;
		
		
        $npwd = getEncryptData($pass_);
		$table="mbmembmaster";
		$value="password = '".$npwd."',freez_flag = 0  , error_status = 0, temporary_password = 1 , date_chang_pass = '".$date_log."'";
		$condition="where member_no = '$member_no'";
		$status = update_value_sql($table,$condition,$value);
        $_SESSION[ses_userid] = session_id();                      
		$_SESSION[ses_member_no] = $member_no;
		
		
		if($status){
			

			//$os = php_uname('n');
			$os = "";
			$action_page = 'For_Got_Password';
                                $table = "log_action";
                                $condition = "(action_do,action_id,user,date_log,ipconnect,system_os)";
                                $value  = "('".$action_page."','".$member_no."','".$member_no."','".$date_log."','".$_SERVER['REMOTE_ADDR']."','".$os."')";
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
			

		$sql="CREATE TABLE if exists `weblogpwdreset` ( `weblogid` BIGINT NOT NULL AUTO_INCREMENT , `update_date` DATE NOT NULL , `member_no` VARCHAR(10) NOT NULL , `new_pwd` VARCHAR(20) NOT NULL , `remote_ip` VARCHAR(50) NOT NULL ) ENGINE = InnoDB";	
		mysql_query($sql);
			
		$sql="insert into weblogpwdreset (update_date,member_no,new_pwd,remote_ip) values(now(),'".$member_no."','".$pass_."','".$_SERVER['REMOTE_ADDR']."')";	
		mysql_query($sql);
		
			                $SLIP_DATE=ConvertDate(date("d-m-Y"),"long");
							$MEMB_NAME=$name;
							$MEMB_SURNAME=$surname;
							$MEMBER_EMAIL=$MAIL_TEST_MODE?$MAIL_TEST_EMAIL:$email;
							$SALARY_ID=$salary_id;
							$MEMBGROUP_DESC=$membgroup_code;
							
							$Subject=conv($MAIL_FROM_NM." "." ���ʼ�ҹ��١ Reset � �ѹ��� ".$SLIP_DATE);	
							$body=file_get_contents('../include/forgetpassword_template.html', true);
							$body=str_replace("COOP_NAME",conv($MAIL_FROM_NM),$body);
							$body=str_replace("SENT_DATE",conv(ConvertDate(date("d-m-Y"),"long")),$body);
							$body=str_replace("SLIP_DATE",conv($SLIP_DATE),$body);
							$body=str_replace("MEMBER_NO",$member_no,$body);
							$body=str_replace("WEB_LINK",$WEB_LINK,$body);
							$body=str_replace("MEMB_NAME",conv($MEMB_NAME),$body);
							$body=str_replace("MEMB_SURNAME",conv($MEMB_SURNAME),$body);
							$body=str_replace("SALARY_ID",$SALARY_ID,$body);
							$body=str_replace("MEMBGROUP_DESC",conv($MEMBGROUP_DESC),$body);
							$body=str_replace("PASSWORD",$pass_,$body);
							//$body=conv($body);
							$mail_to=array($MEMBER_EMAIL);
							$mail_to_nm=array(conv($MEMB_NAME." ".$MEMB_SURNAME));	
							//$MAIL_FROM_NM=conv($MAIL_FROM_NM);

							$msg=sendMail(
								$MAIL_HOST,
								$MAIL_PORT,
								$MAIL_USR,
								$MAIL_PWD,
								$MAIL_FROM,
								conv($MAIL_FROM_NM),
								$mail_to,
								$mail_to_nm,
								$Subject,
							    $body,
								$MAIL_DEBUG,
								$MAIL_AUTH_FLAG,
								$MAIL_SECURE
								);
									
			//echo $msg;

			echo '<script type="text/javascript"> window.alert("�к����������������ʼ�ҹ����(���Ǥ���) �����Ҫԡ�ҧ�����������") </script> '; //'.$pass_.'
			//echo "<script>window.location = 'Change_Pwd.php'</script>";

            echo "<script>window.location = 'index.php'</script>";
		}else{
			echo '<script type="text/javascript"> window.alert("�Դ��ͼԴ��Ҵ !!! ��س��ͧ�����ա����") </script> ';
			echo "<script>window.location = 'index.php'</script>";
		}
        
	}
}
?> 
<?php 
	if($_POST["reg"] == "done"){  
		 	require "../s/s.register_1.php" ;
	}
?>     
        </td>
        </tr>
      <tr>
        <td height="120" align="center" background="../img/footer_info_bg.png"><span class="class1"><font size="2" color="#FFFFFF"><strong><?=$title?></strong></font><br/><font size="2" color="#FFFFFF"><?=$address?><br/><?=$credite?></font></span></td>
      </tr>
    </table></td>
  </tr>
</table>
  <script>
            $('#member_no').change(function(){
                var member_no = $(this).val();
                $.post('../s/s.getemail.php',{
                    member_no : member_no
                },function(data){
                    $('#showemail').html(data); 
                    console.log(data);
                });
            });
        </script>
</body>
</html>

