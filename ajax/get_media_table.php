<?php

include_once '../lib/application.php';



if ($_GET['id'] != '') {


    //การคืน เพิ่ม checkbox 
    if (isset($_GET['action']) && $_GET['action'] == 'return') {

        $sql = "SELECT * FROM tb_media WHERE id in(" . $_GET['id'] . ")";
        $result = mysql_query($sql);
        $numRow = mysql_num_rows($result);
        if ($numRow > 0) {
            
            $borrow_id =  $_GET['borrow_id'] ;
            
            $output = "";
            $order = 0;
            $output .= "<form method='POST' id='frm_media' action=''><div class=datagrid>
         <table>
                <thead>
                <tr class=''>
                    <th class=''><input type='checkbox' onclick='chk_all_return()' class='chk_all_return'></th>
                   <th class='center'>ลำดับ</th>
                   <th>รหัส</th>
                   <th>ชื่อสื่อทัศนวัสดุ</th>
                   <th class='center'>สถานะ</th>
                   <th class='center'>ตัวเลือก</th>
                    <th class='center hidden'>ตัวเลือก</th>
                </thead>
                <tbody>";


            while ($row = mysql_fetch_assoc($result)) {
                $id = $row['id'];
                $name = $row['name'];
                $_ID = $row['id'];
                $order++;
                
              $mediaStatus =  getDataDesc('status', 'tb_borrow_list', 'borrow_id='.$borrow_id.' AND media_id='.$id);
              //  $classStatus = 'bg-warning';
              $classStatus = $mediaStatus == 'ยืม' ? 'bg-warning' : 'bg-success';
              $btn_cancel_return = '';
              if ($mediaStatus == 'ยืม') {
                  $classStatus = 'bg-warning';
                  $strStaus = 'รอคืน';
              }else{
                   $classStatus = 'bg-success';
                   $strStaus = 'คืนแล้ว';
                
                   $btn_cancel_return = "<a href='javascript:;' onclick='xx($_ID);'  class='btn btn-sm btn-danger'>ยกเลิกการคืน</a>";
              }
//            
//              $check_media_id_null = getDataDesc('media_id', 'tb_booking_list', 'booking_id ='.$booking_id.' AND media_id ='.$mediaID);
//           $booked = 'highlight';
//           if ($check_media_id_null == '') {
//               $booked = '';
//           }

                $output .= "<tr class='$classStatus'>
                    <td class='center'><input type='checkbox' name='cbox_return[]' class='cbox_return' value='$_ID'></td>
                    <td class='center'>$order</td>
                    <td>$id</td>
                    <td>$name</td>
                    <td class='center'>$strStaus</td>
                     <td class='center'>$btn_cancel_return</td>
                     <td class='center hidden'><a href='javascript:;' onclick='_submit($_ID);'  class='btn btn-sm btn-danger'>ลบ</a></td>
                </tr>";
            }
            $output .= "</tbody>
            </table>
        </div><p class='txt-nav-return'><i class='fa fa-level-down fa-rotate-180'></i> เลือกรายการที่จะคืน</p></form>";
        }
    } else {

        $sql = "SELECT * FROM tb_media WHERE id in(" . $_GET['id'] . ")";
        $result = mysql_query($sql);
        $numRow = mysql_num_rows($result);
        if ($numRow > 0) {
            $output = "";
            $order = 0;

            $output .= "<form method='POST' id='frm_media' action=''><div class=datagrid>
         <table>
                <thead>
                <tr>
                    <th class='hidden'></th>
                   <th class='center'>ลำดับ</th>
                   <th>รหัส</th>
                   <th>ชื่อสื่อทัศนวัสดุ</th>
                    <th class='center'>ตัวเลือก</th>
                </thead>
                <tbody>";


            while ($row = mysql_fetch_assoc($result)) {
                $id = $row['id'];
                $name = $row['name'];
                $_ID = $row['id'];
                $order++;
//            
//              $check_media_id_null = getDataDesc('media_id', 'tb_booking_list', 'booking_id ='.$booking_id.' AND media_id ='.$mediaID);
//           $booked = 'highlight';
//           if ($check_media_id_null == '') {
//               $booked = '';
//           }

                $output .= "<tr>
                    <td class='hidden'><input type='hidden' name='_media_id[]' value='$_ID'></td>
                    <td class='center'>$order</td>
                    <td>$id</td>
                    <td>$name</td>
                     <td class='center'><a href='javascript:;' onclick='_submit($_ID);'  class='btn btn-sm btn-danger'>ลบ</a></td>
                </tr>";
            }
            $output .= "</tbody>
            </table>
        </div></form>";
        }
    }

    echo $output;
}
