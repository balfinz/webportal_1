<?php
session_start();
@header('Content-Type: text/html; charset=tis-620');
?>
<style>
	.p{
		
		text-indent:30px;
	}
</style>
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
				var acc_no = $("#acc_no").val();
				var date1 =  $("#date1").val();
				var date2 =  $("#date2").val();
				if(acc_no != "" && date1 != "" && date2 != ""){
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
		
		<?php $check  = "1" ?>
		
		<?php if ($check == "1") { ?>
		
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left"><strong><font size="4" face="Tahoma">�������Է�����</font></strong><br />
    <font color="#FF6600" size="2" face="Tahoma">LoanPermission</font></td>
  </tr>
  <tr>
    <td align="right"><hr color="#999999" size="1"/></td>
  </tr>
</table>
<?php require "../s/s.LoanPermission.php"; ?>
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
 
  <tr>
    <td bgcolor="#999999"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td align="left" bgcolor="#CCCCFF"><table width="100%" border="0" cellspacing="3" cellpadding="3">
          <tr>
            <td width="84%" height="20" align="left"><strong>::�����ŷ����Ԩ�ó��Է�����::</strong></td>
            
            </tr>
        </table></td>
        </tr>
      <tr>
        <td align="left" bgcolor="#CCCCCC"><table width="100%" border="0" cellspacing="1" cellpadding="3">
          <tr>
            <td width="22%" height="25" align="center" bgcolor="#FFFFFF"><strong>����Ҫԡ�ѹ���</strong></td>
            <td width="22%" align="center" bgcolor="#FFFFFF"><strong>�Թ��͹</strong></td>
			<td width="22%" align="center" bgcolor="#FFFFFF"><strong>�Թ�Է°ҹ�</strong></td>
            <td width="22%" align="center" bgcolor="#FFFFFF"><strong>�ع���͹���</strong></td>
            <!--<td width="22%" align="center" bgcolor="#FFFFFF"><strong>�Ǵ����</strong></td>-->
          </tr>
          <?php //require "../s/s.deposit1.php"; 
          //for($n=0;$n<$Num_Rows1;$n++){ ?>
          <tr>
            <td height="25" align="center" bgcolor="#FFFFFF"><?=$member_date?></td>
            <td align="center" bgcolor="#FFFFFF">
			<?php
				$check_member_type = substr($member_no,0,1);
				if($check_member_type !="�")
				{
					echo $salary_amount_full;
				}else{ echo "-"; }
			 ?>
			</td>
			<td align="center" bgcolor="#FFFFFF"><?php if($incomeetc_amt!=0){echo $incomeetc_amt;}else{echo "-";}?></td>
            <td align="center" bgcolor="#FFFFFF"><?=$sharestk_amt_full?></td>
            <!--<td align="center" bgcolor="#FFFFFF"><?=$last_period?></td>-->
          </tr>
		  
          <?php //} ?>
        </table></td>
      </tr>
	  <tr>
				<td colspan="4" bgcolor="#fff" style="color:blue">
				<br>
				<b>**�����˵�</b><br>
				<span style="padding-left:20px">��Ҫԡ��������� 55 �պ�Ժ�ó�</span> �������Թ�Է°ҹ��Ҥӹǳ�Է����á��
				</td>
		  </tr>
    </table></td>
  </tr>
 
</table>
                <br><br>
                
                <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
 
  <tr>
    <td bgcolor="#999999"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td align="left" bgcolor="#CCCCFF"><table width="100%" border="0" cellspacing="3" cellpadding="3">
          <tr>
            <td width="84%" height="20" align="left"><strong>::�Է�����::</strong></td>
            
            </tr>
        </table></td>
        </tr>
      <tr>
        <td align="left" bgcolor="#CCCCCC">
		<table width="100%" border="0" cellspacing="1" cellpadding="3">
          <tr>
            <td width="35%" height="25" align="center" bgcolor="#FFFFFF"><strong>�Է��������ѭ</strong></td>
			<td width="35%" align="center" bgcolor="#FFFFFF"><strong>�Է��������ʴԡ��</strong></td>
            <td width="30%" align="center" bgcolor="#FFFFFF"><strong>�Է�����ء�Թ</strong></td>
          </tr>
          <?php 
		      $check_member_type = substr($member_no,0,1);
			  //echo $last_period ; echo '<br>'; echo $salary_amount;
		  if($check_member_type!="�")
		  {
		       $max_loan = 4100000;
                $no_loan = '��ҹ�ѧ������Է������سҵԴ����ˡó�';

          if ($last_period >= 6 && $last_period < 12) {

             $shar_2 = $sharestk_amt * 0; //echo '<br>';
             $salary_2 = $salary_amount * 40; //echo '<br>';
             $tatol_2 = $shar_2 + $salary_2; //echo '<br>';
             $tatol_2_format = number_format($tatol_2, 2);

            if ($tatol_2 <= $max_loan) {
			
               $tatol_2_format;
            } else {
             $max_loan;
            }
            } else if ($last_period >= 12 && $last_period < 24) {

            $shar_2 = $sharestk_amt * 0;
            $salary_2 = $salary_amount * 50;
            $tatol_2 = $shar_2 + $salary_2;
            $tatol_2_format = number_format($tatol_2, 2);

            if ($tatol_2 <= $max_loan) {

             $tatol_2_format;
            } else {
             $max_loan;
            }
            } else if ($last_period >= 24 && $last_period < 36) {

            $shar_2 = $sharestk_amt * 0;
            $salary_2 = $salary_amount * 60;
            $tatol_2 = $shar_2 + $salary_2;
            $tatol_2_format = number_format($tatol_2, 2);

            if ($tatol_2 <= $max_loan) {
             $tatol_2_format;
            } else {
             $max_loan;
              }
              } else if ($last_period >= 36 && $last_period < 99999) {

              $shar_2 = $sharestk_amt * 0;
              $salary_2 = $salary_amount * 70;
              $tatol_2 = $shar_2 + $salary_2;
              $tatol_2_format = number_format($tatol_2, 2);

              if ($tatol_2 <= $max_loan) {
              //echo 'A';
               $tatol_2_format;
              } else {
                  //echo 'B';
               $max_loan;
              }

                }
                
               //echo $max_month; exit();
                
                if ($last_period == 6 ) 
				{ $welfare_value="150000";  
            } else if ($last_period >= 7 && $last_period <=12) 
				{ $welfare_value="250000";  
            } else if ($last_period >= 13 && $last_period <=18) 
				{ $welfare_value="350000";  
            } else if ($last_period >= 19 && $last_period <=24) 
				{ $welfare_value="450000";                
            } else if ($last_period >=25) { $welfare_value="600000";  
			}
                        
                        if($tatol_2 < $max_loan){
                         $avg_maxloan = $tatol_2 + $welfare_value;
                         if($avg_maxloan > $max_loan){  
                         $avg  = $tatol_2 - $welfare_value;   
                         }
                               } else {
                                   
                               $avg  = $max_loan - $welfare_value;   
                         
                           }    
		
         ?>
          <tr>
            <td height="25" align="center" bgcolor="#FFFFFF"><?php
            
            
            if($avg_maxloan > $max_loan || $tatol_2 > $max_loan){
               // echo '1'; echo '<br>';
             $avg  = $max_loan - $welfare_value; 
             echo $avg_format = number_format($avg, 2);
             echo "&nbsp;";
             echo "&nbsp;";
             echo '�ҷ';
             } else if($avg_maxloan < $max_loan) {
                 // echo '2'; echo '<br>';
               echo $tatol_2_format;
               echo "&nbsp;";
               echo "&nbsp;";
               echo '�ҷ';
             }  
            if ($max_month < 6) {

                echo $no_loan;
                 }
            
            ?>
			</td>
			<td height="25" align="center" bgcolor="#FFFFFF">
			<?php  // �Թ������ʴԡ��
			
			
			
                        if ($last_period >= 6) {
						
					
						
						if($pb > 500000){
						
						echo "500,000.00";
						
						}else{
						
						echo $welfare_value_full = number_format($welfare_value, 2);
						
						}
						
                
                        }
                        if ($last_period < 6) {

                echo $no_loan;
                 }

            ?>
			</td>
            <td align="center" bgcolor="#FFFFFF"><?php
            
            if ($max_month >= $startmember_time && $max_month <= $endmember_time) {

         $shar = $sharestk_amt * $percentshare;
                                                                              
         $salary = $salary_amount * $percentsalary;
                                                                              
         $tatol = $shar + $salary;
                                                                                                                
                                                 
        //$tatol = number_format($tatol, 2);
		
		require "../s/s.LoanPermission.php"; 
		
		

         if ($tatol <= $maxloan_amt && $check == "1") {   
      					//echo  '1';		 
            echo '-';
           // echo "&nbsp;";
           // echo "&nbsp;";
          //  echo '�ҷ';
			
			}else if ($tatol <= $maxloan_amt && $check == "2") {
			
			$tatol = number_format($tatol, 2);
			//echo  '2';
			echo   $tatol;
            echo "&nbsp;";
            echo "&nbsp;";
            echo '�ҷ';
			
            } else {
           echo $maxloan_amt_full;
		   
           echo "&nbsp;";
           echo "&nbsp;";
           echo '�ҷ';
             }
            } else {

          echo $no_loan;
            }
            
            ?></td>

          </tr>
		  <?php }else{?>
			<tr>
				<td colspan="3"></td>
			</tr>
			<?php } ?>
          
        </table></td>
      </tr>
	  <tr>
		<td colspan="3" bgcolor="#fff" style="color:blue">
			<br><strong>**�����˵�</strong><br>
		<!--	<span style="padding-left:20px;">�Է����á���Թ</span>���ѭ�ӹǳ�ҡ�Թ��͹�ٳ�ӹǹ 70 ��Ңͧ�Թ��͹ ����������ء������Ҫԡ �����繢��������ͧ��㹡�äӹǳ�Է�����<br>��С�õѴ�Թ� ��سҵ�Ǩ�ͺ�Է����á���ա���駷���ˡó� �ͺ�س��Ѻ -->
		<p class="p"><b style="color:black; ">�Է�ԡ�á���Թ���ѭ</b> ��Ҫԡ������������Է�ԡ�������͹����º�ˡó������Ѿ����ྪú�ó� �ӡѴ ��Ҵ����Թ������ѭ �.�.2562 ��͹�����������Ѻ�Է�Ե�����</p>
		<p class="p"><b style="color:black">�Է�ԡ�á���Թ���ʴԡ��</b> ��Ҫԡ������������Է�ԡ�������͹����º�ˡó������Ѿ����ྪú�ó� �ӡѴ ��Ҵ����Թ������ѭ�������ʴԡ����Ҫԡ �.�.2562 ��͹�����������Ѻ�Է�Ե�����</p>
		<p class="p"><b style="color:black">�Է�ԡ�á���Թ�ء�Թ</b> �����������º�ˡó������Ѿ����ྪú�ó� �ӡѴ ��Ҵ����Թ��������˵ةء�Թ �.�.2562</p>
		<p class="p"><b  style="color:black">**��Ҫԡ��سҵ�Ǩ�ͺ�Է����á���ա���駷������Թ���� � �ˡó������Ѿ����ྪú�ó� �ӡѴ �����ҢҺ�ԡ������������ѡ<br>����ҢҺ�ԡ������ͺ֧����ѹ</b></p>
			</td>
			
	  </tr>
    </table></td>
  </tr>
 
</table>
                <br>
               
                <br><br>
                <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
 
  <tr>
    <td bgcolor="#999999"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td align="left" bgcolor="#CCCCFF"><table width="100%" border="0" cellspacing="3" cellpadding="3">
          <tr>
            <td width="84%" height="20" align="left"><strong>::�س���ѭ���Թ��餧����� �ѧ���::</strong></td>
            
            </tr>
        </table></td>
        </tr>
      <tr>
        <td align="left" bgcolor="#CCCCCC"><table width="100%" border="0" cellspacing="1" cellpadding="3">
          <tr>
            <td width="25%" height="25" align="center" bgcolor="#FFFFFF"><strong>�Ţ����ѭ��</strong></td>
            <td width="25%" align="center" bgcolor="#FFFFFF"><strong>�Թ���͡��</strong></td>
            <td width="25%" align="center" bgcolor="#FFFFFF"><strong>�Թ�������</strong></td>
            <td width="25%" align="center" bgcolor="#FFFFFF"><strong>�ӹǹ(�Ǵ)</strong></td>
          </tr>
          <?php require "../s/s.LoanPermission.php"; 
          for($n=0;$n<$Num_Rows1;$n++){ ?>
          <tr>

		  <td height="25" align="center" bgcolor="#FFFFFF"><?=$loancontract_no[$n]?></td>
            <td align="center" bgcolor="#FFFFFF"><?=$loanapprove_amt_full[$n]?></td>
            <td align="center" bgcolor="#FFFFFF"><?=$principal_balance_full[$n]?></td>
            <td align="center" bgcolor="#FFFFFF"><?=$period_payamt[$n]?></td>
		  
		  
          </tr>
          <?php } ?>
        </table></td>
      </tr>
    </table></td>
  </tr>
 
</table>
              <br><br>  
<br />

<p>&nbsp;</p>

<?php }else{ 

        echo '<script type="text/javascript"> window.alert("����������㹪�ǧ���Թ��û�Ѻ��ا���ٹ��") </script> ';
		echo "<script>window.location = 'info.php'</script>";

} ?>
