<?php
session_start();
@header('Content-Type: text/html; charset=tis-620');
?>
<?php require "../include/jquery.popup.php"; ?>
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
		    $("#datepicker-th").datepicker({ dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay, dayNames: ['�ҷԵ��', '�ѹ���', '�ѧ���', '�ظ', '����ʺ��', '�ء��', '�����'],
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
	
	 $mailtype_code='M01';
	 $mailtype_desc='1.��������駢����Ţ������';
	 $duedate=45;

	 $sql="create table cmmaillog (
				pk_id varchar2(50) not null ,
				mailtype_code varchar2(10) not null,
				member_no varchar2(10) not null,
				memb_fullname varchar2(250) ,
				salary_id varchar2(10) ,
				addr_email varchar2(150) not null,
				mailtype_desc varchar2(150),
				ref_pk varchar2(255),
				sentmail_date date,
				sentmail_flag number(1,0) default 0 not null,
				sentmail_remark varchar2(150),
				entry_id varchar2(50),
				entry_date date
				)";
	 get_single_value_oci($sql,$value1);			
	 $sql="ALTER TABLE cmmaillog ADD ( CONSTRAINT cmmaillog_PK PRIMARY KEY ( PK_ID,mailtype_code, MEMBER_NO,sentmail_date )) "; 
	 get_single_value_oci($sql,$value1);
	 $sql="ALTER TABLE cmmaillog modify ref_pk varchar2(255) "; 
	 get_single_value_oci($sql,$value1);
 

if(isset($_REQUEST["save"])){
	
	/*
	$sql="update yrconfirmmaster 
				set confirm_id='$member_no' ,confirm_email='$email',confirm_date=sysdate 
				,confirm_flag='".$_REQUEST["confirm_flag"]."',confirm_remark='".str_replace("'","^",$_REQUEST["confirm_remark"])."' 
				where member_no='$member_no' 
				and to_char(balance_date,'dd-MM-')||to_char(to_number(to_char(balance_date,'yyyy'))+543)='".$_REQUEST["slip_date"]."' ";
	//echo $sql;			
    get_single_value_oci($sql,$value1);
	
	echo "<script>alert('�к����Ѻ��úѹ�֡���º����');</script>";
	*/
}

if($_REQUEST["sentmail_action"]=="1"){
	
/*	
config in include/conf.c.php 
$WEB_LINK="http://127.0.0.1/BTG/webportal/d/index.php";
$MAIL_HOST="smtp.gmail.com";
$MAIL_PORT=587;
$MAIL_USR="isocare.iscobtg@gmail.com";
$MAIL_PWD="0815501888";
$MAIL_FROM="isocare.iscobtg@gmail.com";
$MAIL_FROM_NM="��.ື���";
$MAIL_DEBUG=1;// 0 =disable , 1=enable
$MAIL_AUTH_FLAG=true;
$MAIL_SECURE='tls';
*/	

$SLIP_DATE=ConvertDateYmd(date("Y-m-d"),"long");
$MEMB_NO=$_REQUEST["memb_no"];

				  $strSQL_ = "SELECT 
										 m.member_no,
										 m.salary_id,
										 m.memb_name,
										 m.memb_surname,
										 mb.membgroup_desc,
										 m.addr_email 
										FROM mbmembmaster m,mbucfmembgroup mb
										where m.membgroup_code=mb.membgroup_code 
										and m.member_no='".$MEMB_NO."'";
					//echo 	$strSQL_;				
					$value_ = array('MEMBER_NO','SALARY_ID','MEMB_NAME','MEMB_SURNAME','MEMBGROUP_DESC','ADDR_EMAIL');		
					list($Num_Rows_,$mbdata) = get_value_many_oci($strSQL_,$value_);	
					
$SALARY_ID=$mbdata[0][1];
$MEMB_NAME=$mbdata[0][2];
$MEMB_SURNAME=$mbdata[0][3];
$MEMBGROUP_DESC=$mbdata[0][4];
$MEMBER_EMAIL=$mbdata[0][5];
$N_TOPIC_ID=$_REQUEST["n_topic_id"];
$N_TOPIC=$_REQUEST["n_topic"];
$N_DETAILS=$_REQUEST["n_details"];
$N_DATE=$_REQUEST["n_date"];
$SLIP_DATE=$_REQUEST["slip_date"];
$SLIP_DATE_=ConvertDateYmd($SLIP_DATE,"long");

if($MAIL_TEST_MODE){
$MEMBER_EMAIL=$MAIL_TEST_EMAIL;
}

$Subject=conv("�駢����Ţ������");//conv($MAIL_FROM_NM." "."˹ѧ����׹�ѹ�ʹ���˹�� ����Թ�ҡ � �ѹ��� ".$SLIP_DATE);	
$body=file_get_contents('../include/emailnews_template.html', true);
$body=str_replace("COOP_NAME",conv($MAIL_FROM_NM),$body);
$body=str_replace("SENT_DATE",conv(ConvertDate(date("d-m-Y"),"long")),$body);
$body=str_replace("SLIP_DATE",conv($SLIP_DATE_),$body);
$body=str_replace("MEMBER_NO",$MEMB_NO,$body);
$body=str_replace("WEB_LINK",$WEB_LINK,$body);
$body=str_replace("MEMB_NAME",conv($MEMB_NAME),$body);
$body=str_replace("MEMB_SURNAME",conv($MEMB_SURNAME),$body);
$body=str_replace("SALARY_ID",$SALARY_ID,$body);
$body=str_replace("MEMBGROUP_DESC",conv($MEMBGROUP_DESC),$body);
$body=str_replace("N_TOPIC_ID",$N_TOPIC_ID,$body);
$body=str_replace("N_TOPIC",conv($N_TOPIC),$body);
$body=str_replace("N_DETAILS",conv($N_DETAILS),$body);
$body=str_replace("N_DATE",conv(ConvertDate($N_DATE,"long")),$body);
$body=str_replace("SLIP_DATE",conv($SLIP_DATE_),$body);
//$body=conv($body);
$mail_to=array($MEMBER_EMAIL);
$mail_to_nm=array(conv($MEMB_NAME." ".$MEMB_SURNAME));	
$MAIL_FROM_NM=conv($MAIL_FROM_NM);

$msg=sendMail(
	$MAIL_HOST,
	$MAIL_PORT,
	$MAIL_USR,
	$MAIL_PWD,
	$MAIL_FROM,
	$MAIL_FROM_NM,
	$mail_to,
	$mail_to_nm,
	$Subject,
	$body,
	$MAIL_DEBUG,
	$MAIL_AUTH_FLAG,
	$MAIL_SECURE
	);
	
  //echo $msg;	
  
 if($msg=="1"){ 
    /*
	$sql="update yrconfirmmaster 
				set sentmail_date=sysdate 
				,sentmail_flag='1'
				,sentmail_remark='"."success"."'
				where member_no='".$MEMB_NO."' 
				and to_char(balance_date,'yyyy-mm-dd')='".$_REQUEST["slip_date"]."' ";
	//echo $sql;			
    get_single_value_oci($sql,$value1);
  	*/
	
	 $sql="insert into cmmaillog (
				pk_id,
				mailtype_code ,
				member_no ,
				memb_fullname  ,
				salary_id  ,
				addr_email ,
				mailtype_desc ,
				ref_pk ,
				sentmail_date ,
				sentmail_flag ,
				sentmail_remark ,
				entry_id ,
				entry_date 
				)values(
				to_char(systimestamp,'YYYY-MM-DD.HH24:MI:SS:FF'),
				'".$mailtype_code."' ,
				'".$MEMB_NO."' ,
				'".($MEMB_NAME." ".$MEMB_SURNAME)."'  ,
				'',
				'".$MEMBER_EMAIL."' ,
				'".$mailtype_desc."'  ,
				'".$N_TOPIC_ID."'  ,
				sysdate ,
				1 ,
				'success' ,
				'".$member_no."' ,
				sysdate 
				)";
	 get_single_value_oci($sql,$value1);		
     
     //echo $sql;
	 
	echo "<script>alert('�к����� Email ���º���� ".$MEMB_NO."  价�� ".$MEMBER_EMAIL."');</script>";
	
 }else{
	 
	/*
	$sql="update yrconfirmmaster 
				set sentmail_date=sysdate 
				,sentmail_flag='1'
				,sentmail_remark='".$msg."'
				where member_no='".$MEMB_NO."' 
				and to_char(balance_date,'yyyy-mm-dd')='".$_REQUEST["slip_date"]."' ";				
    get_single_value_oci($sql,$value1);
	*/
	
	 $sql="insert into cmmaillog (
				pk_id,
				mailtype_code ,
				member_no ,
				memb_fullname  ,
				salary_id  ,
				addr_email ,
				mailtype_desc ,
				ref_pk ,
				sentmail_date ,
				sentmail_flag ,
				sentmail_remark ,
				entry_id ,
				entry_date 
				)values(
				to_char(systimestamp,'YYYY-MM-DD.HH24:MI:SS:FF'),
				'".$mailtype_code."' ,
				'".$MEMB_NO."' ,
				'".($MEMB_NAME." ".$MEMB_SURNAME)."'  ,
				'',
				'".$MEMBER_EMAIL."' ,
				'".$mailtype_desc."'  ,
				'".$N_TOPIC_ID."'  ,
				sysdate ,
				1 ,
				'".$msg."' ,
				'".$member_no."' ,
				sysdate 
				)";
	 get_single_value_oci($sql,$value1);		
	 
    echo $msg;
	
 } 
 
}



	   ?>
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
    <form id="formID1" name="formID1" method="post" action="" >
  <tr>
    <td align="left" ><strong><font size="4" face="Tahoma">�駢����Ţ������<br/> �ҧ Email</font></strong></td>
    <td  align="right" valign="top">
	    <b>�Ţ����¹��Ҫԡ : </b>
		<input type="text" name="memb_no" value="<?=$_REQUEST["memb_no"]?>" style="width:100px;"/>
	    <b>�Ţ��ѡ�ҹ : </b>
		<input type="text" name="salary_id" value="<?=$_REQUEST["salary_id"]?>" style="width:100px;"/>
	    <b>Email : </b>
		<input type="text" name="addr_email" value="<?=$_REQUEST["addr_email"]?>" style="width:100px;"/>		
    </td>
  </tr>
  <tr>
    <td align="left">
    <font color="#0000FF" size="2" face="Tahoma">Send News by Email</font></td>
	<?php 
	
	if(isset($_REQUEST["due_date_yyyy"])==false){
		$_REQUEST["due_date_yyyy"]=date('Y', strtotime(' +1 day'));
	}
	if(isset($_REQUEST["due_date_mm"])==false){
		$_REQUEST["due_date_mm"]=date('m', strtotime(' +1 day'));
	}
	if(isset($_REQUEST["due_date_d"])==false){
		$_REQUEST["due_date_d"]=$duedate;//30 �ѹ
	}
	$_REQUEST["due_date_yyyymmdd"]=date('Y-m-d', strtotime(' +'.$_REQUEST["due_date_d"].' day'));
	
	if(isset($_REQUEST["sentmail_flag"])==false){
		 $_REQUEST["sentmail_flag"]="0";
	}
	
	
	 $sql="create table cmwebnews (
				pk_id varchar2(50) not null ,
				coop_id varchar2(10) ,
				count_edit number(15,0) default 0 not null ,
				who_post varchar2(150),
				who_edit varchar2(150),
				filename varchar2(500),
				groupshow varchar2(2),
				n_topic varchar2(1000),
				n_details varchar2(4000),
				n_date date 
				)";
	 get_single_value_oci($sql,$value1);			
	 $sql="ALTER TABLE cmwebnews ADD ( CONSTRAINT cmwebnews_PK PRIMARY KEY ( PK_ID)) "; 
	 get_single_value_oci($sql,$value1);		
	 
	$strSQL = " SELECT 
						id as  id,
						n_topic as n_topic,
						n_details as n_details,
						date_format(n_date,'%Y-%m-%d') as n_date,
						who_post,
                        FilesName
					FROM 
						news
					order by id desc  ";
	$value = array('id','n_topic','n_details','n_date','who_post','FilesName');
	list($Num_Rows,$list_info) = get_value_many_sql($strSQL,$value);
	$j=0;	
	for($i=0;$i<$Num_Rows;$i++){
				
		$id[$i]		 =	 $list_info[$i][$j++];
		$n_topic[$i]	 =	 $list_info[$i][$j++];
		$n_details[$i]	 =	 $list_info[$i][$j++];
		$n_date[$i]	 =	 $list_info[$i][$j++];
		$who_post[$i] =	 $list_info[$i][$j++];
        $FilesName[$i] =	 $list_info[$i][$j++];
		$j=0;
		$sql="insert into cmwebnews (
				pk_id ,
				coop_id ,
				count_edit ,
				who_post ,
				who_edit ,
				filename ,
				groupshow ,
				n_topic ,
				n_details ,
				n_date  
				)values (
				'".$id[$i]."' ,
				'' ,
				0 ,
				'".$who_post[$i]."' ,
				'".$who_post[$i]."' ,
				'".$FilesName[$i]."' ,
				'' ,
				'".$n_topic[$i]."' ,
				'".$n_details[$i]." ' ,
				to_date('".$n_date[$i]."','yyyy-mm-dd')  
				)";
		// echo $sql.";<br/>";		
	  if($n_topic[$i]!=""){			
	  get_single_value_oci($sql,$value1);	
	  
		if(isset($_REQUEST["n_topic_id"])==false){
			 $_REQUEST["n_topic_id"]=$id[$i];
		}
		
	  }
	}
        
	
	?>
	
    <td  align="right" valign="top">
		<b>��Email : </b>
        <select name="sentmail_flag" id="sentmail_flag"  onchange="this.form.submit()" >
            <option value="" <?=((strlen($_REQUEST["sentmail_flag"])==0)?"selected":"")?>>������</option>
            <option value="0" <?=(($_REQUEST["sentmail_flag"]=="0")?"selected":"")?>>����</option>
            <option value="1" <?=(($_REQUEST["sentmail_flag"]=="1")?"selected":"")?>>������</option>
    	</select>
		<b>������� : </b>
        <select name="n_topic_id"  onchange="this.form.submit()" >
            <!--<option value="" <?=((strlen($_REQUEST["n_topic_id"])==0)?"selected":"")?>>������</option>-->
			<?php 
			    $j=0;
				for($i=0;$i<$Num_Rows;$i++){
					$id[$i]		 =	 $list_info[$i][$j++];
					$n_topic[$i]	 =	 substr($list_info[$i][$j++],0,50)."...";
					$j=0;
					if($n_topic[$i]!="...")	{
					?>
            <option value="<?=$id[$i]?>" <?=(($_REQUEST["n_topic_id"]==$id[$i])?"selected":"")?>><?="[".$n_date[$i]."]"?>:<?=$n_topic[$i]?></option>
			<?php } 
				} ?>
    	</select>		
		<div style="display:none;">
	    <b>�ѹ���Ө�����͹��ѧ : </b>
		<input type="text" name="due_date_d" value="<?=$_REQUEST["due_date_d"]?>" style="width:30px;"/>
	    <b>�ѹ ��͹� ������ѹ��� : </b>
		<input type="text" name="due_date_yyyymmdd" value="<?=$_REQUEST["due_date_yyyymmdd"]?>" style="width:100px;"/>		
		</div>
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
//if((isset($_REQUEST["memb_no"])||isset($_REQUEST["salary_id"])||isset($_REQUEST["addr_email"]))&&isset($_REQUEST["retr"])){

?>

<?php 
if($_REQUEST["sentmail_action"]=="0"){
	
	$strSQL = "SELECT 
										 m.member_no,
										 m.salary_id,
										 m.memb_name||' '||m.memb_surname as memb_nm ,
										 to_char(m.member_date,'yyyy/mm/dd')  as member_date,
										 m.addr_email as MEMB_EMAIL,
										 ml.SENTMAIL_FLAG  as  SENTMAIL_FLAG,
										 to_char(ml.sentmail_date,'yyyy/mm/dd hh24:mi:ss')  as  SENTMAIL_DATE,
										 ml.SENTMAIL_REMARK as  SENTMAIL_REMARK,
										 (select ml.ref_pk||':'||w.n_topic from cmwebnews w where w.pk_id=ml.ref_pk) as  ref_pk
										FROM 
											mbmembmaster m,cmmaillog ml 
										WHERE  ml.member_no=m.member_no and ml.mailtype_code='".$mailtype_code."' and m.member_no like '%".$_REQUEST["memb_no"]."%' 
										order by ml.SENTMAIL_DATE asc  ";
					//echo 	$strSQL;				
					$value = array('MEMBER_NO','SALARY_ID','MEMB_NM','MEMBER_DATE','MEMB_EMAIL','SENTMAIL_FLAG','SENTMAIL_DATE','SENTMAIL_REMARK','REF_PK');		
					list($Num_Rows,$slip_show) = get_value_many_oci($strSQL,$value);	
					$j=0;

?>	   
    <div class="popup-box" id="popup-box-0">
    <div class="close">X</div>
<br/>
<br/>
<br/>
	<table border="0" align="center" cellpadding="0" cellspacing="0">
	 <tr>
	 <td bgcolor="#CCCCCC">
	 <br/>
      <?php for($i=0;$i<$Num_Rows;$i++){
		  
		  
		  $member_no=$slip_show[$i][$j++];
		  $salary_id=$slip_show[$i][$j++];
		  $memb_nm=$slip_show[$i][$j++];
		  $member_date=$slip_show[$i][$j++];
		  $member_email=$slip_show[$i][$j++];
		  $sendmail_cnt=$slip_show[$i][$j++];
		  $sendmail_date=$slip_show[$i][$j++];
		  $sendmail_remark=$slip_show[$i][$j++];
		  $ref_pk=$slip_show[$i][$j++];
		  
		  if($sendmail_cnt==0){$sendmail_cnt_="#FFCC33";}
		  if($sendmail_cnt<0){$sendmail_cnt_="blue";}
		  if($sendmail_cnt>0){$sendmail_cnt_="green";}
		  
		  $j=0;
		  ?>  
		 <?php if($i==0){ ?>	 
				<table width="500" align="center" border="0" cellspacing="1" cellpadding="3">
				  <tr>
					<td align="center" bgcolor="#FFFFFF" colspan="5" ><strong><font color="#000000">����ѵԡ���� Email <?=$mailtype_code?>: <?=$mailtype_desc?> ��Ҫԡ����¹ : <?=($member_no)?></font></strong></td>
				  </tr>	
				  <tr>
					<td align="center" bgcolor="#6699FF"><strong><font color="#FFFFFF">����¹</font></strong></td>
					<td align="center" bgcolor="#6699FF"><strong><font color="#FFFFFF">��ѡ�ҹ</font></strong></td>
					<td align="center" bgcolor="#6699FF"><strong><font color="#FFFFFF">����-ʡ��</font></strong></td>
					<td align="center" bgcolor="#6699FF"><strong><font color="#FFFFFF">�ѹ�������Ҫԡ</font></strong></td>
					<td align="center" bgcolor="#FFCC33"><strong><font color="#FFFFFF">Email</font></strong></td> 	
				  </tr>
				  <tr>
					<td align="center" bgcolor="#FFFFFF"><font color="#000000"><?=($member_no)?></font></td>
					<td align="center" bgcolor="#FFFFFF"><font color="#000000"><?=($salary_id)?></font></td>
					<td align="center" bgcolor="#FFFFFF"><font color="#000000"><?=($memb_nm)?></font></td>
					<td align="center" bgcolor="#FFFFFF"><font color="#000000"><?=($member_date)?></font></td>
					<td align="center" bgcolor="#FFFFFF"><font color="#000000"><?=($member_email)?></font></td>
				  </tr> 	  
				</table>
				<table width="500"  align="center"  border="0" cellspacing="1" cellpadding="3">
				  <tr>  
					<td align="center" bgcolor="#6699FF"><strong><font color="#FFFFFF">�ӴѺ</font></strong></td>
					<td align="center" bgcolor="#6699FF"><strong><font color="#FFFFFF">��������´</font></strong></td>
					<td align="center" bgcolor="#6699FF"><strong><font color="#FFFFFF">�ѹ����������ش</font></strong></td>
					<td align="center" bgcolor="#6699FF"><strong><font color="#FFFFFF">�����˵�</font></strong></td>
				  </tr>
		  <?php } ?>	  
		  <?php if($i>=0){ ?>	
				  <tr>
					<td align="center" bgcolor="#FFFFFF"><font color="#000000"><?=($i+1)?></font></td>
					<td align="left" bgcolor="#FFFFFF"><font color="#000000"><?=str_replace("|","<br/>",$ref_pk)?></font></td>
					<td align="center" bgcolor="#FFFFFF"><font color="#000000"><?=($sendmail_date)?></font></td>
					<td align="center" bgcolor="<?=$sendmail_cnt_?>"><font color="#000000"><?=($sendmail_remark)?></font></td>
				  </tr> 
		  <?php } ?>	 
		  
		  <?php if($i>=$Num_Rows){ ?>	 
		  <?php } ?>  
      <?php } ?>  
	  
				</table>
	</td>
  </tr>
</table>
<br/>
<br/>
<br/>
</div>
<a class="popup-link-0" id="popup-link" style="display:none;">open</a><script>$('#popup-box-0').show();</script>
<?php } ?>	   
   
<?php 
if(isset($_REQUEST["sentmail_action_all"])){
	
/*	
config in include/conf.c.php 
$WEB_LINK="http://127.0.0.1/BTG/webportal/d/index.php";
$MAIL_HOST="smtp.gmail.com";
$MAIL_PORT=587;
$MAIL_USR="isocare.iscobtg@gmail.com";
$MAIL_PWD="0815501888";
$MAIL_FROM="isocare.iscobtg@gmail.com";
$MAIL_FROM_NM="��.ື���";
$MAIL_DEBUG=1;// 0 =disable , 1=enable
$MAIL_AUTH_FLAG=true;
$MAIL_SECURE='tls';
*/	

$SLIP_DATE=ConvertDateYmd(date("Y-m-d"),"long");

				  $strSQL_ = "SELECT * FROM (
									SELECT e.* from (
									SELECT c.*,
									(select count(*) from cmmaillog ml where ml.member_no=c.member_no and ml.mailtype_code='".$mailtype_code."' and ml.ref_pk =c.n_topic_id) as  SENTMAIL_CNT
									FROM ( SELECT 
										 m.member_no,
										 m.salary_id,
										 m.memb_name,
										 m.memb_surname,
										 mb.membgroup_desc,
										 m.addr_email ,
											 l.pk_id as n_topic_id,l.n_topic,l.n_details,
											 to_char(l.n_date,'yyyy-mm-dd')  as n_date,
											 to_char(l.n_date,'yyyy-mm-dd')  as slip_date,
											 to_char(l.n_date,'dd/mm/yyyy','NLS_CALENDAR=''THAI BUDDHA')  as slip_date_th
											FROM mbmembmaster m,mbucfmembgroup mb,cmwebnews l 
											WHERE  ( m.resign_status = 0 or m.resign_date > sysdate ) 
											".($_REQUEST["n_topic_id"]!=""?(" and l.pk_id = '".$_REQUEST["n_topic_id"]."' "):"")."	 										
										order by m.member_no asc ) c  
										) e where e.SENTMAIL_CNT <= 0 
									   ) where  rownum <=".$MAIL_SENT_NUM." 	";
					//echo 	$strSQL_;				
					$value_ = array('MEMBER_NO','SALARY_ID','MEMB_NAME','MEMB_SURNAME','MEMBGROUP_DESC','ADDR_EMAIL','N_TOPIC_ID','N_TOPIC','N_DETAILS','N_DATE','SLIP_DATE','SLIP_DATE_TH');		
					list($Num_Rows_,$mbdata) = get_value_many_oci($strSQL_,$value_);	
					$_REQUEST["sentmail_cnt"]=$_REQUEST["sentmail_cnt"]+$Num_Rows_;
					$_REQUEST["sentmail_action_auto"]=1;	
					

					for($i=0;$i<$Num_Rows_;$i++){ 	
							$MEMB_NO=$mbdata[$i][0];				
							$SALARY_ID=$mbdata[$i][1];
							$MEMB_NAME=$mbdata[$i][2];
							$MEMB_SURNAME=$mbdata[$i][3];
							$MEMBGROUP_DESC=$mbdata[$i][4];
							$MEMBER_EMAIL=$mbdata[$i][5];
							$N_TOPIC_ID=$mbdata[$i][6];//$_REQUEST["deptaccount_no"];
							$N_TOPIC=$mbdata[$i][7];//$_REQUEST["depttype_desc"];
							$N_DETAILS=$mbdata[$i][8];//$_REQUEST["prncdue_date"];
							$N_DATE=$mbdata[$i][9];//$_REQUEST["prncdue_date"];
							$SLIP_DATE=$mbdata[$i][10];
							$SLIP_DATE_=ConvertDateYmd($SLIP_DATE,"long");

							if($MAIL_TEST_MODE){
							$MEMBER_EMAIL=$MAIL_TEST_EMAIL;
							}

							$Subject=conv("�駢����Ţ������");//conv($MAIL_FROM_NM." "."˹ѧ����׹�ѹ�ʹ���˹�� ����Թ�ҡ � �ѹ��� ".$SLIP_DATE);	
							$body=file_get_contents('../include/emailnews_template.html', true);
							$body=str_replace("COOP_NAME",conv($MAIL_FROM_NM),$body);
							$body=str_replace("SENT_DATE",conv(ConvertDate(date("d-m-Y"),"long")),$body);
							$body=str_replace("SLIP_DATE",conv($SLIP_DATE_),$body);
							$body=str_replace("MEMBER_NO",$MEMB_NO,$body);
							$body=str_replace("WEB_LINK",$WEB_LINK,$body);
							$body=str_replace("MEMB_NAME",conv($MEMB_NAME),$body);
							$body=str_replace("MEMB_SURNAME",conv($MEMB_SURNAME),$body);
							$body=str_replace("SALARY_ID",$SALARY_ID,$body);
							$body=str_replace("MEMBGROUP_DESC",conv($MEMBGROUP_DESC),$body);
							$body=str_replace("N_TOPIC_ID",$N_TOPIC_ID,$body);
							$body=str_replace("N_TOPIC",conv($N_TOPIC),$body);
							$body=str_replace("N_DETAILS",conv($N_DETAILS),$body);
							$body=str_replace("N_DATE",conv(ConvertDateYmd($N_DATE,"long")),$body);
							//$body=conv($body);
							$mail_to=array($MEMBER_EMAIL);
							$mail_to_nm=array(conv($MEMB_NAME." ".$MEMB_SURNAME));	
							//$MAIL_FROM_NM=conv($MAIL_FROM_NM);

							$msg=sendMail(
								$MAIL_HOST,
								$MAIL_PORT,
								$MAIL_USR,
								$MAIL_PWD,
								$MAIL_FROM,
								conv($MAIL_FROM_NM),
								$mail_to,
								$mail_to_nm,
								$Subject,
								$body,
								$MAIL_DEBUG,
								$MAIL_AUTH_FLAG,
								$MAIL_SECURE
								);
									
								
							  //echo $msg;	
							  
							 if($msg=="1"){ 
							    
								/*
								$sql="update yrconfirmmaster 
											set sentmail_date=sysdate 
											,sentmail_flag='1'
											,sentmail_remark='"."success"."'
											where member_no='".$MEMB_NO."' 
											and to_char(balance_date,'yyyy-mm-dd')='".$_REQUEST["slip_date"]."' ";
								//echo $sql;			
								get_single_value_oci($sql,$value1);
								*/
								
								 $sql="insert into cmmaillog (
											pk_id,
											mailtype_code ,
											member_no ,
											memb_fullname  ,
											salary_id  ,
											addr_email ,
											mailtype_desc ,
											ref_pk ,
											sentmail_date ,
											sentmail_flag ,
											sentmail_remark ,
											entry_id ,
											entry_date 
											)values(
											to_char(systimestamp,'YYYY-MM-DD.HH24:MI:SS:FF'),
											'".$mailtype_code."' ,
											'".$MEMB_NO."' ,
											'".($MEMB_NAME." ".$MEMB_SURNAME)."'  ,
											''  ,
											'".$MEMBER_EMAIL."' ,
											'".$mailtype_desc."'  ,
											'".$N_TOPIC_ID."'  ,
											sysdate ,
											1 ,
											'success' ,
											'".$member_no."' ,
											sysdate 
											)";
								 get_single_value_oci($sql,$value1);			
	 
							 }else{
								 
								 /*
								$sql="update yrconfirmmaster 
											set sentmail_date=sysdate 
											,sentmail_flag='1'
											,sentmail_remark='".$msg."'
											where member_no='".$MEMB_NO."' 
											and to_char(balance_date,'yyyy-mm-dd')='".$_REQUEST["slip_date"]."' ";
								//echo $sql;		
								get_single_value_oci($sql,$value1);
								*/
								
								 $sql="insert into cmmaillog (
											pk_id,
											mailtype_code ,
											member_no ,
											memb_fullname  ,
											salary_id  ,
											addr_email ,
											mailtype_desc ,
											ref_pk ,
											sentmail_date ,
											sentmail_flag ,
											sentmail_remark ,
											entry_id ,
											entry_date 
											)values(
											to_char(systimestamp,'YYYY-MM-DD.HH24:MI:SS:FF'),
											'".$mailtype_code."' ,
											'".$MEMB_NO."' ,
											'".($MEMB_NAME." ".$MEMB_SURNAME)."'  ,
											''  ,
											'".$MEMBER_EMAIL."' ,
											'".$mailtype_desc."'  ,
											'".$N_TOPIC_ID."'  ,
											sysdate ,
											1 ,
											'".$msg."' ,
											'".$member_no."' ,
											sysdate 
											)";
								 get_single_value_oci($sql,$value1);		
							 } 
					}		 
							 
	if($Num_Rows_>0){						 
	 $msg_= "<h3>".$_REQUEST["sentmail_date"]." �к����������ҧ�� Email  � �ѹ��� ".$_REQUEST["slip_date"]."  <br/>".date("Y-m-d h:i:s")." �� Email ����� ".$_REQUEST["sentmail_cnt"]." ��¡��  </h3>";
	}else{
	 $msg_="<h3>".$_REQUEST["sentmail_date"]." �к����� Email  � �ѹ��� ".$_REQUEST["slip_date"]." ���������¹��������  <br/>".date("Y-m-d h:i:s")." �� Email ������ ".$_REQUEST["sentmail_cnt"]." ��¡��  </h3>";
	 $_REQUEST["sentmail_action_auto"]=0;	
	}
 
}
?>	   
<center><?=$msg_?></center>
<?php


					$strSQL = "select * from ( select e.* from (
									select c.*,
										 (select count(*) from cmmaillog ml where ml.member_no=c.member_no and ml.mailtype_code='".$mailtype_code."' and ml.ref_pk =c.n_topic_id ) as  SENTMAIL_CNT,
										 (select to_char(max(ml.sentmail_date),'yyyy/mm/dd hh24:mi:ss')  from cmmaillog ml where ml.member_no=c.member_no and ml.mailtype_code='".$mailtype_code."' and ml.ref_pk =c.n_topic_id ) as  SENTMAIL_DATE,
										 (select ml.SENTMAIL_REMARK from cmmaillog ml where ml.member_no=c.member_no and ml.mailtype_code='".$mailtype_code."' and ml.ref_pk =c.n_topic_id and rownum=1) as  SENTMAIL_REMARK									
									from ( SELECT 
											 m.member_no,m.salary_id,
											 m.memb_name||' '||m.memb_surname as memb_nm ,
											 to_char(m.member_date,'dd/mm/yyyy','NLS_CALENDAR=''THAI BUDDHA')  as member_date,
											 m.addr_email as MEMB_EMAIL,
											 l.pk_id as n_topic_id,l.n_topic,l.n_details,
											 to_char(l.n_date,'yyyy-mm-dd')  as n_date,
											 to_char(l.n_date,'yyyy-mm-dd')  as slip_date,
											 to_char(l.n_date,'dd/mm/yyyy','NLS_CALENDAR=''THAI BUDDHA')  as slip_date_th
											FROM cmwebnews l ,mbmembmaster m
											WHERE  ( m.resign_status = 0 or m.resign_date > sysdate ) 
											".($_REQUEST["n_topic_id"]!=""?(" and l.pk_id = '".$_REQUEST["n_topic_id"]."' "):"")."
											".($_REQUEST["memb_no"]!=""?(" and m.member_no like '%".$_REQUEST["memb_no"]."%' "):"")."
											".($_REQUEST["salary_id"]!=""?("and m.salary_id like '%".$_REQUEST["salary_id"]."%' "):"")."
											".($_REQUEST["addr_email"]!=""?("and m.addr_email like '%".$_REQUEST["addr_email"]."%' "):"")."
										) c 	
										) e ) ".($_REQUEST["sentmail_flag"]!=""?("where ".$_REQUEST["sentmail_flag"]."=decode(SENTMAIL_CNT,0,0,1) "):"")."
										order by slip_date asc,member_no asc ,n_topic_id asc ";
					//echo 	$strSQL;				
					$value = array('MEMBER_NO','SALARY_ID','MEMB_NM','MEMBER_DATE','MEMB_EMAIL','SENTMAIL_CNT','SENTMAIL_DATE','SENTMAIL_REMARK','N_TOPIC_ID','N_TOPIC','N_DETAILS','N_DATE','SLIP_DATE','SLIP_DATE_TH');		
					list($Num_Rows,$slip_show) = get_value_many_oci($strSQL,$value);	
					$j=0;

	   ?>
	
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#CCCCCC"><table width="100%" border="0" cellspacing="1" cellpadding="3">
      <tr>
        <td align="center" bgcolor="#6699FF"><strong><font color="#FFFFFF">�ӴѺ</font></strong></td>
        <td align="center" bgcolor="#6699FF"><strong><font color="#FFFFFF">����¹</font></strong></td>
        <td align="center" bgcolor="#6699FF"><strong><font color="#FFFFFF">��ѡ�ҹ</font></strong></td>
        <td align="center" bgcolor="#6699FF"><strong><font color="#FFFFFF">����-ʡ��</font></strong></td>
        <td align="center" bgcolor="#6699FF"><strong><font color="#FFFFFF">�Ţ���</font></strong></td>
        <td align="center" bgcolor="#6699FF"><strong><font color="#FFFFFF">��Ǣ��</font></strong></td>
        <td align="center" bgcolor="#6699FF"><strong><font color="#FFFFFF">�ѹ���</font></strong></td>
        <td align="center" bgcolor="#FFCC33"><strong>Email</strong></td>
        <td align="center" bgcolor="#6699FF"><strong><font color="#FFFFFF">�ӹǹ���駷����</font></strong></td>
        <td align="center" bgcolor="#6699FF"><strong><font color="#FFFFFF">�ѹ����������ش</font></strong></td>
        <td align="center" bgcolor="#6699FF"><strong><font color="#FFFFFF">�����˵�</font></strong></td>
        <td align="center" bgcolor="#6699FF">
		<form id="formIDA" name="formIDA" method="post" action="" onsubmit="return confirm('��س��׹�ѹ����¡�� �� Email �ء�� ���������?')" >
		<input name="slip_date"  type="hidden" value="<?=$_REQUEST["slip_date"]?>"/>
		<input name="sentmail_action_all" id="sentmail_action_all"  type="hidden" value="1"/>
		<input name="sentmail_action_auto" id="sentmail_action_auto"  type="hidden" value="<?=$_REQUEST["sentmail_action_auto"]?>"/>
		<input name="sentmail_flag"  type="hidden" value="1"/>
		<input name="confirm_flag"  type="hidden" value="0"/>
		<input name="sentmail_cnt"  type="hidden" value="<?=$_REQUEST["sentmail_cnt"]?>"/>
		<input name="sentmail_date"  type="hidden" value="<?=$_REQUEST["sentmail_date"]?>"/>
		<input name="n_topic_id"  type="hidden" value="<?=$_REQUEST["n_topic_id"]?>"/>
		<input name="due_date_d"  type="hidden" value="<?=$_REQUEST["due_date_d"]?>"/>
		<input type="submit" id="sentmailall_btn" name="sentmailall_btn" value="��Mail ������"/>
		</form>
		</td>
        <td align="center" bgcolor="#6699FF"></td>
      </tr>
		<form id="formID_" name="formID_" method="post" action="" onsubmit="return confirm('��س��׹�ѹ����¡�� �� Email ���������?')" >
		<input name="salary_id"  type="hidden" value="<?=$_REQUEST["salary_id"]?>"/>
		<input name="memb_no" id="memb_no"  type="hidden" value="<?=$_REQUEST["memb_no"]?>"/>
		<input name="addr_email"  type="hidden" value="<?=$_REQUEST["addr_email"]?>"/>
		<input name="due_date_d"  type="hidden" value="<?=$_REQUEST["due_date_d"]?>"/>
		<input name="sentmail_action" id="sentmail_action"  type="hidden" value="1"/>
		<input name="n_topic_id" id="n_topic_id"  type="hidden" value=""/>
		<input name="n_topic" id="n_topic"  type="hidden" value=""/>
		<input name="n_details" id="n_details"  type="hidden" value=""/>
		<input name="n_date" id="n_date"  type="hidden" value=""/>
		<input name="slip_date" id="slip_date"  type="hidden" value=""/>
		<input name="sentmail_flag"  type="hidden" value="1"/>
		<input name="retr"  type="hidden" value="1"/>
      <?php for($i=0;$i<$Num_Rows;$i++){
		  
		  
		  $member_no=$slip_show[$i][$j++];
		  $salary_id=$slip_show[$i][$j++];
		  $memb_nm=$slip_show[$i][$j++];
		  $member_date=$slip_show[$i][$j++];
		  $member_email=$slip_show[$i][$j++];
		  $sendmail_cnt=$slip_show[$i][$j++];
		  $sendmail_date=$slip_show[$i][$j++];
		  $sendmail_remark=$slip_show[$i][$j++];
		  
		  $n_topic_id=$slip_show[$i][$j++];//'n_topic_id',
		  $n_topic=($slip_show[$i][$j++]);//'n_topic',
		  $n_details=($slip_show[$i][$j++]);//'n_details',
		  $n_date=$slip_show[$i][$j++];//'n_date',
		  $slip_date=$slip_show[$i][$j++];//'SLIP_DATE',	
		  $slip_date_th=$slip_show[$i][$j++];//'SLIP_DATE_TH',	
		  $sendmail_cnt_=$sendmail_cnt;
		  
		  if($sendmail_cnt==0){$sendmail_cnt_="#FFCC33";}
		  if($sendmail_cnt<0){$sendmail_cnt_="blue";}
		  if($sendmail_cnt>0){$sendmail_cnt_="green";}
		  
		  $j=0;
		  ?>  
      <tr>
        <td align="center" bgcolor="#FFFFFF"><font color="#000000"><?=($i+1)?></font></td>
        <td align="center" bgcolor="#FFFFFF"><font color="#000000"><?=($member_no)?></font></td>
        <td align="center" bgcolor="#FFFFFF"><font color="#000000"><?=($salary_id)?></font></td>
        <td align="center" bgcolor="#FFFFFF"><font color="#000000"><?=($memb_nm)?></font></td>
        <td align="center" bgcolor="#FFFFFF"><font color="#000000"><?=($n_topic_id)?></font></td>
        <td align="center" bgcolor="#FFFFFF"><font color="#000000"><?=($n_topic)?></font></td>
        <td align="center" bgcolor="#FFFFFF"><font color="#000000"><?=($slip_date_th)?></font></td>
        <td align="center" bgcolor="#FFFFFF"><font color="#000000"><?=($member_email)?></font></td>
        <td align="center" bgcolor="<?=$sendmail_cnt_?>"><?=($sendmail_cnt)?></td>
        <td align="center" bgcolor="#FFFFFF"><font color="#000000"><?=($sendmail_date)?></font></td>
        <td align="center" bgcolor="#FFFFFF"><font color="#000000"><?=($sendmail_remark)?></font></td>
        <td align="center" bgcolor="#FFFFFF"><font color="#000000">	
		<input type="button" id="sentmail_btn" name="sentmail_btn" value="��Mail" onclick="sendMailBy('<?=($member_no)?>','<?=($n_topic_id)?>','<?=($n_topic)?>','<?=($n_details)?>','<?=$n_date?>')"/>
		</td>
        <td align="center" bgcolor="#FFFFFF"><font color="#000000">	
		<?php if($sendmail_cnt>0) { ?><input type="button" id="viewreport" name="viewreport" value="����ѵ�" onclick="viewReportBy('<?=($member_no)?>','<?=($n_topic_id)?>','<?=($n_topic)?>','<?=($n_details)?>','<?=$n_date?>')"/><?php } ?>
		</font></td>
      </tr>
      <?php } ?>   
		</form>
    </table></td>
  </tr>
</table>
<script>
    function viewReportBy(memb_no,n_topic_id,n_topic,n_details,slip_date){    
	   var msg="��س��׹�ѹ���͡��§ҹ ����ѵԡ���� Email "+memb_no+" ���������?";
	  if(confirm(msg)){
	    document.getElementById("memb_no").value=memb_no;
	    document.getElementById("n_topic_id").value=n_topic_id;
	    document.getElementById("n_topic").value=n_topic;
	    document.getElementById("n_details").value=n_details;
	    document.getElementById("n_date").value=slip_date;
	    document.getElementById("slip_date").value=slip_date;
	    document.getElementById("sentmail_action").value="0";
	    document.getElementById("formID_").submit();
	  }
	}	

    function sendMailBy(memb_no,n_topic_id,n_topic,n_details,slip_date){    
	   var msg="��س��׹�ѹ����¡�� �� Email  ���Ѻ ��Ҫԡ "+memb_no+" ���������?";
	  if(confirm(msg)){
	    document.getElementById("memb_no").value=memb_no;
	    document.getElementById("n_topic_id").value=n_topic_id;
	    document.getElementById("n_topic").value=n_topic;
	    document.getElementById("n_details").value=n_details;
	    document.getElementById("n_date").value=slip_date;
	    document.getElementById("slip_date").value=slip_date;
	    document.getElementById("formID_").submit();
	  }
	}	

	<?php
		if($_REQUEST["sentmail_action_auto"]==1){			
		?>
		<?php if($MAIL_TEST_MODE&&$MAIL_TEST_CONFIRM){?>if(confirm("�����ͷ���¡�õ���")){ <?php } ?>
			document.getElementById("formIDA").submit();	
		<?php if($MAIL_TEST_MODE&&$MAIL_TEST_CONFIRM){?>}<?php } ?>
		<?php
		}
		?>
</script>
<?php //} ?>
