<?php
session_start();
@header('Content-Type: text/html; charset=tis-620');
?><head>
	<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<?php
require "../s/s.deposit.php";
?>



<table width="95%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="right"><strong><font size="4" face="Tahoma">�����źѭ���Թ�ҡ</font></strong><br />
    <font color="#FF6600" size="2" face="Tahoma">Saving</font></td>
  </tr>
</table>
<hr color="#999999" size="1"/>
<div data-role="collapsible-set" data-theme="b" data-content-theme="d">
 <?php for($i = 0 ; $i < $Num_Rows ; $i ++) { ?>
    <div data-role="collapsible">
        
          <?php if($dep_desc[$i] == "�����Ѿ������������آ 2") {  ?>
        
        <h2>�����Ѿ������������آ 4</h2>
        
          <?php } else { ?>
        <h2><?=$dep_desc[$i]?></h2>
          <?php } ?>
        <ul data-role="listview" data-theme="d" data-divider-theme="d">
            <li data-role="list-divider">�ӹǹ <?=$acc_count[$i]?> �ѭ��</li>
          	  <?php 
			   require "../s/s.deposit1.php";
			   for($n = 0 ; $n < $Num_Rows1 ; $n ++) {
			   ?>
            <li>
                <h3><?= GetFormatDep($acc_no[$n])  ?></h3>                
                <p>���ͺѭ�� : <?= $acc_name[$n] ?></p>
                <p><font color="red" size="3"><strong>������� : <?=  number_format($acc_balance[$n],2) ?> �</strong></font></p>
                <p>����¡������ش : <?=$operate_date[$n]?></p>
            </li>
             <?php } ?>   
        </ul>
    </div>
 <?php } ?>   
</div>
