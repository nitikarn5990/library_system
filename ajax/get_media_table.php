<?php

include_once '../lib/application.php';



$sql = "SELECT * FROM tb_media WHERE id in(" . $_GET['id'] . ")";
$result = mysql_query($sql);
$numRow = mysql_num_rows($result);

$output = "";
$order = 0;
if ($numRow > 0) {
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
        $id = padLeft($row['category_id'], 3, '0') . padLeft($row['id'], 5, '0');
        $name = $row['name'];
        $_ID = $row['id'];
        $order++;

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
echo $output;