<?php
session_start();
@header('Content-Type: text/html; charset=tis-620');
?><head>
	<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<?php
require "../s/s.ref_collno.php";
?>
<center><div ><a href="index.php" data-role="button" data-corners="false"  data-icon="arrow-l" data-theme="f">������ѡ </a></div></center>
<table width="95%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="right"><strong><font size="4" face="Tahoma">�����š�ä�ӻ�Сѹ</font></strong><br />
    <font color="#FF6600" size="2" face="Tahoma">Guarantee</font></td>
  </tr>
</table>
<hr color="#999999" size="1"/>
<div data-role="collapsible-set" data-theme="b" data-content-theme="d">
    <div data-role="collapsible">
        <h2>�س�����</h2>
        <ul data-role="listview" data-theme="d" data-divider-theme="d">
            <li data-role="list-divider">�ӹǹ <?=$Num_Rows?> �ѭ��</li>
          	  <?php 

 			for($i = 0 ; $i < $Num_Rows ; $i ++) { 
			   ?>
            <li>
                <h3><?= $coll_loan[$i] ?></h3>                
                <p>��Ңͧ�ѭ�� : <?=$coll_name_m[$i] ?></p>
                <p>����¹��Ҫԡ : <?=$ref_no[$i] ?></p>
                <p><font color="red" size="2"><strong>˹�餧����� : <?= $coll_balance[$i] ?> �</strong></font></p>
            </li>
             <?php } ?>   
        </ul>
    </div>
    <?php 
		if($Num_Rows1 > 0 ){
	?>
    <div data-role="collapsible">
        <h2>�ä�Ӥس</h2>
        <ul data-role="listview" data-theme="d" data-divider-theme="d">
            <li data-role="list-divider">�ӹǹ <?=$Num_Rows1?> �ѭ��</li>
          	<?php for($b=0;$b<$Num_Rows1;$b++){ ?>
            <li>
                <h3><font color="red"><strong><?=$coll_loan_r[$b]?></strong></font></h3> 
                <?php
				require "../s/s.ref_collno1.php";
				for($n=0;$n<$Num_Rows2;$n++){ 
				 ?>      
                <p><?=$who_coll_name[$n] ?></p>
                <?php } ?>
            </li>
           <?php } ?>   
        </ul>
    </div> 
     <?php } ?>      
</div>
