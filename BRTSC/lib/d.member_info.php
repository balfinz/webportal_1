<?php
session_start();
@header('Content-Type: text/html; charset=tis-620');
?>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
<?php
require "../s/s.member_info.php";
require "../include/conf.d.php";
?>
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"class="txtShadow1">
  <tr>
    <td align="left"><font face="Tahoma" size="4"><strong>��������Ҫԡ</strong></font><br />
      <font face="Tahoma" size="2" color="#FF6600"><i>Member Information</i></font></td>
  </tr>
  <tr>
    <td align="right"><hr color="#999999" size="1"/></td>
  </tr>
</table>
<table width="90%" border="0" align="center" cellpadding="7" cellspacing="2"class="txtMemb">
  <tr>
    <th width="10%" align="right">����¹��Ҫԡ :</th>
    <td width="30%" align="left">&nbsp;<?=$member_no?></td>
    <th width="10%" align="right">��������Ҫԡ :</th>
    <td width="32%" align="left">&nbsp;<?=$member_type?></td>
  </tr>
  <tr>
    <th align="right">���� - ʡ�� :</th>
    <td align="left">&nbsp;<?=$full_name?></td>
    <th align="right">�ѹ�Դ :</th>
    <td align="left">&nbsp;<?=$year_b?> (<?=$age_b?>)</td>
  </tr>
  <tr>
    <th align="right">�Ţ���ѵû�ЪҪ� :</th>
    <td align="left">&nbsp;<?=GetFormatidcare($card_person)?></td>
    <th align="right">��Ͷ�� :</th>
    <td align="left">&nbsp;<?=$mobile?></td>
  </tr>
  <tr>
    <th align="right">�ѹ�������Ҫԡ :</th>
    <td align="left">&nbsp;<?=$year_m?> (<?=$age_m?>)</td>
    <th align="right">���˹� :</th>
    <td align="left">&nbsp;<?=$position?></td>
  </tr>
  <tr>
    <th align="right">�ѧ�Ѵ :</th>
    <td colspan="3" align="left">&nbsp;<?=$membgroup_code?>&nbsp;-&nbsp;<?=$membgroup?></td>
  </tr>
<tr>
    <th align="right">������� :</th>
    <td colspan="3" align="left">&nbsp;<?=$full_addr?></td>
  </tr>
  <tr>
    <th align="right">�͡�������� :</th>
    <td colspan="3" align="left">&nbsp;<?=$accum_interest_mb?>&nbsp;&nbsp;�ҷ</td>
  </tr>
</table>
<br><br>
