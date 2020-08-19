
<?php include "../Connections/connect_sqlserver.php";
  include "../Connections/connect_mysql.php";
set_time_limit(0);
  $sql_server_posi = "SELECT PositionID, PositionCode, PositionNameT, PositionNameE FROM PNM_Position ORDER BY PositionID";
	//$result_win_product = odbc_exec($cwmt,$sql_win_product);
  $result_server_posi = odbc_exec ($cid,$sql_server_posi) or die (odbc_error());
  //echo "string";
$a = 0;
$b = 0;
$c = 1;
  while ($row_server_posi = odbc_fetch_array ($result_server_posi)){
  $PositionID = $row_server_posi['PositionID'];
  $PositionCode = $row_server_posi['PositionCode'];
  $PositionNameT = iconv('tis-620','utf-8',$row_server_posi['PositionNameT']);


    $sql = " SELECT *  FROM `tbl_position` WHERE `POSI_SERVER_ID` = '{$PositionID}' AND `POSI_CODE` = '{$PositionCode}'";
	//$sql = $sql . " AND `statonline` = 'N' ";
	$result = mysql_query($sql) or die(mysql_error());
  $rows = mysql_fetch_array($result);
  $ID = $rows['POSI_ID'];
	if(mysql_num_rows($result)!=0){
		// UPDATE
    $sql2 = "UPDATE `tbl_position` SET `POSI_SERVER_ID` = '{$PositionID}', `POSI_CODE` = '{$PositionCode}', `POSI_NAME` = '{$PositionNameT}' ,  `POSI_UPDATEBY` = 'Admin Strator' , `POSI_UPDATETIME` = NOW() WHERE `POSI_ID` = '{$ID}' ";
    $result2 = mysql_query($sql2) or die(mysql_error());
    echo $a." Update</br>";
    $b = $b + 1;
	}else{
    // INSERT
    $sql2 = " INSERT INTO `tbl_position` (`POSI_SERVER_ID`, `POSI_CODE` , `POSI_NAME`, `POSI_CREATEBY`, `POSI_CREATETIME`)";
    $sql2 .= " VALUES ( '{$PositionID}', '{$PositionCode}', '{$PositionNameT}', 'Admin Strator' , NOW()); ";
    $result2 = mysql_query($sql2) or die(mysql_error());
    echo $a." Insert</br>";
    $c = $c + 1;
	}
$a = $a +1;
  }
echo "อัพเดทข้อมูล = ".$b."</br>";
echo "เพิ่มข้อมูลใหม่ = ".$c."</br>";
  odbc_close($cid);
 ?>
