<?php
session_start();
@header('Content-Type: text/html; charset=tis-620');
?><head>
	<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<?php
require "../s/s.member_info.php";
?>
<table width="95%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="right"><font face="Tahoma" size="4"><strong>��������Ҫԡ</strong></font><br />
      <font face="Tahoma" size="2" color="#FF6600">Member Information</font></td>
  </tr>
</table>
<hr color="#999999" size="1"/>
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="3">
  <tr>
    <td align="left" valign="top"><font face="Tahoma" size="3"><strong>�Ţ��Ҫԡ</strong></font></td>
  </tr>
  <tr>
    <td align="right" valign="top"><table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
      <tr>
        <td width="5%" valign="top">&nbsp;</td>
        <td width="95%" valign="top"><font face="Tahoma" size="3"><?=$member_no?> (<?=$member_type?>)</font></td>
      </tr>
      <tr>
        <td colspan="2" valign="top"><hr color="#CCCCCC" size="1"/></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td align="left" valign="top"><font face="Tahoma" size="3"><strong>����-ʡ��</strong></font></td>
  </tr>
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
      <tr>
        <td width="5%" valign="top">&nbsp;</td>
        <td width="95%" valign="top"><font size="3" face="Tahoma"><?=$full_name?></font></td>
      </tr>
      <tr>
        <td colspan="2" valign="top"><hr color="#CCCCCC" size="1"/></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="left" valign="top"><font face="Tahoma" size="3"><strong>�Ţ�ѵû�ЪҪ�</strong></font></td>
  </tr>
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
      <tr>
        <td width="5%" valign="top">&nbsp;</td>
        <td width="95%" valign="top"><font face="Tahoma" size="3"><?=GetFormatidcare($card_person)?></font></td>
      </tr>
      <tr>
        <td colspan="2" valign="top"><hr color="#CCCCCC" size="1"/></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="left" valign="top"><strong><font size="3" face="Tahoma">�ѹ�Դ</font></strong></td>
  </tr>
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
      <tr>
        <td width="5%" valign="top">&nbsp;</td>
        <td width="95%" valign="top"><font face="Tahoma" size="3"><?=ConvertDate($birthday,"short")?> (<?=count_member($birthday,'ym')?>)</font></td>
      </tr>
      <tr>
        <td colspan="2" valign="top"><hr color="#CCCCCC" size="1"/></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="left" valign="top"><font face="Tahoma" size="3"><strong>�ѹ�������Ҫԡ</strong></font></td>
  </tr>
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
      <tr>
        <td width="5%" valign="top">&nbsp;</td>
        <td width="95%" valign="top"><font face="Tahoma" size="3"><?=ConvertDate($member_date,"short")?> (<?=count_member($member_date,'ym')?>)</font></td>
      </tr>
      <tr>
        <td colspan="2" valign="top"><hr color="#CCCCCC" size="1"/></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="left" valign="top"><font face="Tahoma" size="3"><strong>���Ѿ����Ͷ��</strong></font></td>
  </tr>
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
      <tr>
        <td width="5%" valign="top">&nbsp;</td>
        <td width="95%" valign="top"><font face="Tahoma" size="3"><?=$mobile?> <?=$phone?></font></td>
      </tr>
      <tr>
        <td colspan="2" valign="top"><hr color="#CCCCCC" size="1"/></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="left" valign="top"><font face="Tahoma" size="3"><strong>������</strong></font></td>
  </tr>
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
      <tr>
        <td width="5%" valign="top">&nbsp;</td>
        <td width="95%" valign="top"><font size="3" face="Tahoma"><?=$email?></font></td>
      </tr>
      <tr>
        <td colspan="2" valign="top"><hr color="#CCCCCC" size="1"/></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="left" valign="top"><font face="Tahoma" size="3"><strong>���˹�</strong></font></td>
  </tr>
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
      <tr>
        <td width="5%" valign="top">&nbsp;</td>
        <td width="95%" valign="top"><font face="Tahoma" size="3"><?=$position?></font></td>
      </tr>
      <tr>
        <td colspan="2" valign="top"><hr color="#CCCCCC" size="1"/></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="left" valign="top"><font face="Tahoma" size="3"><strong>˹��§ҹ</strong></font></td>
  </tr>
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
      <tr>
        <td width="5%" valign="top">&nbsp;</td>
        <td width="95%" valign="top"><font face="Tahoma" size="3"><?=$membgroup?></font></td>
      </tr>
      <tr>
        <td colspan="2" valign="top"><hr color="#CCCCCC" size="1"/></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
</table>
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="right"><font face="Tahoma" size="4"><strong>���������ʴԡ��</strong></font><br />
      <font face="Tahoma" size="2" color="#FF6600">Member Information</font></td>
  </tr>
</table>
<hr color="#999999" size="1"/>
<table width="90%" border="0" align="center" cellpadding="3" cellspacing="4">
  <tr>
    <td colspan="2" align="left"><strong>�Թ���ʴԡ��-�Թʧ������</strong></td>
  </tr>
  <tr>
    <td width="2%" align="right" bgcolor="#66CC33">&nbsp;</td>
    <td align="left" valign="middle">���ʴԡ��ʧ��������Ҫԡ</td>

  </tr>
  <?php if($wf2 > 0) { ?>
  <tr>
    <td align="right" bgcolor="#66CC33">&nbsp;</td>
    <td align="left" valign="middle">�ͧ�ع���ʴԡ�����ͤ�����蹤�</td>
  </tr>
  <?php } ?>
  <?php if($wf3 > 0) { ?>
  <tr>
    <td align="right" bgcolor="#66CC33">&nbsp;</td>
    <td align="left" valign="middle">��Ҥ�� ��١ҭ.</td>
  </tr>
  <?php } ?>
  <?php if($wf1 != 4) { ?>
		<?php if($wf1 == 3 or $wf1 == 2) { ?>
                  <tr>
                    <td align="right" bgcolor="#66CC33">&nbsp;</td>
                    <td align="left" valign="middle"> ��.���.</td>
                  </tr>
		<?php } ?>
        <?php if($wf1 == 3 or $wf1 == 1) { ?>
              <tr>
                <td align="right" bgcolor="#66CC33">&nbsp;</td>
                <td align="left" valign="middle">��ͤ.</td>
              </tr>
			<?php } ?>
 <?php } ?>
</table>
<br/>


