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
	<script type="text/javascript" src="../js/jquery-ui-1.8.10.offset.datepicker.min.js"></script>
	<script type="text/javascript">
		  $(function () {
		    var d = new Date();
		    var toDay = d.getDate() + '/'
        + (d.getMonth() + 1) + '/'
        + (d.getFullYear() + 543);
		    $("#datepicker-th").datepicker({ dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay, dayNames: ['�ҷԵ��', '�ѹ���', '�ѧ���', '�ظ', '����ʺ��', '�ء��', '�����'],
              dayNamesMin: ['��.','�.','�.','�.','��.','�.','�.'],
              monthNames: ['���Ҥ�','����Ҿѹ��','�չҤ�','����¹','����Ҥ�','�Զع�¹','�á�Ҥ�','�ԧ�Ҥ�','�ѹ��¹','���Ҥ�','��Ȩԡ�¹','�ѹ�Ҥ�'],
              monthNamesShort: ['�.�.','�.�.','��.�.','��.�.','�.�.','��.�.','�.�.','�.�.','�.�.','�.�.','�.�.','�.�.']});			  
		    $("#datepicker-th1").datepicker({ dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay, dayNames: ['�ҷԵ��', '�ѹ���', '�ѧ���', '�ظ', '����ʺ��', '�ء��', '�����'],
              dayNamesMin: ['��.','�.','�.','�.','��.','�.','�.'],
              monthNames: ['���Ҥ�','����Ҿѹ��','�չҤ�','����¹','����Ҥ�','�Զع�¹','�á�Ҥ�','�ԧ�Ҥ�','�ѹ��¹','���Ҥ�','��Ȩԡ�¹','�ѹ�Ҥ�'],
              monthNamesShort: ['�.�.','�.�.','��.�.','��.�.','�.�.','��.�.','�.�.','�.�.','�.�.','�.�.','�.�.','�.�.']});
			  $("#inline").datepicker({ dateFormat: 'dd/mm/yy', inline: true });
			});
			function popup_statment(form) {
				var w = 910;
				var h = 530;
				var left = (screen.width/2)-(w/2);
				var top = (screen.height/3)-(h/3);
				var acc_no = $("#acc_no").val();
				var date1 =  $("#date1").val();
				var date2 =  $("#date2").val();
				if(acc_no != "" && date1 != "" && date2 != ""){
			 window.open ('', 'formpopup', 'toolbar=no, location=no, directories=no, status=no, menubar=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
				 form.target = 'formpopup';
				}
			} 

			jQuery(document).ready(function(){
						jQuery("#formID1").validationEngine('attach', {promptPosition : "topRight", autoPositionUpdate : true});
			});
        </script>
		<style type="text/css">
			body{ font: 80% "Tamaho"; margin: 0px;}
			.demoHeaders { margin-top: 2em; }
			#dialog_link {padding: .4em 1em .4em 20px;text-decoration: none;position: relative;}
			#dialog_link span.ui-icon {margin: 0 5px 0 0;position: absolute;left: .2em;top: 50%;margin-top: -8px;}
			ul#icons {margin: 0; padding: 0;}
			ul#icons li {margin: 2px; position: relative; padding: 4px 0; cursor: pointer; float: left;  list-style: none;}
			ul#icons span.ui-icon {float: left; margin: 0 4px;}
			ul.test {list-style:none; line-height:30px;}
		</style>	
		
		<?php $check  = "0" ?>
		
		<?php if ($check == "1") { ?>
		
		<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left"><strong><font size="4" face="Tahoma">���������ʴԡ��</font></strong><br />
    <font color="#FF6600" size="2" face="Tahoma">Benefits</font></td>
  </tr>
  <tr>
    <td align="right"><hr color="#999999" size="1"/></td>
  </tr>
</table>
<?php require "../s/s.Benefits.php"; 
 $check_member_type = substr($member_no,0,1);
		  if($check_member_type !="�")
		  {
				$year =  (date("Y")+543)-(substr($member_date,-4)+543); 
				$month = substr($member_date,-7,-5);
				//���͹�����ǡѺ�Ѻ�ӹǹ���ػա������Ҫԡ����令ӹǳ ��¡��	�ӹǹ�Թ������ͧ	�����˵� ���ʴԡ��ʧ�������ͺ������Ҫԡ ����Թ 250,000 �ҷ
				if($month>=8)
				{
					$skscoopanti  = (50000+($year*5000))+5000;
				}
				else
				{
					$skscoopanti  = 50000+($year*5000);
				}

				if($skscoopanti <=250000)
				{
					$skscoopanti_sum=number_format($skscoopanti);
				}
				else
				{
					$skscoopanti_sum = "250,000";
				}
			}else{$skscoopanti_sum=0;}
?>
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
 
  <tr>
    <td bgcolor="#999999"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td align="left" bgcolor="#CCCCFF"><table width="100%" border="0" cellspacing="3" cellpadding="3">
          
        </table></td>
        </tr>
      <tr>
        <td align="left" bgcolor="#CCCCCC"><table width="100%" border="0" cellspacing="1" cellpadding="3">
          <tr>
            <td width="38%" height="25" align="center" bgcolor="#FFFFFF"><strong>��¡��</strong></td>
            <td width="10%" align="center" bgcolor="#FFFFFF"><strong>�ӹǹ�Թ������ͧ</strong></td>
	    <td width="30%" align="center" bgcolor="#FFFFFF"><strong>�����˵�</strong></td>
            
          </tr>
		  <tr>
            <td height="25" bgcolor="#FFFFFF">���ʴԡ��ʧ�������ͺ������Ҫԡ ����Թ 250,000 �ҷ</td>
            <td align="right" bgcolor="#FFFFFF"><?=$skscoopanti_sum?> �ҷ</td>
            <td bgcolor="#FFFFFF">������� 50,000 �ҷ ������Ҫԡ ���� 5,000 �ҷ</td>
            
          </tr>
		  <tr>
            <td height="25"  bgcolor="#FFFFFF">�ˡó�ϻ�Сѹ 100 % �ˡó�������»�Сѹ���</td>
            <td align="right" bgcolor="#FFFFFF"><?=number_format($skscoop100) ?> �ҷ</td>
            <td  bgcolor="#FFFFFF">���ª��Ե�����غѵ��˵��� 2 ���</td>
            
          </tr>
		  <tr>
            <td height="25"  bgcolor="#FFFFFF">��Ҥ��һ��Ԩ ��.���ྪú�ó�</td>
            <td align="right" bgcolor="#FFFFFF"><?=number_format($skscoop) ?> �ҷ</td>
            <td  bgcolor="#FFFFFF">����ӹǹ��Ҫԡ � �ѹ���ª��Ե</td>
            
          </tr>
		  <tr>
            <td height="25" bgcolor="#FFFFFF">��ͤ.�����</td>
            <td align="right" bgcolor="#FFFFFF"><?=number_format($ftscins) ?> �ҷ</td>
            <td  bgcolor="#FFFFFF">(��鹵��)���»�Сѹ 4,800 ��ͻ��ѡ�ҡ�ѹ��</td>
            
          </tr>
		  <tr>
            <td height="25"  bgcolor="#FFFFFF">��.���.������</td>
            <td align="right" bgcolor="#FFFFFF"><?=number_format($fsctins) ?> �ҷ</td>
            <td  bgcolor="#FFFFFF">(��鹵��)���»�Сѹ 4,800 ��ͻ��ѡ�ҡ�ѹ��</td>
            
          </tr>
		  <tr>
            <td height="25"  bgcolor="#FFFFFF">��Сѹ� �Ҥ��Ѥ��</td>
            <td align="right" bgcolor="#FFFFFF"><?=number_format($voluntary) ?> �ҷ</td>
            <td  bgcolor="#FFFFFF"><?php ?></td>
            
          </tr>
		  <tr>
            <td height="25" bgcolor="#FFFFFF">��Сѹ� �.�.�.</td>
            <td align="right" bgcolor="#FFFFFF"><?=number_format($voluntaryold) ?> �ҷ</td>
            <td align="center" bgcolor="#FFFFFF"><?php ?></td>
            
          </tr>
		   <tr>
            <td height="25"  bgcolor="#FFFFFF">��Сѹ�Թ���� </td>
            <td align="right" bgcolor="#FFFFFF"><?=number_format($credits) ?> �ҷ</td>
            <td align="center" bgcolor="#FFFFFF"><?php ?></td>
            
          </tr>
		   <tr>
            <td height="25"  bgcolor="#FFFFFF">����Թ���ʴԡ�� </td>
            <td align="right" bgcolor="#FFFFFF"><?=number_format($sum_benefit+$skscoopanti) ?> �ҷ</td>
            <td align="center" bgcolor="#FFFFFF"><?php ?></td>
            
          </tr>
		  <!--< <tr>
            <td height="25"  bgcolor="#FFFFFF">�ͧ�ع��ӻ�Сѹ�Թ��� </td>
            <td align="right" bgcolor="#FFFFFF"><?//=number_format($fundcoll) ?> �ҷ</td>
            
                   <?php //if($interest_return != 0){ ?>
            
            <td bgcolor="#FFFFFF"><?//=$interest_return ?> �ҷ (�͡���� � ������ �ѹ��� 31 �.� 59)</td>
            
                   <?php //}  else { ?>
            
            <td height="25" bgcolor="#FFFFFF"></td>
             <?php //} ?>
			 </tr>-->
			<!--  <tr>
		  <td height="25" bgcolor="#FFFFFF"></td>
		  <td height="25" bgcolor="#FFFFFF"></td>
		  <td height=-->
			<!-- <tr>
			 <td height="25"  bgcolor="#FFFFFF">���¤׹�ͧ�ع��ӻ�Сѹ����Ҫԡ (����  � �ѹ��� 08 �.� 2559)</td>
			 
			 <?php //if($fundbalance > 10000){ ?>
			 
			 <td align="right" bgcolor="#FFFFFF"><?php //echo $fundbalance_full; ?> �ҷ</td>
			 <td bgcolor="#FFFFFF">�Թ���¤׹ <?php //echo $avg_full ; ?>  �ҷ  ������� 10,000 �ҷ</td>
			 
			 <?php //} else { ?>
			 <td align="right" bgcolor="#FFFFFF"><?php// echo $fundbalance_full; ?> �ҷ</td>
			 <td bgcolor="#FFFFFF">�Թ���¤׹ - �ҷ  ������� <?php //echo $fundbalance_full; ?> �ҷ </td>
            <?php //} ?>
          </tr>
		   <tr>
		  <td height="25" bgcolor="#FFFFFF"></td>
		  <td height="25" bgcolor="#FFFFFF"></td>
		  <td height="25" bgcolor="#FFFFFF"></td>
		  </tr>
		  <tr>
		  <td height="25" bgcolor="#FFFFFF">**�����Թ�׹�ͧ�ع��������ͼ���ӻ�Сѹ����Ҫԡ��������Թ 10,000 <br> �ҷ������ҹ��</td>
		  <td height="25" bgcolor="#FFFFFF"></td>
		  <td height="25" bgcolor="#FFFFFF"></td>
		  </tr>-->
		  <tr>
		  <td height="25" bgcolor="#FFFFFF">***�ó��բ��ʧ������Դ��͡Ѻ�ˡó������Ѿ����ྪú�ó� �ӡѴ</td>
		  <td height="25" bgcolor="#FFFFFF"></td>
		  <td height="25" bgcolor="#FFFFFF"></td>
		  </tr>
		 <!--  <tr>
            <td height="25"  bgcolor="#FFFFFF" colspan="3">***�ó��բ��ʧ������Դ��͡Ѻ�ˡó������Ѿ����ྪú�ó� �ӡѴ </td>
			
          </tr>-->
		  
		  
          <?php ?>
        </table></td>
      </tr>
	  
    </table></td>
  </tr>
 
</table>
<?php //if($fundbalance > 10000){ ?>
<!--<p><span style="font-size:10pt; ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>�ʹ�Թ�ͧ�ع��ӻ�Сѹ����  <?php //echo $fundbalance_full; ?> �ҷ  �ʹ���¤׹ 10,000 �ҷ ������� <?php// echo $avg_full ; ?> �ҷ ���� � �ѹ��� </span></p>-->
<?php //} else { ?>
<!--<center><p><span style="font-size:10pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>�ʹ�Թ�ͧ�ع��ӻ�Сѹ����  <?php //echo $fundbalance_full; ?> �ҷ  �ʹ���¤׹ - �ҷ ������� <?php //echo $fundbalance_full; ?> �ҷ ���� � �ѹ��� </span></p>-->
<?php //} ?>
<!--<p><span style="font-size:10pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>��è��¤׹�Թ�ͧ�ع��ӻ�Сѹ�Թ��� ���¤׹����Ѻ�ʹ����������  10,000 �ҷ������ҹ��</span></p>-->
<br>
<p><span style="font-size:11pt; color:#3633FF;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>***�����˵�</b> ����Ѻ�Ż���ª���������ʴԡ�����������ҧ��èѴ�Ӣ�����</span></p>
<!--
              <br><br>
              
              
              <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
 
  <tr>
    <td bgcolor="#999999"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td align="left" bgcolor="#CCCCFF"><table width="100%" border="0" cellspacing="3" cellpadding="3">
        </table></td>
        </tr>
      <tr>
        <td align="left" bgcolor="#CCCCCC">
		<table width="100%" border="0" cellspacing="1" cellpadding="3">
		  <tr>
			<td colspan="3"><b>����Ѻ�͹�Ż���ª��</b></td>
		  </tr>
          <tr>
            <td align="center" height="25" width="22%"  bgcolor="#FFFFFF"><strong>���ͼ���Ѻ�͹</strong></td>
			<td align="center"  width="40%"  bgcolor="#FFFFFF"><strong>����������Ѻ�͹</strong></td>
            <td  align="center"  width="20%"  bgcolor="#FFFFFF"><strong>��������ѹ��</strong></td>
            
          </tr>
		  <?php if($Num_Rows1>0){?>
          <tr>
            <td height="25"  align="center" bgcolor="#FFFFFF"><?=$fullname_gain ?></td>
            <td  bgcolor="#FFFFFF"><?=$address_gain ?></td>
            <td align="center" bgcolor="#FFFFFF"><?=$concern_gain ?></td>
            
          </tr>
		  <?php }else{?>
		  <tr>
				<td colspan="3">�ѧ����բ�����</td>
		  </tr>
          <?php } ?>
        </table></td>
      </tr>
	  
    </table></td>
  </tr>
 
</table>
-->
             
<br />
<p>&nbsp;</p>

<?php } else { 

        echo '<script type="text/javascript"> window.alert("����������㹪�ǧ���Թ��û�Ѻ��ا���ٹ��") </script> ';
		echo "<script>window.location = 'info.php'</script>";


} ?>


