
<?php include "../Connections/connect_dbwins_yonghouse.php";
  include "../Connections/connect_mysql.php";
set_time_limit(0);
  $sql_win_product = "SELECT EMGoodGroup.GoodGroupCode , EMGoodGroup.GoodGroupName FROM EMGoodGroup order by EMGoodGroup.GoodGroupCode";
	//$result_win_product = odbc_exec($cwmt,$sql_win_product);
  $result_win_product = odbc_exec ($cwmt,$sql_win_product) or die (odbc_error());
  //echo "string";
$a = 0;
$b = 0;
$c = 1;
  while ($row_win_product = odbc_fetch_array ($result_win_product)){
  $GoodGroupCode = $row_win_product['GoodGroupCode'];
  $GoodGroupName = iconv('tis-620','utf-8',$row_win_product['GoodGroupName']);


    $sql = " SELECT *  FROM `tbl_type_product` WHERE `TPRO_CODE` = '{$GoodGroupCode}' AND `TPRO_NAME` = '{$GoodGroupName}'";
	//$sql = $sql . " AND `statonline` = 'N' ";
	$result = mysql_query($sql) or die(mysql_error());
  $rows = mysql_fetch_array($result);
  $ID = $rows['TPRO_ID'];
	if(mysql_num_rows($result)!=0){
		// UPDATE
    $sql2 = "UPDATE `tbl_type_product` SET `TPRO_CODE` = '{$GoodGroupCode}',  `TPRO_NAME` = '{$GoodGroupName}' ,  `TPRO_UPDATEBY` = 'Admin Strator' , `TPRO_UPDATETIME` = NOW() WHERE `TPRO_ID` = '{$ID}' ";
    $result2 = mysql_query($sql2) or die(mysql_error());
    echo $a." Update</br>";
    $b = $b + 1;
	}else{
    // INSERT
    $sql2 = " INSERT INTO `tbl_type_product` (`TPRO_CODE` , `TPRO_NAME`, `TPRO_CREATEBY`, `TPRO_CREATETIME`)";
    $sql2 .= " VALUES ( '{$GoodGroupCode}', '{$GoodGroupName}', 'Admin Strator' , NOW()); ";
    $result2 = mysql_query($sql2) or die(mysql_error());
    //$last_id = mysql_insert_id();
    echo $a." Insert</br>";
    /*$sql3 = " INSERT INTO `tbl_ratproduct` (`PROR_ID_PROD`, `PROR_CREATEBY`, `PROR_CREATETIME`)";
    $sql3 .= " VALUES ( '{$last_id}','Admin Strator' , NOW()); ";
    $result3 = mysql_query($sql3) or die(mysql_error());*/
    $c = $c + 1;
	}
$a = $a +1;
  }
echo "อัพเดทข้อมูล = ".$b."</br>";
echo "เพิ่มข้อมูลใหม่ = ".$c."</br>";
  odbc_close($cwmt);
 ?>
