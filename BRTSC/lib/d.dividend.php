<?php
session_start();
@header('Content-Type: text/html; charset=tis-620');
require "../include/conf.d.php";
?><head>
	<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<?php  
	require "../s/s.dividend.php";
	$txtYear = substr($divyear,0,4);		//  ��
	$txtNo = substr($divyear,4,5);			//  �ͺ���

?>
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"class="txtShadow1"bgcolor="#87CEFF">
  <tr>
    <td width="86%" align="left"><strong><font size="+3" face="AngsanaUPC">&nbsp;&nbsp;&nbsp;&nbsp;�ѹ�� - ����¤׹ ��Шӻ�  <?=$txtYear?> &nbsp;
	( <u>�ͺ��� <?=$txtNo?></u> )</font></strong><br />
    <font color="#FF6600" size="2" face="Tahoma">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>Dividend & Returning</i></font></td>
    <td width="14%" align="right" valign="top"><br>���͡ �ͺ�ѹ��� &nbsp;&nbsp;&nbsp;&nbsp;
    <form id="formID1" name="formID1" method="post" action="" >
        <select name="divyear" id="divyear"  onchange="this.form.submit()" >
            <option value=""> --- �ͺ�ѹ��� ---</option>
                  <?php  					  
                    for($i=0  ; $i <= ($maxdiv-$mindiv) ; $i++)
					{
						if(($maxdiv-$i) < 2557){continue;}
						else
						{
							$txtMaxDiv = $maxdiv-$i;
							$txtY = substr($txtMaxDiv,0,4);			//  ��
							$txtN = substr($txtMaxDiv,4,5);			//  �ͺ���
							
							//  �����繻ѹ��-����¤׹���л�
							if($divyear == "25611"){$txtDiv = "6.25";$txtAvg="11.00";}
							else if($divyear == "25612"){$txtDiv = "0.20";$txtAvg="2.91";}
							else if($divyear == "25621"){$txtDiv = "6.25";$txtAvg="11.00";}
							else if($divyear == "25622"){$txtDiv = "0.20";$txtAvg="3.13";}
							else if($divyear == "25631"){$txtDiv = "6.20";$txtAvg="10.00";}
							else if($divyear == "25632"){$txtDiv = "0.05";$txtAvg="3.17";}

							if ($txtN>0 AND $txtN<3){echo '<option value="'.($maxdiv-$i).'">�� :  '.$txtY.' �ͺ��� '.$txtN.'</option>';}
						}
                    }		//  END for(...)
                   ?>
    	</select>&nbsp;&nbsp;&nbsp;&nbsp;
    </form></td>
  </tr>
  <tr>
    <td colspan="2" align="right"><hr color="#999999" size="1"/></td>
  </tr>
	
	</table>
	<table width="95%" border="0" align="center" cellpadding="5" cellspacing="3"class="txtShadow2">
	  <tr>
		<td width="50%" height="35" align="center" bgcolor="#A8F552"><font face="AngsanaUPC"size="+3"><b>�ѹ��</b> ( <?=$txtDiv;?> % )</font></td>
		<td width="50%" align="center" bgcolor="#A8F552"><font face="AngsanaUPC"size="+3"><b>����¤׹</b> ( <?=$txtAvg;?> % )</strong></td>
	  </tr>
	  <tr>
		<td height="35" align="center">
			<font face="AngsanaUPC"size="+4"color="#3232FF"><b><?=$div_balamt?>&nbsp;&nbsp;<font size="+3"color="#555555">�ҷ</font></b></font>
		</td>
		<td align="center">
			<font face="AngsanaUPC"size="+4"color="#3232FF"><b><?=$avg_balamt?>&nbsp;&nbsp;<font size="+3"color="#555555">�ҷ</font></b></font>
		</td>
	  </tr>
	  <tr>
		<td height="35" colspan="2" align="center" bgcolor="#A8F552"><font face="AngsanaUPC"size="+3" ><strong>��� �ѹ��-����¤׹&nbsp;&nbsp;&nbsp;=&nbsp;&nbsp;&nbsp;
		<font face="AngsanaUPC"size="+4" color="#FF6633"> <?=$sumdiv?> </font>&nbsp;&nbsp;&nbsp; �ҷ</strong></font></td>
	  </tr>

	</table>
	<br><br>

<?php if($Num_div1 != 0){ ?>
<!--table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"class="txtShadow1">
  <tr>
    <td width="86%" align="left"><strong><font size="4" face="Tahoma">�Ըա���Ѻ�Թ</font></strong><br />
      <font color="#FF6600" size="2" face="Tahoma">How to Get Paid</font></td>
    <td width="14%" align="right" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="right"><hr color="#999999" size="1"/></td>
  </tr>
</table>
<table width="45%" border="0" align="center" cellpadding="1" cellspacing="4">
  <tr>
    <td height="21" colspan="3" align="left"><p><font size="3">
      <?=$typepay ?> 
      ��� <?=$bank_desc ?>
      <br />
    </font><font size="3">�Ţ���ѭ��
  <?=$bank_acc ?> <strong><font color="#0000CC"> <br />
  �ӹǹ�Թ
<?=$totalpay ?>
    </font></strong></font></p></td>
  </tr>
</table-->

<?php } ?>

<table width="75%" border="0" align="center" cellpadding="0" cellspacing="3">
  <tr>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td align="right"><font color="#FF0000">* ��سҵ�Ǩ�ͺ�ա���駡Ѻ�ҧ�ˡó�</font></td>
  </tr>
</table>
