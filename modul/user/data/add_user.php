<?php include "../../../Connections/connect_mysql.php";
session_start();
set_time_limit(0);

$sql_up_sta = " UPDATE tbl_user SET `USE_STATUS_LOGIN` = '1' , `USE_TIME_LOGIN` = NOW() WHERE `USE_ID` = '{$_SESSION['USE_ID']}'";
$result_up_sta = mysql_query($sql_up_sta) or die(mysql_error());

?>
<script type="text/javascript">
$('.selectpicker').selectpicker({
    style: 'btn-default',
    size: 10
});

$("#add_user_provi").change(function() {
    $.post("modul/user/process/chk_bran.php",
      {
          pro : $('#add_user_provi').val()
      },
      function(data){
        //alert(data);
      $("#add_user_bran").html(data);
      });
  });

  $("#add_user_bran").change(function() {
      $.post("modul/user/process/chk_dep.php",
        {
            pro : $('#add_user_bran').val()
        },
        function(data){
          //alert(data);
        $("#add_user_dep").html(data);
        });
    });
</script>
<div data-parsley-validate class="form-horizontal form-label-left">
    <div class="form-group">
      <label class="control-label col-md-2 col-sm-2 col-xs-12">รหัสพนักงาน</label>
        <div class="col-md-3 col-sm-3 col-xs-12">
          <input type='text' class="form-control" id="add_user_code" placeholder="กรุณากรอกรหัสพนักงาน"/>
        </div>

        <label class="control-label col-md-2 col-sm-2 col-xs-12">ชื่อ-นามสกุล</label>
          <div class="col-md-3 col-sm-3 col-xs-12">
            <input type='text' class="form-control" id="add_user_name" placeholder="กรุณากรอกชื่อ-นามสกุล"/>
          </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-2 col-sm-2 col-xs-12">User</label>
        <div class="col-md-3 col-sm-3 col-xs-12">
          <input type='text' class="form-control" id="add_user_id" placeholder="กรุณากรอก User เข้าใช้งาน"/>
        </div>

        <label class="control-label col-md-2 col-sm-2 col-xs-12">Password</label>
          <div class="col-md-3 col-sm-3 col-xs-12">
            <input type='password' class="form-control" id="add_user_password" placeholder="กรุณากรอก Password"/>
          </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-2 col-sm-2 col-xs-12">จังหวัด</label>
        <div class="col-md-3 col-sm-3 col-xs-12">
          <select class="selectpicker form-control" data-live-search="true" id="add_user_provi">
            <option value=""> # เลือกจังหวัด # </option>
            <?php $sql_se_province = "SELECT * FROM `province` ORDER BY `PROVINCE_NAME` ASC";
            $result_se_province = mysql_query($sql_se_province) or die(mysql_error());
            while ($row_se_province = mysql_fetch_array($result_se_province)) {?>
              <option value="<?php echo $row_se_province['PROVINCE_ID']; ?>"><?php echo $row_se_province['PROVINCE_NAME']; ?></option>
            <?php } ?>
          </select>
        </div>


      <label class="control-label col-md-2 col-sm-2 col-xs-12">สาขา</label>
        <div class="col-md-3 col-sm-3 col-xs-12">
          <select class="form-control" id="add_user_bran">
            <option value=""> # เลือกสาขา # </option>
          </select>
        </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-2 col-sm-2 col-xs-12">แผนก</label>
        <div class="col-md-3 col-sm-3 col-xs-12">
          <select class="form-control" id="add_user_dep">
            <option value=""> # เลือกแผนก # </option>
          </select>
        </div>
    </div>
</div>
