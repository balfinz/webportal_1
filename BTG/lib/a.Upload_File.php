<?php
session_start();
@header('Content-Type: text/html; charset=tis-620');
?>
	<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
    <link rel="stylesheet" href="../css/validationEngine.jquery.css" type="text/css">
	<link type="text/css" href="../css/ui-lightness/jquery-ui-1.8.10.custom.css" rel="stylesheet" />	
    <script src="../js/jquery-1.6.min.js" type="text/javascript"></script>
	<script src="../js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="tis-620"></script>
	<script src="../js/jquery.validationEngine.js" type="text/javascript" charset="tis-620"></script>
	<script type="text/javascript">
				jQuery(document).ready(function(){
						jQuery("#formID1").validationEngine('attach', {promptPosition : "topRight", autoPositionUpdate : true});
			});
     </script>

<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="right"><strong><font size="4" face="Tahoma">Upload File Ẻ�����</font></strong><br />
    <font color="#0000FF" size="2" face="Tahoma">Upload File</font></td>
  </tr>
  <tr>
    <td align="right"><hr color="#999999" size="1"/></td>
  </tr>
</table>
<form id="formID1" name="formID1" method="post" action="" enctype="multipart/form-data">
  <table width="600" border="0" align="center" cellpadding="6" cellspacing="2">
      <tr><td>
      <br><br>
      <left> <font size="2">upload ����º���Т�ͺѧ�Ѻ --> </font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="file" name="filUpload"></left><br></td>
       </tr>
        <tr><td>
      <left> <font size="2">upload ��ǹ���Ŵ�͡��� -->  </font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="file" name="filUpload1"></left><br></td>
       </tr>
       <tr><td>
      <left> <font size="2">upload �š�ô��Թ�ҹ -->  </font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="file" name="filUpload2"></left><br></td>
       </tr>
       <tr><td>
      <left> <font size="2">upload ��§ҹ��û�Ъ���˭����ѭ��Шӻ� -->  </font>&nbsp;&nbsp;<input type="file" name="filUpload3"></left><br></td>
       </tr>
       <tr><td>
      <left> <font size="2">upload �š�èѴ�ҵðҹ -->  </font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="file" name="filUpload4"></left></td>
       </tr>
       <tr><td>
      <left> <font size="2">upload ��ԡ�âͧ�ˡó� -->  </font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="file" name="filUpload5"></left><br><br></td>
       </tr>
       
    <tr>
      <td align="center"><input type="submit" name="button" id="button" value="upload" style="margin-right: 49px;width: 68px;"/>
      <input name="upload" type="hidden" id="upload" value="upload" /></td>
    </tr>
  </table>

<?php

if($_POST["upload"] != null){

$date_log = date("Y-m-d H:i:s");
 
if(move_uploaded_file($_FILES["filUpload"]["tmp_name"],"../d/myfile_order/".$_FILES["filUpload"]["name"]))
{
    $move1 = true; // ����º���Т�ͺѧ�Ѻ
}

if(move_uploaded_file($_FILES["filUpload1"]["tmp_name"],"../d/myfile_index/".$_FILES["filUpload1"]["name"])){
 
    $move2 = true; // ��ǹ���Ŵ�͡���
}

if(move_uploaded_file($_FILES["filUpload2"]["tmp_name"],"../d/myfile_overall/".$_FILES["filUpload2"]["name"])){
 
    $move3 = true; // �š�ô��Թ�ҹ
}

if(move_uploaded_file($_FILES["filUpload3"]["tmp_name"],"../d/myfile_consult/".$_FILES["filUpload3"]["name"])){
 
    $move4 = true; // ��§ҹ��û�Ъ���˭����ѭ��Шӻ�
}

if(move_uploaded_file($_FILES["filUpload4"]["tmp_name"],"../d/myfile_standard/".$_FILES["filUpload4"]["name"])){
 
    $move5 = true; // �š�èѴ�ҵðҹ
}

if(move_uploaded_file($_FILES["filUpload5"]["tmp_name"],"../d/myfile_servicecoop/".$_FILES["filUpload5"]["name"])){
 
    $move6 = true; // ��ԡ�âͧ�ˡó�
}

if($move1 == true){  // �ӡ���ԧ ����º���Т�ͺѧ�Ѻ ŧ db


    /* $namefile = $_FILES["filUpload"]["name"];

                //$id = get_single_value_sql("select count(id) as id from upload_file","id");
                
                $strSQL = " SELECT count(id) as id FROM upload_file where id = 1";
		$value = array('id');
		list($Num_Rows,$list_info) = get_value_many_sql($strSQL,$value);
		$id = $list_info[0][0];
                
                if($id > 0){
                    
                    
                    $status = delete_value_sql("upload_file","1");
                    
                    $table = "upload_file";
                    $condition = "(id,file_topic,filesname,u_date)";
                    $value  = "(1, 'From', '".$_FILES["filUpload"]["name"]."','".$date_log."')";
                    $status = insert_value_sql($table,$condition,$value);


                 // if($status){
                  //     echo '<script type="text/javascript"> window.alert("Upload Fole �����") </script> ';
                 //      echo "<script>window.location = 'administrator.php?menu=Upload_File'</script>";	
                 //      exit;
                //    } else {
                //        echo '<script type="text/javascript"> window.alert("�Դ��ͼԴ��Ҵ !!! �������ö upload file ��") </script> ';
		//	echo "<script>window.location = 'administrator.php?menu=Upload_File'</script>";
                //        exit;
                //    }

                 

                }else{
    


 $table = "upload_file";
                    $condition = "(id,file_topic,filesname,u_date)";
                    $value  = "(1, 'From', '".$_FILES["filUpload"]["name"]."','".$date_log."')";
                    $status = insert_value_sql($table,$condition,$value);


                 
}*/
    
    $strSQL = " SELECT ifnull(max(id_order),0) + 1 as max_id FROM upload_order";
		$value = array('max_id');
		list($Num_Rows,$list_info) = get_value_many_sql($strSQL,$value);
		     $max_id = $list_info[0][0]; 
                     
                    

                $table = "upload_order";
                    $condition = "(id_order,file_topic_order,filesname_order,u_date)";
                    $value  = "($max_id, '".$_FILES["filUpload"]["name"]."', '".$_FILES["filUpload"]["name"]."','".$date_log."')";
                    $status = insert_value_sql($table,$condition,$value);
                    


 /*if($status){
     
                       echo '<script type="text/javascript"> window.alert("Upload Fole �����") </script> ';
                       echo "<script>window.location = 'administrator.php?menu=Upload_File'</script>";	
                       exit;
                    } else {
                        echo '<script type="text/javascript"> window.alert("�Դ��ͼԴ��Ҵ !!! �������ö upload file ��") </script> ';
			echo "<script>window.location = 'administrator.php?menu=Upload_File'</script>";
                        exit;
                    }*/


} 


if($move2 == true){ // �ӡ���ԧ ��ǹ���Ŵ�͡��� ŧ db
    

 $strSQL1 = " SELECT ifnull(max(id),0) + 1 as max_id FROM upload_file";
		$value1 = array('max_id');
		list($Num_Rows1,$list_info1) = get_value_many_sql($strSQL1,$value1);
		     $max_id = $list_info1[0][0]; 

                $table = "upload_file";
                    $condition = "(id,file_topic,filesname,u_date)";
                    $value  = "($max_id, '".$_FILES["filUpload1"]["name"]."', '".$_FILES["filUpload1"]["name"]."','".$date_log."')";
                    $status1 = insert_value_sql($table,$condition,$value);
                    


 /*if($status1){
                       echo '<script type="text/javascript"> window.alert("Upload Fole �����") </script> ';
                       echo "<script>window.location = 'administrator.php?menu=Upload_File'</script>";	
                       exit;
                    } else {
                        echo '<script type="text/javascript"> window.alert("�Դ��ͼԴ��Ҵ !!! �������ö upload file ��") </script> ';
			echo "<script>window.location = 'administrator.php?menu=Upload_File'</script>";
                        exit;
                    }*/
                    
}

if($move3 == true){ // �ӡ���ԧ �š�ô��Թ�ҹ ŧ db
    
   

 $strSQL2 = " SELECT ifnull(max(id_overall),0) + 1 as max_id FROM upload_overall";
		$value2 = array('max_id');
		list($Num_Rows2,$list_info2) = get_value_many_sql($strSQL2,$value2);
		     $max_id = $list_info2[0][0]; 

                $table = "upload_overall";
                    $condition = "(id_overall,file_topic_overall,filesname_overall,u_date)";
                    $value  = "($max_id, '".$_FILES["filUpload2"]["name"]."', '".$_FILES["filUpload2"]["name"]."','".$date_log."')";
                    $status2 = insert_value_sql($table,$condition,$value);
                    


 /*if($status2){
                       echo '<script type="text/javascript"> window.alert("Upload Fole �����") </script> ';
                       echo "<script>window.location = 'administrator.php?menu=Upload_File'</script>";	
                       exit;
                    } else {
                        echo '<script type="text/javascript"> window.alert("�Դ��ͼԴ��Ҵ !!! �������ö upload file ��") </script> ';
			echo "<script>window.location = 'administrator.php?menu=Upload_File'</script>";
                        exit;
                    }*/
                    
}

if($move4 == true){ // �ӡ���ԧ ��§ҹ��û�Ъ���˭����ѭ��Шӻ� ŧ db
    
   

 $strSQL3 = " SELECT ifnull(max(id_consult),0) + 1 as max_id FROM upload_consult";
		$value3 = array('max_id');
		list($Num_Rows3,$list_info3) = get_value_many_sql($strSQL3,$value3);
		     $max_id = $list_info3[0][0]; 

                $table = "upload_consult";
                    $condition = "(id_consult,file_topic_consult,filesname_consult,u_date)";
                    $value  = "($max_id, '".$_FILES["filUpload3"]["name"]."', '".$_FILES["filUpload3"]["name"]."','".$date_log."')";
                    $status3 = insert_value_sql($table,$condition,$value);
                    


 /*if($status3){
                       echo '<script type="text/javascript"> window.alert("Upload Fole �����") </script> ';
                       echo "<script>window.location = 'administrator.php?menu=Upload_File'</script>";	
                       exit;
                    } else {
                        echo '<script type="text/javascript"> window.alert("�Դ��ͼԴ��Ҵ !!! �������ö upload file ��") </script> ';
			echo "<script>window.location = 'administrator.php?menu=Upload_File'</script>";
                        exit;
                    }*/
                    
}

if($move5 == true){ // �ӡ���ԧ �š�èѴ�ҵðҹ ŧ db
    
   

 $strSQL4 = " SELECT ifnull(max(id_standard),0) + 1 as max_id FROM upload_standard";
		$value4 = array('max_id');
		list($Num_Rows4,$list_info4) = get_value_many_sql($strSQL4,$value4);
		     $max_id = $list_info4[0][0]; 

                $table = "upload_standard";
                    $condition = "(id_standard,file_topic_standard,filesname_standard,u_date)";
                    $value  = "($max_id, '".$_FILES["filUpload4"]["name"]."', '".$_FILES["filUpload4"]["name"]."','".$date_log."')";
                    $status4 = insert_value_sql($table,$condition,$value);
                    


 /*if($status4){
                       echo '<script type="text/javascript"> window.alert("Upload Fole �����") </script> ';
                       echo "<script>window.location = 'administrator.php?menu=Upload_File'</script>";	
                       exit;
                    } else {
                        echo '<script type="text/javascript"> window.alert("�Դ��ͼԴ��Ҵ !!! �������ö upload file ��") </script> ';
			echo "<script>window.location = 'administrator.php?menu=Upload_File'</script>";
                        exit;
                    }*/
                    
}

if($move6 == true){ // �ӡ���ԧ ��ԡ�âͧ�ˡó� ŧ db
    
   

 $strSQL5 = " SELECT ifnull(max(id_servicecoop),0) + 1 as max_id FROM upload_servicecoop";
		$value5 = array('max_id');
		list($Num_Rows5,$list_info5) = get_value_many_sql($strSQL5,$value5);
		     $max_id = $list_info5[0][0]; 

                $table = "upload_servicecoop";
                    $condition = "(id_servicecoop,file_topic_servicecoop,filesname_servicecoop,u_date)";
                    $value  = "($max_id, '".$_FILES["filUpload5"]["name"]."', '".$_FILES["filUpload5"]["name"]."','".$date_log."')";
                    $status5 = insert_value_sql($table,$condition,$value);
                    


 /*if($status5){
                       echo '<script type="text/javascript"> window.alert("Upload Fole �����") </script> ';
                       echo "<script>window.location = 'administrator.php?menu=Upload_File'</script>";	
                       exit;
                    } else {
                        echo '<script type="text/javascript"> window.alert("�Դ��ͼԴ��Ҵ !!! �������ö upload file ��") </script> ';
			echo "<script>window.location = 'administrator.php?menu=Upload_File'</script>";
                        exit;
                    }*/
                    
}


if($status == true || $status1 == true || $status2 == true || $status3 == true || $status4 == true || $status5 == true)
    
{
    
    echo '<script type="text/javascript"> window.alert("Upload file �����") </script> ';
    echo "<script>window.location = 'administrator.php?menu=Upload_File'</script>";	
    exit;
    
}else{
    
     echo '<script type="text/javascript"> window.alert("�Դ��ͼԴ��Ҵ !!! �������ö upload file ��") </script> ';
     echo "<script>window.location = 'administrator.php?menu=Upload_File'</script>";
     exit;
    
}




    
}




?>