<?php
session_start();
@header('Content-Type: text/html; charset=tis-620');
require "../s/s.Beneficiary.php";
?>

<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />

<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="right"><strong><font size="4" face="Tahoma">����Ѻ�͹����ª��</font></strong><br />
    <font color="#FF6600" size="2" face="Tahoma">Beneficiary</font></td>
  </tr>
  <tr>
    <td align="left"><hr color="#999999" size="1"/></td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="left"><table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
	
	<!--<center><font color="red"><h3>* ��й�����������ҧ��û�Ѻ��ا������ ����Ѻ�͹����ª��</h3></center>-->
	<br>
	
      <tr>
        <td bgcolor="#999999"><table width="750" border="0" align="center" cellpadding="4" cellspacing="1">
          <tr>
            <td width="41" height="41" align="center" bgcolor="#FFFF99"><strong>�ӴѺ</strong></td>
            <td width="145" align="center" bgcolor="#FFFF99"><strong>����-ʡ��</strong></td>
            <!--<td width="342" align="center" bgcolor="#FFFF99"><strong>�������</strong></td>-->
            <td width="105" align="center" bgcolor="#FFFF99"><strong>��������ѹ��</strong></td>
            <!--<td width="71" align="center" bgcolor="#FFFF99"><strong>�����˵�</strong></td>-->
          </tr>
          <?php  for($i=0;$i<$Num_Rowsadd;$i++){ ?>
          <tr>
            <td align="center" bgcolor="#FFFFFF"><?=$i+1?>.</td>
            <td align="left" bgcolor="#FFFFFF"><?=$mg_fullname[$i] ?></td>
            <!--<td align="left" bgcolor="#FFFFFF"><?//=$mg_address[$i]?></td>-->
            <td align="center" bgcolor="#FFFFFF"><?=$mg_relation[$i] ?></td>
            <!--<td align="center" bgcolor="#FFFFFF"><?//=$mg_remark[$i]?></td>-->
          </tr>
          <?php } ?>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<br/>
