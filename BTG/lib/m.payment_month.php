<?php
session_start();
@header('Content-Type: text/html; charset=tis-620');
//$fixdate = date('10-m-Y'); //��˹���������ʴ� �ѡ�����͹��ѧ�ѹ��� ��˹�
//$fixdate = null; //��˹���������ʴ� �ѡ�����͹ ������
?>
<center><div ><a href="index.php" data-role="button" data-corners="false"  data-icon="arrow-l" data-theme="f">������ѡ </a></div></center>
<table width="95%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="right"><strong><font size="4" face="Tahoma">���������͹</font></strong><br />
      <font color="#FF6600" size="2" face="Tahoma">Monthly Payment</font></td>
  </tr>
</table>
<hr color="#999999" size="1"/>
<?php require "../s/s.payment_month.php"; ?>
<ul data-role="listview" data-theme="d"  data-count-theme="a" data-inset="true">
<?php
$j=0;
for($i=0;$i<$Num_Rows;$i++){
$recv_period = $list_info[$i][0];
		$prnamt = $list_info[$i][1];
		$intamt = $list_info[$i][2];
?>
    <li><font size="3">�Ǵ : <?=$recv_period?><br>���Թ :  <?=$prnamt ?> �ҷ <br> �͡���� : <?=$intamt ?> �ҷ<font size="3"><span class="ui-li-count"><?=$prnamt+$intamt ?></font></span></font></li>
<?php } ?>
<li><a href="info.php?menu=Payment1_month">����</a></li>
</ul>