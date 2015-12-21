<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">

            <li>
                <a href="index.html"><i class="fa fa-dashboard fa-fw"></i> หน้าแรก</a>
            </li>
            <li>
                  <a href="<?=ADDRESS?>people" class="<?= substr($_GET['controllers'], 0,6) == 'people' ? 'active':''?>"><i class="fa fa-table fa-fw"></i> ข้อมูลประชาชนที่มาใช้บริการ</a>
            </li>
              <li>
                  <a href="<?=ADDRESS?>category" class="<?= substr($_GET['controllers'], 0,8) == 'category' ? 'active':''?>"> <i class="fa fa-table fa-fw"></i> ข้อมูลประเภทสื่อทัศนวัสดุ</a>
            </li>
            <li>
                <a href="<?=ADDRESS?>media" class="<?= substr($_GET['controllers'], 0,5) == 'media' ? 'active':''?>"> <i class="fa fa-table fa-fw"></i> ข้อมูลสื่อทัศนวัสดุ</a>
            </li>

            <li>
                <a href="<?=ADDRESS?>booking" class="<?= substr($_GET['controllers'], 0,7) == 'booking' ? 'active':''?>"><i class="fa fa-table fa-fw"></i> ข้อมูลการจอง</a>
            </li>
            <li>
                <a href="tables.html"><i class="fa fa-table fa-fw"></i> ข้อมูลการยืม</a>
            </li>
            <li>
                <a href="tables.html"><i class="fa fa-table fa-fw"></i> ข้อมูลการคืน</a>
            </li>
            <li >
                <a href="<?=ADDRESS?>staff" class="<?= substr($_GET['controllers'], 0,5) == 'staff' ? 'active':''?>"><i class="fa fa-table fa-fw "></i> ข้อมูลเจ้าหน้าที่</a>
            </li>
            <li>
                <a href="<?=ADDRESS?>agent" class="<?= substr($_GET['controllers'], 0,5) == 'agent' ? 'active':''?>"> <i class="fa fa-table fa-fw"></i> ข้อมูลตัวแทนจำหน่าย</a>
            </li>

        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
