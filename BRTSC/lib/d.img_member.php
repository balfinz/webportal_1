<?php
session_start();
@header('Content-Type: text/html; charset=tis-620');
	require "../include/conf.d.php";
?>

<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />

<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"class="txtShadow1">
  <tr>
    <td align="left"><strong><font size="4" face="Tahoma">�������ٻ�������Ҫԡ</font></strong><br />
    <font color="#FF6600" size="2" face="Tahoma">Img Member</font></td>
  </tr>
  <tr>
    <td align="left"><hr color="#999999" size="1"/></td>
  </tr>
</table>

<?php
$arrayMth = array("���Ҥ�","����Ҿѹ��","�չҤ�","����¹","����Ҥ�","�Զع�¹","�á�Ҥ�","�ԧ�Ҥ�","�ѹ��¹","���Ҥ�","��Ȩԡ�¹","�ѹ�Ҥ�");

$strSQL = "SELECT 
ROW_NUMBER() OVER (ORDER BY SEQ_NO desc) AS SEQ_NO_S,
SEQ_NO,
ENTRY_ID,
TO_CHAR(STARTUP_DATE, 'DD/MM/YYYY','NLS_CALENDAR=''THAI BUDDHA') AS STARTUP_DATE,
REPLACE(PICTURE_PATH, 'X:\', '') as PICTURE_PATH
FROM (SELECT SEQ_NO,ENTRY_ID,STARTUP_DATE,PICTURE_PATH FROM MBMEMBPICDET WHERE  MEMBER_NO = '$member_no' AND COOP_ID = '045001' ORDER BY SEQ_NO desc )
                                                    ";
					$value = array('SEQ_NO_S','SEQ_NO','ENTRY_ID','STARTUP_DATE','PICTURE_PATH');
					list($Num_Rows,$list_info) = get_value_many_oci($strSQL,$value);
					$j=0;
					for($i=0;$i<$Num_Rows;$i++){
						$seq_no_s[$i] = $list_info[$i][$j++];
						$seq_no [$i]= $list_info[$i][$j++];
                                                $entry_id[$i] = $list_info[$i][$j++];
                                                $startup_date[$i] = $list_info[$i][$j++];
                                                $picture_path[$i] = $list_info[$i][$j++];
                                                $picture_path[$i] = "http://192.168.1.172/BRM/GCOOP/Saving/image/signature/".$picture_path[$i];

						$j=0;
					}

	//  Ẻ����� ��/����¹ ������ҧ�����ͪ���
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<font face='AngsanaUPC'size='+2'><font color='#ff3333'><b>��ǹ���Ŵ </b></font>--> <b><i>";
	if($Num_Rows > 0){echo "<a href='http://w2.br-tsc.com/download/changeSignature.pdf'target='_blank'>Ẻ�����������¹�ŧ�����ͪ���</a>";}
	else	{echo "<a href='http://w2.br-tsc.com/download/repSignature.pdf'target='_blank'>Ẻ������駵�����ҧ�����ͪ���</a>";}
	echo "</i></b></font>";
 ?>

 <br/>
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#999999">
		<table width="100%" border="0" cellspacing="1" cellpadding="3">
		<?php 
			for($i=0;$i<$Num_Rows;$i++)
			{
				$txtD = intval(substr($startup_date[$i],0,2));
				$txtM = intval(substr($startup_date[$i],3,2)) - 1;
				$txtM = $arrayMth[$txtM];												
				$txtY = substr($startup_date[$i],6,4);							
				$txtDate = $txtD."&nbsp;".$txtM."&nbsp;".$txtY;
			
		?>
		  <tr>
			<td width="5%"height="33"align="center"bgcolor="#00B9FF"><strong>�ӴѺ���</strong></td>
			<!-- <td width="13%" align="center" bgcolor="#CCCCFF"><strong>���ѹ�֡</strong></td> 
			<td width="13%" align="center" bgcolor="#CCCCFF"><strong>PATH FILE </strong></td> -->
			<td width="13%"align="center"bgcolor="#00B9FF"><strong>�ѹ����Ѿ��Ŵ</strong></td>
			<td width="13%"align="center"bgcolor="#00B9FF"><strong>�ٻ���ૹ��</strong></td>
		  </tr>
		  <tr>
			<td height="27"valign="top"align="center"bgcolor="#FFFFFF"><?=$seq_no_s[$i]?></td>
			<!-- <td align="center" bgcolor="#FFFFFF"><?//=$entry_id[$i]?></td>
			<td align="left" bgcolor="#FFFFFF"><?//=$picture_path[$i]?></td> -->
			<td valign="top"align="center"bgcolor="#FFFFFF"><?=$txtDate?></font></td>
			<td valign="top"align="center"bgcolor="#FFFFFF"><img src = "<?=$picture_path[$i]?>" width="250" height="180"></td>
		  </tr>
		  <?php } ?>
		  
		</table>
	</td>
  </tr>
</table>
<p>&nbsp;</p>
