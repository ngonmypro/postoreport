
<?php include "../Connections/connect_sqlserver.php";
  include "../Connections/connect_mysql.php";
set_time_limit(0);
  $sql_server_car = "SELECT dbo.Car_Regis.IdAt, dbo.Car_Regis.NmCar, dbo.F_Rate_Sta.StaName, dbo.Car_Regis.IdCam
    FROM dbo.Car_Regis
    INNER JOIN dbo.F_Rate_Sta ON dbo.Car_Regis.IdFA = dbo.F_Rate_Sta.IdFA
    INNER JOIN dbo.Car_Campany ON dbo.Car_Regis.IdCam = dbo.Car_Campany.IdCam
    WHERE dbo.Car_Regis.IdCam = '1' ORDER BY dbo.Car_Regis.IdAt ASC";
	//$result_win_product = odbc_exec($cwmt,$sql_win_product);
  $result_server_car = odbc_exec ($cid,$sql_server_car) or die (odbc_error());
  //echo "string";
$a = 0;
$b = 0;
$c = 1;
  while ($row_server_car = odbc_fetch_array ($result_server_car)){
  $IdAt = $row_server_car['IdAt'];
  $NmCar = iconv('tis-620','utf-8',$row_server_car['NmCar']);

  /*$sql1 = " SELECT * FROM `tbl_position`  WHERE `POSI_SERVER_ID` = '{$PositionID}'";
  $result1 = mysql_query($sql1) or die(mysql_error());
  $rows1 = mysql_fetch_array($result1);
  $IDposi = $rows1['POSI_ID'];*/

    $sql = " SELECT *  FROM `tbl_car` WHERE `CAR_SERVER_ID` = '{$IdAt}'";
	//$sql = $sql . " AND `statonline` = 'N' ";
	$result = mysql_query($sql) or die(mysql_error());
  $rows = mysql_fetch_array($result);
  $ID = $rows['CAR_ID'];
	if(mysql_num_rows($result)!=0){
		// UPDATE
    $sql2 = "UPDATE `tbl_car` SET `CAR_SERVER_ID` = '{$IdAt}', `CAR_LICENSE` = '{$NmCar}', `CAR_CREATEBY` = 'Admin Strator' , `CAR_CREATETIME` = NOW() WHERE `CAR_ID` = '{$ID}' ";
    $result2 = mysql_query($sql2) or die(mysql_error());
    echo $a." Update</br>";
    $b = $b + 1;
	}else{

    // INSERT
    $sql2 = " INSERT INTO `tbl_car` (`CAR_SERVER_ID` , `CAR_ID_TCAR` , `CAR_LICENSE` , `CAR_MILEAGA` , `CAR_CREATEBY`, `CAR_CREATETIME`)";
    $sql2 .= " VALUES ( '{$IdAt}', '', '{$NmCar}', '', 'Admin Strator' , NOW()); ";
    $result2 = mysql_query($sql2) or die(mysql_error());
    echo $a." Insert</br>";
    $c = $c + 1;
	}
$a = $a +1;
  }
echo "Update Complete = ".$b."</br>";
echo "Add Complete = ".$c."</br>";
  odbc_close($cid);
 ?>
