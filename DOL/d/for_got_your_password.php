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
	<link rel="shortcut icon" href="../img/logo.png">
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
            <td width="109" height="100" align="right"><img src="../img/logo.png" width="101" height="101"></td>
            <td width="876"><table width="100%" border="0" cellspacing="5" cellpadding="0">
              <tr>
                <td><font face='Tahoma' size="5" color="#FFFFFF"><strong>
                  <?=$title?>
                </strong></font><br/>
				<font face='Tahoma' size="3" color="#FFFFFF">
					<?=$title2?>
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
            <td align="center"><table width="75%" border="1" align="center" bordercolor = "red" cellpadding="20" cellspacing="0">
					<tr><td><B>
              **���͹�㹡������¹�����к���������Ҫԡ**<br><br>

					1. ��͡�Ţ����¹��Ҫԡ<br>
					2. ��͡���ʺѵû�ЪҪ��ͧ��Ҫԡ<br>
					3. ��͡�ѹ��͹���Դ�ͧ��Ҫԡ<br>
					4. ����͡�͡�ú�ء��ͧ����� �������Ѻ���͹��������͡��ŧ <font color="red" size=2>�к����� Password ��������� "1234"</font><br>
					5. �ҡ����к�����ʴ�˹�Ҩ�����¹���ʼ�ҹ�ѵ��ѵ����������Ҫԡ�ӡ�á�˹����ʼ�ҹ������µ���ͧ<br>
					6. ��س������ʼ�ҹ�ͧ��ҹ����繤����Ѻ</td></tr></table>
			</td>
          </tr>
          <tr>
            <td align="center">
            <form name="formID1" id="formID1" method="post" action="" >
              <table width="100%" border="0" align="center" cellpadding="2" cellspacing="2">
                <tr>
                  <td width="39%" align="right"><font face="Tahoma" size="2"><strong><strong>�Ţ����¹��Ҫԡ :</strong></strong></font></td>
                  <td width="61%"><input name="member_no" type="text" class="validate[required]" id="member_no" size="20" maxlength="10" autocomplete="off" style="width: 161px;"/><font color="#FF0000"> ** ����ͧ����Ţ�ٹ���˹��</font></td>
                </tr>
                <tr>
                  <td align="right"><font face="Tahoma" size="2"><strong><strong>�Ţ���ѵû�ЪҪ� :</strong></strong></font></td>
                  <td><input name="idchk" type="text" class="validate[required,custom[integer],minSize[5]]" id="idchk" size="20" maxlength="13" autocomplete="off" style="width: 161px;"/><font color="#FF0000"> ** ��� 13 ��ѡ</font></td>
                </tr>
                <tr>
                  <td align="right"><font face="Tahoma" size="2"><strong><strong>�ѹ�Դ :</strong></strong></font></td>
                  <td><input name="idhbd" type="text" id="idhbd" size="20" maxlength="13" autocomplete="off" style="width: 161px;"/> <font color="#FF0000">** ������ҧ 22 �.� 2523 --> 22112523 (�ѹ��͹��(�.�))</font></td>
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
        
      /* echo $birthday ;
       echo '<br>';
       echo $idhbd ; exit();*/
       
       //exit();
       /*echo "$birthday = ".$birthday = $birthday +543;*/
        
        $day_c = substr($birthday, 0, 2);
        '<br>';
        $month_c = substr($birthday, 3, 2);
        '<br>';
        $year_c = substr($birthday, 6, 9);
        '<br>';
        $year_ps = $year_c + 543;
        '<br>';
        $bd_ps = $day_c.$month_c.$year_ps;
        '<br>';
        "$idhbd = ".$idhbd;
        
        if($bd_ps  != $idhbd){ // �ѹ�Դ���١��ͧ
		$repassword = false;
		echo '<script type="text/javascript"> window.alert("�������ö���Թ����� �ѹ�Դ�ͧ��ҹ���١��ͧ ��سҵ�Ǩ�ͺ") </script> ';
		echo "<script>window.location = 'for_got_your_password.php'</script>";
		exit;
	}

        $strMySQL = "SELECT member_no AS check_member  FROM webmbmembmaster where member_no = '$member_no'";
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
        $npwd = md5("1234");
	$table="webmbmembmaster";
	$value="password = '".$npwd."'  , error_flag = 0,freez_flag = 0,date_chang_pass = now()";
	$condition="where member_no = '$member_no'";
	$status = update_value_sql($table,$condition,$value);
        $_SESSION[ses_userid] = session_id();                      
	$_SESSION[ses_member_no] = $member_no;
		if($status){
			echo '<script type="text/javascript"> window.alert("�к���������������Ҫԡ�� ���ʼ�ҹ 1234 �������仵�����ʼ�ҹ����") </script> ';
                        echo "<script>window.location = 'info.php?menu=Change_Pwd'</script>";
			//echo '<script type="text/javascript"> window.alert("�к���������������Ҫԡ�� ���ʼ�ҹ 1234 ������ login ���� ���仵�����ʼ�ҹ����") </script> ';
                        //echo "<script>window.location = 'index.php'</script>";
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
</body>
</html>

<script language="javascript">
function checkID(id)
{
if(id.length != 13) return false;
for(i=0, sum=0; i < 12; i++)
sum += parseFloat(id.charAt(i))*(13-i); if((11-sum%11)%10!=parseFloat(id.charAt(12)))
return false; return true;}

$('#idchk').blur(function(){
 
    if(!checkID(document.formID1.idchk.value) && document.formID1.idchk.value != "")
    {
alert('���ʻ�ЪҪ����١��ͧ');
//$('#idchk').focus() 

}
else 
{ 
    //alert('���ʻ�ЪҪ��١��ͧ �ԭ��ҹ��');
}

});
</script>

