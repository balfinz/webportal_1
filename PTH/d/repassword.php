<?php
@session_start();
$member_no =$_SESSION['ses_repass']; 
require "../include/conf.conn.php" ;
require "../include/lib.MySql.php";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
<title>Untitled Document</title>
</head>

<body>
<?php 
if($_POST["button"] == ""){ 

//$rand_dom = mt_rand(0, 99999999);

?>



<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="180" align="center" bgcolor="#CCCCCC">
    <p>�к���ӡ�������������º��������� <font size="4" color="#FF0000"></font>    </p>
<form id="form1" name="form1" method="post" action="">
      <input type="submit" name="button" id="button" value="�׹�ѹ" />
</form> 
    </td>
  </tr>
</table>
<?php  }


	$date_log = date('Y-m-d H:i:s');
	$date_log = strtotime("+6 hour", strtotime($date_log));
	$date_log = date('Y-m-d H:i:s', $date_log); 
$member_no;
if($_POST["button"] == "�׹�ѹ"){

$rand_dom = mt_rand(0,99999999);
														// �� funtion set ��� 8 ��ѡ ��ҹ��¡��� 8 ���Ѵ 0 ŧ仢�ҧ˹��
                                                        $FormatNumber = 8;  
                                                        $InputFormat =   strlen($rand_dom);
                                                        if($InputFormat < $FormatNumber){
                                                           $insertFormat = $FormatNumber - $InputFormat ;
                                                            for($i=0;$i<$insertFormat;$i++){
                                                                 $rand_dom = "0".$rand_dom;
                                                            }
                                                        }
														
														//echo $rand_dom;
														
													$rand_dom_full = $rand_dom;

$npwd = md5($rand_dom_full);


	//$npwd = md5($rand_dom);
	$table="webmbmembmaster";
	$value="password = '".$npwd."',chang_flag = 1";
	$condition="where member_no = '$member_no'";
	$status = update_value_sql($table,$condition,$value);

		if($status){
                    
                    $action_page = 'Reset Password';
                                $table = "weblog_action";
                                $condition = "(action_do,action_desc,action_id,user,date_log)";
                                $value  = "('".$action_page."','Update','".$member_no."','".$_SESSION[ses_member_no]."',(select now()))";
                                $status = insert_value_sql($table,$condition,$value);
                    
			echo '<script type="text/javascript"> window.alert("�к���������������Ҫԡ�� ���ʼ�ҹ '.$rand_dom_full.' ��������仵�����ʼ�ҹ����") </script> ';
			echo "<script>window.close()</script>";
		}else{
			echo '<script type="text/javascript"> window.alert("�Դ��ͼԴ��Ҵ !!! ��س���������ա����") </script> ';
			echo "<script>window.close()";
		}
}
?>

</body>
</html>