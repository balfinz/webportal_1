<?php
session_start();
@header('Content-Type: text/html; charset=tis-620');
?>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
<?php
require "../s/s.member_info.php";
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
    <td align="right">���˹� :</td>
    <td align="left"><?=$position?></td>
  </tr>
  <tr>
    <td align="right">�ѧ�Ѵ :</td>
    <td colspan="3" align="left"><?=$membgroup?></td>
  </tr>
</table>
<br />
