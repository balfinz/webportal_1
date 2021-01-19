<?php
	session_start();
	header('Content-Type: text/html; charset=tis-620');
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
<div data-role="page" class="jqm-demos jqm-demos-home" >
<div data-role="header">
    <center><p><?=$title1?></p></center>
</div>
<?php require "../include/conf.m.php" ?>
<center>
<?php if ($_POST["agree"] != "agree") { ?>

	<form name="formID1" id="formID1" method="post" action="" >
	
			<div style=" height:100%; width:80%" > 
				<div style="width:100%; text-align:left;">
					<h4>*** ���͹���Т�͵�ŧ㹡����Ѥ���Ҫԡ***</h4>
						<p style="padding-left: 10px;">1.��������ҹ�к���������Ҫԡ�е�ͧ�ӡ����Ѥ������ҹ�к���е�ͧ����Ҫԡ ��ҹ�� </p>
						<p style="padding-left: 10px;">2.���ͤ������º����㹡����Ѥ���ҹ �к�� ��������׹�ѹ�����Ѥ� ��سҷӵ����鹵͹����к��й� </p>
						<p style="padding-left: 10px;">3.�ҡ��ҡ���� �������������Ţ��Ҫԡ �ͧ��ҹ���ա����Ѥ���ҹ���� �·�ҹ����Һ ���ͷӡ����Ѥô��µ�Ƿ�ҹ�ͧ ��س������˹�ҷ�����ͷӡ�õ�Ǩ�ͺ�����١��ͧ ���仡�س����ѡ�� username / password �ͧ��ҹ</p>
						<p style="padding-left: 10px;">4.�����Է����Ф�����ʹ���㹢����Ţͧ��ҹ�ͧ�ҡ��ҡ�����պؤ���ͺ��ҧ ��Ѥ���ҹ�к�������˹�ҷ���Ǩ�ͺ���Ǩзӡ��ź��ª��͹��� �͡�ҡ�к� ������ͧ������Һ </p>
						<p style="padding-left: 10px;">5.�����Ţͧ��Ҫԡ ��к��зӡ�û�Ѻ��ا������ �ҡ��Ҫԡ��ҹ㴾����������ç�����բ��ʧ��¡�سҵԴ������˹�ҷ��</p>
						<p style="padding-left: 10px;">6.��Ҿ�������ҹ��͵�ŧ�ѧ��������� ����Թ�������͹䢵�ҧ � ���ҧ �ˡó� ��˹����</p>
					</div>
				<div>
					<input type="text" name="member_no" id="member_no" value=""  placeholder="����¹��Ҫԡ" autocomplete="off" required >
				</div>			 
				<input type="text" name="idchk" id="idchk" value="" placeholder="�Ţ�ѵû�ЪҪ�" autocomplete="off" required> 
				<label><input type="checkbox" name="agree" value="agree"  required/>����Ѻ���͹� </label>
			    <input value="��ŧ" data-iconpos="right" data-theme="b" type="submit">
			    <input value="¡��ԡ" data-iconpos="right" data-theme="b" type="reset">
				<input name="ref" type="hidden" id="ref" value="checkuser" />
				<br>
		</div>
	</form>
<?php
            } else {
                require "../s/s.member_info.php";
                //echo $card_person;
                //echo $Num_Rows;
                $register_status = true;
                if ($Num_Rows == 0) { // ��辺����¹ 
                    $register_status = false;
                    echo '<script type="text/javascript"> window.alert("�������ö���Թ����� ��سҵԴ����ˡó� ���͵�ǨʶҹС������Ҫԡ") </script> ';
                    echo "<script>window.location = 'index.php'</script>";
                    exit;
                }

                if ($countmemb > 0 or $countidcard > 0) { // ����Ѥ�����
                    $register_status = false;
                    echo '<script type="text/javascript"> window.alert("�������ö���Թ����� ��ҹ����Ѥ����ԡ������ ��سҵԴ����ˡó�") </script> ';
                    echo "<script>window.location = 'index.php'</script>";
                    exit;
                }

                if ($card_person != $idchk) { // �Ţ�ѵ����١��ͧ
                    $register_status = false;
                    echo '<script type="text/javascript"> window.alert("�������ö���Թ����� ����¹��Ҫԡ�����Ţ�ѵû�ЪҪ����١��ͧ ��سҵ�Ǩ�ͺ") </script> ';
                    echo "<script>window.location = 'index.php'</script>";
                    exit;
                }


                if ($register_status) {//����������Ѥ�
                    ?>
                    <form action="" method="post" id="formID2">
						<br>
						<div style=" height:100%; width:80%"> 
								<h4>��������Ҫԡ�������Ѥ�</h4>
								<div class="ui-field-contain">
										<label for="memb_no">�Ţ����¹��Ҫԡ:</label>
									<input type="text"  id="memb_no" name="memb_no"  value="<?= $member_no ?>" size="10" readonly>
								</div>
								
								<div class="ui-field-contain">
									<label for="memb_fullname">���� - ���ʡ��:</label>
									<input type="text"  id="memb_fullname" name="memb_fullname"  value="<?= $full_name ?>"  maxlength="13" readonly>
								</div>
								
								<div class="ui-field-contain">
									<label for="idcard1">�Ţ�ѵû�ЪҪ�:</label>
									<input type="text"  id="idcard1" name="idcard1"  value="<?= $card_person ?>"  maxlength="13" readonly>
								</div>
								
								<div class="ui-field-contain">
									<label for="mobile1">������:</label>
									<?php if ($mobile_register == 1) { ?>
										<input type="text" class=" validate[required,minSize[10]]" id="mobile1" name="mobile1"  value="<?= $mobile ?>"   required >
									<?php } else { ?> 
										<input type="text" class=" validate[required,minSize[10]]" id="mobile1" name="mobile1"  value="<?= $mobile ?>"  >
									<?php } ?>
								</div>
								
								<div class="ui-field-contain">
									<label for="email1">�������:</label>
									<?php if ($email_register == 1) { ?>
										<input type="email"  id="email1" name="email1"  value="<?= $email ?>" >
									<?php } else { ?> 
										<input type="email"  id="email1" name="email1"  value="<?= $email ?>" >
									<?php } ?>
								</div>
								<label>��˹����ʼ�������ҧ���� 8 ����ѡ�� ������Թ 16 ����ѡ��</label>
								<div class="ui-field-contain">
									<label for="pwd_r">���ʼ�ҹ:</label>
									<input type="password" class=" validate[minSize[8]]" id="pwd_r" name="pwd_r"  maxlength="16"  required >
								</div>
                               
								<div class="ui-field-contain">
									<label for="pwd_r1">�׹�ѹ���ʼ�ҹ :</label>
									<input type="password" class="validate[minSize[8]]" id="pwd_r1" name="pwd_r1"  maxlength="16" required>
								</div>
								<div class="ui-field-contain">
									<input type="submit" name="button"  id="button2" data-iconpos="right" data-theme="b"  value="��ŧ">
								</div>
								<div class="ui-field-contain">
									<input type="reset" class="btn btn-default" id="button3" data-iconpos="right" data-theme="b" value="¡��ԡ">
									<input name="reg" type="hidden" id="reg" value="done">
								</div>
								<br>
							</div>
                    </form>
                    <?php
                }
            }
            ?>
			<?php
				if ($_POST["reg"] == "done") {
					require "../s/s.register.php";
				}
            ?>  
    
    <div data-role="footer" class="jqm-footer">
		<p><?=$credite?></p>
	</div><!-- /footer -->
</div>
</center>
</body>
</html>
