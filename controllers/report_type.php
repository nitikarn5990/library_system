
<div class="row">
    <div class="col-md-12" style="margin-bottom: 10px;">
        <h1 class="center">รายงาน</h1>
    </div>
    <div class="col-md-12" style="margin-bottom: 10px;">
        <a href="<?=ADDRESS?>report_borrow" class="btn btn-default " style="width: 100%;padding: 20px;font-size: 20px;">รายงานจำนวนสื่อที่มีการยืมในแต่ละช่วงเวลา</a>

    </div>
    <div class="col-md-12" style="margin-bottom: 10px;">
        <a href="<?=ADDRESS?>report_borrow_total_use" class="btn btn-default " style="width: 100%;padding: 20px;font-size: 20px;">รายงานจำนวนการใช้งานของแต่ละประเภท</a>


    </div>
    <div class="col-md-12" style="margin-bottom: 10px;">
        <a href="<?=ADDRESS?>report_borrow_return" class="btn btn-default " style="width: 100%;padding: 20px;font-size: 20px;">รายงานสรุปการใช้งานยืม/คืน ตามระยะเวลา</a>


    </div>
    <!-- /.col-lg-12 -->
</div>
<style>
    .myButton {
        -moz-box-shadow: 0px 1px 0px 0px #f0f7fa;
        -webkit-box-shadow: 0px 1px 0px 0px #f0f7fa;
        box-shadow: 0px 1px 0px 0px #f0f7fa;
        background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #33bdef), color-stop(1, #019ad2));
        background:-moz-linear-gradient(top, #33bdef 5%, #019ad2 100%);
        background:-webkit-linear-gradient(top, #33bdef 5%, #019ad2 100%);
        background:-o-linear-gradient(top, #33bdef 5%, #019ad2 100%);
        background:-ms-linear-gradient(top, #33bdef 5%, #019ad2 100%);
        background:linear-gradient(to bottom, #33bdef 5%, #019ad2 100%);
        filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#33bdef', endColorstr='#019ad2',GradientType=0);
        background-color:#33bdef;
        -moz-border-radius:6px;
        -webkit-border-radius:6px;
        border-radius:6px;
        border:1px solid #057fd0;
        display:inline-block;
        cursor:pointer;
        color:#ffffff;
        font-family:Arial;
        font-size:15px;
        font-weight:bold;
        padding:6px 24px;
        text-decoration:none;
        text-shadow:0px -1px 0px #5b6178;
    }
    .myButton:hover {
        background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #019ad2), color-stop(1, #33bdef));
        background:-moz-linear-gradient(top, #019ad2 5%, #33bdef 100%);
        background:-webkit-linear-gradient(top, #019ad2 5%, #33bdef 100%);
        background:-o-linear-gradient(top, #019ad2 5%, #33bdef 100%);
        background:-ms-linear-gradient(top, #019ad2 5%, #33bdef 100%);
        background:linear-gradient(to bottom, #019ad2 5%, #33bdef 100%);
        filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#019ad2', endColorstr='#33bdef',GradientType=0);
        background-color:#019ad2;
    }
    .myButton:active {
        position:relative;
        top:1px;
    }

</style>