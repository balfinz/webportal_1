<?php
session_start();
header('Content-Type: text/html; charset=tis-620');
$ses_userid =$_SESSION['ses_userid'];
$member_no = $_SESSION['ses_member_no'];
if($ses_userid <> session_id() or $member_no ==""){
	header("Location: index.php");
}
	require "../include/conf.conn.php";
	require "../include/conf.c.php";
	require "../include/lib.Etc.php";
	require "../include/lib.Oracle.php";
?>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?=$title?></title>
	<link rel="shortcut icon" href="../img/logo.png">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <?php require "../include/conf.d.php" ?>

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
			font-size: 12px;
			color: #000;
		}

</style>
</head>

<?php 
$month = $_POST["month"]; 
$year = $_POST["year"];
$year_th = $year + 543;

if($month == "01" || $month == "03" || $month == "05" || $month == "07" || $month == "08" || $month == "10" || $month == "12"){
    
    $day = "31";
    
}else if ($month == "04" || $month == "06" || $month == "09" || $month == "11"){
    
    $day = "30";
    
}else if ($month == "02"){
    
    $day = "28";
    
}

$date_th = $day."/".$month."/".$year;

?>

<?php
require "../s/s.member_status.php";
?>


<center><h2>����ʶҹ���Ҿ��Ҫԡ</h2></center>
<center><h2>�ˡó������Ѿ�� ��� �ӡѴ</h2></center>


<table width="850px" border="0" align="center" cellpadding="1" cellspacing="6">
  <tr>
    <td width="180px" align="right"><font size="2">����¹��Ҫԡ :</font></td>
    <td width="90px" align="left" bgcolor="#D3D3D3"><font size="2"><?= $member_no?></font></td>
    <td width="130px" align="right"><font size="2">���� - ʡ�� :</font></td>
    <td width="200px" align="left" bgcolor="#D3D3D3"><font size="2"><?= $full_name?></font></td>
    <td width="160px" align="right"><font size="2">����˹��§ҹ :</font></td>
    <td width="120px" align="left" bgcolor="#D3D3D3"><font size="2"><?= $membgroup_code?></font></td>
  </tr>
  <tr>
    <td align="right"><font size="2">�����ѧ�Ѵ :</font></td>
    <td align="left" bgcolor="#D3D3D3"><font size="2"><?= $membgroup_code?></font></td>
    <td align="right"><font size="2">����˹��§ҹ :</font></td>
    <td align="left" bgcolor="#D3D3D3"><font size="2"><?= $membgroup_desc?></font></td>
    <td align="right"><font size="2">�ѹ�������Ҫԡ :</font></td>
    <td align="left" bgcolor="#D3D3D3"><font size="2"><?= ConvertDate($member_date,"short")?></font></td>
  </tr>
  <tr>
    <td align="right"><font size="2">���ء������Ҫԡ :</font></td>
    <td align="left" bgcolor="#D3D3D3"><font size="2">(<?= count_member($member_date,'ym')?>)</font></td>
    <td align="right"><font size="2">ʶҹ��Ҿ��Ҫԡ :</font></td>
    <td align="left" bgcolor="#D3D3D3"><font size="2"><?= $member_status?></font></td>
    <td align="right"><font size="2">�.�.�.����Ѻ�ͧʶҹ��Ҿ :</font></td>
    <td align="left" bgcolor="#D3D3D3"><font size="2"><?= ConvertDate($date_th,"short") ?></font></td>
  </tr>
  <tr>
    <td align="right"><font size="2">�觤����鹧Ǵ��(�ҷ) :</font></td>
    <td align="left" bgcolor="#D3D3D3"><font size="2"><?= $periodshare_amt?></font></td>
    <td align="right"><font size="2">�ӹǹ�������(���) :</font></td>
    <td align="left" bgcolor="#D3D3D3"><font size="2"><?= $sharestk_amt?></font></td>
    <td align="right"><font size="2">����������(�ҷ) :</font></td>
    <td align="left" bgcolor="#D3D3D3"><font size="2"><?= $sharestk_amt_th?></font></td>
  </tr>
</table>


<div id="div_print1">
<table width="800" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td align="center" valign="top">
    <table width="800" border="0" align="center" cellpadding="0" cellspacing="0"  bgcolor="#FFFFFF">
      <tr>
        <td valign="top">
        <table width="800" border="0" cellspacing="3" cellpadding="0">
          <tr>
            <td align="right" valign="top"><table width="100%" border="0" cellspacing="5" cellpadding="0">
              <tr>
                <td width="800" align="center">
                <font face='Tahoma' size="3"><strong>�Թ���</strong></font>
                </td>
                </tr>
            </table></td>
            </tr>
        </table>
        </td>
        </tr>
    
      <tr>
        <td valign="top">
          
          <table width="800" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="center" valign="top"></td>
              </tr>
            <tr>
              <td align="center"><hr size="1" color="#CCCCCC"></td>
            </tr>
            <tr>
              <td align="center"><table width="800" border="0" cellspacing="6" cellpadding="1">
                <tr>
                  <td width="25%" align="center" bgcolor="#66999FF"><font size="2">������</font></td>
                  <td width="10%" align="center" bgcolor="#66999FF"><font size="2">�Ţ����ѭ��</font></td>
                  <td width="10%" align="center" bgcolor="#66999FF"><font size="2">�.�.� �͡��</font></td>
                  <td width="10%" align="right" bgcolor="#66999FF"><font size="2">�ӹǹ�Թ���</font></td>
                  <td width="10%" align="right" bgcolor="#66999FF"><font size="2">�ӹǹ�Թ�������</font></td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td align="center"><hr size="1" color="#CCCCCC"></td>
            </tr>
            <tr>
              <td align="center"><table width="100%" border="0" cellspacing="4" cellpadding="1">
              <?php for($b=0;$b<$Num_Rows1;$b++){?>  
                <tr>
                  <td width="25%" align="left" bgcolor="#FFFFFF"><font size="2"><?=$loantype[$b]?></font></td>
                  <td width="10%" align="center" bgcolor="#FFFFFF"><font size="2"><?=$loancontract_no[$b]?></font></td>
                  <td width="10%" align="center" bgcolor="#FFFFFF"><font size="2"><?=ConvertDate($statcont_date[$b],"short")?></font></td>
                  <td width="10%" align="right" bgcolor="#FFFFFF"><font size="2"><?=$loanapprove_amt[$b]?></font></td>
                  <td width="10%" align="right" bgcolor="#FFFFFF"><font size="2"><?=$principal_balance[$b]?></font></td>
                </tr>
                <?php } ?>
                <tr>
                  <td colspan="7" align="center" valign="middle"><hr size="1" color="#CCCCCC"></td>
                  </tr>
                
              </table></td>
            </tr>
            
            <tr>
              <td align="center"></td>
            </tr>
          </table>        </td>
        </tr>
    </table></td>
  </tr>
</table>
</div>



<div id="div_print2">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="top">
    <table width="800" border="0" align="center" cellpadding="0" cellspacing="0"  bgcolor="#FFFFFF">
      <tr>
        <td valign="top">
        <table width="100%" border="0" cellspacing="3" cellpadding="0">
          <tr>
            <td align="right" valign="top"><table width="100%" border="0" cellspacing="5" cellpadding="0">
              <tr>
                <td width="65%" align="center">
                <font face='Tahoma' size="3"><strong>�Թ�ҡ</strong></font>
                </td>
                </tr>
            </table></td>
            </tr>
        </table>
        </td>
        </tr>
    
      <tr>
        <td valign="top">
          
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="center" valign="top"></td>
              </tr>
            <tr>
              <td align="center"><hr size="1" color="#CCCCCC"></td>
            </tr>
            <tr>
              <td align="center"><table width="100%" border="0" cellspacing="6" cellpadding="1">
                <tr>
                  <td width="25%" align="center" bgcolor="#66999FF"><font size="2">������</font></td>
                  <td width="20%" align="center" bgcolor="#66999FF"><font size="2">�Ţ���ѭ��</font></td>
                  <td width="20%" align="center" bgcolor="#66999FF"><font size="2">����ӹǹ�Թ�ҡ</font></td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td align="center"><hr size="1" color="#CCCCCC"></td>
            </tr>
            <tr>
              <td align="center"><table width="100%" border="0" cellspacing="4" cellpadding="1">
              <?php for($d=0;$d<$Num_Rows2;$d++){?>  
                <tr>
                  <td width="25%" align="left" bgcolor="#FFFFFF"><font size="2"><?=$depttype_desc[$d]?></font></td>
                  <td width="20%" align="center" bgcolor="#FFFFFF"><font size="2"><?=$deptaccount_no[$d]?></font></td>
                  <td width="20%" align="right" bgcolor="#FFFFFF"><font size="2"><?=$prncbal[$d]?></font></td>
                </tr>
                <?php } ?>
                <tr>
                  <td colspan="7" align="center" valign="middle"><hr size="1" color="#CCCCCC"></td>
                  </tr>
                
              </table></td>
            </tr>
            <tr>
              <td align="center"></td>
            </tr>
          </table>        </td>
        </tr>
    </table></td>
  </tr>
</table>
</div>

<br><br>

<!-- <form id="form1" name="form1" method="post" action="d.month_year_show_print.php" target="_blank"> 
    
    <input type="hidden" name="month" value="<?= $month ?>">
    <input type="hidden" name="year" value="<?= $year?>">
    
   <center><input type="button" name="button" id="button" value="Print ��������Ҫԡ" class="addnews" onclick="this.form.submit();" style="width: 180px;" /></center> 

</form>
-->
<!-- -------------------------------------------------------------------------------------------------------------------------------- -->
<?php
	//by_max 20092017
	//���ҧ pdf

	$file_name = 'PDF-'.$member_no;

	require "../include/pdf/fpdf.php";
	define('FPDF_FONTPATH','../include/pdf/font/');

	$pdf = new FPDF('P','mm','A4');
	$pdf->AddPage();

	$pdf->AddFont('angsab','','angsab.php');
	$pdf->SetFont('angsab','',20);
	$pdf->Cell(0,0,'����ʶҹ���Ҿ��Ҫԡ',0,1,"C");	
	$pdf->AddFont('angsa','','angsa.php');
	$pdf->SetFont('angsa','',16);
	$pdf->Cell(0,15,'�ˡó������Ѿ�� ��� �ӡѴ',0,1,"C");
	$pdf->SetFont('angsa','',14);
	///��������Ҫԡ
	$h = 7;
	$w = array(30,30,30,50,30,20);
	$a = array('R','L','R','L','R','L');
	$date = array('����¹��Ҫԡ  :',$member_no,'���� - ʡ��  :',$full_name,'����˹��§ҹ  :',$membgroup_code);
	for($i=0;$i<count($date);$i++)
	$pdf->Cell($w[$i],$h,$date[$i],0,0,$a[$i]);
	$pdf->Ln();
	$date = array('�����ѧ�Ѵ  :',$membgroup_code,'����˹��§ҹ  :',$membgroup_desc,'�ѹ�������Ҫԡ  :',ConvertDate($member_date,"short"));
	for($i=0;$i<count($date);$i++)
	$pdf->Cell($w[$i],$h,$date[$i],0,0,$a[$i]);
	$pdf->Ln();
	$date = array('���ء������Ҫԡ  :',count_member($member_date,'ym'),'��ҹ��Ҿ��Ҫԡ :',$member_status,'�.�.� ����Ѻ�ͧʶҹ��Ҿ  :',ConvertDate($date_th,"short"));
	for($i=0;$i<count($date);$i++)
	$pdf->Cell($w[$i],$h,$date[$i],0,0,$a[$i]);
	$pdf->Ln();
	$date = array('�觤����鹧Ǵ��(�ҷ)  :',$periodshare_amt,'�ӹǹ�������(���)  :',$sharestk_amt,'����������(�ҷ)  :',$sharestk_amt_th);
	for($i=0;$i<count($date);$i++)
	$pdf->Cell($w[$i],$h,$date[$i],0,0,$a[$i]);
	$pdf->Ln();
	

	//�Թ���
	if($Num_Rows1 > 0){
	$header=array('�������Թ���','�Ţ����ѭ��','�.�.� �͡��','�ӹǹ�Թ���','�ӹǹ�Թ�������');
	$h = 7;
	$w = array(75,22,22,35,35);
	for($i=0;$i<count($header);$i++)
	$pdf->Cell($w[$i],$h,$header[$i],'TB',0,'C');
	$pdf->Ln();
	$h = 6;	
	for($b=0;$b<$Num_Rows1;$b++)
	{
		$pdf->Cell($w[0],$h,$loantype[$b],0,0,'L');
		$pdf->Cell($w[1],$h,$loancontract_no[$b],0,0,'C');
		$pdf->Cell($w[2],$h,ConvertDate($statcont_date[$b],"short"),0,0,'C');
		$pdf->Cell($w[3],$h,$loanapprove_amt[$b],0,0,'R');
		$pdf->Cell($w[4],$h,$principal_balance[$b],0,0,'R');
		$pdf->Ln();
	}
	$pdf->Cell(array_sum($w),0,'','T');
	}
	$pdf->Ln(4);
	
	//�Թ�ҡ
	if($Num_Rows2 > 0){
	$header=array('�������Թ�ҡ','�Ţ���ѭ��','����ӹǹ�Թ�ҡ');
	$h = 8;
	$w = array(108,35,45);
	for($i=0;$i<count($header);$i++)
	$pdf->Cell($w[$i],$h,$header[$i],'TB',0,'C');
	$pdf->Ln();
	$h = 6;	
	for($d=0;$d<$Num_Rows2;$d++)
	{
		$pdf->Cell($w[0],$h,$depttype_desc[$d],0,0,'L');
		$pdf->Cell($w[1],$h,$deptaccount_no[$d],0,0,'C');
		$pdf->Cell($w[2],$h,$prncbal[$d],0,0,'R');
		$pdf->Ln();
	}
	$pdf->Cell(array_sum($w),0,'','T');
	}
	$pdf->Ln(5);
	$pdf->Cell(0,0,'*** ��ǹ�����Ҫԡ���������ѡ�ҹ',0,1,"L");
	$pdf->Ln(5);
	$pdf->Cell(0,0,'............................................................................................................................................................................................................',0,1,"C");
	
	
	////////////// ���觷���ͧ
	$pdf->Ln(10);
	$pdf->AddFont('angsab','','angsab.php');
	$pdf->SetFont('angsab','',20);
	$pdf->Cell(0,0,'����ʶҹ���Ҿ��Ҫԡ',0,1,"C");	
	$pdf->AddFont('angsa','','angsa.php');
	$pdf->SetFont('angsa','',16);
	$pdf->Cell(0,15,'�ˡó������Ѿ�� ��� �ӡѴ',0,1,"C");
	$pdf->SetFont('angsa','',14);
	///��������Ҫԡ
	$h = 7;
	$w = array(30,30,30,50,30,20);
	$a = array('R','L','R','L','R','L');
	$date = array('����¹��Ҫԡ  :',$member_no,'���� - ʡ��  :',$full_name,'����˹��§ҹ  :',$membgroup_code);
	for($i=0;$i<count($date);$i++)
	$pdf->Cell($w[$i],$h,$date[$i],0,0,$a[$i]);
	$pdf->Ln();
	$date = array('�����ѧ�Ѵ  :',$membgroup_code,'����˹��§ҹ  :',$membgroup_desc,'�ѹ�������Ҫԡ  :',ConvertDate($member_date,"short"));
	for($i=0;$i<count($date);$i++)
	$pdf->Cell($w[$i],$h,$date[$i],0,0,$a[$i]);
	$pdf->Ln();
	$date = array('���ء������Ҫԡ  :',count_member($member_date,'ym'),'��ҹ��Ҿ��Ҫԡ :',$member_status,'�.�.� ����Ѻ�ͧʶҹ��Ҿ  :',ConvertDate($date_th,"short"));
	for($i=0;$i<count($date);$i++)
	$pdf->Cell($w[$i],$h,$date[$i],0,0,$a[$i]);
	$pdf->Ln();
	$date = array('�觤����鹧Ǵ��(�ҷ)  :',$periodshare_amt,'�ӹǹ�������(���)  :',$sharestk_amt,'����������(�ҷ)  :',$sharestk_amt_th);
	for($i=0;$i<count($date);$i++)
	$pdf->Cell($w[$i],$h,$date[$i],0,0,$a[$i]);
	$pdf->Ln();
	

	//�Թ���
	if($Num_Rows1 > 0){
	$header=array('�������Թ���','�Ţ����ѭ��','�.�.� �͡��','�ӹǹ�Թ���','�ӹǹ�Թ�������');
	$h = 7;
	$w = array(75,22,22,35,35);
	for($i=0;$i<count($header);$i++)
	$pdf->Cell($w[$i],$h,$header[$i],'TB',0,'C');
	$pdf->Ln();
	$h = 6;	
	for($b=0;$b<$Num_Rows1;$b++)
	{
		$pdf->Cell($w[0],$h,$loantype[$b],0,0,'L');
		$pdf->Cell($w[1],$h,$loancontract_no[$b],0,0,'C');
		$pdf->Cell($w[2],$h,ConvertDate($statcont_date[$b],"short"),0,0,'C');
		$pdf->Cell($w[3],$h,$loanapprove_amt[$b],0,0,'R');
		$pdf->Cell($w[4],$h,$principal_balance[$b],0,0,'R');
		$pdf->Ln();
	}
	$pdf->Cell(array_sum($w),0,'','T');
	}
	$pdf->Ln(4);
	
	//�Թ�ҡ
	if($Num_Rows2 > 0){
	$header=array('�������Թ�ҡ','�Ţ���ѭ��','����ӹǹ�Թ�ҡ');
	$h = 8;
	$w = array(108,35,45);
	for($i=0;$i<count($header);$i++)
	$pdf->Cell($w[$i],$h,$header[$i],'TB',0,'C');
	$pdf->Ln();
	$h = 6;	
	for($d=0;$d<$Num_Rows2;$d++)
	{
		$pdf->Cell($w[0],$h,$depttype_desc[$d],0,0,'L');
		$pdf->Cell($w[1],$h,$deptaccount_no[$d],0,0,'C');
		$pdf->Cell($w[2],$h,$prncbal[$d],0,0,'R');
		$pdf->Ln();
	}
	$pdf->Cell(array_sum($w),0,'','T');
	}	
	$pdf->Ln(7);
	$pdf->Cell(0,0,'���¹ ����ͺ�ѭ���ˡó������Ѿ�� ���. �ӡѴ ',0,1,"L");
	$pdf->Ln(7);
	$pdf->Cell(0,0,'(   ) �١��ͧ  (   ) ���١��ͧ ',0,1,"L");
	$pdf->Ln(7);
	$pdf->Cell(0,0,'*** �к� ...........................................................',0,1,"L");
	$pdf->Ln(7);
	$pdf->Cell(0,0,'ŧ������Ҫԡ ................................................... ',0,1,"L");
	$pdf->Ln(7);
	$pdf->Cell(0,0,'��سҵ�Ǩ�ͺ�����觡�Ѻ���ѧ����Ѻ����ʶҹ��Ҿ��Ҫԡ � ���ӡ���ˡó� ',0,1,"L");	
	$pdf->Output("pdf/".$file_name.".pdf","F");
?>
<center><a href="pdf/<?=$file_name?>.pdf" target="_blank"><input type="button" name="b_pdf" id="b_pdf" value="Print ��������Ҫԡ" class="addnews" style="width: 180px;" /></a></center> 

<!-- -------------------------------------------------------------------------------------------------------------------------------- -->

