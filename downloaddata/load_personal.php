
<?php include "../Connections/connect_sqlserver.php";
  include "../Connections/connect_mysql.php";
set_time_limit(0);
  $sql_server_personal = "SELECT PNT_Person.PersonID, PNT_Person.PersonCode, PNM_Initial.InitialT, PNT_Person.FnameT, PNT_Person.LnameT, PNM_Position.PositionNameT, PNM_Position.PositionCode, PNM_Position.PositionID, PNT_Person.CompanyID, COM_Company.Company_NameT
FROM PNT_Person
INNER JOIN PNM_Initial ON PNT_Person.InitialID = PNM_Initial.InitialID
INNER JOIN PNM_Position ON PNT_Person.PositionID = PNM_Position.PositionID
INNER JOIN COM_Company ON PNT_Person.CompanyID = COM_Company.ID_Company
WHERE (PNT_Person.ResignStatus = 1) AND COM_Company.ID_Company = 2 ORDER BY PNT_Person.PersonID ASC";
	//$result_win_product = odbc_exec($cwmt,$sql_win_product);
  $result_server_personal = odbc_exec ($cid,$sql_server_personal) or die (odbc_error());
  //echo "string";
$a = 0;
$b = 0;
$c = 1;
  while ($row_server_personal = odbc_fetch_array ($result_server_personal)){
  $PersonID = $row_server_personal['PersonID'];
  $PersonCode = $row_server_personal['PersonCode'];
  $name = iconv('tis-620','utf-8',$row_server_personal['FnameT'].' '.$row_server_personal['LnameT']);
  $PositionCode = $row_server_personal['PositionCode'];
  $PositionID = $row_server_personal['PositionID'];
  $PositionNameT = iconv('tis-620','utf-8',$row_server_personal['PositionNameT']);

  $sql1 = " SELECT * FROM `tbl_position`  WHERE `POSI_SERVER_ID` = '{$PositionID}'";
  $result1 = mysql_query($sql1) or die(mysql_error());
  $rows1 = mysql_fetch_array($result1);
  $IDposi = $rows1['POSI_ID'];

    $sql = " SELECT *  FROM `tbl_personal` WHERE `PSN_EMPLOYEE_NUM` = '{$PersonCode}' AND `PSN_SERVER_ID` = '{$PersonID}'";
	//$sql = $sql . " AND `statonline` = 'N' ";
	$result = mysql_query($sql) or die(mysql_error());
  $rows = mysql_fetch_array($result);
  $ID = $rows['PSN_ID'];
	if(mysql_num_rows($result)!=0){
		// UPDATE
    $sql2 = "UPDATE `tbl_personal` SET `PSN_SERVER_ID` = '{$PersonID}' , `PSN_EMPLOYEE_NUM` = '{$PersonCode}', `PSN_NAME` = '{$name}',
    `PSN_ID_POSITION` = '{$IDposi}' ,  `PSN_UPDATEBY` = 'Admin Strator' , `PSN_UPDATETIME` = NOW() WHERE `PSN_ID` = '{$ID}' ";
    $result2 = mysql_query($sql2) or die(mysql_error());
    echo $a." Update</br>";
    $b = $b + 1;
	}else{

    // INSERT
    $sql2 = " INSERT INTO `tbl_personal` (`PSN_SERVER_ID`,`PSN_EMPLOYEE_NUM`, `PSN_NAME` , `PSN_ID_POSITION`, `PSN_CREATEBY`, `PSN_CREATETIME`)";
    $sql2 .= " VALUES ( '{$PersonID}','{$PersonCode}', '{$name}', '{$IDposi}', 'Admin Strator' , NOW()); ";
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
