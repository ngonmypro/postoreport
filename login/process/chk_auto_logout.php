<?php
	include "../../Connections/connect_mysql.php";

$intRejectTime = 20; // Minute
$sql = "UPDATE `tbl_user` SET `USE_STATUS_LOGIN` = '0', `USE_TIME_LOGIN` = '0000-00-00 00:00:00'  WHERE 1 AND DATE_ADD(`USE_TIME_LOGIN`, INTERVAL $intRejectTime MINUTE) <= NOW() ";
$result = mysql_query($sql) or die(mysql_error());
 ?>
