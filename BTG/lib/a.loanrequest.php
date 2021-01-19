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
		</style>	
<?php
		
	$LOANTYPE_CODE=array("'10','20','21'"); //Fix ੾�� �Թ��� � ��ҹ��
	$PROVINCE_CODE=array("'71'"); //Fix �. �ҭ������
	$LOANTYPE_DESC="�ء�Թ"; //Fix ੾�� �Թ��� � ��ҹ��
	$LOAN_CONDITION=3; // 3 ��Ңͧ�Թ��͹
	

      /*
	--  table mdbreqloan
	--  =======================	 
	CREATE TABLE IF NOT EXISTS mdbreqloan (	  	  
      loanreq_docno	varchar(20) NOT NULL ,
	  --�Ţ���㺤Ӣ�
	  loantype_code	 varchar(2) default '10' not null,
	  --�������Թ���
	  member_no	varchar(10) NOT NULL ,
	  --�Ţ����¹��Ҫԡ
	  entry_date	datetime   not null,
	  --�ѹ���ѹ�֡
	  update_date	datetime  not null,
	  --�ѹ����Ѻ��ا
      position_desc	varchar(150) ,
	  --���˹�
	  membgroup_desc	varchar(150) ,
	  --�ѧ�Ѵ
	  workplace	varchar(150) ,
	  --�ç���¹
	  amphur_desc varchar(150) ,
	  --�����
	  province_desc	varchar(150) ,
	  --�ѧ��Ѵ
	  salary_amt	decimal(10,2)  default 0 not null ,
	  --�Թ��͹
	  loan_rate	decimal(10,2)  default 0 not null ,
	  --�ѵ�Ҵ͡����
	  objective_desc	varchar(150) ,
	  --�ѵ�ػ��ʧ�� 
	  loanreqmax_amt	decimal(15,2) default 0 not null,
	  --ǧ�Թ����ا�ش = �Թ��͹*��Ҥ���� 
	  loanrequest_amt	decimal(15,2) default 0 not null,
	  --ǧ�Թ�͡��	  //����¹������Թ loanreqmax_amt
	  loanpayment_type decimal(1,0)  default 1 not null,
	  --ʶҹ� 1 ���� 2 ���ʹ
	  period_max	 decimal(3,0)  default 1 not null,
	  --�ӹǹ�Ǵ�٧�ش	    
	  period		 decimal(3,0)  default 1 not null,
	  --�ӹǹ�Ǵ	  //����¹������Թ period_max
	  period_payment	decimal(15,2) default 0 not null,
	  --���е�ͧǴ  *** ��ͧ���ٵ� ��äԴ ���Ẻ ���ʹ ��� ���� ***** �Դ�ҡ loanrequest_amt ��� period ��� loan_rate
	  startpay_date	datetime  not null,
	  --������觤׹�ѹ��� 
	  loanrequest_status decimal(1,0)  default 0 not null,
	  --ʶҹ�  0 ���׹�ѹ ,8 ŧ�Ѻ���׹�ѹ , -1 ¡��ԡ  , 1  ���ѭ�����º���� 	 
	  --��Ҫԡ �ѹ�֡���� 0 ����� 8 ����������� 	  
	  --��ǹ�ҡ�������Ѻ ���˹�ҷ�� administrator ��Ѻ��ا���¡�� 
      remark	varchar(150) ,
	  --�����˵�	
	  noticedoc_no varchar(20) ,
	  --�Ţŧ�Ѻ
	  noticedoc_date datetime ,
	  --�ѹ���ŧ�Ѻ
	  loanrequestdoc_no varchar(20) ,
	  --�Ţ㺤Ӣ���к�
	  loancontract_no varchar(20) ,
	  --�Ţ����ѭ��
	   PRIMARY KEY (loanreq_docno,loantype_code,member_no)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

	*/
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
					) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
	 mysql_query($strSQL) ;
	 
	 $strSQL="alter table mdbreqloan add phone_no varchar(20) ";
	 mysql_query($strSQL) ;
	 $strSQL="alter table mdbreqloan add email varchar(50)  ";
	 mysql_query($strSQL) ;
	 
	/*
	--  table mdbreqloanfiles
	--   ======================= 
	CREATE TABLE IF NOT EXISTS mdbreqloanfiles (	 
      loanreq_docno	 varchar(20) not null,
	  --�Ţ���㺤Ӣ�
	  loantype_code  varchar(2) not null,
	  --�������Թ���
	  member_no  varchar(10) not null,
	  --�Ţ����¹��Ҫԡ
	  seq_no  decimal(10,0) not null,
	  --�ӴѺ
	  reqfiletype_code  varchar(4) not null,
	  --�������͡���  
	  filename varchar(150) not null,
	  --��������͡���
	   PRIMARY KEY (loanreq_docno,loantype_code,member_no,seq_no)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
	  
	  */
	  
	$strSQL="
	CREATE TABLE if not exists `mdbreqloanfiles` (
	  `loanreq_docno` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
	  `loantype_code` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
	  `member_no` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
	  `seq_no` decimal(10,0) NOT NULL,
	  `reqfiletype_code` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
	  `filename` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
	 mysql_query($strSQL) ;
	  /*
	--  table mdbucfreqfiles 
	--   =======================
	CREATE TABLE IF NOT EXISTS mdbucfreqfiles (	
      reqfiletype_code  varchar(4) not null,
	  --���ʻ������͡���
	  reqfiletype_desc  varchar(150) not null,
	  --�������͡���	 
	  loantype_code   varchar(2) not null,
	  --�������Թ���
	   PRIMARY KEY (reqfiletype_code,loantype_code)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
	  
	  */
		  
	$strSQL="	  
	CREATE TABLE if not exists `mdbucfreqfiles` (
	  `reqfiletype_code` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
	  `reqfiletype_desc` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
	  `loantype_code` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
	 mysql_query($strSQL) ;
	$strSQL="INSERT INTO `mdbucfreqfiles` (`reqfiletype_code`, `reqfiletype_desc`, `loantype_code`) VALUES('1001', '��Ի�Թ��͹', '10'),('1002', '�ѵû�ЪҪ�', '10')";
	 mysql_query($strSQL) ;
	  /*
	--�� �Ţ���㺤Ӣ�����ش
	select CAST(ifnull(max(loanreq_docno),(concat(DATE_FORMAT(now(), "%Y")+543,"000001")))  as  DECIMAL(10,0) )  as maxloanreq_docno
    from mdbreqloan where DATE_FORMAT(entry_date, "%Y%")=DATE_FORMAT(now(), "%Y%")
	;  
	 
	  
	  */

?>	
<?php 


	if(isset($_REQUEST["saveBtn"])){
		    
		  $strSQL="update mdbreqloan set 
						  loanrequest_status='".$_REQUEST["loanrequest_status"]."',
						  remark='".$_REQUEST["remark"]."' ,
						  noticedoc_no='".$_REQUEST["noticedoc_no"]."' ,
						  update_date=now()
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
	  
	  if(isset($_REQUEST["loanrequest_status"])==false){
		  $_REQUEST["loanrequest_status"]=0;
	  }
?>
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
    <form id="formID1" name="formID1" method="post" action="" >
  <tr>
    <td align="left" ><strong><font size="4" face="Tahoma">��¡��㺤Ӣ͡��</font></strong></td>
    <td  align="right" valign="top">
	    <b>�Ţ����¹ : </b>
		<input type="text" name="memb_no" value="<?=$_REQUEST["memb_no"]?>" style="width:100px;"/>
	    <b>�Ţ�Ӣ� : </b>
		<input type="text" name="loanreq_docno" id="loanreq_docno" value="<?=$_REQUEST["loanreq_docno"]?>" style="width:100px;"/>
	    <b>Email : </b>
		<input type="text" name="addr_email" value="<?=$_REQUEST["addr_email"]?>" style="width:100px;"/>		
    </td>
  </tr>
  <tr>
    <td align="left">
    <font color="#0000FF" size="2" face="Tahoma">Loan Request</font></td>
	<?php 
	
	if(isset($_REQUEST["prncdue_date_yyyy"])==false){
		$_REQUEST["prncdue_date_yyyy"]=date('Y', strtotime(' +1 day'));
	}
	if(isset($_REQUEST["prncdue_date_mm"])==false){
		$_REQUEST["prncdue_date_mm"]=date('m', strtotime(' +1 day'));
	}
	if(isset($_REQUEST["prncdue_date_d"])==false){
		$_REQUEST["prncdue_date_d"]=$duedate;//30 �ѹ
	}
	$_REQUEST["prncdue_date_yyyymmdd"]=date('Y-m-d', strtotime(' +'.$_REQUEST["prncdue_date_d"].' day'));
	
	if(isset($_REQUEST["loantype_code_"])==false){
		$_REQUEST["loantype_code_"]=0;
	}
	?>
    <td  align="right" valign="top">
		<b>ʶҹ� : </b>
		<select name="loanrequest_status" onchange="changView()">
			<option value="0" <?=$_REQUEST["loanrequest_status"]==0?"selected":""?> >0:��ŧ�Ѻ</option>
			<option value="8" <?=$_REQUEST["loanrequest_status"]==8?"selected":""?> >8:ŧ�Ѻ</option>
			<option value="1" <?=$_REQUEST["loanrequest_status"]==1?"selected":""?> >1:�͡��äú��ǹ</option>
			<option value="-9" <?=$_REQUEST["loanrequest_status"]==-9?"selected":""?> >-9:¡��ԡ</option>
		</select>
		<b>������ : </b>
		<select name="loantype_code_" onchange="changView()">
			<option value="0" <?=$_REQUEST["loantype_code_"]=="0"?"selected":""?> >-- ������ --</option>
		  <?php 
				$strSQL="select * from lnloantype where loantype_code in (".implode(",",$LOANTYPE_CODE).")";
				//echo $strSQL;
				$value = array('LOANTYPE_CODE','LOANTYPE_DESC');
				 list($Num_Rows_,$list_info_) = get_value_many_oci($strSQL,$value); 
						
				$j=0;
				for($i=0;$i<$Num_Rows_;$i++){
					$loantype_code=$list_info_[$i][$j++];
					$loantype_desc=$list_info_[$i][$j++];
					$j=0;
					?>
			<option value="<?=$loantype_code?>" <?=$_REQUEST["loantype_code_"]==$loantype_code?"selected":""?> ><?=$loantype_code?>:<?=$loantype_desc?></option>
		  <?php } ?>	
		</select>
		<!--
	    <b>�ѹ�ú��˹��ա : </b>
		<input type="text" name="prncdue_date_d" value="<?=$_REQUEST["prncdue_date_d"]?>" style="width:30px;"/>
	    <b>�ѹ�Ѵ� ���  �ѹ��� : </b>
		<input type="text" name="prncdue_date_yyyymmdd" value="<?=$_REQUEST["prncdue_date_yyyymmdd"]?>" style="width:100px;" readonly="true"/>	
        -->		
		<input type="submit" id="re" name="retr" value="�֧"/>
    </td>
  </tr>
    </form>
  <tr>
    <td colspan="2" align="left"><hr color="#999999" size="1"/></td>
  </tr>
</table>
<br />

<?php 
  $strSQL="select l.*,m.memb_fullname 
						from mdbreqloan l ,mbmembmaster m 
						where m.member_no=l.member_no 
											".($_REQUEST["memb_no"]!=""?(" and m.member_no like '%".$_REQUEST["memb_no"]."%' "):"")."
											".($_REQUEST["loanreq_docno"]!=""?("and l.loanreq_docno like '%".$_REQUEST["loanreq_docno"]."%' "):"")."
											".($_REQUEST["email"]!=""?("and m.email like '%".$_REQUEST["email"]."%' "):"")."
											".($_REQUEST["loanrequest_status"]!=""?("and l.loanrequest_status = '".$_REQUEST["loanrequest_status"]."' "):"")."
											".($_REQUEST["loantype_code_"]!="0"?("and l.loantype_code = '".$_REQUEST["loantype_code_"]."' "):"")."
						order by l.update_date desc,l.loanrequest_status asc";
  //echo 	$strSQL;					
  $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
  $numrows=mysql_num_rows($objQuery);
  $i=0;
  if($numrows>0){
?>

<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#CCCCCC"><table width="100%" border="0" cellspacing="1" cellpadding="3">
      <tr>
        <td align="center" bgcolor="#6699FF"><strong><font color="#FFFFFF">�ѹ���ѹ�֡</font></strong></td>
        <td align="center" bgcolor="#6699FF"><strong><font color="#FFFFFF">�Ţ�����¹</font></strong></td>
        <td align="center" bgcolor="#6699FF"><strong><font color="#FFFFFF">��������´</font></strong></td>
        <td align="center" bgcolor="#6699FF"><strong><font color="#FFFFFF">ʶҹ�</font></strong></td>
        <td align="center" bgcolor="#6699FF"><strong><font color="#FFFFFF">�Ţŧ�Ѻ</font></strong></td>
        <td align="center" bgcolor="#6699FF"><strong><font color="#FFFFFF">�����˵�</font></strong></td>
        <td height="25" align="center" bgcolor="#6699FF"><strong><font color="#FFFFFF">-</font></strong></td>
      </tr>
      <tr>
	 <?php 
		while($q = mysql_fetch_array($objQuery)){			
			$update_date			=		$q['update_date'];
			$member_no_			=		$q['member_no'];
			$memb_fullname			=		$q['memb_fullname'];
			$phone_no_				=		$q['phone_no'];
			$email_						=		$q['email'];
			$loantype_code			=		$q['loantype_code'];
			$loanreq_docno			=		$q['loanreq_docno'];
			$loanrequest_amt		=		$q['loanrequest_amt'];
			$period						=		$q['period'];
			$period_payment		=		$q['period_payment'];
			$loanpayment_type		=		$q['loanpayment_type'];
			$loanrequest_status	=		$q['loanrequest_status'];
			$remark						=		$q['remark'];
			$noticedoc_no			=		$q['noticedoc_no'];
		?>
    <form id="formID<?=$member_no_?>" name="formID<?=$member_no_?>" method="post" action="" enctype="multipart/form-data" onsubmit="return confirm('��س��׹�ѹ��÷���¡��')" >
	<input type="hidden"  value="LoanRequest" name="menu" />
	<input type="hidden"  value="<?=$member_no_?>" name="memb_no" />
	<input type="hidden"  value="edit" name="action" />
	<input type="hidden"  value="<?=$loanreq_docno?>" name="loanreq_docno" />
	<input type="hidden"  value="<?=$loantype_code?>" name="loantype_code" />
	<input type="hidden"  value="<?=$loantype_code?>" name="loantype_code_" />
      <tr valign="top">
        <td align="center" bgcolor="#FFFFFF"><?=$update_date?></td>
        <td align="center" bgcolor="#FFFFFF"><strong><?=$member_no_?></strong></td>
	    <td align="left" bgcolor="#FFFFFF" width=200>
		<a href="?menu=LoanRequest&loanreq_docno=<?=$loanreq_docno?>&loantype_code=<?=$loantype_code?>&loantype_code_=<?=$loantype_code?>"><font  color=blue><strong>�Ţ���</strong>: <?=$loanreq_docno?></font></a>
		<hr/>
		
		<!-- select ��Ҫ��ͨҡ oracle �� ��� -->
		
		<?php 
				$strSQL="select mup.prename_desc || mb.memb_name || ' ' || mb.memb_surname as full_name from mbmembmaster mb , mbucfprename mup where  mb.prename_code = mup.prename_code and member_no = '$member_no_'";
				//echo $strSQL;
				$value = array('FULL_NAME');
				 list($Num_Rows_,$list_info_) = get_value_many_oci($strSQL,$value); 
						
				$j=0;
				for($i=0;$i<$Num_Rows_;$i++){
					$full_name=$list_info_[$i][$j++];
					
					$j=0;
					?>
		
		<!-- -->
		
		<strong><font >����-ʡ��</font></strong>: <?=$full_name?><br/>
		<?php } ?>
		<strong><font >������</font></strong>:<?=($loantype_code=="10"?"�ء�Թ":"")?><br/>
		<strong><font >ǧ�Թ</font></strong>:<?=number_format($loanrequest_amt, 2)?><br/>
		<strong><font >�Ǵ</font></strong>:<?=$period?><br/>
		<strong><font >���е�ͧǴ</font></strong>:<?=number_format($period_payment,2)?><br/>
		<strong><font >����������</font></strong>:<?=($loanpayment_type==1?"����":"���ʹ")?><br/>
		<strong><font >����Դ���</font></strong>: <?=$phone_no_?><br/>
		<strong><font >Email</font></strong>: <?=$email_?><br/> 
		<hr/>
		<?php
				  
			  $strSQL_="select * from  mdbucfreqfiles u
								where u.loantype_code='".$loantype_code."' 
								order by u.reqfiletype_code asc ";
			  //echo 	$strSQL_;				
			  $objQuery_ = mysql_query($strSQL_) ;
			  $numrows_=mysql_num_rows($objQuery_);
			  while($q = mysql_fetch_array($objQuery_)){					   
		  ?>
      <li>
	  <?=$q["reqfiletype_desc"]?> = 
	  <?php
			$strSQL_="select * from  mdbreqloanfiles f
								where loantype_code='".$loantype_code."' 
								and reqfiletype_code='".$q["reqfiletype_code"]."'  
								and loanreq_docno='".$loanreq_docno."'
								order by reqfiletype_code asc ";
			  //echo 	$strSQL_;				
			 $objQuery__ = mysql_query($strSQL_) ;
             $q_ = mysql_fetch_array($objQuery__);
			 $target_dir = $q_["filename"];

	  if(file_exists($target_dir)){ ?>
	   <a href="<?=$target_dir?>" target="_blank" ><font color=blue><b>Download</b></font></a>
	  <?php } ?></li>
      <?php 
			 }
	  ?>   
		</td>
		<td align="center" bgcolor="#FFFFFF">
		<select name="loanrequest_status">
			<option value="0" <?=$loanrequest_status==0?"selected":""?> >0:��ŧ�Ѻ</option>
			<option value="8" <?=$loanrequest_status==8?"selected":""?> >8:ŧ�Ѻ</option>
			<option value="1" <?=$loanrequest_status==1?"selected":""?> >1:�͡��äú��ǹ</option>
			<option value="-9" <?=$loanrequest_status==-9?"selected":""?> >-9:¡��ԡ</option>
		</select>
		</td>
        <td align="center" bgcolor="#FFFFFF"><input type="text"  value="<?=$noticedoc_no?>" name="noticedoc_no" size=8 /></td>
        <td align="center" bgcolor="#FFFFFF"><font color="red"><input type="text"  value="<?=$remark?>" name="remark"  /></font></td>
        <td align="center" bgcolor="#FFFFFF" height="25" ><input type="submit"  value="�ѹ�֡" name="saveBtn" /></td>
      </tr>
	  </form>
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
						 
						 $_REQUEST["loanreq_docno"]=$q["loanreq_docno"];
						 $_REQUEST["loantype_code"]=$q["loantype_code"];
						 $_REQUEST["member_no"]=$q["member_no"];
						 $_REQUEST["phone_no"]=$q["phone_no"];
						 $_REQUEST["email"]=$q["email"];
						 $_REQUEST["entry_date"]=$q["entry_date"];
						 $_REQUEST["update_date"]=$q["update_date"];
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
						 $_REQUEST["save_mode"]="update";
	  }
  }
  
  }
?>
<table width="95%" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td >
	<?php
       
	  /*
	  
	  �ѹ�֡�͡������� 10 ��ҹ��
	  ====================================================
	  1.ǧ�Թ�٧�ش  3 ��� �ͧ�Թ��͹ ����Թ 100,000 �� 25 �Ǵ
	  2.�óվ� �Թ��� ������ 88 ���  ��� contract_status=1 �� 3 ��Ңͧ�Թ��͹ ����Թ 50,000 �� 12 �Ǵ
	  3.�ѹ�֡���� ���� ������ ���˹�ҷ�� ������ web portal �����Ţŧ�Ѻ ������ �������ҧ����
	  4.�ѧ�Ѻ ��� Upload �͡��� Ṻ 2 ���  1.��Ի�Թ��͹  2.�ѵû�ЪҪ�
	  5.select count(*) as cnt from dpdeptmaster where depttype_code = '88' and deptclose_status = 0 and member_no=''; ��ͧ�պѭ��
	  
	  */
	  
	    
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
	  
				$LoanDocPrint = array(
				   "10"=>array('LoanReqdoc'.$_REQUEST["loantype_code"].''),
				   "21"=>array('LoanReqdoc'.$_REQUEST["loantype_code"].''),
				   "20"=>array(
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_1',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_2',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_3',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_4',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_5',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_6',
					'LoanReqdoc'.$_REQUEST["loantype_code"].'_7'
					)
				);
				
	for($z=0;$z<count($LoanDocPrint[$_REQUEST["loantype_code"]]);$z++){
				
		$file_print=$LoanDocPrint[$_REQUEST["loantype_code"]][$z];
				//echo $file_print;
				//$file_print='LoanReqdoc'.$_REQUEST["loantype_code"].'.html';
		if(file_exists($file_print.".html")){
					
		$path_root="loadreqdoc/";
	    $loanreq_docfile=$path_root.$file_print.$_REQUEST["loanreq_docno"].'.html';
	    //$loanreq_docfile=$path_root.'LoanReqdoc'.$_REQUEST["loantype_code"].$_REQUEST["loanreq_docno"].'.html';
		//echo  $loanreq_docfile;
		if(isset($_REQUEST["loanreq_docno"])&&file_exists($loanreq_docfile)){
				?>
				<input type="button" name="printBtn" id="printBtn" value="�����㺤Ӣ� <?=($_REQUEST["loantype_code"]!="20"?"":("��ǹ���".($z+1)))?>" onclick="printFrame('LoanReqdoc<?=$_REQUEST["loanreq_docno"].$z?>')"/>
				<iframe src="<?=$loanreq_docfile?>" width="100%" height="<?=$_REQUEST["loantype_code"]!="20"?"2050":"350"?>" id="LoanReqdoc<?=$_REQUEST["loanreq_docno"].$z?>" style="display:;"><?=$body?></iframe>
				<?php
		}
	   }
	}
		?>
	</td></tr></table>
	
	<script>
	 function printFrame(id) {
		    var is_chrome = ((navigator.userAgent.toLowerCase().indexOf('chrome') > -1) &&(navigator.vendor.toLowerCase().indexOf("google") > -1));
			if(is_chrome==false){
				alert("�к��ͧ�Ѻ��þ���캹 Google Chrome Browser ��ҹ��");
				return false;
			}
			if(confirm("��س��׹�ѹ��þ����")){
				var frm = document.getElementById(id).contentWindow;
				frm.focus();// focus on contentWindow is needed on some ie versions
				frm.print();
			}
            return true;
	}
	
	function changView(){
		document.getElementById("loanreq_docno").value="";
		document.getElementById("formID1").submit();
	}
	</script>
	
<br/>