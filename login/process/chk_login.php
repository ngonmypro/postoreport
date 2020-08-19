<?php session_start();
	include "../../Connections/connect_mysql.php";
	$username = $_POST['username'];
	$password = $_POST['password'];

	//echo "{$username},{$password}";


	$sql = " SELECT *  FROM `tbl_user` WHERE `USE_USER` LIKE '{$username}' AND `USE_PASS` LIKE '{$password}'  ";
	//$sql = $sql . " AND `statonline` = 'N' ";
	$result = mysql_query($sql) or die(mysql_error());
	if(mysql_num_rows($result)==0){
		//header("content-type: text/javascript; charset=utf-8");
		//echo "alertBDialog('ข้อมูลไม่ถูกต้อง','Username หรือ Password ไม่ถูกต้อง. ');";
		echo "Username หรือ Password ไม่ถูกต้อง ";
	}else{
		$member = mysql_fetch_array($result); //เก้บข้อมูลไว้ใน recordset
    if ($member['USE_STATUS_LOGIN'] == 0) {
      //echo "test";
      $_SESSION['USE_ID'] = $member['USE_ID'];
      $_SESSION['USE_NAME'] = $member['USE_NAME'];
      $sql_up_sta1 = " UPDATE tbl_user SET `USE_STATUS_LOGIN` = '1' , `USE_TIME_LOGIN` = NOW() WHERE `USE_ID` = '{$_SESSION['USE_ID']}'";
      $result2 = mysql_query($sql_up_sta1) or die(mysql_error());


      echo "Y";
    }else {
      echo "Username ของคุณ login ที่เครื่องอื่นอยู่แล้ว";
    }

		/*if ($_SESSION['Utype']!=2) {
			echo "Y";
		}else {
			echo "N";
		}*/
	}


	mysql_close($c); //close connection


?>
