<?php @header('Content-Type: text/html; charset=tis-620'); ?>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
<span class="class1">
<table width="100%" border="0" bordercolor="red" cellspacing="1" cellpadding="6">
<?php for($i=0;$i<count($user_memu);$i++){ ?>
    <tr background="../img/menu.png"><td height="30"><strong><a href="info.php?menu=<?=$user_link[$i]?>"><?=$user_memu[$i]?></a></strong></td></tr>
<?php } ?>
<?php if($confirmmenu == 0){ ?>
    <tr background="../img/menu.png"><td height="30"><strong><a href="Confirm.php" target="new">�׹�ѹ�ʹ</a></strong></td></tr>
<?php } ?>
<?php if($connection != 1){?>
	<tr background="../img/menu.png"><td height="30"><strong><a href="info.php?menu=Change_Pwd">����¹���ʼ�ҹ</a></strong></td></tr>
<?php } ?>    
	<tr bgcolor=""><td height="30" background="../img/menu.png"><strong><a href="info.php?menu=SigeOut" onclick="return confirm('��ҹ��ͧ����͡�ҡ�к���ԡ����Ҫԡ �� ���� ��� ?');">�͡�ҡ�к�</a></strong></td></tr>
</table>
</span>