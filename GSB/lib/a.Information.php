<?php
session_start();
header('Content-Type: text/html; charset=tis-620');
?>
	<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
    <link rel="stylesheet" href="../css/validationEngine.jquery.css" type="text/css">
	<link type="text/css" href="../css/ui-lightness/jquery-ui-1.8.10.custom.css" rel="stylesheet" />	
    <script src="../js/jquery-1.6.min.js" type="text/javascript"></script>
	<script src="../js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="tis-620"></script>
	<script src="../js/jquery.validationEngine.js" type="text/javascript" charset="tis-620"></script>
	<script type="text/javascript">
		jQuery(document).ready(function(){
						jQuery("#formID1").validationEngine('attach', {promptPosition : "topRight", autoPositionUpdate : true});
		});
		function popup_statment(form) {
			var w = 910;
			var h = 530;
			var left = (screen.width/2)-(w/2);
			var top = (screen.height/3)-(h/3);
			 window.open ('', 'formpopup', 'toolbar=no, location=no, directories=no, status=no, menubar=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
				 form.target = 'formpopup';
			} 
	</script>

<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="right"><strong><font size="4" face="Tahoma">�������к�</font></strong><br />
      <font color="#FF6600" size="2" face="Tahoma">M<span id="result_box" lang="en" xml:lang="en">anual</span> Systems</font></td>
  </tr>
  <tr>
    <td align="right"><hr color="#999999" size="1"/></td>
  </tr>
</table>
<table width="90%" border="0" align="center" cellpadding="4" cellspacing="1">
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td height="36" colspan="3" align="left" bgcolor="#d62e8e"><strong> <font size="3" color="#FFFFFF">��������´��ǹ�Դ��͡Ѻ��Ҫԡ</font></strong></td>
  </tr>
  <tr>
    <td width="35%" align="left">&nbsp;&nbsp;�к��ʴ������</td>
    <td width="8%" align="center"><strong>: </strong></td>
    <td width="57%">�к��ʴ�����稷ء�ѹ��� 10 �ͧ�ء��͹</td>
  </tr>
  <tr>
    <td align="left">&nbsp;&nbsp;�ӹǹ����ʴ����¡����͹��ѧ</td>
    <td align="center"><strong>: </strong></td>
    <td>6 ��͹</td>
  </tr>
  <tr>
    <td align="left">&nbsp;&nbsp;�к� E-Slip ������͹�Ź�</td>
    <td align="center"><strong>: </strong></td>
    <td><font color="#FF0000">���</font></td>
  </tr>
  <tr>
    <td align="left">&nbsp;&nbsp;��¡���Թ�ѭ�������͹��ѧ��</td>
    <td align="center"><strong>: </strong></td>
    <td>��</td>
  </tr>
  <tr>
    <td align="left">&nbsp;&nbsp;��¡���Թ�ѭ���Թ�ҡ��͹��ѧ</td>
    <td align="center"><strong>: </strong></td>
    <td>����Թ 365 �ѹ ( 1 �� ) </td>
  </tr>
  <tr>
    <td align="left">&nbsp;&nbsp;�������¡���Թ�ѭ���Թ�ҡ��͹��ѧ</td>
    <td align="center"><strong>: </strong></td>
    <td>��</td>
  </tr>
  <tr>
    <td align="left">&nbsp;&nbsp;��¡���Թ�ѭ���Թ�����͹��ѧ</td>
    <td align="center"><strong>: </strong></td>
    <td>����Թ 365 �ѹ ( 1 �� ) </td>
  </tr>
  <tr>
    <td align="left">&nbsp;&nbsp;�������¡���Թ�ѭ���Թ�����͹��ѧ</td>
    <td align="center"><strong>: </strong></td>
    <td>��</td>
  </tr>
  <tr>
    <td align="left">&nbsp;&nbsp;��Ҫԡ�繤���˹����ʼ�ҹ�ͧ</td>
    <td align="center"><strong>: </strong></td>
    <td>��</td>
  </tr>
  <tr>
    <td align="left">&nbsp;&nbsp;��Ҫԡ����ö��䢢�������ǹ�����</td>
    <td align="center"><strong>: </strong></td>
    <td><font color="#FF0000">���</font></td>
  </tr>
  <tr>
    <td align="left">&nbsp;&nbsp;��Ҫԡ����ö������ʼ�ҹ��</td>
    <td align="center"><strong>: </strong></td>
    <td>��</td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="90%" border="0" align="center" cellpadding="4" cellspacing="1">
  <tr>
    <td height="36" colspan="3" align="left" bgcolor="#d62e8e"><strong><font size="3" color="#FFFFFF">��������´�������к�</font></strong></td>
  </tr>
  <tr>
    <td align="left">&nbsp;&nbsp;����������ö����,��Ѻ��ا,ź �������</td>
    <td align="center"><strong>: </strong></td>
    <td>��</td>
  </tr>
  <tr>
    <td width="35%" align="left">&nbsp;&nbsp;����������ö��Ǩ�ͺʶҹС����ҹ</td>
    <td width="8%" align="center"><strong>: </strong></td>
    <td width="57%">��</td>
  </tr>
  <tr>
    <td align="left">&nbsp;&nbsp;�����Ѥ����ԡ�õ�ͧ͹��ѵ�</td>
    <td align="center"><strong>: </strong></td>
    <td><strong><font color="#FF0000">���</font></strong></td>
  </tr>
  <tr>
    <td width="35%" align="left">&nbsp;&nbsp;����������ö������ʼ�ҹ</td>
    <td align="center"><strong>: </strong></td>
    <td>��</td>
  </tr>
  <tr>
    <td align="left">&nbsp;&nbsp;����������ö������ʼ�ҹ��Ҫԡ</td>
    <td align="center"><strong>: </strong></td>
    <td>�� ( ������ʼ�ҹ�� &quot;1234&quot; ���������Ҫԡ������䢴��µ��ͧ)</td>
  </tr>
  <tr>
    <td align="left">&nbsp;&nbsp;����������öź��Ҫԡ�����Ѥ�</td>
    <td align="center"><strong>: </strong></td>
    <td>��</td>
  </tr>
  <tr>
    <td align="left">&nbsp;&nbsp;����������ö��Ǩ�ͺ��� Log in</td>
    <td align="center"><strong>: </strong></td>
    <td>�� (����ö����͹��ѧ 15 �����ش����)</td>
  </tr>
  <tr>
    <td align="left">&nbsp;&nbsp;�к��ա�úѹ�֡ IP ADDRESS</td>
    <td align="center"><strong>: </strong></td>
    <td>��</td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
