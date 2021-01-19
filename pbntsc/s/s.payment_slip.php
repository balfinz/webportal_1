<?php
@header('Content-Type: text/html; charset=tis-620');
?>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
<?php
	$strSQL = "SELECT MAX(RECV_PERIOD) AS MAXSLIP FROM KPTEMPRECEIVEDET WHERE MEMBER_NO = '$member_no' ";
	$value = ('MAXSLIP');
	$listslip = get_single_value_oci($strSQL,$value);
	$thisshow = Show_Slip(date('d-m-Y'));
	
	if($listslip != $thisshow){
		$listslip = $listslip-1;
	}
		
	list($slip,$slip_m,$slip_s,$slipsum) =show_list($listslip,6,$member_no);
			
	if($_REQUEST["slip_date"] == ""){
		$slip_date = Show_Slip(date('d-m-Y'));
		$show_month = show_month($slip_date);
	}else{
		$slip_date = $_REQUEST["slip_date"];
		$show_month = show_month($slip_date);
	}


	$strSQL = "SELECT * FROM (     
						SELECT 
							KPD.REF_MEMBNO AS A0,
							KUK.KEEPITEMTYPE_GRP AS A1,
							NVL(LNT.LOANTYPE_DESC, KUK.KEEPITEMTYPE_DESC) AS A2,
							KPD.LOANCONTRACT_NO AS A3,
							to_char(DECODE(KPD.PERIOD,0,null,KPD.PERIOD),'9G999G999') AS A8,
							KPD.DESCRIPTION AS A4,
							to_char(DECODE(KPD.PRINCIPAL_PAYMENT,0,null,KPD.PRINCIPAL_PAYMENT),'99G999G999G999D00') AS A5,
							to_char(DECODE(KPD.INTEREST_PAYMENT,0,null,KPD.INTEREST_PAYMENT),'99G999G999G999D00') AS A6,
							to_char(DECODE(KPD.ITEM_PAYMENT * KUK.SIGN_FLAG,0,null,KPD.ITEM_PAYMENT * KUK.SIGN_FLAG),'99G999G999G999D00') AS A7,
							to_char(DECODE(KPD.ITEM_BALANCE,0,null,KPD.ITEM_BALANCE),'99G999G999G999D00') AS A9,
							(KPD.CALINTTO_DATE - KPD.CALINTFROM_DATE) AS A10, 
							TO_CHAR(KPD.POSTING_DATE, 'DD/MM/YYYY','NLS_CALENDAR=''THAI BUDDHA') AS A11,
							KPD.SEQ_NO AS SEQ					
						FROM 
							KPTEMPRECEIVEDET KPD, KPUCFKEEPITEMTYPE KUK, LNLOANTYPE LNT
						WHERE 
							KPD.KEEPITEMTYPE_CODE = KUK.KEEPITEMTYPE_CODE
                                                        AND KPD.SHRLONTYPE_CODE = LNT.LOANTYPE_CODE(+)
							AND KPD.MEMBER_NO = '$member_no'
							AND KPD.RECV_PERIOD = '$slip_date'
							AND KPD.POSTING_STATUS = 0
					UNION
						SELECT 
							KMD.REF_MEMBNO AS A0,
							KUK.KEEPITEMTYPE_GRP AS A1,
							NVL(LNT.LOANTYPE_DESC, KUK.KEEPITEMTYPE_DESC) AS A2,
							KMD.LOANCONTRACT_NO AS A3,
							to_char(DECODE(KMD.PERIOD,0,null,KMD.PERIOD),'9G999G999') AS A8,
							KMD.DESCRIPTION AS A4,
                                                        DECODE(KEEPITEM_STATUS, -99,	
                                                            to_char(DECODE(KMD.PRINCIPAL_KEPTAMT,0,null,KMD.PRINCIPAL_KEPTAMT),'99G999G999G999D00'), 						
                                                            to_char(DECODE(KMD.PRINCIPAL_PAYMENT,0,null,KMD.PRINCIPAL_PAYMENT),'99G999G999G999D00')) AS A5,
							DECODE(KEEPITEM_STATUS, -99,	
                                                            to_char(DECODE(KMD.INTEREST_KEPTAMT,0,null,KMD.INTEREST_KEPTAMT),'99G999G999G999D00'),
                                                            to_char(DECODE(KMD.INTEREST_PAYMENT,0,null,KMD.INTEREST_PAYMENT),'99G999G999G999D00')) AS A6,
							DECODE(KEEPITEM_STATUS, -99,	
                                                            to_char(DECODE(KMD.ITEM_KEPTAMT * KUK.SIGN_FLAG,0,null,KMD.ITEM_KEPTAMT * KUK.SIGN_FLAG),'99G999G999G999D00'),
                                                            to_char(DECODE(KMD.ITEM_PAYMENT * KUK.SIGN_FLAG,0,null,KMD.ITEM_PAYMENT * KUK.SIGN_FLAG),'99G999G999G999D00')) AS A7,
							to_char(DECODE(KMD.ITEM_BALANCE,0,null,KMD.ITEM_BALANCE),'99G999G999G999D00') AS A9,
							(KMD.CALINTTO_DATE - KMD.CALINTFROM_DATE) AS A10, 
							TO_CHAR(KMD.POSTING_DATE, 'DD/MM/YYYY','NLS_CALENDAR=''THAI BUDDHA') AS  A11,
							KMD.SEQ_NO AS SEQ
						FROM 
							KPMASTRECEIVEDET KMD, KPUCFKEEPITEMTYPE KUK, LNLOANTYPE LNT
						WHERE 
							KMD.KEEPITEMTYPE_CODE = KUK.KEEPITEMTYPE_CODE
                                                        AND KMD.SHRLONTYPE_CODE = LNT.LOANTYPE_CODE(+)
							AND KMD.MEMBER_NO = '$member_no'
							AND KMD.RECV_PERIOD = '$slip_date'
					) ORDER BY SEQ ";
	$value = array('A0','A1','A2','A3','A4','A5','A6','A7','A8','A9','A10','A11');		
	list($Num_Rows,$slip_show) = get_value_many_oci($strSQL,$value);	
	$totalpayment = 0;
	$j=0;
	for($i=0;$i<$Num_Rows;$i++){ 
		$slip_no[$i] 			= $slip_show[$i][$j++];   				
		$slip_itemtype[$i] 	= $slip_show[$i][$j++];			
		$slip_itemdesc[$i]	= $slip_show[$i][$j++];
		$slip_loanno[$i] 		= $slip_show[$i][$j++];
		$slip_desc[$i] 		= $slip_show[$i][$j++];
		$slip_principal[$i]	= $slip_show[$i][$j++];
		$slip_interest[$i] 	= $slip_show[$i][$j++];
		$slip_pay[$i] 			= $slip_show[$i][$j++];
		$period[$i]				= $slip_show[$i][$j++];
		$itembalance[$i] 	= $slip_show[$i][$j++];
		$rate_day[$i] 		= $slip_show[$i][$j++];
		$slipdate		 		= $slip_show[$i][$j++];
		$j=0;
		$totalpayment 		= $totalpayment + str_replace( ',','', $slip_pay[$i] );		
	}	
	
	$strSQL1 = "SELECT 
						'�ѡ���м�ҹ�ѭ���Թ�ҡ : ' AS MONEYTYPE_CODE,
						KPE.EXPENSE_ACCID AS EXPENSE_ACCID,
						TO_CHAR(DECODE(KPE.ITEM_PAYMENT,0,NULL,KPE.ITEM_PAYMENT),'99G999G999G999D00')  AS ITEM_PAYMENT
					FROM 
						KPRECEIVEEXPENSE KPE
					WHERE 
						KPE.MONEYTYPE_CODE IN 'TDP'
						AND KPE.MEMBER_NO = '$member_no'
						AND KPE.RECV_PERIOD = '$showslip' ";
	$value1 = array('MONEYTYPE_CODE','EXPENSE_ACCID','ITEM_PAYMENT');
	list($Num_Rows1,$slip_show1) = get_value_many_oci($strSQL1,$value1);
	$m=0;
	for($n=0;$n<$Num_Rows1;$n++){ 
		$moneytype_code	= $slip_show1[$n][$m++];   
		$expense_accid		= $slip_show1[$n][$m++];   
		$item_payment		= $slip_show1[$n][$m++];   
		$m=0;
		$payment_a = str_replace( ',','',$item_payment);
	}
	
?>

