<?php include "../../../Connections/connect_mysql.php";
session_start();
set_time_limit(0);
$sql_up_sta = " UPDATE tbl_user SET `USE_STATUS_LOGIN` = '1' , `USE_TIME_LOGIN` = NOW() WHERE `USE_ID` = '{$_SESSION['USE_ID']}'";
$result_up_sta = mysql_query($sql_up_sta) or die(mysql_error());


      $sql_edit_use = "UPDATE `tbl_user` SET `USE_EMPLOYEE_NUM` = '".$_POST['edit_user_code']."' , `USE_NAME` = '".$_POST['edit_user_name']."' ,
      `USE_USER` = '".$_POST['edit_user_id']."' , `USE_PASS` = '".$_POST['edit_user_password']."' , `USE_ID_DEP` = '".$_POST['edit_user_dep']."' ,
      `USE_ID_BRAN` = '".$_POST['edit_user_bran']."' , `USE_ID_PROVINCE` = '".$_POST['edit_user_provi']."' , `USE_UPDATEBY` = '".$_SESSION['USE_NAME']."' ,
      `USE_UPDATETIME` = NOW() WHERE `USE_ID` = '".$_POST['use_id']."'";
      $result_edit_use = mysql_query($sql_edit_use) or die(mysql_error());

      $sql_log_user = "INSERT INTO `tbl_log_user` (`LOG_USER_ID_USE`,`LOG_USER_CREATEBY`,`LOG_USER_CREATETIME`,`LOG_USER_STRATUS`)";
      $sql_log_user .= "VALUES('".$_POST['use_id']."','".$_SESSION['USE_NAME']."',NOW(),'2')";
      $result_log_use = mysql_query($sql_log_user) or die(mysql_error());
      echo "Y";


    mysql_close($c);
?>
