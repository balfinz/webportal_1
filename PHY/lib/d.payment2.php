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
				var slip = $("#slip").val();
				if(slip != ""){
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

<?php require "../s/s.payment2.php"; ?>
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="82%" align="left"><strong><font size="4" face="Tahoma">��¡�����¡�纻�Ш���͹ <?=$show_month?></font></strong><br />
    <font color="#FF6600" size="2" face="Tahoma">Monthly Payment</font></td>
    <td width="18%" align="right" valign="top">
    <form id="formID1" name="formID1" method="post" action="" >
        <select name="slip_date" id="slip_date"  onchange="this.form.submit()" >
            <option value=""> --- ��س����͡ ---</option>
                  <?php  	
                    for($i=0;$i<count($slip);$i++){
		if($slip[$i] < 255810){
			continue;
                                }else{
			echo '<option value="'.$slip[$i].'">'.$slip_m[$i].'</option>';
		}
                    }
                    ?>
    	</select>
    </form>
    </td>
  </tr>
  <tr>
    <td colspan="2" align="left"><hr color="#999999" size="1"/></td>
  </tr>
</table>
<br />
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#CCCCCC"><table width="100%" border="0" cellspacing="1" cellpadding="3">
      <tr>
        <td width="30%" height="25" align="center" bgcolor="#6699FF"><strong><font color="#FFFFFF">��¡�� / �ѭ��</font></strong></td>
        <td width="5%" align="center" bgcolor="#6699FF"><strong><font color="#FFFFFF">�Ǵ���</font></strong></td>
        <td width="13%" align="center" bgcolor="#6699FF"><strong><font color="#FFFFFF">�Թ��</font></strong></td>
        <td width="13%" align="center" bgcolor="#6699FF"><strong><font color="#FFFFFF">�͡����</font></strong></td>
        <td width="13%" align="center" bgcolor="#FFCC33"><strong>�ӹǹ�Թ</strong></td>
        <td width="15%" align="center" bgcolor="#6699FF"><strong><font color="#FFFFFF">�������</font></strong></td>
      </tr>
      <?php for($i=0;$i<$Num_Rows;$i++){?>  
      <tr>
        <td height="28" bgcolor="#FFFFFF"><?php
				  if($slip_itemtype[$i] == 'LON'){
						echo $slip_itemdesc[$i].' '.$slip_loanno[$i];
				  }else if($slip_itemtype[$i] == 'DEP'){
						echo $slip_itemdesc[$i].' '.$slip_desc[$i];
				  }else if($slip_itemtype[$i] == 'SHR'){
						echo $slip_itemdesc[$i];
				  }else{
						echo $slip_desc[$i];
				  }
				  ?></td>
        <td align="center" bgcolor="#FFFFFF"><?=($period[$i] == 0) ? '' : $period[$i];?></td>
        <td align="right" bgcolor="#FFFFFF"><?=($slip_itemtype[$i] == 'LON') ? number_format($slip_principal[$i],2) : '';?></td>
        <td align="right" bgcolor="#FFFFFF"><?=($slip_itemtype[$i] == 'LON') ? number_format($slip_interest[$i],2) : '';?></td>
        <td align="right" bgcolor="#FFFF99"><?=number_format($slip_pay[$i],2)?></td>
        <td align="right" bgcolor="#FFFFFF"><?=($itembalance[$i] == 0) ? '' : number_format($itembalance[$i],0);?></td>
      </tr>
      <?php } ?>  
      <?php if($Num_Rows1 > 0){ ?>  
      <tr>
        <td height="28" bgcolor="#FFFFFF"><?=($Num_Rows+1).'. '?><?=$moneytype_code	.' '.$expense_accid?></td>
        <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
        <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
        <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
        <td align="right" bgcolor="#FFFF99">-<?=$item_payment?></td>
        <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
      <?php } ?>        
      <tr>
        <td colspan="4" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="81%" align="center"><strong>( -<?=convertthai($totalpayment-$payment_a)?>- )</strong></td>
            <td width="19%" align="right"><strong>�������</strong></td>
          </tr>
        </table></td>
        <td height="28" align="right" bgcolor="#FFFF99"><strong><?=number_format($totalpayment-$payment_a,2)?></strong></td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="right"><font color="#FF0000">*�к����ʴ���������͹����ش ��سҵ�Ǩ�ͺ�ա���駡Ѻ�ҧ�ˡó�</font></td>
  </tr>
  <tr>
    <td align="center">
&nbsp;
    </td>
  </tr>
</table>
<p>&nbsp;</p>
