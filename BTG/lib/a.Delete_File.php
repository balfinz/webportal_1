<?php
@header('Content-Type: text/html; charset=tis-620');
?>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />

<style>
    
    div.ex1 {
    background-color: white;
    width: auto;
    height: 390;
    overflow: scroll;
}
    
</style>

<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="right"><strong><font size="4" face="Tahoma">ź��� Upload</font></strong><br />
    <font color="#0000FF" size="2" face="Tahoma">Delete File</font></td>
  </tr>
  <tr>
    <td align="right"><hr color="#999999" size="1"/></td>
  </tr>
</table>
<center>
<form id="form1" name="form1" method="post" action="">
            <select name="slyear1" id="slyear1" onchange= "this.form.submit()" style="width: 129px;height: 24px;">

          <option  value=""> - ���͡��Ǣ�� -</option> 
          <option  value="��ǹ���Ŵ�͡���">  ��ǹ���Ŵ�͡��� </option>
          <option  value="����º���Т�ͺѧ�Ѻ">  ����º���Т�ͺѧ�Ѻ </option>
          <option  value="�š�ô��Թ�ҹ">  �š�ô��Թ�ҹ </option>
          <option  value="��§ҹ��û�Ъ���˭����ѭ��Шӻ�">  ��§ҹ��û�Ъ���˭����ѭ��Шӻ� </option>
          <option  value="�š�èѴ�ҵðҹ">  �š�èѴ�ҵðҹ </option>
          <option  value="��ԡ�âͧ�ˡó�">  ��ԡ�âͧ�ˡó� </option>
         </select>
            </form> </center>
 
<table width="95%" border="0" align="center" cellpadding="3" cellspacing="6">
  <tr>
    <td align="center"><table width="65%" border="0" cellspacing="0" cellpadding="0">
<?php if($_REQUEST["slyear1"] != ""){
      '����຺���͡';
      $show = $_REQUEST["slyear1"];
     
     if($show == "��ǹ���Ŵ�͡���"){
         
         $upload_type = "1";
         
     }else if($show == "����º���Т�ͺѧ�Ѻ"){
         
        $upload_type = "2"; 
         
     }else if($show == "�š�ô��Թ�ҹ"){
         
        $upload_type = "3"; 
         
     }else if($show == "��§ҹ��û�Ъ���˭����ѭ��Шӻ�"){
         
        $upload_type = "4"; 
         
     }else if($show == "�š�èѴ�ҵðҹ"){
         
        $upload_type = "5"; 
         
     }else if($show == "��ԡ�âͧ�ˡó�"){
         
        $upload_type = "6"; 
         
     }else{
         
       $upload_type = "0";  
         
     }
     

} else {

    $upload_type = "0";    
    
} ?>
    
      <tr>
        <td bgcolor="#999999">
            
         
         <div class="ex1">   
    <table width="100%" border="1" align="center" cellpadding="3" cellspacing="1">
        
         
        
        
   <?php

   if($upload_type == "1"){ // ��ǹ���Ŵ�͡���
   
			$strSQL="select 
                                    id,
                                    file_topic,
                                    (select count(id) as seq_no from upload_file) as seq_no
                                    from upload_file  
                                    order by id";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$i=0;
			while($objResult = mysql_fetch_array($objQuery)){
				$id[$i] = $objResult['id'];
				$file_topic[$i] = $objResult['file_topic'];
                                $seq_no[$i] = $objResult['seq_no'];
				$i++;
			}
                        
   }else if($upload_type == "2"){ // ����º���Т�ͺѧ�Ѻ
       
       
       $strSQL="select id_order,file_topic_order, (select count(id_order) as seq_no from upload_order) as seq_no from upload_order order by id_order";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$i=0;
			while($objResult = mysql_fetch_array($objQuery)){
				$id[$i] = $objResult['id_order'];
				$file_topic[$i] = $objResult['file_topic_order'];
                                $seq_no[$i] = $objResult['seq_no'];
				$i++;
			}
       
   }else if($upload_type == "3"){ // �š�ô��Թ�ҹ
       
       
       $strSQL="select id_overall,file_topic_overall, (select count(id_overall) as seq_no from upload_overall) as seq_no from upload_overall order by id_overall";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$i=0;
			while($objResult = mysql_fetch_array($objQuery)){
				$id[$i] = $objResult['id_overall'];
				$file_topic[$i] = $objResult['file_topic_overall'];
                                $seq_no[$i] = $objResult['seq_no'];
				$i++;
			}
       
   }else if($upload_type == "4"){ // ��§ҹ��û�Ъ���˭����ѭ��Шӻ�
       
       
       $strSQL="select id_consult,file_topic_consult, (select count(id_consult) as seq_no from upload_consult) as seq_no from upload_consult order by id_consult";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$i=0;
			while($objResult = mysql_fetch_array($objQuery)){
				$id[$i] = $objResult['id_consult'];
				$file_topic[$i] = $objResult['file_topic_consult'];
                                $seq_no[$i] = $objResult['seq_no'];
				$i++;
			}
       
   }else if($upload_type == "5"){ // �š�èѴ�ҵðҹ
       
       
       $strSQL="select id_standard,file_topic_standard, (select count(id_standard) as seq_no from upload_standard) as seq_no from upload_standard order by id_standard";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$i=0;
			while($objResult = mysql_fetch_array($objQuery)){
				$id[$i] = $objResult['id_standard'];
				$file_topic[$i] = $objResult['file_topic_standard'];
                                $seq_no[$i] = $objResult['seq_no'];
				$i++;
			}
       
   }else if($upload_type == "6"){ // ��ԡ�âͧ�ˡó�
       
       
       $strSQL="select id_servicecoop,file_topic_servicecoop, (select count(id_servicecoop) as seq_no from upload_servicecoop) as seq_no from upload_servicecoop order by id_servicecoop";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$i=0;
			while($objResult = mysql_fetch_array($objQuery)){
				$id[$i] = $objResult['id_servicecoop'];
				$file_topic[$i] = $objResult['file_topic_servicecoop'];
                                $seq_no[$i] = $objResult['seq_no'];
				$i++;
			}
       
   }
			?>

      <tr>
        <td width="15%" align="center" bgcolor="#F5DA81"><strong>�Ţ ID</strong></td>
        <td width="70%" align="center" bgcolor="#F5DA81"><strong>���������Ǣ�� <?php echo "(".$show.")"; ?></strong></td>
        <td width="15%" align="center" bgcolor="#F5DA81"><strong>ź���</strong></td>
        </tr>
                 <?php
			for($i=0;$i<count($seq_no);$i++){
			?>
      <tr>
        <td align="center" bgcolor="#FFFFFF"><?php echo $id[$i]; ?> </td>
        <td align="left" bgcolor="#FFFFFF"><?php echo $file_topic[$i]; ?> </td>
        <td align="center" bgcolor="#FFFFFF"> 
            <form id="form1" name="form1" method="post" action="" onsubmit="popup_statment(this);">
      <center><input type="submit" name="button" id="button" value="ź���" class="button3"/><center>
      <input type="hidden" name="id" value="<?=$id[$i]?>" id="id" />
      <input type="hidden" name="upload_type" value="<?=$upload_type?>" id="upload_type" />
      </form> 
        </td>
        </tr>
      <?php } ?>  
    </table>   </div>    
        </td>
      </tr>
    </table></td>
  </tr>
</table>


<?php 


if($_REQUEST["button"] == "ź���"){
    
     $id = $_POST["id"]; 
     
     $upload_type = $_POST["upload_type"]; 
     
     if($upload_type == "1"){ // ź�ͧ��Ǣ�� ��ǹ���Ŵ�͡���
         
         $strSQL_delete = "DELETE FROM upload_file WHERE id = ".$id." ";
         $status = mysql_query($strSQL_delete);
         
         if($status){
    
    echo '<script type="text/javascript"> window.alert("Delete file �����") </script> ';
    echo "<script>window.location = 'administrator.php?menu=Delete_File'</script>";	
    exit;
    
    }else{
    
     echo '<script type="text/javascript"> window.alert("�Դ��ͼԴ��Ҵ !!! �������ö upload file ��") </script> ';
     echo "<script>window.location = 'administrator.php?menu=Delete_File'</script>";
     exit;
    
     }
         
     }else if ($upload_type == "2"){ // ź�ͧ��Ǣ�� ����º���Т�ͺѧ�Ѻ
         
         $strSQL_delete = "DELETE FROM upload_order WHERE id_order = ".$id." ";
         $status = mysql_query($strSQL_delete);
         
         if($status){
    
    echo '<script type="text/javascript"> window.alert("Delete file �����") </script> ';
    echo "<script>window.location = 'administrator.php?menu=Delete_File'</script>";	
    exit;
    
    }else{
    
     echo '<script type="text/javascript"> window.alert("�Դ��ͼԴ��Ҵ !!! �������ö upload file ��") </script> ';
     echo "<script>window.location = 'administrator.php?menu=Delete_File'</script>";
     exit;
    
     }
         
     }else if ($upload_type == "3"){ // ź�ͧ��Ǣ�� �š�ô��Թ�ҹ
         
         $strSQL_delete = "DELETE FROM upload_overall WHERE id_overall = ".$id." ";
         $status = mysql_query($strSQL_delete);
         
         if($status){
    
    echo '<script type="text/javascript"> window.alert("Delete file �����") </script> ';
    echo "<script>window.location = 'administrator.php?menu=Delete_File'</script>";	
    exit;
    
    }else{
    
     echo '<script type="text/javascript"> window.alert("�Դ��ͼԴ��Ҵ !!! �������ö upload file ��") </script> ';
     echo "<script>window.location = 'administrator.php?menu=Delete_File'</script>";
     exit;
    
     }
         
     }else if ($upload_type == "4"){ // ź�ͧ��Ǣ�� ��§ҹ��û�Ъ���˭����ѭ��Шӻ�
         
         $strSQL_delete = "DELETE FROM upload_consult WHERE id_consult = ".$id." ";
         $status = mysql_query($strSQL_delete);
         
         if($status){
    
    echo '<script type="text/javascript"> window.alert("Delete file �����") </script> ';
    echo "<script>window.location = 'administrator.php?menu=Delete_File'</script>";	
    exit;
    
    }else{
    
     echo '<script type="text/javascript"> window.alert("�Դ��ͼԴ��Ҵ !!! �������ö upload file ��") </script> ';
     echo "<script>window.location = 'administrator.php?menu=Delete_File'</script>";
     exit;
    
     }
         
     }else if ($upload_type == "5"){ // ź�ͧ��Ǣ�� �š�èѴ�ҵðҹ
         
         $strSQL_delete = "DELETE FROM upload_standard WHERE id_standard = ".$id." ";
         $status = mysql_query($strSQL_delete);
         
         if($status){
    
    echo '<script type="text/javascript"> window.alert("Delete file �����") </script> ';
    echo "<script>window.location = 'administrator.php?menu=Delete_File'</script>";	
    exit;
    
    }else{
    
     echo '<script type="text/javascript"> window.alert("�Դ��ͼԴ��Ҵ !!! �������ö upload file ��") </script> ';
     echo "<script>window.location = 'administrator.php?menu=Delete_File'</script>";
     exit;
    
     }
         
     }else if ($upload_type == "6"){ // ź�ͧ��Ǣ�� ��ԡ�âͧ�ˡó�
         
         $strSQL_delete = "DELETE FROM upload_servicecoop WHERE id_servicecoop = ".$id." ";
         $status = mysql_query($strSQL_delete);
         
         if($status){
    
    echo '<script type="text/javascript"> window.alert("Delete file �����") </script> ';
    echo "<script>window.location = 'administrator.php?menu=Delete_File'</script>";
             
    exit;
    
    }else{
    
     echo '<script type="text/javascript"> window.alert("�Դ��ͼԴ��Ҵ !!! �������ö upload file ��") </script> ';
     echo "<script>window.location = 'administrator.php?menu=Delete_File'</script>";
     exit;
    
     }
         
     }

    
    
}


?>
