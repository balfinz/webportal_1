<?php
@header('Content-Type: text/html; charset=tis-620');
?>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
<?php
/*

1. ��ǹ�˭�е�ͧ��Ǩ�ͺ�ҡ table lnloantypecustom
2. �����ŷ���ͧ������������Ѻ��Ǩ�ͺ
 - �Ǵ���
 - �ع���͹���
 - �Թ��͹
3. ��Ң����ŷ�� 3 令�������Է������㹪�ǧ�˹
- �Թ��͹ between startsalary_amt and endsalary_amt
- ��� between startshare_amt and endshare_amt
- �Ǵ��� between startmember_time and endmember_time
4. ��������������㹪�ǧ�˹ ��Ӥ�Ҩӹǹ��Ңͧ�������Թ��͹ �Ҥӹǳ
5. �ó��ժ�ǧ�Է���ҡ���� 1 �� ���ӹǳ�ѧ�����������Է������·���ش

*/
$strSQL = "select 
					m.member_no
					,lt.loantype_desc
					,s.sharestk_amt*sh.unitshare_value*l.percentshare  as credit_share_amt
					,nvl(m.salary_amount,15000)*l.percentsalary  as credit_salary_amt
					,(s.sharestk_amt*sh.unitshare_value*l.percentshare ) + (nvl(m.salary_amount,15000)*l.percentsalary ) as credit_amt
					,s.sharestk_amt
					,sh.unitshare_value
					,l.percentshare
					,l.percentsalary
					,s.last_period
					,m.salary_amount
				from lnloantypecustom l ,mbmembmaster m ,shsharemaster s,shsharetype sh,lnloantype lt
				where m.member_no='$member_no'  
					and s.SHAREMASTER_STATUS = '1' 
					and LT.LOANGROUP_CODE in ( '01','02' )
					and l.loantype_code = lt.loantype_code
					and s.member_no=m.member_no 
					and s.sharestk_amt*sh.unitshare_value between l.startshare_amt and l.endshare_amt 
					and s.last_period between l.startage_amt and l.endage_amt 
					and nvl(m.salary_amount,15000) between l.startsalary_amt and l.endsalary_amt 
				order by l.loantype_code asc ";
$value = array('LOANTYPE_DESC','CREDIT_AMT'); 
list($Num_Rows,$list_info) = get_value_many_oci($strSQL,$value);
if($Num_Rows == 0){
	echo '<script type="text/javascript"> window.alert("��辺��¡�úѭ����鹢ͧ��ҹ") </script> ';
	echo "<script>window.location = 'info.php'</script>";
	exit;
}

?>

