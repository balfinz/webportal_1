<?php
session_start();
header('Content-Type: text/html; charset=tis-620');
require "../include/conf.conn.php";
require "../include/conf.c.php";
require "../include/lib.Etc.php";
require "../include/lib.Oracle.php";
require "../include/lib.MySql.php";
$connectby = "desktop";
?>
<?php require "header.php"; ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="form-horizontal">
                <?php if ($_POST["agree"] != "agree") { ?>
                    <h3><i class="fa fa-chevron-circle-right"></i> ���͹���Т�͵�ŧ㹡����Ѥ���Ҫԡ</h3>
                    <p style="padding-left: 35px;">1.��������ҹ�к���������Ҫԡ�е�ͧ�ӡ����Ѥ������ҹ�к���е�ͧ����Ҫԡ�ͧ ��ҹ�� </p>
                    <p style="padding-left: 35px;">2.���ͤ������º����㹡����Ѥ���ҹ �к�� ��������׹�ѹ�����Ѥ� ��سҷӵ����鹵͹����к��й� </p>
                    <p style="padding-left: 35px;">3.�ҡ��ҡ���� �������������Ţ��Ҫԡ �ͧ��ҹ���ա����Ѥ���ҹ���� �·�ҹ����Һ ���ͷӡ����Ѥô��µ�Ƿ�ҹ�ͧ ��س������˹�ҷ�����ͷӡ�õ�Ǩ�ͺ�����١��ͧ ���仡�س����ѡ�� username / password �ͧ��ҹ</p>
                    <p style="padding-left: 35px;">4.�����Է����Ф�����ʹ���㹢����Ţͧ��ҹ�ͧ�ҡ��ҡ�����պؤ���ͺ��ҧ ��Ѥ���ҹ�к�������˹�ҷ���Ǩ�ͺ���Ǩзӡ��ź��ª��͹��� �͡�ҡ�к� ������ͧ������Һ </p>
                    <p style="padding-left: 35px;">5.�����Ţͧ��Ҫԡ ��к��зӡ�û�Ѻ��ا������ �ҡ��Ҫԡ��ҹ㴾����������ç�����բ��ʧ��¡�سҵԴ������˹�ҷ��</p>
                    <p style="padding-left: 35px;">6.��Ҿ�������ҹ��͵�ŧ�ѧ��������� ����Թ�������͹䢵�ҧ � ���ҧ �ˡó������Ѿ����ྪú�ó� ��˹����</p>
                    <br>
                    <br>
                    <form name="formID1" id="formID1" method="post" action="" >
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="inputmember" class="col-lg-2 control-label text-right">�Ţ����¹��Ҫԡ :</label>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control" name="member_no" id="member_no" maxlength="10" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="inputidcard" class="col-lg-2 control-label text-right">�Ţ���ѵû�ЪҪ� :</label>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control" id="idchk" name="idchk" maxlength="13" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-3">
                                    <div class="checkbox">
                                        <label>
                                            <input name="agree" type="checkbox" value="agree" required>
                                            ��Ҿ�������Ѻ���͹䧷�����</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="col-lg-10 col-lg-offset-2">
                                    <button type="submit" name="Submit" id="button" class="btn btn-default">��ŧ</button>
                                    <button type="reset" class="btn btn-default" onclick="location.href = 'index.php'">¡��ԡ</button>
                                    <input name="ref" type="hidden" id="ref" value="checkuser" />
                                </div>
                            </div>
                        </div>
                </div>
                </form>
                <?php
            } else {
                require "../s/s.member_info_1.php";
                //echo $card_person;
                //echo $Num_Rows;
                $register_status = true;
                if ($Num_Rows == 0) { // ��辺����¹ 
                    $register_status = false;
                    echo '<script type="text/javascript"> window.alert("�������ö���Թ����� ��سҵԴ����ˡó� ���͵�ǨʶҹС������Ҫԡ") </script> ';
                    echo "<script>window.location = 'index.php'</script>";
                    exit;
                }

                if ($countmemb > 0 or $countidcard > 0) { // ����Ѥ�����
                    $register_status = false;
                    echo '<script type="text/javascript"> window.alert("�������ö���Թ����� ��ҹ����Ѥ����ԡ������ ��سҵԴ����ˡó�") </script> ';
                    echo "<script>window.location = 'index.php'</script>";
                    exit;
                }

                if ($card_person != $idchk) { // �Ţ�ѵ����١��ͧ
                    $register_status = false;
                    echo '<script type="text/javascript"> window.alert("�������ö���Թ����� ����¹��Ҫԡ�����Ţ�ѵû�ЪҪ����١��ͧ ��سҵ�Ǩ�ͺ") </script> ';
                    echo "<script>window.location = 'index.php'</script>";
                    exit;
                }


                if ($register_status) {//����������Ѥ�
                    ?>
                    <form action="" method="post" id="formID2">
                        <h3><i class="fa fa-chevron-circle-right"></i> ��������Ҫԡ</h3>
                        <div class="form-group">
                            <label  class="col-lg-2 control-label text-right">�Ţ����¹��Ҫԡ :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control" id="memb_no" name="memb_no"  value="<?= $member_no ?>" size="10" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-lg-2 control-label text-right">����-ʡ�� :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control" id="memb_fullname" name="memb_fullname"  value="<?= $full_name ?>"  maxlength="13" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-lg-2 control-label text-right">�Ţ���ѵû�ЪҪ� :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control" id="idcard1" name="idcard1"  value="<?= $card_person ?>"  maxlength="13" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-lg-2 control-label text-right">��Ͷ�� :</label>
                            <div class="col-lg-3">
                                <?php if ($mobile_register == 1) { ?>
                                    <input type="text" class="form-control validate[required,minSize[10]]" id="mobile1" name="mobile1"  value="<?= $mobile ?>"   required >
                                <?php } else { ?> 
                                    <input type="text" class="form-control validate[required,minSize[10]]" id="mobile1" name="mobile1"  value="<?= $mobile ?>"  >
                                <?php } ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label  class="col-lg-2 control-label text-right">Email :</label>
                            <div class="col-lg-3">
                                <?php if ($email_register == 1) { ?>
                                    <input type="email" class="form-control" id="email1" name="email1"  value="<?= $email ?>" >
                                <?php } else { ?> 
                                    <input type="email" class="form-control" id="email1" name="email1"  value="<?= $email ?>" >
                                <?php } ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label  class="col-lg-2 control-label text-right">���ʼ�ҹ  :</label>
                            <div class="col-lg-3">
                                <input type="password" class="form-control validate[minSize[8]]" id="pwd_r" name="pwd_r"  maxlength="16"  required >
                            </div>
                            <div class="col-lg-4">
                                <p>��˹����ʼ�������ҧ���� 8 ����ѡ�� ������Թ 16 ����ѡ��</p>
                            </div>
                        </div> 
                        <div class="form-group">
                            <label  class="col-lg-2 control-label text-right">�׹�ѹ���ʼ�ҹ :</label>
                            <div class="col-lg-3">
                                <input type="password" class="form-control validate[minSize[8]]" id="pwd_r1" name="pwd_r1"  maxlength="16" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                                <button type="submit" name="button"  id="button2" class="btn btn-default">��ŧ</button>
                                <button type="reset" class="btn btn-default" id="button3" name="button3">¡��ԡ</button>
                                <input name="reg" type="hidden" id="reg" value="done">
                            </div>
                        </div>
                    </form>
                    <?php
                }
            }
            ?>
            <?php
            if ($_POST["reg"] == "done") {
                require "../s/s.register.php";
            }
            ?>   
        </div>
    </div>

    <?php require "footer.php"; ?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.11.2.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</div>
</body>
</html>
