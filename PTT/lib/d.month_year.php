<?php
session_start();
@header('Content-Type: text/html; charset=tis-620');
?>

<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />

<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left"><strong><font size="4" face="Tahoma">��ʶҹ��Ҿ</font></strong><br />
    <font color="#FF6600" size="2" face="Tahoma">Status Report</font></td>
  </tr>
  <tr>
    <td align="left"><hr color="#999999" size="1"/></td>
  </tr>
</table>


<?php 


$year = date("Y"); // �ջѨ�غѹ �� �.� 
$year_min = $year - 5; // config ��Ҩ���� ����͹��ѧ���� 㹷�����������͹��ѧ 5 ��


?>
<center><h3><font color="red">��س����͡�����ŷ���ͧ��õ�Ǩ�ͺ ���ʶҹ��Ҿ</font></h3></center>

<center><div>
        <form id="form1" name="form1" method="post" action="d.month_year_show.php">
 
        <select name="month" id="month">
      	<option value="">-- ��س����͡��͹ --</option>	
        <option value="01">���Ҥ�</option>
        <option value="02">����Ҿѹ��</option>
        <option value="03">�չҤ�</option>
        <option value="04">����¹</option>
        <option value="05">����Ҥ�</option>
        <option value="06">�Զع�¹</option>
        <option value="07">�á�Ҥ�</option>
        <option value="08">�ԧ�Ҥ�</option>
        <option value="09">�ѹ��¹</option>
        <option value="10">���Ҥ�</option>
        <option value="11">��Ȩԡ�¹</option>
        <option value="12">�ѹ�Ҥ�</option>	
        </select>
        
        <select name="year" id="year">
      	<option value="">-- ��س����͡�� --</option>	
        <?php for($i=$year;$i >= $year_min; $i--) {?>
        <option value="<?=$i?>"><?=$i + 543?></option>
		<?php } ?>
        </select>
        <br><br>
        
        <input type="button" name="button" id="button" value="Submit" class="addnews" onclick="this.form.submit();" />
        
    </form>
  
    </div></center>