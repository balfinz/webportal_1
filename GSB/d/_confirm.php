<?php
session_start();
header('Content-Type: text/html; charset=tis-620');
$ses_userid =$_SESSION[ses_userid];
$member_no = $_SESSION[ses_member_no];
if($ses_userid <> session_id() or $member_no ==""){
	header("Location: index.php");
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
   <script langauge="javascript">
    function checkconfirmclosewindow(){ if(true){	window.close();	}}
	function printdiv(printpage){
		var headstr = "<html><head><title></title></head><body>";
		var footstr = "</body>";
		var newstr = document.all.item(printpage).innerHTML;
		var oldstr = document.body.innerHTML;
		document.body.innerHTML = headstr+newstr+footstr;
		window.print();
		document.body.innerHTML = oldstr;
		return false;
	}
	</script>
    <style type="text/css">
        @page 
        {
            size: auto;   /* auto is the current printer page size */
            margin: 5mm;  /* this affects the margin in the printer settings */

        }

        body 
        {
            background-color:#FFFFFF; 
            border: solid 0px black ;
            margin: 0.2px;  /* the margin on the content before printing */

       }
		body,td,th {
			font-family: Tahoma, Geneva, sans-serif;
			font-size: 13px;
			color: #000;
		}

</style>
<?php
$t_month=array("","���Ҥ�","����Ҿѹ��","�չҤ�","����¹","����Ҥ�","�Զع�¹","�á�Ҥ�","�ԧ�Ҥ�","�ѹ��¹","���Ҥ�","��Ȩԡ�¹","�ѹ�Ҥ�");
$day = date('d');
$month = date('m');
$year = date('Y')+543;
$today = $day.'  '.$t_month[intval($month)].'  '.$year;

$chk_date = $day.'/'.$month.'/'.$year;

	require "../include/conf.conn.php";
	require "../include/conf.c.php";
	require "../include/lib.Etc.php";
	require "../include/lib.Oracle.php";
	require "../include/lib.MySql.php";
	require "../s/s.member_info.php";
	require "../s/s.Confirm.php";
	//require "../s/s.Beneficiary.php";
	require "../s/s.ref_collno.php";
	require "../s/s.ref_collno1.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
<?php
	$confirm_start;
 $stat_date = DateDiff($confirm_start,$chk_date);
 $mbmemb_date = DateDiff(ConvertDate($member_date,'num'),$confirm_day);
 $end_date = DateDiff($confirm_end,$chk_date);

/*if($stat_date  < 0){
	//echo '�ѧ���֧���ҡ���׹�ѹ�ʹ';
	echo '<script type="text/javascript"> window.alert("������ �к��ѧ����Դ����׹�ѹ�ʹ") </script> ';
	echo "<script>window.location = 'info.php'</script>";
	exit;
}
if($end_date  > 0){
	//echo '��¡�˹����ҡ���׹�ѹ�ʹ����';
	echo '<script type="text/javascript"> window.alert("������ ��ҹ������׹�ѹ�����ǧ���ҷ���ˡó��˹� ��سҵԴ����ˡó�") </script> ';
	echo "<script>window.location = 'info.php'</script>";
	exit;
}
if($mbmemb_date  < 0){
	//echo '���ء������Ҫԡ';
	echo '<script type="text/javascript"> window.alert("������ ��ҹ����բ������׹�ѹ�ʹ ���ͧ�ҡ��ҹ����Ҫԡ��ѧ��û����ż��׹�ѹ�ʹ") </script> ';
	echo "<script>window.location = 'info.php'</script>";
	exit;
}
*/
?>

<style type="text/css">
.button1 {	background-color:#79bbff;
	-webkit-border-top-left-radius:3px;
	-moz-border-radius-topleft:3px;
	border-top-left-radius:3px;
	-webkit-border-top-right-radius:3px;
	-moz-border-radius-topright:3px;
	border-top-right-radius:3px;
	-webkit-border-bottom-right-radius:3px;
	-moz-border-radius-bottomright:3px;
	border-bottom-right-radius:3px;
	-webkit-border-bottom-left-radius:3px;
	-moz-border-radius-bottomleft:3px;
	border-bottom-left-radius:3px;
	text-indent:0px;
	border:1px solid #84bbf3;
	display:inline-block;
	color:#ffffff;
	font-family:Tahoma;
	font-size:12px;
	font-weight:bold;
	font-style:normal;
	height:28px;
	line-height:25px;
	width:160px;
	text-decoration:none;
	text-align:center;
}
.button2 {	background-color:#f9f9f9;
	-webkit-border-top-left-radius:3px;
	-moz-border-radius-topleft:3px;
	border-top-left-radius:3px;
	-webkit-border-top-right-radius:3px;
	-moz-border-radius-topright:3px;
	border-top-right-radius:3px;
	-webkit-border-bottom-right-radius:3px;
	-moz-border-radius-bottomright:3px;
	border-bottom-right-radius:3px;
	-webkit-border-bottom-left-radius:3px;
	-moz-border-radius-bottomleft:3px;
	border-bottom-left-radius:3px;
	text-indent:0px;
	border:1px solid #dcdcdc;
	display:inline-block;
	color:#666666;
	font-family:Tahoma;
	font-size:12px;
	font-weight:bold;
	font-style:normal;
	height:28px;
	line-height:25px;
	width:86px;
	text-decoration:none;
	text-align:center;
}
</style>

<div id="div_print1">
  <table width="780" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td><table width="780" border="0" align="center" cellpadding="1" cellspacing="0">
        <tr>
          <td width="776" align="center" bgcolor="#FFFFFF"><img src="../img/logo.png" alt="" width="100" height="100" /></td>
        </tr>
        <tr>
          <td height="28" align="center" bgcolor="#FFFFFF"><strong><font size="4">˹ѧ����׹�ѹ�ʹ</font></strong></td>
        </tr>
        <tr>
          <td height="25" align="right" valign="bottom" bgcolor="#FFFFFF">�ѹ���&nbsp;&nbsp;
            <?=$today?>
            &nbsp;&nbsp;&nbsp;</td>
        </tr>
        <tr>
          <td height="25" align="left" valign="bottom" bgcolor="#FFFFFF">���¹&nbsp;&nbsp;
            <?=$full_name?>
&nbsp;&nbsp; ��Ҫԡ�Ţ���&nbsp;&nbsp;
<?=$member_no?>
&nbsp;&nbsp; &nbsp;&nbsp; �ѧ�Ѵ&nbsp;&nbsp;
  <?=$membgroup?></td>
        </tr>
        <tr>
          <td height="48" align="left" bgcolor="#FFFFFF">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$title?> �����ʹ�Թ <u><strong>��§ � �ѹ���
            <?=  ConvertDate($confirm_day,"confirm")?>
            </strong></u>&nbsp;��ҹ���ʹ�Թ�Ѻ�ˡó�� <br />
            �ѧ���.-</td>
        </tr>
        <tr>
          <td align="left" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="3">
                <tr>
                  <td colspan="2" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="28%"><strong>������������ˡó�</strong> �ӹǹ </td>
                      <td width="21%" align="center"><?=number_format($amt[0]/10,0) ?></td>
                      <td width="10%">���</td>
                      <td width="8%">���Թ</td>
                      <td width="27%" align="center"><?=number_format($amt[0],2) ?></td>
                      <td width="6%" align="right">�ҷ</td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td colspan="2" bgcolor="#FFFFFF"><hr color="#999999" size="1"/></td>
                </tr>
                <tr>
                  <td colspan="2" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td><strong>�Թ�ҡ</strong> �ӹǹ <?=$d_c?> �ѭ��</td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td colspan="2" bgcolor="#FFFFFF"><table width="60%" border="0" align="center" cellpadding="0" cellspacing="3">
                    <?php 
                    $d_c_s = $l_c+$s_c;
					for($i=0; $i<ceil($l_c); $i++){ 
					?>
                    <tr>
                      <td width="32%">
					  <?php 
					  $strSQL = "SELECT DEPTTYPE_DESC AS A1 FROM DPDEPTTYPE WHERE DEPTTYPE_CODE = '$code[$d_c_s]' ";
					  $value = 'A1';
					  echo $type = get_single_value_oci($strSQL,$value);
					  ?>
                      </td>
                      <td width="39%" align="center"><?=$type_details[$d_c_s]?></td>
                      <td width="29%" align="right"><?=number_format($amt[$d_c_s++],2);	?> �ҷ</td>
                    </tr>
                    <?php } ?>
                  </table>                    <hr color="#999999" size="1"/></td>
                  </tr>
                <tr>
                  <td colspan="2" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td><strong>�Թ���</strong> �ӹǹ <?=$l_c?> �ѭ��</td>
                      </tr>
                    </table></td>
                  </tr>
                <tr>
                  <td colspan="2" bgcolor="#FFFFFF"><table width="60%" border="0" align="center" cellpadding="0" cellspacing="3">
                      <?php 
		$l_c_s = $s_c;
		for($i=0; $i<ceil($s_c); $i++){		
		?>
                      <tr>
                        <td width="32%">
						<?php
                      $strSQL = "SELECT LOANTYPE_DESC AS A1 FROM LNLOANTYPE WHERE LOANTYPE_CODE = '$code[$l_c_s]' ";
					  $value = 'A1';
					  echo $type = get_single_value_oci($strSQL,$value);
					  ?>
						
						</td>
                        <td width="39%" align="center"><?=$type_details[$l_c_s]?></td>
                        <td width="29%" align="right"><?=number_format($amt[$l_c_s++],2);	?> �ҷ</td>
                      </tr>
                      <?php } ?>
                  </table>
                    <hr color="#999999" size="1"/></td>
                  </tr>
                <tr>
                  <td colspan="2" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="50%"><strong>��ª��ͺؤ�ŷ���ҹ��ӻ�Сѹ�Թ���</strong></td>
                      <td width="50%"><strong>��ª��ͺؤ�ŷ���ҹ��ӻ�Сѹ�Թ���ͧ��ҹ</strong></td>
                      </tr>
                    </table></td>
                  </tr>
                <tr>
                  <td width="50%" bgcolor="#FFFFFF"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="3">
                    <?php for($i=0;$i<$Num_Rows;$i++){ ?>
                    <tr>
                      <td width="24%" align="left"><?= $coll_loan[$i]?></td>
                      <td width="76%" align="left"><?= $coll_name[$i]?></td>
                    </tr>
                    <?php } ?>
                  </table></td>
                  <td bgcolor="#FFFFFF"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="3">
                    <?php for($b=0;$b<$Num_Rows1;$b++) { ?>
                    <tr>
                      <td width="24%" align="left" valign="top" bgcolor="#FFFFFF"><?=$coll_loan_r[$b]?></td>
                      <td width="76%" align="left" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <?php require "../s/s.ref_collno1.php"; ?>
                        <?php for($c=0;$c<$Num_Rows2;$c++) { ?>
                        <tr>
                          <td align="left"><?=$who_coll_name[$c]?></td>
                        </tr>
                        <?php } ?>
                      </table></td>
                    </tr>
                    <?php } ?>
                  </table></td>
                </tr>
                <tr>
                  <td colspan="2" bgcolor="#FFFFFF"><hr color="#999999" size="1"/></td>
                  </tr>
                <tr>
                  <td colspan="2" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td><strong>��ª��ͼ���Ѻ�͹����ª��ͧ��ҹ</strong></td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td colspan="2" bgcolor="#FFFFFF"><table width="60%" border="0" align="center" cellpadding="0" cellspacing="3">
                  <?php  for($i=0;$i<$Num_Rowsadd;$i++){ ?>
                    <tr>
                      <td width="53%"><?=$i+1?>.
                        <?=$mg_fullname[$i] ?>
                         &nbsp;&nbsp;&nbsp;</td>
                      <td width="23%">��������ѹ�� &nbsp;</td>
                      <td width="24%"><?=$mg_relation[$i] ?></td>
                      </tr>
                    <?php } ?>
                  </table><hr color="#999999" size="1"/></td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td height="79" align="left" bgcolor="#FFFFFF"><p align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���ͻ���ª��ͧ��Ҫԡ �ô��Ǩ�ͺ�����Ţͧ��ҹ㹡���׹�ѹ�ʹ �ҡ��������١��ͧ ���� �բ�ͷѡ��ǧ��С��� �����ô��������ͺ�ѭ�� �ˡó������Ѿ�쾹ѡ�ҹ���俿����ǹ�����Ҥ �ӡѴ �������������к������˹ѧ��͹�� �¡�͡��ͤ����˹ѧ����׹�ѹ�ʹ��ҹ��ҧ ����ô �ͺ��Ѻ���� 7 �ѹ �Ѻ�ҡ�ѹ������Ѻ˹ѧ��͹�� �ҡ�鹡�˹��������駡�Ѻ �������ʹ�Թ�ѧ����Ƕ١��ͧ ��Т͢;�Фس������������������ � �͡�ȹ�����</p></td>
        </tr>
        <tr>
          <td align="left" bgcolor="#FFFFFF"><table width="70%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td align="center">&nbsp;</td>
            </tr>
            <tr>
              <td align="center">���ʴ������Ѻ���</td>
            </tr>
            <tr>
              <td height="59" align="center"><strong><img src="../img/mg.png" alt="" width="67" height="52" /></strong></td>
            </tr>
            <tr>
              <td align="center">(������ѡ���&nbsp;&nbsp;&nbsp;�ط��ѡ��)</td>
            </tr>
            <tr>
              <td align="center">���Ѵ��� ��. ����Թ</td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
        </tr>
        <tr>
          <td align="left" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="2" cellpadding="2">
            <tr>
              <td width="6%">���¹</td>
              <td colspan="3">����ͺ�ѭ���ˡó������Ѿ�쾹ѡ�ҹ���俿����ǹ�����Ҥ �ӡѴ</td>
              </tr>
            <tr>
              <td>&nbsp;</td>
              <td colspan="3">���׹�ѹ��� ��Ҿ����դ����� / �Թ�ҡ ����Թ���Ѻ�ˡó�� �ѧ����Ǣ�ҧ�鹹��</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td colspan="3">
              <p align="justify">( &nbsp;&nbsp;&nbsp; ) �١��ͧ ( &nbsp;&nbsp;&nbsp; ) �١��ͧ ���� ...............................................................................................................................</p>
              
              </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td colspan="3" valign="bottom">              <p align="justify">............................................................................................................................................................................</p></td>
            </tr>
            <tr>
              <td height="38">&nbsp;</td>
              <td width="11%" valign="bottom"><strong>�����˵�</strong></td>
              <td width="39%" valign="bottom"><strong>�ô�觤׹��駩�Ѻ</strong></td>
              <td width="44%" align="center" valign="bottom">ŧ����&nbsp; ................................................................</td>
            </tr>
            </table></td>
        </tr>
      </table></td>
    </tr>
  </table>
</div>
<table width="100%" border="0" cellspacing="1" cellpadding="6">
  <tr>
    <td align="center"><form id="form3" name="form1" method="post" action="">
      <input name="b_print2" type="button" class="ipt; button1"  onclick="printdiv('div_print1');checkconfirmclosewindow()" value="�����"  />
    </form></td>
  </tr>
</table>
