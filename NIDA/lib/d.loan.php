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
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left"><strong><font size="4" face="Tahoma">�������Թ���</font></strong><br />
    <font color="#FF6600" size="2" face="Tahoma">Loan</font></td>
  </tr>
  <tr>
    <td align="right"><hr color="#999999" size="1"/></td>
  </tr>
</table>
<?php require "../s/s.loan.php"; ?>
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
  <?php for($i=0;$i<$Num_Rows;$i++){ ?>
  <tr>
    <td bgcolor="#999999"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td align="left" bgcolor="#CCCCFF"><table width="100%" border="0" cellspacing="3" cellpadding="3">
          <tr>
            <td width="84%" height="20" align="left"><strong><?=$loan_desc[$i]?> </strong></td>
            <td width="16%" align="center"><strong>�ӹǹ 
               <font color="#FF6600"><?=$count_loan[$i]?></font> �ѭ��</strong></td>
            </tr>
        </table></td>
        </tr>
      <tr>
        <td align="left" bgcolor="#CCCCCC"><table width="100%" border="0" align="left" cellpadding="2" cellspacing="1">
          <tr>
            <td width="18%" height="25" align="left" bgcolor="#FFFFFF"><strong>�������Թ���</strong></td>
            <td width="11%" align="center" bgcolor="#FFFFFF"><strong>�Ţ����ѭ��</strong></td>
            <td width="8%" align="center" bgcolor="#FFFFFF"><strong>������ѭ��</strong></td>
            <td width="10%" align="center" bgcolor="#FFFFFF"><strong>ǧ�Թ͹��ѵ�</strong></td>
            <td width="4%" align="center" bgcolor="#FFFFFF"><strong>�Ǵ</strong></td>
            <td width="10%" align="right" bgcolor="#FFFFFF"><strong>�Թ��</strong></td>
            <td width="10%" align="right" bgcolor="#FFFFFF"><strong>�/�</strong></td>
            <td width="10%" align="right" bgcolor="#FFFFFF"><strong>�������</strong></td>
            <td width="12%" align="right" bgcolor="#FFFFFF"><strong>�������</strong></td>
            <td width="7%" align="center" bgcolor="#FFFFFF"><strong>% ����</strong></td>
          </tr>
          <?php require "../s/s.loan1.php";
          for($n=0;$n<$Num_Rows1;$n++){ ?>
          <tr>
            <td height="25" align="left" bgcolor="#FFFFFF"><?= $loantype_desc[$n]  ?></td>
            <td align="center" bgcolor="#FFFFFF"><?= $loancontract_no[$n] ?></td>
            <td align="center" bgcolor="#FFFFFF"><?= $startcont_date[$n] ?></td>
            <td align="right" bgcolor="#FFFFFF"><?= number_format($loanapprove_amt[$n],2) ?></td>
            <td align="center" bgcolor="#FFFFFF"><?=  $last_periodpay[$n]."/".$period_payamt[$n] ?></td>
            <td align="right" bgcolor="#FFFFFF"><?= number_format($principal_payment[$n],2) ?></td>
            <td align="right" bgcolor="#FFFFFF"><?= number_format($interest_payment[$n],2) ?></td>
            <td align="right" bgcolor="#FFFFFF"><?= number_format($totalpay[$n],2) ?></td>
            <td align="right" bgcolor="#FFFFFF"><?= number_format($principal_balance[$n],2) ?></td>
            <td align="center" bgcolor="#FFFFFF"><?= number_format($pay_persent[$n],2) ?>%</td>
          </tr>
          <?php } ?>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <?php } ?>
</table>
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="right"><font color="#FF0000">***�ӹǹ�Թ���е���д͡���� �к����ʴ��ҡ������¡����͹����ش</font></td>
  </tr>
</table>
<br />
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left" valign="top"><strong><font size="4" face="Tahoma">��¡���Թ�ѭ���Թ���</font></strong><br />
      <font color="#FF6600" size="2" face="Tahoma">Statment</font></td>
  </tr>
  <tr>
    <td align="left"><hr color="#999999" size="1"/></td>
  </tr>
  <tr>
    <td align="left">
    <form action="loan_statment.php" method="post" name="formID1" id="formID1" onsubmit="popup_statment(this);">
      <table border="0" align="left" cellpadding="1" cellspacing="0">
        <tr>
          <td width="449" align="left"><font size="2" face="Tahoma">��س����͡�Ţ����ѭ��<strong>
            <?php
		  $strSQL = "SELECT
						    LNM.LOANCONTRACT_NO AS LOANCONTRACT_NO,
							LT.LOANTYPE_DESC AS LOANTYPE_DESC
						FROM 
							LNCONTMASTER LNM, LNLOANTYPE LT
						WHERE
							LNM.LOANTYPE_CODE = LT.LOANTYPE_CODE 
							AND LNM.MEMBER_NO = '$member_no' 
							AND LNM.CONTRACT_STATUS = '1'
							AND LNM.STARTCONT_DATE IS NOT NULL 
							ORDER BY LNM.LOANTYPE_CODE ";
			$value = array('LOANCONTRACT_NO','LOANTYPE_DESC');		  
			list($Num_Rows,$list_info) = get_value_many_oci($strSQL,$value);
			$j=0;
			for($i=0;$i<$Num_Rows;$i++){
				$acc_no[$i] = $list_info[$i][$j++];
				$acc_desc[$i] = $list_info[$i][$j++];
				$j=0;
			}

		  ?>
            <select name="acc_no" id="acc_no" class="validate[required]">
              <option value=""> ��س����͡�Ţ����ѭ�� </option>
              <?php
					  	for($i=0;$i<count($acc_no);$i++){
							echo '<option value="'.$acc_no[$i].'">'.$acc_no[$i].'   :   '.$acc_desc[$i].'</option>';
						}
				?>
              </select>
            </strong></font></td>
        </tr>
        <tr>
          <td align="left"></td>
        </tr>
        <tr>
          <td align="left"><?php
				  $today = date('d/m');
				  $tyear = date('Y')+543;
				  $today =  $today.'/'.$tyear;
				  ?>
            <font size="2" face="Tahoma">������ѹ���
              <input name="date1" type="text"  class="validate[required]"  id="datepicker-th"  style="text-align:center" size="12" readonly="readonly"/>
              �֧�ѹ���
              <input name="date2" type="text"  id="datepicker-th1"  style="text-align:center" value="<?=$today?>" size="12" readonly="readonly" />
            </font></td>
        </tr>
        <tr>
          <td align="left"><font size="2" face="Tahoma" color="#FF0000"><!--*�к����ʴ���������͹��ѧ����Թ 1 ��-->
            <input name="type_stm" type="hidden" id="type_stm" value="Dep" />
          </font></td>
        </tr>
        <tr>
          <td align="left">
          	<input name="Submit" type="submit" id="button"  value="�ʴ�������" />
            <input type="reset" name="button2" id="button2" value="¡��ԡ" /></td>
        </tr>
      </table>
      <br />
    </form></td>
  </tr>
</table>
<p>&nbsp;</p>
