<?php
session_start();
header('Content-Type: text/html; charset=tis-620');
require "../include/conf.conn.php";
require "../include/conf.c.php";
$connectby = "desktop";
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?=$title?></title>
	<link href="../css/jquery-ui-1.10.4.css" rel="stylesheet">
	<link rel="shortcut icon" href="../img/logo.png">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <script src="../js/jquery.js"></script>
	<script src="../js/index.js"></script>
</head>
<body>
<?php require "../include/conf.d.php" ?>
<?php if($_REQUEST["usr"] == null or $_REQUEST["pwd"] == null){ ?>
<center><br><br><br><br>
<table width="1050" height="90%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="middle" >
    <table width="1000" border="0" align="center" cellpadding="0" cellspacing="0"  bgcolor="#3399ff">
      <tr>
        <!--td height="120" background="../img/head_info_bg.png"-->
		<td height="120" bgcolor="#3399ff">
<table width="994" border="0" cellspacing="3" cellpadding="0"class="txtShadow">
          <tr>
            <td width="140" height="100" align="center"><img src="../img/logo.png" width="90" height="90"></td>
            <td width="845"><table width="100%" border="0" cellspacing="5" cellpadding="0">
              <tr>
                <th align="left"><font face='Tahoma' size="5" color="#FFFFFF"><strong>
                  <?=$title?>
                </strong></font><br/>
                <font face='Tahoma' size="3" color="#FFFFFF">
                <?=$sub_title1?>
                </font></th>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
            </table></td>
          </tr>
        </table></td>
        </tr>
      
	  <tr>
        <td height="435"  background="../img/bg.png">
		<br><br><br><br><br>
        <table width="995" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="600" align="center">
		<!--<br><br><br><br><img src="../img/confirm.png" border="0"><br><br><br><br><br><br>-->
		</td>
            <td align="center">
			<table width="450" border="0" align="center" cellpadding="0" cellspacing="0"class="txtShadow">
              <tr>
                <td align="left" bgcolor="<?=$bg_login_color?>">&nbsp;</td>
              </tr>
              <tr>
                <th height="35" align="center" bgcolor="<?=$bg_bar_login_color?>"><font face='Tahoma' size="4" color="<?=$font_bar_login_color?>"><strong>
                  <?=$sub_title?>
                </strong></font></th>
              </tr>
              <tr>
                <td align="left" bgcolor="<?=$bg_login_color?>"><form name="formID1" method="post" action="">
                  <table width="400" border="0" align="center" cellpadding="0" cellspacing="8">
                    <tr>
                        <td class="txtIndex"align="right"><font color="#FFFFFF">����¹��Ҫԡ : </font></td>
                      <td><input name="usr" type="text"class="inputs" id="usr" placeholder="����¹��Ҫԡ" autocomplete="off" /></td>
                    </tr>
                    <tr>
                        <td class="txtIndex"align="right"><font color="#FFFFFF">���ʼ�ҹ : </font></td>
                      <td><input name="pwd" type="password"class="inputs" id="pwd" placeholder="���ʼ�ҹ"  autocomplete="off"/></td>
                    </tr>
                    <tr>
                         <td></td>
                      <td><input name="Submit" type="submit" value="�������к�" class="button1">
                        <input name="button" type="reset" value="¡��ԡ" class="button2"></td>
                    </tr>
                    <tr>
                         <td></td>
                      <td><span class="class1">
                        <?php if($connection == 0){ ?>
                        <font face='Tahoma' size="3"><a href="register.php">��Ѥ����ԡ��</a></font>
	          &nbsp;&nbsp;&nbsp;&nbsp;
	        <font face='Tahoma' size="3"><a href="for_got_your_password.php">������ʼ�ҹ</a></font>
                        <?php } ?>
                      </span></td>
                    </tr>
                  </table>
                </form></td>
              </tr>
              <tr>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <!--<td align="center"><a href="browser.html" target="_blank" alt="��ԡ������ҹ"><img src="../img/extra_btn.png" border="0"></a></td>-->
              </tr>
            </table></td>
			<td width="80" align="center">
		<!--<br><br><br><br><img src="../img/confirm.png" border="0"><br><br><br><br><br><br>-->
		</td>
          </tr>
        </table></td>
        </tr>
      <tr>
        <td height="120" align="center" ><span class="class1"><font size="2" color="#FFFFFF"><strong><?=$title?></strong></font><br/><font size="2" color="#FFFFFF"><?=$address?><br/><?=$credite?></font></span></td>
      </tr>
    </table>     </td>
  </tr>
</table>
</center>
<?php }else{ 
	require "../include/lib.Etc.php";
	require "../include/lib.MySql.php";
	require "../include/lib.Oracle.php";
	require "../lib/login.php";
	 }
 ?>
</body>
</html>
