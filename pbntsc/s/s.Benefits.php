<?php
@header('Content-Type: text/html; charset=tis-620');
?>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
<?php
$strSQL = "SELECT 
		MBN.FUNDCOLL_AMT AS A0,
		MBN.FTSCINS_AMT AS A1,
		MBN.FSCTINS_AMT AS A2,
		MBN.SKSCOOP_AMT AS A3,
		MBN.INS01_AMT AS A4,
		MBN.INS02_AMT AS A5,
		MBN.INS04_AMT AS A6,
		MBN.INS05_AMT AS A7
		FROM MBNOTICEWELFARE MBN WHERE MEMBER_NO='$member_no'";
$value = array('A0','A1','A2','A3','A4','A5','A6','A7');
list($Num_Rows,$list) = get_value_many_oci($strSQL,$value);
$j=0;
for($i=0;$i<$Num_Rows;$i++){
	$fundcoll = $list[$i][$j++];//�ͧ�ع��ӻ�Сѹ�Թ��� 
	$ftscins = $list[$i][$j++];//��ͤ.�����
	$fsctins = $list[$i][$j++];//��.���.������
	$skscoop = $list[$i][$j++];//��Ҥ��һ��Ԩ ��.���ྪú�ó�
	$credits = $list[$i][$j++];//��Сѹ�Թ����
	$skscoop100 = $list[$i][$j++];//�ˡó�ϻ�Сѹ 100 % �ˡó�������»�Сѹ���
	$voluntary = $list[$i][$j++];//��Сѹ� �Ҥ��Ѥ��
	$voluntaryold = $list[$i][$j++];//��Сѹ� �.�.�.
	$sum_benefit =  $ftscins + $fsctins + $skscoop + $credits + $skscoop100 + $voluntary + $voluntaryold;
	$j=0;
}

$j=0;
$strSQL1 = "SELECT
        MBUCFPRENAME.PRENAME_DESC||''||MBGAINDETAIL.GAIN_NAME||' '|| MBGAINDETAIL.GAIN_SURNAME AS A0  ,
        MBGAINDETAIL.GAIN_ADDRESS AS A1,    
        MBUCFGAINCONCERN.GAIN_CONCERN AS A2
		FROM MBGAINDETAIL,MBUCFPRENAME,MBGAINMASTER,MBUCFGAINCONCERN
		WHERE  MBGAINDETAIL.PRENAME_CODE = MBUCFPRENAME.PRENAME_CODE AND 
		MBGAINMASTER.MEMBER_NO = '$member_no' AND 
		MBGAINDETAIL.CONCERN_CODE = MBUCFGAINCONCERN.CONCERN_CODE AND
        MBGAINDETAIL.MEMBER_NO = '$member_no'  AND  
		MBGAINDETAIL.GAIN_STATUS = 1 ";
		$value1 = array ('A0','A1','A2');
		list($Num_Rows1,$list1) = get_value_many_oci($strSQL1,$value1);
		$j=0;

		for($i=0; $i <$Num_Rows1; $i++)
		{
			$fullname_gain = $list1[$i][$j++];
			$address_gain =	$list1[$i][$j++];
			$concern_gain =	$list1[$i][$j++];
			$j=0;
		}
		
		$j=0;
		
/*$strSQL2 = "select interest_return as Z0 ,fundbalance as Z1   from  fundcollmaster_1 where member_no = '$member_no' ";
		$value2 = array ('Z0','Z1');
		list($Num_Rows2,$list2) = get_value_many_oci($strSQL2,$value2);
		$j=0;

		for($i=0; $i <$Num_Rows2; $i++)
		{
			 $interest_return = $list2[$i][$j++];
			 
			 $interest_return = number_format($interest_return, 2);

			 $fundbalance = $list2[$i][$j++];
			 

			if($fundbalance > 10000){
			 $avg = $fundbalance - 10000;
			}else{
			$fundbalance = $fundbalance;
			}
			$fundbalance_full = number_format($fundbalance);
			$fundbalance_full_t = number_format($fundbalance,2);
		        $avg_full  = number_format($avg );
				$avg_full_t  = number_format($avg,2 );
			
			$j=0;
		}*/
		
		$strSQL3 = "select interest_return as Z0, fundbalance as Z1,  fundarrear_amt as Z2, fundbalance as Z3  from  fundcollmaster where member_no = '$member_no' and fund_status = '1'";
		$value3 = array ('Z0','Z1','Z2','Z3');
		list($Num_Rows3,$list3) = get_value_many_oci($strSQL3,$value3);
		$j=0;

		for($i=0; $i <$Num_Rows3; $i++)
		{
			 $interest_return = $list3[$i][$j++];
			 $interest_return_full = number_format($interest_return,2);
			 $fundbalance = $list3[$i][$j++];
			 $fundbalance_full = number_format($fundbalance,2);
			 $fundarrear_amt = $list3[$i][$j++];
			 $fundarrear_amt_full = number_format($fundarrear_amt,2);
			 $fundbalance_2 = $list3[$i][$j++];
			  $fundbalance_2_full = number_format($fundbalance_2,2);
			 
			/* $interest_return = number_format($interest_return, 2);

			 $fundbalance = $list2[$i][$j++];
			 

			if($fundbalance > 10000){
			 $avg = $fundbalance - 10000;
			}else{
			$fundbalance = $fundbalance;
			}
			$fundbalance_full = number_format($fundbalance);
			$fundbalance_full_t = number_format($fundbalance,2);
		        $avg_full  = number_format($avg );
				$avg_full_t  = number_format($avg,2 );*/
			
			$j=0;
		}
?>

