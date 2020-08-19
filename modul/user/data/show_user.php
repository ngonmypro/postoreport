<?php include "../../../Connections/connect_mysql.php";
session_start();
set_time_limit(0);
$sql_up_sta = " UPDATE tbl_user SET `USE_STATUS_LOGIN` = '1' , `USE_TIME_LOGIN` = NOW() WHERE `USE_ID` = '{$_SESSION['USE_ID']}'";
$result_up_sta = mysql_query($sql_up_sta) or die(mysql_error());
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Project All Page</title>
</head>
<script>
$('.selectpicker').selectpicker({
    style: 'btn-default',
    size: 10
});



  $(document).ready( function () {
    var table = $('#usertb').DataTable({
    //dom: 'Bfrtip',
        //scrollY:        "300px",
        //scrollX:        true,
        //scrollCollapse: true,
        paging:         false,
        //fixedColumns:   {
            //leftColumns: 1,
            //rightColumns: 1
        //}
    sort: false,
    select: true,
          dom: 'Bfrtip',
          lengthMenu: [
          [ 10, 25, 50, -1 ],
          [ '10 rows', '25 rows', '50 rows', 'Show all' ]
      ],
          buttons: [
            'pageLength', 'print' ,
            {extend: 'colvis',
            collectionLayout: 'fixed two-column'}/*,
            {extend: 'pdfHtml5',
            text: '<i class="fa fa-file-pdf-o"></i>',
            titleAttr: 'PDF',
            filename: 'Data barcode export',
            message: 'PDF View Barcode.'}*/
          ],
      });

     $('#usertb tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
          $(this).removeClass('selected');
        }
        else {
          table.$('tr.selected').removeClass('selected');
          $(this).addClass('selected');
        }
      } );

    $('#usertb tfoot th').each( function () {
      var title = $(this).text();
      if(title != 'ลำดับที่' && title != 'จัดการ'){
        $(this).html( '<input type="text" placeholder=" '+title+'" style="width:90%;"  />' );
      }else{
        $(this).html(' ');
      }
    });

    // Apply the search ค้นหาจาก footer ------------------------
    $('#usertb').DataTable().columns().every( function () {
      var that = this;
      //ค้นหาจาก footer
      $( 'input', this.footer() ).on( 'keyup change', function () {
        if ( that.search() !== this.value ) {
          that
            .search( this.value )
            .draw();
        }
      });
    });

  });
  </script>
<body>
  <div><button type="button" class="btn btn-info" onClick="javascript:add_user();"><i class="fa fa-plus-circle"></i> เพิ่มผู้ใช้งาน</button></div>
  <!-- ตารางสินค้า -->
  <table id="usertb" class="display compact" cellspacing="0" width="100%"><!--display cell-border compact row-border table table-bordered-->
  <thead>
    <tr>
        <th style="text-align:center;">ลำดับที่</th>
        <th style="text-align:left; padding-left:10px;">รหัสพนักงาน</th>
        <th style="text-align:left; padding-left:10px;">ชื่อ-นามสกุล</th>
        <th style="text-align:left; padding-left:10px;">แผนก</th>
        <th style="text-align:left; padding-left:10px;">สาขา</th>
        <th style="text-align:left; padding-left:10px;">จังหวัด</th>
        <th style="text-align:center; padding-left:10px;">จัดการ</th>
        <!--<th style="text-align:left; padding-left:10px;">ค่าแรงทำจริง</th>
        <th style="text-align:left; padding-left:10px;">เบี้ยเลี้ยง</th>
        <th style="text-align:left; padding-left:10px;">รวม</th>
        <th style="text-align:left; padding-left:10px;">ขาดทุน</th>-->
    </tr>
  </thead>
  <tfoot>
    <tr>
    <th style="text-align:center;">ลำดับที่</th>
    <th style="text-align:left; padding-left:10px;"></th>
    <th style="text-align:left; padding-left:10px;"></th>
    <th style="text-align:left; padding-left:10px;"></th>
    <th style="text-align:left; padding-left:10px;"></th>
    <th style="text-align:left; padding-left:10px;"></th>
    <th style="text-align:center; padding-left:10px;">จัดการ</th>
    <!--<th style="text-align:left; padding-left:10px;"></th>
    <th style="text-align:left; padding-left:10px;"></th>
    <th style="text-align:left; padding-left:10px;"></th>
    <th style="text-align:left; padding-left:10px;"></th>-->
    </tr>
  </tfoot>
  <tbody>
    <?php $a = 1;
    if ($_POST['liftse01'] == '') {
      $sql_se_use = " SELECT * FROM `tbl_user`,`tbl_depratment`,`tbl_bran`,`province` WHERE `DEP_ID` = `USE_ID_DEP` AND `BRAN_ID` = `USE_ID_BRAN` AND `PROVINCE_ID` = `USE_ID_PROVINCE`";
      $result_se_use = mysql_query($sql_se_use) or die(mysql_error());
    }else {
      $sql_se_use = " SELECT * FROM `tbl_user`,`tbl_depratment`,`tbl_bran`,`province` WHERE `USE_ID_DEP` = '".$_POST['liftse01']."' AND `DEP_ID` = `USE_ID_DEP` AND `BRAN_ID` = `USE_ID_BRAN` AND `PROVINCE_ID` = `USE_ID_PROVINCE`";
      $result_se_use = mysql_query($sql_se_use) or die(mysql_error());
    }

    while ($row_se_use = mysql_fetch_array($result_se_use)) {
    ?>
  <tr>
    <td style="text-align:center;" onClick="javascript:();"><?php echo $a; ?></td>
    <td style="text-align:left; padding-left:10px; width:12%" onClick="javascript:();"><?php echo $row_se_use['USE_EMPLOYEE_NUM']; ?></td>
    <td style="text-align:left; padding-left:10px;" onClick="javascript:();"><?php echo $row_se_use['USE_NAME']; ?></td>
    <td style="text-align:left; padding-left:10px; width:8%" onClick="javascript:();"><?php echo $row_se_use['DEP_NAME']; ?></td>
    <td style="text-align:left; padding-left:10px;" onClick="javascript:();"><?php echo $row_se_use['BRAN_NAME_S'].' :: '.$row_se_use['BRAN_NAME_F']; ?></td>
    <td style="text-align:left; padding-left:10px;" onClick="javascript:();"><?php echo $row_se_use['PROVINCE_NAME']; ?></td>
    <td style="text-align:center; padding-left:10px; width:15%" onClick="javascript:();">
        <a href="javascript:();" class="btn btn-warning btn-xs"  onClick="javascript:edit_user(<?php echo $row_se_use['USE_ID']; ?>);"><i class="fa fa-gear"></i> Edit </a>
        <a href="javascript:();" class="btn btn-danger btn-xs" onClick="javascript:delete_user(<?php echo $row_se_use['USE_ID']; ?>,'<?php echo $row_se_use['USE_NAME']; ?>');"><i class="fa fa-trash-o"></i> Delete </a>
    </td>
    <!--<td style="text-align:left; padding-left:10px;" onClick="javascript:();"></td>
    <td style="text-align:left; padding-left:10px;" onClick="javascript:();"></td>
    <td style="text-align:left; padding-left:10px;" onClick="javascript:();"></td>
    <td style="text-align:left; padding-left:10px;" onClick="javascript:();"></td>-->

  </tr>
  <?
  $a += 1;
  }//while
  ?>
  </tbody>

  </table>

</body>
</html>
