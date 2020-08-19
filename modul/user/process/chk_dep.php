
<?php include "../../../Connections/connect_mysql.php";
session_start();
set_time_limit(0);
$sql_up_sta = " UPDATE tbl_user SET `USE_STATUS_LOGIN` = '1' , `USE_TIME_LOGIN` = NOW() WHERE `USE_ID` = '{$_SESSION['USE_ID']}'";
$result_up_sta = mysql_query($sql_up_sta) or die(mysql_error());
?>
<option value=""> # เลือกแผนก # </option>
<?php
$sql_rat_distance = "SELECT * FROM `tbl_depratment` WHERE `DEP_BRAN_ID` = '".$_POST['pro']."'";
$result_rat_distance = mysql_query($sql_rat_distance) or die(mysql_error());
while ($row_rat_distance = mysql_fetch_array($result_rat_distance)) { ?>
<option value="<?php echo $row_rat_distance['DEP_ID']; ?>" ><?php echo $row_rat_distance['DEP_NAME']; ?></option>
<?php } ?>
