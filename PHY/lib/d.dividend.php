<?php
session_start();
@header('Content-Type: text/html; charset=tis-620');
?><head>
	<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<?php  require "../s/s.dividend.php";  ?>
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="86%" align="left"><strong><font size="4" face="Tahoma">�ѹ�� - ����¤׹ ��Шӻ�  <?=$divyear?></font></strong><br />
    <font color="#FF6600" size="2" face="Tahoma">Dividend & Returning</font></td>
    <td width="14%" align="right" valign="top">
    <form id="formID1" name="formID1" method="post" action="" >
        <select name="divyear" id="divyear"  onchange="this.form.submit()" >
            <option value=""> --- ��س����͡ ---</option>
                  <?php  					  
                    for($i=0  ; $i <= ($maxdiv-$mindiv) ; $i++){
		if(($maxdiv-$i) < 2557){
			continue;
		}else{
			echo '<option value="'.($maxdiv-$i).'">�� :  '.($maxdiv-$i).'</option>';
		}
                    }
                   ?>
    	</select>
    </form></td>
  </tr>
  <tr>
    <td colspan="2" align="right"><hr color="#999999" size="1"/></td>
  </tr>
</table>
<!--<table width="75%" border="0" align="center" cellpadding="1" cellspacing="4">
  <tr>
    <td width="33%" height="35" align="center" bgcolor="#CCCCFF"><strong>�ѹ��</strong></td>
    <td width="33%" align="center" bgcolor="#CCCCFF"><strong>����¤׹</strong></td>
    <td width="33%" align="center" bgcolor="#CCCCFF"><strong>��¡���ѡ</strong></td>
  </tr>
  <tr>
    <td height="35" align="center"><strong><?//=$div_balamt?></strong></td>
    <td align="center"><strong><?//=$avg_balamt?></strong></td>
    <td align="center"><strong><?//=$etc_balamt?></strong></td>
  </tr>
  <tr>
    <td height="35" colspan="3" align="center" bgcolor="#CCCCFF"><font size="3" ><strong>�ѹ��-����¤׹��� : <font size="3" color="#FF6600"> <?//=$sumdiv?> </font> �ҷ</strong></font></td>
  </tr>
  <tr>
    <td height="21" colspan="3" align="center">&nbsp;</td>
  </tr>
</table>-->
<?php //if($Num_div1 != 0){ ?>
<!--<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="86%" align="left"><strong><font size="4" face="Tahoma">�Ըա���Ѻ�Թ</font></strong><br />
      <font color="#FF6600" size="2" face="Tahoma">How to Get Paid</font></td>
    <td width="14%" align="right" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="right"><hr color="#999999" size="1"/></td>
  </tr>
</table>
<table width="45%" border="0" align="center" cellpadding="1" cellspacing="4">
  <tr>
    <td height="21" colspan="3" align="left"><p><font size="3">
      <?//=$typepay ?> 
      ��� <?//=$bank_desc ?>
      <br />
    </font><font size="3">�Ţ���ѭ��
  <?//=$bank_acc ?> <strong><font color="#0000CC"> <br />
  �ӹǹ�Թ
<?//=$totalpay ?>
    </font></strong></font></p></td>
  </tr>
</table>-->

<?php //} ?>

<?php 




?>

<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>
    <td bgcolor="#999999"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td align="left" bgcolor="#00CC00" height="20" align="left"><strong>&nbsp;&nbsp;��¡���Ѻ </strong></td>
        </tr>
      <tr>
        <td align="left" bgcolor="#CCCCCC"><table width="100%" border="0" align="left" cellpadding="2" cellspacing="1">
          <tr>
            <td width="25%" height="25" align="center" bgcolor="#FFFFFF"><strong>�Թ�ѹ��</strong></td>
            <td width="25%" align="center" bgcolor="#FFFFFF"><strong>�Թ����¤׹</strong></td>
            <td width="25%" align="center" bgcolor="#FFFFFF"><strong>�Թ���Ҥس</strong></td>
			<td width="25%" align="center" bgcolor="#FFFFFF"><strong>���</strong></td>
          </tr>
          <tr>
            <td height="25" align="center" bgcolor="#FFFFFF"><?=number_format($div_amt,2)?></td>
            <td align="center" bgcolor="#FFFFFF"><?=number_format($avg_amt,2)?></td>
            <td align="center" bgcolor="#FFFFFF"><?=number_format($etc_amt,2)?></td>
            <td align="center" bgcolor="#FFFFFF"><?=number_format($sull_all,2)?></td>
          </tr>
     
        </table></td>
      </tr>
    </table></td>
  </tr>

</table>
<br>
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>
    <td bgcolor="#999999">
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
		  <tr>
			<td align="left" bgcolor="#FF0000" height="20" align="left">
				<strong>&nbsp;&nbsp;��¡���ѡ/�͹ </strong>
			</td>
		  </tr>
		  <tr>
			<td align="left" bgcolor="#CCCCCC">
				<table width="100%" border="0" align="left" cellpadding="2" cellspacing="1">
					  <tr>
						<td height="25" align="center" bgcolor="#FFFFFF"><strong>����˹��</strong></td>
						<td align="center" bgcolor="#FFFFFF"><strong>��ͤ.</strong></td>
						<td align="center" bgcolor="#FFFFFF"><strong>��ͤ.(����)</strong></td>
						<td align="center" bgcolor="#FFFFFF"><strong>�ʪ��.</strong></td>
						<td align="center" bgcolor="#FFFFFF"><strong>�ʪ��.(����)</strong></td>
						<td align="center" bgcolor="#FFFFFF"><strong>ʬ͹.</strong></td>
						<td align="center" bgcolor="#FFFFFF"><strong>���</strong></td>
					  </tr>
					  <tr>
						<td height="25" align="center" bgcolor="#FFFFFF"><?=number_format($lon,2)?></td>
						<td align="center" bgcolor="#FFFFFF"><?=number_format($cmt,2)?></td>
						<td align="center" bgcolor="#FFFFFF"><?=number_format($cma,2)?></td>
						<td align="center" bgcolor="#FFFFFF"><?=number_format($cso,2)?></td>
						<td align="center" bgcolor="#FFFFFF"><?=number_format($csa,2)?></td>
						<td align="center" bgcolor="#FFFFFF"><?=number_format($cnt,2)?></td>
						<td align="center" bgcolor="#FFFFFF"><?=number_format($sull_cut,2)?></td>
					  </tr>
				</table>
			</td>
		  </tr>
		</table>
	</td>
  </tr>
</table>
<br>

<table width="75%" border="0" align="center" cellpadding="1" cellspacing="4">

  <tr>
    <td height="35" colspan="3" align="center" bgcolor="#CCCCFF"><font size="3" ><strong>�ʹ�Ѻ�Թ : <font size="3" color="#FF6600"> <?=number_format($sumnet,2)?> </font> �ҷ</strong></font></td>
  </tr>
  <tr>
    <td height="21" colspan="3" align="center">&nbsp;</td>
  </tr>
</table>

<br>


<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="86%" align="left"><strong><font size="4" face="Tahoma">�Ըա���Ѻ�Թ</font></strong><br />
      <font color="#FF6600" size="2" face="Tahoma">How to Get Paid</font></td>
    <td width="14%" align="right" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="right"><hr color="#999999" size="1"/></td>
  </tr>
</table>
<table width="45%" border="0" align="center" cellpadding="1" cellspacing="4">
  <tr>
  <?php if($dep != "") { ?>
    <td height="21" colspan="3" align="left"><p><font size="4" color="#3300FF">�͹����Թ�ҡ</font></td>
  <?php }else { ?>
   <td height="21" colspan="3" align="center"><p><font size="4" color="#3300FF">�Թʴ</font></td>
  
  <?php } ?>
  </tr>
  <tr>
  <?php if($dep != "") { ?>
    <td height="21" colspan="3" align="left"><p><font size="4" color="#3300FF"><?=$dep?></font></td>
  <?php }else { ?>
   <td height="21" colspan="3" align="center"><p><font size="4" color="#3300FF"></font></td>
  
  <?php } ?>
  </tr>
</table>

<table width="75%" border="0" align="center" cellpadding="0" cellspacing="3">
  <tr>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td align="right"><font color="#FF0000">* ��سҵ�Ǩ�ͺ�ա���駡Ѻ�ҧ�ˡó�</font></td>
  </tr>
</table>
