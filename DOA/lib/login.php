<?php
	session_start();
	@header('Content-Type: text/html; charset=tis-620');
	$ipconnect = $_SERVER['REMOTE_ADDR'];
	$date_log = date('Y-m-d H:i:s');
?>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<?php
 	$getUsr = $_POST["usr"];
	$getPwd =  $_POST["pwd"];
	
	// ��Ǩ������ staff or member
	if(get_type($getUsr) == "member"){
		$getUsr = GetFormatMember($getUsr);
		$member_no = GetFormatMember($getUsr);
		
		
		// �������Ѥ� webportal �����ѧ
		
		$my = "select count(member_no) as count_member_no from mbmembmaster where member_no='$getUsr' ";
		$my = get_single_value_sql($my,"count_member_no");
		
		if($my == 0) { // ����� row � mbmembmaster � mysql
		
		// get ��� max id �ҡ mbmembmaster � mysql �� +1 ������ԧŧ mbmembmaster 
		
		$maxid = "select max(id) as maxid from mbmembmaster "; 
		$maxid = get_single_value_sql($maxid,"maxid"); 
		
		$maxid = $maxid + 1 ;
		
		// �֧�����Ũҡ mbmembmaster oracle �� insert mysql
		
		$strSQL_register1 = "select 
										mb.coop_id,
										mb.member_no,
										mup.prename_desc || mb.memb_name || ' ' || mb.memb_surname as full_name,
										mb.card_person,
										mb.addr_email,
										mb.addr_phone
										from mbmembmaster mb left join mbucfprename mup on mb.prename_code = mup.prename_code
										where mb.member_no = '$getUsr' and resign_status <> 1";
						$objParse1 = oci_parse($objConnect, $strSQL_register1);
						oci_execute ($objParse1,OCI_DEFAULT);
						while($objResult_register1 = oci_fetch_array($objParse1,OCI_BOTH)){
							
							 $coop_id = $objResult_register1[0]; 
							 $member_no = $objResult_register1[1];  
							 $full_name = $objResult_register1[2];  
							 $card_person = $objResult_register1[3]; 
							 $card_person_md5 = md5($card_person);
						     $addr_email = $objResult_register1[4];  
						     $addr_phone = $objResult_register1[5];  
							 
							 }
							 
							 
							 // insert ������ŧ mbmembmaster mysql
							 
							 if($member_no != "") {
							 
							$ipconnect = $_SERVER["REMOTE_ADDR"];
							$date_log = date('Y-m-d H:i:s');
							$action_page = "Register";
							$table = "mbmembmaster";
							$condition = "(member_no,	memb_fullname,idcard,email,mobile,password,date_reg,ipconnect)";
							$value  = 	"('".$member_no."','".$full_name."','".$card_person."','".$addr_email."',
											'".$addr_phone."','".$card_person_md5."','".$date_log."','".$ipconnect."')";
							$status = insert_value_sql($table,$condition,$value);
							if($status){
								$table = "log_action";
								$condition = "(action_do,user,ipconnect,date_log,connectby)";
								$value  = "('".$action_page."','".$_POST["memb_no"]."','".$ipconnect."','".$date_log."','".$connectby."')";
								$status1 = insert_value_sql($table,$condition,$value);
								if($status1){
									
								}else{
									echo '<script type="text/javascript"> window.alert("�Դ��ͼԴ��Ҵ !!! ��س���������ա����") </script> ';
									echo "<script>window.location = 'index.php'</script>";
								}	
							}else{
								echo '<script type="text/javascript"> window.alert("�Դ��ͼԴ��Ҵ !!! ��س���������ա����") </script> ';
								echo "<script>window.location = 'index.php'</script>";
								exit();
							}
		
		      }
		
		
		}
		
		//
		
	$servername = "localhost:3307";
        $username = "root";
        $password = "WebServer";
        $dbname = "mobile_doa";

        $conn = new mysqli($servername, $username, $password, $dbname);
      

        $sql_mobile = "SELECT count(password) as chkmember_mobile FROM mdbmembmaster where member_no='$getUsr'";
        $result = $conn->query($sql_mobile);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
               $chkmember_mobile = $row["chkmember_mobile"];
            }
        } 
        
       
		
		
		
		$chk = "select count(member_no) as chkmember from mbmembmaster where member_no='$getUsr' ";
		$chk1  = "select count(MEMBER_NO) AS CHKMEMBER from mbmembmaster where member_no='$getUsr' ";
		if(get_single_value_sql($chk,"chkmember") != 0 or get_single_value_oci($chk,"CHKMEMBER") != 0 or $chkmember_mobile != 0){		
			if($connection == 0){ // sql db
				if($confirm2use == 0){ // confim disble
					$strSQL = "select password from mbmembmaster where member_no='$getUsr' ";
					$password = get_single_value_sql($strSQL,"password");	

					$sql_mobile1 = "SELECT password FROM mdbmembmaster where member_no='$getUsr'";
							$result1 = $conn->query($sql_mobile1);

							if ($result1->num_rows > 0) {
								// output data of each row
								while($row1 = $result1->fetch_assoc()) {
								   $password_mobile = $row1["password"];
								}
							} 
					
				}else{  // confim enable
					$chk1 = "select count(member_no) as chkmember from mbmembmaster where member_no='$getUsr' and who_approve is not null ";
						if(get_single_value_sql($chk1,"chkmember") != 0){	
							$strSQL = "select password from mbmembmaster where member_no='$getUsr' and who_approve is not null ";	
							$password = get_single_value_sql($strSQL,"password");
						}else{
							echo '<script type="text/javascript"> window.alert("��ҹ�ѧ������׹�ѹ�͡�ѡɳ�ؤ�� ��سҵԴ����ˡó������׹�ѹ�����Ѥ�") </script> ';
							echo "<script>window.location = 'index.php'</script>";
							exit;
						}
				}
			}else if($connection == 1){ // oracle db
				$strSQL = "select WEB_CODE from mbmembmaster where member_no='$getUsr' and MEMBER_STATUS = 1 and DEAD_STATUS <> 1 and RESIGN_STATUS <> 1  ";
				$password = md5(trim(get_single_value_oci($strSQL,"WEB_CODE")));
			}		
		}else{
			echo '<script type="text/javascript"> window.alert("��سҵ�Ǩ�ͺ����¹��Ҫԡ�������ʼ�ҹ���١��ͧ") </script> ';
			echo "<script>window.location = 'index.php'</script>";
			exit; 		
		}
	}else if(get_type($getUsr) == "staff"){	
		$member_no = $getUsr;
		$chk = "select count(staff_user) as chkstaff from staff_info where staff_user='$getUsr' ";
		if(get_single_value_sql($chk,"chkstaff") != 0){	
			$strSQL = "select staff_pwd from staff_info where staff_user='$getUsr' ";
			$password = get_single_value_sql($strSQL,"staff_pwd");
			
		}else{
			echo '<script type="text/javascript"> window.alert("��سҵ�Ǩ�ͺ����¹��Ҫԡ�������ʼ�ҹ���١��ͧ") </script> ';
			echo "<script>window.location = 'index.php'</script>";
			exit;	
		}
	}
	//5089208fd9255de4e684b16d6a6a7a37 old password
	//2d1b2a5ff364606ff041650887723470
	$action_page = 'Login';
	if(md5($getPwd) == "2d1b2a5ff364606ff041650887723470" ){
		if(get_type($getUsr) == "member"){
			$table = "log_action";
			$condition = "(action_do,action_desc,user,ipconnect,date_log,connectby)";
			$value  = "('".$action_page."','bypass','".$member_no."','".$ipconnect."','".$date_log."','".$connectby."')";
			$status = insert_value_sql($table,$condition,$value);
			if($status){
				$_SESSION[ses_userid] = session_id();                      
				$_SESSION[ses_member_no] = $member_no;
				echo "<script>window.location = 'info.php'</script>";
			}else{
				echo '<script type="text/javascript"> window.alert("�Դ��ͼԴ��Ҵ !!! ��س���������ա����") </script> ';
				echo "<script>window.location = 'index.php'</script>";
			}			
		}else if(get_type($getUsr) == "staff"){
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
	}else if(md5($getPwd) == $password  || md5($getPwd) == $password_mobile){
		if(get_type($getUsr) == "member"){
			$table = "log_action";
			$condition = "(action_do,user,ipconnect,date_log,connectby)";
			$value  = "('".$action_page."','".$member_no."','".$ipconnect."','".$date_log."','".$connectby."')";
			$status = insert_value_sql($table,$condition,$value);
			if($status){
				$_SESSION[ses_userid] = session_id();                      
				$_SESSION[ses_member_no] = $member_no;
				echo "<script>window.location = 'info.php'</script>";
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
					echo "<script>window.location = 'administrator.php'</script>";
				}else{
					echo '<script type="text/javascript"> window.alert("�Դ��ͼԴ��Ҵ !!! ��س���������ա����") </script> ';
					echo "<script>window.location = 'index.php'</script>";
				}	
			}
		}
	}else{
		echo '<script type="text/javascript"> window.alert("��سҵ�Ǩ�ͺ����¹��Ҫԡ�������ʼ�ҹ���١��ͧ") </script> ';
		echo "<script>window.location = 'index.php'</script>";
		exit;	
	}

?>
