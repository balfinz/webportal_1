<?php
session_start();
@header('Content-Type: text/html; charset=tis-620');
?>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
<?php
require "../s/s.wcmember_info.php";
?>
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="right"><font face="Tahoma" size="4"><strong>��������Ҫԡ</strong></font><br />
      <font face="Tahoma" size="2" color="#FF6600">Member Information</font></td>
  </tr>
  <tr>
    <td align="right"><hr color="#999999" size="1"/></td>
  </tr>
</table>
<table width="85%" border="0" align="center" cellpadding="1" cellspacing="6">
  <tr>
    <td width="17%" align="right">����¹��Ҫԡ :</td>
    <td width="31%" align="left"><?=$member_no?></td>
    <td width="17%" align="right">��������Ҫԡ :</td>
    <td width="35%" align="left"><?=$member_type?></td>
  </tr>
  <tr>
    <td align="right">���� - ʡ�� :</td>
    <td align="left"><?=$full_name?></td>
    <td align="right">�ѹ�Դ :</td>
    <td align="left"><?=ConvertDate($birthday,"short")?> (<?=count_member($birthday,'ym')?>)</td>
  </tr>
  <tr>
    <td align="right">�Ţ���ѵû�ЪҪ� :</td>
    <td align="left"><?=GetFormatidcare($card_person)?></td>
    <td align="right">��Ͷ�� :</td>
    <td align="left"><?=$mobile?></td>
  </tr>
  <tr>
    <td align="right">�ѹ�������Ҫԡ :</td>
    <td align="left"><?=ConvertDate($member_date,"short")?> (<?=count_member($member_date,'ym')?>)</td>
    <td align="right">�ٹ�����ҹ�ҹ :</td>
    <td align="left"><?=$membgroup?></td>
  </tr>
  <tr>
    <td align="right">���ͤ������ :</td>
    <td align="left"><?=$mate_name?></td>
    <td align="right">���Ѵ���Ⱦ :</td>
    <td align="left"><?=$manage_corpse_name?></td>
  </tr>
  <tr>
    <td align="right">������� �������ö�Դ����� :</td>
    <td colspan="3" align="left"><?=$other_contact_address?></td>
  </tr>
  <tr>
    <td align="right">�Ţ�����Ҫԡ ��. :</td>
    <td align="left"><?=$member_no_coop?></td>
  </tr>
</table>
<br />
<?php
require "../s/s.wctrndetail.php";
?>
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="right"><font face="Tahoma" size="4"><strong>�����š���͹����</strong></font><br />
      <font face="Tahoma" size="2" color="#FF6600">Transfer</font></td>
  </tr>
  <tr>
    <td align="right"><hr color="#999999" size="1"/></td>
  </tr>  
  <tr>
    <td align="right">
 <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#999999">
	<table width="100%" border="0" cellspacing="1" cellpadding="3">
          <tr>
            <!--<td width="10%" height="25" align="center" bgcolor="#CCCCFF"><strong>�ӴѺ</strong></td>-->
            <td width="15%" height="25" align="center" bgcolor="#CCCCFF"><strong>�ѹ���</strong></td>
            <td width="15%" align="center" bgcolor="#CCCCFF"><strong>�Ţ����͹����</strong></td>
            <td width="35%" align="center" bgcolor="#CCCCFF"><strong>�ҡ�ٹ��</strong></td>
            <td width="35%" align="center" bgcolor="#CCCCFF"><strong>��ѧ�ٹ��</strong></td>
          </tr>
          <?php 
		  
		  //print_r($prncbal_[0]);
		  
		  for($i = 0 ; $i < $Num_Rows ; $i ++) { ?>
          <tr>
            <!--<td height="25" align="center" bgcolor="#FFFFFF"><?=$i+1?></td>-->
            <td height="25" align="center" bgcolor="#FFFFFF"><?=ConvertDate($confirm_date[$i] ,"short")?></td>
            <td align="center" bgcolor="#FFFFFF"><?=$trn_docno[$i]?></td>
            <td align="center" bgcolor="#FFFFFF"><?=$old_branch_desc[$i]?></td>
            <td align="center" bgcolor="#FFFFFF"><?=$new_branch_desc[$i]?></td>
          </tr>
          <?php } ?>
        </table>
    </td>
  </tr>
</table>
    </td>
  </tr>
</table>
