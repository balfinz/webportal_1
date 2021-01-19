<?php
//header('Content-Type: text/html; charset=tis-620');
?>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
<?php

if($connectby == "mobile"){
	$show_news = 3;
}else{
	$show_news = 10;
}
	$strSQL = " SELECT 
						id as  id,
						n_topic as n_topic,
						n_details as n_details,
						n_date as n_date,
						who_post
					FROM 
						news
					order by id desc
					LIMIT 0 , $show_news ";
	$value = array('id','n_topic','n_details','n_date','who_post');
	list($Num_Rows,$list_info) = get_value_many_sql($strSQL,$value);
	$j=0;
	for($i=0;$i<$Num_Rows;$i++){
		$id[$i]		 =	 $list_info[$i][$j++];
		$n_topic[$i]	 =	 $list_info[$i][$j++];
		$n_details[$i]	 =	 $list_info[$i][$j++];
		$n_date[$i]	 =	 $list_info[$i][$j++];
		$who_post[$i] =	 $list_info[$i][$j++];
		$j=0;
	}
	
	
if($_POST["ref"] == "addnew"){	
	$table = "news";
	$condition = "(n_topic,n_details,n_date,who_post)";
	$value  = "('".$_POST["topic"]."','".addslashes($_POST["details"])."','".$date_log."','".$member_no."')";
	$status = insert_value_sql($table,$condition,$value);
	if($status){
		$action_page = $table;
		$action_id = get_single_value_sql("select ID AS ID from news order by id desc limit 1 ","ID");
		$table = "log_action";
		$condition = "(action_do,action_desc,action_id,user,ipconnect,date_log,connectby)";
		$value  = "('".$action_page."','Add','".$action_id."','".$member_no."','".$ipconnect."','".$date_log."','".$connectby."')";
		$status = insert_value_sql($table,$condition,$value);
		if($status){
			echo '<script type="text/javascript"> window.alert("�к���ѹ�֡��С������ʴ�˹�Һ�ԡ����Ҫԡ���º��������") </script> ';
			echo "<script>window.location = '../d/administrator.php?menu=News_editer'</script>";
			exit();
		}else{
			echo '<script type="text/javascript"> window.alert("�Դ��ͼԴ��Ҵ !!! ��س���������ա����") </script> ';
			echo "<script>window.location = '../d/administrator.php?menu=News_editer'</script>";
			exit();
		}			
	}else{
		echo '<script type="text/javascript"> window.alert("�������ö�ѹ�֡���سҵԴ��� �����������������") </script> ';
		echo "<script>window.location = '../d/administrator.php?menu=News_editer'</script>";
		exit();
	}
}


if($_POST["actions"] == "Delete"){
	$status = delete_value_sql($_POST["table"],$_POST["id"]);
	if($status){
		$action_page = $_POST["table"];
		$action_id = $_POST["id"];
		$table = "log_action";
		$condition = "(action_do,action_desc,action_id,user,ipconnect,date_log,connectby)";
		$value  = "('".$action_page."','Delete','".$action_id."','".$member_no."','".$ipconnect."','".$date_log."','".$connectby."')";
		$status = insert_value_sql($table,$condition,$value);
		if($status){
			echo '<script type="text/javascript"> window.alert("�к���ź����������") </script> ';
			echo "<script>window.location = '../d/administrator.php?menu=News_editer'</script>";
		}else{
			echo '<script type="text/javascript"> window.alert("�Դ��ͼԴ��Ҵ !!! �������ö�ѹ�֡����ѵ��� ��سҵԴ�������������") </script> ';
			echo "<script>window.location = '../d/administrator.php?menu=News_editer'</script>";
		}
	}else{
		echo '<script type="text/javascript"> window.alert("�Դ��ͼԴ��Ҵ !!! �������öź���������ô�ͧ�ա����") </script> ';
		echo "<script>window.location = '../d/administrator.php?menu=News_editer'</script>";
	}
}elseif($_POST["actions"] == "Update"){
	$table = "news";
	$count_edit = get_single_value_sql("select count_edit as count_edit from news where id = '".$_POST["id"]."' ","count_edit");
	$count_edit = $count_edit+1;
	$condition = "where id = '".$_POST["id"]."' ";
	$value  = "n_topic = '".$_POST["n_topic"]."',
					n_details = '".addslashes($_POST["n_details"])."',
					n_date = '".$date_log."',
					count_edit = '".$count_edit."',
					who_edit = '".$member_no."' ";
	if(update_value_sql($table,$condition,$value)){
		$action_page = $table;
		$table = "log_action";
		$condition = "(action_do,action_desc,action_id,user,ipconnect,date_log,connectby)";
		$value  = "('".$action_page."','update','".$_POST["id"]."','".$member_no."','".$ipconnect."','".$date_log."','".$connectby."')";
		$status = insert_value_sql($table,$condition,$value);
		if($status){
			echo '<script type="text/javascript"> window.alert("�к�������¹�ŧ����������ó�����") </script> ';
			echo "<script>window.location = '../d/administrator.php?menu=News_editer'</script>";
			exit();
		}else{
			echo '<script type="text/javascript"> window.alert("�Դ��ͼԴ��Ҵ !!! ��س���������ա����") </script> ';
			echo "<script>window.location = '../d/administrator.php?menu=News_editer'</script>";
			exit();
		}			
	}else{
		echo '<script type="text/javascript"> window.alert("�������ö�ѹ�֡���سҵԴ��� �����������������") </script> ';
		echo "<script>window.location = '../d/administrator.php?menu=News_editer'</script>";
		exit();
	}		
}

?>

