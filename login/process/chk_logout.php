<?php session_start();
    include "../../Connections/connect_mysql.php";
    $sql_up_sta = " UPDATE tbl_user SET `USE_STATUS_LOGIN` = '0' , `USE_TIME_LOGIN` = '0000-00-00 00:00:00' WHERE `USE_ID` = '{$_SESSION['USE_ID']}'";
    $result = mysql_query($sql_up_sta) or die(mysql_error());

    session_destroy();

    echo "Y";
?>
