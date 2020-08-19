
<?php include "../Connections/connect_dbwins_yonghouse.php";
  include "../Connections/connect_mysql.php";
set_time_limit(0);
  $sql_win_product = " SELECT EMGood.GoodID, EMGood.GoodCode, EMGood.GoodName1, EMGoodUnit.GoodUnitCode, EMGoodMultiUnit.Barcode ,emgood.inactive,EMGoodGroup.GoodGroupCode

FROM EMGood
INNER JOIN EMGoodMultiUnit ON EMGood.GoodID = EMGoodMultiUnit.GoodID
INNER JOIN EMGoodUnit ON EMGoodMultiUnit.GoodUnitID = EMGoodUnit.GoodUnitID
INNER JOIN EmGoodGroup ON EMGood.GoodGroupID = EmGoodGroup.GoodGroupID
WHERE emgood.inactive = 'A' order by EMGood.GoodID

";
	//$result_win_product = odbc_exec($cwmt,$sql_win_product);
  $result_win_product = odbc_exec ($cwmt,$sql_win_product) or die (odbc_error());
  //echo "string";
$a = 0;
$b = 0;
$c = 1;
  while ($row_win_product = odbc_fetch_array ($result_win_product)){
  $GoodID = $row_win_product['GoodID'];
  $GoodCode = $row_win_product['GoodCode'];
  $GoodName = iconv('tis-620','utf-8',$row_win_product['GoodName1']);
  $GoodNamenew = str_replace("'","/",$GoodName);
  $GoodUnitCode = iconv('tis-620','utf-8',$row_win_product['GoodUnitCode']);
  $Barcode = $row_win_product['Barcode'];
  $GoodGroupCode = $row_win_product['GoodGroupCode'];

    $sql = " SELECT *  FROM `tbl_product` WHERE `PROD_GOODID` = '{$GoodID}' AND `PROD_NAME` = '{$GoodNamenew}'
    AND `PROD_CODE` = '{$GoodCode}' AND `PROD_BARCODE` = '{$Barcode}' AND `PROD_UNIT` = '{$GoodUnitCode}' ";
	//$sql = $sql . " AND `statonline` = 'N' ";
	$result = mysql_query($sql) or die(mysql_error());
  $rows = mysql_fetch_array($result);
  $ID = $rows['PROD_ID'];
  $sql1 = " SELECT * FROM `tbl_type_product`  WHERE `TPRO_CODE` = '{$GoodGroupCode}'";
  $result1 = mysql_query($sql1) or die(mysql_error());
  $rows1 = mysql_fetch_array($result1);
  $IDtype = $rows1['TPRO_ID'];
	if(mysql_num_rows($result)!=0){
		// UPDATE
    //echo $b.",".$ID.",".$IDtype."</br>";
    $sql2 = "UPDATE tbl_product SET `PROD_NAME` = '{$GoodNamenew}',  `PROD_BARCODE` = '{$Barcode}' , `PROD_UNIT` = '{$GoodUnitCode}', `PROD_UPDATEBY` = 'Admin Strator' , `PROD_UPDATETIME` = NOW() WHERE PROD_ID = '{$ID}' ";
    $result2 = mysql_query($sql2) or die(mysql_error());
    echo $a." Update</br>";
    $b = $b + 1;
	}else{
    // INSERT
    //echo $c.",".$ID.",".$IDtype."</br>";
    $sql2 = " INSERT INTO tbl_product (PROD_NAME, PROD_CODE, PROD_BARCODE, PROD_GOODID, PROD_ID_TPRO, PROD_UNIT, PROD_CREATEBY, PROD_CREATETIME)";
    $sql2 .= " VALUES ( '{$GoodNamenew}', '{$GoodCode}', '{$Barcode}', '{$GoodID}', '{$IDtype}', '{$GoodUnitCode}','Admin Strator' , NOW()); ";
    $result2 = mysql_query($sql2) or die(mysql_error());
    //$last_id = mysql_insert_id();
    echo $a." Insert</br>";

    $c = $c + 1;
	}
$a = $a +1;
  }
echo "อัพเดทข้อมูล = ".$b."</br>";
echo "เพิ่มข้อมูลใหม่ = ".$c."</br>";
  odbc_close($cwmt);
 ?>
