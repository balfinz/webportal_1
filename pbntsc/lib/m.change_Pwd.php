<?php
session_start();
header('Content-Type: text/html; charset=tis-620');
?><head>
	<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<?php
//require "../s/s.Beneficiary.php";
?>
<table width="95%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="right"><font face="Tahoma" size="4"><strong>����¹���ʼ�ҹ</strong></font><br />
      <font face="Tahoma" size="2" color="#FF6600">Change Password</font></td>
  </tr>
</table>
<hr color="#999999" size="1"/>
<form id="formID1" name="formID1" method="post" action="">
  <!--  <div data-role="fieldcontain">
        <label for="name"><font color="red">��˹����ʼ�ҹ�������ҧ���� 6 ����ѡ�� ������Թ 8 ����ѡ��</font></label><br><br>
        <label for="name">�������� : </label>
        <input name="npwd" type="password" class="validate[required,minSize[6]]" id="npwd" size="25" maxlength="8" autocomplete="off"  />
        <br>
         <br>
        <label for="name">�׹�ѹ�������� : </label>
        <input name="npwd1" type="password" class="validate[required,equals[npwd]]" id="npwd1" size="25" maxlength="8" autocomplete="off"  />
    </div>
    <tr>
        <td align="right"><hr color="#999999" size="1"/></td>
    </tr>
    <div data-role="fieldcontain">
          <label for="name"><font color="red">���������������׹�ѹ�������¹���ʼ�ҹ</font></label><br>
        <label for="name"></label>
        <input name="oldpwd" type="password" class="validate[required]" id="oldpwd" size="25" maxlength="8" autocomplete="off"  />

    </div>-->
  
                                <div>
                                <label for="name"><font color="red">��˹����ʼ�ҹ�������ҧ���� 8 ����ѡ�� ������Թ 13 ����ѡ��</font></label><br><br>
                                <input name="npwd" type="password" class="validate[required,minSize[8]]" id="npwd" size="25" maxlength="13" placeholder="��������" autocomplete="off"  />
				</div>	
  
				 <input name="npwd1" type="password" class="validate[required,equals[npwd]]" id="npwd1" size="25" maxlength="13" placeholder="�׹�ѹ��������" autocomplete="off"  />
                                <tr>
                                <td align="right"><hr color="#999999" size="1"/></td>
                                </tr>
                                 <input name="oldpwd" type="password" class="validate[required]" id="oldpwd" size="25" maxlength="13" placeholder="����������" autocomplete="off"  />
  
    <br>
    <input value="�׹�ѹ" data-iconpos="right" data-theme="b" type="submit">
    <!--<input type="submit" name="button" id="button" value="�׹�ѹ" />-->
    <input name="ChkPwd" type="hidden" id="ChkPwd" value="ChkPwd" />
</form>
<hr color="#999999" size="1"/>

<?php 

if($_POST["ChkPwd"] != null){
    
   echo $checkl = $_POST["npwd"];

    if(strlen($checkl) >= 6) {

        $chkpassword = md5($_POST["oldpwd"]);
        $npwd = md5($_POST["npwd"]);
	$strSQL = "select password from mbmembmaster where member_no = '$member_no'"; 		
	$value = "password"; 
	$oldPassword = get_single_value_sql($strSQL,$value);

	if($chkpassword == $oldPassword){
		if($npwd == $oldPassword){
			echo '<script type="text/javascript"> window.alert("�������ö����¹���ʼ�ҹ������ ��س�����¹���ʼ�ҹ��������ҧ�ҡ���") </script> ';
			echo "<script>window.location = 'info.php?menu=Change_Pwd'</script>";
			$ChkPwd = null;
			exit;
		}else{
			$table="mbmembmaster";
			$value="password = '".$npwd."'";
			$condition="where member_no = '$member_no'";
                        
                        $table_memberclare ="memberclare";
			$value_memberclare ="member_password = '".$_POST["npwd"]."'";
			$condition_memberclare ="where member_no = '$member_no'";
                        update_value_sql($table_memberclare,$condition_memberclare,$value_memberclare);
                        
			if(update_value_sql($table,$condition,$value)){
				$action_page = 'Change Password';
				$table = "log_action";
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
    }else{
	
	        echo '<script type="text/javascript"> window.alert("password ����������֧ 6 �ѡ��� ��سҡ�͡����") </script> ';
                echo "<script>window.history.back()</script>";
		exit();
	
    }
}
?>
