
<html>
<head> <title>���Ѥ���Ҫԡ</title>

  <script type="text/javascript">
  function printDiv(divName) {
  var printContents = document.getElementById(divName).innerHTML;
  var originalContents = document.body.innerHTML;

  document.body.innerHTML = printContents;
  window.print();

  document.body.innerHTML = originalContents;
  }
        function chkConfirm()
                {
                
                window.location = 'index.php';
                
                }
  function printdiv(printpage){
		var headstr = "<html><head><title></title></head><body>";
		var footstr = "</body>";
		var newstr = document.all.item(printpage).innerHTML;
		var oldstr = document.body.innerHTML;
		document.body.innerHTML = headstr+newstr+footstr;
		window.print();
		document.body.innerHTML = oldstr;
		return false;
	}
  
  </script>

<style>
  #pp{
    font-size: 16px;
    line-height: 16pt;
    font-family:"Angsana New";
	margin-left: 10px
  }
  #register{
    margin-top: 5pt;
    margin-right:15pt;
  }
  
</style>
</head>
<body>
  <!--<div id="register" >
  <a onclick="window.print()"> <img src="../img/pp.png" width="50px" height="50px" align = 'right'> &nbsp;&nbsp;&nbsp; &nbsp;</a>
</div>-->

<!--<form id="form3" name="form1" method="post" action="">
          <a onclick="chkConfirm()"> <img src="../img/close_page.png" width="50px" height="50px" align = 'right'> &nbsp;&nbsp;&nbsp; &nbsp;</a>
		<a onclick="printdiv('div_print1');checkconfirmclosewindow()"> <img src="../img/pp.png" width="50px" height="50px" align = 'right'> &nbsp;&nbsp;&nbsp; &nbsp;</a>
		
    </form>-->
  
   <?php
   
   require "../include/conf.conn.php";
   require "../include/lib.Etc.php";
   require "../include/lib.Oracle.php";
   
    $card_person = $_POST['card_person'];
   
						  $strSQL = "select TO_CHAR(sysdate, 'DD/MM/YYYY','NLS_CALENDAR=''THAI BUDDHA') as date_now,
                                                mup.prename_desc || mb.memb_name || ' ' || mb.memb_surname as full_name,
                                                mb.memb_addr,
                                                mb.road,
                                                mt.tambol_desc as tambol_code,
                                                md.district_desc as district_code,
                                                mp.province_desc as province_code,
                                                TO_CHAR(mb.birth_date, 'DD/MM/YYYY','NLS_CALENDAR=''THAI BUDDHA') as birth_date,
                                                floor(floor(MONTHS_BETWEEN(sysdate,mb.birth_date )) /12) as year,
                                                mb.card_person,
                                                trim(mug.membgroup_desc)as membgroup_desc,
                                                mut.position_desc,
                                                mb.salary_id,
                                                (case when mb.mem_tel is null then mb.mem_telmobile 
                                                         when mb.mem_telmobile is null then mb.mem_tel
                                                else mb.mem_tel || ',' || mb.mem_telmobile end) as mem_tel,
                                                mb.periodshare_value,
                                                mb.refer_name,
                                                mb.referaddr_no, 
                                                mb.referaddr_road, 
                                                mt1.tambol_desc as refertambol_code, 
                                                md1.district_desc as referamphur_code, 
                                                mp1.province_desc as referprovince_code, 
                                                muc.gain_concern, 
                                                mb.referaddr_phone,ftreadtbath(mb.periodshare_value) as ftreadtbath , appl_docno
                                                from mbreqappl mb, 
                                                mbucfprename mup,
                                                mbucfmembgroup mug,
                                                mbucfposition mut,
                                                mbucfgainconcern muc,
                                                mbucftambol mt,
                                                mbucfdistrict md,
                                                mbucftambol mt1,
                                                mbucfdistrict md1,
                                                mbucfprovince mp,
                                                mbucfprovince mp1
                                                where mb.card_person = '$card_person' and 
                                                mb.prename_code = mup.prename_code(+) and
                                                mb.membgroup_code = trim(mug.membgroup_code(+)) and
                                                mb.position_code = mut.position_code(+) and
                                                mb.refer_relation = muc.concern_code(+) and
                                                mb.tambol_code = mt.tambol_code(+) and
                                                mb.refertambol_code = mt1.tambol_code(+) and
                                                mb.district_code = md.district_code(+) and
                                                mb.referamphur_code = md1.district_code(+) and
                                                mb.province_code = mp.province_code(+) and
                                                mb.referprovince_code = mp1.province_code(+)  and mb.appl_status <> '1' and mb.appl_docno = (select max(mb1.appl_docno) from mbreqappl mb1 where mb1.card_person = mb.card_person) ";
						$objParse = oci_parse($objConnect, $strSQL);
						oci_execute ($objParse,OCI_DEFAULT);
							while($objResult = oci_fetch_array($objParse,OCI_BOTH)){
					
                                                     $date_now  = $objResult[0];
                                                     $full_name = $objResult[1]; 
                                                     $memb_addr = $objResult[2];
                                                     $road = $objResult[3];
                                                     $tambol_code = $objResult[4];
                                                     $district_code = $objResult[5];
                                                     $province_code = $objResult[6];
                                                     $birth_date = $objResult[7];
                                                     $year = $objResult[8];
                                                     $card_person = $objResult[9];
                                                     $membgroup_desc = $objResult[10];
                                                     $position_desc = $objResult[11];
                                                     $salary_id = $objResult[12];
                                                     $mem_tel = $objResult[13];
                                                     $periodshare_value = $objResult[14];
													 $periodshare_value = number_format($periodshare_value, 2);
                                                     $refer_name = $objResult[15];
                                                     $referaddr_no = $objResult[16];
                                                     $referaddr_road = $objResult[17];
                                                     $refertambol_code = $objResult[18];
                                                     $referamphur_code = $objResult[19];
                                                     $referprovince_code = $objResult[20];
                                                     $gain_concern = $objResult[21];
                                                     $referaddr_phone = $objResult[22];
													  $ftreadtbath = $objResult[23];
													  $appl_docno = $objResult[24];

                                                    
                                                    ?>
							
    <div id="div_print1">
  <div id="pp"> <center><h4><b> ���Ѥ���Ҫԡ �ˡó������Ѿ�쾹ѡ�ҹ����ື��� �ӡѴ </b></h4></center> </div>
  <div id="pp"><center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

��¹��� ....................................................... </center></div>
  <div id="pp"><center>�ѹ��� <?php echo $date_now; ?></center></div><br><br>
  <div id="pp">���¹&nbsp;&nbsp;&nbsp;��С�����ô��Թ��� &nbsp;�ˡó������Ѿ�쾹ѡ�ҹ����ື��� �ӡѴ</div><br>
  <div id="pp">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��Ҿ��� &nbsp;&nbsp;<?php echo $full_name; ?> &nbsp;�����ҹ�Ţ��� <?php echo $memb_addr; ?> ��� <?php echo $road; ?> �Ӻ�/�ǧ <?php echo $tambol_code; ?> �����/ࢵ <?php echo $district_code; ?>  �ѧ��Ѵ <?php echo $province_code; ?></div>
  <div id="pp"> ���Һ�ѵ�ػ��ʧ��ͧ�ˡó��µ�ʹ���������繪ͺ��ѵ�ػ��ʧ��ͧ�ˡó� �֧����Ѥ��������Ҫԡ�ͧ�ˡó� ���</div>
 <div id="pp">�������¤�����ѡ�ҹ�ѧ���仹��</div><br> 
  <div id="pp">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��� 1. ��Ҿ��������� <?php echo $year; ?> ��  &nbsp;&nbsp; (�ѹ/��͹/���Դ) <?php echo $birth_date; ?>&nbsp;&nbsp;
  �ѵû�Шӵ�ǻ�ЪҪ��Ţ��� <?php echo $card_person; ?> </div><br>
  <div id="pp">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��� 2. ��Ҿ����繾�ѡ�ҹ��Ш�  &nbsp;&nbsp;<?php echo $membgroup_desc; ?> 
  <br>���˹� &nbsp;&nbsp;<?php echo $position_desc; ?>&nbsp;&nbsp; ���ʾ�ѡ�ҹ <?php echo $salary_id; ?>&nbsp;&nbsp; ���Ѿ����Դ��� <?php echo $mem_tel; ?> </div><br>
  <div id="pp">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��� 3. ��Ҿ�����������Ҫԡ��ˡó������Ѿ�����   ������ѵ�ػ��ʧ��㹡�á������Թ</div><br>
  <div id="pp">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��� 4. ����͢�Ҿ������������Ҫԡ�ˡó��       ��Ҿ��Ң��ʴ������ӹ����Թ�����������͹����ˡó���ѵ����͹��  <?php echo $periodshare_value; ?> �ҷ ( <?php echo $ftreadtbath; ?> )    ��Ť�������  10  �ҷ     ��������¡����ѵ�ҷ���˹�</div><br>
  <div id="pp">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��� 5. ��Ң�Ҿ���������Ҫԡ      ��Ҿ����Թ��������ѧ�Ѻ�ѭ���������˹�ҷ������Թ�������͹�ͧ��Ҿ����ѡ�Թ��ͧ��Ҿ���</div>
  <div id="pp">����ӹǹ�Թ�����������͹      ��Шӹǹ�Թ��ҧǴ����˹��        �������ˡó�ء���駷���ա�è����Թ�������͹����</div><br>
  <div id="pp">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��� 6. ��Ҿ����ѭ����Ҷ���ˡó쵡ŧ����Ҿ�������Ҫԡ��       ��Ҿ��Ҩ�ŧ�����ͪ���㹷���¹��Ҫԡ��駪��Ф�Ҹ�������</div>
  <div id="pp">�á�������Թ�����鹵����ͺѧ�Ѻ�ˡó�������������ѹ����ˡó����˹���ê����Թ�ӹǹ�ѧ����ǹ�� ��Т�Ҿ����Թ������</div>
  <div id="pp">��ԺѵԵ������㹢�� 5. ����</div><br>
  <div id="pp">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��� 7. ��Ң�Ҿ���������Ҫԡ�л�ԺѵԵ����ͺѧ�Ѻ����º���    �����Ԣͧ�ˡó�Ϸء��С��</div><br><br>
  <div id="pp"><center> ....................................................�����Ѥ�</center></div>
  <div id="pp"><center>(&nbsp; <?php echo $full_name; ?> &nbsp;)</center></div><br>
  <div id="pp">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���Ѻ�ͧ��Ң�ͤ�����ҧ���繤�����ԧ</div><br>
  <div id="pp">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;............................................����Ѻ�ͧ (���ѧ�Ѻ�ѭ�ҵ����§ҹ)</div>
  <div id="pp">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(............................................)</div>
  <div id="pp">&nbsp;&nbsp;&nbsp;&nbsp;���˹�............................................</div><br>
  <div id="pp"><b><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u> </b> </div>
  <div id="pp"><b><u>�����˵�</u> �����Ѥèе�ͧṺ���Һѵû�ЪҪ� �������˹�Һѭ�ո�Ҥ�÷������Թ��͹ (���Ѻ�ͧ���Ҷ١��ͧ)</b> </div><br><br>
  <div id="pp"><b> �ؤ����ҧ�ԧ &nbsp;&nbsp;&nbsp;</b></div>
  <div id="pp">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $refer_name; ?>&nbsp;&nbsp;&nbsp; �����ҹ�Ţ��� <?php echo $referaddr_no; ?> ��� <?php echo $referaddr_road; ?>  �Ӻ�/�ǧ <?php echo $refertambol_code; ?> �����/ࢵ <?php echo $referamphur_code; ?> �ѧ��Ѵ <?php echo $referprovince_code; ?></div>
  <div id="pp">��������ѹ�� <?php echo $gain_concern; ?>&nbsp;&nbsp; ���Ѿ����Դ��� <?php echo $referaddr_phone; ?></div><br>
  <!--<div id="pp">���Ѿ����Դ��� <?php //echo $referaddr_phone; ?></div><br>-->
  
                        <?php }   if($appl_docno != "") { ?>
  
  <div id="pp"><b> ����Ѻ�Ż���ª�� </b></div>
  <div id="pp">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�Թ������ �Թ�ѹ�� �Թ����¤׹����͢�Ҿ��Ҷ֧����� ��� </div>
  
   <?php 
 
   
					$strSQL = "SELECT MUP.PRENAME_DESC || MB.GAIN_NAME || ' ' || MB.GAIN_SURNAME AS FULLGAINNAME,
                                                    MB.GAIN_ADDR,
                                                    MUC.GAIN_CONCERN,
                                                    MB.GAIN_PERCENT,MB.SEQ_NO,MB.GAINCARD_PERSON
                                                    FROM MBREQAPPLGAIN MB , MBUCFPRENAME MUP , MBUCFGAINCONCERN MUC
                                                    WHERE MB.PRENAME_CODE = MUP.PRENAME_CODE(+) AND
                                                    MB.GAIN_RELATION = MUC.CONCERN_CODE(+) AND MB.APPL_DOCNO = '$appl_docno' ORDER BY  MB.SEQ_NO ";
					$value = array('FULLGAINNAME','GAIN_ADDR','GAIN_CONCERN','GAIN_PERCENT','SEQ_NO','GAINCARD_PERSON');
					list($Num_Rows,$list_info) = get_value_many_oci($strSQL,$value);
					$j=0;
					for($i=0;$i<$Num_Rows;$i++){
						$fullgainname = $list_info[$i][$j++];
						$gain_addr = $list_info[$i][$j++];
						$gain_concern = $list_info[$i][$j++];
                                                $gain_percent = $list_info[$i][$j++];
                                                $seq_no = $list_info[$i][$j++];
												$gaincard_person = $list_info[$i][$j++];
												
												if($gaincard_person == ""){
												
												$gaincard_person = " (������к�) ";
												
												}
						$j=0;
					
				?>
  
  <div id="pp"> <?php echo $seq_no; ?>.&nbsp;<?php echo $fullgainname; ?> &nbsp;&nbsp; <?php echo $gain_addr; ?> &nbsp;&nbsp;  ��������ѹ�� <?php echo $gain_concern; ?> &nbsp;&nbsp;&nbsp;   �Ţ�ѵû�ЪҪ� <?php echo $gaincard_person; ?></div>
  <div id="pp">���Ѿ����Դ��� ...................................... �Ż���ª��Դ��  &nbsp;&nbsp; <?php echo $gain_percent; ?>%</div><br>
  
     <?php } 
	 
	 }else{  
	 echo '<script type="text/javascript"> window.alert("��辺㺤Ӣ� !!! ��سҷ���¡�������ա����") </script> ';
     echo "<script>window.location = 'index.php'</script>";
	exit; 
	} 
	?>
	 
	 </div>
               
</body>
</html>
