<?php
ob_start();
session_start();
include_once './lib/application.php';

if ($_COOKIE['user'] == '') {
   // echo $_REQUEST['URI'];
    if($_GET['controllers'] != ''){
        header('location:login.php?controllers='.$_GET['controllers'] );
        die();
    }else{
        header('location:login.php');
        die();
    }
    
//  die();
}
if ($_SESSION ['user_id'] != "") {
// $users->SetPrimary($_SESSION['admin_id']);
// $users->GetInfo();
} else {
    header('location:login.php');
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

    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <div>
                <img src="./dist/images/img_head.png" style="width: 100%;height: 220px;">
            </div>
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html" style="color: #A51800;">
                        <label> 
                            <b> 
                                ยินดีต้อนรับ :  <?= $_SESSION['group'] == 'admin' ?'admin': 'เจ้าหน้าที่ | '. $_SESSION['name']?>  
                            
                            </b></label>
                    </a>
                </div>
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle"  href="<?= ADDRESS .'staff_edit&id='.$_SESSION['user_id']?>&action=repassword">
                            <i class="fa fa-user fa-fw"></i> 
                            <?php
                            if ($_SESSION['group'] == 'admin') {
                                echo "เปลี่ยนรหัสผ่าน";
                            }else{
                                echo "ข้อมูลส่วนตัว";
                            }
                            ?>
                            
                        </a>

                        <!-- /.dropdown-messages -->
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle"  href="<?= ADDRESS ?>logout&page=<?=$_GET['controllers']?>">
                            <i class="fa fa-power-off fa-fw" style="color: #DC4429;"></i> ออกจากระบบ

                        </a>

                        <!-- /.dropdown-messages -->
                    </li>

                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->

<?php require './include/sidebar.php'; ?>
                <!-- /.navbar-static-side -->
            </nav>

            <div id="page-wrapper">
<?php
//เช็ค url controllers ไม่ใช่ค่าว่าง และ มีไฟล์ที่อยู่ในโฟลเดอร์ controllers อยู่จริง
if (isset($_GET['controllers']) && file_exists('./controllers/' . $_GET['controllers'] . '.php')) {

    include './controllers/' . $_GET['controllers'] . '.php'; // นำไฟล์ที่ได้จาก $_GET['controllers'] มา include
}
?>
                <!-- /.row -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->


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



        <style>
            tr{
                font-size: 12px;
            }
        </style>
    </body>

</html>

