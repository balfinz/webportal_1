<?php
session_start();
header('Content-Type: text/html; charset=tis-620');
?>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
<?php
require "../s/s.member_info.php";
?>
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="right"><font face="Tahoma" size="4"><strong>���������ʴԡ��</strong></font><br />
      <font face="Tahoma" size="2" color="#FF6600">Member Information</font></td>
  </tr>
  <tr>
    <td align="right"><hr color="#999999" size="1"/></td>
  </tr>
</table>
<table width="70%" border="0" align="center" cellpadding="3" cellspacing="4">
  <tr>
    <td colspan="5" align="left"><strong>�Թ���ʴԡ��-�Թʧ������</strong></td>
  </tr>
  <tr>
    <td width="3%" align="right">&nbsp;</td>
    <td width="42%" align="left" valign="middle">���ʴԡ��ʧ��������Ҫԡ</td>
    <td width="22%" align="center" valign="middle" bgcolor="#66CC33">����Ҫԡ</td>
    <td width="20%" align="right" valign="middle"><?=number_format($pay_wf,2)?></td>
    <td width="13%" align="left" valign="middle">�ҷ</td>
  </tr>
  <?php if($wf2 > 0) { ?>
  <tr>
    <td align="right">&nbsp;</td>
    <td align="left" valign="middle">�Թ�ͧ�ع���ʴԡ�����ͤ�����蹤�</td>
    <td align="center" valign="middle" bgcolor="#66CC33">����Ҫԡ</td>
    <td align="right" valign="middle"></td>
    <td align="left" valign="middle">&nbsp;</td>
  </tr>
  <?php } ?>
  <?php if($wf3 > 0) { ?>
  <tr>
    <td align="right">&nbsp;</td>
    <td align="left" valign="middle">�Թʧ������ ��Ҥ��һ��Ԩ ��١ҭ������</td>
    <td align="center" valign="middle" bgcolor="#66CC33">����Ҫԡ</td>
    <td align="right" valign="middle">&nbsp;</td>
    <td align="left" valign="middle">&nbsp;</td>
  </tr>
  <?php } ?>
  <?php if($wf1 != 4) { ?>
		<?php if($wf1 == 3 or $wf1 == 2) { ?>
                  <tr>
                    <td align="right">&nbsp;</td>
                    <td align="left" valign="middle"> �Թʧ������ ��.���.</td>
                    <td align="center" valign="middle" bgcolor="#66CC33">����Ҫԡ</td>
                    <td align="right" valign="middle">600,000.00</td>
                    <td align="left" valign="middle">�ҷ</td>
                  </tr>
		<?php } ?>
        <?php if($wf1 == 3 or $wf1 == 1) { ?>
              <tr>
                <td align="right">&nbsp;</td>
                <td align="left" valign="middle">�Թʧ������ ��ͤ.</td>
                <td align="center" valign="middle" bgcolor="#66CC33">����Ҫԡ</td>
                <td align="right" valign="middle">600,000.00</td>
                <td align="left" valign="middle">�ҷ</td>
              </tr>
			<?php } ?>
 <?php } ?>
</table>
<table width="70%" border="0" align="center" cellpadding="3" cellspacing="4">
  <?php if($wf2 > 0) { ?>
  <?php } ?>
  <?php if($wf3 > 0) { ?>
  <?php } ?>
  <?php if($wf1 != 4) { ?>
  <?php if($wf1 == 3 or $wf1 == 2) { ?>
  <?php } ?>
  <?php if($wf1 == 3 or $wf1 == 1) { ?>
  <?php } ?>
  <?php } ?>
</table>
  <tr>
    <td align="center"><font color="red">���������Ҫԡ��ѧ�ҡ�ѹ��� 1 ���Ҥ� 2549 �繵��<br />
      ���ء������Ҫԡ����ش�������Ҫԡ������� ���ؤ�� 65 ��</font></td>
  </tr>