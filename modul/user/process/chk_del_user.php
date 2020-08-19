<?php include "../../../Connections/connect_mysql.php";
session_start();
set_time_limit(0);
$sql_up_sta = " UPDATE tbl_user SET `USE_STATUS_LOGIN` = '1' , `USE_TIME_LOGIN` = NOW() WHERE `USE_ID` = '{$_SESSION['USE_ID']}'";
$result_up_sta = mysql_query($sql_up_sta) or die(mysql_error());


      
      $sql_del_use = "DELETE FROM `tbl_user` WHERE `USE_ID` = '".$_POST['use_id']."'";
      $result_del_use = mysql_query($sql_del_use) or die(mysql_error());

      $sql_log_user = "INSERT INTO `tbl_log_user` (`LOG_USER_ID_USE`,`LOG_USER_CREATEBY`,`LOG_USER_CREATETIME`,`LOG_USER_STRATUS`)";
      $sql_log_user .= "VALUES('".$_POST['use_id']."','".$_SESSION['USE_NAME']."',NOW(),'3')";
      $result_log_use = mysql_query($sql_log_user) or die(mysql_error());
      echo "Y";


    mysql_close($c);
?>
