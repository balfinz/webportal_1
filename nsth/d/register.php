<?php
session_start();
@header('Content-Type: text/html; charset=tis-620');
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
        <td height="120"  background="../img/head_info_bgh.png"><table width="994" border="0" cellspacing="3" cellpadding="0">
          <tr>
            <td width="109" height="100" align="right"><img src="../img/logo.png" width="138" height="138"></td>
            <td width="876"><table width="100%" border="0" cellspacing="5" cellpadding="0">
              <tr>
                <td><font face='Tahoma' size="5" color="#FFFFFF"><strong>
                  <?=$title?>
                </strong></font><br/>
                <font face='Tahoma' size="2" color="#FFFFFF">
                <?=$address?>
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
<?php if(@$_POST["agree"] != "agree" ){  ?>
        <table width="95%" border="0" align="center" cellpadding="0" cellspacing="6">
          <tr>
            <td align="center"><label for="textfield"></label>
              <textarea name="textfield" rows="9" readonly id="textfield" style="width:80%; resize:none; padding:16px">���͹���Т�͵�ŧ㹡����Ѥ���Ҫԡ
1.��������ҹ�к���������Ҫԡ�е�ͧ�ӡ����Ѥ������ҹ�к���е�ͧ����Ҫԡ�ͧ <?=$title?> ��ҹ�鹠
2.���ͤ������º����㹡����Ѥ���ҹ �к�� ��������׹�ѹ�����Ѥ� ��سҷӵ����鹵͹����к��йӠ
3.�ҡ��ҡ���� �������������Ţ��Ҫԡ �ͧ��ҹ���ա����Ѥ���ҹ���� �·�ҹ����Һ ���ͷӡ����Ѥô��µ�Ƿ�ҹ�ͧ ��س������˹�ҷ�����ͷӡ�õ�Ǩ�ͺ�����١��ͧ ���仡�س����ѡ�� username / password �ͧ��ҹ
4.�����Է����Ф�����ʹ���㹢����Ţͧ��ҹ�ͧ�ҡ��ҡ�����պؤ���ͺ��ҧ ��Ѥ���ҹ�к�������˹�ҷ���Ǩ�ͺ���Ǩзӡ��ź��ª��͹��� �͡�ҡ�к� ������ͧ������Һ�
5.�����Ţͧ��Ҫԡ ��к��зӡ�û�Ѻ��ا������ �ҡ��Ҫԡ��ҹ㴾����������ç�����բ��ʧ��¡�سҵԴ������˹�ҷ��
6.��Ҿ�������ҹ��͵�ŧ�ѧ��������� ����Թ�������͹䢵�ҧ���ҧ <?=$title?> ��˹����</textarea>
			</td>
          </tr>
          <tr>
            <td align="center">
            <form name="formID1" id="formID1" method="post" action="" >
              <table width="70%" border="0" align="center" cellpadding="2" cellspacing="2">
                <tr>
                  <td width="39%" align="right"><font face="Tahoma" size="2"><strong><strong>�Ţ����¹��Ҫԡ :</strong></strong></font></td>
                  <td width="61%"><input name="member_no" type="text" class="validate[required,custom[integer]]" id="member_no" size="20" maxlength="10" autocomplete="off" /></td>
                </tr>
                <tr>
                  <td align="right"><font face="Tahoma" size="2"><strong><strong>�Ţ���ѵû�ЪҪ� :</strong></strong></font></td>
                  <td><input name="idchk" type="text" class="validate[required,custom[integer],minSize[13]]" id="idchk" size="20" maxlength="13" autocomplete="off"/></td>
                </tr>
                <tr>
                  <td align="right"><input name="agree" type="checkbox" class="validate[required]" id="agree" value="agree">
                    <label for="agree"></label></td>
                  <td><font face="Tahoma" size="2">��Ҿ�������Ѻ���͹䢷�����</font></td>
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
	//echo $card_person;
	//echo $Num_Rows;
	$register_status = true;
	if($resultData == 0){ // ��辺����¹ 
		$register_status = false;
		echo '<script type="text/javascript"> window.alert("�������ö���Թ����� ��سҵԴ����ˡó� ���͵�ǨʶҹС������Ҫԡ") </script> ';
		echo "<script>window.location = 'index.php'</script>";
		exit;
	}	

	if($countmemb	> 0 or $countidcard > 0){ // ����Ѥ�����
		$register_status = false;
		echo '<script type="text/javascript"> window.alert("�������ö���Թ����� ��ҹ����Ѥ����ԡ������ ��سҵԴ����ˡó�") </script> ';
		echo "<script>window.location = 'index.php'</script>";
		exit;
	}
	
	if($card_person	 != $idchk){ // �Ţ�ѵ����١��ͧ
		$register_status = false;
		echo '<script type="text/javascript"> window.alert("�������ö���Թ����� ����¹��Ҫԡ�����Ţ�ѵû�ЪҪ����١��ͧ ��سҵ�Ǩ�ͺ") </script> ';
		echo "<script>window.location = 'index.php'</script>";
		exit;
	}
	if($register_status){ // ����������Ѥ�
		?>
        <table width="95%" border="0" align="center" cellpadding="0" cellspacing="6">
          <tr>
            <td><form action="" method="post" id="formID2">
              <table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="1" cellspacing="1">
                    <tr>
                      <td height="30" colspan="2" bgcolor="#666666"><table width="98%" border="0" align="center" cellpadding="2" cellspacing="2">
                        <tr>
                          <td><strong><font size="2" face="Tahoma" color="#FFFFFF">��������Ҫԡ</font></strong></td>
                        </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td width="278" align="right"><strong><font face="Tahoma" size="2">�Ţ����¹��Ҫԡ :</font></strong></td>
                      <td width="461" align="left"><input name="memb_no" type="text" class="validate[required,custom[integer]]" id="memb_no" autocomplete="off"  value="<?=$member_no?>" size="10" readonly /></td>
                      </tr>
                    <tr>
                      <td align="right"><strong><font face="Tahoma" size="2">����-ʡ�� :</font></strong></td>
                      <td align="left"><input name="memb_fullname" type="text" class="validate[required]" id="memb_fullname"  value="<?=$full_name?>" size="35"  maxlength="13" readonly /></td>
                      </tr>
                    <tr>
                      <td align="right"><strong><font face="Tahoma" size="2">�Ţ���ѵû�ЪҪ� :</font></strong></td>
                      <td align="left"><input name="idcard1" type="text" class="validate[required,custom[integer],minSize[13]]" id="idcard1"  value="<?=$card_person?>" size="35"  maxlength="13" readonly /></td>
                    </tr>
                    <tr>
                      <td align="right"><strong><font face="Tahoma" size="2">��Ͷ�� :</font></strong></td>
                      <td align="left">
                      <?php if($mobile_register == 0){?>
                      <input name="mobile1" type="text" class="validate[required,minSize[10]]" id="mobile1" size="35" value="<?=$mobile?>" autocomplete="off"/>
					  <?php }else { ?> 
                      <input name="mobile1" type="text" class="validate[minSize[10]]" id="mobile1" size="35" value="<?=$mobile?>" autocomplete="off"/>
                      <?php } ?></td>
                    </tr>
                    <tr>
                      <!--td colspan="2" align="center"><font face="Tahoma" size="2" color="red"><strong><em>* �����Ţ���Ѿ�� �����Ѻ�����ż�ҹ SMS �ٻẺ 0812345678</em></strong></font></td>-->
                      </tr>
                    <tr>
                      <td align="right"><strong><font size="2" face="Tahoma">Email </font></strong>:</td>
                      <td align="left">
                        <?php 	if($email_register == 0){?>
                        	<input name="email1" type="text" id="email1" class="validate[required,custom[email]]	" size="35" autocomplete="off"/>	
					  	<?php }else { ?> 
                        	<input name="email1" type="text" id="email1" class="validate[custom[email]]	" size="35" autocomplete="off"/>			
                        <?php } ?>                   
                      </td>
                    </tr>
                    <tr>
                      <!--<td colspan="2" align="center"><font face="Tahoma" size="2" color="red"><strong><em>* Email �����Ѻ��������ˡó�</em></strong></font></td>-->
                      </tr>
                    <tr>
                      <td height="30" colspan="2" align="left" bgcolor="#666666"><table width="98%" border="0" align="center" cellpadding="2" cellspacing="2">
                        <tr>
                          <td><strong><font size="2" face="Tahoma" color="#FFFFFF">��˹����ʼ�������ҧ���� 8 ����ѡ�� ������Թ 13 ����ѡ��</font></strong></td>
                        </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td colspan="2" align="center"><table width="69%" border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td width="32%" align="right"><strong><font size="2" face="Tahoma">���ʼ�ҹ :</font></strong></td>
                          <td colspan="2"><input name="pwd_r" type="password" class="validate[required,minSize[8]]" id="pwd_r" size="35" maxlength="13" autocomplete="off"/></td>
                          </tr>
                        <tr>
                          <td align="right"><strong><font size="2" face="Tahoma">�׹�ѹ���ʼ�ҹ :</font></strong></td>
                          <td colspan="2"><input name="pwd_r1" type="password" class="validate[required,equals[pwd_r]]" id="pwd_r1" size="35" maxlength="13" autocomplete="off"/></td>
                          </tr>
                        <tr>
                          <td align="right">&nbsp;</td>
                          <td width="4%">&nbsp;</td>
                          <td width="64%"><input type="submit" name="button" id="button2" value="��ŧ��Ѥ�" />
                            <input type="reset" name="button3" id="button3" value="��ҧ�����ŷ�����">
                            <input name="reg" type="hidden" id="reg" value="done"></td>
                          </tr>
                        </table></td>
                    </tr>
                    </table></td>
                </tr>
              </table>
              </form></td>
          </tr>
        </table>
        <?php
	}
}
?> 
<?php 
	if(@$_POST["reg"] == "done"){  
		 	require "../s/s.register.php" ;
	}
?>     
        </td>
        </tr>
      <tr>
        <td height="120" align="center" background="../img/footer_info_bgf.png"><span class="class1"><font size="2" color="#FFFFFF"><strong><?=$title?></strong></font><br/><font size="2" color="#FFFFFF"><?=$address?><br/><?=$credite?></font></span></td>
      </tr>
    </table></td>
  </tr>
</table>


</body>
</html>

