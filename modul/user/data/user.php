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

  $("#show_user").load("modul/user/data/show_user.php");

  $("#liftse01").change(function () {
    var liftse01 = $("#liftse01").val();
    $("#show_user").load("modul/user/data/show_user.php",{liftse01 : liftse01});
  });
</script>
   <div class="col-md-12">
     <div class="col-md-3 text-center"><h4><label class="control-label">แผนก</label></h4></div>
     <div class="col-md-3">
       <select class="selectpicker form-control" data-live-search="true" id="liftse01">
         <option value=""> # เลือกแผนก # </option>
         <?php $sql_se_dep = "SELECT * FROM `tbl_depratment`";
         $result_se_dep = mysql_query($sql_se_dep) or die(mysql_error());
         while ($row_se_dep = mysql_fetch_array($result_se_dep)) { ?>
         <option value="<?php echo $row_se_dep['DEP_ID']; ?>" ><?php echo $row_se_dep['DEP_NAME']; ?></option>
         <?php } ?>
       </select>
   </div>

          <!--<div class="col-md-1"><h4><label for="control-label"></label></h4> </div>
          <div class="col-md-2">
            <button class="form-control btn btn-success" type="button"  onclick="javascript:enter_gantchart();"><i class="fa fa-search"></i> ค้นหา</button>
          </div>-->
     </div>

     <div id="show_user"></div>
