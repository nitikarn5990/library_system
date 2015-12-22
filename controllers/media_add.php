
<?php
if ($_POST['btn_submit'] == 'บันทึกข้อมูล') { //เช็คว่ามีการกดปุ่ม บันทึกข้อมูล
    //ถ้าว่างทำส่วนนี้ คือ เพิม่ลงฐานข้อมูล
    $data = array(
        "name" => $_POST['name'], //ชื่อสื่อ
        "category_id" => $_POST['category_id'], //id ประเภทสื่อ
        "detail" => $_POST['detail'], // รายละเอียด
        "qty" => $_POST['qty'], // จำนวน
        "available" => $_POST['qty'], // จำนวนเหลือที่สามารถให้ยืมหรอจองได้
        "days_borrow" => $_POST['days_borrow'], //จำนวนวันที่สามาระยืมได้
        "cost" => $_POST['cost'], // ราคาสื่อ
        "fine_per_day" => $_POST['fine_per_day'], // ราคาค่าปรับต่อวัน
        "status" => $_POST['status'], // สถานะ
        "agent_id" => $_POST['agent_id'], //id ตัวแทนจำหน่าย
        "created_at" => DATE_TIME, //วันที่บันทึก
        "updated_at" => DATE_TIME, //วันที่แก้ไข
    );

// insert ข้อมูลลงในตาราง tb_media โดยฃื่อฟิลด์ และค่าตามตัวแปร array ชื่อ $data
    if (insert("tb_media", $data)) { // บันทึกข้อมูลลงตาราง tb_media 
        //  echo AlertSuccess;
        // SetAlert('เพิ่ม แก้ไข ข้อมูลสำเร็จ', 'success'); //แสดงข้อมูลแจ้งเตือนถ้าสำเร็จ
        //   header('location:' . ADDRESS . 'media');
        //  die();
    }

    //อัพโหลดภาพ
    if (isset($_FILES['file_array'])) {


        $Allfile = "";


        $Allfile_ref = "";


        for ($i = 0; $i < count($_FILES['file_array']['tmp_name']); $i++) {

            if ($_FILES["file_array"]["name"][$i] != "") {

                $rootPath = $_SERVER['DOCUMENT_ROOT'];
                $thisPath = dirname($_SERVER['PHP_SELF']);
                $onlyPath = str_replace($rootPath, '', $thisPath);
                
                $targetPath = $rootPath . '/' . $onlyPath . '/dist/images/media/';
       
                $ext = explode('.', $_FILES['file_array']['name'][$i]);
                $extension = $ext[count($ext) - 1];
                $rand = mt_rand(1, 100000);

                $newImage = DATE_TIME_FILE . $rand . "." . $extension;

                //     $newImage = DATE_TIME_FILE . "_" . $_FILES['file_array']['name'][$i];

                $cdir = getcwd(); // Save the current directory
                chdir($targetPath);

                move_uploaded_file($_FILES['file_array']['tmp_name'][$i], $targetPath . $newImage);

                chdir($cdir); // Restore the old working directory   
//                $data = array(
//                    "image" => $newImage, //ชื่อภาพ
//                );
//
//                if (update('tb_media', $data, 'id = ' . getDataDescLastID('id', 'tb_media'))) {
//
//                    SetAlert('เพิ่ม แก้ไข ข้อมูลสำเร็จ', 'success'); //แสดงข้อมูลแจ้งเตือนถ้าสำเร็จ
//                    header('location:' . ADDRESS . 'media');
//                    die();
//                }
            }
        }
    }
    SetAlert('เพิ่ม แก้ไข ข้อมูลสำเร็จ', 'success'); //แสดงข้อมูลแจ้งเตือนถ้าสำเร็จ
    header('location:' . ADDRESS . 'media');
    die();
}

// แสดงการแจ้งเตือน

Alert(GetAlert('error'));

Alert(GetAlert('success'), 'success');
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">เพิ่มข้อมูลสื่อ</h1>

    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <p id="breadcrumb">
            <a href="<?= ADDRESS ?>media">ข้อมูลสื่อทั้งหมด</a>
            เพิ่มข้อมูล
        </p>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="icol-add"></i> เพิ่มข้อมูล
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <form role="form" action="<?= ADDRESS ?>media_add" method="POST" enctype="multipart/form-data">
                            <div class="row da-form-row">
                                <label class="col-md-2">ชื่อสื่อ <span class="required">*</span></label>
                                <div class="col-md-10">
                                    <input class="form-control input-sm" name="name" type="text" value="<?= isset($_POST['name']) ? $_POST['name'] : '' ?>">
                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <div class="row da-form-row">
                                <label class="col-md-2">สื่อประเภท <span class="required">*</span></label>
                                <div class="col-md-10">

                                    <select class="form-control" name="category_id">
                                        <option value="">เลือกประเภท</option> 
<?php
$sql = "SELECT * FROM tb_category";
$result = mysql_query($sql);
$numRow = mysql_num_rows($result);
if ($numRow > 0) {
    while ($row = mysql_fetch_assoc($result)) {
        ?>
                                                <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option> 
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <div class="row da-form-row">
                                <label class="col-md-2">รายละเอียด </label>
                                <div class="col-md-10">
                                    <textarea class="form-control" name="detail"><?= isset($_POST['detail']) ? $_POST['detail'] : '' ?></textarea>
                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <div class="row da-form-row">
                                <label class="col-md-2">จำนวน <span class="required">*</span></label>
                                <div class="col-md-10">
                                    <input class="form-control input-sm" name="qty" type="text" value="<?= isset($_POST['qty']) ? $_POST['qty'] : '' ?>">
                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <div class="row da-form-row">
                                <label class="col-md-2">จำนวนวันที่ยืมได้ <span class="required">*</span></label>
                                <div class="col-md-10">
                                    <input class="form-control input-sm" name="days_borrow" type="text" value="<?= isset($_POST['days_borrow']) ? $_POST['days_borrow'] : '' ?>">
                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <div class="row da-form-row">
                                <label class="col-md-2">ราคา <span class="required">*</span></label>
                                <div class="col-md-10">
                                    <input class="form-control input-sm" name="cost" type="text" value="<?= isset($_POST['cost']) ? $_POST['cost'] : '' ?>">
                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <div class="row da-form-row">
                                <label class="col-md-2">ค่าปรับต่อวัน <span class="required">*</span></label>
                                <div class="col-md-10">
                                    <input class="form-control input-sm" name="fine_per_day" type="text" value="<?= isset($_POST['fine_per_day']) ? $_POST['fine_per_day'] : '' ?>">
                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <div class="row da-form-row">
                                <label class="col-md-2">ตัวแทนจำหน่าย <span class="required">*</span></label>
                                <div class="col-md-10">

                                    <select class="form-control" name="agent_id">
                                        <option value="">เลือกตัวแทนจำหน่าย</option> 
<?php
$sql = "SELECT * FROM tb_agent";
$result = mysql_query($sql);
$numRow = mysql_num_rows($result);
if ($numRow > 0) {
    while ($row = mysql_fetch_assoc($result)) {
        ?>
                                                <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option> 
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                    <p class="help-block"></p>
                                </div>
                            </div>


                            <div class="row da-form-row">
                                <label class="col-md-2">อัพโหลดภาพ </label>
                                <div class="col-md-10">
                                    <input class="form-control input-sm" name="file_array[]" type="file" value="">
                                    <p class="help-block"></p>
                                </div>
                            </div>

                            <div class="row da-form-row">
                                <label class="col-md-2">สถานะ </label>
                                <div class="col-md-10">
                                    <input class="form-control input-sm" name="status" type="text" value="<?= isset($_POST['status']) ? $_POST['status'] : '' ?>">
                                    <p class="help-block"></p>
                                </div>
                            </div>


                            <div class="row ">
                                <div class="">
                                    <div class="btn-row">
                                        <button type="submit" name="btn_submit" value="บันทึกข้อมูล" class="btn btn-sm btn-success">บันทึกข้อมูล</button>
                                        <button type="reset" class="btn btn-sm btn-danger">ยกเลิก</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
                <!-- /.col-lg-6 (nested) -->

                <!-- /.col-lg-6 (nested) -->
            </div>
            <!-- /.row (nested) -->
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>
<!-- /.col-lg-12 -->

<script>
    $('form').validate({
        rules: {
            name: {
                required: true
            },
            category_id: {
                required: true,
            },
            qty: {
                required: true,
                number: true
            },
            days_borrow: {
                required: true,
                number: true
            },
            cost: {
                required: true,
                number: true
            },
            fine_per_day: {
                required: true,
                number: true
            },
            agent_id: {
                required: true
            },
        },
        messages: {
        },
        highlight: function (element) {
            $(element).closest('.da-form-row').addClass('has-error');
        },
        unhighlight: function (element) {
            $(element).closest('.da-form-row').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function (error, element) {
            if (element.parent('.form-control').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }
    });

</script>

