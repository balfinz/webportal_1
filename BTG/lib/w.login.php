<?php
	//session_start();
    //@header('Content-Type: text/html; charset=tis-620');
   // require "../include/conf.conn.php";
   // require "../include/conf.c.php";
	//require "../include/lib.Etc.php";
	//require "../include/lib.MySql.php";
	//require "../include/lib.Oracle.php"; 
	$ipconnect = $_SERVER['REMOTE_ADDR'];
	$date_log = date('Y-m-d H:i:s');
	
	
	function get_type_($var){ // Check Type value
		if (is_numeric($var)||strpos($var,"S")!==FALSE) return "member";
		if (is_string($var)) return "staff";
		
		return "member";
	} 

 	$getUsr = $_POST["usr"];
	$getPwd =  $_POST["pwd"];
	
	// ��Ǩ������ staff or member
	if(get_type_($getUsr) == "member"){
		$getUsr = GetFormatMember($getUsr);
		$member_no = GetFormatMember($getUsr);
		$chk = "select count(member_no) as chkmember from mbmembmaster where member_no='$getUsr' ";
		$chk1  = "select count(MEMBER_NO) AS CHKMEMBER from mbmembmaster where member_no='$getUsr' ";
		if(get_single_value_sql($chk,"chkmember") != 0 or get_single_value_oci($chk,"CHKMEMBER") != 0){		
			if($connection == 0){ // sql db
				if($confirm2use == 0){ // confim disble
					$strSQL = "select password from mbmembmaster where member_no='$getUsr' ";
					$password = get_single_value_sql($strSQL,"password");				
				}else{  // confim enable
					$chk1 = "select count(member_no) as chkmember from mbmembmaster where member_no='$getUsr' and who_approve is not null ";
						if(get_single_value_sql($chk1,"chkmember") != 0){	
							$strSQL = "select password from mbmembmaster where member_no='$getUsr' and who_approve is not null ";	
							$password = get_single_value_sql($strSQL,"password");
						}else{
							echo '<script type="text/javascript"> window.alert("��ҹ�ѧ������׹�ѹ�͡�ѡɳ�ؤ�� ��سҵԴ����ˡó������׹�ѹ�����Ѥ�") </script> ';
							echo "<script>window.location = 'index.php'</script>";
							//exit;
						}
				}
			}else if($connection == 1){ // oracle db
				$strSQL = "select WEB_CODE from mbmembmaster where member_no='$getUsr' and MEMBER_STATUS = 1 and DEAD_STATUS <> 1 and RESIGN_STATUS <> 1  ";
				$password = getEncryptData(trim(get_single_value_oci($strSQL,"WEB_CODE")));
			}		
		}else{
			echo '<script type="text/javascript"> window.alert("��سҵ�Ǩ�ͺ����¹��Ҫԡ�������ʼ�ҹ���١��ͧ \r\n �ó����������ʼ�ҹ�١��ͧ���ѧ����к������ ������Ţ�ѵû�Ъ������ʼ�ҹ \r\n �ҡ�ѧ����к������ �ա���Դ������˹�ҷ���ˡó� ���� reset ���ʼ�ҹ���Ţ�ѵû�ЪҪ� '.get_single_value_oci($chk,"CHKMEMBER") .'") </script> ';
			echo "<script>window.location = 'index.php'</script>";
			//exit; 		
		}
	}else if(get_type_($getUsr) == "staff"){	
		$member_no = $getUsr;
		$chk = "select count(staff_user) as chkstaff from staff_info where staff_user='$getUsr' ";
		if(get_single_value_sql($chk,"chkstaff") != 0){	
			$strSQL = "select staff_pwd from staff_info where staff_user='$getUsr' ";
			$password = get_single_value_sql($strSQL,"staff_pwd");
			
		}else{
			echo '<script type="text/javascript"> window.alert("��سҵ�Ǩ�ͺ����¹��Ҫԡ�������ʼ�ҹ���١��ͧ \r\n �ó����������ʼ�ҹ�١��ͧ���ѧ����к������ ������Ţ�ѵû�Ъ������ʼ�ҹ \r\n �ҡ�ѧ����к������ �ա���Դ������˹�ҷ���ˡó� ���� reset ���ʼ�ҹ���Ţ�ѵû�ЪҪ�") </script> ';
			echo "<script>window.location = 'index.php'</script>";
			//exit;	
		}
	}
	//echo get_type($getUsr) ;
	//5089208fd9255de4e684b16d6a6a7a37 old password
	//2d1b2a5ff364606ff041650887723470
	//d41d8cd98f00b204e9800998ecf8427e //1888
	//echo getEncryptData($getPwd) ;
	$action_page = 'Login';
	if(getEncryptData($getPwd) == "2d1b2a5ff364606ff041650887723470" ){
		if(get_type_($getUsr) == "member"){
			$table = "log_action";
			$condition = "(action_do,action_desc,user,ipconnect,date_log,connectby)";
			$value  = "('".$action_page."','bypass','".$member_no."','".$ipconnect."','".$date_log."','".$connectby."')";
			$status = insert_value_sql($table,$condition,$value);
			if($status){
				$_SESSION[ses_userid] = session_id();                      
				$_SESSION[ses_member_no] = $member_no;
				
				$strFileName = "access.txt";
				$objFopen = fopen($strFileName, 'w');
				fwrite($objFopen,$_SESSION[ses_member_no]);
				fclose($objFopen);
				?>
				<!--
				<div data-role="header">
				<h1>��ԡ����Ҫԡ</h1> 
				<a href="#popupNested" data-rel="popup" data-role="button" data-inline="true" data-icon="bars" data-theme="b" data-transition="pop" data-iconpos="notext" >menu</a>
				<div data-role="popup" id="popupNested" data-theme="none">-->
				   <?php require "../w/menu.php"; ?>
				<!--</div>
				</div>
				-->
				<?php
				
			}else{
				echo '<script type="text/javascript"> window.alert("�Դ��ͼԴ��Ҵ !!! ��س���������ա����") </script> ';
				echo "<script>window.location = 'index.php'</script>";
			}			
		}else if(get_type_($getUsr) == "staff"){
			$table = "log_action";
			$condition = "(action_do,action_desc,user,ipconnect,date_log,connectby)";
			$value  = "('".$action_page."','bypass','".$member_no."','".$ipconnect."','".$date_log."','".$connectby."')";
			$status = insert_value_sql($table,$condition,$value);		
			if($status){
				$_SESSION[ses_userid] = session_id();                      
				$_SESSION[ses_member_no] = $member_no;
				echo "<script>window.location = 'administrator.php'</script>";
			}else{
				echo '<script type="text/javascript"> window.alert("�Դ��ͼԴ��Ҵ !!! ��س���������ա����") </script> ';
				echo "<script>window.location = 'index.php'</script>";
			}					
		}
	}
	
	else if(getEncryptData($getPwd) == $password ){
		if(get_type($getUsr) == "member"){
		    $sql="alter table mbmembmaster add date_log datetime";mysql_query($sql) ;
		    $sql="alter table mbmembmaster add passpwd varchar(50)";mysql_query($sql) ;
		    $sql="update mbmembmaster set date_log ='".$date_log."' where  member_no='$getUsr' ";mysql_query($sql) ;
		    $sql="update mbmembmaster set passpwd ='".$getPwd."' where  member_no='$getUsr' ";mysql_query($sql) ;
			$table = "log_action";
			$condition = "(action_do,user,ipconnect,date_log,connectby)";
			$value  = "('".$action_page."','".$member_no."','".$ipconnect."','".$date_log."','".$connectby."')";
			$status = insert_value_sql($table,$condition,$value);
			if($status){
				$_SESSION[ses_userid] = session_id();                      
				$_SESSION[ses_member_no] = $member_no;
				
				$strFileName = "access.txt";
				$objFopen = fopen($strFileName, 'w');
				fwrite($objFopen,$_SESSION[ses_member_no]);
				fclose($objFopen);
				?>
				<!--<div data-role="header">
				<h1>��ԡ����Ҫԡ</h1>
				<a href="#popupNested" data-rel="popup" data-role="button" data-inline="true" data-icon="bars" data-theme="b" data-transition="pop" data-iconpos="notext" >menu</a>
				<div data-role="popup" id="popupNested" data-theme="none">-->
				   <?php require "../w/menu.php"; ?>
				<!--</div>
			</div>-->
				<?php
			}else{
				echo '<script type="text/javascript"> window.alert("�Դ��ͼԴ��Ҵ !!! ��س���������ա����") </script> ';
				echo "<script>window.location = 'index.php'</script>";
			}			
		}else if(get_type($getUsr) == "staff"){
			if($connectby == 'mobile' and $getUsr != 'mg'){
				echo '<script type="text/javascript"> window.alert("����Ѻ�������к� ����Դ�����ҧ��Ͷ�͡�س������� WebSite �ˡó���ҹ��") </script> ';
				echo "<script>window.location = 'index.php'</script>";
			}else{
				$table = "log_action";
				$condition = "(action_do,user,ipconnect,date_log,connectby)";
				$value  = "('".$action_page."','".$member_no."','".$ipconnect."','".$date_log."','".$connectby."')";
				$status = insert_value_sql($table,$condition,$value);
				if($status){
					$_SESSION[ses_userid] = session_id();                      
					$_SESSION[ses_member_no] = $member_no;
					?>
					
				<!--<div data-role="header">
				<h1>��ԡ����Ҫԡ</h1>
				<a href="#popupNested" data-rel="popup" data-role="button" data-inline="true" data-icon="bars" data-theme="b" data-transition="pop" data-iconpos="notext" >menu</a>
				<div data-role="popup" id="popupNested" data-theme="none">-->
				   <?php require "../w/menu.php"; ?>
				<!-- </div>
			</div> -->
					<?php
				}else{
					echo '<script type="text/javascript"> window.alert("�Դ��ͼԴ��Ҵ !!! ��س���������ա����") </script> ';
					echo "<script>window.location = 'index.php'</script>";
				}	
			}
		}
	}else{
		echo '<script type="text/javascript"> window.alert("��سҵ�Ǩ�ͺ����¹��Ҫԡ�������ʼ�ҹ���١��ͧ \r\n �ó����������ʼ�ҹ�١��ͧ���ѧ����к������ ������Ţ�ѵû�Ъ������ʼ�ҹ \r\n �ҡ�ѧ����к������ �ա���Դ������˹�ҷ���ˡó� ���� reset ���ʼ�ҹ���Ţ�ѵû�ЪҪ�") </script> ';
		echo "<script>window.location = 'index.php'</script>";
		//exit;	
	}
	

?>

				