<?php @header('Content-Type: text/html; charset=tis-620'); ?>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
<span class="class1">
<table width="100%" border="0" cellspacing="1" cellpadding="6">
<?php for($i=0;$i<count($admin_menu);$i++){ ?>
    <tr background="../img/menu.png"><td height="30"><strong><a href="administrator.php?menu=<?=$admin_link[$i]?>"><?=$admin_menu[$i]?></a></strong></td></tr>
<?php } ?>
	<tr bgcolor=""><td height="30" background="../img/menu.png"><strong><a href="administrator.php?menu=SigeOut" onclick="return confirm('��ҹ��ͧ����͡�ҡ�������к� �� ���� ��� ?');">�͡�ҡ�к�</a></strong></td></tr>
</table>
</span>