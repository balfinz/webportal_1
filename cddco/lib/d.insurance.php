<?php
session_start();
@header('Content-Type: text/html; charset=tis-620');
?><head>
	<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<?php  require "../s/s.dividend.php";  ?>
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
  <td width="86%" align="left"><strong><font size="4" face="Tahoma">�����Ż�Сѹ</font></strong><br />
    <font color="#FF6600" size="2" face="Tahoma">Insurance</font></td>
    <td width="14%" align="right" valign="top">
    <tr>
	</table>
	
	 <tr>
    <td colspan="2" align="right"><hr color="#999999" size="1"/></td>
  </tr>


<?php require "../s/s.Insurance.php";  ?>

<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
<?php for($i=0;$i<$Num_Rows;$i++){ ?>
  <tr>
  <td width="86%" align="left"><strong><font size="3" face="Tahoma">��  <?php echo $insure_year[$i] ?> (�����������ͧ  <?php echo $startinsure_date[$i] ?> - <?php echo $expinsure_date[$i] ?>)</font></strong><br />
    <td width="14%" align="right" valign="top">
    <tr>
	 <?php } ?>
	</table>
	
	<br>

<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
 
  <tr>
    <td bgcolor="#999999"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td align="left" bgcolor="#CCCCFF"><table width="100%" border="0" cellspacing="3" cellpadding="3">
          
        </table></td>
        </tr>
      <tr>
        <td align="left" bgcolor="#CCCCCC"><table width="100%" border="0" cellspacing="1" cellpadding="3">
          <tr>
            <td width="25%" align="center" bgcolor="#CCCCFF"><strong>���� - ʡ��</font></strong></td>
            <td width="15%" height="25" align="center" bgcolor="#CCCCFF"><strong>Ἱ</strong></td>
			<td width="15%" height="25" align="center" bgcolor="#CCCCFF"><strong>�������</strong></td>
            <td width="15%" align="center" bgcolor="#CCCCFF"><strong>�Թ��Сѹ</strong></td>
          </tr>
          <?php for($i=0;$i<$Num_Rows;$i++){ ?>
	  <tr>
            <td align="center"  bgcolor="#FFFFFF"><?php echo $fullname[$i] ?></td>
	    <td align="center"  bgcolor="#FFFFFF"><?php echo $insuretype_code_f[$i] ?></td>
		 <td align="right"  bgcolor="#FFFFFF"><?php echo $insurance_amt_f[$i] ?></td>
            <td align="right"  bgcolor="#FFFFFF"><?php echo $insurance_money[$i] ?></td>
           </tr>
          <?php } ?>
        </table></td>
      </tr>
	  
    </table></td>
  </tr>
 
</table>
  
  <br>
  
  <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
  <td width="86%" align="left"><strong><font size="3" face="Tahoma"><u>��Ҫԡ��Сѹ����</u></font></strong><br />
    
    <td width="14%" align="right" valign="top">
    <tr>
	</table>
	
	
  
   <br>
  
  <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
 
  <tr>
    <td bgcolor="#999999"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td align="left" bgcolor="#CCCCFF"><table width="100%" border="0" cellspacing="3" cellpadding="3">
          
        </table></td>
        </tr>
      <tr>
        <td align="left" bgcolor="#CCCCCC"><table width="100%" border="0" cellspacing="1" cellpadding="3">
          <tr>
            <td width="5%" align="center" bgcolor="#CCCCFF"><strong>�ӴѺ</font></strong></td>
            <td width="20%" height="25" align="center" bgcolor="#CCCCFF"><strong>���� - ʡ��</strong></td>
            <!--<td width="15%" align="center" bgcolor="#CCCCFF"><strong>�������</strong></td>-->
            <td width="15%" align="center" bgcolor="#CCCCFF"><strong>Ἱ</strong></td>
            <td width="15%" align="center" bgcolor="#CCCCFF"><strong>�������</strong></td>
            <!--<td width="15%" align="center" bgcolor="#CCCCFF"><strong>��ê���</strong></td>-->
            <td width="15%" align="center" bgcolor="#CCCCFF"><strong>��������ѹ��</strong></td>
          </tr>
          <?php //require "../s/s.Insurance.php"; 
          for($n=0; $n <$Num_Rows1; $n++){ ?>
	  <tr>
            <td align="center"  bgcolor="#FFFFFF"><?php echo $n+1 ?></td>
	    <td align="center"  bgcolor="#FFFFFF"><?php echo $insurejoin_name[$n] ?></td>
            <!--<td align="center"  bgcolor="#FFFFFF"></td>-->
            <td align="center"  bgcolor="#FFFFFF"><?php echo $insuretype_code[$n] ?></td>
	    <td align="right" bgcolor="#FFFFFF"><?php echo $insurance_amt[$n] ?></td>
            <!--<td align="center" bgcolor="#FFFFFF"><?php //echo $insurepay_status[$n] ?></td>-->
            <td align="center"  bgcolor="#FFFFFF"><?php echo $gain_concern[$n] ?></td>
           </tr>
          <?php } ?>
        </table></td>
      </tr>
	  
    </table></td>
  </tr>
 
</table>
   
   <br>
   
   <table width="85%" border="0" align="left" cellpadding="0" cellspacing="3">
  <tr>
    <td align="left"><font color="#FF0000">** ����Ѻ��Ҫԡ�ˡó��͡������»�Сѹ��� 550.00 �ҷ</font></td>
  </tr>
  <tr>
  </tr>
  <td align="left"><font color="#3300FF">** �����Ż�Сѹ Ἱ1 = 100,000 �ҷ/ Ἱ2 = 200,000 �ҷ / Ἱ3 = 300,000 �ҷ</font></td>
  <tr>
    <td align="right">&nbsp;</td>
  </tr>
</table>
   
<p>&nbsp;</p>