<?php
session_start();
@header('Content-Type: text/html; charset=tis-620');
	require "../include/conf.conn.php";
	require "../include/conf.c.php";
	require "../include/lib.Etc.php";
	require "../include/lib.Oracle.php";
	require "../include/lib.MySql.php";
	$connectby = "desktop";
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?=$title?></title>
	<link rel="shortcut icon" href="../img/logo.gif">
    <link rel="stylesheet" href="../css/validationEngine.jquery.css" type="text/css">
	<link rel="stylesheet" href="../css/template.css" type="text/css">
    <script src="../js/jquery-1.6.min.js" type="text/javascript"></script>
	<script src="../js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="tis-620"></script>
	<script src="../js/jquery.validationEngine.js" type="text/javascript" charset="tis-620"></script>
	<script type="text/javascript">
			jQuery(document).ready(function(){
						jQuery("#formID1").validationEngine('attach', {promptPosition : "topRight", autoPositionUpdate : true});
						jQuery("#formID2").validationEngine('attach', {promptPosition : "topRight", autoPositionUpdate : true});
			});
	</script>

</head>
<body>
<?php require "../include/conf.d.php" ?>
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="middle" bgcolor="#333333">
    <table width="995" border="0" align="center" cellpadding="0" cellspacing="0"  bgcolor="#FFFFFF">
      <tr>
        <td height="120"  background="../img/head_info_bg.png"><table width="994" border="0" cellspacing="3" cellpadding="0">
          <tr>
            <td width="109" height="100" align="right"><img src="../img/logo.gif" width="101" height="101"></td>
            <td width="876"><table width="100%" border="0" cellspacing="5" cellpadding="0">
              <tr>
                <td><font face='Tahoma' size="5" color="#FFFFFF"><strong>
                  <?=$title?>
                </strong></font><br/>
                <font face='Tahoma' size="2" color="#FFFFFF">
                <?=$address?>
                </font></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
            </table></td>
          </tr>
        </table></td>
        </tr>
      <tr>
        <td height="390">
            
            <center><p><font size = "4" color="#0000FF">��Ǩ�ͺ��ª��ͼ�����Է���ŧ���๹����ҡ�����û� 2561</font></p></center>
            <center><p><font size = "3" color="#0000FF">��͡�Ţ����¹��Ҫԡ���ͪ�����Ҫԡ</font></p></center>
            
<form id="formID1" name="formID1" method="post" action="">
  <table width="95%" border="0" align="center" cellpadding="3" cellspacing="6">
    <tr>
      <td align="center"><strong><font size="2" face="Tahoma"> 
        <label for="search"></label>
        <input name="search" type="text" id="search" size="35" />
        <input type="submit" name="button" id="button" value="����" class="button4" />
      </font></strong></td>
    </tr>
  </table>
</form>
          
<?php 
if($_POST["button"] == "����"){
	
		$name = $_POST["search"];
	
                $strSQL2 = " SELECT MEMBER_NO,
                                MUP.PRENAME_DESC || MB.MEMB_NAME || ' ' || MB.MEMB_SURNAME as FULL_NAME,
                                MUG.MEMBGROUP_DESC,
                                TRIM(MUG.MEMBGROUP_CODE) AS MEMBGROUP_CODE,
                                MUD.POSITION_GROUPDET,
                                MB.MEMB_ADDR,
                                MB.ADDR_GROUP,
				MB.MOOBAN,
				MB.SOI,
                                MB.ROAD,
				MB.TAMBOL,
				DS.DISTRICT_DESC,
				PV.PROVINCE_DESC,
				MB.POSTCODE
                                FROM MBMEMBMASTER MB , MBUCFPRENAME MUP , MBUCFMEMBGROUP mug , MBUCFPOSITIONGROUP MUD , MBUCFDISTRICT DS, MBUCFPROVINCE PV
                                where MB.PRENAME_CODE = MUP.PRENAME_CODE and
                                MB.MEMBGROUP_CODE =  MUG.MEMBGROUP_CODE and 
                                MB.position_group = MUD.POSITION_GROUP and
                                MB.DISTRICT_CODE = DS.DISTRICT_CODE(+) AND
                                MB.PROVINCE_CODE = PV.PROVINCE_CODE(+) AND
                                MB.POSTCODE = DS.POSTCODE(+) AND
                                (MB.MEMB_NAME LIKE '%$name%' or MB.MEMBER_NO LIKE '%$name%') ORDER BY MB.MEMBER_NO";
						$value2 = array('MEMBER_NO','FULL_NAME','MEMBGROUP_DESC','MEMBGROUP_CODE','POSITION_GROUPDET','MEMB_ADDR','ADDR_GROUP','MOOBAN','SOI','ROAD','TAMBOL','DISTRICT_DESC','PROVINCE_DESC','POSTCODE');
						list($Num_Rows2,$list_wf) = get_value_many_oci($strSQL2,$value2);
                
$ms = 0;
for($sq = 0 ; $sq < $Num_Rows2 ; $sq++){
    
	 $MEMBER_NO[$sq] = $list_wf[$sq][$ms++]; 
	 $FULL_NAME[$sq] = $list_wf[$sq][$ms++]; 
	 $MEMBGROUP_DESC[$sq] = $list_wf[$sq][$ms++]; 
	 $MEMBGROUP_CODE[$sq] = $list_wf[$sq][$ms++]; 
         $POSITION_GROUPDET[$sq] = $list_wf[$sq][$ms++]; 
         $MEMB_ADDR[$sq] = $list_wf[$sq][$ms++]; 
         $ADDR_GROUP[$sq] = $list_wf[$sq][$ms++]; 
         $MOOBAN[$sq] = $list_wf[$sq][$ms++]; 
         $SOI[$sq] = $list_wf[$sq][$ms++]; 
         $ROAD[$sq] = $list_wf[$sq][$ms++]; 
         $TAMBOL[$sq] = $list_wf[$sq][$ms++]; 
         $DISTRICT_DESC[$sq] = $list_wf[$sq][$ms++]; 
         $PROVINCE_DESC[$sq] = $list_wf[$sq][$ms++]; 
         $POSTCODE[$sq] = $list_wf[$sq][$ms++]; 
        
         if($ADDR_GROUP[$sq] == ""){
             
             $ADDR_GROUP[$sq] = ' -';
         }
        if($MOOBAN[$sq] == ""){
             
             $MOOBAN[$sq] = ' -';
         }
         if($SOI[$sq] == ""){
             
             $SOI[$sq] = ' -';
         }
         if($ROAD[$sq] == ""){
             
             $ROAD[$sq] = ' -';
         }
         if($TAMBOL[$sq]== ""){
             
             $TAMBOL[$sq] = ' -';
         }
         if($DISTRICT_DESC[$sq] == ""){
             
             $DISTRICT_DESC[$sq] = ' -';
         }
         if($PROVINCE_DESC[$sq] == ""){
             
             $PROVINCE_DESC[$sq] = ' -';
         }
         if($POSTCODE[$sq] == ""){
             
             $POSTCODE[$sq] = ' ';
         }
         
     
     if ($PROVINCE_DESC[$sq] == '��ا෾ �') {
             
             $FULL_ADDR[$sq] = $MEMB_ADDR[$sq] .' ����.'.$ADDR_GROUP[$sq] .' �����ҹ.'.$MOOBAN[$sq] .' ���.'.$SOI[$sq].' ���.'.$ROAD[$sq] .' ��ǧ'.$TAMBOL[$sq].' ࢵ'.$DISTRICT_DESC[$sq].' �.'.$PROVINCE_DESC[$sq].' '.$POSTCODE[$sq];
         }
     elseif ($PROVINCE_DESC != '��ا෾ �' && $PROVINCE_DESC != '<����к�>') {
             
              $FULL_ADDR[$sq] = $MEMB_ADDR[$sq] .' ����.'.$ADDR_GROUP[$sq] .' �����ҹ.'.$MOOBAN[$sq] .' ���.'.$SOI[$sq].' ���.'.$ROAD[$sq] .' �Ӻ�'.$TAMBOL[$sq].' �����'.$DISTRICT_DESC[$sq].' �.'.$PROVINCE_DESC[$sq].' '.$POSTCODE[$sq];
   
     }elseif ($PROVINCE_DESC == '<����к�>') {
         
             $FULL_ADDR[$sq] = $MEMB_ADDR[$sq];
         
     }
     
     
     /*if($membgroup_code[$sq] == '010' || $membgroup_code[$sq] == '011' || $membgroup_code[$sq] == '012'){
         
         $FULL_ADDR[$sq] = "";
         
     }*/
        

        $ms = 0;
        
        

}
		?>
<div style="width: auto; height: auto; overflow-y: scroll; scrollbar-arrow-color:blue; scrollbar-face-color: #e7e7e7; scrollbar-3dlight-color: #a0a0a0; scrollbar-darkshadow-color:#888888">
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#999999"><table width="100%" border="0" cellspacing="1" cellpadding="3">
      <tr>
        <td width="8%" align="center" bgcolor="#CCCCFF"><strong>�Ţ��Ҫԡ</strong></td>
        <td width="14%" align="center" bgcolor="#CCCCFF"><strong>���� - ʡ��</strong></td>
        <td width="10%" align="center" bgcolor="#CCCCFF"><strong>˹�����Ҫԡ</strong></td>
        <td width="18%" align="center" bgcolor="#CCCCFF"><strong>������ҹ</strong></td>
        <td width="35%" align="center" bgcolor="#CCCCFF"><strong>�������</strong></td>
      </tr>
    <?php for($sq = 0 ; $sq < $Num_Rows2 ; $sq++){       
        ?>
      <tr>
        <td align="center" bgcolor="#FFFFFF"><?=$MEMBER_NO[$sq]?></td>
        <td align="left" bgcolor="#FFFFFF"><?=$FULL_NAME[$sq]?></td>
        <td align="left" bgcolor="#FFFFFF"><?=$MEMBGROUP_DESC[$sq]?></td>
        <td align="left" bgcolor="#FFFFFF"><?=$POSITION_GROUPDET[$sq]?></td>
        <td align="left" bgcolor="#FFFFFF"><?=$FULL_ADDR[$sq]?></td>
      </tr>
      <?php } ?>
    </table></td>
  </tr>
</table>
</div>
		
<?php } ?>
            
            <div>
            <p style="margin-left: 194px;"><font size = "3" color="#000000">1. ��Ҫԡ����繢���Ҫ��û�Ш��ѧ�Ѵ����Ѳ�Ҫ���� �ˡó�ШѴ�觺ѵ������价��˹��§ҹ����ѧ�Ѵ</font></p>
            <p style="margin-left: 194px;"><font size = "3" color="#000000">2. ��Ҫԡ����繢���Ҫ��úӹҭ���͢���Ҫ����ѧ�Ѵ˹��§ҹ��� �ˡó�ШѴ�觺ѵ������仵�����������������Ѻ�ˡó�</font></p><br>
            <center><p><font size = "2" color="red">�óշ������ѧ��������١��ͧ�ô����ˡó����ͻ�Ѻ��ا��䢷������ �����ѹ��� 25 ���Ҥ� 2560  </font></p></center>
            <p style="margin-left: 243px;"><font size = "3" color="red">�� 02-158-1224-51</font></p>
            
            <center><p><font size = "4" color="#0000FF"><a href="http://www.cddco-op.com/index.php?mo=54&opt=view_entry&form_id=6579" target="_blank">�駻�Ѻ��ا��䢷������ online</a>  </font></p></center>
</div>
        </td>
        </tr>

      <tr>
        <td height="120" align="center" background="../img/footer_info_bg.png"><span class="class1"><font size="2" color="#FFFFFF"><strong><?=$title?></strong></font><br/><font size="2" color="#FFFFFF"><?=$address?><br/><?=$credite?></font></span></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>

