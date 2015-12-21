<?php
ob_start();
session_start();
include_once './lib/application.php';



if ($_COOKIE['user'] == '') {

    header('location:login.php?page=select_idcard');
     die();

}
if ($_SESSION ['user_id'] != "") {

} else {
     header('location:login.php?page=select_idcard');
     die();
}

?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>ระบบจัดการยืม-คืน อุปกรณ์สื่อทัศนวัสดุ</title>

        <!-- Bootstrap Core CSS -->
        <link href="./bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="./dist/css/dataTables.bootstrap.min.css" rel="stylesheet">




        <!-- MetisMenu CSS -->
        <link href="./bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

        <!-- DataTables CSS -->
        <link href="./bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="./bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="./dist/css/timeline.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="./dist/css/sb-admin-2.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="./bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">



        <script src="./dist/js/jquery.min.js"></script>
        <script src="./dist/js/jquery.validate.min.js"></script>
        <link href="dist/css/custom.css" rel="stylesheet" type="text/css">
        <SCRIPT LANGUAGE="JavaScript">

            function pick(idcard,id) {
                if (window.opener && !window.opener.closed) {
                  //  window.opener.document.stockForm.stockBox.value = symbol;
                    window.opener.document.getElementById('id_card').value = idcard ;
                      window.opener.document.getElementById('id').value = id ;
                    window.close();

                }
            }

        </SCRIPT>
    </head>

    <body> 
        <div id="wrapper">
            <div id="" style="padding: 15px;">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">เลือกข้อมูลประชาชน</h1>

                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                ข้อมูลประชาชน
                            </div>

                            <!-- /.panel-heading -->
                            <div class="panel-body" style="padding-top: 15px;">
                                <div class="table-responsive">
                                    <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th class="center"></th>
                                        <th>รหัส</th>
                                        <th>ประเภท</th>
                                        <th>ชื่อสื่อ</th>
                                        <th>คงเหลือ</th>
                                        <th>ตัวเลือก</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM tb_media";
                                    $result = mysql_query($sql);

                                    if (mysql_num_rows($result) > 0) {
                                        while ($row = mysql_fetch_assoc($result)) {
                                            ?>
                                            <tr class="<?=$row['available'] > 0 ? 'success':'danger'?>">
                                                <td class="center">
                                                    <?php if($row['available'] > 0){?>
                                                    <input type="checkbox" name="select_all[]" class="checkboxes" value="<?= $row['id'] ?>" onclick="countSelect()">
                                                    <?php }?>
                                                </td>
                                                <td class="center"><?= padLeft($row['category_id'], 3, '0') . padLeft($row['id'], 5, '0') ?></td>
                                                <td><?= getDataDesc('name', 'tb_category', 'id = ' . $row['category_id']) //เรียกใช่ฟังชั่น 1)ชื่อฟิลด์ 2)ชื่อตาราง 3)where (เงื่อนไข)    ?></td> 
                                                <td><?= $row['name'] ?></td>
                                                <td class="center"><?= $row['available'] ?></td>
                                           
                                                <td class="center ">
                                                    <?php if($row['available'] > 0){?>
                                                    <a href="<?= ADDRESS ?>media_edit&id=<?= $row['id'] ?>" class="btn btn-primary btn-small">เลือก</a> 
                                                        <?php }else{ echo 'ไม่ว่าง';}?>
                                                </td>
                                            </tr>


                                            <?php
                                        }
                                    }
                                    ?>



                                </tbody>
                            </table>
                           <div class="row" style="margin-bottom: 20px;">

                                            <div class="col-md-2">
                                                <select class="form-control input-small" id="bulk-action">
                                                    <option value="">ตัวเลือก</option>
                                                    <option value="เลือกทั้งหมด">เลือกทั้งหมด</option>
                                                    <option value="ยกเลิกเลือกทั้งหมด">ยกเลิกเลือกทั้งหมด</option>
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
            </div>
        </div>
        <!-- Bootstrap Core JavaScript -->
        <script src="dist/js/jquery.dataTables.min.js"></script>
        <script src="dist/js/dataTables.bootstrap.min.js"></script>

        <script src="./bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- Metis Menu Plugin JavaScript -->
        <script src="./bower_components/metisMenu/dist/metisMenu.min.js"></script>

        <!-- Morris Charts JavaScript -->
        <script src="./bower_components/raphael/raphael-min.js"></script>
        <script src="./bower_components/morrisjs/morris.min.js"></script>
        <script src="./js/morris-data.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="./dist/js/sb-admin-2.js"></script>
        <script>

               $('#dataTables-example').dataTable({
                   "aoColumnDefs": [{"bSortable": false, "aTargets": [0]},
                   ]
               });

               // Setup - add a text input to each header cell
               var k = 0;
               $('#dataTables-example thead th').each(function () {
                   var title = $('#dataTables-example thead th').eq($(this).index()).text();
                   if (k === 0) {

                   } else {
                       $(this).html('<input type="text" placeholder="' + title + '" />');
                   }



                   k++;
               });

               // DataTable
               var table = $('#dataTables-example').DataTable();

               // Apply the search
               table.columns().eq(0).each(function (colIdx) {
                   $('input', table.column(colIdx).header()).on('keyup change', function () {
                       table
                               .column(colIdx)
                               .search(this.value)
                               .draw();
                   });

                   $('input', table.column(colIdx).header()).on('click', function (e) {
                       e.stopPropagation();
                   });
               });



        </script>
        
<script>
    function frm_submit() {
        if (confirm("คุณแน่ใจที่จะลบ?")) {
            $("#frm_media").submit();
        }


    }

    $("#bulk-action").change(function () {

        if ($(this).val() === 'เลือกทั้งหมด') {
            $(".checkboxes").each(function () {

                $(this).prop("checked", true);
            });
        }
        if ($(this).val() === 'ยกเลิกเลือกทั้งหมด') {
            $(".checkboxes").each(function () {
                $(this).prop("checked", false);
            });
        }
        countSelect();
    });
    $('#btn-select-delete').hide();
    function countSelect() {
       

        $('input.checkboxes[type=checkbox]').each(function () {
            if ($(this).is(":checked")) {
              // $(this).closest('tr').css("background-color","rgba(255, 235, 59, 0.46) !important");
               $(this).closest('tr').addClass('warning');
            }else{
              //  $(this).closest('tr').css("background-color","rgba(255, 235, 59, 0)");
                $(this).closest('tr').removeClass('warning');
            }
        });
    }


</script>

        <style>
            tr{
                font-size: 12px;
            }
        </style>

    </body>

</html>
