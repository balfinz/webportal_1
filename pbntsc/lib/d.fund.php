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
  <td width="86%" align="left"><strong><font size="4" face="Tahoma">�����šͧ�ع</font></strong><br />
    <font color="#FF6600" size="2" face="Tahoma">Fund Information</font></td>
    <td width="14%" align="right" valign="top">
    <tr>
	</table>
	
	 <tr>
    <td colspan="2" align="right"><hr color="#999999" size="1"/></td>
  </tr>

<!--<table width="75%" border="0" align="center" cellpadding="0" cellspacing="3">
  <tr>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><font size = "5" color="#FF0000">** �ͻ�Ѻ��ا������ **</font></td>
  </tr>
</table>-->

<?php require "../s/s.Benefits.php";  ?>

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
            <!--<td width="20%" height="25" align="center" bgcolor="#FFFFFF"><strong>���¤׹�͡���� <br>� 31 �.�. 2559</strong></td>
            <td width="13%" align="center" bgcolor="#FFFFFF"><strong>�Թ�ͧ�ع����</strong></td>
	    <td width="47%" align="center" bgcolor="#FFFFFF"><strong>���¤׹�Թ�ͧ�ع �������º�ͧ�ع �.�. 2557 <br>���������� (���駷��1) �.�. 2559 <font color = "green">� �ѹ��� 8 �.�. 2559</font></strong></td>
		   <td width="20%" align="center" bgcolor="#FFFFFF"><strong>�Թ�ͧ�ع�����������</strong></td>-->
		   
		   <td width="100%" align="center" bgcolor="#FFFFFF"><strong>�Թ�ͧ�ع�����������</strong></td>
            
          </tr>
		<!--  <tr>
		    <?php //if($interest_return != 0){ ?>
            <td height="25" align="right" bgcolor="#FFFFFF"><font color = "red"><b><?php //$interest_return_full ?></b></font></td>
			<?php //} else { ?>
			<td height="25" align="right" bgcolor="#FFFFFF"></td>
			<?php //} ?>
            <td align="right" align="right" bgcolor="#FFFFFF"><?php //echo $fundbalance_full; ?></td>
            <td align="right" align="right" bgcolor="#FFFFFF"><font color = "#3633FF"><b><?php //echo $fundarrear_amt_full ; ?><b></font></td>
			 <td align="right" align="right" bgcolor="#FFFFFF"><?php //echo $fundbalance_2_full; ?></td>

          </tr>-->
		      <tr>
			   <td align="center" align="center" bgcolor="#FFFFFF"><?php echo $fundbalance_2_full; ?></td>
			      </tr>
		   <!--<tr>
		  <td height="25" bgcolor="#FFFFFF"></td>
		  <td height="25" bgcolor="#FFFFFF"></td>
		  <td height="25" bgcolor="#FFFFFF"></td>
		  <td height="25" bgcolor="#FFFFFF"></td>
		  </tr>-->
		  <tr>
		  <td height="25" bgcolor="#FFFFFF" colspan="4" align="center"><font color = "purple"><b>**�����Թ�׹�ͧ�ع��������ͼ���ӻ�Сѹ����Ҫԡ��������Թ 10,000 �ҷ������ҹ��</b></font></td>
		  <!--<td height="25" bgcolor="#FFFFFF"></td>
		  <td height="25" bgcolor="#FFFFFF"></td>
		  <td height="25" bgcolor="#FFFFFF"></td>-->
		  </tr>
		  
		  
          <?php ?>
        </table></td>
      </tr>
	  
    </table></td>
  </tr>
 
</table>
