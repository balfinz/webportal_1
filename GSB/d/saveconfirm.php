<?PHP
header('Content-Type: text/html; charset=tis-620');
if($_POST){
	$member_no = $_POST["mem_no"];
	$member_name = $_POST["mem_name"];
	$cf_status = $_POST["cfstatus"];
	$remark = $_POST["remark"];
	$conf_period = $_POST["conf_period"];

	if($cf_status == "1"){
		$remark = "";
	}

	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
		$ip = $_SERVER['REMOTE_ADDR'];
	}

	//������������Ͱҹ������
	$dbhost="localhost";
	$dbuser = "root";
	$dbpass = "WebServer";
	$conn=mysql_connect($dbhost,$dbuser,$dbpass);
	mysql_query("SET character_set_results=tis620");
    	mysql_query("SET character_set_client=tis620");
   	mysql_query("SET character_set_connection=tis620");
   	$objDB = mysql_select_db("webportal");

	if (!$conn) {
		echo '<script type="text/javascript"> window.alert("�������ö�������͡Ѻ �ҹ������ Mysql �� ��س��ͧ���������ѧ") </script> ';	
	}

		$sql = "INSERT INTO confirmbal(member_no,confirm_period,entry_date,confirm_status,remark,ip,member_name) 
				VALUES ('$member_no','$conf_period',NOW(),'$cf_status' ,'$remark','$ip','$member_name');";
				 
	if(mysql_query($sql)){
?>
	<script type="text/javascript">alert("����¡���׹�ѹ�ʹ����������º����");</script>
<?PHP
	}else{
?>
	<script type="text/javascript">alert("�������ö����¡���׹�ѹ�ʹ���������㹢�й�� �ô�ͧ�ա����������ѧ");</script>
<?PHP
	}
}else{
	echo "No data to post";
}

mysql_close($conn);
?>