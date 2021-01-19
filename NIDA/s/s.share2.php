<?php
@header('Content-Type: text/html; charset=tis-620');
?>
	<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
<?php
$strSQL = "SELECT 
					TO_CHAR(SHS.SLIP_DATE, 'DD/MM/YY','NLS_CALENDAR=''THAI BUDDHA')AS SLIP_DATE,
					TO_CHAR(SHS.OPERATE_DATE, 'DD/MM/YY','NLS_CALENDAR=''THAI BUDDHA')AS OPERATE_DATE,
					SHS.SHRITEMTYPE_CODE AS SHRITEMTYPE_CODE,
					((SHS.SHARE_AMOUNT*10) * SUS.SIGN_FLAG) AS SHARE_AMOUNT,
					(SHS.SHARESTK_AMT*10) AS SHARESTK_AMT , 
					(CASE WHEN SUR.SLIPREMCAUSE_DESC IS NULL THEN SUS.SHRITEMTYPE_DESC ELSE SUR.SLIPREMCAUSE_DESC END) AS SHRITEMTYPE_DESC
				FROM 
					SHSHARESTATEMENT SHS ,CMACCOUNTYEAR CMA ,SHUCFSHRITEMTYPE SUS , SLSLIPPAYIN S, SLSLIPPAYINDET SD , SLUCFSLIPREMARKCAUSE SUR
				WHERE 
					SHS.OPERATE_DATE BETWEEN CMA.ACCSTART_DATE AND CMA.ACCEND_DATE
					AND SHS.SHRITEMTYPE_CODE = SUS.SHRITEMTYPE_CODE(+)
					AND SHS.REF_SLIPNO = S.PAYINSLIP_NO(+) 
					AND S.PAYINSLIP_NO = SD.PAYINSLIP_NO(+) 
					AND SD.SLIPREMCAUSE_CODE = SUR.SLIPREMCAUSE_CODE(+)
					AND  CMA.ACCOUNT_YEAR = '$show_share'
					AND SHS.MEMBER_NO = '$member_no' AND SD.SLIPITEMTYPE_CODE = 'SHR'
					ORDER BY SHS.SEQ_NO ";
$value=array('SLIP_DATE','OPERATE_DATE','SHRITEMTYPE_CODE','SHRITEMTYPE_DESC','SHARE_AMOUNT','SHARESTK_AMT');
list($Num_Rows,$list_info) = get_value_many_oci($strSQL,$value);
$j=0;
for($i=0;$i<$Num_Rows;$i++){
	$slip_date[$i]= $list_info[$i][$j++];
	$operate_date[$i]  = $list_info[$i][$j++];
	$shritemtype_code[$i]= $list_info[$i][$j++];
	$shritemtype_desc[$i]  = $list_info[$i][$j++];
	$share_amount[$i]= $list_info[$i][$j++];
	$sharestk_amt[$i]  = $list_info[$i][$j++];
	$j=0;
}
?>

