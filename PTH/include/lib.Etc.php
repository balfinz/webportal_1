<?php
session_start();
@header('Content-Type: text/html; charset=tis-620');
?>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<?php

	function get_type($var){ // Check Type value
		if (is_numeric($var)) return "member";
		if (is_string($var)) return "staff";
		return "error";
	} 

    function GetFormatMember($member_no){    // �Ѵ��� format ��Ҫԡ
        $FormatNumber = 8;   // �ӹǹ��ѡ�ͧ��Ҫԡ
        $InputFormat =   strlen($member_no);
        if($InputFormat < $FormatNumber){
            $insertFormat = $FormatNumber - $InputFormat ;
            for($i=0;$i<$insertFormat;$i++){
                $member_no = "0".$member_no;
            }
        }
        return $member_no;
    }

    function GetFormatSlip($slipno){    // �Ѵ��� format slip
		$subid1 = substr($slipno,0,2);
        $subid2 = substr($slipno,2,2);
        $subid3 = substr($slipno,4,8);
      
        $slipno = $subid1.'/'.$subid2.'-'.$subid3;
        return $slipno;
    }
    
    function GetFormatidcare($idcare){    // �Ѵ��� format �ѵû�ЪҪ�
         $subid1 = substr($idcare,0,1);
         $subid2 = substr($idcare,1,4);
         $subid3 = substr($idcare,5,5);
         $subid4 = substr($idcare,10,2);
         $subid5 = substr($idcare,12,1);
         $idcare = $subid1.'-'.$subid2.'-'.$subid3.'-'.$subid4.'-'.$subid5;
        return $idcare;
    }                          
    
     function GetFormatDep($deptaccount_no){    // �Ѵ��� format �Ţ���ѭ��
         $subid1 = substr($deptaccount_no,0,2);
         $subid2 = substr($deptaccount_no,2,2);
         $subid3 = substr($deptaccount_no,4,6);
         $deptaccount_no = $subid1.'-'.$subid2.'-'.$subid3;
         return $deptaccount_no;
    }

    function convertthai($amount_number)       // ˹���ŧ����
    {
        $amount_number = number_format($amount_number, 2, ".","");
        //echo "<br/>amount = " . $amount_number . "<br/>";
        $pt = strpos($amount_number , ".");
        $number = $fraction = "";
        if ($pt === false)
            $number = $amount_number;
        else
        {
            $number = substr($amount_number, 0, $pt);
            $fraction = substr($amount_number, $pt + 1);
        }

        //list($number, $fraction) = explode(".", $number);
        $ret = "";
        $baht = ReadNumber ($number);
        if ($baht != "")
            $ret .= $baht . "�ҷ";

        $satang = ReadNumber($fraction);
        if ($satang != "")
            $ret .=  $satang . "ʵҧ��";
        else
            $ret .= "��ǹ";
        //return iconv("UTF-8", "TIS-620", $ret);
        return $ret;
    }

    function ReadNumber($number)   // �ç����Ţ�繵���ѡ��
    {
        $position_call = array("�ʹ", "����", "�ѹ", "����", "�Ժ", "");
        $number_call = array("", "˹��", "�ͧ", "���", "���", "���", "ˡ", "��", "Ỵ", "���");
        $number = $number + 0;
        $ret = "";
        if ($number == 0) return $ret;
        if ($number >= 1000000)
        {
            $ret .= ReadNumber(intval($number / 1000000)) . "��ҹ";
            $number = intval(fmod($number, 1000000));
        }

        $divider = 100000;
        $pos = 0;
        while($number > 0)
        {
            $d = intval($number / $divider);
            $ret .= (($divider == 10) && ($d == 2)) ? "���" :
            ((($divider == 10) && ($d == 1)) ? "" :
                ((($divider == 1) && ($d == 1) && ($ret != "")) ? "���" : $number_call[$d]));
            $ret .= ($d ? $position_call[$pos] : "");
            $number = $number % $divider;
            $divider = $divider / 10;
            $pos++;
        }
        return $ret;
    } 
	
	function ConvertDate($date,$type_show){
		if($date != null or $date != ""){
			$date = str_replace( '/','-', $date ); 		
			list($day,$month,$year) = split("[-]",$date);    
			$thaimonth=array("","���Ҥ�","����Ҿѹ��","�չҤ�","����¹","����Ҥ�","�Զع�¹","�á�Ҥ�","�ԧ�Ҥ�","�ѹ��¹","���Ҥ�","��Ȩԡ�¹","�ѹ�Ҥ�");
			$thaishort=array("","�.�.","�.�.","��.�.","��.�.","�.�.","��.�.","�.�.","�.�.","�.�.","�.�.","�.�.","�.�.");
			
			if($type_show == "long"){
				$year = $year+543;
				return $value = $day.' '.$thaimonth[$month*1].' '.$year;
			}else if($type_show == "short"){
				$year = $year+543;
				return $value = $day.' '.$thaishort[$month*1].' '.$year;
			}else if($type_show == "num"){
				$year = $year+543;
				return $value = $day.'/'.$month.'/'.$year;
			}else if($type_show == "ad_num"){
				$year = $year-543;
				return $value = $day.'/'.$month.'/'.$year;
			}else if($type_show == "num_bc"){
				return $value = $day.'/'.$month.'/'.$year;
			}else if($type_show == "confirm"){
				return $value = $day.' '.$thaimonth[$month*1].' '.$year;
			}else if($type_show == "compare"){
				//return $value = $day.'-'.$month.'-'.$year-543;
				$year = $year-543;
				return $value = $year.'-'.$month.'-'.$day;
			}
		}else{ return ""; }
	}

    function count_member($date,$type_show){ // �Ѻ�ӹǹ�ѹ�������Ҫԡ "Show" �ӹǹ�� ��͹ �ѹ / �������ҧ �觤׹ �ӹǹ��͹      
		$date1 = new DateTime($date);
		$date2 = new DateTime(date('d-m-Y'));
		$interval = $date1->diff($date2);
		if($type_show == "ym"){
			return  $interval->y ." �� " .$interval->m." ��͹";
		}else if($type_show == "m"){
			return (($interval->y)*12)+($interval->m);			
		}else if($type_show == "d"){
			return (($interval->d));			
		}     
    }

    function DateDiff($strDate1,$strDate2){     // �Ѻ�ӹǹ�ѹ �ҡ 2 ���
		list($day1,$month1,$year1) = split("[/]",$strDate1);   
		$year1 = $year1 - 543;
		$strDate1 = $day1.'-'.$month1.'-'.$year1;
		list($day2,$month2,$year2) = split("[/]",$strDate2);   
		$year2 = $year2 - 543;
		$strDate2 = $day2.'-'.$month2.'-'.$year2;
        return ((strtotime($strDate2) - strtotime($strDate1)) /  ( 60 * 60 * 24 ));  // 1 day = 60*60*24
    } 
	
	function Show_Slip($date) {
		$fixdate = date('10-m-Y');		// ��˹�����ʴ��ء�ѹ��� xx ��͹ ��	
		$arrDate1 = explode("-",$fixdate);
		$arrDate2 = explode("-",$date);
		$timStmp1 = mktime(0,0,0,$arrDate1[1],$arrDate1[2],$arrDate1[0]);
		$timStmp2 = mktime(0,0,0,$arrDate2[1],$arrDate2[2],$arrDate2[0]);
		
		if ($timStmp1 == $timStmp2) {
			$showslip = date('Y').''.date('m');
		} else if ($timStmp1 > $timStmp2) {
			$showslip = gmdate ("Ym", mktime (0,0,0,date('m')+1,date('d'),date('Y')));
		} else if ($timStmp1 < $timStmp2) {
			$showslip = date('Y').''.date('m');
		}
		$y = substr($showslip,0,4);
		$m = substr($showslip,4,2);
		$showslip = ($y+543).''.$m;
	return $showslip;
	}
	
	function show_list($date,$value,$member){
		$t_month=array("","���Ҥ�","����Ҿѹ��","�չҤ�","����¹","����Ҥ�","�Զع�¹","�á�Ҥ�","�ԧ�Ҥ�","�ѹ��¹","���Ҥ�","��Ȩԡ�¹","�ѹ�Ҥ�");
		$s_month=array("","�.�.","�.�.","��.�.","��.�.","�.�.","��.�.","�.�.","�.�.","�.�.","�.�.","�.�.","�.�.");
			
		$strSQL1 = "SELECT 
						  	NVL( 
							  MONTHS_BETWEEN(
							  (SELECT MAX(TO_DATE(RECV_PERIOD||'01','YYYYMMDD')) FROM KPTEMPRECEIVEDET  WHERE MEMBER_NO = '$member'),
							  (SELECT MIN(TO_DATE(RECV_PERIOD||'01','YYYYMMDD')) FROM KPMASTRECEIVEDET  WHERE MEMBER_NO = '$member') )
							,1) AS DIFFSLIP
						FROM dual ";
		$value1 = ('DIFFSLIP');
		$diffslip = get_single_value_oci($strSQL1,$value1);
		if($value > $diffslip){
			 $value = $diffslip + 1;
		}
		$y = substr($date,0,4)-543;
		$m = substr($date,4,2);
		$m = $m+1;
		for($i=0;$i<$value;$i++){
			$showslip = gmdate ("Ym", mktime (0,0,0,date($m)-$i,date('d'),date($y)));
			$slipy = substr($showslip,0,4)+543;
			$slipm = substr($showslip,4,2);
			$slip_m[$i] = $t_month[intval($slipm)].' '.$slipy;
			$slip_s[$i] = $s_month[intval($slipm)].' '.$slipy;
			$slip[$i] = $slipy.''.$slipm;
			
		 	$strSUM = "SELECT * FROM (
								SELECT 
									TO_CHAR(SUM(KTD.ITEM_PAYMENT),'99G999G999G999D00') AS SUMALL 
								FROM 
									KPTEMPRECEIVEDET KTD
								WHERE 
									KTD.MEMBER_NO = '$member' 
									AND KTD.RECV_PERIOD = '$slip[$i]'
									AND KTD.POSTING_STATUS = 0
							UNION
								SELECT 
									TO_CHAR(SUM(KMD.ITEM_PAYMENT),'99G999G999G999D00') AS SUMALL 
								FROM 
									KPMASTRECEIVEDET KMD
								WHERE 
									KMD.MEMBER_NO = '$member' 
									AND KMD.RECV_PERIOD = '$slip[$i]'
									) WHERE SUMALL IS NOT NULL ";
			$valuesum = ('SUMALL');
			$slipsum[$i]  = get_single_value_oci($strSUM,$valuesum);
		}
		return array($slip,$slip_m,$slip_s,$slipsum);
	}
	
	function show_month($date){
		$t_month=array("","���Ҥ�","����Ҿѹ��","�չҤ�","����¹","����Ҥ�","�Զع�¹","�á�Ҥ�","�ԧ�Ҥ�","�ѹ��¹","���Ҥ�","��Ȩԡ�¹","�ѹ�Ҥ�");
		$m = substr($date,4,2);
		$y = substr($date,0,4);
		return $t_month[intval($m)].' '.$y;		
	}
	
	function DateThai($strDate)	{
		if($strDate == ""){
			return null;
		}else{
			$strYear = date("Y",strtotime($strDate))+543;
			$strMonth= date("n",strtotime($strDate));
			$strDay= date("j",strtotime($strDate));
			$strHour= date("H",strtotime($strDate));
			$strMinute= date("i",strtotime($strDate));
			$strSeconds= date("s",strtotime($strDate));
			$strMonthCut = Array("","�.�.","�.�.","��.�.","��.�.","�.�.","��.�.","�.�.","�.�.","�.�.","�.�.","�.�.","�.�.");
			$strMonthThai=$strMonthCut[$strMonth];
			return "$strDay $strMonthThai $strYear, $strHour:$strMinute";
		}
	}
	
	
	
	
?>
<div id="webtimeout" style="display:<?=$webtimeout_showflag==1?"":"none"?>;"></div>
<script>
// Set the date we're counting down to
var countDownDate = new Date();
countDownDate.setMinutes(countDownDate.getMinutes() + <?=$webtimeout?>);

// Update the count down every 1 second
var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();

  // Find the distance between now an the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="webtimeout"
  var txt=" Session will EXPIRED in ";
  txt=txt+ ((days>0)?(days + "d "):"");
  txt=txt+ ((hours>0)?(hours + "h "):"");
  txt=txt+ ((minutes>0)?(minutes + "m "):"");
  txt=txt+ ((seconds>0)?(seconds + "s "):"");
   document.getElementById("webtimeout").innerHTML =txt;
  // If the count down is finished, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("webtimeout").innerHTML = "EXPIRED";
	window.location='<?=((get_type($member_no) == "member")?"index.php":"administrator.php")?>?menu=SigeOut';
  }
}, 1000);
</script>
