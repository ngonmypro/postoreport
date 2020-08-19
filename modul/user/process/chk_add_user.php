<?php include "../../../Connections/connect_mysql.php";
session_start();
set_time_limit(0);
$sql_up_sta = " UPDATE tbl_user SET `USE_STATUS_LOGIN` = '1' , `USE_TIME_LOGIN` = NOW() WHERE `USE_ID` = '{$_SESSION['USE_ID']}'";
$result_up_sta = mysql_query($sql_up_sta) or die(mysql_error());

  $sql_se_use = "SELECT * FROM `tbl_user` WHERE `USE_EMPLOYEE_NUM` = '".$_POST['add_user_code']."' OR `USE_USER` = '".$_POST['add_user_id']."'";
  $result_se_use = mysql_query($sql_se_use) or die(mysql_error());
    if (mysql_num_rows($result_se_use) != 0) {
      echo "N";
    }else {
      $sql_add_use = "INSERT INTO `tbl_user` (`USE_EMPLOYEE_NUM`,`USE_NAME`,`USE_USER`,`USE_PASS`,`USE_ID_DEP`,`USE_ID_BRAN`,`USE_ID_PROVINCE`,`USE_CREATEBY`,`USE_CREATETIME`,`USE_TIME_LOGIN`)";
      $sql_add_use .= "VALUES('".$_POST['add_user_code']."','".$_POST['add_user_name']."','".$_POST['add_user_id']."','".$_POST['add_user_password']."',
      '".$_POST['add_user_dep']."','".$_POST['add_user_bran']."','".$_POST['add_user_provi']."','".$_SESSION['USE_NAME']."',NOW(),'0000-00-00 00:00:00')";
      $result_add_use = mysql_query($sql_add_use) or die(mysql_error());
      $user_add_id = mysql_insert_id();

      $sql_log_user = "INSERT INTO `tbl_log_user` (`LOG_USER_ID_USE`,`LOG_USER_CREATEBY`,`LOG_USER_CREATETIME`,`LOG_USER_STRATUS`)";
      $sql_log_user .= "VALUES('".$user_add_id."','".$_SESSION['USE_NAME']."',NOW(),'1')";
      $result_log_use = mysql_query($sql_log_user) or die(mysql_error());
      echo "Y";
    }

    mysql_close($c);
?>
