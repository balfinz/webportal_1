<?php
session_start();
@header('Content-Type: text/html; charset=tis-620');
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
<!DOCTYPE html>
<html>
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
<body>
<table width="100%" border="0" cellspacing="1" cellpadding="6">
  <tr>
    <td align="right">
    <form id="form3" name="form1" method="post" action="">
   		<input name="b_print2" type="button" class="ipt; button1"  onclick="printdiv('div_print1');checkconfirmclosewindow()" value="�����"  />
      	<input name="aa2" type="submit" id="aa3" value="�Դ"  onclick="checkconfirmclosewindow()" class="button2" />
    </form>
    </td>
  </tr>
</table>
<?php 
	$acc_no = @$_POST["acc_no"];
	$date1 = @$_POST["date1"];
	$date2 =  @$_POST["date2"];
	
	$day1 = substr($date1,0,2);
	$month1 = substr($date1,3,2);
	$year1 = substr($date1,6,4);
	$year1 = $year1 - 543;
	
	$date_where1 = $month1.'/'.$day1.'/'.$year1;
	
	$day2 = substr($date2,0,2);
	$month2 = substr($date2,3,2);
	$year2 = substr($date2,6,4);
	$year2 = $year2 - 543;
	
	$date_where2 = $month2.'/'.$day2.'/'.$year2;


	$list = DateDiff($date1,$date2);
	
	 if($list <= 0 or $list > 366){	
		echo "<script type='text/javascript'> window.alert('��س��к��ѹ������� ���� ��ҹ���͡��ǧ�����Դ���� 1 ��') </script>";
		echo "<script type='text/javascript'> window.close(); </script>";
	 }
?>
<div id="div_print1">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="top">
    <table width="890" border="0" align="center" cellpadding="0" cellspacing="0"  bgcolor="#FFFFFF">
      <tr>
        <td valign="top">
        <table width="100%" border="0" cellspacing="3" cellpadding="0">
          <tr>
            <td width="110" height="85" align="center" valign="middle"><img src="../img/logo.png" width="101" height="72"></td>
            <td width="771"><table width="100%" border="0" cellspacing="5" cellpadding="0">
              <tr>
                <td><font face='Tahoma' size="5"><strong>
                  <?=$title?>
                  </strong></font><br/>
                  <font face='Tahoma' size="2" >
                    <?=$address?>
                    </font></td>
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
              <td align="center"><table width="95%" border="0" cellspacing="3" cellpadding="1">
                <tr>
                  <td height="30" colspan="6" align="center" valign="top"><font size="3" face="Tahoma"><strong>��¡������͹��Ǻѭ���Թ�ҡ</strong></font></td>
                </tr>
                <?php 
					 $strSQL = "SELECT 
										DUG.DEPTGROUP_DESC AS DEP_DESC,
										DM.DEPTACCOUNT_NAME AS DEPTACCOUNT_NAME,
										DM.PRNCBAL AS PRNCBAL
									FROM 
										DPDEPTMASTER DM LEFT JOIN DPDEPTTYPE DT ON DM.DEPTTYPE_CODE = DT.DEPTTYPE_CODE
										                             LEFT JOIN DPUCFDEPTGROUP DUG ON DT.DEPTGROUP_CODE = DUG.DEPTGROUP_CODE
									WHERE
										DM.DEPTCLOSE_STATUS!= '1'
										AND DM.DEPTACCOUNT_NO = '$acc_no' "; 
					
					
					$resultData = sqlsrv_query($objConnect,$strSQL); 
					
					while( $row = sqlsrv_fetch_array( $resultData, SQLSRV_FETCH_ASSOC) ) { 
	  
					$dep_desc = $row['DEP_DESC'];
					$acc_name = $row['DEPTACCOUNT_NAME'];
					$prncbal = $row['PRNCBAL'];
						  
					  
					  }
					
					
					
				?>
                <tr>
                  <td width="10%" height="25" align="left"><strong>�������ѭ��</strong></td>
                  <td width="20%" align="left">�Թ�ҡ<?=$dep_desc?></td>
                  <td width="6%" align="left"><strong>���ͺѭ��</strong></td>
                  <td width="48%" align="left"><?=$acc_name?> (<?=$member_no?>)</td>
                  <td width="7%" align="right"><strong>������ѹ���</strong></td>
                  <td width="9%" align="right"><?=$date1?> </td>
                  </tr>
                <tr>
                  <td height="25" align="left"><strong>�Ţ���ѭ��</strong></td>
                  <td align="left"><?= GetFormatDep($acc_no)?></td>
                  <td colspan="2" align="left"><strong>�ӹǹ�Թ�������</strong> <?=number_format($prncbal,2)?> <strong>�ҷ</strong></td>
                  <td align="right"><strong>�֧�ѹ���</strong></td>
                  <td align="right"><?=$date2?> </td>
                  </tr>
              </table></td>
              </tr>
            <tr>
              <td align="center"><hr size="1" color="#CCCCCC"></td>
            </tr>
            <tr>
              <td align="center"><table width="95%" border="0" cellspacing="3" cellpadding="1">
                <tr>
                  <td width="12%" align="center"><strong><font size="2" face="Tahoma">&nbsp;�ѹ������¡��</font></strong></td>
                  <td width="31%" height="25" align="center"><strong><font size="2" face="Tahoma">���ʷ���¡��</font></strong></td>
                  <td width="13%" align="right"><strong><font size="2" face="Tahoma">�͹</font></strong></td>
                  <td width="13%" align="right"><strong><font size="2" face="Tahoma">�ҡ</font></strong></td>
                  <td width="15%" align="right"><strong><font size="2" face="Tahoma">�ʹ�������</font></strong></td>
                  <td width="16%" align="center"><strong><font size="2" face="Tahoma">�����˵�</font></strong></td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td align="center"><hr size="1" color="#CCCCCC"></td>
            </tr>
            <tr>
              <td align="center">
				<?php 
					 $strSQL = "SELECT 
						convert(varchar,DAY(DDS.OPERATE_DATE)) + '/' +
						convert(varchar,month(DDS.OPERATE_DATE)) + '/' +
						convert(varchar,year(DDS.OPERATE_DATE)+ 543) AS OPERATE_DATE,
										DDS.DEPTITEMTYPE_CODE AS ITEM_CODE,
										(SELECT DEPTITEMTYPE_DESC FROM DPUCFDEPTITEMTYPE WHERE DEPTITEMTYPE_CODE=DDS.DEPTITEMTYPE_CODE ) AS ITEM_DESC ,
										(SELECT SIGN_FLAG FROM DPUCFDEPTITEMTYPE WHERE DEPTITEMTYPE_CODE=DDS.DEPTITEMTYPE_CODE ) * DDS.DEPTITEM_AMT AS DEPTITEM_AMT,
										DDS.PRNCBAL AS PRNCBAL
									FROM 
										DPDEPTSTATEMENT DDS
									WHERE 
										DEPTACCOUNT_NO = '$acc_no'
										AND  OPERATE_DATE BETWEEN '$date_where1' 
										AND '$date_where2'
										ORDER BY DDS.SEQ_NO  "; 
					/*$value = array('OPERATE_DATE','ITEM_CODE','ITEM_DESC','DEPTITEM_AMT','PRNCBAL');
					list($Num_Rows,$list_info) = get_value_many_oci($strSQL,$value);
					$j=0;
					for($i=0;$i<$Num_Rows;$i++){
						$operate_date[$i] = $list_info[$i][$j++];
						$item_code[$i] = $list_info[$i][$j++];
						$item_desc[$i] = $list_info[$i][$j++];
						$deptitem_amt[$i] = $list_info[$i][$j++];
						$total[$i] = number_format($list_info[$i][$j++],2);*/
						
						$resultData = sqlsrv_query($objConnect,$strSQL); 
						
							
						//$j=0;
					
				?>
              <table width="95%" border="0" cellspacing="3" cellpadding="1">
              <?php while( $row = sqlsrv_fetch_array( $resultData, SQLSRV_FETCH_ASSOC) ) { 
						
						$operate_date = $row['OPERATE_DATE'];
						$item_code = $row['ITEM_CODE'];
						$item_desc = $row['ITEM_DESC'];
						$deptitem_amt = $row['DEPTITEM_AMT'];
						$total = number_format($row['PRNCBAL'],2);
						
						
						if($deptitem_amt > 0 ){ 
						
						
						
						$dep = number_format($deptitem_amt,2); 
						
						}
						else if($deptitem_amt < 0 ){ 
						

						$withdraw = number_format($deptitem_amt,2); 
						
						}
						else{ 

						$dep = ""; 
						$withdraw = ""; 
						
						} 
						
						?>
                <tr>
                  <td width="12%" align="center"><font size="2" face="Tahoma"><?=$operate_date?></font></td>
                  <td width="6%" height="23" align="center"><font size="2" face="Tahoma"><?=$item_code?></font></td>
                  <td width="25%" align="left"><font size="2" face="Tahoma"><?=$item_desc?></font></td>
                  <td width="13%" align="right"><font size="2" face="Tahoma" color="#FF0000"><?=@$withdraw?></font></td>
                  <td width="13%" align="right"><font size="2" face="Tahoma"><?=$dep?></font></td>
                  <td width="15%" align="right"><font size="2" face="Tahoma"><?=$total?></font></td>
                  <td width="16%" align="center">&nbsp;</td>
                </tr>
                <?php } ?>
              </table></td>
            </tr>
            <tr>
              <td align="center"><hr size="1" color="#CCCCCC"></td>
            </tr>
            <tr>
              <td height="30" align="center"><table width="95%" border="0" cellspacing="3" cellpadding="1">
                <tr>
                  <td height="23" align="center"><strong>(-<?=convertthai($prncbal)?>-)</strong></td>
                  <td width="15%" align="right"><strong><?=number_format($prncbal,2)?></strong></td>
                  <td width="16%" align="center">&nbsp;</td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td align="center"><hr size="1" color="#CCCCCC"></td>
            </tr>
            <tr>
              <td align="center">&nbsp;</td>
            </tr>
          </table>        </td>
        </tr>
    </table></td>
  </tr>
</table>
</div>
</body>
</html>
