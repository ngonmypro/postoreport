<?
include "connect_mysql.php";
$sql_s1 = "SELECT * FROM tbl_bran";
$result_s1 = mysql_query($sql_s1) or die(mysql_error());
if (mysql_num_rows($result_s1)==0){

  $sql1 = " INSERT INTO  `tbl_bran` ( ";
  $sql1 .= " `BRAN_ID` , ";
  $sql1 .= " `BRAN_NAME_S` , ";
  $sql1 .= " `BRAN_NAME_F` , ";
  $sql1 .= " `BRAN_PROVINCE_ID` , ";
  $sql1 .= " `BRAN_CREATEBY` , ";
  $sql1 .= " `BRAN_CREATETIME` , ";
  $sql1 .= " `BRAN_UPDATEBY` , ";
  $sql1 .= " `BRAN_UPDATETIME` ";
  $sql1 .= " ) ";
  $sql1 .= " VALUES ( ";
  $sql1 .= " NULL, 'MT', 'สาขาสำนักงานใหญ่', '56', 'Admin Strator', NOW(), 'Admin Strator', NOW() ";
  $sql1 .= " ); ";
  $result1 = mysql_query($sql1) or die(mysql_error());
}

$sql_s2 = "SELECT * FROM tbl_depratment";
$result_s2 = mysql_query($sql_s2) or die(mysql_error());
if (mysql_num_rows($result_s2)==0){

  $sql2 = " INSERT INTO  `tbl_depratment` ( ";
  $sql2 .= " `DEP_ID` , ";
  $sql2 .= " `DEP_NAME` , ";
  $sql2 .= " `DEP_BRAN_ID` , ";
  $sql2 .= " `DEP_CREATEBY` , ";
  $sql2 .= " `DEP_CREATETIME` , ";
  $sql2 .= " `DEP_UPDATEBY` , ";
  $sql2 .= " `DEP_UPDATETIME` ";
  $sql2 .= " ) ";
  $sql2 .= " VALUES (NULL, 'IT', '1', 'Admin Strator', NOW(), 'Admin Strator', NOW()); ";
  $result2 = mysql_query($sql2) or die(mysql_error());
}

$sql_s3 = "SELECT * FROM tbl_user";
$result_s3 = mysql_query($sql_s3) or die(mysql_error());
if (mysql_num_rows($result_s3)==0){

  $sql3 = " INSERT INTO  `tbl_user` ( ";
  $sql3 .= " `USE_ID` , ";
  $sql3 .= " `USE_EMPLOYEE_NUM` , ";
  $sql3 .= " `USE_NAME` , ";
  $sql3 .= " `USE_USER` , ";
  $sql3 .= " `USE_PASS` , ";
  $sql3 .= " `USE_ID_DEP` , ";
  $sql3 .= " `USE_ID_BRAN`, ";
  $sql3 .= " `USE_ID_PROVINCE`, ";
  $sql3 .= " `USE_CREATEBY`, ";
  $sql3 .= " `USE_CREATETIME`, ";
  $sql3 .= " `USE_UPDATEBY`, ";
  $sql3 .= " `USE_UPDATETIME` ";
  $sql3 .= " ) ";
  $sql3 .= " VALUES (NULL, 'ADMIN', 'Admin Strator',  'admin',  'admin123456',  '1',  '1', '56', 'Admin Strator', NOW(), 'Admin Strator', NOW()); ";
  $result3 = mysql_query($sql3) or die(mysql_error());
}
mysql_close($c);
?>
