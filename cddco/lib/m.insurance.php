<?php
session_start();
@header('Content-Type: text/html; charset=tis-620');
?><head>
	<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<?php
require "../s/s.Insurance.php";
?>



<table width="95%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="right"><strong><font size="4" face="Tahoma">�����Ż�Сѹ</font></strong><br />
    <font color="#FF6600" size="2" face="Tahoma">Insurance</font></td>
  </tr>
</table>
<hr color="#999999" size="1"/>
<div data-role="collapsible-set" data-theme="b" data-content-theme="d">
     <ul data-role="listview" data-inset="true">
        <?php for($i=0;$i<$Num_Rows;$i++) {  ?>
    <li>��  <?php echo $insure_year[$i] ?> (�����������ͧ  <?php echo $startinsure_date[$i] ?> - <?php echo $expinsure_date[$i] ?>)</li>
        <?php } ?>
	</ul>
    <div data-role="collapsible">
        <h2>�����Ż�Сѹ��Ҫԡ</h2>
        <ul data-role="listview" data-theme="d" data-divider-theme="d">
            
          	  <?php 

 			for($i=0;$i<$Num_Rows;$i++) { 
			
			//echo $insuretype_code_f[$i] ;
			
			   ?>
            <li>             
                <p>���� - ʡ�� : <?=$fullname[$i] ?></p>
                <p>Ἱ : <?=$insuretype_code_f[$i] ?></p>
                <p>������� : <?=$insurance_amt_f[$i] ?></p>
                <p>�Թ��Сѹ : <?=$insurance_money[$i] ?></p>
            </li>
             <?php } ?>   
        </ul>
    </div>
    <?php 
		if($Num_Rows1 > 0 ){
	?>
     <div data-role="collapsible">
        <h2>��Ҫԡ��Сѹ����</h2>
        <ul data-role="listview" data-theme="d" data-divider-theme="d">
            
          	  <?php 

 			for($n=0; $n <$Num_Rows1; $n++) { 
			   ?>
            <li>             
                <p>���� - ʡ�� : <?=$insurejoin_name[$n] ?></p>
                <p>Ἱ : <?=$insuretype_code[$n] ?></p>
                <p>������� : <?=$insurance_amt[$n] ?></p>
                <p>��������ѹ�� : <?=$gain_concern[$n] ?></p>
            </li>
             <?php } ?>   
        </ul>
    </div>
     <?php } ?>  
    <ul data-role="listview" data-inset="true">
        <?php for($i=0;$i<$Num_Rows;$i++) {  ?>
    <li><font color="#FF0000">** ����Ѻ��Ҫԡ�ˡó��͡������»�Сѹ��� 550.00 �ҷ</font></li>
	<li><font color="#3300FF">** �����Ż�Сѹ Ἱ1 = 100,000 �ҷ/ Ἱ2 = 200,000 �ҷ / Ἱ3 = 300,000 �ҷ</font></li>
        <?php } ?>
	</ul>
</div>
