<?php
@header('Content-Type: text/html; charset=tis-620');
?>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
<?php
$ipconnect = $_SERVER["REMOTE_ADDR"];
$date_log = date('Y-m-d H:i:s');
$action_page = "Register";
$table = "mbmembmaster";
$condition = "(member_no,	memb_fullname,idcard,email,mobile,password,date_reg,ipconnect,date_chang_pass)";
$value  = 	"('".$_POST["memb_no"]."','".$_POST["memb_fullname"]."','".$_POST["idcard1"]."','".$_POST["email1"]."',
				'".$_POST["mobile1"]."','".getEncryptData($_POST["pwd_r"])."','".$date_log."','".$ipconnect."','".$date_log."')";
$status = insert_value_sql($table,$condition,$value);

$table_check_password = "check_password";		
$condition_check_password = "(member_no,seq_no,password)";
$value_check_password = "('".$_POST["memb_no"]."',1,'".getEncryptData($_POST["pwd_r"])."')";
insert_value_sql($table_check_password,$condition_check_password,$value_check_password);

		if($status){
			//$os = php_uname('n');
			$os = "";
			$table = "log_action";
			$condition = "(action_do,user,ipconnect,date_log,connectby,system_os)";
			$value  = "('".$action_page."','".$_POST["memb_no"]."','".$ipconnect."','".$date_log."','".$connectby."','".$os."')";
			$status1 = insert_value_sql($table,$condition,$value);
			if($status1){
				$_SESSION[ses_userid] = session_id();                      
				$_SESSION[ses_member_no] = $_POST["memb_no"];
				if($confirm2use == 0){
					echo '<script type="text/javascript"> window.alert("�к���ӡ�úѹ�֡�����Ţͧ��ҹ���º�������� �к��йӷ�ҹ�������к���ԡ����Ҫԡ") </script> ';
					if($connectby == "desktop")
					 echo "<script>window.location = 'info.php'</script>";
					else{
					session_destroy(); 					
					 echo "<script>window.location = 'index.php'</script>";
					 }
				}else{
					echo '<script type="text/javascript"> window.alert("�к���ӡ�úѹ�֡�����Ţͧ��ҹ���º�������� ��س��׹�ѹ�͡�ѡɳ�ؤ�šѺ�ҧ�ˡó� ����������ԡ��") </script> ';
					echo "<script>window.location = 'index.php'</script>";	
				}
			}else{
				echo '<script type="text/javascript"> window.alert("�Դ��ͼԴ��Ҵ !!! ��س���������ա����") </script> ';
				echo "<script>window.location = 'index.php'</script>";
			}	
		}else{
			echo '<script type="text/javascript"> window.alert("�Դ��ͼԴ��Ҵ !!! ��س���������ա����") </script> ';
			echo "<script>window.location = 'index.php'</script>";
		    exit();
		}
?>

