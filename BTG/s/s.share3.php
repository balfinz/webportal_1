<?php
@header('Content-Type: text/html; charset=tis-620');
?>
	<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
<?php
$strSQL = " select * from ( SELECT 
					TO_CHAR(SHS.SLIP_DATE, 'DD/MM/YY','NLS_CALENDAR=''THAI BUDDHA')AS SLIP_DATE,
					TO_CHAR(SHS.OPERATE_DATE, 'DD/MM/YY','NLS_CALENDAR=''THAI BUDDHA')AS OPERATE_DATE,
					SHS.SHRITEMTYPE_CODE AS SHRITEMTYPE_CODE,
					SUS.SHRITEMTYPE_DESC AS SHRITEMTYPE_DESC,
					((SHS.SHARE_AMOUNT*10) * SUS.SIGN_FLAG) AS SHARE_AMOUNT,
					(SHS.SHARESTK_AMT*10) AS SHARESTK_AMT
				FROM 
					SHSHARESTATEMENT SHS , SHUCFSHRITEMTYPE SUS 
				WHERE 
					  SHS.SHRITEMTYPE_CODE = SUS.SHRITEMTYPE_CODE(+)
				 	AND SHS.MEMBER_NO = '$member_no' 
					ORDER BY SHS.SEQ_NO desc ) where rownum <=5";
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

