<?php
session_start();
$member_no = $_SESSION['ses_member_no'];
@header('Content-Type: text/html; charset=tis-620');
?><head>
	<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<center><div ><a href="index.php" data-role="button" data-corners="false"  data-icon="arrow-l" data-theme="f">������ѡ </a></div></center>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="right"><strong><font size="4" face="Tahoma">����¡���Թ�ҡ</font></strong><br />
      <font color="#FF6600" size="2" face="Tahoma">Saving</font></td>
  </tr>
</table>
<hr color="#999999" size="1"/>
<?php 		  
 require "../s/s.deposit.php";
$i=$_GET["i"];settype($i,"integer");
 require "../s/s.deposit1.php";
$n=$_GET["n"];settype($n,"integer");

 ?>
<ul data-role="listview" data-inset="true">

          <li>
                <h3><?= GetFormatDep($acc_no[$n])  ?></h3>                
                <p>���ͺѭ�� : <?= $acc_name[$n] ?></p>
                <p><font color="red" size="3"><strong>������� : <?=  number_format($acc_balance[$n],2) ?> �</strong></font></p>
                <p>����¡������ش : <?=$operate_date[$n]?></p> <p>����¡������ش : <?=$operate_date[$n]?></p>				
				
            </li> 
			<li>
				<h2>��������´</h2>
				<table > 
				<tr><td align="center"><p><strong>�ѹ���</strong></p></td> 
				<td align="center"><p><strong>��¡��</strong></p></td> 
				<td align="right"><p><strong>�ʹ����¡��</strong></p></td>
				<td align="right"><p><strong>�������</strong></p></td>
				</tr>
				   <?php
				require "../s/s.dept3.php";
				for($n=0;$n<$Num_Rows22;$n++){ 
				 
				 ?>      
              
 
			 <?php if($shritemtype_code[$n]=="SUM"){ ?>
			    
			   <tr valign="middle"> 
			   <td align="right"><p><?=$operate_date[$n] ?></p></td>
			   <td align="right"><p><?=$shritemtype_desc[$n] ?></p></td>
			   <td align="right" valign="middle"><p><?=number_format($share_amount[$n] ,2)?></p></td>
			   <td align="right" valign="middle"><p><?=number_format($sharestk_amt[$n],2) ?></p></td>
			   </tr>
			   <?php }else if(substr($shritemtype_code[$n],0,1)=="W"  ){    ?>
			    <tr valign="middle"> 
			   <td align="center"><p><font color="red"><?=$operate_date[$n] ?></font></p></td>
			   <td align="center"><p><font color="red"><?=$shritemtype_desc[$n] ?></font></p></td>
			   <td align="right"><p><font color="red"> -<?=number_format($share_amount[$n] ,2)?></font></p></td>
			   <td align="right"><p><font color="red"><?=number_format($sharestk_amt[$n],2) ?></font></p></td>
			   </tr>
			   <?php }else if(substr($shritemtype_code[$n],0,1)=="D" ||substr($shritemtype_code[$n],0,1)=="I"||substr($shritemtype_code[$n],0,1)=="O"      ){    ?>
			    <tr   > 
			   <td align="center"><p><font color="green"><?=$operate_date[$n] ?></font></p></td>
			   <td align="center"><p><font color="green"><?=$shritemtype_desc[$n] ?></font></p></td>
			   <td align="right"><p><font color="green">+<?=number_format($share_amount[$n] ,2)?></font></p></td>
			   <td align="right"><p><font color="green"><?=number_format($sharestk_amt[$n],2) ?></font></p></td>
			   </tr>
			   <?php }else {  ?>
			    <tr  valign="middle"> 
			   <td align="center"><p><?=$operate_date[$n] ?></p></td>
			   <td align="center"><p><?=$shritemtype_desc[$n] ?></p></td>
			   <td align="right"><p>+<?=number_format($share_amount[$n] ,2)?></p></td>
			   <td align="right"><p><?=number_format($sharestk_amt[$n],2) ?></p></td>
			   </tr>
			   
			   <?php }} ?> 
				</table>
			</li>	
</ul>
<center><div ><a href="info.php?menu=Deposit" data-role="button" data-corners="false"  data-icon="arrow-l" data-theme="b">��Ѻ� </a></div></center>
