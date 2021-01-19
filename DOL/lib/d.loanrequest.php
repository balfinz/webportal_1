<?php
session_start();
@header('Content-Type: text/html; charset=tis-620');
?>
	<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
    <link rel="stylesheet" href="../css/validationEngine.jquery.css" type="text/css">
	<link type="text/css" href="../css/ui-lightness/jquery-ui-1.8.10.custom.css" rel="stylesheet" />	
    <script src="../js/jquery-1.6.min.js" type="text/javascript"></script>
	<script src="../js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="tis-620"></script>
	<script src="../js/jquery.validationEngine.js" type="text/javascript" charset="tis-620"></script>
	<script type="text/javascript" src="../js/jquery-ui-1.8.10.offset.datepicker.min.js"></script>
	<script src="https://unpkg.com/bowser@2.7.0/es5.js"></script>
	<script type="text/javascript">
		  $(function () {
		    var d = new Date();
		    var toDay = d.getDate() + '/'
        + (d.getMonth() + 1) + '/'
        + (d.getFullYear() + 543);
		    $("#startpay_date").datepicker({ dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay, dayNames: ['�ҷԵ��', '�ѹ���', '�ѧ���', '�ظ', '����ʺ��', '�ء��', '�����'],
              dayNamesMin: ['��.','�.','�.','�.','��.','�.','�.'],
              monthNames: ['���Ҥ�','����Ҿѹ��','�չҤ�','����¹','����Ҥ�','�Զع�¹','�á�Ҥ�','�ԧ�Ҥ�','�ѹ��¹','���Ҥ�','��Ȩԡ�¹','�ѹ�Ҥ�'],
              monthNamesShort: ['�.�.','�.�.','��.�.','��.�.','�.�.','��.�.','�.�.','�.�.','�.�.','�.�.','�.�.','�.�.']});			  
		    $("#datepicker-th1").datepicker({ dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay, dayNames: ['�ҷԵ��', '�ѹ���', '�ѧ���', '�ظ', '����ʺ��', '�ء��', '�����'],
              dayNamesMin: ['��.','�.','�.','�.','��.','�.','�.'],
              monthNames: ['���Ҥ�','����Ҿѹ��','�չҤ�','����¹','����Ҥ�','�Զع�¹','�á�Ҥ�','�ԧ�Ҥ�','�ѹ��¹','���Ҥ�','��Ȩԡ�¹','�ѹ�Ҥ�'],
              monthNamesShort: ['�.�.','�.�.','��.�.','��.�.','�.�.','��.�.','�.�.','�.�.','�.�.','�.�.','�.�.','�.�.']});
			  $("#inline").datepicker({ dateFormat: 'dd/mm/yy', inline: true });
			});
			function popup_statment(form) {
				var w = 910;
				var h = 530;
				var left = (screen.width/2)-(w/2);
				var top = (screen.height/3)-(h/3);
				var slip = $("#slip").val();
				if(slip != ""){
			 window.open ('', 'formpopup', 'toolbar=no, location=no, directories=no, status=no, menubar=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
				 form.target = 'formpopup';
				}
			} 

			jQuery(document).ready(function(){
						jQuery("#formID1").validationEngine('attach', {promptPosition : "topRight", autoPositionUpdate : true});
			});
        </script>
		<style type="text/css">
			body{ font: 80% "Tamaho"; margin: 0px;}
			.demoHeaders { margin-top: 2em; }
			#dialog_link {padding: .4em 1em .4em 20px;text-decoration: none;position: relative;}
			#dialog_link span.ui-icon {margin: 0 5px 0 0;position: absolute;left: .2em;top: 50%;margin-top: -8px;}
			ul#icons {margin: 0; padding: 0;}
			ul#icons li {margin: 2px; position: relative; padding: 4px 0; cursor: pointer; float: left;  list-style: none;}
			ul#icons span.ui-icon {float: left; margin: 0 4px;}
			ul.test {list-style:none; line-height:30px;}
			
			.print_remak{
				display: none;
			}
			@-moz-document url-prefix() {
			.print_remak{
				display: block;
			}
			}
		</style>	
    <?php


    
		
	$LOANTYPE_CODE=array("'',11','21','12','19','73','22','17'"); //Fix ੾�� �Թ��� � ��ҹ��
        //$LOANTYPE_CODE=array("'21'");
	$PROVINCE_CODE=array("'010'"); //Fix �. ���.
	$LOANTYPE_DESC="�ء�Թ"; //Fix ੾�� �Թ��� � ��ҹ��
	$LOAN_CONDITION=1; // 1 ��Ңͧ�Թ��͹
	$COLL_CON_LIMIT=2;// ��������ѭ�� 
	
       /*  if($_REQUEST["loantype_code"] == ""){

                 $_REQUEST["loantype_code"] = "11";
  
        }*/
        
        $sql_month="select 
		        (floor(floor(MONTHS_BETWEEN(SYSDATE,mb.member_date )) /12) * 12 +
			mod(floor(MONTHS_BETWEEN(SYSDATE,mb.member_date )),12) ) as month, 
                        (floor(floor(MONTHS_BETWEEN(mb.retry_date,SYSDATE )) /12) * 12 +
			mod(floor(MONTHS_BETWEEN(mb.retry_date,SYSDATE )),12) ) as month_retry,droploanall_flag,
                        (select pauseloan_cause from lnmembpauseloan where member_no = '$member_no' and loantype_code = '".$_REQUEST["loantype_code"]."') as pauseloan_cause,
                        mb.member_type,
                        s.sharestk_amt * 10 as sharestk_amt
			from mbmembmaster mb , shsharemaster s
			where mb.member_no = '$member_no' and mb.member_no = s.member_no(+) ";   
	  $value_month = array('MONTH','MONTH_RETRY','DROPLOANALL_FLAG','PAUSELOAN_CAUSE','MEMBER_TYPE','SHARESTK_AMT');
      list($Num_Rows_month,$list_info_month) = get_value_many_oci($sql_month,$value_month); 
	  $month =$list_info_month[0][0];
	  $month_retry =$list_info_month[0][1];
	  $droploanall_flag =$list_info_month[0][2];
          $pauseloan_cause =$list_info_month[0][3];
          $member_type =$list_info_month[0][4];
          $sharestk_amt_21 =$list_info_month[0][5];
          $sharestk_amt_21 = $sharestk_amt_21 * 0.9;
        
       
 
	  if($droploanall_flag == 1){
		  
		  
		echo '<script type="text/javascript"> window.alert("�������ö���Թ����� ʶҹТͧ��ҹ��� �����ء��������سҵԴ����ˡó�") </script> ';
		echo "<script>window.location = 'info.php?menu='</script>";
		exit; 
		  
		  
	  }
          
          if($pauseloan_cause != ""){
              
            
              if($_REQUEST["loantype_code"] == "21" || $_REQUEST["loantype_code"] == "22"){
                 
                echo '<script type="text/javascript"> window.alert("�������ö���Թ����� ��Ҫԡ����� ����Ҫԡ��觴����Թ��������������سҵԴ����ˡó�") </script> ';
		echo "<script>window.location = 'info.php?menu=LoanRequest'</script>";
		exit;
              
              }else if ($_REQUEST["loantype_code"] == "12" || $_REQUEST["loantype_code"] == "17"){
                 
                echo '<script type="text/javascript"> window.alert("�������ö���Թ����� ��Ҫԡ����� ����Ҫԡ��觴����Թ��������������سҵԴ����ˡó�") </script> ';
		echo "<script>window.location = 'info.php?menu=LoanRequest'</script>";
		exit;
                  
              }else if ($_REQUEST["loantype_code"] == "11"){
              
              //$show = "��Ҫԡ����� ����Ҫԡ��觴����Թ������������� �˵ؼ� " . $pauseloan_cause;
              
                echo '<script type="text/javascript"> window.alert("�������ö���Թ����� ��Ҫԡ����� ����Ҫԡ��觴����Թ��������������سҵԴ����ˡó�") </script> ';
		echo "<script>window.location = 'info.php?menu=LoanRequest'</script>";
		exit;
                
              }
                
              
              
          }
          
          if($month_retry < 1 && ($_REQUEST["loantype_code"] == "11" || $_REQUEST["loantype_code"] == "73")){
              
              
               //$show = "��Ҫԡ����� ����Ҫԡ��觴����Թ������������� �˵ؼ� " . $pauseloan_cause;
              
                echo '<script type="text/javascript"> window.alert("�������ö���Թ����� ��Ҫԡ����� ����Ҫԡ������³������") </script> ';
		echo "<script>window.location = 'info.php?menu='</script>";
		exit;
              
          }
          
          if($member_type == "1" && ($_REQUEST["loantype_code"] == "17" || $_REQUEST["loantype_code"] == "22")){
              
                echo '<script type="text/javascript"> window.alert("�������ö���Թ����� ��Ҫԡ���ѭ�������ö����¡���Թ��������������") </script> ';
		echo "<script>window.location = 'info.php?menu=LoanRequest'</script>";
		exit;

          }
          
          if($member_type == "2" && ($_REQUEST["loantype_code"] == "11" || $_REQUEST["loantype_code"] == "12" || $_REQUEST["loantype_code"] == "19" || $_REQUEST["loantype_code"] == "21" || $_REQUEST["loantype_code"] == "73")){
              
                echo '<script type="text/javascript"> window.alert("�������ö���Թ����� ��Ҫԡ�����������ö����¡���Թ�����������ѭ��") </script> ';
		echo "<script>window.location = 'info.php?menu=LoanRequest'</script>";
		exit;
              
              
          }
          
         
	  
	  $sql_11="select 
				maxloan_amt , multiple_salary 
				from lnloantypecustom where loantype_code = '11' 
				and '".$month."' between startmember_time and endmember_time ";
	  $value_11 = array('MULTIPLE_SALARY','MAXLOAN_AMT');
      list($Num_Rows_11,$list_info_11) = get_value_many_oci($sql_11,$value_11); 
	  $multiple_salary =$list_info_11[0][0];
	  $maxloan_amt =$list_info_11[0][1];

    if($_REQUEST["loantype_code"] == "11"){
		
       
        
		if($month_retry >= 200){
			
             
                    
			$period_max_11 = 200;
			$period_min_11 = 200;
			
		}else{
			
                    
			$period_max_11 = $month_retry;
			$period_min_11 = $month_retry;
			
		}
		
	}
	
	
	if($_REQUEST["loantype_code"] == "73"){
		
		if($month_retry >= 12){
			
			$period_max_73 = 12;
			$period_min_73 = 12;
			
		}else{
			
			$period_max_73 = $month_retry;
			$period_min_73 = $month_retry;
			
		}
		
	}
	
	$LOAN_CONDITION_SARARY=array("11"=>$multiple_salary,"12"=>0.9,"17"=>0.9,"21"=>1,"22"=>1,"19"=>100,"73"=>99.99); // 1 ��Ңͧ�Թ��͹
	$LOAN_CONDITION_PERIOD_MIN=array("11"=>$period_min_11,"12"=>200,"17"=>48,"21"=>10,"22"=>10,"19"=>12,"73"=>$period_min_73); // 1 ��Ңͧ�Թ��͹
	$LOAN_CONDITION_PERIOD_MAX=array("11"=>$period_max_11,"12"=>200,"17"=>48,"21"=>10,"22"=>10,"19"=>12,"73"=>$period_max_73); // 1 ��Ңͧ�Թ��͹
	$LOAN_CONDITION_MAX_AMT=array("11"=>$maxloan_amt,"12"=>10000000,"17"=>10000000,"21"=>50000,"22"=>50000,"19"=>9660,"73"=>100000); // 1 ��Ңͧ�Թ��͹
	
	 
	
	
	
	
	  if(isset($_REQUEST["startpay_date"])==false||$_REQUEST["loanrequest_status"]=="0"){
		  $_REQUEST["startpay_date"]=date("d/m/").(date("Y")+543);
	  }
	  
	 
	  
	  $sqlX="select 
						to_char(case when to_number(to_char(sl.slip_date,'dd') ) >=20 then  
										LAST_DAY(ADD_MONTHS(sl.slip_date,1)) 
									else LAST_DAY(sl.slip_date)  end ,'dd/mm/yyyy'
									, 'NLS_CALENDAR=''THAI BUDDHA'' NLS_DATE_LANGUAGE=THAI'
								 ) as STARTKEEP_DATE
					from (select to_date('".$_REQUEST["startpay_date"]."','dd/mm/yyyy','NLS_CALENDAR=''THAI BUDDHA'' NLS_DATE_LANGUAGE=THAI') as slip_date from dual ) sl ";
	  $value = array('STARTKEEP_DATE');
      list($Num_RowsX,$list_infoX) = get_value_many_oci($sqlX,$value); 
	  $_REQUEST["startpay_date"]=$list_infoX[0][0];
	  
	 $strSQL="CREATE TABLE if not exists `mdbreqloan` (
					  `loanreq_docno` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
					  `loantype_code` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '10',
					  `member_no` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
					  `phone_no` varchar(20) COLLATE utf8mb4_unicode_ci  NULL,
					  `email` varchar(50) COLLATE utf8mb4_unicode_ci  NULL,
					  `entry_date` datetime NOT NULL,
					  `update_date` datetime NOT NULL,
					  `position_desc` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
					  `membgroup_desc` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
					  `workplace` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
					  `amphur_desc` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
					  `province_desc` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
					  `salary_amt` decimal(10,2) NOT NULL DEFAULT '0.00',
					  `loan_rate` decimal(10,2) NOT NULL DEFAULT '0.00',
					  `objective_desc` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
					  `loanreqmax_amt` decimal(15,2) NOT NULL DEFAULT '0.00',
					  `loanrequest_amt` decimal(15,2) NOT NULL DEFAULT '0.00',
					  `loanpayment_type` decimal(1,0) NOT NULL DEFAULT '1',
					  `period_max` decimal(3,0) NOT NULL DEFAULT '1',
					  `period` decimal(3,0) NOT NULL DEFAULT '1',
					  `period_payment` decimal(15,2) NOT NULL DEFAULT '0.00',
					  `startpay_date` datetime NOT NULL,
					  `loanrequest_status` decimal(1,0) NOT NULL DEFAULT '0',
					  `remark` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
					  `noticedoc_no` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
					  `noticedoc_date` datetime DEFAULT NULL,
					  `loanrequestdoc_no` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
					  `loancontract_no` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
					    ,PRIMARY KEY (loanreq_docno,loantype_code,member_no)
					) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
	 mysql_query($strSQL) ;
	 
	 $strSQL="alter table mdbreqloan add phone_no varchar(20) ";
	 mysql_query($strSQL) ;
	 $strSQL="alter table mdbreqloan add email varchar(50)  ";
	 mysql_query($strSQL) ;
	 $strSQL="alter table mdbreqloan add salary_id varchar(50)  ";
	 mysql_query($strSQL) ;
	 $strSQL="alter table mdbreqloan add (expense_bank varchar(50) ,expense_bankbranch varchar(50) ,expense_banktype varchar(50),expense_accid varchar(20) )  ";
	 mysql_query($strSQL) ;
	 $strSQL="alter table mdbreqloan add (phonework_no  varchar(50),member_age varchar(5) )";
	 mysql_query($strSQL) ;
	 
	
	  
	$strSQL="
	CREATE TABLE if not exists `mdbreqloanfiles` (
	  `loanreq_docno` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
	  `loantype_code` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
	  `member_no` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
	  `seq_no` decimal(10,0) NOT NULL,
	  `reqfiletype_code` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
	  `filename` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
	   ,PRIMARY KEY (loanreq_docno,loantype_code,member_no,seq_no)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
	 mysql_query($strSQL) ;
	 
	 
	$strSQL="	  
	CREATE TABLE if not exists `mdbucfreqfiles` (
	  `reqfiletype_code` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
	  `reqfiletype_desc` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
	  `loantype_code` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL
	   ,PRIMARY KEY (reqfiletype_code,loantype_code)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
	 mysql_query($strSQL) ;
	$strSQL="INSERT INTO `mdbucfreqfiles` (`reqfiletype_code`, `reqfiletype_desc`, `loantype_code`) VALUES
	('1001', '1.����˹�Һѭ�ո�Ҥ�� ����Ţ���ѭ�ժѴਹ (���Ѻ�ͧ���Ҷ١��ͧ)<br/>', '10'),
	('1002', '2.���Һѵû�ЪҪ� (���Ѻ�ͧ���Ҷ١��ͧ)<br/>', '10'),
	('1003', '3.���ҷ���¹��ҹ (���Ѻ�ͧ���Ҷ١��ͧ)<br/>', '10'),
	('1004', '4.������Ի�Թ��͹����ش (���Ѻ�ͧ���Ҷ١��ͧ)<br/>', '11'),
	('2001', '1.���Һѵû�ЪҪ� / ����¹��ҹ / ����¹����  �������Ф������  (���Ѻ�ͧ���Ҷ١��ͧ)<br/>', '20'),
	('2002', '2.���Һѵû�ЪҪ� / ����¹��ҹ / ����¹����  ����ӻ�Сѹ��Ф������(���Ѻ�ͧ���Ҷ١��ͧ)<br/>', '20'),
	('2003', '3.������Ի�Թ��͹����ش  �������м���ӻ�Сѹ��� 2 �� (���Ѻ�ͧ���Ҷ١��ͧ)<br/>', '20'),
	('2004', '4.����˹�Һѭ�ո�Ҥ�� ����Ţ���ѭ�ժѴਹ (���Ѻ�ͧ���Ҷ١��ͧ)<br/>', '20'),
	('2101', '1.���Һѵû�Шӵ�ǻ�ЪҪ� (���Ѻ�ͧ���Ҷ١��ͧ)<br/>', '21'),
	('2102', '2.���ҷ���¹��ҹ (���Ѻ�ͧ���Ҷ١��ͧ)<br/>', '21'),
	('2103', '3.����˹�Һѭ�ո�Ҥ�� (���Ѻ�ͧ���Ҷ١��ͧ)<br/>', '21'),
	('2104', '4.������Ի�Թ��͹����ش<br/>', '21')
	";
	 mysql_query($strSQL) ;
	

$target_dir = "uploads/".$member_no."/".$_REQUEST["loanreq_docno"]."/";
		
    if($_REQUEST["cancelBtn"]!=""){		  
	
		  $strSQL="delete from mdbreqloanfiles where loanreq_docno='".$_REQUEST["loanreq_docno"]."' "; 	 
		  $result = mysql_query($strSQL);
		  
		  $strSQL="delete from  mdbreqloan where loanreq_docno='".$_REQUEST["loanreq_docno"]."'";		 
		  $result = mysql_query($strSQL);
		  $strSQL="delete from  mdbreqloancoll where loanreq_docno='".$_REQUEST["loanreq_docno"]."'";		 
		  $result = mysql_query($strSQL);
		  $strSQL="delete from  mdbreqoffset where loanrequest_no='".$_REQUEST["loanreq_docno"]."'";		 
		  $result = mysql_query($strSQL);
		  $strSQL="delete from  mdbreqpaymentetc where loanrequest_no='".$_REQUEST["loanreq_docno"]."'";		 
		  $result = mysql_query($strSQL);					 
		  if($result==1){
			echo "<script>alert('�ѹ�֡�����');</script>";
			unset($_REQUEST);
		   $_REQUEST["save_mode"]="insert";
		  }else{ 	
			echo "<script>alert('�ѹ�֡��������');</script>";
		  }
		  //echo $_REQUEST["save_mode"].":".$strSQL;
	}

    if($_REQUEST["saveBtn"]!=""){
      
	  if($_REQUEST["save_mode"]=="insert"){
		  
		  
		  // �����اҹ ���� ��������Ҫԡ
		  
		  $sql_month_insert = "select 
			(floor(floor(MONTHS_BETWEEN(SYSDATE,member_date )) /12) * 12 +
			mod(floor(MONTHS_BETWEEN(SYSDATE,member_date )),12) ) as month,
			member_type
			from mbmembmaster 
			where member_no = '$member_no' ";
	  $value_month_insert = array('MONTH','MEMBER_TYPE');
      list($Num_Rows_month_insert,$list_info_month_insert) = get_value_many_oci($sql_month_insert,$value_month_insert); 
	   $month =$list_info_month_insert[0][0];
	   $member_type =$list_info_month_insert[0][1];

		  $loantype_code = $_REQUEST["loantype_code"];
		  
		  if($loantype_code == "11"){ // �Թ������ѭ
			  
			  if($month >= 6){ // �����اҹ 6 ��͹����
				  
				  if($member_type == 1){ // �礻�������Ҫԡ���ѭ
					  
					  
					  
				  }else{ // �ó���������ѭ����ͧ �������ش��÷ӧҹ
				  
				   $delete_mdbreqoffset ="delete from mdbreqoffset where loanrequest_no='".$_REQUEST["loanreq_docno"]."' ";
			       mysql_query($delete_mdbreqoffset) ;
				   
				   $delete_mdbreqpaymentetc ="delete from mdbreqpaymentetc where loanrequest_no='".$_REQUEST["loanreq_docno"]."' ";
			       mysql_query($delete_mdbreqpaymentetc) ;
				  
					  
					echo '<script type="text/javascript"> window.alert("�������ö���Թ����� �Թ������ѭ �ӡ�â͡����੾����Ҫԡ���ѭ��ҹ��") </script> ';
					echo "<script>window.location = 'info.php?menu=LoanRequest'</script>";
					exit;  
					  
				  }
				  
				  
			  }else{ //�óշ�����اҹ����Թ 6 ��͹ �˿�ͧ�������ش��÷ӧҹ
				  
				   $delete_mdbreqoffset ="delete from mdbreqoffset where loanrequest_no='".$_REQUEST["loanreq_docno"]."' ";
			       mysql_query($delete_mdbreqoffset) ;
				   
				   $delete_mdbreqpaymentetc ="delete from mdbreqpaymentetc where loanrequest_no='".$_REQUEST["loanreq_docno"]."' ";
			       mysql_query($delete_mdbreqpaymentetc) ;
				  
				    echo '<script type="text/javascript"> window.alert("�������ö���Թ����� ��ҹ�ѧ��������Ҫԡ���֧ 6 ��͹") </script> ';
					echo "<script>window.location = 'info.php?menu=LoanRequest'</script>";
					exit;
				  
			  }
			  
			  
		  }
		  
		  if($loantype_code == "12"){ // �Թ������ѭ���
			  
			 if($month >= 6){ // �����اҹ 6 ��͹����
				  
				  if($member_type == 1){ // �礻�������Ҫԡ���ѭ
					  
					  
					  
				  }else{ // �ó���������ѭ����ͧ �������ش��÷ӧҹ
					  
				   $delete_mdbreqoffset ="delete from mdbreqoffset where loanrequest_no='".$_REQUEST["loanreq_docno"]."' ";
			       mysql_query($delete_mdbreqoffset) ;
				   
				   $delete_mdbreqpaymentetc ="delete from mdbreqpaymentetc where loanrequest_no='".$_REQUEST["loanreq_docno"]."' ";
			       mysql_query($delete_mdbreqpaymentetc) ;
					  
					echo '<script type="text/javascript"> window.alert("�������ö���Թ����� �Թ������ѭ��� �ӡ�â͡����੾����Ҫԡ���ѭ��ҹ��") </script> ';
					echo "<script>window.location = 'info.php?menu=LoanRequest'</script>";
					exit;
					  
				  }
				  
				  
			  }else{ //�óշ�����اҹ����Թ 6 ��͹ �˿�ͧ�������ش��÷ӧҹ
				  
				   $delete_mdbreqoffset ="delete from mdbreqoffset where loanrequest_no='".$_REQUEST["loanreq_docno"]."' ";
			       mysql_query($delete_mdbreqoffset) ;
				   
				   $delete_mdbreqpaymentetc ="delete from mdbreqpaymentetc where loanrequest_no='".$_REQUEST["loanreq_docno"]."' ";
			       mysql_query($delete_mdbreqpaymentetc) ;
				  
				    echo '<script type="text/javascript"> window.alert("�������ö���Թ����� ��ҹ�ѧ��������Ҫԡ���֧ 6 ��͹") </script> ';
					echo "<script>window.location = 'info.php?menu=LoanRequest'</script>";
					exit;
				  
			  } 
			  
		  }
		  
		  if($loantype_code == "17"){ // �Թ������ѭ���(����)
			  
			 if($month >= 6){ // �����اҹ 6 ��͹����
				  
				  if($member_type == 2){ // �礻�������Ҫԡ����
					  
					  
					  
				  }else{ // �ó��������������ͧ �������ش��÷ӧҹ

				   $delete_mdbreqoffset ="delete from mdbreqoffset where loanrequest_no='".$_REQUEST["loanreq_docno"]."' ";
			       mysql_query($delete_mdbreqoffset) ;
				   
				   $delete_mdbreqpaymentetc ="delete from mdbreqpaymentetc where loanrequest_no='".$_REQUEST["loanreq_docno"]."' ";
			       mysql_query($delete_mdbreqpaymentetc) ;
					  
					echo '<script type="text/javascript"> window.alert("�������ö���Թ����� �Թ������ѭ���(����) �ӡ�â͡����੾����Ҫԡ������ҹ��") </script> ';
					echo "<script>window.location = 'info.php?menu=LoanRequest'</script>";
					exit;
					    
				  }
				  
				  
			  }else{ //�óշ�����اҹ����Թ 6 ��͹ �˿�ͧ�������ش��÷ӧҹ
				  
				   $delete_mdbreqoffset ="delete from mdbreqoffset where loanrequest_no='".$_REQUEST["loanreq_docno"]."' ";
			       mysql_query($delete_mdbreqoffset) ;
				   
				   $delete_mdbreqpaymentetc ="delete from mdbreqpaymentetc where loanrequest_no='".$_REQUEST["loanreq_docno"]."' ";
			       mysql_query($delete_mdbreqpaymentetc) ;
				  
				    echo '<script type="text/javascript"> window.alert("�������ö���Թ����� ��ҹ�ѧ��������Ҫԡ���֧ 6 ��͹") </script> ';
					echo "<script>window.location = 'info.php?menu=LoanRequest'</script>";
					exit;
				  
			  } 
			  
		  }
		  
		  if($loantype_code == "19"){ // �Թ���һ��Ԩ
			  
			 if($month >= 1){ // �����اҹ 1 ��͹����
				  
				  if($member_type == 1){ // �礻�������Ҫԡ���ѭ
					  
					  
					  
				  }else{ // �ó���������ѭ����ͧ �������ش��÷ӧҹ
					 
                   $delete_mdbreqoffset ="delete from mdbreqoffset where loanrequest_no='".$_REQUEST["loanreq_docno"]."' ";
			       mysql_query($delete_mdbreqoffset) ;
				   
				   $delete_mdbreqpaymentetc ="delete from mdbreqpaymentetc where loanrequest_no='".$_REQUEST["loanreq_docno"]."' ";
			       mysql_query($delete_mdbreqpaymentetc) ;
					 
					echo '<script type="text/javascript"> window.alert("�������ö���Թ����� �Թ������ͨ����Թʧ��������ǧ˹����»� �ӡ�â͡����੾����Ҫԡ���ѭ��ҹ��") </script> ';
					echo "<script>window.location = 'info.php?menu=LoanRequest'</script>";
					exit; 
					  
				  }
				  
				  
			  }else{ //�óշ�����اҹ����Թ 1 ��͹ �˿�ͧ�������ش��÷ӧҹ
				  
				   $delete_mdbreqoffset ="delete from mdbreqoffset where loanrequest_no='".$_REQUEST["loanreq_docno"]."' ";
			       mysql_query($delete_mdbreqoffset) ;
				   
				   $delete_mdbreqpaymentetc ="delete from mdbreqpaymentetc where loanrequest_no='".$_REQUEST["loanreq_docno"]."' ";
			       mysql_query($delete_mdbreqpaymentetc) ;
				  
				    echo '<script type="text/javascript"> window.alert("�������ö���Թ����� ��ҹ�ѧ��������Ҫԡ���֧ 1 ��͹") </script> ';
					echo "<script>window.location = 'info.php?menu=LoanRequest'</script>";
					exit;
				  
			  } 
			  
		  }
		  
		  if($loantype_code == "21"){ // �Թ���ء�Թ
			  
			 if($month >= 6){ // �����اҹ 6 ��͹����
				  
				  if($member_type == 1){ // �礻�������Ҫԡ���ѭ
					  
					  
					  
				  }else{ // �ó���������ѭ����ͧ �������ش��÷ӧҹ
					  
				   $delete_mdbreqoffset ="delete from mdbreqoffset where loanrequest_no='".$_REQUEST["loanreq_docno"]."' ";
			       mysql_query($delete_mdbreqoffset) ;
				   
				   $delete_mdbreqpaymentetc ="delete from mdbreqpaymentetc where loanrequest_no='".$_REQUEST["loanreq_docno"]."' ";
			       mysql_query($delete_mdbreqpaymentetc) ;
					  
					echo '<script type="text/javascript"> window.alert("�������ö���Թ����� �Թ���ء�Թ �ӡ�â͡����੾����Ҫԡ���ѭ��ҹ��") </script> ';
					echo "<script>window.location = 'info.php?menu=LoanRequest'</script>";
					exit; 
					  
				  }
				  
				  
			  }else{ //�óշ�����اҹ����Թ 6 ��͹ �˿�ͧ�������ش��÷ӧҹ
				  
				   $delete_mdbreqoffset ="delete from mdbreqoffset where loanrequest_no='".$_REQUEST["loanreq_docno"]."' ";
			       mysql_query($delete_mdbreqoffset) ;
				   
				   $delete_mdbreqpaymentetc ="delete from mdbreqpaymentetc where loanrequest_no='".$_REQUEST["loanreq_docno"]."' ";
			       mysql_query($delete_mdbreqpaymentetc) ;
				  
				    echo '<script type="text/javascript"> window.alert("�������ö���Թ����� ��ҹ�ѧ��������Ҫԡ���֧ 6 ��͹") </script> ';
					echo "<script>window.location = 'info.php?menu=LoanRequest'</script>";
					exit;
				  
			  } 
			  
		  }
		  
		   if($loantype_code == "22"){ // �Թ���ء�Թ(����)
			  
			 if($month >= 1){ // �����اҹ 1 ��͹����
				  
				  if($member_type == 2){ // �礻�������Ҫԡ����
					  
					  
					  
				  }else{ // �ó��������������ͧ �������ش��÷ӧҹ
					  
				   $delete_mdbreqoffset ="delete from mdbreqoffset where loanrequest_no='".$_REQUEST["loanreq_docno"]."' ";
			       mysql_query($delete_mdbreqoffset) ;
				   
				   $delete_mdbreqpaymentetc ="delete from mdbreqpaymentetc where loanrequest_no='".$_REQUEST["loanreq_docno"]."' ";
			       mysql_query($delete_mdbreqpaymentetc) ;
					  
					echo '<script type="text/javascript"> window.alert("�������ö���Թ����� �Թ���ء�Թ(����) �ӡ�â͡����੾����Ҫԡ������ҹ��") </script> ';
					echo "<script>window.location = 'info.php?menu=LoanRequest'</script>";
					exit;
					  
				  }
				  
				  
			  }else{ //�óշ�����اҹ����Թ 1 ��͹ �˿�ͧ�������ش��÷ӧҹ
				  
				   $delete_mdbreqoffset ="delete from mdbreqoffset where loanrequest_no='".$_REQUEST["loanreq_docno"]."' ";
			       mysql_query($delete_mdbreqoffset) ;
				   
				   $delete_mdbreqpaymentetc ="delete from mdbreqpaymentetc where loanrequest_no='".$_REQUEST["loanreq_docno"]."' ";
			       mysql_query($delete_mdbreqpaymentetc) ;
				  
				    echo '<script type="text/javascript"> window.alert("�������ö���Թ����� ��ҹ�ѧ��������Ҫԡ���֧ 1 ��͹") </script> ';
					echo "<script>window.location = 'info.php?menu=LoanRequest'</script>";
					exit;
				  
			  } 
			  
		  }
		  
		  if($loantype_code == "73"){ // �Թ������͡���֡��
			  
			 if($month >= 6){ // �����اҹ 6 ��͹����
				  
				  if($member_type == 1){ // �礻�������Ҫԡ���ѭ
					  
					  
					  
				  }else{ // �ó���������ѭ����ͧ �������ش��÷ӧҹ
					
				   $delete_mdbreqoffset ="delete from mdbreqoffset where loanrequest_no='".$_REQUEST["loanreq_docno"]."' ";
			       mysql_query($delete_mdbreqoffset) ;
				   
				   $delete_mdbreqpaymentetc ="delete from mdbreqpaymentetc where loanrequest_no='".$_REQUEST["loanreq_docno"]."' ";
			       mysql_query($delete_mdbreqpaymentetc) ;
					
					echo '<script type="text/javascript"> window.alert("�������ö���Թ����� �Թ������͡���֡�� �ӡ�â͡����੾����Ҫԡ���ѭ��ҹ��") </script> ';
					echo "<script>window.location = 'info.php?menu=LoanRequest'</script>";
					exit; 
					  
				  }
				  
				  
			  }else{ //�óշ�����اҹ����Թ 6 ��͹ �˿�ͧ�������ش��÷ӧҹ
				  
				   $delete_mdbreqoffset ="delete from mdbreqoffset where loanrequest_no='".$_REQUEST["loanreq_docno"]."' ";
			       mysql_query($delete_mdbreqoffset) ;
				   
				   $delete_mdbreqpaymentetc ="delete from mdbreqpaymentetc where loanrequest_no='".$_REQUEST["loanreq_docno"]."' ";
			       mysql_query($delete_mdbreqpaymentetc) ;
				  
				    echo '<script type="text/javascript"> window.alert("�������ö���Թ����� ��ҹ�ѧ��������Ҫԡ���֧ 6 ��͹") </script> ';
					echo "<script>window.location = 'info.php?menu=LoanRequest'</script>";
					exit;
				  
			  } 
			  
		  }
		  
		  //
		  
		  $startpay_date_=explode("/",$_REQUEST["startpay_date"]);
		  settype($startpay_date_[2],"integer");
		  //print_r($startpay_date_);
		  $startpay_date=($startpay_date_[2]-543)."-".$startpay_date_[1]."-".$startpay_date_[0];

                  if($_REQUEST["period_payment"] == ""){
                      
                 
                      
                      $_REQUEST["period_payment"] = $_REQUEST["p"];
 
                  }
                  
                   $_REQUEST["salary_amt"] = str_replace(",","",$_REQUEST["salary_amt"]); 
                   $_REQUEST["loanrequest_amt"] = str_replace(",","",$_REQUEST["loanrequest_amt"]);
                  
                  //period_payment2
                  
		  $strSQL="insert into `mdbreqloan` (
						  loanreq_docno,
						  loantype_code,
						  member_no,
						  member_age,
						  phone_no,
						  phonework_no,
						  email,
						  entry_date ,
						  update_date,
						  position_desc ,
						  membgroup_desc ,
						  workplace ,
						  amphur_desc,
						  province_desc,
						  salary_amt ,
						  loan_rate ,
						  objective_desc ,
						  loanreqmax_amt ,
						  loanrequest_amt,
						  loanpayment_type ,
						  period_max ,
						  period,
						  period_payment ,
						  startpay_date ,
						  loanrequest_status,
						  remark ,
						 expense_bank,
						 expense_bankbranch,
						 expense_banktype,
						 expense_accid ,
						 salary_id,at_write
						)values(
						  '".$_REQUEST["loanreq_docno"]."',
						  '".$_REQUEST["loantype_code"]."',
						  '".$_REQUEST["member_no"]."',
						  '".$_REQUEST["member_age"]."',
						  '".$_REQUEST["phone_no"]."',
						  '".$_REQUEST["phonework_no"]."',
						  '".$_REQUEST["email"]."',
						  '".$_REQUEST["entry_date"]."' ,
						  '".$_REQUEST["update_date"]."',
						  '".$_REQUEST["position_desc"]."' ,
						  '".$_REQUEST["membgroup_desc"]."' ,
						  '".$_REQUEST["workplace"]."' ,
						  '".$_REQUEST["amphur_desc"]."',
						  '".$_REQUEST["province_desc"]."',
						  '".$_REQUEST["salary_amt"]."' ,
						  '".$_REQUEST["loan_rate"]."' ,
						  '".$_REQUEST["objective_desc"]."' ,
						  '".$_REQUEST["loanreqmax_amt"]."' ,
						  '".$_REQUEST["loanrequest_amt"]."',
						  '".$_REQUEST["loanpayment_type"]."' ,
						  '".$_REQUEST["period_max"]."' ,
						  '".$_REQUEST["period"]."',
						  '".$_REQUEST["period_payment"]."' ,
						  '".$startpay_date."' ,
						  '".$_REQUEST["loanrequest_status"]."',
						  '".$_REQUEST["remark"]."' ,
						  '".$_REQUEST["expense_bank"]."', 
						  '".$_REQUEST["expense_bankbranch"]."' ,
						  '".$_REQUEST["expense_banktype"]."' ,
						  '".$_REQUEST["expense_accid"]."',
						  '".$_REQUEST["salary_id"]."',
                                                  '".$_REQUEST["at_write"]."'
						)";
		  $result = mysql_query($strSQL);
		 // echo $strSQL;
		  if($result==1){
			echo "<script>alert('�ѹ�֡�����');</script>";
			$_REQUEST["save_mode"]="update";
		  }else{ 	
			echo "<script>alert('�ѹ�֡��������');</script>";
		  }
		 //echo $_REQUEST["save_mode"].":".$strSQL;
	  }else if($_REQUEST["save_mode"]=="update"){
		    
		  $startpay_date_=explode("/",$_REQUEST["startpay_date"]);
		  //print_r($startpay_date_);
		  settype($startpay_date_[2],"integer");
		  $startpay_date=($startpay_date_[2]-543)."-".$startpay_date_[1]."-".$startpay_date_[0];
		  		  
                   if($_REQUEST["period_payment"] == ""){
                      
                      $_REQUEST["period_payment"] = $_REQUEST["p"];
                      
                  }
                  
                  $_REQUEST["salary_amt"] = str_replace(",","",$_REQUEST["salary_amt"]);
                  $_REQUEST["loanrequest_amt"] = str_replace(",","",$_REQUEST["loanrequest_amt"]);
                  
		  $strSQL="update mdbreqloan set 
						  loantype_code='".$_REQUEST["loantype_code"]."',
						  member_no= '".$_REQUEST["member_no"]."',
						  member_age= '".$_REQUEST["member_age"]."',
						  phone_no= '".$_REQUEST["phone_no"]."',
						  phonework_no= '".$_REQUEST["phonework_no"]."',
						  email= '".$_REQUEST["email"]."',
						  entry_date='".$_REQUEST["entry_date"]."' ,
						  update_date=now(),
						  position_desc='".$_REQUEST["position_desc"]."' ,
						  membgroup_desc='".$_REQUEST["membgroup_desc"]."' ,
						  workplace='".$_REQUEST["workplace"]."' ,
						  amphur_desc='".$_REQUEST["amphur_desc"]."',
						  province_desc='".$_REQUEST["province_desc"]."',
						  salary_amt='".$_REQUEST["salary_amt"]."' ,
						  loan_rate='".$_REQUEST["loan_rate"]."' ,
						  objective_desc='".$_REQUEST["objective_desc"]."' ,
						  loanreqmax_amt='".$_REQUEST["loanreqmax_amt"]."' ,
						  loanrequest_amt='".$_REQUEST["loanrequest_amt"]."',
						  loanpayment_type='".$_REQUEST["loanpayment_type"]."' ,
						  period_max='".$_REQUEST["period_max"]."' ,
						  period='".$_REQUEST["period"]."',
						  period_payment='".$_REQUEST["period_payment"]."' ,
						  startpay_date='".$startpay_date."' ,
						  loanrequest_status='".$_REQUEST["loanrequest_status"]."',
						  remark='".$_REQUEST["remark"]."' ,
						 expense_bank='".$_REQUEST["expense_bank"]."', 
						 expense_bankbranch='".$_REQUEST["expense_bankbranch"]."' ,
						 expense_banktype='".$_REQUEST["expense_banktype"]."' ,
						 expense_accid='".$_REQUEST["expense_accid"]."' ,
						 salary_id='".$_REQUEST["salary_id"]."',
                                                     at_write = '".$_REQUEST["at_write"]."'
						where 
						  loanreq_docno='".$_REQUEST["loanreq_docno"]."'";
		 
		  $result = mysql_query($strSQL);
		  if($result==1){
			echo "<script>alert('�ѹ�֡�����');</script>";
		  }else{ 	
			echo "<script>alert('�ѹ�֡��������');</script>";
		  }
		  //echo $_REQUEST["save_mode"].":".$strSQL;
	  }
	  
	}	
				
     if($_REQUEST["action"]=="delete"){
		 if(file_exists($target_dir )==false)
					mkdir($target_dir );
					
						$sql="delete from mdbreqloanfiles 
						         where filename = '".$_REQUEST["filename"]."' 
						         and loanreq_docno='".$_REQUEST["loanreq_docno"]."'  
								 and loantype_code='".$_REQUEST["loantype_code"]."' 
								 and member_no='".$member_no."' ";
						mysql_query($sql) ;
						
					unlink($_REQUEST["filename"]);
					echo "<script>alert('ź����� File ".$_REQUEST["filename"]." ���º����');</script>";
	 }	
	
	  
	 $strSQL_="select * from  mdbucfreqfiles u
								where u.loantype_code='".$_REQUEST["loantype_code"]."' 
								order by u.reqfiletype_code asc "; 
    //echo 	$strSQL_;				
	$objQuery_ = mysql_query($strSQL_) ;
	$numrows_=mysql_num_rows($objQuery_);
	while($q = mysql_fetch_array($objQuery_)){		
	
	   $file_param_nm="file".$_REQUEST["loanreq_docno"].$q["reqfiletype_code"];
			  
			if(isset($_FILES[$file_param_nm])&&$_FILES[$file_param_nm]["size"]>0){
				
                           
				
			$target_dir = "uploads/";
			if(!file_exists($target_dir) && !is_dir($target_dir))
			mkdir($target_dir);
			$target_dir = $target_dir.$member_no."/";
			if(!file_exists($target_dir) && !is_dir($target_dir))
			mkdir($target_dir);
			$target_dir = $target_dir.$_REQUEST["loanreq_docno"]."/";
			if(!file_exists($target_dir) && !is_dir($target_dir))
			mkdir($target_dir);
			
			$imageFileType = strtolower(pathinfo($_FILES[$file_param_nm]["name"],PATHINFO_EXTENSION)); 
			$target_dir = $target_dir.$q["reqfiletype_code"].".".$imageFileType;
			
			$target_file = $target_dir;
			$uploadOk = 1;
			
				if ($_FILES[$file_param_nm]["size"] > 500000) {
                                    
                                   
                                    
					echo "<script>alert('Upload ".$q["reqfiletype_desc"]." �������� File ".$_FILES[$file_param_nm]["tmp_name"]." �բ�ҹ�˭��Թ 500k');</script>";
					$uploadOk = 0;
				}
				// Allow certain file formats
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif" 
				&& $imageFileType != "doc" && $imageFileType != "docx" && $imageFileType != "pdf"&& $imageFileType != "xls"&& $imageFileType != "xlsx" && $imageFileType != "zip") {
                                    
                                   
                                    
					echo "<script>alert('Upload ".$q["reqfiletype_desc"]." �������� File type ���١��ͧ ".$imageFileType."');</script>";
					$uploadOk = 0;
				}
				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
					//echo "Sorry, your file was not uploaded.";
				// if everything is ok, try to upload file
				} else {
                                    
                                    
					if (move_uploaded_file($_FILES[$file_param_nm]["tmp_name"], $target_file)) {
						
                                            
                                            
						$sql="insert into mdbreqloanfiles ( loanreq_docno,loantype_code,member_no,seq_no,reqfiletype_code,filename)
						         values('".$_REQUEST["loanreq_docno"]."','".$_REQUEST["loantype_code"]."','".$member_no."','".$q["reqfiletype_code"]."','".$q["reqfiletype_code"]."','".$target_file."')";
						mysql_query($sql) ;
						
						$sql="update mdbreqloanfiles 
						         set filename = '".$target_file."' 
						         where  loanreq_docno='".$_REQUEST["loanreq_docno"]."'  
								 and loantype_code='".$_REQUEST["loantype_code"]."' 
								 and member_no='".$member_no."'  
								 and seq_no='".$q["reqfiletype_code"]."' 
								 and reqfiletype_code='".$q["reqfiletype_code"]."' ";
						mysql_query($sql) ;
						
						echo "<script>alert('�к����Ѻ��úѹ�֡ ".$q["reqfiletype_desc"]." ���º���� ". basename( $_FILES[$file_param_nm]["name"]). "');</script>";
					}  else { 
						echo "<script>alert('�к����Ѻ��úѹ�֡ ".$q["reqfiletype_desc"]." �������� ". basename( $_FILES[$file_param_nm]["name"]). "');</script>";
					}
				}
			}
	}
?>	
<?php 
  $strSQL="select concat(concat(concat(concat(substr(date_format(update_date,'%d/%m/%Y'),1,2),'/'),substr(date_format(update_date,'%d/%m/%Y'),4,2)),'/'),substr(date_format(update_date,'%d/%m/%Y'),7,4) +543) as update_date,loantype_code,loanreq_docno,noticedoc_no,loanrequest_amt,period,period_payment,loanpayment_type,loanrequest_status,remark from mdbreqloan where member_no='$member_no' order by update_date , loantype_code";
  $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
  $numrows=mysql_num_rows($objQuery);
  $i=0;
  if($numrows>0){
?>

<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="30%" align="left"><strong><font size="4" face="Tahoma">��¡��㺤Ӣ͡��</font></strong><br />
    <font color="#FF6600" size="2" face="Tahoma">Loan Request</font></td>
    <td width="70%" align="right" valign="top">
    </td>
  </tr>
  <tr>
    <td colspan="2" align="left"><hr color="#999999" size="1"/></td>
  </tr>
</table>
<br />

<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#CCCCCC"><table width="100%" border="0" cellspacing="1" cellpadding="3">
      <tr>
        <td align="center" bgcolor="#6699FF"><strong><font color="#FFFFFF">�ѹ���ѹ�֡ </font></strong></td>
        <td align="center" bgcolor="#6699FF"><strong><font color="#FFFFFF">�Ţ���</font></strong></td>
        <td align="center" bgcolor="#6699FF"><strong><font color="#FFFFFF">������</font></strong></td>
        <td align="center" bgcolor="#6699FF"><strong><font color="#FFFFFF">ǧ�Թ</font></strong></td>
        <td align="center" bgcolor="#6699FF"><strong><font color="#FFFFFF">�Ǵ</font></strong></td>
        <td align="center" bgcolor="#6699FF"><strong><font color="#FFFFFF">���е�ͧǴ</font></strong></td>
        <!--<td align="center" bgcolor="#6699FF"><strong><font color="#FFFFFF">����������</font></strong></td>-->
        <td align="center" bgcolor="#6699FF"><strong><font color="#FFFFFF">ʶҹ�</font></strong></td>
        <td align="center" bgcolor="#6699FF"><strong><font color="#FFFFFF">�Ţ�Ѻ</font></strong></td>
        <td align="center" bgcolor="#6699FF"><strong><font color="#FFFFFF">�����˵�</font></strong></td>
        <td height="25" align="center" bgcolor="#6699FF"><strong><font color="#FFFFFF">-</font></strong></td>
      </tr>
      <tr>
	 <?php 
		while($q = mysql_fetch_array($objQuery)){			
			$update_date			=		$q['update_date'];
			$loantype_code			=		$q['loantype_code'];
			$loanreq_docno			=		$q['loanreq_docno'];
			$noticedoc_no			=		$q['noticedoc_no'];
			$loanrequest_amt		=		$q['loanrequest_amt'];
			$period						=		$q['period'];
			$period_payment		=		$q['period_payment'];
			$loanpayment_type		=		$q['loanpayment_type'];
			$loanrequest_status	=		$q['loanrequest_status'];
			$remark						=		$q['remark'];
			if($loanrequest_status==0){
				$loanrequest_status="��ŧ�Ѻ";
			}else if($loanrequest_status==8){
				$loanrequest_status="ŧ�Ѻ";
			}else if($loanrequest_status==1){
				$loanrequest_status="͹��ѵ�";
			}else {
				$loanrequest_status="¡��ԡ";
			}
		?>
      <tr>
        <td align="center" bgcolor="#FFFFFF"><?=$update_date?></td>
        <td align="center" bgcolor="#FFFFFF"><strong><?=$loanreq_docno?></strong></td>
		
		<?php if($loantype_code == "11"){

		$loantype_desc = "���ѭ�����";
		
            }else if ($loantype_code == "12"){
			
			$loantype_desc = "���ѭ��鹤��";
			
			}else if ($loantype_code == "19"){
			
			$loantype_desc = "�Թʧ��������ǧ˹����»�";
			
			}else if ($loantype_code == "21"){
			
			$loantype_desc = "�ء�Թ";
			
			}else if ($loantype_code == "73"){
			
			$loantype_desc = "���͡���֡��";
			
			}else if ($loantype_code == "22"){
			
			$loantype_desc = "�Թ���ء�Թ (��Ҫԡ����)";
			
			}else if ($loantype_code == "17"){
			
			$loantype_desc = "�Թ������ѭ����鹤�ӻ�Сѹ (��Ҫԡ����)";
			
			}
		?>
		
        <td align="center" bgcolor="#FFFFFF"><strong><?=$loantype_desc?></strong></td>
        <td align="right" bgcolor="#FFFFFF"><?=number_format($loanrequest_amt, 2)?></td>
        <td align="center" bgcolor="#FFFFFF"><?=$period?></td>
        <td align="right" bgcolor="#FFFFFF"><?=number_format($period_payment,2)?></td>
       <!-- <td align="center" bgcolor="#FFFFFF"><?//=($loanpayment_type==1?"����":"���ʹ")?></td>-->
        <td align="center" bgcolor="#FFFFFF"><?=$loanrequest_status?></td>
        <td align="center" bgcolor="#FFFFFF"><?=$noticedoc_no?></td>
        <td align="center" bgcolor="#FFFFFF"><?=$remark?></td>
        <td align="center" bgcolor="#FFFFFF" height="25" >
		<a href="?menu=LoanRequest&action=edit&loanreq_docno=<?=$loanreq_docno?>" onclick="return confirm('�׹�ѹ��÷���¡��')" >
		<strong>��/���</strong></a>
		</td>
      </tr>
		<?php } ?>
    </table></td>
  </tr>
</table>
<br>
<?php 
  }
  
  if($_REQUEST["action"]=="edit"){
  
  $strSQL="select * from mdbreqloan where loanreq_docno='".$_REQUEST["loanreq_docno"]."' order by update_date desc";
  $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
  $numrows=mysql_num_rows($objQuery);
  $i=0;
  if($numrows>0){
	  if($q = mysql_fetch_array($objQuery)){		
	  
	  
		 $startpay_date_=explode("-",$q["startpay_date"]);
		  //print_r($startpay_date_);
		  settype($startpay_date_[0],"integer");
		  $startpay_date=explode(" ",$startpay_date_[2])[0]."/".$startpay_date_[1]."/".($startpay_date_[0]+543);
		  
		 $update_date_=explode("-",$q["update_date"]);
		  //print_r($startpay_date_);
		  settype($update_date_[0],"integer");
		  $update_date=explode(" ",$update_date_[2])[0]."/".$update_date_[1]."/".($update_date_[0]);
                  
                  $_REQUEST["salary_amt"] = str_replace(",","",$_REQUEST["salary_amt"]);
                  $_REQUEST["loanrequest_amt"] = str_replace(",","",$_REQUEST["loanrequest_amt"]);
						 
						 $_REQUEST["noticedoc_no"]=$q["noticedoc_no"];
						 $_REQUEST["loanreq_docno"]=$q["loanreq_docno"];
						 $_REQUEST["loantype_code"]=$q["loantype_code"];
						 $_REQUEST["member_no"]=$q["member_no"];
						 $_REQUEST["phone_no"]=$q["phone_no"];
						 $_REQUEST["member_age"]=$q["member_age"];
						 $_REQUEST["phonework_no"]=$q["phonework_no"];
						 $_REQUEST["email"]=$q["email"];
						 $_REQUEST["entry_date"]=$q["entry_date"];
						 $_REQUEST["update_date"]=$q["update_date"];
						 $_REQUEST["update_date_"]=$update_date;
						 $_REQUEST["position_desc"]=$q["position_desc"];
						 $_REQUEST["membgroup_desc"]=$q["membgroup_desc"];
						 $_REQUEST["workplace"]=$q["workplace"];
						 $_REQUEST["amphur_desc"]=$q["amphur_desc"];
						 $_REQUEST["province_desc"]=$q["province_desc"];
						 $_REQUEST["salary_amt"]=$q["salary_amt"];
						 $_REQUEST["loan_rate"]=$q["loan_rate"];
						 $_REQUEST["objective_desc"]=$q["objective_desc"];
						 $_REQUEST["loanreqmax_amt"]=$q["loanreqmax_amt"];
						 $_REQUEST["loanrequest_amt"]=$q["loanrequest_amt"];
						 $_REQUEST["loanpayment_type"]=$q["loanpayment_type"];
						 $_REQUEST["period_max"]=$q["period_max"];
						 $_REQUEST["period"]=$q["period"];
						 $_REQUEST["period_payment"]=$q["period_payment"];
						 $_REQUEST["startpay_date"]=$startpay_date;
						 $_REQUEST["loanrequest_status"]=$q["loanrequest_status"];
						 $_REQUEST["remark"]=$q["remark"];
						 $_REQUEST["expense_bank"]=$q["expense_bank"];
						 $_REQUEST["expense_bankbranch"]=$q["expense_bankbranch"];
						 $_REQUEST["expense_banktype"]=$q["expense_banktype"];
						 $_REQUEST["expense_accid"]=$q["expense_accid"];
						 $_REQUEST["salary_id"]=$q["salary_id"];
                                                 $_REQUEST["at_write"]=$q["at_write"];
						 $_REQUEST["save_mode"]="update";
						 
		
			  $strSQL="select * from mdbreqloancoll where loanreq_docno='".$_REQUEST["loanreq_docno"]."' order by seq_no asc";
			  $objQuery__ = mysql_query($strSQL) ;
			  
			  $i=1;
			  while($q = mysql_fetch_array($objQuery__)){		
 			  
				$_REQUEST["coll".$i."mem_no"]=$q['collmemb_no']; 
				$_REQUEST["coll".$i."mem_nm"]=$q['collmemb_name']; 
                                $_REQUEST["coll".$i."workplace"]=$q['collworkplace'];
                                $_REQUEST["coll".$i."position"]=$q['collposition_desc'];
                                $_REQUEST["coll".$i."havemoreflag"]=$q['collhavemore_flag']; 
				$_REQUEST["coll".$i."refmembname"]=$q['collrefmembname'];
                                 $_REQUEST["coll".$i."refmembno"]=$q['collrefmembno'];
				
				$_REQUEST["Coll".$i."name"]= $_REQUEST["coll".$i."mem_nm"]; 
				$_REQUEST["Mem".$i."no"]= $_REQUEST["coll".$i."mem_no"]; 
				$_REQUEST["Work".$i."place"]= $_REQUEST["coll".$i."workplace"];
				$_REQUEST["Position".$i."desc"]= $_REQUEST["coll".$i."position"];
				$_REQUEST["Havemore".$i."coll"] = $_REQUEST["coll".$i."havemoreflag"]; 
				$_REQUEST["Coll".$i."refmembname"] = $_REQUEST["coll".$i."refmembname"];
				$_REQUEST["Coll".$i."refmembno"] = $_REQUEST["coll".$i."refmembno"];
				
				$i++;
			  }
		  	
	  }
  }
  
  }
?>
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="30%" align="left"><strong><font size="4" face="Tahoma">�ѹ�֡㺤Ӣ͡��</font></strong><br />
    <font color="#FF6600" size="2" face="Tahoma">Loan Request</font></td>
    <td width="70%" align="right" valign="top"><input type="button" name="newBtn" id="newBtn" value="���ҧ㺤Ӣ�����" onclick="window.location='info.php?menu=LoanRequest';" /></td>
  </tr>
  <tr>
    <td colspan="2" align="left"><hr color="#999999" size="1"/></td>
  </tr>
</table>
<br />

<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#CCCCCC">
	<?php
       
	?>
    <form id="formID1" name="formID1" method="post" action="" enctype="multipart/form-data"
	    onsubmit="return formValidation()&&confirm('��س��׹�ѹ��÷���¡��')&&insertoffset()&&insertEtc()" onkeydown="return event.key != 'Enter';" >
<?php


	 
  $strSQL="select * from lnloantype where loantype_code in (".implode(",",$LOANTYPE_CODE).")"; 
	//echo $strSQL;
	$value = array('LOANTYPE_CODE','LOANTYPE_DESC');
	 list($Num_Rows_,$list_info_) = get_value_many_oci($strSQL,$value); 
			
	  if(isset($_REQUEST["loantype_code"])==false){
		  $_REQUEST["loantype_code"]=$list_info_[0][0];
	  }
	  
	  if(isset($_REQUEST["save_mode"])==false){
		  $_REQUEST["save_mode"]="insert";
	  }
          
          
          
	  
	  
	  if($_REQUEST["save_mode"]=="insert"){
		  //��Ǩ�ͺ��������ҧ�ѹ�֡�դ��ѹ�֡��������������
		 $strSQL="select * from mdbreqloan where loanreq_docno='".$_REQUEST["loantype_code"].$_REQUEST["loanreq_docno"]."' ";
		 $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
		 $q = mysql_fetch_array($objQuery);
		  if(mysql_num_rows($objQuery)>0&&$q["member_no"]!=$member_no){
			  unset($_REQUEST["loanreq_docno"]);
		  }
	  }
	  //echo ($_REQUEST["loantype_code"].date("Y")+543)."|".$_REQUEST["loanreq_docno"]."|".(strpos($_REQUEST["loanreq_docno"],($_REQUEST["loantype_code"].date("Y")+543))!==false)."|";
	  if(isset($_REQUEST["loanreq_docno"])==false||$_REQUEST["save_mode"]=="insert"){
		    $strSQL="select CAST(ifnull(max(loanreq_docno)+1,concat('".$_REQUEST["loantype_code"]."',(concat(DATE_FORMAT(now(), '%Y')+543,'0001'))))  as  DECIMAL(10,0) )  as maxloanreq_docno from mdbreqloan where loanreq_docno like '".$_REQUEST["loantype_code"]."%' and DATE_FORMAT(entry_date, '%Y%')=DATE_FORMAT(now(), '%Y%')";
			//echo $_REQUEST["loanreq_docno"]."|".($_REQUEST["loantype_code"].(date("Y")+543))."|".strpos($_REQUEST["loanreq_docno"],($_REQUEST["loantype_code"].(date("Y")+543)));
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$q = mysql_fetch_array($objQuery);
			$_REQUEST["loanreq_docno"]=$q["maxloanreq_docno"];
	  }
	  	
	  if(isset($_REQUEST["entry_date"])==false){
		  $_REQUEST["entry_date"]=date("Y-m-d h:i:s");
	  }
	
	  if(isset($_REQUEST["noticedoc_no"])==false){
		  $_REQUEST["noticedoc_no"]="";
	  }
	  
	 $_REQUEST["update_date"]=date("Y-m-d h:i:s");
	  
	  if(isset($_REQUEST["phone_no"])==false){
		  $_REQUEST["phone_no"]=$mobile;
	  }
	  
	  if(isset($_REQUEST["phonework_no"])==false){
		  $_REQUEST["phonework_no"]= "";
	  }
	  
	  if(isset($_REQUEST["email"])==false){
		  $_REQUEST["email"]=$email;
	  }
	  
	  if(isset($_REQUEST["position_desc"])==false){
		  $_REQUEST["position_desc"]=$position;
	  }
	
	  if(isset($_REQUEST["member_age"])==false){
		  $_REQUEST["member_age"]=0;
	  }
	
	  if(isset($_REQUEST["membgroup_desc"])==false){
		  $_REQUEST["membgroup_desc"]=$membgroup;
	  }
	  
	  if(isset($_REQUEST["salary_amt"])==false){
		  $_REQUEST["salary_amt"]=0;//$salary;
	  }
	  
	  if(isset($_REQUEST["workplace"])==false){
		  $_REQUEST["workplace"]=$membgroup;
	  }
	  
	  if(isset($_REQUEST["salary_id"])==false){
		  $_REQUEST["salary_id"]=$salary_id;
	  }
	  
	  if(isset($_REQUEST["loanrequest_status"])==false){
		  $_REQUEST["loanrequest_status"]=0;
	  }
	  
	  //if(isset($_REQUEST["loanpayment_type"])==false){
		  $_REQUEST["loanpayment_type"]=1;
		  if($_REQUEST["loantype_code"]!="10")
		  $_REQUEST["loanpayment_type"]=2;  
	  //}
	  
                  
                  
                  
	  /*
	  
	  �ѹ�֡�͡������� 10 ��ҹ��
	  ====================================================
	  1.ǧ�Թ�٧�ش  3 ��� �ͧ�Թ��͹ ����Թ 100,000 �� 25 �Ǵ
	  2.�óվ� �Թ��� ������ 88 ���  ��� contract_status=1 �� 3 ��Ңͧ�Թ��͹ ����Թ 50,000 �� 12 �Ǵ
	  3.�ѹ�֡���� ���� ������ ���˹�ҷ�� ������ web portal �����Ţŧ�Ѻ ������ �������ҧ����
	  4.�ѧ�Ѻ ��� Upload �͡��� Ṻ 2 ���  1.��Ի�Թ��͹  2.�ѵû�ЪҪ�
	  5.select count(*) as cnt from dpdeptmaster where depttype_code = '88' and deptclose_status = 0 and member_no=''; ��ͧ�պѭ��
	  
	  */
	  
	  //if(isset($_REQUEST["loan_rate"])==false){
	   //$_REQUEST["loan_rate"]=0;		  
		  $strSQL="select * from lncfloanintratedet where loanintrate_code ='". $_REQUEST["loantype_code"]."' and sysdate between effective_date and  expire_date order by effective_date desc";
		//echo $strSQL;
		$value = array('INTEREST_RATE');
		 list($Num_Rows_,$list_info_) = get_value_many_oci($strSQL,$value); 
		 $_REQUEST["loan_rate"]=$list_info_[0][0]/100;  
	  //}

	          $_REQUEST["salary_amt"] = str_replace(",","",$_REQUEST["salary_amt"]);
                  $_REQUEST["loanrequest_amt"] = str_replace(",","",$_REQUEST["loanrequest_amt"]);
	
	   if($_REQUEST["loanrequest_amt"] == 0){
 
               if($_REQUEST["loantype_code"] != "12" || $_REQUEST["loantype_code"] != "17"){
 
                
                   
                  $_REQUEST["loanreqmax_amt"]=$_REQUEST["salary_amt"]*$LOAN_CONDITION_SARARY[$_REQUEST["loantype_code"]];
                  
                  if($_REQUEST["loantype_code"] == "21" || $_REQUEST["loantype_code"] == "22"){ // ǧ�Թ��� �� 21,22 �Ѵ�����ѧ 10 �������ǵ�ͧ����Թ 90% �ͧ��鹵���ͧ

                      $_REQUEST["loanreqmax_amt"] = floor($_REQUEST["loanreqmax_amt"] / 100);
                      $_REQUEST["loanreqmax_amt"] = $_REQUEST["loanreqmax_amt"] * 100;
                      
                      if($_REQUEST["loanrequest_amt_start"] > $sharestk_amt_21){
                          
                         $_REQUEST["loanrequest_amt_start"] = $sharestk_amt_21; 
                          
                      }else{
                          
                          $_REQUEST["loanrequest_amt_start"] = $_REQUEST["loanreqmax_amt"];
                      }

                      
                  }else {
                      
                      $_REQUEST["loanrequest_amt_start"] = $_REQUEST["loanreqmax_amt"];
                      
                  }
               }
               
           }else{

               $_REQUEST["loanreqmax_amt"] = $_REQUEST["loanreqmax_amt"];
               $_REQUEST["loanrequest_amt"] = $_REQUEST["loanrequest_amt"];


               
           }

		  if($_REQUEST["loanreqmax_amt"]>$LOAN_CONDITION_MAX_AMT[$_REQUEST["loantype_code"]])
		  {
			  
		   $_REQUEST["loanreqmax_amt"]=$LOAN_CONDITION_MAX_AMT[$_REQUEST["loantype_code"]]; 
		   
		  }

                  
          $_REQUEST["salary_amt"] = str_replace(",","",$_REQUEST["salary_amt"]);
          $_REQUEST["loanrequest_amt"] = str_replace(",","",$_REQUEST["loanrequest_amt"]);
	  
	  if(isset($_REQUEST["loanrequest_amt"])!= false && $_REQUEST["salary_amt"] != 0 && ($_REQUEST["save_mode"]=="update" || $_REQUEST["save_mode"]=="insert")){ //*-*
		  
		if($_REQUEST["loantype_code"] == "11"){
                    
                   //111//
                    
              //    echo "<script>alert('555+');</script>";

                      
                      // �����鹪��е����͹ //
                      
                  $sql_sh ="select periodshare_amt * 10 as periodshare_amt from shsharemaster where member_no = '$member_no'";
                  $value_sh = array('PERIODSHARE_AMT');
                  list($Num_Rows_sh,$list_info_sh) = get_value_many_oci($sql_sh,$value_sh); 
                  $periodshare_amt =$list_info_sh[0][0];
                  
                  $sql_minsalary ="select 
			  (select salarybal_amt from cmucfsalarybalance where  salarybal_code = lnt.salarybal_code ) as salarybal_amt
                          from lnloantype lnt 
                          where 
                          lnt.loantype_code = '".$_REQUEST["loantype_code"]."'";
                  $value_minsalary = array('SALARYBAL_AMT');
                  list($Num_Rows_minsalary,$list_info_minsalary) = get_value_many_oci($sql_minsalary,$value_minsalary); 
                 
                  $salarybal_amt =$list_info_minsalary[0][0];

                  
                  ////////////////////////////
                  
                  
                      $strSQL_lon ="select loancontract_no from lncontmaster where member_no = '$member_no' and contract_status > 0 "
                              . "and loantype_code not in ('11','12','21') order by loantype_code,loancontract_no";
			$value_lon = array('LOANCONTRACT_NO'); 
			list($Num_Rows_lon,$list_info_lon) = get_value_many_oci($strSQL_lon,$value_lon);
                        
			    $j=0;
                           
				for($i=0;$i<$Num_Rows_lon;$i++){

					 $loancontract_no[$i] = $list_info_lon[$i][0]; 
                                       //  print_r($list_info_lon[$i]); 
                                       $sql_coop ="select lm.loanpay_code,
                                                        ft_RoundMoney(((lm.principal_balance * ft_getcontintrate( lm.coop_id, lm.loancontract_no, lm.lastcalint_date ))/ 100) * (30 / 365), '012001', 'LON', 'loanint') as intestimate_amt,
                                                        ln.loanpayment_type,
                                                        lm.period_payment,
                                                        nvl(cm.salarybal_amt,0) as salarybal_amt
                                                        from lncontmaster lm , lnloantype ln , cmucfsalarybalance cm
                                                        where lm.loantype_code = ln.loantype_code 
                                                        and ln.salarybal_code = cm.salarybal_code(+)
                                                        and	lm.member_no = '$member_no' 
                                                        and lm.contract_status > 0 
                                                        and lm.loancontract_no = '$loancontract_no[$i]'";
                                        $value_coop = array('LOANPAY_CODE','INTESTIMATE_AMT','LOANPAYMENT_TYPE','PERIOD_PAYMENT');
                                        list($Num_Rows_coop,$list_info_coop) = get_value_many_oci($sql_coop,$value_coop); 
                                        $loanpay_code =$list_info_coop[0][0];
                                        $intestimate_amt =$list_info_coop[0][1];
                                        $loanpayment_type =$list_info_coop[0][2];
                                        $period_payment =$list_info_coop[0][3];
                                        
                                        
                                        
                                        
                            if ($loanpay_code == "KEP")
                        {
                            if ($loanpayment_type == 0)
                            {
                                $period_payment = 0;
                            }
                            else if ($loanpayment_type == 1)
                            {
                                $period_payment += $intestimate_amt;
                            }
                            else if ($loanpayment_type == 3)
                            {
                                $period_payment = $intestimate_amt;
                            }
                            
                            $ldc_sumloan = $ldc_sumloan + $period_payment;
                        }
	                           $j++;
				}
                                
                               
				$j=0;
                                
                             
                                
                                $paymonth_coop = $ldc_sumloan + $periodshare_amt; 
                                $paymonth_other = 0;
                                
                                $_REQUEST["salary_amt"] = str_replace(",","",$_REQUEST["salary_amt"]);
                                $_REQUEST["loanrequest_amt"] = str_replace(",","",$_REQUEST["loanrequest_amt"]);
                                
                                $salary_amt_avg = $_REQUEST["salary_amt"] - ($paymonth_coop + $paymonth_other + $salarybal_amt);
                                
                                $sql_ft ="select reqround_factor , payround_factor from lnloantype where loantype_code = '".$_REQUEST["loantype_code"]."'";
                                $value_ft = array('REQROUND_FACTOR','PAYROUND_FACTOR');
                                list($Num_Rows_ft,$list_info_ft) = get_value_many_oci($sql_ft,$value_ft); 
                                $reqround_factor =$list_info_ft[0][0]; 
                                $payround_factor =$list_info_ft[0][1]; 
                                
                                $salary_amt_avg = $salary_amt_avg - ($salary_amt_avg % $payround_factor); 
                                
                                $rate_1 = 30 / 365 ;
                                $rate_int = 7/100;
                                
                                if($month_retry > 200){
                                    
                                    
                                    $month_retry = 200;
                                    
                                }
                                
                                $rate_loanrequest_amt = ($month_retry * $rate_int * $rate_1) + 1; 
                                $loanrequest_amt = ($salary_amt_avg * $month_retry) / $rate_loanrequest_amt; 
                                
                                $sql_ft ="select reqround_factor from lnloantype where loantype_code = '".$_REQUEST["loantype_code"]."'";
                                $value_ft = array('REQROUND_FACTOR');
                                list($Num_Rows_ft,$list_info_ft) = get_value_many_oci($sql_ft,$value_ft); 
                                $reqround_factor =$list_info_ft[0][0]; 
                                
                              //  echo $a = $loanrequest_amt % $reqround_factor; exit();

                                if($loanrequest_amt % $reqround_factor > 0){
 
                                    
                                    
                                    if($reqround_factor > 0){
                                        
                                        $loanrequest_amt_balance = $loanrequest_amt - ($loanrequest_amt % $reqround_factor) + $reqround_factor;
                                        
                                    }else{
                                        
                                        
                                       $loanrequest_amt_balance = $loanrequest_amt - ($loanrequest_amt % $reqround_factor);
                                        
                                    }
                                    
                                    
                                    
                                }else if ($loanrequest_amt % $reqround_factor == 0){
                                    
                                    $loanrequest_amt_balance = $loanrequest_amt - ($loanrequest_amt % $reqround_factor); 
                                    
                                }
                                
                                
                                if($_REQUEST["loanrequest_amt"] == 0){
                                    
                                    $_REQUEST["loanrequest_amt"] = floor($loanrequest_amt_balance);
                                    
                                    
                                }else{
                                    
                                    
                                    $_REQUEST["loanrequest_amt"] = $_REQUEST["loanrequest_amt"];
                                    
                                }
                                
                                
                                
                                if($_REQUEST["loanrequest_amt"] > $_REQUEST["loanreqmax_amt"]){
                                    
                                $_REQUEST["loanrequest_amt"] =  $_REQUEST["loanreqmax_amt"];
                                    
                                    
                                }

                                
                    
                }else if($_REQUEST["loantype_code"] == "73"){

                      
                        // �����鹪��е����͹ //
                      
                  $sql_sh ="select periodshare_amt * 10 as periodshare_amt from shsharemaster where member_no = '$member_no'";
                  $value_sh = array('PERIODSHARE_AMT');
                  list($Num_Rows_sh,$list_info_sh) = get_value_many_oci($sql_sh,$value_sh); 
                  $periodshare_amt =$list_info_sh[0][0];
                  
                  ////////////////////////////
                  
                   $sql_minsalary ="select 
			  (select salarybal_amt from cmucfsalarybalance where  salarybal_code = lnt.salarybal_code ) as salarybal_amt
                          from lnloantype lnt 
                          where 
                          lnt.loantype_code = '".$_REQUEST["loantype_code"]."'";
                  $value_minsalary = array('SALARYBAL_AMT');
                  list($Num_Rows_minsalary,$list_info_minsalary) = get_value_many_oci($sql_minsalary,$value_minsalary); 
                 
                  $salarybal_amt =$list_info_minsalary[0][0];
                  
                  
                      $strSQL_lon ="select loancontract_no from lncontmaster where member_no = '$member_no' and contract_status > 0 "
                              . "and loantype_code not in ('73') order by loantype_code,loancontract_no";
			$value_lon = array('LOANCONTRACT_NO'); 
			list($Num_Rows_lon,$list_info_lon) = get_value_many_oci($strSQL_lon,$value_lon);
			  
                                $j=0;
                           
				for($i=0;$i<$Num_Rows_lon;$i++){

					 $loancontract_no[$i] = $list_info_lon[$i][0]; 
                                       //  print_r($list_info_lon[$i]); 
                                       $sql_coop ="select lm.loanpay_code,
                                                        ft_RoundMoney(((lm.principal_balance * ft_getcontintrate( lm.coop_id, lm.loancontract_no, lm.lastcalint_date ))/ 100) * (30 / 365), '012001', 'LON', 'loanint') as intestimate_amt,
                                                        ln.loanpayment_type,
                                                        lm.period_payment,
                                                        nvl(cm.salarybal_amt,0) as salarybal_amt
                                                        from lncontmaster lm , lnloantype ln , cmucfsalarybalance cm
                                                        where lm.loantype_code = ln.loantype_code 
                                                        and ln.salarybal_code = cm.salarybal_code(+)
                                                        and	lm.member_no = '$member_no' 
                                                        and lm.contract_status > 0 
                                                        and lm.loancontract_no = '$loancontract_no[$i]'";
                                        $value_coop = array('LOANPAY_CODE','INTESTIMATE_AMT','LOANPAYMENT_TYPE','PERIOD_PAYMENT');
                                        list($Num_Rows_coop,$list_info_coop) = get_value_many_oci($sql_coop,$value_coop); 
                                        $loanpay_code =$list_info_coop[0][0];
                                        $intestimate_amt =$list_info_coop[0][1];
                                        $loanpayment_type =$list_info_coop[0][2];
                                        $period_payment =$list_info_coop[0][3];
       
                            if ($loanpay_code == "KEP")
                            {
                            if ($loanpayment_type == 0)
                            {
                                $period_payment = 0;
                            }
                            else if ($loanpayment_type == 1)
                            {
                                $period_payment += $intestimate_amt;
                            }
                            else if ($loanpayment_type == 3)
                            {
                                $period_payment = $intestimate_amt;
                            }
                            
                            $ldc_sumloan = $ldc_sumloan + $period_payment;
                        }
	                           $j++;
				}
                                
                               
				$j=0;
                                
                               //echo $ldc_sumloan ; exit();
                                
                                $paymonth_coop = $ldc_sumloan + $periodshare_amt;
                                $paymonth_other = 0;
                                
                                $_REQUEST["salary_amt"] = str_replace(",","",$_REQUEST["salary_amt"]);
                                $_REQUEST["loanrequest_amt"] = str_replace(",","",$_REQUEST["loanrequest_amt"]);
                                
                                $salary_amt_avg = $_REQUEST["salary_amt"] - ($paymonth_coop + $paymonth_other + $salarybal_amt);
   
                                $sql_ft ="select reqround_factor , payround_factor from lnloantype where loantype_code = '".$_REQUEST["loantype_code"]."'";
                                $value_ft = array('REQROUND_FACTOR','PAYROUND_FACTOR');
                                list($Num_Rows_ft,$list_info_ft) = get_value_many_oci($sql_ft,$value_ft); 
                                $reqround_factor =$list_info_ft[0][0]; 
                                $payround_factor =$list_info_ft[0][1];
                                
                                $salary_amt_avg = $salary_amt_avg - ($salary_amt_avg % $payround_factor);

                                $rate_1 = 30 / 365 ;
                                $rate_int = 5/100;
                                
                                if($month_retry > 12){
                                    
                                    
                                    $month_retry = 12;
                                    
                                }
                                
                                $rate_loanrequest_amt = $month_retry * $rate_int * $rate_1 + 1;
                                $loanrequest_amt = ($salary_amt_avg * $month_retry) / $rate_loanrequest_amt; 
                                
                               
                                
                              //  echo $a = $loanrequest_amt % $reqround_factor; exit();

                                if($loanrequest_amt % $reqround_factor > 0){
 
                                    
                                    
                                    if($reqround_factor > 0){
                                        
                                        $loanrequest_amt_balance = $loanrequest_amt - ($loanrequest_amt % $reqround_factor) + $reqround_factor;
                                        
                                    }else{
                                        
                                        
                                       $loanrequest_amt_balance = $loanrequest_amt - ($loanrequest_amt % $reqround_factor);
                                        
                                    }
                                    
                                    
                                    
                                }
                                
                                if($_REQUEST["loanrequest_amt"] == 0){
                                    
                                  $_REQUEST["loanrequest_amt"] = floor($loanrequest_amt_balance);  
                                    
                                }else{
                                    
                                    
                                    $_REQUEST["loanrequest_amt"] = $_REQUEST["loanrequest_amt"];
                                    
                                }
                                
                                
                    
                                if($_REQUEST["loanrequest_amt"] > $_REQUEST["loanreqmax_amt"]){
                                    
                                $_REQUEST["loanrequest_amt"] =  $_REQUEST["loanreqmax_amt"];
                                    
                                    
                                }

                }
                
                
                else{
                    
                    if($_REQUEST["loanrequest_amt"] == 0){
		  
		 $_REQUEST["loanrequest_amt"] = $_REQUEST["loanreqmax_amt"];

                    }else{
                        
                        $sql_ft ="select reqround_factor , payround_factor from lnloantype where loantype_code = '".$_REQUEST["loantype_code"]."'";
                        $value_ft = array('REQROUND_FACTOR','PAYROUND_FACTOR');
                        list($Num_Rows_ft,$list_info_ft) = get_value_many_oci($sql_ft,$value_ft); 
                        $reqround_factor =$list_info_ft[0][0]; 
                        $payround_factor =$list_info_ft[0][1];
                        
                        if($reqround_factor == -10){ // 11* 12 17 21 22
                            
                          $_REQUEST["loanreqmax_amt"] = floor($_REQUEST["loanreqmax_amt"] / 10);
                          $_REQUEST["loanreqmax_amt"] = $_REQUEST["loanreqmax_amt"] * 10;
                            
                          $_REQUEST["loanrequest_amt"] = floor($_REQUEST["loanrequest_amt"] / 10);
                          $_REQUEST["loanrequest_amt"] = $_REQUEST["loanrequest_amt"] * 10;
                          
                        
                            
                        }else if ($reqround_factor == -100){ //73*
                            
                          $_REQUEST["loanreqmax_amt"] = floor($_REQUEST["loanreqmax_amt"] / 100);
                          $_REQUEST["loanreqmax_amt"] = $_REQUEST["loanreqmax_amt"] * 100;
                            
                          $_REQUEST["loanrequest_amt"] = floor($_REQUEST["loanrequest_amt"] / 100);
                          $_REQUEST["loanrequest_amt"] = $_REQUEST["loanrequest_amt"] * 100;
                         
                            
                        }else if ($reqround_factor == 0){ // 19
                            
                          $_REQUEST["loanreqmax_amt"] = $_REQUEST["loanreqmax_amt"];
                          $_REQUEST["loanrequest_amt"] = $_REQUEST["loanrequest_amt"];
                        }
                        
                        //$_REQUEST["loanreqmax_amt"] = $_REQUEST["loanreqmax_amt"];
                        //$_REQUEST["loanrequest_amt"] = $_REQUEST["loanrequest_amt"];

                    }
		  
                }
		  
	  }
          
	  if($_REQUEST["loanrequest_amt"]<=0||$_REQUEST["loanrequest_amt"]>$_REQUEST["loanreqmax_amt"]){ 
	  
	         /* if($_REQUEST["loantype_code"] == "19"){
				  
				  if($_REQUEST["loanrequest_amt"] > 9660){
					  
					  $_REQUEST["loanrequest_amt"]=$_REQUEST["loanreqmax_amt"];
				  }
				  
			  }else{*/
	  
		  $_REQUEST["loanrequest_amt"]=$_REQUEST["loanreqmax_amt"];
			  
			  //}
	  }	

          
	  if($_REQUEST["period"]<=0||$_REQUEST["period"]>$_REQUEST["period_max"]){
              
            
              
              
              if($_REQUEST["loantype_code"] == "11" || $_REQUEST["loantype_code"] == "73"){
                  
                 
                  
                  if($month_retry < 200){
                      
                    $_REQUEST["period"]=$month_retry; 
                    
                      
                  }
                  
              }else{
                  
                $_REQUEST["period"]=$_REQUEST["period_max"];
                
              }
              
              
              
              
	      
	  }
                  
                  ///////
		  
	  //}
	  
	  $loanrequest_valid_flag=true;
	  $SHARE_PERIOD_MIN=6;
	  //�óա�����ѭ��鹤�ӨФӹǳ ǧ�Թ������
          
          //echo $_REQUEST["salary_amt"];
          
	  if($_REQUEST["loantype_code"] == "12" || $_REQUEST["loantype_code"] == "17"){
              
              //  echo "<script>alert('555+');</script>";
              
		$strSQL="select (s.sharestk_amt*st.unitshare_value * 0.9) as  sharestk_amt,s.last_period from shsharemaster  s,shsharetype st where st.sharetype_code=s.sharetype_code and s.member_no ='".$member_no."' ";
		//echo $strSQL;
		$value = array('SHARESTK_AMT','LAST_PERIOD');
		 list($Num_Rows_,$list_info_) = get_value_many_oci($strSQL,$value); 
                 
                 $_REQUEST["loanreqmax_amt"]= $list_info_[0][0]; 
                

                     if($_REQUEST["salary_amt"] == 0){

                     if($_REQUEST["loanreqmax_amt"] > $LOAN_CONDITION_MAX_AMT[$_REQUEST["loantype_code"]]){
                     
                     $_REQUEST["loanreqmax_amt"] = $LOAN_CONDITION_MAX_AMT[$_REQUEST["loantype_code"]];
                     $_REQUEST["loanrequest_amt"] = $LOAN_CONDITION_MAX_AMT[$_REQUEST["loantype_code"]];
                     
                      }else{
                     
                         
                          
                        $sql_ft ="select reqround_factor , payround_factor from lnloantype where loantype_code = '".$_REQUEST["loantype_code"]."'";
                        $value_ft = array('REQROUND_FACTOR','PAYROUND_FACTOR');
                        list($Num_Rows_ft,$list_info_ft) = get_value_many_oci($sql_ft,$value_ft); 
                        $reqround_factor =$list_info_ft[0][0]; 
                        $payround_factor =$list_info_ft[0][1];
                          
                        if($reqround_factor == -10){
                            
                           
                                  $loanrequest_amt_floor = $_REQUEST["loanreqmax_amt"];
                                  $loanrequest_amt_floor = floor($loanrequest_amt_floor / 10);
                                  $_REQUEST["loanrequest_amt"] = $loanrequest_amt_floor * 10;
                                  //$_REQUEST["loanrequest_amt"] = $_REQUEST["loanreqmax_amt"];
                            
                        }else if($reqround_factor == -100){
                            
                             
                            
                                  $loanrequest_amt_floor = $_REQUEST["loanreqmax_amt"];
                                  $loanrequest_amt_floor = floor($loanrequest_amt_floor / 100);
                                  $_REQUEST["loanrequest_amt"] = $loanrequest_amt_floor * 100;
                            
                        }else if($reqround_factor == 0){
                            
                             
                            
                            $_REQUEST["loanrequest_amt"] = $_REQUEST["loanreqmax_amt"];
                            
                        }
                          
                    // $_REQUEST["loanrequest_amt"] = $_REQUEST["loanreqmax_amt"];
                     
                      }
                      
                     }

		 $_REQUEST["share_period"]=$list_info_[0][1];
		 $_REQUEST["period_max"] = 200;
		 
		 $loanrequest_valid_flag=($_REQUEST["share_period"]>=$SHARE_PERIOD_MIN);
                 
          
	  }else if ($_REQUEST["loantype_code"]=="11"){
	
	  
	 
	  }
          
          
                  if ($_REQUEST["salary_amt"] == 0 && ($_REQUEST["loantype_code"] == "12" || $_REQUEST["loantype_code"] == "17")){
          
                   $_REQUEST["loanrequest_amt_start"] = $_REQUEST["loanrequest_amt"];
                  
                  }
          
		  $_REQUEST["period_max"]=$LOAN_CONDITION_PERIOD_MAX[$_REQUEST["loantype_code"]];
	 
	  	
	  if(isset($_REQUEST["period_payment"])==false){
		  $_REQUEST["period_payment"]=0;
	  }
	  
	  
	  if(isset($_REQUEST["period"])==false){
		  
              
                  
           
		 $_REQUEST["period"]=$LOAN_CONDITION_PERIOD_MIN[$_REQUEST["loantype_code"]];
		  
	  }

	  /*

	   ��äӹǹ�Ǵ���� 
	  ====================================================
		����ö���͡���� 2 Ẻ
		1 ���� (�Թ���ѧ�������͡���� � �ѹ�����͹)
		   �ʹ���������͹ = �ʹ���/�Ǵ���� 
		   �Ǵ���� = �ʹ���/�ʹ���������͹
			   * ����ͧ�ӹǳ�͡���¤�Ѻ ���͡����ʹ����������͡����

		2. ���ʹ (�Թ������͡��������ҡѹ�ء��͹)
		  �ʹ���������͹ = (�ʹ��� * (�ѵ�Ҵ͡����  * 30 / 365)) / (1 - Exp(-�Ǵ���� * Log(1 + (�ѵ�Ҵ͡���� * (30 / 365)))))
		  �Ǵ���� = (ln(�ʹ���������͹/(�ʹ���������͹-(�ʹ���*(�ѵ�Ҵ͡����*(30/365)))))) / log(1+(�ѵ�Ҵ͡����*(30/365)))

		��ûѴ
      �ʹ���������͹  = �Ѵ�����������ѡ���� -> 1,240 = 1,300 �ҷ
      �Ǵ���� = �Ѵ��������ѡ˹��� - > 24.22 = 25 �Ǵ
           
      */	  
		
      $_REQUEST["period_payment"]=0;
	  $CAL_PERIOD=false;
	  if($_REQUEST["loanpayment_type"]==1){ //����
              
          
              
		  $_REQUEST["period_payment"]=ceil($_REQUEST["loanrequest_amt"]/$_REQUEST["period"]/100)*100; 

		  //�ʹ���������͹ = �ʹ���/�Ǵ���� 
		  if($CAL_PERIOD)
		  $_REQUEST["period"]=ceil($_REQUEST["loanrequest_amt"]/$_REQUEST["period_payment"]);
                  
                 
		  //�Ǵ���� = �ʹ���/�ʹ���������͹
	  }else { //���ʹ
		 // $_REQUEST["period_payment"]= @ceil(($_REQUEST["loanrequest_amt"] * ($_REQUEST["loan_rate"]  * 30 / 365)) / (1 - @exp(-$_REQUEST["period"] * @log(1 + ($_REQUEST["loan_rate"] * (30 / 365))))) /100)*100;
		  // (�ʹ��� * (�ѵ�Ҵ͡����  * 30 / 365)) / (1 - Exp(-�Ǵ���� * Log(1 + (�ѵ�Ҵ͡���� * (30 / 365)))))
		 // if($CAL_PERIOD)
		 // $_REQUEST["period"]=ceil((log($_REQUEST["period_payment"]/($_REQUEST["period_payment"]-($_REQUEST["loanrequest_amt"]*($_REQUEST["loan_rate"] *(30/365)))))) / log(1+($_REQUEST["loan_rate"] *(30/365))));
		  // �Ǵ���� = (ln(�ʹ���������͹/(�ʹ���������͹-(�ʹ���*(�ѵ�Ҵ͡����*(30/365)))))) / log(1+(�ѵ�Ҵ͡����*(30/365)))
		   if($_REQUEST["loantype_code"] != "19"){
                 
                 @$period_payment_ = ($_REQUEST["loanrequest_amt"] /$_REQUEST["period"]) ;
                 
                  $mos = ($period_payment_ % 100) ;
                  
                  if($mos == 0 && $_REQUEST["loanrequest_amt"] > 100){
                     $_REQUEST["period_payment"] = floor($period_payment_);
                  
                  }else{
                      
                      $_REQUEST["salary_amt"] = str_replace(",","",$_REQUEST["salary_amt"]);
                      $_REQUEST["loanrequest_amt"] = str_replace(",","",$_REQUEST["loanrequest_amt"]);
                      
                      if(isset($_REQUEST["loanrequest_amt"])!= false && $_REQUEST["salary_amt"] != 0){
                    
                      
                      $payment_show = $period_payment_ - $mos;
                      $payment_show = $payment_show + 100;
		      $_REQUEST["period_payment"] = floor($payment_show);
                                          
                      }
                  }
                   
             } else{

                 @$_REQUEST["period_payment"] = ($_REQUEST["loanrequest_amt"] /$_REQUEST["period"]) ;
                  //$_REQUEST["period_payment"] = floor($_REQUEST["period_payment"]);
                 $_REQUEST["period_payment"] = $_REQUEST["period_payment"]; // config period_payment start

             }
	  }
          
          
          if($_REQUEST["salary_amt"] == 0){
              
              
              if($_REQUEST["loantype_code"] == "11" || $_REQUEST["loantype_code"] == "12"){
                  
                  $_REQUEST["period_max"] = 200;
                  //$_REQUEST["period"] = 200;
                  
              }else if ($_REQUEST["loantype_code"] == "19" || $_REQUEST["loantype_code"] == "73"){
                  
                 $_REQUEST["period_max"] = 12; 
                 //$_REQUEST["period"] = 12;
                  
              }else if ($_REQUEST["loantype_code"] == "21" || $_REQUEST["loantype_code"] == "22"){
                  
                  
                  $_REQUEST["period_max"] = 10;
                  $_REQUEST["period"] = 10;
                  
              }else if ($_REQUEST["loantype_code"] == "17"){
                  
                  $_REQUEST["period_max"] = 48;
                  $_REQUEST["period"] = 48;
                  
              }
              
              
          }
          
           $sql_retry ="select 
			
             (floor(floor(MONTHS_BETWEEN(retry_date,SYSDATE )) /12) * 12 +
			mod(floor(MONTHS_BETWEEN(retry_date,SYSDATE )),12) ) as month_retry
			from mbmembmaster 
			where member_no = '$member_no'";
                                $value_retry = array('MONTH_RETRY');
                                list($Num_Rows_retry,$list_info_retry) = get_value_many_oci($sql_retry,$value_retry); 
                                $month_retry =$list_info_retry[0][0];
          
          
          
          if($_REQUEST["loantype_code"] == "12" || $_REQUEST["loantype_code"] == "17"){
              
              $che = "0";
              
          }else if ($_REQUEST["loantype_code"] == "19" || $_REQUEST["loantype_code"] == "21" || $_REQUEST["loantype_code"] == "22"){
              
              $che = "1";
              
          }else if($_REQUEST["loantype_code"] == "11" || $_REQUEST["loantype_code"] == "73"){
              
              $che = "2";
              
          }

          //echo $_REQUEST["loanrequest_amt_start"]; /////

          if($_REQUEST["loanrequest_amt_start"] != $_REQUEST["loanrequest_amt"]){
              
              
             
              
             if($_REQUEST["period_payment"] > 0 && $che == "1"){

                  // $_REQUEST["period_max"] = "99";
              
              if($_REQUEST["loantype_code"] == "19" || $_REQUEST["loantype_code"] == "73"){
                  
                   $_REQUEST["period_max"] = 12; 
                   
              }else if($_REQUEST["loantype_code"] == "21" || $_REQUEST["loantype_code"] == "22"){
                  
                   $_REQUEST["period_max"] = 10;
                  
              }else if($_REQUEST["loantype_code"] == "11"){
                  
                   $_REQUEST["period_max"] = 200;
                  
              }

                   $period_chang = $_REQUEST["loanrequest_amt"] / $_REQUEST["period_payment"];
                   $period_chang = ceil($period_chang);
                   $_REQUEST["period"] = $period_chang;

          }else if ($_REQUEST["period_payment"] > 0 && $che == "0"){
              
              $loanrequest_amt_re = str_replace(".00","",$_REQUEST["loanrequest_amt"]);
              
               if($loanrequest_amt_re != $_REQUEST["loanreqmax_amt"]){
                   
                  if($_REQUEST["loantype_code"] == "17"){
                      
                      $_REQUEST["period_max"] = 48; 
                  }else if ($_REQUEST["loantype_code"] == "12"){
                      
                    $_REQUEST["period_max"] = 200;
                      
                  } 

                  $period_chang = $_REQUEST["loanrequest_amt"] / $_REQUEST["period_payment"];
                  $period_chang = ceil($period_chang);
                  $_REQUEST["period"] = $period_chang; 
 
               }
              
              
          }else if ($_REQUEST["period_payment"] > 0 && $che == "2") {

              if($_REQUEST["loantype_code"] == "19" || $_REQUEST["loantype_code"] == "73"){
                  
                   $_REQUEST["period_max"] = 12; 
                   
              }else if($_REQUEST["loantype_code"] == "21" || $_REQUEST["loantype_code"] == "22"){
                  
                   $_REQUEST["period_max"] = 10;
                  
              }else if($_REQUEST["loantype_code"] == "11"){
                  
                   $_REQUEST["period_max"] = 200;
                  
              }

                  /*if($month_retry >= 200){ // config period
                      
                      $period_chang = 200;
                      
                  }else{
                     
                  $period_chang = $_REQUEST["loanrequest_amt"] / $_REQUEST["period_payment"];
  
                  }*/
              
                  $period_chang = $_REQUEST["loanrequest_amt"] / $_REQUEST["period_payment"];
                  $period_chang = ceil($period_chang);
                  $_REQUEST["period"] = $period_chang; 
  
          }
        }
          
      
          
	  
	  if($_REQUEST["period"]<=0||$_REQUEST["period"]>$_REQUEST["period_max"]){
		  
		  $_REQUEST["period"]=$_REQUEST["period_max"];
	  
	  }  
	  
	  
	  //���ҭ��� ��Ǩ���͹� ��ͧ�պѭ�� �Թ�ҡ 88 
	  $_REQUEST["deptaccount_flag"]=true;
	  //��ͧ ByPass ��ǹ����
      //$_REQUEST["deptaccount_flag"]=false;	  
	  //if($_REQUEST["save_mode"]=="insert"){
	  $_REQUEST["deptaccount_no"]="-";	 
	  $_REQUEST["expense_accno"]="-";	  
	  $strSQL="select deptaccount_no,expense_accno from dpdeptmaster where depttype_code = '88' and deptclose_status = 0 and member_no='$member_no'";
	  $value = array('DEPTACCOUNT_NO','EXPENSE_ACCNO');
	  list($Num_Rows_,$list_info_) = get_value_many_oci($strSQL,$value); 
	  if($Num_Rows_>0){
		  $_REQUEST["deptaccount_no"]="";	 
		  $_REQUEST["expense_accno"]="";	
	  }
		 for($i=0;$i<$Num_Rows_;$i++){
			   $_REQUEST["deptaccount_flag"]=true;
			   $_REQUEST["deptaccount_no"]=$_REQUEST["deptaccount_no"].$list_info_[$i][0];
			   $_REQUEST["expense_accno"]=$_REQUEST["expense_accno"].$list_info_[$i][1];
			   if($i+1<$Num_Rows_){
			   $_REQUEST["deptaccount_no"]=$_REQUEST["deptaccount_no"].",";
			   $_REQUEST["expense_accno"]=$_REQUEST["expense_accno"].",";
			   }
		  }
	 //  }	
  $SHARE_PERIOD_MIN_MEM=6;
  $strSQL="select p.prename_desc||' '||m.memb_name||' '||m.memb_surname as memb_fullname 
							 ,g.membgroup_desc ,m.position_desc ,m.member_no,s.last_period,m.resign_status,
							 (select count(l.member_no) as cnt from lncontmaster l,lncontcoll lc  where l.loancontract_no=lc.loancontract_no and l.contract_status=1 and lc.coll_status=1 and lc.ref_collno=m.member_no ) as collrefmembnocnt ,
							 (select l.member_no from lncontmaster l,lncontcoll lc  where l.loancontract_no=lc.loancontract_no and l.contract_status=1 and lc.coll_status=1 and lc.ref_collno=m.member_no and rownum=1) as collrefmembno ,
							 (select pp.prename_desc||' '||mm.memb_name||' '||mm.memb_surname as memb_fullname  from lncontmaster l,lncontcoll lc ,mbmembmaster mm,mbucfprename pp where  pp.prename_code=mm.prename_code and mm.member_no=l.member_no and l.loancontract_no=lc.loancontract_no and l.contract_status=1 and lc.coll_status=1 and lc.ref_collno=m.member_no and rownum=1) as collrefmembname 
			                 from mbmembmaster m,mbucfprename p ,mbucfmembgroup g ,shsharemaster  s,shsharetype st 
							 where  m.prename_code=p.prename_code and m.membgroup_code=g.membgroup_code and st.sharetype_code=s.sharetype_code and s.member_no=m.member_no  
							 and m.member_no= '$member_no' and ( m.resign_status = 0 or m.resign_date > sysdate ) ";
			 //echo $strSQL;
			  $valueM = array('LAST_PERIOD');
		      list($Num_RowsM,$list_infoM) = get_value_many_oci($strSQL,$valueM); 
  $_REQUEST["share_last_period"]=$list_infoM[0][0];
  if($_REQUEST["share_last_period"]<$SHARE_PERIOD_MIN_MEM){
	  ?>
	  <script>
		   valid=false;
		    alert("��ҹ��ͧ�觤��������ҧ���� <?=$SHARE_PERIOD_MIN_MEM?> �Ǵ�֧������ö����¡�� ��");
	  </script>		
	  <?php
  }else{
?>
<?php if($_REQUEST["deptaccount_flag"]==false&&$_REQUEST["save_mode"]=="insert"){ ?><h4><b><font color=red>�������ö����¡�������ͧ�ҡ ��ҹ��ͧ������Դ�ѭ���Թ�ҡ�ء�Թ ATM �Ѻ�ҧ�ˡó�</font></b></h4><?php } ?>
	<table width="100%" border="0" cellspacing="1" cellpadding="3" style="display:<?php if($_REQUEST["deptaccount_flag"]==false&&$_REQUEST["save_mode"]=="insert"){ ?>none<?php } ?>;" id="tblFruits">
	<input type="hidden" name="action" value=""/>
	<input type="hidden" name="save_mode" value="<?=$_REQUEST["save_mode"]?>"/>
	<input type="hidden" name="chang_step" value="<?=$_REQUEST["chang_step"]?>"/>
	<input type="hidden" name="member_no" value="<?=$member_no?>"/>
       <tr>
              <td align="center"><hr size="1" color="#CCCCCC"><strong><font color="red">** ��������ǹ��� </font></td>
            </tr>
			
			<?php  $strSQL="select 
						trunc(months_between(sysdate,mb.birth_date)/12) member_age,
						(case when mb.ADDR_MOBILEPHONE is null or mb.ADDR_MOBILEPHONE = '' then mb.ADDR_PHONE else mb.ADDR_MOBILEPHONE end) as phone_no,
						mb.addr_email,
						mb.mem_telwork,
						mb.salary_id,
						mb.card_person,
						mup.membgroup_desc,
						(case when mb.addr_no = '' or mb.addr_no is null then '' else mb.addr_no end) ||
							(case when mb.addr_moo = '' or mb.addr_moo is null then '' else ' ������ ' || mb.addr_moo end) ||
							(case when mb.addr_village = '' or mb.addr_village is null then '' else ' �����ҹ ' || mb.addr_village end) as addr_member1,
							(case when mb.addr_soi = '' or mb.addr_soi is null then '' else ' �. ' || mb.addr_soi end) ||
							(case when mb.addr_road = '' or mb.addr_road is null then '' else ' �. ' || mb.addr_road end) ||
							(case when mut.tambol_desc = '' or mut.tambol_desc is null then '' else ' �./��ǧ ' || mut.tambol_desc end) ||
							(case when mud.district_desc = '' or mud.district_desc is null then '' else ' �./ࢵ ' || mud.district_desc end) ||
							(case when mup.province_desc = '' or mup.province_desc is null then '' else ' �. ' || mup.province_desc end) ||
							(case when mb.addr_postcode = '' or mb.addr_postcode is null then '' else ' ' || mb.addr_postcode end) as addr_member,
						mb.addr_no AS curraddr_no,
						mb.addr_moo AS curraddr_moo,
						mb.addr_village AS curraddr_village,
						mb.addr_soi AS curraddr_soi,
						mb.addr_road AS curraddr_road,
						mut.tambol_desc,
						mud.district_desc,
						mup.province_desc,
						mb.addr_postcode AS curraddr_postcode,
						mb.member_type,
                                                MUL.LEVEL_DESC , s.sharestk_amt , s.sharestk_amt * 10 as share_amt,mb.card_person,
                                                nvl((select sum(principal_balance) as principal_balance from lncontmaster where loantype_code = '".$_REQUEST["loantype_code"]."' and member_no = '$member_no' and contract_status = 1),0) as principal_balance
						from mbmembmaster mb , mbucfmembgroup mup , mbucfdistrict mud , mbucftambol mut , mbucfprovince mup , MBUCFLEVEL MUL , shsharemaster s
						where 
						mb.membgroup_code = mup.membgroup_code(+)
						and mb.tambol_code = mut.tambol_code(+)
						and mb.amphur_code = mud.district_code(+)
						and mb.province_code = mup.province_code(+) 
                           AND MB.LEVEL_CODE = MUL.LEVEL_CODE(+)
                           and mb.member_no = s.member_no(+)
						and mb.member_no = '$member_no'";
			$value = array('MEMBER_AGE','PHONE_NO','ADDR_EMAIL','MEM_TELWORK','SALARY_ID','CARD_PERSON',
			'MEMBGROUP_DESC','ADDR_MEMBER1','ADDR_MEMBER','CURRADDR_NO','CURRADDR_MOO','CURRADDR_VILLAGE','CURRADDR_SOI',
			'CURRADDR_ROAD','TAMBOL_DESC','DISTRICT_DESC','PROVINCE_DESC','CURRADDR_POSTCODE','MEMBER_TYPE','LEVEL_DESC','SHARESTK_AMT','SHARE_AMT','CARD_PERSON','PRINCIPAL_BALANCE'); 
			list($Num_Rows,$list_info) = get_value_many_oci($strSQL,$value);
			    $j=0;
				for($i=0;$i<$Num_Rows;$i++){
					$member_age=$list_info[$i][$j++];
					$phone_no =$list_info[$i][$j++];
					$email =$list_info[$i][$j++];
					$mem_telwork =$list_info[$i][$j++];
					$salary_id =$list_info[$i][$j++];
					$card_person =$list_info[$i][$j++];
					$membgroup_desc =$list_info[$i][$j++];
					$addr_member1 =$list_info[$i][$j++];
					$addr_member =$list_info[$i][$j++];
					$curraddr_no =$list_info[$i][$j++];
					$curraddr_moo =$list_info[$i][$j++];
					$curraddr_village =$list_info[$i][$j++];
					$curraddr_soi =$list_info[$i][$j++];
					$curraddr_road =$list_info[$i][$j++];
					$tambol_desc =$list_info[$i][$j++];
					$district_desc =$list_info[$i][$j++];
					$province_desc =$list_info[$i][$j++];
					$curraddr_postcode =$list_info[$i][$j++];
                                        $member_type = $list_info[$i][$j++];
                                        $level_desc = $list_info[$i][$j++];
                                        $sharestk_amt = $list_info[$i][$j++];
                                        $share_amt = $list_info[$i][$j++];
                                        $card_person = $list_info[$i][$j++];
                                        $principal_balance = $list_info[$i][$j++];
				}
				$j=0;
			

				// �֧�������ҡ PHPMyAdmin1
				$strSQL4 = "SELECT	curraddr_no as myaddr_no,
									curraddr_moo as myaddr_moo,
									curraddr_village as myaddr_village,
									curraddr_soi as myaddr_soi,
									curraddr_road as myaddr_road,
									tambol_desc as mytambol_desc,
									district_desc as mydistrict_desc,
									province_desc as myprovince_desc,
									curraddr_postcode as myaddr_postcode,
									concat(concat((case when curraddr_no = '' or curraddr_no is null then '' else curraddr_no end) ,
									(case when curraddr_moo = '' or curraddr_moo is null then '' else concat(' ������ ', curraddr_moo) end)) ,
									(case when curraddr_village = '' or curraddr_village is null then '' else concat(' �����ҹ ', curraddr_village) end)) as myaddr_member1,
									concat(concat(concat(concat(concat(concat((case when curraddr_soi = '' or curraddr_soi is null then '' else concat(' �. ' , curraddr_soi) end)) ,
									(case when curraddr_road = '' or curraddr_road is null then '' else concat(' �. ' , curraddr_road) end)) ,
									(case when tambol_desc = '' or tambol_desc is null then '' else concat(' �./��ǧ ' , tambol_desc) end)) ,
									(case when district_desc = '' or district_desc is null then '' else concat(' �./ࢵ ' , district_desc) end)) ,
									(case when province_desc = '' or province_desc is null then '' else concat(' �. ' , province_desc) end)) ,
									(case when curraddr_postcode = '' or curraddr_postcode is null then '' else concat(' ' , curraddr_postcode) end)) as myaddr_member
							FROM 	webmbmembmaster
							where 	member_no = '$member_no'";
				$value4 = array(
					'myaddr_no', 'myaddr_moo', 'myaddr_village', 'myaddr_soi',
					'myaddr_road', 'mytambol_desc', 'mydistrict_desc', 'myprovince_desc', 'myaddr_postcode', 'myaddr_member1', 'myaddr_member'
				);
				list($Num_Rows, $list_info) = get_value_many_sql($strSQL4, $value4);
				$j = 0;
				for ($i = 0; $i < $Num_Rows; $i++) {
					$myaddr_no			= $list_info[$i][$j++];
					$myaddr_moo			= $list_info[$i][$j++];
					$myaddr_village		= $list_info[$i][$j++];
					$myaddr_soi			= $list_info[$i][$j++];
					$myaddr_road		= $list_info[$i][$j++];
					$mytambol_desc		= $list_info[$i][$j++];
					$mydistrict_desc	= $list_info[$i][$j++];
					$myprovince_desc	= $list_info[$i][$j++];
					$myaddr_postcode	= $list_info[$i][$j++];
					$myaddr_member1		= $list_info[$i][$j++];
					$myaddr_member		= $list_info[$i][$j++];
					$j = 0;
				}
			?>
			
      <tr style="display:;">
          
     
      <input type="hidden" name="loanrequest_amt_start" id="loanrequest_amt_start" value="<?=$_REQUEST["loanrequest_amt_start"]?>">

        <td width="25%"  bgcolor="#6699FF"><strong><font color="#FFFFFF"> ������ : <font color=red><b>(*)</b></font></font></strong></td>
        <td  height="25" bgcolor="#FFFFFF"><input type="text" name="phone_no" id="phone_no" value="<?=$phone_no?>"  style="background-color:yellow;width: 196px;"></td>
        <td width="25%" bgcolor="#6699FF"><strong><font color="#FFFFFF"> Email : </font></strong></td>
        <td  height="25"  bgcolor="#FFFFFF"><input type="text" name="email" id="email" value="<?=$_REQUEST["email"]?>" style="background-color:yellow;width: 141px;" ></td>
      </tr>
      <tr style="display:none;">
        <td width="25%" bgcolor="#6699FF"><strong><font color="#FFFFFF"> �Ţ�ѭ���Թ�ҡ ATM : </font></strong></td>
        <td  height="25"  bgcolor="#FFFFFF"><input type="hidden" name="deptaccount_no" id="deptaccount_no" value="<?=$_REQUEST["deptaccount_no"]?>"  ><?=$_REQUEST["deptaccount_no"]?></td>
        <td width="25%" bgcolor="#6699FF"><strong><font color="#FFFFFF"> �Ţ�ѭ�ո�Ҥ�ü١ ATM : </font></strong></td>
        <td  height="25"  bgcolor="#FFFFFF"><input type="hidden" name="expense_accno" id="expense_accno" value="<?=$_REQUEST["expense_accno"]?>"  ><?=$_REQUEST["expense_accno"]?></td>
      </tr>
      <tr>
        <!--<td width="25%" bgcolor="#6699FF"><strong><font color="#FFFFFF"> �Ţ��边ѡ�ҹ : </font></strong></td>-->
           <td width="25%"  bgcolor="#6699FF"><strong><font color="#FFFFFF"> �ӹѡ�ҹ: <font color=red><b>(*)</b></font></font></strong></td>
        <td  height="25"  bgcolor="#FFFFFF"><input type="text" name="workplace" id="workplace" value="<?=$_REQUEST["workplace"]?>"  style="background-color:yellow;width: 196px;"></td>
       
            <input type="hidden" name="entry_date" id="entry_date" value="<?=$_REQUEST["entry_date"]?>"  >
		<input type="hidden" name="salary_id" id="salary_id" value="<?=$salary_id?>" style="background-color:yellow;width: 196px;">
        <td width="25%" bgcolor="#6699FF"><strong><font color="#FFFFFF"> ���˹� : <font color=red><b>(*)</b></font></font></strong></td>
        <td  height="25" bgcolor="#FFFFFF"><input type="text" name="position_desc" id="position_desc" value="<?=$_REQUEST["position_desc"]?>"  style="background-color:yellow;width: 141px;"  ></td>
      </tr>
      <tr style="display:none;">
        <td width="25%" bgcolor="#6699FF"><strong><font color="#FFFFFF"> �ѧ�Ѵ : </font></strong></td>
        <td  height="25"  bgcolor="#FFFFFF"><input type="hidden" name="membgroup_desc" id="membgroup_desc" value="<?=$_REQUEST["membgroup_desc"]?>"  ><?=$_REQUEST["membgroup_desc"]?></td>
      </tr>
      <tr>
        <td width="25%"  bgcolor="#6699FF"><strong><font color="#FFFFFF"> ������ӧҹ: </font></strong></td>
        <td  height="25"  bgcolor="#FFFFFF"><input type="text" name="phonework_no" id="phonework_no" value="<?=$_REQUEST["phonework_no"]?>" style="background-color:yellow;width: 196px;"></td>	
        <!--<td width="25%"   bgcolor="#6699FF"><strong><font color="#FFFFFF"> �Թ��͹ : <font color=red><b>(*)</b></font></font></strong></td>
        <td  height="25" bgcolor="#FFFFFF" ><input type="text" name="salary_amt" id="salary_amt" value="<?//=$_REQUEST["salary_amt"]?>" size=8  style="background-color:yellow;" onchange="submitForm(this)" > (�ҷ)</td>-->
        
		
		
		<td width="25%"   bgcolor="#6699FF"><strong><font color="#FFFFFF"> ���� : <font color=red><b>(*)</b></font></font></strong></td>
        <td  height="25" bgcolor="#FFFFFF" ><input type="text" name="member_age" id="member_age" value="<?=$member_age?>" size=8  style="background-color:yellow;width: 141px;text-align: center;"  > (��)</td>        
        <!--<td width="25%"  bgcolor="#6699FF"><strong><font color="#FFFFFF"> �ѧ��Ѵ/����� : <font color=red><b>(*)</b></font></font></strong></td>
        <td  height="25" bgcolor="#FFFFFF">-->
		<?php 
		    $strSQL="select * from mbucfprovince where province_code in (".implode(",",$PROVINCE_CODE).")";
			$value = array('PROVINCE_CODE','PROVINCE_DESC');
			list($Num_Rows,$list_info) = get_value_many_oci($strSQL,$value);

				

			?>
		<select id="province_desc" name="province_desc" onchange="submitForm(this)" style="display:none;">
		  <?php 
				$j=0;
				for($i=0;$i<$Num_Rows;$i++){
					$province_code=$list_info[$i][$j++];
					$province_desc=$list_info[$i][$j++];
					
					if(isset($_REQUEST["province_desc"])==false){
						  $_REQUEST["province_desc"]=$province_desc;
					}
	
					if($_REQUEST["province_desc"]==$province_desc){
						 $province_code_=$province_code;
					}
					
					$j=0;
					?>
			<option value="<?=$province_desc?>" <?=$_REQUEST["province_desc"]==$province_desc?"selected":""?> ><?=$province_desc?></option>
		  <?php } ?>	
		</select>
		 <?php 
		    $strSQL="select * from mbucfdistrict where province_code ='".$province_code_."'";
			$value = array('DISTRICT_CODE','DISTRICT_DESC');
			list($Num_Rows,$list_info) = get_value_many_oci($strSQL,$value); ?>
		<select id="amphur_desc" name="amphur_desc" style="display:none;">
		  <?php 
				$j=0;
				for($i=0;$i<$Num_Rows;$i++){
					$district_code=$list_info[$i][$j++];
					$district_desc=$list_info[$i][$j++];
					$j=0;
					?>
			<option value="<?=$district_desc?>" <?=$_REQUEST["amphur_desc"]==$district_desc?"selected":""?> ><?=$district_desc?></option>
		  <?php } ?>	
		</select>
		<!--</td>-->
      </tr>
      <?php
      
      $_REQUEST["salary_amt"] = str_replace(",","",$_REQUEST["salary_amt"]);
      $_REQUEST["loanrequest_amt"] = str_replace(",","",$_REQUEST["loanrequest_amt"]);
      
      if($_REQUEST["salary_amt"] > 0){
      
       $sql_sh ="select periodshare_amt * 10 as periodshare_amt from shsharemaster where member_no = '$member_no'";
                  $value_sh = array('PERIODSHARE_AMT');
                  list($Num_Rows_sh,$list_info_sh) = get_value_many_oci($sql_sh,$value_sh); 
                  $periodshare_amt =$list_info_sh[0][0];
                  
                  
       $sql_minsalary ="select 
			     (select salarybal_amt from cmucfsalarybalance where  salarybal_code = lnt.salarybal_code ) as salarybal_amt
                          from lnloantype lnt 
                          where 
                          lnt.loantype_code = '".$_REQUEST["loantype_code"]."'";
                  $value_minsalary = array('SALARYBAL_AMT');
                  list($Num_Rows_minsalary,$list_info_minsalary) = get_value_many_oci($sql_minsalary,$value_minsalary); 
                 
                  $salarybal_amt =$list_info_minsalary[0][0];
                  
                  $sql_ft ="select reqround_factor , payround_factor from lnloantype where loantype_code = '".$_REQUEST["loantype_code"]."'";
                                $value_ft = array('REQROUND_FACTOR','PAYROUND_FACTOR');
                                list($Num_Rows_ft,$list_info_ft) = get_value_many_oci($sql_ft,$value_ft); 
                                $reqround_factor =$list_info_ft[0][0]; 
                                $payround_factor =$list_info_ft[0][1];
                                
                  $sql_ft ="select reqround_factor from lnloantype where loantype_code = '".$_REQUEST["loantype_code"]."'";
                  $value_ft = array('REQROUND_FACTOR');
                  list($Num_Rows_ft,$list_info_ft) = get_value_many_oci($sql_ft,$value_ft); 
                  $reqround_factor =$list_info_ft[0][0]; 
                  
      }
      
      ?>
      
	  <tr>
        
        <input type="hidden" name="periodshare_amt" id="periodshare_amt" value="<?=$periodshare_amt?>"  >
         <input type="hidden" name="salarybal_amt" id="salarybal_amt" value="<?=$salarybal_amt?>"  >
        <!--<td width="25%"   bgcolor="#6699FF"><strong><font color="#FFFFFF"> ���� : <font color=red><b>(*)</b></font></font></strong></td>
        <td  height="25" bgcolor="#FFFFFF" ><input type="text" name="member_age" id="member_age" value="<?//=$_REQUEST["member_age"]?>" size=8  style="background-color:yellow;"  > (��)</td>  -->      
	  </tr>
          
         <tr>
              
         <input type="hidden" name="reqround_factor" id="reqround_factor" value="<?=$reqround_factor?>">
         <input type="hidden" name="payround_factor" id="payround_factor" value="<?=$payround_factor?>">
         <input type="hidden" name="reqround_factor" id="reqround_factor" value="<?=$reqround_factor?>">
         <input type="hidden" name="month_retry" id="month_retry" value="<?=$month_retry?>">
         

         </tr>
	  <tr>
              <td align="center"><hr size="1" color="#CCCCCC"><strong><font color="red">** �����š�á�� </font></strong></td>
            </tr>
	   <tr>
        <td width="25%" bgcolor="#6699FF"><strong><font color="#FFFFFF"> �������Թ��� : <font color=red><b>(*)</b></font></font></strong></td>
        <td  height="25"  bgcolor="#FFFFFF">
		
		<select id="loantype_code" name="loantype_code" onchange="onChangeLoanType(this);submitForm(this)">
		  <?php 
                  
                               /* if($member_type == "1"){

                                    $strSQL="select * from lnloantype where loantype_code in ('21','11','12','19','73') order by loantype_code";

                                }   else if ($member_type == "2"){

                                    $strSQL="select * from lnloantype where loantype_code in ('17','22') order by loantype_code";
                                }        */ 
                  
                  $strSQL="select loantype_code , loantype_desc , 1 as sort 
                            from 
                            lnloantype 
                            where 
                            loantype_code 
                            in ('11','12','17','19','21','22','73')
                            union
                            select '','-- ��س����͡�������Թ��� --',0 from dual
                            order by sort,loantype_code";
                  
				
				$value = array('LOANTYPE_CODE','LOANTYPE_DESC');
				 list($Num_Rows_,$list_info_) = get_value_many_oci($strSQL,$value); 
						
				$j=0;
				for($i=0;$i<$Num_Rows_;$i++){
					$loantype_code=$list_info_[$i][$j++];
					$loantype_desc=$list_info_[$i][$j++];
					$j=0;
					?>
                    <?php if($loantype_code == ""){?>
                      
                    <option value="<?=$loantype_code?>" <?=$_REQUEST["loantype_code"]==$loantype_code?"selected":""?> ><?=$loantype_desc?></option>
                        
                    <?php } else{ ?>
                    
			<option value="<?=$loantype_code?>" <?=$_REQUEST["loantype_code"]==$loantype_code?"selected":""?> ><?=$loantype_code?>:<?=$loantype_desc?></option>
                        
                    <?php } ?>
		  <?php } ?>	
		</select></td>
        <td width="25%" bgcolor="#6699FF"><strong><font color="#FFFFFF"> �Ţ���㺤Ӣ� : </font></strong></td>
        <td  height="25"  bgcolor="#FFFFFF"><input type="hidden" name="loanreq_docno" id="loanreq_docno" value="<?=$_REQUEST["loanreq_docno"]?>"  ><?=$_REQUEST["loanreq_docno"]?></td>
      </tr>
	  <tr>
	  <td width="25%"   bgcolor="#6699FF"><strong><font color="#FFFFFF"> �Թ��͹ : <font color=red><b>(*)</b></font></font></strong></td>
        <td  height="25" bgcolor="#FFFFFF" >
            
            <?php $_REQUEST["salary_amt"] = str_replace(",","",$_REQUEST["salary_amt"]); ?>
            
            <input type="text" name="salary_amt" id="salary_amt" value="<?=number_format($_REQUEST["salary_amt"],2)?>" size=8  style="background-color:yellow;width: 196px;" onchange="submitForm(this)" > (�ҷ)</td>
        
        <td width="25%" bgcolor="#6699FF"><strong><font color="#FFFFFF"> ��¹��� : </font></strong></td>
         <td  height="25"  bgcolor="#FFFFFF"><input type="text" name="at_write" id="at_write" value="<?=$_REQUEST["membgroup_desc"]?>" size=8  style="background-color:yellow;width: 141px;" ></td>
        
        
        </tr>
        <tr>
		 <td width="25%" bgcolor="#6699FF"><strong><font color="#FFFFFF"> ʶҹ� : </font></strong></td>
        <td  height="25"  bgcolor="#FFFFFF">
		<input type="hidden" name="loanrequest_status" id="loanrequest_status" value="<?=$_REQUEST["loanrequest_status"]?>"  >
		<?php
			if($_REQUEST["loanrequest_status"]==0){
				echo "0:���׹�ѹ";
		    }else if($_REQUEST["loanrequest_status"]==8){
				echo "8:ŧ�Ѻ";
		    }else if($_REQUEST["loanrequest_status"]==1){
				echo "1:͹��ѵ�";
		    }else {
				echo "-9:¡��ԡ";
			}
			?>
		</td>
	  </tr>
      <tr><td width="25%" bgcolor="#6699FF"><strong><font color="#FFFFFF"> �ѵ�ػ��ʧ�� : <font color=red><b>(*)</b></font></font></strong></td>
        <td  height="25"  bgcolor="#FFFFFF" colspan="3"><input type="text" name="objective_desc" id="objective_desc" value="<?=$_REQUEST["objective_desc"]?>"  style="background-color:yellow;width:619px;"  ></td>
      </tr>
      <tr>
        <td width="25%"   bgcolor="#6699FF"><strong><font color="#FFFFFF"> ������觤׹�ѹ��� : <font color=red><b>(*)</b></font></font></strong></td>
        <td  height="25" bgcolor="#FFFFFF" ><input type="text" name="startpay_date" id="startpay_date" value="<?=$_REQUEST["startpay_date"]?>" size=8 style="width: 196px;"> (dd/mm/yyyy)  </td>
		    <td width="25%"   bgcolor="#6699FF"><strong><font color="#FFFFFF"> �ѵ�Ҵ͡���� : </font></strong></td>
        <td  height="25" bgcolor="#FFFFFF" ><input type="hidden" name="loan_rate" id="loan_rate" value="<?=$_REQUEST["loan_rate"]?>" > <?=$_REQUEST["loan_rate"]*100?>(������)</td>
      </tr>
      <tr>
    
        <td width="25%" bgcolor="#6699FF"><strong><font color="#FFFFFF"> ǧ�Թ����ا�ش : </font></strong></td>
        <td  height="25"  bgcolor="#FFFFFF"><input type="hidden" name="loanreqmax_amt" id="loanreqmax_amt" value="<?=$_REQUEST["loanreqmax_amt"]?>"  ><?=number_format($_REQUEST["loanreqmax_amt"],2)?> (�ҷ)</td>
		 <td width="25%" bgcolor="#6699FF"><strong><font color="#FFFFFF"> �ӹǹ�Ǵ�٧�ش : </font></strong></td>
        <td  height="25"  bgcolor="#FFFFFF"><input type="hidden" name="period_max" id="period_max" value="<?=$_REQUEST["period_max"]?>"  > <?=$_REQUEST["period_max"]?> (�Ǵ)</td>
      </tr>
      <tr>
        <!--<td width="25%"   bgcolor="#6699FF"><strong><font color="#FFFFFF"> ��ê��� : <font color=red><b>(*)</b></font></font></strong></td>
        <td  height="25" bgcolor="#FFFFFF" ><? //=$_REQUEST["loanpayment_type"]?> -->
		 
		<!--<select id="loanpayment_type" name="loanpayment_type" style="background-color:yellow;" onchange="submitForm(this)">
		   <option value="1" <?//=($_REQUEST["loanpayment_type"]==1?"selected":"")?> style="background-color:yellow;">1:����</option>
		   <option value="2" <?//=($_REQUEST["loanpayment_type"]==2?"selected":"")?> style="background-color:yellow;">2:���ʹ</option>
	    </select></td>-->
       
      </tr>
      <tr>
        <td width="25%" bgcolor="#6699FF"><strong><font color="#FFFFFF"> ǧ�Թ�͡�� : <font color=red><b>(*)</b></font></font></strong></td>

          <?php $_REQUEST["loanrequest_amt"] = str_replace(",","",$_REQUEST["loanrequest_amt"]); ?>
		
        <td  height="25"  bgcolor="#FFFFFF"><input type="text" name="loanrequest_amt" id="loanrequest_amt" value="<?=  number_format($_REQUEST["loanrequest_amt"],2)?>"  size=8  style="background-color:yellow;width: 196px;" onchange="submitForm(this)"> (�ҷ)</td>
        <td width="25%"   bgcolor="#6699FF"><strong><font color="#FFFFFF"> �ӹǹ�Ǵ���͡�� : <font color=red><b>(*)</b></font></font></strong></td>
        <td  height="25" bgcolor="#FFFFFF" ><input type="text" name="period" id="period" value="<?=$_REQUEST["period"]?>"  size=8  style="background-color:yellow;width: 138px;"  onchange="submitForm(this)">(�Ǵ)</td>
      </tr>
      <tr>
        <td width="25%"   bgcolor="#6699FF"><strong><font color="#FFFFFF"> ���е�ͧǴ : </font></strong></td>
        <td  height="25" bgcolor="#FFFFFF" id="period_payment2"><input type="hidden" name="period_payment" id="period_payment" value="<?=$_REQUEST["period_payment"]?>"  ><?=number_format($_REQUEST["period_payment"],2)?> (�ҷ)</td>
        <input type="hidden" name="p" id="p" value="<?=$_REQUEST["p"]?>"  >
        <td width="25%" bgcolor="#6699FF"><strong><font color="#FFFFFF"> �Ţŧ�Ѻ : </font></strong></td>
        <td  height="25"  bgcolor="#FFFFFF"><input type="hidden" name="noticedoc_no" id="noticedoc_no" value="<?=$_REQUEST["noticedoc_no"]?>"  ><?=$_REQUEST["noticedoc_no"]?> </td>
      </tr>
      <tr>
        <td width="25%" bgcolor="#6699FF"><strong><font color="#FFFFFF">��Ҥ��  : <font color=red><b>(*)</b></font></font></strong></td>
        <td  height="25"  bgcolor="#FFFFFF">
		<?php 
		    $strSQL="select * from cmucfbank  where bank_code in ('006','014','030') order by bank_code asc ";
			$value = array('BANK_CODE','BANK_DESC');
			list($Num_Rows,$list_info) = get_value_many_oci($strSQL,$value); ?>
		<select id="expense_bank" name="expense_bank" style="display:;">
		  <?php 
				$j=0;
				for($i=0;$i<$Num_Rows;$i++){
					$expense_code=$list_info[$i][$j++];
					$expense_bank=$list_info[$i][$j++];
					
					if(isset($_REQUEST["expense_bank"])==false){
						  $_REQUEST["expense_bank"]=$expense_bank;
					}
	
					$j=0;
					?>
			<option value="<?=$expense_bank?>" <?=$_REQUEST["expense_bank"]==$expense_bank?"selected":""?> ><?=$expense_bank?></option>
		  <?php } ?>	
		</select>
		</td>
        <td width="25%"   bgcolor="#6699FF"><strong><font color="#FFFFFF"> �ҢҸ�Ҥ��  : <font color=red><b>(*)</b></font></font></strong></td>
        <td  height="25" bgcolor="#FFFFFF" ><input type="text" name="expense_bankbranch" id="expense_bankbranch" value="<?=$_REQUEST["expense_bankbranch"]?>"  size=20  style="background-color:yellow;width: 141px;" ></td>
      </tr>
      <tr>
        <td width="25%" bgcolor="#6699FF"><strong><font color="#FFFFFF">�������ѭ��  : <font color=red><b>(*)</b></font></font></strong></td>
        <td  height="25"  bgcolor="#FFFFFF">	
		<select id="expense_banktype" name="expense_banktype" style="display:;width: 196px;">
		  <?php 
					if(isset($_REQUEST["expense_banktype"])==false){
						  $_REQUEST["expense_banktype"]="�����Ѿ��";
					}
					?>
			<option value="�����Ѿ��" <?=$_REQUEST["expense_banktype"]=="�����Ѿ��"?"selected":""?> >�����Ѿ��</option>
			<option value="�����" <?=$_REQUEST["expense_banktype"]=="�����"?"selected":""?> >�����</option>
		</select>
		</td>
        <td width="25%"   bgcolor="#6699FF"><strong><font color="#FFFFFF"> �Ţ�ѭ�ո�Ҥ��  : <font color=red><b>(*)</b></font></font></strong></td>
        <td  height="25" bgcolor="#FFFFFF" ><input type="text" name="expense_accid" id="expense_accid" value="<?=$_REQUEST["expense_accid"]?>"  size=20  style="background-color:yellow;width: 141px;" maxlength="15" ></td>
      </tr>
	  <tr>
	   <!-- ���ҧ�ѡ�ź -->
	  
	   <tr>
              <td align="center"><hr size="1" color="#CCCCCC"><strong><font color="red">** ��¡���ѡ�ź </font></strong></td>
            </tr>
			  <tr bgcolor="#FFFFFF">
			  
				<td width="25%" align="center" bgcolor="#6699FF"><strong><font color="#FFFFFF">
		 �ѡ�ź </font></strong></td>
				<td width="25%" colspan="2" align="left" bgcolor="#6699FF" style="text-align:center"><strong><font color="#FFFFFF">
		 �Ţ�ѭ�� </font></strong></td>
				<td width="25%" align="center" bgcolor="#6699FF" style="text-align:center"><strong><font color="#FFFFFF">
		 �Թ��餧����� </font></strong></td>
			  </tr>
			  <?php

			  // edit by aum ���֧�Թ���ء�����������������͡�ѡ�ź ��ǹ����������ԧ��Ҥ���� ��� auto ��� �ѡ�ź���
			  
			
                          
                           if($_REQUEST["loantype_code"] == '11'){
                          
			  $strOraCredit = "select * from (
                                                        select 
                                                        loancontract_no , 
                                                        principal_balance ,
                                                        '1' as flag_check,
                                                        loantype_code
                                                        from lncontmaster 
                                                        where contract_status = 1 
                                                        and member_no = '$member_no' 
                                                        and loantype_code in ('11','12','21')
                                                        union
                                                        select 
                                                        loancontract_no , 
                                                        principal_balance ,
                                                        '0' as flag_check,
                                                        loantype_code
                                                        from lncontmaster 
                                                        where contract_status = 1 
                                                        and member_no = '$member_no' 
                                                        and loantype_code not in ('11','12','21')
                                                        ) m order by m.loantype_code";
                         
                          }else if ($_REQUEST["loantype_code"] == '12'){
                                    
                                    $strOraCredit = "select * from (
                                                        select 
                                                        loancontract_no , 
                                                        principal_balance ,
                                                        '1' as flag_check,
                                                        loantype_code
                                                        from lncontmaster 
                                                        where contract_status = 1 
                                                        and member_no = '$member_no' 
                                                        and loantype_code in ('11','12','21','31')
                                                        union
                                                        select 
                                                        loancontract_no , 
                                                        principal_balance ,
                                                        '0' as flag_check,
                                                        loantype_code
                                                        from lncontmaster 
                                                        where contract_status = 1 
                                                        and member_no = '$member_no' 
                                                        and loantype_code not in ('11','12','21','31')
                                                        ) m order by m.loantype_code";
                          
                                    
                          }else if ($_REQUEST["loantype_code"] == '17'){
                                    
                                    $strOraCredit = "select * from (
                                                        select 
                                                        loancontract_no , 
                                                        principal_balance ,
                                                        '1' as flag_check,
                                                        loantype_code
                                                        from lncontmaster 
                                                        where contract_status = 1 
                                                        and member_no = '$member_no' 
                                                        and loantype_code in ('17','22')
                                                        union
                                                        select 
                                                        loancontract_no , 
                                                        principal_balance ,
                                                        '0' as flag_check,
                                                        loantype_code
                                                        from lncontmaster 
                                                        where contract_status = 1 
                                                        and member_no = '$member_no' 
                                                        and loantype_code not in ('17','22')
                                                        ) m order by m.loantype_code";
                          
                                    
                          }else if ($_REQUEST["loantype_code"] == '19'){
                                    
                                    $strOraCredit = "  select 
                                                        loancontract_no , 
                                                        principal_balance ,
                                                        '0' as flag_check,
                                                        loantype_code
                                                        from lncontmaster 
                                                        where contract_status = 1 
                                                        and member_no = '$member_no'
                                                        order by loantype_code";
                          
                                    
                          }else if ($_REQUEST["loantype_code"] == '21'){
                                    
                                    $strOraCredit = "  select * from (
                                                        select 
                                                        loancontract_no , 
                                                        principal_balance ,
                                                        '1' as flag_check,
                                                        loantype_code
                                                        from lncontmaster 
                                                        where contract_status = 1 
                                                        and member_no = '$member_no' 
                                                        and loantype_code = '21'
                                                        union
                                                        select 
                                                        loancontract_no , 
                                                        principal_balance ,
                                                        '0' as flag_check,
                                                        loantype_code
                                                        from lncontmaster 
                                                        where contract_status = 1 
                                                        and member_no = '$member_no' 
                                                        and loantype_code <> '21'
                                                        ) m order by m.loantype_code";
                          
                                    
                          }else if ($_REQUEST["loantype_code"] == '22'){
                                    
                                    $strOraCredit = "  select * from (
                                                        select 
                                                        loancontract_no , 
                                                        principal_balance ,
                                                        '1' as flag_check,
                                                        loantype_code
                                                        from lncontmaster 
                                                        where contract_status = 1 
                                                        and member_no = '$member_no' 
                                                        and loantype_code = '22'
                                                        union
                                                        select 
                                                        loancontract_no , 
                                                        principal_balance ,
                                                        '0' as flag_check,
                                                        loantype_code
                                                        from lncontmaster 
                                                        where contract_status = 1 
                                                        and member_no = '$member_no' 
                                                        and loantype_code <> '22'
                                                        ) m order by m.loantype_code";
                                    
                          }else if ($_REQUEST["loantype_code"] == '73'){
                                    
                                    $strOraCredit = "  select * from (
                                                        select 
                                                        loancontract_no , 
                                                        principal_balance ,
                                                        '1' as flag_check,
                                                        loantype_code
                                                        from lncontmaster 
                                                        where contract_status = 1 
                                                        and member_no = '$member_no' 
                                                        and loantype_code = '73'
                                                        union
                                                        select 
                                                        loancontract_no , 
                                                        principal_balance ,
                                                        '0' as flag_check,
                                                        loantype_code
                                                        from lncontmaster 
                                                        where contract_status = 1 
                                                        and member_no = '$member_no' 
                                                        and loantype_code <> '73'
                                                        ) m order by m.loantype_code";
                                    
                          }
			  
			  $value = array('LOANCONTRACT_NO','PRINCIPAL_BALANCE','FLAG_CHECK','LOANTYPE_CODE');
				list($Num_Rows,$list_info) = get_value_many_oci($strOraCredit,$value);
				$j = 0;
				for($i=0;$i<$Num_Rows;$i++){
					 $loancontract_no = $list_info[$i][$j++];
					 $principal_balance = $list_info[$i][$j++];
                                         $flag_check = $list_info[$i][$j++];
                                         $loantype_code = $list_info[$i][$j++];
				$getoffset = "SELECT LOANCONTACT_NO FROM mdbreqoffset WHERE loanrequest_no = '".$_REQUEST["loanreq_docno"]."' and loancontact_no = '".$loancontract_no."'";
				$result_offset = mysql_query($getoffset);
				$rowoffset = mysql_fetch_assoc($result_offset);
			  ?>
			  <tr bgcolor="#FFFFFF" >
			  <td width="25%">
			  <?php if(isset($rowoffset['LOANCONTACT_NO'])){ ?>
			  <input type="checkbox" style="width: 150px" class="checkbox" name="checkbox1" id="checkbox1" data-loan="<?=$loancontract_no?>" data-amt="<?=$principal_balance?>" checked onclick="return false;">
			  <?php }else{ ?>
                          <?php if($flag_check == "1"){?>
                          <input type="checkbox" style="width: 150px" class="checkbox" name="checkbox1" id="checkbox1" data-loan="<?=$loancontract_no?>" data-amt="<?=$principal_balance?>" checked onclick="return false;">
                          <?php }else{ ?>
                          <input type="checkbox" style="width: 150px" class="checkbox" name="checkbox1" id="checkbox1" data-loan="<?=$loancontract_no?>" data-amt="<?=$principal_balance?>" onclick="return false;">
                          <?php } ?>
			  <?php } ?>
			  </td>
			  <td width="25%" colspan="2"><input type="text" style="width:100%" value="<?=$loancontract_no?>" readonly></td>
                          <td width="25%"><input type="text" style="text-align: right;" value="<?=number_format($principal_balance,2)?>" readonly></td>
			  </tr>
			  <?php 
			  $j=0;
			  } ?>
			  <tr>
              <td align="center"><hr size="1" color="#CCCCCC"><strong><font color="red">** ��¡���ѡ </font></strong></td>
            </tr>
			  <tr bgcolor="#FFFFFF">
			  <td width="25%" align="center" bgcolor="#6699FF"><strong><font color="#FFFFFF">
		 �ӴѺ </font></strong></td>
				<td width="25%" colspan="2" align="center" bgcolor="#6699FF"><strong><font color="#FFFFFF">
		 ��¡���ѡ </font></strong></td>
				<td width="25%" align="center" bgcolor="#6699FF" style="text-align:center"><strong><font color="#FFFFFF">
		 �ʹ�Թ </font></strong></td>
		 <?php
			$getetc = "SELECT * FROM mdbucfetc";
			$result_etc = mysql_query($getetc);
			$etc_c = 1;
			while($row_etc = mysql_fetch_assoc($result_etc)){
				$getoffset_etc = "SELECT paymentetc_amt FROM mdbreqpaymentetc WHERE loanrequest_no = '".$_REQUEST["loanreq_docno"]."' and deception = '".$row_etc['etc_desc']."'";
				$result_offset_etc = mysql_query($getoffset_etc);
				$rowoffsetetc = mysql_fetch_assoc($result_offset_etc);
		 ?>
			  </tr>
			  <tr bgcolor="#FFFFFF">
			  <td width="25%"><center><input type="text" value="<?=$etc_c?>" style="width:100%;text-align: center;" readonly></center></td>
			  <td width="25%" colspan="2"><input type="text" style="width:100%" class="etc" value="<?=$row_etc['etc_desc']?>" data-code="<?=$row_etc['etc_code']?>" readonly></td>
			  <td width="25%">
			  <?php if(isset($rowoffsetetc['paymentetc_amt'])){ ?>
			  <input type="text" style="width:100%;text-align: right;" value="<?= number_format($rowoffsetetc['paymentetc_amt'],2)?>" 
			  class="etc_amt etcformat"data-code2="<?=$row_etc['etc_code']?>" data-desc="<?=$row_etc['etc_desc']?>" data-value="<?= $rowoffsetetc['paymentetc_amt'] ?>"/>
			  <?php }else{ ?>
			  <input type="text" style="width:100%;text-align: right;" 
			  class="etc_amt etcformat" data-code2="<?=$row_etc['etc_code']?>" data-desc="<?=$row_etc['etc_desc']?>">
			  <?php } ?>
			  </td>
			  </tr>
			  <?php 
			  $etc_c++;
			  } ?>
			    <tr>
              <td align="center"><hr size="1" color="#CCCCCC"><strong><font color="red">** Ṻ��ѡ�ҹ������� </font></strong></td>
            </tr>
      <tr>
        <td width="25%" align="left" bgcolor="#6699FF"><strong><font color="#FFFFFF">
		 �͡���Ṻ : </font></strong></td>
        <td  height="25" align="left" bgcolor="#FFFFFF" colspan="3"> 
		<?php
				
			  
			 //print_r($filesList);
				
			  $strSQL_="select * from  mdbucfreqfiles u
								where u.loantype_code='".$_REQUEST["loantype_code"]."' 
								order by u.reqfiletype_code asc ";
			  //echo 	$strSQL_;			
			  $filesListUpload=array();		
			  $objQuery_ = mysql_query($strSQL_) ;
			  $numrows_=mysql_num_rows($objQuery_);
			  $numrows_a=0;
			  $i=0;
			  while($q = mysql_fetch_array($objQuery_)){					   
		  ?>
      <li>
	  <?=$q["reqfiletype_desc"]?> <font color="red">(upload ��Ҵ���������Թ 500kb)</font>
          
       
	  <?php
			$strSQL_="select * from  mdbreqloanfiles f
								where loantype_code='".$_REQUEST["loantype_code"]."' 
								and reqfiletype_code='".$q["reqfiletype_code"]."'  
								and loanreq_docno='".$_REQUEST["loanreq_docno"]."'
								order by reqfiletype_code asc ";
			  //echo 	$strSQL_;				
			 $objQuery__ = mysql_query($strSQL_) ;
             $q_ = mysql_fetch_array($objQuery__);
			 $target_dir = $q_["filename"];
			  if(file_exists($target_dir)){ 
			  $numrows_a++;
			  ?>
			   <a href="<?=$target_dir?>" target="_blank" ><font color=blue><b>Download</b></font></a>
			  |<a href="?menu=LoanRequest&action=delete&loanreq_docno=<?=$_REQUEST["loanreq_docno"]?>&save_mode=<?=$_REQUEST["save_mode"]?>&reqfiletype_code=<?=$_REQUEST["reqfiletype_code"]?>&filename=<?=$target_dir?>" 
				onclick="return confirm('�׹�ѹ���ź�͡���')" ><font color=red><b>ź</b></font></a>
			  <?php } ?>
			  <input type="hidden" value="<?=$member_no?>" id="member_no">
		   <input type="file" <?php  if($_REQUEST["save_mode"]!="update"){ ?>  <?php } ?> name="<?="file".$_REQUEST["loanreq_docno"].$q["reqfiletype_code"]?>" id="<?="file".$_REQUEST["loanreq_docno"].$q["reqfiletype_code"]?>" onclick="return checkCanUpload(this);"></li>
		  <?php 
             $filesListUpload[$i++]= $target_dir;
			 }
			 
			 
			$target_dir_root = "uploads/";
			$target_dir_root = $target_dir_root.$member_no."/";
			$target_dir_root = $target_dir_root.$_REQUEST["loanreq_docno"]."/";
			if(file_exists($target_dir_root)==false)
			@mkdir($target_dir_root);
			$filesList = @array_slice(@scandir($target_dir_root ), 2);
			 
			$k=0;
			$filesListUploadClear=array();		
			for($i=0;$i<count($filesList);$i++){
				$found=false;
				for($j=0;$j<count($filesListUpload);$j++){
					if(strpos($filesListUpload[$j],$filesList[$i])!== false){
						$found=true;
					}
				}
				if($found==false){
				   $filesListUploadClear[$k++]=$filesList[$i];
				   //echo $k.")".$filesListUploadClear[$k-1]."<br/>";
				   unlink($target_dir_root.$filesListUploadClear[$k-1]);
				}
			}
			
			if($numrows_a<$numrows_){
				?>
				<!--<script>alert("��ҹ�ѧ�����Ṻ��ѡ�ҹ��Сͺ��úѹ�֡�Ӣ͡�����ú��ǹ������͹䢷���˹�");</script>-->
				<br/><font color=red><b>��ҹ�ѧ�����Ṻ��ѡ�ҹ��Сͺ��úѹ�֡�Ӣ͡�����ú��ǹ������͹䢷���˹� <b></font>
				<?php 
			}				
			//print_r($filesListUploadClear);	 
	  ?>   
		</td>
      </tr>
      <tr>
        <td width="25%"   bgcolor="#6699FF"><strong><font color="#FFFFFF"> �����˵� : </font></strong></td>
        <td  height="25" bgcolor="#FFFFFF" ><input type="text" name="remark" id="remark" value="<?=$_REQUEST["remark"]?>"  size="30" style="width: 315px;"> </td>		
        <td width="25%" bgcolor="#6699FF"><strong><font color="#FFFFFF"> �ѹ����Ѻ��ا : </font></strong></td>
        
       <?php // �֧�������ѹ��� now() mysql
        
        $strSQL_now ="select concat(concat(concat(concat(substr(date_format(now(),'%d/%m/%Y'),1,2),'/'),substr(date_format(now(),'%d/%m/%Y'),4,2)),'/'),substr(date_format(now(),'%d/%m/%Y'),7,4) +543) as date_now";
  $objQuery_now = mysql_query($strSQL_now) or die ("Error Query [".$strSQL_now."]");
  $numrows_now =mysql_num_rows($objQuery_now);
  $i=0;
  if($numrows_now >0){

while($q = mysql_fetch_array($objQuery_now)){
			
			$date_now			=		$q['date_now'];
			

  
        
        
         ?>
        
        <td  height="25" bgcolor="#FFFFFF"><input type="hidden" name="update_date" id="update_date" value="<?=$_REQUEST["update_date"]?>"  ><?php echo $date_now; ?></td>
        
<?php }
  } ?>
        
      </tr>
	  <?php 
	    
		 if($_REQUEST["loantype_code"]=="11"){
			 
			 
	    $loanrequest_amt = $_REQUEST["loanrequest_amt"]; 
		
		if($loanrequest_amt == 0){
			
		    $collmax=0;	
			
		}else if($loanrequest_amt <= 1400000){ // ત�ӹǹ����� �������Թ 1400000 �餹��� 2 ��
			
			$collmax=2;
			
		}else if ($loanrequest_amt > 1400000 && $loanrequest_amt <= 2000000){ // ������������ҧ 1400001 - 2000000 �餹��� 3 ��
			
			$collmax=3;
			
		}else{
			
			$collmax=0;
			
		}

			$strSQL="
			CREATE TABLE if not exists `mdbreqloancoll` (
			  `loanreq_docno` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
			  `loantype_code` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
			  `member_no` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
			  `seq_no` decimal(10,0) NOT NULL,
			  `collmemb_no` varchar(10) COLLATE utf8mb4_unicode_ci ,
			  `collmemb_name` varchar(150) COLLATE utf8mb4_unicode_ci ,
			  `collworkplace` varchar(150) COLLATE utf8mb4_unicode_ci ,
			  `collposition_desc` varchar(150) COLLATE utf8mb4_unicode_ci ,
			  `collhavemore_flag` varchar(10) COLLATE utf8mb4_unicode_ci  
			   ,PRIMARY KEY (loanreq_docno,loantype_code,member_no,seq_no)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
			 mysql_query($strSQL) ;
					 
			 $strSQL="alter table mdbreqloancoll add ( collrefmembno varchar(50),collrefmembname varchar(150)) ";
			 mysql_query($strSQL) ;
			 
			for($c=1;$c<=$collmax;$c++){ 
			 
			if($_REQUEST["saveBtn"]!=""){
                            
                            
				
			  $strSQL="delete from mdbreqloancoll where loanreq_docno='".$_REQUEST["loanreq_docno"]."' ";
			  mysql_query($strSQL) ;
			  
					for($c=1;$c<=$collmax;$c++){ 
					if($_REQUEST["coll".$c."mem_no"] != "00000000" && $_REQUEST["coll".$c."mem_no"] != ""){
					
							$strSQL="insert into mdbreqloancoll  (loanreq_docno,loantype_code,member_no,seq_no,
										  collmemb_no,collmemb_name,collworkplace,collposition_desc,collhavemore_flag,collrefmembname,collrefmembno)values 
										  ('".$_REQUEST["loanreq_docno"]."','".$_REQUEST["loantype_code"]."','".$_REQUEST["member_no"]."','".$c."' ,
									      '".$_REQUEST["coll".$c."mem_no"]."' ,
									      '".$_REQUEST["coll".$c."mem_nm"]."' ,
									      '".$_REQUEST["coll".$c."workplace"]."' ,
									      '".$_REQUEST["coll".$c."position"]."' ,
									      '".$_REQUEST["coll".$c."havemoreflag"]."',
									      '".$_REQUEST["coll".$c."refmembname"]."',
									      '".$_REQUEST["coll".$c."refmembno"]."')";
							mysql_query($strSQL) ;		
							//echo $strSQL.";<br/>";		
						}
					}
					
				
			  $strSQL="select * from mdbreqloancoll where loanreq_docno='".$_REQUEST["loanreq_docno"]."' order by seq_no asc";
			  $objQuery__ = mysql_query($strSQL) ;
			  
			  $i=1;
			  while($q = mysql_fetch_array($objQuery__)){		
 			  
			    $_REQUEST["coll".$i."mem_no"]=$q['collmemb_no'];
			    $_REQUEST["coll".$i."mem_nm"]=$q['collmemb_name'];
			    $_REQUEST["coll".$i."workplace"]=$q['collworkplace'];
			    $_REQUEST["coll".$i."position"]=$q['collposition_desc'];
			    $_REQUEST["coll".$i."havemoreflag"]=$q['collhavemore_flag'];
			    $_REQUEST["coll".$i."refmembname"]=$q['collrefmembname'];
			    $_REQUEST["coll".$i."refmembno"]=$q['collrefmembno'];
				
                            $_REQUEST["Coll".$i."name"]= $_REQUEST["coll".$i."mem_nm"];
                            $_REQUEST["Mem".$i."no"]= $_REQUEST["coll".$i."mem_no"];
                            $_REQUEST["Work".$i."place"]= $_REQUEST["coll".$i."workplace"];
                            $_REQUEST["Position".$i."desc"]= $_REQUEST["coll".$i."position"];
                            $_REQUEST["Havemore".$i."coll"] = $_REQUEST["coll".$i."havemoreflag"];
                            $_REQUEST["Coll".$i."refmembname"] = $_REQUEST["coll".$i."refmembname"];
                            $_REQUEST["Coll".$i."refmembno"] = $_REQUEST["coll".$i."refmembno"];
				$i++;
			  }                       
			}
			
		  ?> 
<tr>
              <td align="center"><hr size="1" color="#CCCCCC"><strong><font color="red">** ��ǹ��ӻ�Сѹ </font></strong></td>
            </tr>		  
	  <tr>
	  <td colspan="4">		  
	  <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
	  <tr>
		<td bgcolor="#CCCCCC"><table width="100%" border="0" cellspacing="1" cellpadding="3">
		  <tr>
			<td align="center" bgcolor="#6699FF"><strong><font color="#FFFFFF">�ӴѺ�����</font></strong></td>
			<td align="center" bgcolor="#6699FF"><strong><font color="#FFFFFF">�Ţ����¹��Ҫԡ�����</font></strong></td>
			<td align="center" bgcolor="#6699FF"><strong><font color="#FFFFFF">����-ʡ�ż����</font></strong></td>
			<td align="center" bgcolor="#6699FF"><strong><font color="#FFFFFF">�ѧ�Ѵ</font></strong></td>
			<td align="center" bgcolor="#6699FF"><strong><font color="#FFFFFF">���˹觼����</font></strong></td>
			<td align="center" bgcolor="#6699FF"><strong><font color="#FFFFFF">�ѧ�������Ф���ѭ������</font></strong></td>
		  </tr>
		  <?php 
		  
              
                  
		  for($c=1;$c<=$collmax;$c++){
			  if(isset($_REQUEST["coll".$c."havemoreflag"])==false){
				  $_REQUEST["coll".$c."havemoreflag"]="-";
			  }
                          
                          
			  $_REQUEST["coll".$c."mem_no"]=GetFormatMember($_REQUEST["coll".$c."mem_no"]);
			  //$strSQL="select s.sharestk_amt*st.unitshare_value as  sharestk_amt,s.last_period from shsharemaster  s,shsharetype st where st.sharetype_code=s.sharetype_code and s.member_no ='".$member_no."' ";
			   //echo $strSQL;
			   $strSQL="select p.prename_desc||' '||m.memb_name||' '||m.memb_surname as memb_fullname 
							 ,g.membgroup_desc ,mup.position_desc ,m.member_no,s.last_period,m.resign_status,
							 (select count(l.member_no) as cnt from lncontmaster l,lncontcoll lc  where l.loancontract_no=lc.loancontract_no and l.contract_status=1 and lc.coll_status=1 and lc.ref_collno=m.member_no ) as collrefmembnocnt ,
							 (select l.member_no from lncontmaster l,lncontcoll lc  where l.loancontract_no=lc.loancontract_no and l.contract_status=1 and lc.coll_status=1 and lc.ref_collno=m.member_no and rownum=1) as collrefmembno ,
							 (select pp.prename_desc||' '||mm.memb_name||' '||mm.memb_surname as memb_fullname  from lncontmaster l,lncontcoll lc ,mbmembmaster mm,mbucfprename pp where  pp.prename_code=mm.prename_code and mm.member_no=l.member_no and l.loancontract_no=lc.loancontract_no and l.contract_status=1 and lc.coll_status=1 and lc.ref_collno=m.member_no and rownum=1) as collrefmembname 
			                 from mbmembmaster m,mbucfprename p ,mbucfmembgroup g ,shsharemaster  s,shsharetype st , mbucfposition mup
							 where  m.prename_code=p.prename_code(+) and m.membgroup_code=g.membgroup_code(+) and st.sharetype_code=s.sharetype_code(+) and s.member_no = m.member_no  
							 and m.member_no= '".$_REQUEST["coll".$c."mem_no"]."' and m.position_code = mup.position_code(+) and  m.resign_status = 0 ";
			 //echo $strSQL;
			  $value = array('MEMB_FULLNAME','MEMBGROUP_DESC','POSITION_DESC','COLLREFMEMBNO','COLLREFMEMBNAME','LAST_PERIOD','RESIGN_STATUS','COLLREFMEMBNOCNT');
		      list($Num_Rows_,$list_info_) = get_value_many_oci($strSQL,$value); 
			  $_REQUEST["coll".$c."mem_nm"]=$list_info_[0][0];
			  if(($_REQUEST["coll".$c."workplace"])=="")
			  $_REQUEST["coll".$c."workplace"]=$list_info_[0][1];
			  if(($_REQUEST["coll".$c."position"])=="")
			  $_REQUEST["coll".$c."position"]=$list_info_[0][2];
			  $_REQUEST["coll".$c."refmembno"]=$list_info_[0][3];
			  $_REQUEST["coll".$c."refmembname"]=$list_info_[0][4];
			  $_REQUEST["coll".$c."last_period"]=$list_info_[0][5];
			  $_REQUEST["coll".$c."resign_status"]=$list_info_[0][6];
			  $_REQUEST["coll".$c."refmembnocnt"]=$list_info_[0][7];
			  $collrefmembno_coll=$_REQUEST["coll".$c."mem_no"]; 
			  settype($collrefmembno_coll,"double");
			 
			  if( $collrefmembno_coll>0&&$_REQUEST["coll".$c."resign_status"]=="1"){ // �ó���Ҫԡ���Ф�����͡
				   
				   echo "<script>alert(' ����� ��͡��¡�ü���� ��Ҫԡ �Ţ��� ".$_REQUEST["coll".$c."mem_no"]." �������ö����� ���ͧ���� ���͡���� ');</script>";
                                   
                   $_REQUEST["coll".$c."mem_no"] = "00000000";
				   $_REQUEST["coll".$c."mem_nm"]="";
				   $_REQUEST["coll".$c."refmembname"]="";
				   $_REQUEST["coll".$c."workplace"] = "";
				   $_REQUEST["coll".$c."position"] = "";
			  }
                          
                          
                          $strSQL_usemangrt ="select nvl(usemangrt_status,0) as usemangrt_status from lnloantype where loantype_code = '11'";
                          $value_usemangrt = array('USEMANGRT_STATUS');
                          list($Num_Rows_usemangrt,$list_info_usemangrt) = get_value_many_oci($strSQL_usemangrt,$value_usemangrt); 
                          $usemangrt_status =$list_info_usemangrt[0][0];	
                          
                          
                          if($collrefmembno_coll > 0 && $usemangrt_status == 0){ // �礤�Ҥ��������Թ�����������ѭ͹حҵ���餹����������
				  
				   echo "<script>alert('�Թ��������������͹حҵ���餹���');</script>";
			  }
                          
                          $strSQL_c_member_no ="select count(member_no) as count_member_no from mbmembmaster where member_no = '".$_REQUEST["coll".$c."mem_no"]."'";
                          $value_c_member_no = array('COUNT_MEMBER_NO');
                          list($Num_Rows_c_member_no,$list_info_c_member_no) = get_value_many_oci($strSQL_c_member_no,$value_c_member_no); 
                          $count_member_no =$list_info_c_member_no[0][0];
                          
                         
			  if($collrefmembno_coll > 0 && $count_member_no == 0){
				  
				   echo "<script>alert(' ����� ��͡��¡�ü���� ��Ҫԡ �Ţ��� ".$_REQUEST["coll".$c."mem_no"]." ��辺��Ҫԡ��¹��㹰ҹ������ ');</script>";
                                   
                   $_REQUEST["coll".$c."mem_no"] = "00000000";
				   $_REQUEST["coll".$c."mem_nm"]="";
				   $_REQUEST["coll".$c."refmembname"]="";
				   $_REQUEST["coll".$c."workplace"] = "";
				   $_REQUEST["coll".$c."position"] = "";
			  }
                          
                          
                          $strSQL_drop ="select dropgurantee_flag from mbmembmaster where member_no = '".$_REQUEST["coll".$c."mem_no"]."'";
                          $value_drop = array('DROPGURANTEE_FLAG');
                          list($Num_Rows_drop,$list_info_drop) = get_value_many_oci($strSQL_drop,$value_drop); 
                          $dropgurantee_flag =$list_info_drop[0][0];
                          
                           
			  if($collrefmembno_coll > 0 && $dropgurantee_flag == 1){
				   
				   echo "<script>alert(' ����� ��͡��¡�ü���� ��Ҫԡ �Ţ��� ".$_REQUEST["coll".$c."mem_no"]." ��Ҫԡ����ӻ�Сѹ ');</script>";
                                   
                                   $_REQUEST["coll".$c."mem_no"] = "00000000";
				   $_REQUEST["coll".$c."mem_nm"]="";
				   $_REQUEST["coll".$c."refmembname"]="";
				   $_REQUEST["coll".$c."workplace"] = "";
				   $_REQUEST["coll".$c."position"] = "";
			  }
                          
                          $strSQL_retry ="select 
                                to_number(ft_calage(sysdate,retry_date,8 )) as retry_age
                            from mbmembmaster,                                        
                                mbucfprename                                
                            where  mbmembmaster.prename_code = mbucfprename.prename_code 
                            and mbmembmaster.member_no = '".$_REQUEST["coll".$c."mem_no"]."'";
                          $value_retry = array('RETRY_AGE');
                          list($Num_Rows_retry,$list_info_retry) = get_value_many_oci($strSQL_retry,$value_retry); 
                          $retry_age =$list_info_retry[0][0];
                          
                          if($collrefmembno_coll > 0 && $retry_age < $_REQUEST["period"] && $retry_age != "" ){
				  
				   echo "<script>alert(' ����� ��͡��¡�ü���� ��Ҫԡ �Ţ��� ".$_REQUEST["coll".$c."mem_no"]." �Ǵ��ӻ�Сѹ���¡��ҧǴ��� ');</script>";
                                   
                                   /*$_REQUEST["coll".$c."mem_no"] = "00000000";
				   $_REQUEST["coll".$c."mem_nm"]="";
				   $_REQUEST["coll".$c."refmembname"]="";
				   $_REQUEST["coll".$c."workplace"] = "";
				   $_REQUEST["coll".$c."position"] = "";*/
			  }
			  
			   if($_REQUEST["coll".$c."mem_no"] == $member_no){
				   
				   if($_REQUEST["coll".$c."mem_no"] != "00000000"){
				   
				   echo "<script>alert('�Ţ����¹�����Ţ������Ţ���ǡѹ');</script>";
				   $_REQUEST["coll".$c."mem_no"] = "00000000";
				   $_REQUEST["coll".$c."mem_nm"]="";
				   $_REQUEST["coll".$c."refmembname"]="";
				   $_REQUEST["coll".$c."workplace"] = "";
				   $_REQUEST["coll".$c."position"] = "";
				   
				   }
				   
			   }
			   
			   
			   
			   if($collmax == 2){
				   
				$a = 1;
			    $b = 2;
				
				if($_REQUEST["coll".$a."mem_no"] == $_REQUEST["coll".$b."mem_no"]){
				   
				   if($_REQUEST["coll".$a."mem_no"] != "00000000" && $_REQUEST["coll".$b."mem_no"] != "00000000" && $_REQUEST["coll".$a."mem_no"] != "" && $_REQUEST["coll".$b."mem_no"] != ""){
					   
				   echo "<script>alert('�Ţ��Ӥ���ӡѹ��س����͡���������1');</script>";
				   $_REQUEST["coll".$b."mem_no"] = "00000000";
				   $_REQUEST["coll".$b."mem_nm"]="";
				   $_REQUEST["coll".$b."refmembname"]="";
				   $_REQUEST["coll".$b."workplace"] = "";
				   $_REQUEST["coll".$b."position"] = "";
				   
				   }
				   
				
			   }
				  
			   }else if ($collmax == 3){
				 
				$a = 1;
			    $b = 2;
				$d = 3;

                   if($_REQUEST["coll".$a."mem_no"] == $_REQUEST["coll".$b."mem_no"]){
				   
				  if($_REQUEST["coll".$a."mem_no"] != "00000000" && $_REQUEST["coll".$b."mem_no"] != "00000000" && $_REQUEST["coll".$a."mem_no"] != "" && $_REQUEST["coll".$b."mem_no"] != ""){
					   
					      echo "<script>alert('�Ţ��Ӥ���ӡѹ��س����͡���������2');</script>";
				   $_REQUEST["coll".$b."mem_no"] = "00000000";
				   $_REQUEST["coll".$b."mem_nm"]="";
				   $_REQUEST["coll".$b."refmembname"]="";
				   $_REQUEST["coll".$b."workplace"] = "";
				   $_REQUEST["coll".$b."position"] = "";
				   }
				   
				
			   }else if ($_REQUEST["coll".$a."mem_no"] == $_REQUEST["coll".$d."mem_no"]){
				   
				   if($_REQUEST["coll".$a."mem_no"] != "00000000" && $_REQUEST["coll".$d."mem_no"] != "00000000" && $_REQUEST["coll".$a."mem_no"] != "" && $_REQUEST["coll".$d."mem_no"] != ""){
					   
					      echo "<script>alert('�Ţ��Ӥ���ӡѹ��س����͡���������3');</script>";
				   $_REQUEST["coll".$d."mem_no"] = "00000000";
				   $_REQUEST["coll".$d."mem_nm"]="";
				   $_REQUEST["coll".$d."refmembname"]="";
				   $_REQUEST["coll".$d."workplace"] = "";
				   $_REQUEST["coll".$d."position"] = "";
				   }
			   }
			   else if ($_REQUEST["coll".$b."mem_no"] == $_REQUEST["coll".$d."mem_no"]){
				   
				  /* echo "A".$_REQUEST["coll".$b."mem_no"]; echo "<br>";
				   echo "B".$_REQUEST["coll".$d."mem_no"];*/
				   
						if($_REQUEST["coll".$b."mem_no"] != "00000000" && $_REQUEST["coll".$d."mem_no"] != "00000000" && $_REQUEST["coll".$b."mem_no"] != "" && $_REQUEST["coll".$d."mem_no"] != ""){
					   
					     echo "<script>alert('�Ţ��Ӥ���ӡѹ��س����͡���������4');</script>";
				   $_REQUEST["coll".$d."mem_no"] = "00000000";
				   $_REQUEST["coll".$d."mem_nm"]="";
				   $_REQUEST["coll".$d."refmembname"]="";
				   $_REQUEST["coll".$d."workplace"] = "";
				   $_REQUEST["coll".$d."position"] = "";
				   }				   
			   }				
				   
			   }
			   
			   
			   
			  /* echo "1".$_REQUEST["coll".$a."mem_no"]; echo '<br>';
			   echo "2".$_REQUEST["coll".$a."mem_no"]; echo '<br>';
			   echo "3".$_REQUEST["coll".$d."mem_no"]; */
			   
			   
			   
    
		  ?>
		  <tr>
			<td align="center" ><strong><font color="#FFFFFF"><input type="text" name="coll<?=$c?>seq_no" id="coll<?=$c?>seq_no" value="<?=$c?>"  size="5" style="text-align: center;" readonly></font></strong></td>
			<td align="center" ><strong><font color="#FFFFFF"><input type="text" name="coll<?=$c?>mem_no" id="coll<?=$c?>mem_no" value="<?=$_REQUEST["coll".$c."mem_no"]?>"  size="10" style="text-align: center;" onchange="submitForm(this)" ></font></strong></td>
			<td align="center" ><strong><font color="#FFFFFF"><input type="text" name="coll<?=$c?>mem_nm" id="coll<?=$c?>mem_nm" value="<?=$_REQUEST["coll".$c."mem_nm"]?>"  size="18" readonly></font></strong></td>
			<td align="center" ><strong><font color="#FFFFFF"><input type="text" name="coll<?=$c?>workplace" id="coll<?=$c?>workplace" value="<?=$_REQUEST["coll".$c."workplace"]?>"  size="15"></font></strong></td>
			<td align="center" ><strong><font color="#FFFFFF"><input type="text" name="coll<?=$c?>position" id="coll<?=$c?>position" value="<?=$_REQUEST["coll".$c."position"]?>"  size="15"></font></strong></td>
			<td align="center" ><strong><font color="#FFFFFF">
			<input type="hidden" name="coll<?=$c?>havemoreflag" id="coll<?=$c?>havemoreflag" value="<?=$_REQUEST["coll".$c."havemoreflag"]?>"  >
			<input type="hidden" name="coll<?=$c?>refmembno" id="coll<?=$c?>refmembno" value="<?=$_REQUEST["coll".$c."refmembno"]?>"  >
			<input type="text" name="coll<?=$c?>refmembname" id="coll<?=$c?>refmembname" value="<?=$_REQUEST["coll".$c."refmembname"]?>"  size="18" readonly></font></strong></td>
		  </tr>
		  <?php 
		  }
		}
		  ?>
	  </table>
	  </td>
	  </tr>
	  <?php } ?>
	  
	  <tr>
              <td align="center"><hr size="1" color="#CCCCCC"><strong><font color="red">** ���͹� / 㺤Ӣ� </font></strong></td>
            </tr>
	  
      <tr style="display:<?php if($_REQUEST["save_mode"]=="update"){?>none<?php } ?>;">
	  
	  <?php //echo "LoanRequestAccept".$_REQUEST["loantype_code"]; ?>
	  
        <td  height="25" bgcolor="#FFFFFF" colspan="4" ><iframe src="LoanRequestAccept<?=$_REQUEST["loantype_code"]?>.html" width="100%" height="150"></iframe></td>
      </tr>
	 
	  <?php if($loanrequest_valid_flag){ ?>
      <tr>
        <td bgcolor="#FFFFFF" colspan="4" align="center">
		<input type="checkbox" id="accept_policy" name="accept_policy" value="1" <?php if($_REQUEST["save_mode"]=="update"){?>checked<?php }else { echo "";} ?> style="display:<?php if($_REQUEST["save_mode"]=="update"){?>none<?php } ?>;" /><?php if($_REQUEST["save_mode"]!="update"){?> ����Ѻ���͹� <br/><br/><?php } ?>
		<font color=red>* ��������´���ѹ�֡�㺤Ӣ͹���ͧ��ҹ��� ��Ǩ�ͺ�Է��� �ҡ���˹�ҷ���ˡó� �ա���� <br/>������㺤Ӣͷ��ѹ�֡�� ���� �׹�ѹ��� �ˡó���׹�ѹ �������� �����������´���ѹ�֡��� </font><br/><br/>
		<input type="submit" name="saveBtn" id="saveBtn" value="�ѹ�֡㺤Ӣ�" <?=($_REQUEST["loanrequest_status"]!="0")?"disabled":""?> />
		<?php if($_REQUEST["save_mode"]=="update"){?>		
		<input type="submit" name="cancelBtn" id="cancelBtn" value="�ѹ�֡¡��ԡ㺤Ӣ�" <?=($_REQUEST["loanrequest_status"]!="0")?"disabled":""?>/>
		
		<?php
		
                
                
	
                 
                 if($_REQUEST["loantype_code"] == "21"){
                     
                     if($_REQUEST["expense_bank"] == "�. ��ا�� �ӡѴ (��Ҫ�)"){
                         
                        $doc = "21_006"; 
                         
                     }else if($_REQUEST["expense_bank"] == "�. �¾ҳԪ�� �ӡѴ (��Ҫ�)"){
                         
                         $doc = "21_014";
                         
                     }else if($_REQUEST["expense_bank"] == "�. ����Թ"){
                         
                         $doc = "21_030";  
                         
                     }
 
                 }else if($_REQUEST["loantype_code"] == "22"){
                     
                      if($_REQUEST["expense_bank"] == "�. ��ا�� �ӡѴ (��Ҫ�)"){
                         
                        $doc = "22_006"; 
                         
                     }else if($_REQUEST["expense_bank"] == "�. �¾ҳԪ�� �ӡѴ (��Ҫ�)"){
                         
                         $doc = "22_014";
                         
                     }else if($_REQUEST["expense_bank"] == "�. ����Թ"){
                         
                         $doc = "22_030";  
                         
                     }
                     
                 }

                if($_REQUEST["loantype_code"] == "11"){
                 
                $loanrequest_amt_docno = $_REQUEST["loanrequest_amt"]; 
                     
                if($loanrequest_amt_docno <= 1400000){
                
				$LoanDocPrint = array(
				   "21"=>array('LoanReqdoc'.$doc.''),
				   "19"=>array('LoanReqdoc'.$_REQUEST["loantype_code"].''),
				   "73"=>array('LoanReqdoc'.$_REQUEST["loantype_code"].''),
                                   "22"=>array('LoanReqdoc'.$doc.''),
				   "12"=>array(
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_1',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_2',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_3',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_4',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_5',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_6',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_7'
					),
					"11"=>array(
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_1',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_2',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_3',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_4',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_5',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_6',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_7',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_8',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_9',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_10',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_11'
					),
                                    "17"=>array(
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_1',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_2',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_3',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_4',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_5',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_6',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_7',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_8',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_9',
					)
				);
                                
                }else if($loanrequest_amt_docno > 1400000 && $loanrequest_amt_docno <= 2000000){
                    
                    
                    $LoanDocPrint = array(
				   "21"=>array('LoanReqdoc'.$doc.''),
				   "19"=>array('LoanReqdoc'.$_REQUEST["loantype_code"].''),
				   "73"=>array('LoanReqdoc'.$_REQUEST["loantype_code"].''),
                                   "22"=>array('LoanReqdoc'.$doc.''),
				   "12"=>array(
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_1',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_2',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_3',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_4',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_5',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_6',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_7'
					),
					"11"=>array(
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_1',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_2',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_3',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_4',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_5',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_6',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_7',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_8',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_9',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_10',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_11',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_12',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_13'
					),
                                    "17"=>array(
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_1',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_2',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_3',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_4',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_5',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_6',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_7',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_8',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_9'
					)
				);
                    
                       }
                
                 }else{
                     
                     $LoanDocPrint = array(
				   "21"=>array('LoanReqdoc'.$doc.''),
				   "19"=>array('LoanReqdoc'.$_REQUEST["loantype_code"].''),
				   "73"=>array('LoanReqdoc'.$_REQUEST["loantype_code"].''),
                                   "22"=>array('LoanReqdoc'.$doc.''),
				   "12"=>array(
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_1',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_2',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_3',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_4',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_5',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_6',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_7'
					),
					"11"=>array(
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_1',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_2',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_3',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_4',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_5',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_6',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_7',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_8',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_9',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_10',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_11',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_12',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_13'
					),
                                    "17"=>array(
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_1',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_2',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_3',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_4',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_5',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_6',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_7',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_8',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_9'
					)
				);
                 }
				
				for($z=0;$z<count($LoanDocPrint[$_REQUEST["loantype_code"]]);$z++){
				
				$file_print=$LoanDocPrint[$_REQUEST["loantype_code"]][$z];
				//echo $file_print;
				//$file_print='LoanReqdoc'.$_REQUEST["loantype_code"].'.html';
				if(file_exists($file_print.".html")){
				$body=file_get_contents($file_print.".html", true);
				 
				$body=str_replace("COOP_NAME",$title,$body); // �����ˡó�		 		
				$body=str_replace("noticedoc_no",$_REQUEST["noticedoc_no"],$body); // 
				$body=str_replace("loanreq_docno",$_REQUEST["loanreq_docno"],$body); // �Ţ���㺤Ӣ�
                                
                                if($_REQUEST["action"]!="edit"){
                                  $dateshow = date("d-m-Y");  
                                  $body=str_replace("update_date",ConvertDate($dateshow,"long"),$body); // �ѹ���ѹ�֡ event insert , delete
                                }else{
                                  $body=str_replace("update_date",ConvertDate($_REQUEST["update_date_"],"long"),$body); // �ѹ���ѹ�֡ event edit 
                                }
				$body=str_replace("member_fullname",$full_name,$body); // ���� - ʡ��
				$body=str_replace("member_no",$member_no,$body); // �Ţ����¹
				$body=str_replace("member_age",$member_age,$body); // ���اҹ
				$body=str_replace("salary_id",$_REQUEST["salary_id"],$body); // ���ʾ�ѡ�ҹ
				$body=str_replace("phone_no",$phone_no,$body); // ������	
				$body=str_replace("phonework_no",$_REQUEST["phonework_no"],$body); // ������ӧҹ
				$body=str_replace("position_desc",$_REQUEST["position_desc"]." ".$level_desc,$body);  // ���˹� + �дѺ
				$body=str_replace("workplace",$_REQUEST["workplace"],$body); // �ӹѡ�ҹ
				$body=str_replace("amphur_desc",$_REQUEST["amphur_desc"],$body); // �����
				//$body=str_replace("province_desc",$_REQUEST["province_desc"],$body);
				$body=str_replace("membgroub_desc",$_REQUEST["membgroup_desc"],$body); // �ѧ�Ѵ
				$body=str_replace("objective_desc",$_REQUEST["objective_desc"],$body); // �ѵ����ʧ���á��
				$body=str_replace("salary_amt",number_format($_REQUEST["salary_amt"],2),$body); // �Թ��͹
				$body=str_replace("loanrequest_amt",number_format($_REQUEST["loanrequest_amt"],2),$body); // ǧ�Թ�͡��
				$body=str_replace("loanrequestamt_txt",convertthai($_REQUEST["loanrequest_amt"]),$body); // ǧ�Թ�͡��������
                                $body=str_replace("period_payment_text",convertthai($_REQUEST["period_payment"]),$body); // ���е�ͧǴ������
				$body=str_replace("period_payment",number_format($_REQUEST["period_payment"],2),$body); // ���е�ͧǴ
				$period_txt = str_replace("�ҷ��ǹ","",convertthai($_REQUEST["period"]));
				$body=str_replace("period_txt",$period_txt,$body); // �Ǵ����������
				$body=str_replace("period",$_REQUEST["period"],$body); // �Ǵ����
				$body=str_replace("startpay_date",ConvertDate(str_replace("/","-",$_REQUEST["startpay_date"]),"long"),$body); // �ѹ������������
				$body=str_replace("expense_bank",$_REQUEST["expense_bank"],$body); // ��Ҥ��
				$body=str_replace("expense_branch",$_REQUEST["expense_bankbranch"],$body); // �ҢҸ�Ҥ��
				$body=str_replace("expense_type",$_REQUEST["expense_banktype"],$body); // �������ѭ�ո�Ҥ��
				$body=str_replace("expense_accid",$_REQUEST["expense_accid"],$body); // �Ţ�ѭ�ո�Ҥ��
				$body=str_replace("loan_rate",($_REQUEST["loan_rate"]*100),$body); // �÷�͡����
				
				// Address

				if($myaddr_no == ""){
				$body=str_replace("addr_member1",$addr_member1,$body); //���ʵ�ԧ1
				$body=str_replace("addr_member",$addr_member,$body); //���ʵ�ԧ
				$body=str_replace("curraddr_no",$curraddr_no,$body); // ��ҹ�Ţ���Ѩ�غѹ
				}else{
				$body=str_replace("addr_member1",$myaddr_member1,$body); //���ʵ�ԧ1 � PHPMyAdmin
				$body=str_replace("addr_member",$myaddr_member,$body); //���ʵ�ԧ � PHPMyAdmin
				$body=str_replace("curraddr_no",$myaddr_no,$body); // ��ҹ�Ţ���Ѩ�غѹ � PHPMyAdmin
				}
				if($myaddr_no == ""){
				$body=str_replace("curraddr_moo",$curraddr_moo,$body);	 // ����Ѩ�غѹ
				}else{
				$body=str_replace("curraddr_moo",$myaddr_moo,$body);	 // ����Ѩ�غѹ � PHPMyAdmin
				}
				if($myaddr_no == ""){
				$body=str_replace("curraddr_village",$curraddr_village,$body); // ���������ҹ�Ѩ�غѹ
				}else{
				$body=str_replace("curraddr_village",$myaddr_village,$body); // ���������ҹ�Ѩ�غѹ � PHPMyAdmin
				}
				if($myaddr_no == ""){
				$body=str_replace("curraddr_soi",$curraddr_soi,$body);	// ��»Ѩ�غѹ
				}else{
				$body=str_replace("curraddr_soi",$myaddr_soi,$body);	// ��»Ѩ�غѹ � PHPMyAdmin
				}
				if($myaddr_no == ""){
				$body=str_replace("curraddr_road",$curraddr_road,$body); // ����Ѩ�غѹ
				}else{
				$body=str_replace("curraddr_road",$myaddr_road,$body); // ����Ѩ�غѹ � PHPMyAdmin
				}
				if($myaddr_no == ""){
				$body=str_replace("tambol_desc",$tambol_desc,$body);  // �ӺŻѨ�غѹ
				}else{
				$body=str_replace("tambol_desc",$mytambol_desc,$body);  // �ӺŻѨ�غѹ � PHPMyAdmin
				}
				if($myaddr_no == ""){
				$body=str_replace("district_desc",$district_desc,$body); // ����ͻѨ�غѹ
				}else{
				$body=str_replace("district_desc",$mydistrict_desc,$body); // ����ͻѨ�غѹ � PHPMyAdmin
				}
				if($myaddr_no == ""){
				$body=str_replace("province_desc",$province_desc,$body); // �ѧ��Ѵ�Ѩ�غѹ
				}else{
				$body=str_replace("province_desc",$myprovince_desc,$body); // �ѧ��Ѵ�Ѩ�غѹ � PHPMyAdmin
				}
				if($myaddr_no == ""){
				$body=str_replace("curraddr_postcode",$curraddr_postcode,$body); // ������ɳ���Ѩ�غѹ
				}else{
				$body=str_replace("curraddr_postcode",$myaddr_postcode,$body); // ������ɳ���Ѩ�غѹ � PHPMyAdmin
				}




                                $body=str_replace("at_write",$_REQUEST["at_write"],$body); // ��¹���
                                $body=str_replace("sharestk_amt",number_format($sharestk_amt,0),$body); // �ӹǹ���
                                $body=str_replace("share_amt123",number_format($share_amt,2),$body); // ��Ť�����
                                $body=str_replace("share_amt_text",convertthai($share_amt),$body); // ��Ť�����������
                                $body=str_replace("share_amt",number_format($_REQUEST["loanreqmax_amt"],2),$body); // ǧ�Թ����٧�ش
                                $body=str_replace("principal_balance",number_format($principal_balance,2),$body); // �Թ�������������褧�����
                                
                                
                                 

			  $strSQL="select * from mdbreqloancoll where loanreq_docno='".$_REQUEST["loanreq_docno"]."' order by seq_no asc limit 0,1";
			  $objQuery__ = mysql_query($strSQL) ;
			  
			  $i=1;
			  
			  while($q = mysql_fetch_array($objQuery__)){		
 			  
				 $_REQUEST["coll".$i."mem_no"]=$q['collmemb_no']; 
				 $_REQUEST["coll".$i."mem_nm"]=$q['collmemb_name']; 
				
				
			  }
			  
			  $sql_addr1 ="select FLOOR(ft_calage(mb.birth_date,sysdate,4)) as  age_coll1, 
							mb.card_person as card_person_coll1,
							(case when mb.addr_no = '' or mb.addr_no is null then '' else mb.addr_no end) ||
							(case when mb.addr_moo = '' or mb.addr_no is null then '' else ' ������ ' || mb.addr_moo end) ||
							(case when mb.addr_village = '' or mb.addr_village is null then '' else ' �����ҹ ' || mb.addr_village end) ||
							(case when mb.addr_soi = '' or mb.addr_soi is null then '' else mb.addr_soi end) ||
							(case when mb.addr_road = '' or mb.addr_road is null then '' else ' �. ' || mb.addr_road end) ||
							(case when mut.tambol_desc = '' or mut.tambol_desc is null then '' else ' �. ' || mut.tambol_desc end) ||
							(case when mud.district_desc = '' or mud.district_desc is null then '' else ' �. ' || mud.district_desc end) ||
							(case when mup.province_desc = '' or mup.province_desc is null then '' else ' �. ' || mup.province_desc end) ||
							(case when mb.addr_postcode = '' or mb.addr_postcode is null then '' else ' ' || mb.addr_postcode end) as addr_coll1,
							mb.salary_amount as salary_amount1 ,
                                                        (case when mb.ADDR_MOBILEPHONE is null or mb.ADDR_MOBILEPHONE = '' then mb.ADDR_PHONE else mb.ADDR_MOBILEPHONE end) as mobile1,
                                                        mus.position_desc || '  ' || MUL.LEVEL_DESC as positioncoll1,
														MUG.membgroup_desc as  membgroup_desc1
							from mbmembmaster mb , mbucfdistrict mud , mbucftambol mut , mbucfprovince mup , mbucfposition mus , MBUCFLEVEL MUL ,MBUCFMEMBGROUP MUG
							where mb.member_no = '".$_REQUEST["coll".$i."mem_no"]."'
							and mb.tambol_code = mut.tambol_code(+)
							and mb.amphur_code = mud.district_code(+)
							and mb.province_code = mup.province_code(+)
                                and mb.position_code = mus.position_code(+)
                                and mb.LEVEL_CODE = MUL.LEVEL_CODE(+)
								and mb.membgroup_code = mug.membgroup_code(+)";
                                $value_addr = array('AGE_COLL1','CARD_PERSON_COLL1','ADDR_COLL1','SALARY_AMOUNT1','MOBILE1','POSITIONCOLL1','MEMBGROUP_DESC1');
                                list($Num_Rows_addr,$list_info_addr) = get_value_many_oci($sql_addr1,$value_addr); 
                                $age_coll1 =$list_info_addr[0][0]; 
                                $card_person_coll1 =$list_info_addr[0][1];
				$addr_coll1 =$list_info_addr[0][2];
                                $salary_amount1 =$list_info_addr[0][3];
                                $mobile1 =$list_info_addr[0][4];
                                $positioncoll1 =$list_info_addr[0][5];
				$membgroup_desc1 =$list_info_addr[0][6];
                                
			  if($_REQUEST["coll".$i."mem_nm"] != ""){
			  $body=str_replace("collmemb_no1",($_REQUEST["coll".$i."mem_no"]),$body); // �Ţ����¹����Ӥ���� 1  
			  $body=str_replace("collmemb_name1",($_REQUEST["coll".$i."mem_nm"]),$body); // ����ʡ�Ť���Ӥ���� 1
			  $body=str_replace("age_coll1",$age_coll1,$body); // ���ؤ���� ����� 1
			  $body=str_replace("card_person_coll1",$card_person_coll1,$body); // ���ʺѵû�ЪҪ������ ����� 1
			  $body=str_replace("addr_coll1",$addr_coll1,$body); // ������뤹��� ����� 1
                          $body=str_replace("salary_amount1",number_format($salary_amount1,2),$body); // �Թ��͹����� ����� 1
			  $body=str_replace("mobile1",$mobile1,$body); // �����ä���� ����� 1
			  $body=str_replace("positioncoll1",$positioncoll1,$body); // ���˹觤���� ����� 1
			  $body=str_replace("membgroup_desc1",$membgroup_desc1,$body); // �ѧ�Ѵ����� ����� 1
                          
			  }else{
				  
		          $body=str_replace("collmemb_no1","",$body);
			  $body=str_replace("collmemb_name1","",$body);
			  $body=str_replace("age_coll1","",$body);
			  $body=str_replace("card_person_coll1","",$body);
			  $body=str_replace("addr_coll1","",$body);
                          $body=str_replace("salary_amount1","",$body);
                          $body=str_replace("mobile1","",$body);
                          $body=str_replace("positioncoll1","",$body);
			  $body=str_replace("membgroup_desc1","",$body); 
				  
			  }
			  
			  $strSQL="select * from mdbreqloancoll where loanreq_docno='".$_REQUEST["loanreq_docno"]."' order by seq_no asc limit 1,1";
			  $objQuery__ = mysql_query($strSQL) ;
			  
			  $j=2;
			  
			  while($q = mysql_fetch_array($objQuery__)){		
 			  
				 $_REQUEST["coll".$j."mem_no"]=$q['collmemb_no']; 
				 $_REQUEST["coll".$j."mem_nm"]=$q['collmemb_name']; 
				
				
			  }
			  
			  $sql_addr2 ="select FLOOR(ft_calage(mb.birth_date,sysdate,4)) as  age_coll2, 
							mb.card_person as card_person_coll2,
							(case when mb.addr_no = '' or mb.addr_no is null then '' else mb.addr_no end) ||
							(case when mb.addr_moo = '' or mb.addr_no is null then '' else ' ������ ' || mb.addr_moo end) ||
							(case when mb.addr_village = '' or mb.addr_village is null then '' else ' �����ҹ ' || mb.addr_village end) ||
							(case when mb.addr_soi = '' or mb.addr_soi is null then '' else mb.addr_soi end) ||
							(case when mb.addr_road = '' or mb.addr_road is null then '' else ' �. ' || mb.addr_road end) ||
							(case when mut.tambol_desc = '' or mut.tambol_desc is null then '' else ' �. ' || mut.tambol_desc end) ||
							(case when mud.district_desc = '' or mud.district_desc is null then '' else ' �. ' || mud.district_desc end) ||
							(case when mup.province_desc = '' or mup.province_desc is null then '' else ' �. ' || mup.province_desc end) ||
							(case when mb.addr_postcode = '' or mb.addr_postcode is null then '' else ' ' || mb.addr_postcode end) as addr_coll2,
							mb.salary_amount as salary_amount2 ,
                                                        (case when mb.ADDR_MOBILEPHONE is null or mb.ADDR_MOBILEPHONE = '' then mb.ADDR_PHONE else mb.ADDR_MOBILEPHONE end) as mobile2,
                                                        mus.position_desc || '  ' || MUL.LEVEL_DESC as positioncoll2,
														MUG.membgroup_desc as  membgroup_desc2
							from mbmembmaster mb , mbucfdistrict mud , mbucftambol mut , mbucfprovince mup , mbucfposition mus , MBUCFLEVEL MUL ,MBUCFMEMBGROUP MUG
							where mb.member_no = '".$_REQUEST["coll".$j."mem_no"]."'
							and mb.tambol_code = mut.tambol_code(+)
							and mb.amphur_code = mud.district_code(+)
							and mb.province_code = mup.province_code(+)
                                and mb.position_code = mus.position_code(+)
                                and mb.LEVEL_CODE = MUL.LEVEL_CODE(+)
				and mb.membgroup_code = mug.membgroup_code(+)";
                                $value_addr2 = array('AGE_COLL2','CARD_PERSON_COLL2','ADDR_COLL2','SALARY_AMOUNT2','MOBILE2','POSITIONCOLL2','MEMBGROUP_DESC2');
                                list($Num_Rows_addr2,$list_info_addr2) = get_value_many_oci($sql_addr2,$value_addr2); 
                                $age_coll2 =$list_info_addr2[0][0]; 
                                $card_person_coll2 =$list_info_addr2[0][1];
				$addr_coll2 =$list_info_addr2[0][2];
                                $salary_amount2 =$list_info_addr2[0][3];
                                $mobile2 =$list_info_addr2[0][4];
                                $positioncoll2 =$list_info_addr2[0][5];
                                $membgroup_desc2 =$list_info_addr2[0][6];
				
				if($_REQUEST["coll".$j."mem_nm"] != ""){
					
				$body=str_replace("collmemb_no2",($_REQUEST["coll".$j."mem_no"]),$body); // �Ţ����¹����Ӥ���� 2 
				$body=str_replace("collmemb_name2",($_REQUEST["coll".$j."mem_nm"]),$body); // ����ʡ�Ť���Ӥ���� 2
				$body=str_replace("age_coll2",$age_coll2,$body); // ���ؤ���� ����� 2
				$body=str_replace("card_person_coll2",$card_person_coll2,$body); // ���ʺѵû�ЪҪ������ ����� 2
				$body=str_replace("addr_coll2",$addr_coll2,$body); // ������뤹��� ����� 2
                                $body=str_replace("salary_amount2",number_format($salary_amount2,2),$body); // �Թ��͹����� ����� 2
			        $body=str_replace("mobile2",$mobile2,$body); // �����ä���� ����� 2
			        $body=str_replace("positioncoll2",$positioncoll2,$body); // ���˹觤���� ����� 2
                                $body=str_replace("membgroup_desc2",$membgroup_desc2,$body); // �ѧ�Ѵ����� ����� 2
					
				}else{	  
					  $body=str_replace("collmemb_no2","",$body);
					  $body=str_replace("collmemb_name2","",$body);
					  $body=str_replace("age_coll2","",$body);
					  $body=str_replace("card_person_coll2","",$body);
					  $body=str_replace("addr_coll2","",$body);
                                          $body=str_replace("salary_amount2","",$body);
                                          $body=str_replace("mobile2","",$body);
                                          $body=str_replace("positioncoll2","",$body);
                                          $body=str_replace("membgroup_desc2","",$body);
				}
	
		          $strSQL="select * from mdbreqloancoll where loanreq_docno='".$_REQUEST["loanreq_docno"]."' order by seq_no asc limit 2,1";
			  $objQuery__ = mysql_query($strSQL) ;
			  
			  $k=3;
			  
			  while($q = mysql_fetch_array($objQuery__)){		
 			  
				 $_REQUEST["coll".$k."mem_no"]=$q['collmemb_no']; 
				 $_REQUEST["coll".$k."mem_nm"]=$q['collmemb_name']; 
				
				
			  }
			  
			  $sql_addr3 ="select FLOOR(ft_calage(mb.birth_date,sysdate,4)) as  age_coll3, 
							mb.card_person as card_person_coll3,
							(case when mb.addr_no = '' or mb.addr_no is null then '' else mb.addr_no end) ||
							(case when mb.addr_moo = '' or mb.addr_no is null then '' else ' ������ ' || mb.addr_moo end) ||
							(case when mb.addr_village = '' or mb.addr_village is null then '' else ' �����ҹ ' || mb.addr_village end) ||
							(case when mb.addr_soi = '' or mb.addr_soi is null then '' else mb.addr_soi end) ||
							(case when mb.addr_road = '' or mb.addr_road is null then '' else ' �. ' || mb.addr_road end) ||
							(case when mut.tambol_desc = '' or mut.tambol_desc is null then '' else ' �. ' || mut.tambol_desc end) ||
							(case when mud.district_desc = '' or mud.district_desc is null then '' else ' �. ' || mud.district_desc end) ||
							(case when mup.province_desc = '' or mup.province_desc is null then '' else ' �. ' || mup.province_desc end) ||
							(case when mb.addr_postcode = '' or mb.addr_postcode is null then '' else ' ' || mb.addr_postcode end) as addr_coll3,
							mb.salary_amount as salary_amount3 ,
                                                        (case when mb.ADDR_MOBILEPHONE is null or mb.ADDR_MOBILEPHONE = '' then mb.ADDR_PHONE else mb.ADDR_MOBILEPHONE end) as mobile3,
                                                        mus.position_desc || '  ' || MUL.LEVEL_DESC as positioncoll3,
														MUG.membgroup_desc as  membgroup_desc3
							from mbmembmaster mb , mbucfdistrict mud , mbucftambol mut , mbucfprovince mup , mbucfposition mus , MBUCFLEVEL MUL ,MBUCFMEMBGROUP MUG
							where mb.member_no = '".$_REQUEST["coll".$k."mem_no"]."'
							and mb.tambol_code = mut.tambol_code(+)
							and mb.amphur_code = mud.district_code(+)
							and mb.province_code = mup.province_code(+)
                                and mb.position_code = mus.position_code(+)
                                and mb.LEVEL_CODE = MUL.LEVEL_CODE(+)
				and mb.membgroup_code = mug.membgroup_code(+)";
                                $value_addr3 = array('AGE_COLL3','CARD_PERSON_COLL3','ADDR_COLL3','SALARY_AMOUNT3','MOBILE3','POSITIONCOLL3','MEMBGROUP_DESC3');
                                list($Num_Rows_addr3,$list_info_addr3) = get_value_many_oci($sql_addr3,$value_addr3); 
                                $age_coll3 =$list_info_addr3[0][0]; 
                                $card_person_coll3 =$list_info_addr3[0][1];
				$addr_coll3 =$list_info_addr3[0][2];
				$salary_amount3 =$list_info_addr3[0][3];
                                $mobile3 =$list_info_addr3[0][4];
                                $positioncoll3 =$list_info_addr3[0][5];
                                $membgroup_desc3 =$list_info_addr3[0][6];
				
				if($_REQUEST["coll".$k."mem_nm"] != ""){
				$body=str_replace("collmemb_no3",($_REQUEST["coll".$k."mem_no"]),$body); // �Ţ����¹����Ӥ���� 3
				$body=str_replace("collmemb_name3",($_REQUEST["coll".$k."mem_nm"]),$body); // ����ʡ�Ť���Ӥ���� 3
				$body=str_replace("age_coll3",$age_coll3,$body);  // ���ؤ���� ����� 3
				$body=str_replace("card_person_coll3",$card_person_coll3,$body); // ���ʺѵû�ЪҪ������ ����� 3
				$body=str_replace("addr_coll3",$addr_coll3,$body); // ������뤹��� ����� 3
                                $body=str_replace("salary_amount3",number_format($salary_amount3,2),$body); // �Թ��͹����� ����� 3
			        $body=str_replace("mobile3",$mobile3,$body); // �����ä���� ����� 3
			        $body=str_replace("positioncoll3",$positioncoll3,$body); // ���˹觤���� ����� 3
                                $body=str_replace("membgroup_desc3",$membgroup_desc3,$body); // �ѧ�Ѵ����� ����� 3
				}else{
					$body=str_replace("collmemb_no3","",$body);
					  $body=str_replace("collmemb_name3","",$body);
					  $body=str_replace("age_coll3","",$body);
					  $body=str_replace("card_person_coll3","",$body);
					  $body=str_replace("addr_coll3","",$body);
                                          $body=str_replace("salary_amount3","",$body);
                                          $body=str_replace("mobile3","",$body);
                                          $body=str_replace("positioncoll3","",$body);
                                           $body=str_replace("membgroup_desc3","",$body);
				}

				
				$body=str_replace("idcard",$card_person,$body);
				//echo $card_person;
				$body=str_replace("membgroup_desc",$membgroup_desc,$body);
				
				$msuppervisor_nm="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
				$msuppervisor_postition="??????????????????";
				
			 $strSQLm="select msuppervisor_nm||' '||msuppervisor_surnm as msuppervisor_nm,msuppervisor_postition
								from hremployee where salary_id='".$_REQUEST["salary_id"]."' ";	
				 //echo $strSQL;
			  $value = array('MSUPPERVISOR_NM','MSUPPERVISOR_POSTITION');
		      list($Num_Rowsm,$list_infom) = get_value_many_oci($strSQLm,$value); 
			  
			  //try{
				  if(strlen($list_infom[0][1])>0){
					  $msuppervisor_nm="<u>&nbsp;&nbsp;".$list_infom[0][0]."&nbsp;&nbsp;</u>";
					  $msuppervisor_postition="<u>&nbsp;&nbsp;".$list_infom[0][1]."&nbsp;&nbsp;</u>";
				  }
			  //}catch(Exception esx){}
			  
			    $_REQUEST["msuppervisor_nm"]=$msuppervisor_nm;
			    $_REQUEST["msuppervisor_postition"]=$msuppervisor_postition;
			  
				$body=str_replace("msuppervisor_nm",$_REQUEST["msuppervisor_nm"],$body);
				$body=str_replace("msuppervisor_postition",$_REQUEST["msuppervisor_postition"],$body);
				
				//$body=str_replace("002.gif",(($_REQUEST["expense_accid"]!=""&&$_REQUEST["loantype_code"]=="20")?"002_.gif":"002.gif"),$body);
				//$body=str_replace("002.gif",(($_REQUEST["expense_accid"]!=""&&$_REQUEST["loantype_code"]=="21")?"002_.gif":"002.gif"),$body);
				
				
				 if($_REQUEST["loantype_code"]!="10"){
					for($c=1;$c<=$collmax;$c++){ 
					$body=str_replace("Coll".$c."name",$_REQUEST["Coll".$c."name"],$body);
					$body=str_replace("Mem".$c."no",$_REQUEST["Mem".$c."no"],$body);
					$body=str_replace("Work".$c."place",$_REQUEST["Work".$c."place"],$body);
					$body=str_replace("Position".$c."desc",$_REQUEST["Position".$c."desc"],$body);
					$body=str_replace("Havemore".$c."coll",$_REQUEST["Havemore".$c."coll"],$body);
					$body=str_replace("Coll".$c."refmembname",$_REQUEST["coll".$c."refmembname"],$body);
					$body=str_replace("Coll".$c."refmembno",$_REQUEST["coll".$c."refmembno"],$body);
					}
				 }
				
				$body=str_replace("\"".$file_print."_files","\"../".$file_print."_files",$body);
				
				$path_root="loadreqdoc/";
				if(!file_exists($path_root) && !is_dir($path_root))
				mkdir($path_root);
				$loanreq_docfile=$path_root.$file_print.$_REQUEST["loanreq_docno"].'.html';
				$f=fopen($loanreq_docfile, 'wa+');
				fwrite($f, $body);
				fclose($f);
				?>
				<br/><br/>
				<input type="button" name="printBtn" id="printBtn" value="�����㺤Ӣ� <?=($_REQUEST["loantype_code"]!="20"?"":("��ǹ���".($z+1)))?>" onclick="printFrame('LoanReqdoc<?=$_REQUEST["loanreq_docno"].$z?>')"/><div class="print_remak" style="color: red;">*����ͧ�Ѻ��þ����Ѻ Firefox version ����ӡ��� 52</div>
				<!--<input type="button" name="printDocBtn" id="printDocBtn" value="�����;����㺤Ӣ�" onclick="window.open('set_scale.pdf','printDoc','_blank')"/>-->
				<iframe src="<?=$loanreq_docfile?>" width="100%" height="<?=$_REQUEST["loantype_code"]!="20"?"2050":"350"?>" id="LoanReqdoc<?=$_REQUEST["loanreq_docno"].$z?>" style="display:;"><?=$body?></iframe>
				<?php
                                
				 }
			}	
		} ?>
		</td>
      </tr>
	  <?php }else{ ?>
		  
      <tr>
        <td bgcolor="#FFFFFF" colspan="4" align="center">
		   <script>alert("���Թ�������ҹ��¡��� 6 �Ǵ �������ö����¡�â͡������������");</script>
		   <font color=red><b> ���Թ�������ҹ��¡��� 6 �Ǵ �������ö����¡�â͡������������<b/></font>
		</td>
	  </tr>	
		  
	 <?php }?>
    </table>
		   
    </form>
	</td></tr></table>
  <?php } ?>	
	<script>
	  
	  $('.etcformat').change(function(){
		  
		  var a = numberWithCommas( $(this).val());
		  
		  var full = a.split('.');

          if(full[1] === undefined){
			  
			  a += '.00';
  
		  }

		  $(this).val(a);

	  }
	)
		   
	  
	  function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	}
	  
	 function checkCanUpload(item){
		<?php // if($_REQUEST["save_mode"]!="update"){ ?>
		 //alert("��ҹ��ͧ�ѹ�֡㺤Ӣ͡���͹ �֧������ö Upload �͡���Ṻ�� ");
		// return false;
		<?php //} ?>
	 }	 
	
	 function onChangeLoanType(item){
		  if(item.value=="11" || item.value=="12" || item.value=="17"){
			  document.getElementById('period').value="200";
		  }else{
			  document.getElementById('period').value="60";
		  }
		  document.getElementById('startpay_date').value='<?=date("d/m/").(date("Y")+543)?>';
	 }
	 function submitForm(item){
		 if(item.value!=""){
		  document.getElementById('formID1').submit();
		 }else{
		   alert("��سҡ�͡��������´���١��ͧ");	  
		   item.focus();	 
		   item.value=0;
		 }
	 }
	 
	 function formValidation(){ 
		 var valid=false;
                 var salary_amt_check = document.getElementById('salary_amt').value;
                     salary_amt_check = salary_amt_check.replace(",", "");
                     //salary_amt_check = salary_amt_check.replace(".00", "");
                       
                 var loanrequest_amt_check = document.getElementById('loanrequest_amt').value
                     loanrequest_amt_check = loanrequest_amt_check.replace(",", "");
					 loanrequest_amt_check = loanrequest_amt_check.replace(",", "");
                    // loanrequest_amt_check = loanrequest_amt_check.replace(".00", "");
					
							 
		 if(document.getElementById('position_desc').value.length<=0){
			 alert("��سҡ�͡���˹�");
			 document.getElementById('position_desc').focus();
			 return valid;
		 }else if(isNaN((document.getElementById('member_age').value))||parseFloat(document.getElementById('member_age').value)<=0){
			 alert("��سҡ�͡�����繵���Ţ��ҹ��");
			 document.getElementById('member_age').focus();
			 return valid;
		 }else if(document.getElementById('phone_no').value.length<=0){
			 alert("��سҡ�͡�����÷��Դ�����");
			 document.getElementById('phone_no').focus();
			 return valid;
		 }else if(document.getElementById('workplace').value.length<=0){
			 alert("��سҡ�͡ʶҹ���ӧҹ");
			 document.getElementById('workplace').focus();
			 return valid;
		 }

        else if(isNaN((salary_amt_check))|| parseFloat(salary_amt_check)<=0){
			 alert("��س��к��Թ��͹�繵���Թ��ҹ��");
			 document.getElementById('salary_amt').focus();
			 return valid;
		 }else if(document.getElementById('objective_desc').value.length<=0){
			 alert("��سҡ�͡�ѵ�ػ��ʧ��");
			 document.getElementById('objective_desc').focus();
			 return valid;
		 }else if(document.getElementById('startpay_date').value.length<=0){
			 alert("��س��кء�˹��ѹ������������");
			 document.getElementById('startpay_date').focus();
			 return valid;
		 }else if(document.getElementById('period').value.length<=0){
			 alert("��سҡ�˹��ӹǹ�Ǵ�繵���Ţ��ҹ��");
			 document.getElementById('period').focus();
			 return valid;
		 }else if(isNaN((loanrequest_amt_check)) || loanrequest_amt_check.length <= 0){
			 alert("��سҡ�˹��ӹǹ�Թ���Т͡���繵���Թ��ҹ��");
			 document.getElementById('loanrequest_amt').focus();
			 return valid;
		 }else if(parseFloat(document.getElementById('period').value)>parseFloat(document.getElementById('period_max').value)){
			 alert("��سҡ�˹��ӹǹ�Ǵ����Թ�ӹǹ�Ǵ�٧�ش");
			 document.getElementById('period').value=document.getElementById('period_max').value;
			 document.getElementById('period').focus();
			 return valid;
		 }else if(parseFloat(document.getElementById('loanrequest_amt').value)>parseFloat(document.getElementById('loanreqmax_amt').value)){
			 alert("��سҡ�˹��ӹǹ�Թ���Т͡������Թ�ӹǹ�Ǵ�٧�ش");
			 document.getElementById('loanrequest_amt').value=document.getElementById('loanreqmax_amt').value;
			 document.getElementById('loanrequest_amt').focus();
			 return valid;
		 }else if(document.getElementById('expense_bankbranch').value.length<=0){
			 alert("��س��к��ҢҸ�Ҥ��");
			 document.getElementById('expense_bankbranch').focus();
			 return valid;
		 }else if(document.getElementById('expense_accid').value.length<10||document.getElementById('expense_accid').value.length>15){
			 alert("��س��к��Ţ�ѭ�ո�Ҥ�� ��ٻẺ੾�е���Ţ ��ҹ�� �ӹǹ 10 ��ѡ���� ");
			 document.getElementById('expense_accid').focus();
			 return valid;
		 }else if(isNaN((document.getElementById('expense_accid').value))){
			 alert("��س��к��Ţ�ѭ�ո�Ҥ�� ��ٻẺ੾�е���Ţ ��ҹ�� �ӹǹ 10 ��ѡ���� ");
			 document.getElementById('expense_accid').focus();
			 return valid;
		 }else if(document.getElementById('accept_policy').checked==false){
			 alert("��س����͡����Ѻ���͹䢡�÷���¡��");
			 document.getElementById('accept_policy').focus();
			 return valid;
		 }
		 valid=true;
		 <?php if($_REQUEST["deptaccount_flag"]==false){?>
		   valid=false;
		    alert("��ҹ��ͧ�Դ�ѭ�� �Թ�ҡ �ء�Թ ATM ��͹�֧������ö����¡�� ��");
		 <?php } ?>
		 return valid;
	 }
	 function insertoffset() {
		var member_no = $('#member_no').val()
		var loantype_code = $('#loantype_code').val()
		var len = document.getElementsByClassName('checkbox').length;
		if(len > 0){
		var i = 1;
		<?php if($_REQUEST["save_mode"]=="update"){ ?>
		$('.checkbox').each(function(){
			var contract = $(this).attr('data-loan')
			var check = $(this).attr('checked')
			var loan = $(this).attr('data-loan')
			var req_no = "<?=$_REQUEST["loanreq_docno"]?>"
				$.post('../lib/updateoffset.php',{
					contract_no: loan,
					member_no: member_no,
					seq_no: i,
					check: check,
					req_no: req_no,
					loantype_code: loantype_code,
					type: 'offset'
				},function(data){
					if(data == 'success'){
						return insertEtc()
					}else{
						console.log('offset fail')
						return false
					}
				})
			i++
		})
		<?php }else{ ?>
		$('.checkbox').each(function(){
			var check = $(this).attr('checked')
			var contract = $(this).attr('data-loan')
			var loan = $(this).attr('data-loan')
			$("[data-loan="+loan+"]").attr('checked',true);
				$.post('../lib/insertoffset.php',{
					contract_no: loan,
					member_no: member_no,
					seq_no: i,
					check: check,
					loantype_code: loantype_code,
					type: 'offset'
				},function(data){
					if(data == 'success'){
						return insertEtc()
					}else{
						alert('�ѹ�֡�������ѡ�ź��������')
						console.log('offset fail')
						return false
					}
				})
			i++
		})
		<?php } ?>
		}else{
			return insertEtc()
		}
	 }
	 function insertEtc() {
		var member_no = $('#member_no').val()
		var loantype_code = $('#loantype_code').val()
		var j = 1
		<?php if($_REQUEST["save_mode"]=="update"){ ?>
		$('.etc_amt').each(function(){
				var etc_desc = $(this).attr('data-desc')
				var etc_code = $(this).attr('data-code')
				var req_no = "<?=$_REQUEST["loanreq_docno"]?>"
				var amount = $(this).val()
				if(amount != ''){
					$.post('../lib/updateoffset.php',{
						etc_desc: etc_desc,
						etc_code: etc_code,
						seq_no: j,
						amount: amount,
						member_no: member_no,
						req_no: req_no,
						loantype_code: loantype_code,
						type: 'etc'
					},function(data){
						if(data == 'success'){
						
						sessionStorage.clear();
						
						
							return true
							
							
						}else{
							console.log('offsetETC fail')
							return false
						}
					})
				}
				j++
			})
		<?php }else{ ?>
		 $('.etc_amt').each(function(){
				var etc_desc = $(this).attr('data-desc')
				var etc_code = $(this).attr('data-code')
				var amount = $(this).val()
				if(amount != ''){
					$.post('../lib/insertoffset.php',{
						etc_desc: etc_desc,
						etc_code: etc_code,
						seq_no: j,
						amount: amount,
						member_no: member_no,
						loantype_code: loantype_code,
						type: 'etc'
					},function(data){
						if(data == 'success'){
						
						sessionStorage.clear();
						
						
							return true
							
							
						}else{
							console.log('offsetETC fail')
							return false
						}
					})
				}
				j++
			})
			<?php } ?>
	 }
	 function printFrame(id) {
		    // var is_chrome = ((navigator.userAgent.toLowerCase().indexOf('chrome') > -1) &&(navigator.vendor.toLowerCase().indexOf("google") > -1));
			// if(is_chrome==false){
				// alert("�к��ͧ�Ѻ��þ���캹 Google Chrome Browser ��� Microsoft Edge Browser ��ҹ��");
				// return false;
			// }
			// if (navigator.userAgent.indexOf("Edg") != -1) {
				// alert("�к��ͧ�Ѻ��þ���캹 Google Chrome Browser ��ҹ��");
				// return false;
			// }
			if(confirm("��س��׹�ѹ��þ����")){
				var frm = document.getElementById(id).contentWindow;
				frm.focus();// focus on contentWindow is needed on some ie versions
				frm.print();
			}
            return true;
	}
	$('#addclonecredit').click(function() {
		$('#creditcalcu').append('<tr bgcolor="#FFFFFF">'+
			  '<td width="25%"><input type="checkbox" style="width: 150px"></td>'+
			  '<td width="25%"><input type="text" style="width:100%"></td>'+
			  '<td width="25%"><input type="number"></td>'+
			  '</tr>')
	})
	$('#rmvclonecredit').click(function() {
		console.log('ddd')
	})
	// ��¡���ѡ�ź
	$(document).ready(function(){
	<?php if($_REQUEST["save_mode"]=="update"){ ?>
				var req_no = "<?=$_REQUEST["loanreq_docno"]?>"
				var old_req = sessionStorage.getItem('req_no')
				if(old_req != null){
					if(req_no == old_req){
						sessionStorage.setItem('req_no',req_no)
					}else{
						sessionStorage.clear()
					}
				}else{
					sessionStorage.setItem('req_no',req_no)
				}
	<?php } ?>
	
	//alert("��س����͡��������Թ��� , �Թ��͹ ����Ƿӡ�á�͡�������������ú��ǹ");
		
		<?php if($_REQUEST["salary_amt"] == 0){
		
		?>
		
		//
			sessionStorage.clear();
		
		<?php }else{ ?>
			
		$('.checkbox').each(function(){
			if(!$(this).attr('checked')){
				var contract = $(this).attr('data-loan')
				var loan = sessionStorage.getItem('contract_'+contract)
				$("[data-loan="+loan+"]").attr('checked',true)
			}else{
				var contract = $(this).attr('data-loan')
				var loan = sessionStorage.getItem('contractdel_'+contract)
				$("[data-loan="+loan+"]").removeAttr('checked')
			}
		})
			<?php if($_REQUEST["save_mode"]=="insert"){ ?>
			$('.etc_amt').each(function() {
					var code = $(this).attr('data-code2')
					var amount = sessionStorage.getItem(code)
					$("[data-code2="+code+"]").val(amount)
			})
			<?php } ?>
		<?php } ?>
		
	})
        async function getContract() {
            var array = [];
            var tags = document.getElementsByClassName('checkbox');
          
                    for(var i = 0; i < tags.length; i++)
                    {
                        if(!tags[i].checked) {
                           array.push(tags[i].dataset.loan);
                        }
                  }
                  return array;
        }
	$('.checkbox').change(function() {
            var member_no = $('#member_no').val()
            var loantype_code = parseInt($('#loantype_code').val()); // �������Թ���
            
               getContract().then((value) => {
                   $.post('d.ldc_sumloan.php',{
                       member_no: member_no,
                       loancontract_no: value
                   },function(data) {
                       console.log(data)
                       
                       
                         
            if(loantype_code == "11" || loantype_code == "73"){
            
            
           
            var ldc_sumloan = data;
            var check_l = ldc_sumloan.length;
           
            
            if(check_l > 30){
                
              
                
                ldc_sumloan = 0;
            }
            
        
            
            var periodshare_amt = parseInt($('#periodshare_amt').val()); // ������鹵����͹
            var salarybal_amt = parseInt($('#salarybal_amt').val()); // �Թ��͹������͢�鹵��
            var reqround_factor = parseInt($('#reqround_factor').val());
            var payround_factor = parseInt($('#payround_factor').val());
            var reqround_factor = parseInt($('#reqround_factor').val());
            var month_retry = parseInt($('#month_retry').val()); // �ա�����͹�����³����
            var salary_amt = $('#salary_amt').val(); // �ա�����͹�����³����
           
            salary_amt = salary_amt.replace(",", "");
            salary_amt = salary_amt.replace(".00", "");
            
           
            
            salary_amt = parseInt(salary_amt);
            //alert(salary_amt);
            
            var loanreqmax_amt = parseInt($('#loanreqmax_amt').val()); 
            var rate_loan = 0;
            var numberSelected = 0;
            var paymonth_coop = 0;
            var salary_amt_avg = 0;
            var rate_loanrequest_amt = 0;
            var loanrequest_amt = 0;
            var loanrequest_amt_balance = 0;
            
            
            
            if(loantype_code == "11"){
                
                rate_loan = 6.8 ;
                
                
            }else if (loantype_code == "73"){
                
                rate_loan = 5 ;
                
            }
           
           var paymonth_other = 0;
           
           paymonth_coop = parseInt(ldc_sumloan) + parseInt(periodshare_amt);
           
           salary_amt_avg = parseInt(salary_amt) - (parseInt(paymonth_coop) + parseInt(paymonth_other) + parseInt(salarybal_amt));
           salary_amt_avg = parseInt(salary_amt_avg) - (parseInt(salary_amt_avg) % parseInt(payround_factor));
           
            var rate_1 = 30 / 365 ;
            var rate_int = 7/100;
            
            if(month_retry > 200){
                                    
                                    
              month_retry = 200;
                                    
              }

         
		 
		 rate_loanrequest_amt = (parseInt(month_retry) * parseFloat(rate_int) * parseFloat(rate_1)) + parseInt(1);
		 
         loanrequest_amt = (parseInt(salary_amt_avg) * parseInt(month_retry)) / parseFloat(rate_loanrequest_amt);
        
		 
		 //alert(loanrequest_amt)
        
         
      
         
        if(parseFloat(loanrequest_amt) % parseInt(reqround_factor) > 0){
 
                                    
                                    
                                    if(reqround_factor > 0){
                                        
                                        loanrequest_amt_balance = parseFloat(loanrequest_amt) - (parseFloat(loanrequest_amt) % parseInt(reqround_factor)) + parseInt(reqround_factor);
                                        
                                    }else{
                                        
                                        
                                       loanrequest_amt_balance = parseFloat(loanrequest_amt) - (parseFloat(loanrequest_amt) % parseInt(reqround_factor));
                                        
                                    }
                                    
                                    
                                    
                                }
         
       
       
                                loanrequest_amt_balance = Math.floor(loanrequest_amt_balance);
                                
                             
                                
                                
                                
                                if(loanrequest_amt_balance > loanreqmax_amt) {
                                    
                               
                             
                               //return loanreqmax_amt.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                               $('#loanrequest_amt').val(loanreqmax_amt);
        
           
            
                          }else{
                              
                                //return loanrequest_amt_balance.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                              
                                $('#loanrequest_amt').val(loanrequest_amt_balance);
                              
                              
                          }
                         
                         
                          // �ӹǹ�Ǵ����
                          
                          <?php  //if($_REQUEST["save_mode"]!="insert" && $_REQUEST["save_mode"]!="update"){ ?>
                          
                          var period_payment_ = 0;
                          var loanrequest_amt = parseInt($('#loanrequest_amt').val());
                          var period = parseInt($('#period').val());
 
                          period_payment_ = (parseInt(loanrequest_amt) / parseInt(period));
                          
                         

                          var mos = (parseFloat(period_payment_) % 100) ;
                          
                   
                  
                          if(mos == 0 && loanrequest_amt > 100){
                              
                          payment_show = Math.floor(period_payment_);

                          $('#period_payment').val(payment_show);
                          $('#period_payment2').text(payment_show);
                          $('#p').val(payment_show);

                          }else{
                          var payment_show = parseFloat(period_payment_) - parseFloat(mos);
                          payment_show = parseInt(payment_show) + 100;
                          //$_REQUEST["period_payment"] = Math.floor(payment_show);
                          payment_show = Math.floor(payment_show);
                          
                         // alert(payment_show);
                           //alert("2");
                    
                           
                          $('#period_payment').val(payment_show);
                         // $('#period_payment2').val(payment_show);
                          $('#period_payment2').text(payment_show);
                          $('#p').val(payment_show);
                          
                          
                          <?php //} ?>
                          
                       
                          
                               }
                          
                          //
                         
    }
 
                   })
               })
 
		if(this.checked){ // ������ա�õ�� checkbox 

             if(loantype_code == "11" || loantype_code == "73"){

                               // $('#loanrequest_amt').val(amount - prin_amt)
                                sessionStorage.setItem('contract_'+contract,contract)
				sessionStorage.removeItem('contractdel_'+contract)
				//setTimeout(function(){ 
                                //document.getElementById('formID1').submit();
				//}, 200);
                                
                                
            } // �óչ͡�˹�ͨҡ������ 11 ���� 73 ������ա�õ���ѡ�ź

                              /*  $('#loanrequest_amt').val(amount)
                                sessionStorage.setItem('contract_'+contract,contract)
				sessionStorage.removeItem('contractdel_'+contract)*/
                                
                                var prin_amt = parseInt($(this).attr('data-amt'))
                                var contract = $(this).attr('data-loan')
                                var amount = parseInt($('#loanrequest_amt').val())
			//$('#loanrequest_amt').val(amount + prin_amt)
				sessionStorage.setItem('contractdel_'+contract,contract)
				sessionStorage.removeItem('contract_'+contract)
                                
				//setTimeout(function(){ 
					//document.getElementById('formID1').submit();
				//}, 200);
            
            
                        
		}else{ // ������ա�õ�� checkbox �͡
                    
                    // alert('2')
                    
			var prin_amt = parseInt($(this).attr('data-amt'))
			var contract = $(this).attr('data-loan')
			var amount = parseInt($('#loanrequest_amt').val())
			//$('#loanrequest_amt').val(amount + prin_amt)
				sessionStorage.setItem('contractdel_'+contract,contract)
				sessionStorage.removeItem('contract_'+contract)
				//setTimeout(function(){ 
					//document.getElementById('formID1').submit();
				//}, 200);
		}
	})
	<?php if($_REQUEST["save_mode"]=="insert"){ ?>
	$('.etc_amt').change(function(){
		var amount = $(this).val();
		var code = $(this).attr('data-code2');
		if(amount != ''){
			sessionStorage.setItem(code,amount)
		}
	})
	<?php } ?>
	</script>
	
<br/>