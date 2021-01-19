<?php
@header('Content-Type: text/html; charset=tis-620');
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
						date_format(n_date,'%Y-%m-%d') as n_date,
                                                date_format(n_date,'%T') as t_date,
						who_post,
                                                FilesName
					FROM 
						news
					order by id desc
					LIMIT 0 , $show_news ";
	$value = array('id','n_topic','n_details','n_date','t_date','who_post','FilesName','');
	list($Num_Rows,$list_info) = get_value_many_sql($strSQL,$value);
	$j=0;
	for($i=0;$i<$Num_Rows;$i++){
		$id[$i]		 =	 $list_info[$i][$j++];
		$n_topic[$i]	 =	 $list_info[$i][$j++];
		$n_details[$i]	 =	 $list_info[$i][$j++];
		$n_date[$i]	 =	 $list_info[$i][$j++];
                $t_date[$i]	 =	 $list_info[$i][$j++];
		$who_post[$i] =	 $list_info[$i][$j++];
        $FilesName[$i] =	 $list_info[$i][$j++];
		$j=0;
	}
        
        /*$strSQL1 = " SELECT 
						                           filesname as  filesname
					                                   FROM 
						                           upload_file ";
                                                                        $value1 = array('filesname');
                                                                        list($Num_Rows1,$list_info1) = get_value_many_sql($strSQL1,$value1);
                                                                        $a=0;
                                                                        for($b=0;$b<$Num_Rows1;$b++){
                                                                                $filesname[$b]		 =	 $list_info[$b][$a++];
                                                                                $a=0;
                                                                        }*/
	
	
if($_POST["ref"] == "addnew"){	
    
    //if(move_uploaded_file($_FILES["filUpload"]["tmp_name"],"../lib/myfile/".$_FILES["filUpload"]["name"]) || move_uploaded_file($_FILES["filUploadimg1"]["tmp_name"],"../lib/myimg/".$_FILES["filUploadimg1"]["name"]) || move_uploaded_file($_FILES["filUploadimg2"]["tmp_name"],"../lib/myimg/".$_FILES["filUploadimg2"]["name"]))
    
    if(move_uploaded_file($_FILES["filUpload"]["tmp_name"],"../lib/myfile/".$_FILES["filUpload"]["name"])){
        
        $move1 = true;
    }
    
    if(move_uploaded_file($_FILES["filUploadimg1"]["tmp_name"],"../lib/myimg/".$_FILES["filUploadimg1"]["name"])){
        
        $move2 = true;
        
    }
    
    if(move_uploaded_file($_FILES["filUploadimg2"]["tmp_name"],"../lib/myimg/".$_FILES["filUploadimg2"]["name"])){
        
        $move3 = true;  
    }
    
    /*echo $move1; echo '</br>';
    echo $move2;echo '</br>';
    echo $move3;
    
    exit();*/
    
    if($move1 == true || $move1 == true || $move2 == true){
 
	$table = "news";
	$condition = "(n_topic,n_details,n_date,who_post,FilesName)";
	$value  = "('".$_POST["topic"]."','".addslashes($_POST["details"])."','".$date_log."','".$member_no."','".$_FILES["filUpload"]["name"]."')";
	$status = insert_value_sql($table,$condition,$value);
        
        $last_id = get_single_value_sql("select max(id) as id from news order by id desc limit 1 ","id");
        $seq_no = get_single_value_sql("select max(seq_no) as seq_no from news_img where id = $last_id ","seq_no");
        $seq_no = $seq_no + 1;
        $table = "news_img";
	$condition = "(id,n_topic,img_name,seq_no)";
	$value  = "($last_id,'".$_POST["topic"]."','".$_FILES["filUploadimg1"]["name"]."',$seq_no)";
        
        if($move2 == true){
        
	$status = insert_value_sql($table,$condition,$value);
        
        }
        
        $seq_no1 = get_single_value_sql("select max(seq_no) as seq_no from news_img where id = $last_id ","seq_no");
        $seq_no1 = $seq_no1 + 1;
        $table = "news_img";
	$condition = "(id,n_topic,img_name,seq_no)";
	$value  = "($last_id,'".$_POST["topic"]."','".$_FILES["filUploadimg2"]["name"]."',$seq_no1)";
        
         if($move3 == true){
        
	$status = insert_value_sql($table,$condition,$value);
        
         }
        
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
}else{
    
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
    
    
    //if(move_uploaded_file($_FILES["filUpload"]["tmp_name"],"../lib/myfile/".$_FILES["filUpload"]["name"]) || move_uploaded_file($_FILES["filUploadimg1"]["tmp_name"],"../lib/myimg/".$_FILES["filUploadimg1"]["name"]) || move_uploaded_file($_FILES["filUploadimg2"]["tmp_name"],"../lib/myimg/".$_FILES["filUploadimg2"]["name"]))
//{
    
    
    if(move_uploaded_file($_FILES["filUpload"]["tmp_name"],"../lib/myfile/".$_FILES["filUpload"]["name"])){
        
        $move1 = true;
    }
    
    if(move_uploaded_file($_FILES["filUploadimg1"]["tmp_name"],"../lib/myimg/".$_FILES["filUploadimg1"]["name"])){
        
        $move2 = true;
        
    }
    
    if(move_uploaded_file($_FILES["filUploadimg2"]["tmp_name"],"../lib/myimg/".$_FILES["filUploadimg2"]["name"])){
        
        $move3 = true;  
    }
    
    /*echo $move1; echo '</br>';
    echo $move2;echo '</br>';
    echo $move3;
    
    exit();*/
    
    if($move1 == true || $move1 == true || $move2 == true){
        
	$table = "news";
	$count_edit = get_single_value_sql("select count_edit as count_edit from news where id = '".$_POST["id"]."' ","count_edit");
	$count_edit = $count_edit+1;
	$condition = "where id = '".$_POST["id"]."' ";
	$value  = "n_topic = '".$_POST["n_topic"]."',
					n_details = '".addslashes($_POST["n_details"])."',
					n_date = '".$date_log."',
					count_edit = '".$count_edit."',
                                        FilesName = '".$_FILES["filUpload"]["name"]."',
					who_edit = '".$member_no."' ";
	if(update_value_sql($table,$condition,$value)){
		$action_page = $table;
		$table = "log_action";
		$condition = "(action_do,action_desc,action_id,user,ipconnect,date_log,connectby)";
		$value  = "('".$action_page."','update','".$_POST["id"]."','".$member_no."','".$ipconnect."','".$date_log."','".$connectby."')";
		$status = insert_value_sql($table,$condition,$value);
                
                    $last_id = $_POST["id"];
                    $seq_no = get_single_value_sql("select max(seq_no) as seq_no from news_img where id = $last_id ","seq_no");
                    $seq_no = $seq_no + 1;
                    $table = "news_img";
                    $condition = "(id,n_topic,img_name,seq_no)";
                    $value  = "($last_id,'".$_POST["n_topic"]."','".$_FILES["filUploadimg1"]["name"]."',$seq_no)";

                    if($move2 == true){

                    $status = insert_value_sql($table,$condition,$value);

                    }

                    $seq_no1 = get_single_value_sql("select max(seq_no) as seq_no from news_img where id = $last_id ","seq_no");
                    $seq_no1 = $seq_no1 + 1;
                    $table = "news_img";
                    $condition = "(id,n_topic,img_name,seq_no)";
                    $value  = "($last_id,'".$_POST["n_topic"]."','".$_FILES["filUploadimg2"]["name"]."',$seq_no1)";

                     if($move3 == true){

                    $status = insert_value_sql($table,$condition,$value);

                     }
                
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
}else{
    
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
}

?>

