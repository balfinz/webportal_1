<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<style>
	table.infoMemb th {border-top:#0055aa 1px ridge;border-right:#0055aa 1px ridge;border-bottom:#0055aa 1px ridge;border-left:#0055aa 1px ridge;background-color:#3399ff;}
	table.infoMemb td {border-top:#0055aa 1px ridge;border-right:#0055aa 1px ridge;border-bottom:#0055aa 1px ridge;border-left:#0055aa 1px ridge;}
</style>

<?PHP
	@header('Content-Type: text/html; charset=tis-620');
	$strSql = "select * from webmbmembmaster order by id desc";
	$result = mysql_db_query($dbName,$strSql);
		
	echo "<table class='infoMemb'width='100%'border='0'cellspacing='0'cellpadding='3'>
	<tr><th>����ش</th><th>����¹</th><th width='200'>���� - ʡ��</th><th>�����</th><th>������</th><th width='75'>�ѹ�����Ѥ�</th></tr>";
	$no = 1;
	while($rec = mysql_fetch_array($result))
	{
			$membNo = $rec[member_no];
			$membName = $rec[memb_fullname];
			$membIdCard = $rec[idcard];
			$membEmail = $rec[email];
			$membMobile = $rec[mobile];
			$membDate = $rec[date_reg];

			echo "<tr>
			<td align='center'>$no</td>
			<td align='center'>$membNo</td>
			<td width='200'>&nbsp;$membName</td>
			<td >&nbsp;$membEmail</td>
			<td align='center'>$membMobile</td>
			<td width='75'align='center'>$membDate</td>
			</tr>
			";
			$no++;
	}
	echo "</table>";
?>