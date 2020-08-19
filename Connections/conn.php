<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_dbhelp = "localhost";
$database_dbhelp = "dbhelp";
$username_dbhelp = "root";
$password_dbhelp = "30323";
$dbhelp = mysql_pconnect($hostname_dbhelp, $username_dbhelp, $password_dbhelp) or trigger_error(mysql_error(),E_USER_ERROR);
?>
