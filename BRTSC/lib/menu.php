<?php @header('Content-Type: text/html; charset=tis-620'); ?>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
<span class="class1">
<table width="100%" border="0" cellspacing="1" cellpadding="11">
<tr bgcolor="#00008C"><td height="20"valign="middle"><font style="font-size:12px;"color="#ffffff">���͡��¡�èҡ���ٴ�ҹ��ҧ</font></td></tr>
<?php for($i=0;$i<count($user_memu);$i++){ ?>
    <tr bgcolor="<?=$menu_color?>"><td height="30"><strong><a href="info.php?menu=<?=$user_link[$i]?>"><?=$user_memu[$i]?></a></strong></td></tr>
<?php } ?>
<?php if($confirmmenu == 1){ ?>
    <tr bgcolor="<?=$menu_color?>"><td height="30"><strong><a href="Confirm.php" target="new">�׹�ѹ�ʹ</a></strong></td></tr>
<?php } ?>
<?php if($connection != 1){?>
	<tr bgcolor="<?=$menu_color?>"><td height="30"><strong><a href="info.php?menu=Change_Pwd">����¹���ʼ�ҹ</a></strong></td></tr>
<?php } ?>    
	<tr><td>&nbsp;</td></tr>
	<tr bgcolor=""><td height="30" bgcolor="#555555"><strong><a href="info.php?menu=SigeOut" onclick="return confirm('��ҹ��ͧ����͡�ҡ�к���ԡ����Ҫԡ �� ���� ��� ?');">�͡�ҡ�к�</a></strong></td></tr>
</table>
</span>