<?php
session_start();
@header('Content-Type: text/html; charset=tis-620');
?>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left"><strong><font size="4" face="Tahoma">�����š�ä�ӻ�Сѹ</font></strong><br />
    <font color="#0000FF" size="2" face="Tahoma">Guarantee</font></td>
  </tr>
  <tr>
    <td align="right"><hr color="#999999" size="1"/></td>
  </tr>
</table>
<?php require "../s/s.ref_collno.php"; ?>
<?php //echo $Num_Rows; exit();?>
<?php if($Num_Rows != 0){?>  
<table width="85%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="13%" align="center" bgcolor="#FAE4EE"><strong><font color="#000000">�����Ф�ӻ�Сѹ</font></strong></td>
    <td width="88%" bgcolor="#999999"><table width="100%" border="0" cellspacing="1" cellpadding="5">
      <tr>
        <td width="20%" align="center" bgcolor="#FAE4EE">�ѭ���Ţ���</td>
        <td width="56%" align="center" bgcolor="#FAE4EE">����-ʡ�� (����¹��Ҫԡ)</td>
       <!-- <td width="24%" align="center" bgcolor="#FFCC33">˹�餧�����</td> -->
        <td width="24%" align="center" bgcolor="#FAE4EE">�ʹ�������(�ҷ)</td>
      </tr>
  	<?php for($a=0;$a<$Num_Rows;$a++) { ?>    
      <tr>
        <td align="center" bgcolor="#FFFFFF"><?=$coll_loan[$a]?></td>
		<?php if($resign_status[$a] == 1){ ?>
        <td align="left" bgcolor="#FFFFFF"><font color="red"><?=$coll_name[$a]?></font></td>
		 <?php }else{ ?>
		  <td align="left" bgcolor="#FFFFFF"><?=$coll_name[$a]?></td>
		   <?php } ?>
		 
       <!-- <td align="right" bgcolor="#FFFFFF"><//?=$coll_balance[$a]?> �ҷ</td> -->
         <td align="right" bgcolor="#FFFFFF"><?=$coll_balance[$a]?> </td>
      </tr>
      <?php } ?>   
    </table></td>
  </tr>
</table>
<?php } ?>  
<br />
<?php if($Num_Rows1 != 0){?>  
<table width="85%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="13%" align="center" bgcolor="#D0D0E9"><strong><font color="#000000">��ѡ��Сѹ</font></strong></td>
    <td width="88%" bgcolor="#999999"><table width="100%" border="0" cellspacing="1" cellpadding="5">
      <tr>
        <td width="20%" align="center" bgcolor="#D0D0E9">�ѭ���Ţ���</td>
        <td width="56%" align="center" bgcolor="#D0D0E9">����-ʡ�� (����¹��Ҫԡ)</td>
        <td width="24%" align="center" bgcolor="#D0D0E9">�ʹ�������(�ҷ)</td>
      </tr>
      <?php for($b=0;$b<$Num_Rows1;$b++) { ?>    
      <tr>
        <td align="center" valign="middle" bgcolor="#FFFFFF"><?=$coll_loan_r[$b]?></td>
        <td align="left" valign="top" bgcolor="#FFFFFF">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <?php require "../s/s.ref_collno1.php"; ?>
            <?php for($c=0;$c<$Num_Rows2;$c++) { ?>    
              <tr>
			  
                  <?php if($resign_status[$c] == 1){ ?>
				  
                <td align="left"><font color="red"><?=$who_coll_name[$c]?></font></td>
				
				  <?php }else{ ?>
				  
				 <td align="left"><?=$who_coll_name[$c]?></td> 
				  <?php } ?>
                
              </tr>
              <?php } ?> 
            </table>
        </td>
        <td align="right" bgcolor="#FFFFFF"><?=$principal_balance[$b]?></td>
        <!--<td align="right" bgcolor="#FFFFFF">&nbsp;</td>-->
       <!-- <td align="right" bgcolor="#FFFFFF"><?//=$collactive_amt1[$c]?></td>  -->
          </tr>
      <?php //} ?> 
      <?php } ?>  
      
    </table>
    </td>
  </tr>
</table>
<?php } ?>  
<table width="85%" border="0" align="center" cellpadding="0" cellspacing="3">
  <tr>
    <td align="right"><font color="#0000FF">* �к����ʴ�੾���ѭ�ҷ���� <strong>�ؤ��</strong>  ��ӻ�Сѹ��ҹ��</font></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
  </tr>
</table>
