<?php
session_start();
@header('Content-Type: text/html; charset=tis-620');
require "../include/conf.conn.php";
require "../include/conf.c.php";
require "../include/lib.Etc.php";
require "../include/lib.MySql.php";
require "../include/lib.Oracle.php";
$connectby = "mobile";

//http://web.coopsiam.com:8080/GSB/w/info.php?menu=Member_info
//http://web.coopsiam.com:8080/GSB/w/info.php?menu=Share
//http://web.coopsiam.com:8080/GSB/w/info.php?menu=Deposit
//http://web.coopsiam.com:8080/GSB/w/info.php?menu=Loan
//http://web.coopsiam.com:8080/GSB/w/info.php?menu=Payment_Show
//http://web.coopsiam.com:8080/GSB/w/info.php?menu=Payment
//http://web.coopsiam.com:8080/GSB/w/index.php
//http://web.coopsiam.com:8080/GSB/w/info.php?menu=SigeOut

?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?=$title?></title>
	<link rel="stylesheet"  href="../css/jquery.mobile-1.3.2.min.css">
	<link rel="stylesheet" href="../css/jqm-demos.css">
	<link rel="shortcut icon" href="../img/ic_launcher.png">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <script src="../js/jquery.js"></script>
	<script src="../js/index.js"></script>
	<script src="../js/jquery.mobile-1.3.2.min.js"></script>
</head>
<body>
<?php require "../include/conf.d.php" ?>
<center>
<br/><ul data-role="listview" data-ajax="false" data-inset="false" data-theme="e">
<li><a><?=$sub_title?></a></li>
</ul><br/> <br/>  <img src="../img/ic_launcher.png" width="150" /><br/>
<?php if($_POST["agree"] != "agree" ){  ?>
<textarea name="textfield" rows="9" readonly id="textfield" style="width:80%; resize:none; padding:16px">
���͹���Т�͵�ŧ㹡����Ѥ���Ҫԡ
1.��������ҹ�к���������Ҫԡ�е�ͧ�ӡ����Ѥ������ҹ�к���е�ͧ����Ҫԡ�ͧ <?=$title?> ��ҹ�鹠
2.���ͤ������º����㹡����Ѥ���ҹ �к�� ��������׹�ѹ�����Ѥ� ��سҷӵ����鹵͹����к��йӠ
3.�ҡ��ҡ���� �������������Ţ��Ҫԡ �ͧ��ҹ���ա����Ѥ���ҹ���� �·�ҹ����Һ ���ͷӡ����Ѥô��µ�Ƿ�ҹ�ͧ ��س������˹�ҷ�����ͷӡ�õ�Ǩ�ͺ�����١��ͧ ���仡�س����ѡ�� username / password �ͧ��ҹ
4.�����Է����Ф�����ʹ���㹢����Ţͧ��ҹ�ͧ�ҡ��ҡ�����պؤ���ͺ��ҧ ��Ѥ���ҹ�к�������˹�ҷ���Ǩ�ͺ���Ǩзӡ��ź��ª��͹��� �͡�ҡ�к� ������ͧ������Һ�
5.�����Ţͧ��Ҫԡ ��к��зӡ�û�Ѻ��ا������ �ҡ��Ҫԡ��ҹ㴾����������ç�����բ��ʧ��¡�سҵԴ������˹�ҷ��
6.��Ҿ�������ҹ��͵�ŧ�ѧ��������� ����Թ�������͹䢵�ҧ���ҧ <?=$title?> ��˹����
</textarea>
            <form name="formID1" id="formID1" method="post" action="" >
			  <label><input type="checkbox" name="agree" value="agree"  required/>����Ѻ���͹� </label>
              <input name="member_no" type="text" class="validate[required,custom[integer]]" id="member_no" size="20" maxlength="10" autocomplete="off" placeholder="����¹��Ҫԡ"  required/>
              <input name="idchk" type="text" class="validate[required,custom[integer],minSize[13]]" id="idchk" size="20" maxlength="13" autocomplete="off" placeholder="�Ţ���ѵû�ЪҪ�" required/>
			  <input type="submit" name="Submit" id="button" value="��ŧ"  data-iconpos="right" data-theme="b" />
			  <!--<input name="¡��ԡ" type="reset" id="¡��ԡ"  data-iconpos="right" data-theme="b" onclick="location.href='index.php'" value="¡��ԡ" />-->
              <input name="ref" type="hidden" id="ref" value="checkuser" />
            </form>
<?php
}else{
 	require "../s/s.member_info.php" ;
	//echo $card_person;
	//echo $Num_Rows;
	$register_status = true;
	if($Num_Rows == 0){ // ��辺����¹ 
		$register_status = false;
		echo '<script type="text/javascript"> window.alert("�������ö���Թ����� ��سҵԴ����ˡó� ���͵�ǨʶҹС������Ҫԡ") </script> ';
		echo "<script>window.location = 'index.php'</script>";
		exit;
	}	

	/*if($countmemb	> 0 or $countidcard > 0){ // ����Ѥ�����
		$register_status = false;
		echo '<script type="text/javascript"> window.alert("�������ö���Թ����� ��ҹ����Ѥ����ԡ������ ��سҵԴ����ˡó�") </script> ';
		echo "<script>window.location = 'index.php'</script>";
		exit;
	}*/
	
	if($card_person	 != $idchk){ // �Ţ�ѵ����١��ͧ
		$register_status = false;
		echo '<script type="text/javascript"> window.alert("�������ö���Թ����� ����¹��Ҫԡ�����Ţ�ѵû�ЪҪ����١��ͧ ��سҵ�Ǩ�ͺ") </script> ';
		echo "<script>window.location = 'index.php'</script>";
		exit;
	}
	if($register_status){ // ����������Ѥ�
		?>
        <form action="" method="post" id="formID2">
              <input name="memb_no" type="text" class="validate[required,custom[integer]]" id="memb_no" autocomplete="off"  value="<?=$member_no?>" size="10" readonly  placeholder="����¹��Ҫԡ" /></td>
              <input name="memb_fullname" type="text" class="validate[required]" id="memb_fullname"  value="<?=$full_name?>" size="35"  maxlength="13" readonly  placeholder="����-ʡ�� "  /></td>
              <input name="idcard1" type="text" class="validate[required,custom[integer],minSize[13]]" id="idcard1"  value="<?=$card_person?>" size="35"  maxlength="13" readonly placeholder="�Ţ���ѵû�ЪҪ� " /></td>
              <?php if($mobile_register == 1){?>
                      <input name="mobile1" type="text" class="validate[required,minSize[10]]" id="mobile1" size="35" value="<?=$mobile?>" autocomplete="off" placeholder="��Ͷ�� " />
			 <?php }else { ?> 
                      <input name="mobile1" type="text" class="validate[minSize[10]]" id="mobile1" size="35" value="<?=$mobile?>" autocomplete="off" placeholder="��Ͷ��(�׹�ѹ) " />
             <?php } ?><br/>
			 <font face="Tahoma" size="2" color="red"><strong><em>* �����Ţ���Ѿ�� �����Ѻ�����ż�ҹ SMS �ٻẺ 0812345678</em></strong></font>
			 <?php 	if($email_register == 1){?>
                        	<input name="email1" type="text" id="email1" value="<?=$email?>" class="validate[required,custom[email]]	" size="35" autocomplete="off" placeholder="Email "/>	
			 <?php }else { ?> 
                        	<input name="email1" type="text" id="email1" value="<?=$email?>" class="validate[custom[email]]	" size="35" autocomplete="off" placeholder="Email(�׹�ѹ) "/>			
             <?php } ?> <br/>
			 <font face="Tahoma" size="2" color="red"><strong><em>* Email �����Ѻ��������ˡó� ��˹����ʼ�������ҧ���� 8 ����ѡ�� ������Թ 13 ����ѡ��</em></strong></font>
              <input name="pwd_r" type="password" class="validate[required,minSize[8]]" id="pwd_r" size="35" maxlength="13" autocomplete="off" placeholder="���ʼ�ҹ "/>
              <input name="pwd_r1" type="password" class="validate[required,equals[pwd_r]]" id="pwd_r1" size="35" maxlength="13" autocomplete="off" placeholder="���ʼ�ҹ(�׹�ѹ) "/>
              <input type="submit" name="button" id="button2" value="��ŧ��Ѥ�" data-iconpos="right" data-theme="b" />
              <input type="reset" name="button3" id="button3" value="��ҧ�����ŷ�����"data-iconpos="right" data-theme="b" >
              <input name="reg" type="hidden" id="reg" value="done">
              </form>
        <?php
	}
}
?> 
<?php 
	if($_POST["reg"] == "done"){  
		 	require "../s/s.register.php" ;
	}
?>     
<div ><a href="index.php" data-role="button" data-corners="false"  data-icon="arrow-l" data-theme="f">��Ѻ�������к�</a></div></center>
</body>
</html>

