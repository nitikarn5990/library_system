<script>
    //localStorage.setItem('url', window.location.href);

</script>
<?php
if ($_POST['btn_submit'] == 'บันทึกข้อมูล') { //เช็คว่ามีการกดปุ่ม บันทึกข้อมูล
    //ถ้าว่างทำส่วนนี้ คือ เพิม่ลงฐานข้อมูล
    $data = array(
        "name" => $_POST['name'], //ชื่อการจอง
        "category_id" => $_POST['category_id'], //id ประเภทการจอง
        "detail" => $_POST['detail'], // รายละเอียด
        "qty" => $_POST['qty'], // จำนวน
        "days_borrow" => $_POST['days_borrow'], //จำนวนวันที่สามาระยืมได้
        "cost" => $_POST['cost'], // ราคาการจอง
        "fine_per_day" => $_POST['fine_per_day'], // ราคาค่าปรับต่อวัน
        "status" => $_POST['status'], // สถานะ
        "agent_id" => $_POST['agent_id'], //id ตัวแทนจำหน่าย
        "created_at" => DATE_TIME, //วันที่บันทึก
        "updated_at" => DATE_TIME, //วันที่แก้ไข
    );

// insert ข้อมูลลงในตาราง tb_booking โดยฃื่อฟิลด์ และค่าตามตัวแปร array ชื่อ $data
    if (insert("tb_booking", $data)) { // บันทึกข้อมูลลงตาราง tb_booking 
        //  echo AlertSuccess;
        SetAlert('เพิ่ม แก้ไข ข้อมูลสำเร็จ', 'success'); //แสดงข้อมูลแจ้งเตือนถ้าสำเร็จ
        header('location:' . ADDRESS . 'booking');
        die();
    } else {
        SetAlert('เกิดข้อผิดพลาดไม่สามารถเพิ่มข้อมูลได้'); //แสดงข้อมูลแจ้งเตือนถ้าไม่สำเร็จ
        header('location:' . ADDRESS . 'booking_add');
        die();
    }
}

// แสดงการแจ้งเตือน

Alert(GetAlert('error'));

Alert(GetAlert('success'), 'success');
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">เพิ่มข้อมูลการจอง</h1>

    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <p id="breadcrumb">
            <a href="<?= ADDRESS ?>booking">ข้อมูลการจองทั้งหมด</a>
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
                        <form role="form" action="<?= ADDRESS ?>booking_add" method="POST">
                            <div class="row da-form-row">
                                <label class="col-md-2">รหัสบัตรประชาชน <span class="required">*</span></label>
                                <div class="col-md-5">
                                    <input class="form-control input-sm" name="id_card" id="id_card" type="text" readonly="" value="">
                                    <input name="id" id="id" type="hidden">
                                    <p class="help-block"></p>
                                </div>
                                <div class="col-md-2">
                                    <a href="javascript:;" onclick="showList()" class="btn btn-sm btn-primary">เลือก</a>
                                </div>
                            </div>
                            <div class="row da-form-row">
                                <label class="col-md-2">สื่อทัศนวัสดุ <span class="required">*</span></label>
                                <div class="col-md-5">
                                    <input class="form-control input-sm" name="media_id" id="media_id" type="text" readonly="" value="">
                                    <input name="id" id="id" type="hidden">
                                    <p class="help-block"></p>
                                </div>
                                <div class="col-md-2">
                                    <a href="javascript:;" onclick="showMediaList()" class="btn btn-sm btn-primary">เลือก</a>
                                </div>
                            </div>

                            <div class="row da-form-row">
                                <label class="col-md-2">หมายเหตุ </label>
                                <div class="col-md-10">
                                    <textarea class="form-control" name="comment"><?= isset($_POST['comment']) ? $_POST['comment'] : '' ?></textarea>
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
<SCRIPT LANGUAGE="JavaScript">

    function showList() {
        var sList = PopupCenter("select_idcard.php", "list", "900", "400");

    }
     function showMediaList() {
        var sList = PopupCenter("media_list.php", "list", "900", "400");

    }

    function PopupCenter(url, title, w, h) {
        // Fixes dual-screen position Most browsers      Firefox
        var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;
        var dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;

        width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
        height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

        var left = ((width / 2) - (w / 2)) + dualScreenLeft;
        var top = ((height / 2) - (h / 2)) + dualScreenTop;
        var newWindow = window.open(url, title, 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);

        // Puts focus on the newWindow
        if (window.focus) {
            newWindow.focus();
        }
    }
</SCRIPT>
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

