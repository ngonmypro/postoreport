<?php include "../../../Connections/connect_mysql.php";
session_start();
set_time_limit(0);

$sql_up_sta = " UPDATE tbl_user SET `USE_STATUS_LOGIN` = '1' , `USE_TIME_LOGIN` = NOW() WHERE `USE_ID` = '{$_SESSION['USE_ID']}'";
$result_up_sta = mysql_query($sql_up_sta) or die(mysql_error());

$sql_se_euse = " SELECT * FROM `tbl_user` WHERE `USE_ID` = '".$_POST['use_id']."'";
$result_se_euse = mysql_query($sql_se_euse) or die(mysql_error());
$row_se_euse = mysql_fetch_array($result_se_euse);
?>
<script type="text/javascript">
$('.selectpicker').selectpicker({
    style: 'btn-default',
    size: 10
});

$("#edit_user_provi").change(function() {
    $.post("modul/user/process/chk_bran.php",
      {
          pro : $('#edit_user_provi').val()
      },
      function(data){
        alert(data);
      $("#edit_user_bran").html(data);
      });
  });

  $("#edit_user_bran").change(function() {
      $.post("modul/user/process/chk_dep.php",
        {
            pro : $('#edit_user_bran').val()
        },
        function(data){
          //alert(data);
        $("#edit_user_dep").html(data);
        });
    });
</script>
<div data-parsley-validate class="form-horizontal form-label-left">
    <div class="form-group">
      <label class="control-label col-md-2 col-sm-2 col-xs-12">รหัสพนักงาน</label>
        <div class="col-md-3 col-sm-3 col-xs-12">
          <input type='text' class="form-control" id="edit_user_code" placeholder="กรุณากรอกรหัสพนักงาน" value="<?php echo $row_se_euse['USE_EMPLOYEE_NUM']; ?>" disabled/>
        </div>

        <label class="control-label col-md-2 col-sm-2 col-xs-12">ชื่อ-นามสกุล</label>
          <div class="col-md-3 col-sm-3 col-xs-12">
            <input type='text' class="form-control" id="edit_user_name" placeholder="กรุณากรอกชื่อ-นามสกุล" value="<?php echo $row_se_euse['USE_NAME']; ?>"/>
          </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-2 col-sm-2 col-xs-12">User</label>
        <div class="col-md-3 col-sm-3 col-xs-12">
          <input type='text' class="form-control" id="edit_user_id" placeholder="กรุณากรอก User เข้าใช้งาน" value="<?php echo $row_se_euse['USE_USER']; ?>" disabled/>
        </div>

        <label class="control-label col-md-2 col-sm-2 col-xs-12">Password</label>
          <div class="col-md-3 col-sm-3 col-xs-12">
            <input type='password' class="form-control" id="edit_user_password" placeholder="กรุณากรอก Password" value="<?php echo $row_se_euse['USE_PASS']; ?>" />
          </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-2 col-sm-2 col-xs-12">จังหวัด</label>
        <div class="col-md-3 col-sm-3 col-xs-12">
          <select class="selectpicker form-control" data-live-search="true" id="edit_user_provi">
            <option value="0"> # เลือกจังหวัด # </option>
            <?php $sqlprovi = 'SELECT * FROM `province` ORDER BY `PROVINCE_NAME` ASC';
                        $resultprovi = mysql_query($sqlprovi) or die(mysql_error());
                        while ($rowprovi = mysql_fetch_array($resultprovi)) { ?>
                  <option value="<?php echo $rowprovi['PROVINCE_ID']; ?>"
                    <?php if ($row_se_euse['USE_ID_PROVINCE'] == $rowprovi['PROVINCE_ID']) {
                      echo 'selected="selected"';
                    } ?>
                    ><?php echo $rowprovi['PROVINCE_NAME']; ?></option>
                  <?php } ?>
          </select>
        </div>


      <label class="control-label col-md-2 col-sm-2 col-xs-12">สาขา</label>
        <div class="col-md-3 col-sm-3 col-xs-12">
          <select class="form-control" id="edit_user_bran">
            <option value="0"> # เลือกสาขา # </option>
            <?php $sqlbran = 'SELECT * FROM `tbl_bran`';
                        $resultbran = mysql_query($sqlbran) or die(mysql_error());
                        while ($rowbran = mysql_fetch_array($resultbran)) { ?>
                  <option value="<?php echo $rowbran['BRAN_ID']; ?>"
                    <?php if ($row_se_euse['USE_ID_BRAN'] == $rowbran['BRAN_ID']) {
                      echo 'selected="selected"';
                    } ?>
                    ><?php echo $rowbran['BRAN_NAME_S'].' :: '.$rowbran['BRAN_NAME_F']; ?></option>
                  <?php } ?>
          </select>
        </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-2 col-sm-2 col-xs-12">แผนก</label>
        <div class="col-md-3 col-sm-3 col-xs-12">
          <select class="form-control" id="edit_user_dep">
            <option value="0"> # เลือกแผนก # </option>
            <?php $sqldep = 'SELECT * FROM `tbl_depratment`';
                        $resultdep = mysql_query($sqldep) or die(mysql_error());
                        while ($rowdep = mysql_fetch_array($resultdep)) { ?>
                  <option value="<?php echo $rowdep['DEP_ID']; ?>"
                    <?php if ($row_se_euse['USE_ID_DEP'] == $rowdep['DEP_ID']) {
                      echo 'selected="selected"';
                    } ?>
                    ><?php echo $rowdep['DEP_NAME']; ?></option>
                  <?php } ?>
          </select>
        </div>
    </div>
</div>
