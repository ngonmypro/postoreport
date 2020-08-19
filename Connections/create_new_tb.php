<?
include "connect_mysql.php";

//มี
$sql1 = " CREATE TABLE IF NOT EXISTS `tbl_bran` ( ";
$sql1 .= " `BRAN_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'ลำดับสาขา' , "; //id
$sql1 .= " `BRAN_NAME_S` VARCHAR( 10 ) NOT NULL COMMENT 'ชื่อย่อ' , ";
$sql1 .= " `BRAN_NAME_F` VARCHAR( 150 ) NOT NULL COMMENT 'ชื่อเต็ม' , ";
$sql1 .= " `BRAN_PROVINCE_ID` INT( 5 ) NOT NULL COMMENT 'ID จังหวัด' , "; //user *
$sql1 .= " `BRAN_CREATEBY` VARCHAR( 100 ) NOT NULL COMMENT 'คนสร้าง' , ";
$sql1 .= " `BRAN_CREATETIME` DATETIME NOT NULL COMMENT 'วันที่สร้าง' , ";
$sql1 .= " `BRAN_UPDATEBY` VARCHAR( 100 ) NULL COMMENT 'คนแก้ไข' , ";
$sql1 .= " `BRAN_UPDATETIME` DATETIME NULL COMMENT 'วันที่แก้ไข' , ";
$sql1 .= " `BRAN_STATUS` TINYINT( 1 ) NOT NULL DEFAULT '1' COMMENT 'สถานะ' , ";
$sql1 .= " INDEX(BRAN_ID, BRAN_NAME_F, BRAN_PROVINCE_ID) ";
$sql1 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COMMENT = 'ตารางสาขา' COLLATE utf8_general_ci ";

 $create_tb1 = mysql_query($sql1) or die(mysql_error());

 //มี
 $sql2 = " CREATE TABLE IF NOT EXISTS `tbl_depratment` ( ";
 $sql2 .= " `DEP_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'ลำแผนก' , "; //id
 $sql2 .= " `DEP_NAME` VARCHAR( 100 ) NOT NULL COMMENT 'ชื่อแผนก' , ";
 $sql2 .= " `DEP_BRAN_ID` INT NOT NULL COMMENT 'ID สาขา' , ";
 $sql2 .= " `DEP_CREATEBY` VARCHAR( 100 ) NOT NULL COMMENT 'คนสร้าง' , ";
 $sql2 .= " `DEP_CREATETIME` DATETIME NOT NULL COMMENT 'วันที่สร้าง' , ";
 $sql2 .= " `DEP_UPDATEBY` VARCHAR( 100 ) NULL COMMENT 'คนแก้ไข' , ";
 $sql2 .= " `DEP_UPDATETIME` DATETIME NULL COMMENT 'วันที่แก้ไข' , ";
 $sql2 .= " `DEP_STATUS` TINYINT( 1 ) NOT NULL DEFAULT '1' COMMENT 'สถานะ' , ";
 $sql2 .= " INDEX(DEP_ID, DEP_NAME, DEP_BRAN_ID) ";
 $sql2 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COMMENT = 'ตารางแผนก' COLLATE utf8_general_ci ";

 $create_tb2 = mysql_query($sql2) or die(mysql_error());

 //มี
 $sql3 = " CREATE TABLE IF NOT EXISTS `tbl_type_car` ( ";
 $sql3 .= " `TCAR_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'ลำดับประเภทรถ' , "; //id
 $sql3 .= " `TCAR_NAME` VARCHAR( 100 ) NOT NULL COMMENT 'ชื่อประเภทรถ' , ";
 $sql3 .= " `TCAR_CREATEBY` VARCHAR( 100 ) NOT NULL COMMENT 'คนสร้าง' , ";
 $sql3 .= " `TCAR_CREATETIME` DATETIME NOT NULL COMMENT 'วันที่สร้าง' , ";
 $sql3 .= " `TCAR_UPDATEBY` VARCHAR( 100 ) NULL COMMENT 'คนแก้ไข' , ";
 $sql3 .= " `TCAR_UPDATETIME` DATETIME NULL COMMENT 'วันที่แก้ไข' , ";
 $sql3 .= " `TCAR_STATUS` TINYINT( 1 ) NOT NULL DEFAULT '1' COMMENT 'สถานะ' , ";
 $sql3 .= " INDEX(TCAR_ID, TCAR_NAME) ";
 $sql3 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COMMENT = 'ตารางประเภทรถ' COLLATE utf8_general_ci ";

  $create_tb3 = mysql_query($sql3) or die(mysql_error());

  //มี
  $sql4 = " CREATE TABLE IF NOT EXISTS `tbl_distance` ( ";
  $sql4 .= " `DIST_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'ลำดับระยะทาง' , "; //id
  $sql4 .= " `DIST_NAME` VARCHAR( 100 ) NOT NULL COMMENT 'ระยะทาง' , ";
  $sql4 .= " `DIST_ID_TCAR` INT NOT NULL COMMENT 'ID ประเภทรถ' , ";
  $sql4 .= " `DIST_CREATEBY` VARCHAR( 100 ) NOT NULL COMMENT 'คนสร้าง' , ";
  $sql4 .= " `DIST_CREATETIME` DATETIME NOT NULL COMMENT 'วันที่สร้าง' , ";
  $sql4 .= " `DIST_UPDATEBY` VARCHAR( 100 ) NULL COMMENT 'คนแก้ไข' , ";
  $sql4 .= " `DIST_UPDATETIME` DATETIME NULL COMMENT 'วันที่แก้ไข' , ";
  $sql4 .= " `DIST_STATUS` TINYINT( 1 ) NOT NULL DEFAULT '1' COMMENT 'สถานะ' , ";
  $sql4 .= " INDEX(DIST_ID, DIST_NAME, DIST_ID_TCAR) ";
  $sql4 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COMMENT = 'ตารางระยะทาง' COLLATE utf8_general_ci ";

  $create_tb4 = mysql_query($sql4) or die(mysql_error());

  //มี
  $sql5 = " CREATE TABLE IF NOT EXISTS `tbl_driver` ( ";
  $sql5 .= " `DRIV_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'ลำดับเลทค่าขับ' , "; //id
  $sql5 .= " `DRIV_ID_DIST` INT NOT NULL COMMENT 'ID ระยะทาง' , ";
  $sql5 .= " `DRIV_ID_TCAR` INT NOT NULL COMMENT 'ID ประเภทรถ' , ";
  $sql5 .= " `DRIV_NAME` DOUBLE( 11, 4 ) NOT NULL COMMENT 'ค่าขับ' , ";
  $sql5 .= " `DRIV_CREATEBY` VARCHAR( 100 ) NOT NULL COMMENT 'คนสร้าง' , ";
  $sql5 .= " `DRIV_CREATETIME` DATETIME NOT NULL COMMENT 'วันที่สร้าง' , ";
  $sql5 .= " `DRIV_UPDATEBY` VARCHAR( 100 ) NULL COMMENT 'คนแก้ไข' , ";
  $sql5 .= " `DRIV_UPDATETIME` DATETIME NULL COMMENT 'วันที่แก้ไข' , ";
  $sql5 .= " `DRIV_STATUS` TINYINT( 1 ) NOT NULL DEFAULT '1' COMMENT 'สถานะ' , ";
  $sql5 .= " INDEX(DRIV_ID, DRIV_ID_DIST, DRIV_ID_TCAR, DRIV_NAME) ";
  $sql5 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COMMENT = 'ตารางเลทค่าขับ' COLLATE utf8_general_ci ";

   $create_tb5 = mysql_query($sql5) or die(mysql_error());

   //มี
   $sql6 = " CREATE TABLE IF NOT EXISTS `tbl_car` ( ";
   $sql6 .= " `CAR_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'ลำดับข้อมูลรถ' , "; //id
   $sql6 .= " `CAR_SERVER_ID` INT NOT NULL COMMENT 'ID รถจากเซิฟเวอร์' , ";
   $sql6 .= " `CAR_ID_TCAR` INT NOT NULL COMMENT 'ID ประเภทรถ' , ";
   $sql6 .= " `CAR_LICENSE` VARCHAR( 20 ) NOT NULL COMMENT 'ทะเบียนรถ' , ";
   $sql6 .= " `CAR_MILEAGA` INT NOT NULL COMMENT 'เลขไมค์' , ";
   $sql6 .= " `CAR_CREATEBY` VARCHAR( 100 ) NOT NULL COMMENT 'คนสร้าง' , ";
   $sql6 .= " `CAR_CREATETIME` DATETIME NOT NULL COMMENT 'วันที่สร้าง' , ";
   $sql6 .= " `CAR_UPDATEBY` VARCHAR( 100 ) NULL COMMENT 'คนแก้ไข' , ";
   $sql6 .= " `CAR_UPDATETIME` DATETIME NULL COMMENT 'วันที่แก้ไข' , ";
   $sql6 .= " `CAR_STATUS` TINYINT( 1 ) NOT NULL DEFAULT '1' COMMENT 'สถานะ 1.ข้อมูลยังไม่สมบูรณ์ 2.ข้อมูลสมบูรณ์ 3.ปิดใช้งาน' , ";
   $sql6 .= " INDEX(CAR_ID, CAR_ID_TCAR, CAR_LICENSE, CAR_MILEAGA) ";
   $sql6 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COMMENT = 'ตารางข้อมูลรถ' COLLATE utf8_general_ci ";

   $create_tb6 = mysql_query($sql6) or die(mysql_error());

   //มี
   $sql7 = " CREATE TABLE IF NOT EXISTS `tbl_user` ( ";
   $sql7 .= " `USE_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'ลำดับผู้ใช้งาน' , "; //id
   $sql7 .= " `USE_EMPLOYEE_NUM` VARCHAR(7) NOT NULL COMMENT 'รหัสพนักงาน' , ";
   $sql7 .= " `USE_NAME` VARCHAR(200) NOT NULL COMMENT 'ชื่อ-นามสกุล' , ";
   $sql7 .= " `USE_USER` VARCHAR(100) NOT NULL COMMENT 'USER' , ";
   $sql7 .= " `USE_PASS` VARCHAR(30) NOT NULL COMMENT 'PASS' , ";
   $sql7 .= " `USE_ID_DEP` INT NOT NULL COMMENT 'ID แผนก' , ";
   $sql7 .= " `USE_ID_BRAN` INT NOT NULL COMMENT 'ID สาขา' , ";
   $sql7 .= " `USE_ID_PROVINCE` INT(5) NOT NULL COMMENT 'ID จังหวัด' , ";
   $sql7 .= " `USE_CREATEBY` VARCHAR(200) NOT NULL COMMENT 'คนสร้าง' , ";
   $sql7 .= " `USE_CREATETIME` DATETIME NOT NULL COMMENT 'วันที่สร้าง' , ";
   $sql7 .= " `USE_UPDATEBY` VARCHAR(200) NULL COMMENT 'คนแก้ไข' , ";
   $sql7 .= " `USE_UPDATETIME` DATETIME NULL COMMENT 'วันที่แก้ไข' , ";
   $sql7 .= " `USE_STATUS` TINYINT( 1 ) NOT NULL DEFAULT '1' COMMENT 'สถานะการใช้งาน' , ";
   $sql7 .= " `USE_STATUS_LOGIN` TINYINT( 1 ) NOT NULL DEFAULT '0' COMMENT 'สถานะล็อคอิน' , ";
   $sql7 .= " `USE_TIME_LOGIN` DATETIME NULL COMMENT 'เวลา Login' , ";
   $sql7 .= " INDEX(USE_ID, USE_EMPLOYEE_NUM, USE_NAME, USE_USER, USE_ID_DEP, USE_ID_BRAN, USE_ID_PROVINCE) ";
   $sql7 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COMMENT = 'ตารางผู้ใช้งาน' COLLATE utf8_general_ci ";

    $create_tb7 = mysql_query($sql7) or die(mysql_error());

    //มี
   $sql8 = " CREATE TABLE IF NOT EXISTS `tbl_wage_hd` ( ";
   $sql8 .= " `WHD_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'ลำดับหัวตามบิล' , "; //
   $sql8 .= " `WHD_BRAN` TINYINT( 1 ) NOT NULL COMMENT 'เซิฟเวอร์สาขา' , ";
   $sql8 .= " `WHD_TBILL` TINYINT( 1 ) NOT NULL COMMENT 'ประเภทบิล' , ";
   $sql8 .= " `WHD_NO_BILL` VARCHAR(50) NOT NULL COMMENT 'รหัสบิล' , ";
   $sql8 .= " `WHD_CUST_NAME` VARCHAR( 200 ) NOT NULL COMMENT 'ชื่อลูกค้า' , ";
   $sql8 .= " `WHD_PAY` TINYINT(1) NOT NULL COMMENT 'รอบจ่ายค่าแรง' , ";
   $sql8 .= " `WHD_SEND` TINYINT(1) NOT NULL COMMENT 'การส่งของ' , ";
   $sql8 .= " `WHD_DATE` DATE NOT NULL COMMENT 'วันที่ปฏิบัติงาน' , ";
   $sql8 .= " `WHD_TIME` TIME NOT NULL COMMENT 'เวลาตอนที่ทำ' , ";
   $sql8 .= " `WHD_MANY` TINYINT(1) NULL DEFAULT '1' COMMENT 'ยกหลายแผนก' , ";
   $sql8 .= " `WHD_CREATEBY` VARCHAR(200) NOT NULL COMMENT 'คนสร้าง' , ";
   $sql8 .= " `WHD_CREATETIME` DATETIME NOT NULL COMMENT 'วันที่สร้าง' , ";
   $sql8 .= " `WHD_UPDATEBY` VARCHAR(200) NULL COMMENT 'คนแก้ไข' , ";
   $sql8 .= " `WHD_UPDATETIME` DATETIME NULL COMMENT 'วันที่แก้ไข' , ";
   $sql8 .= " `WHD_STATUS` TINYINT(1) NOT NULL DEFAULT '1' COMMENT 'สถานะ' , ";
   $sql8 .= " `WHD_APPROVE` TINYINT( 1 ) NOT NULL DEFAULT '0' COMMENT 'สถานะการอนุมัติ' , ";
   $sql8 .= " INDEX(WHD_ID, WHD_NO_BILL, WHD_DATE) ";
   $sql8 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COMMENT = 'ตารางหัวตามบิล' COLLATE utf8_general_ci";

   $create_tb8 = mysql_query($sql8) or die(mysql_error());

   //มี
   $sql9 = " CREATE TABLE IF NOT EXISTS `tbl_wage_car` ( ";
   $sql9 .= " `WCAR_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'ลำดับเดินรถ' , "; //id
   $sql9 .= " `WCAR_ID_WHD` INT NOT NULL COMMENT 'ID หัวบิลส่งของ' , ";
   $sql9 .= " `WCAR_ID_CAR` INT NOT NULL COMMENT 'ID รถ' , ";
   $sql9 .= " `WCAR_DATE_SEND` DATE NOT NULL COMMENT 'วันที่ส่ง' , ";
   $sql9 .= " `WCAR_TIME_SEND` TIME NOT NULL COMMENT 'เวลาไป' , ";
   $sql9 .= " `WCAR_TIME_BACK` TIME NULL COMMENT 'เวลากลับ' , ";
   $sql9 .= " `WCAR_LOCATION` VARCHAR(250) NOT NULL COMMENT 'สถานที่ไป' , ";
   $sql9 .= " `WCAR_ID_PERSONAL` INT NOT NULL COMMENT 'ID พนักงาน' , ";
   $sql9 .= " `WCAR_MILEAGE_GO` VARCHAR(20) NOT NULL COMMENT 'เลขไมล์ก่อนไป' , ";
   $sql9 .= " `WCAR_MILEAGE_BACK` VARCHAR(20) NOT NULL COMMENT 'เลขไมล์กลับ' , ";
   $sql9 .= " `WCAR_KILO_SEND` VARCHAR(20) NOT NULL COMMENT 'กิโลที่วิ่ง' , ";
   $sql9 .= " `WCAR_CREATEBY` VARCHAR(200) NOT NULL COMMENT 'คนสร้าง' , ";
   $sql9 .= " `WCAR_CREATETIME` DATETIME NOT NULL COMMENT 'วันที่สร้าง' , ";
   $sql9 .= " `WCAR_UPDATEBY` VARCHAR(200) NULL COMMENT 'คนแก้ไข' , ";
   $sql9 .= " `WCAR_UPDATETIME` DATETIME NULL COMMENT 'วันที่แก้ไข' , ";
   $sql9 .= " `WCAR_STATUS` TINYINT( 1 ) NOT NULL DEFAULT '1' COMMENT 'สถานะ' , ";
   $sql9 .= " INDEX(WCAR_ID, WCAR_ID_WHD, WCAR_ID_CAR, WCAR_ID_PERSONAL) ";
   $sql9 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COMMENT = 'ตารางเดินรถ' COLLATE utf8_general_ci ";

    $create_tb9 = mysql_query($sql9) or die(mysql_error());

    //มี
    $sql10 = " CREATE TABLE IF NOT EXISTS `tbl_wage_car_2` ( ";
    $sql10 .= " `WCAR2_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'ลำดับลูกน้องรถ' , "; //id
    $sql10 .= " `WCAR2_ID_WCAR` INT NOT NULL COMMENT 'ID เดินรถ' , ";
    $sql10 .= " `WCAR2_ID_PERSONAL` INT NOT NULL COMMENT 'ID รหัสพนักงาน' , "; //user *
    $sql10 .= " `WCAR2_TICKET` DOUBLE( 11, 4 ) NULL COMMENT 'ค่าเดินรถพิเศษ' , ";
    $sql10 .= " `WCAR2_CREATEBY` VARCHAR( 200 ) NOT NULL COMMENT 'คนสร้าง' , ";
    $sql10 .= " `WCAR2_CREATETIME` DATETIME NOT NULL COMMENT 'วันที่สร้าง' , ";
    $sql10 .= " `WCAR2_UPDATEBY` VARCHAR( 200 ) NULL COMMENT 'คนแก้ไข' , ";
    $sql10 .= " `WCAR2_UPDATETIME` DATETIME NULL COMMENT 'วันที่แก้ไข' , ";
    $sql10 .= " `WCAR2_STATUS` TINYINT( 1 ) NOT NULL DEFAULT '1' COMMENT 'สถานะ' , ";
    $sql10 .= " INDEX(WCAR2_ID, WCAR2_ID_WCAR, WCAR2_ID_PERSONAL) ";
    $sql10 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COMMENT = 'ตารางลูกน้องรถ' COLLATE utf8_general_ci ";

    $create_tb10 = mysql_query($sql10) or die(mysql_error());

    //มี
    $sql11 = " CREATE TABLE IF NOT EXISTS `tbl_personal` ( ";
    $sql11 .= " `PSN_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'ลำดับพนักงาน' , "; //id
    $sql11 .= " `PSN_SERVER_ID` INT NOT NULL COMMENT 'ID พนักงานจากเซิฟเวอร์' , ";
    $sql11 .= " `PSN_EMPLOYEE_NUM` VARCHAR(7) NOT NULL COMMENT 'รหัสพนักงาน' , ";
    $sql11 .= " `PSN_NAME` VARCHAR(200) NOT NULL COMMENT 'ชื่อ-นามสกุล' , "; //user *
    $sql11 .= " `PSN_ID_DEP` INT NULL COMMENT 'ID แผนก' , ";
    $sql11 .= " `PSN_ID_BRAN` INT NULL COMMENT 'ID สาขา' , ";
    $sql11 .= " `PSN_ID_PROVINCE` INT(5) NULL COMMENT 'ID จังหวัด' , ";
    $sql11 .= " `PSN_MIN_WAGE` DOUBLE( 11, 4) NULL COMMENT 'ค่าแรงขั้นต่ำ' , ";
    $sql11 .= " `PSN_ID_POSITION` INT(2) NOT NULL COMMENT 'ID ตำแหน่ง' , ";
    $sql11 .= " `PSN_CREATEBY` VARCHAR(200) NOT NULL COMMENT 'คนสร้าง' , ";
    $sql11 .= " `PSN_CREATETIME` DATETIME NOT NULL COMMENT 'วันที่สร้าง' , ";
    $sql11 .= " `PSN_UPDATEBY` VARCHAR(200) NULL COMMENT 'คนแก้ไข' , ";
    $sql11 .= " `PSN_UPDATETIME` DATETIME NULL COMMENT 'วันที่แก้ไข' , ";
    $sql11 .= " `PSN_STATUS` TINYINT( 1 ) NOT NULL DEFAULT '1' COMMENT 'สถานะ' , ";
    $sql11 .= " INDEX(PSN_ID, PSN_EMPLOYEE_NUM, PSN_NAME, PSN_ID_DEP, PSN_ID_BRAN, PSN_ID_PROVINCE, PSN_ID_POSITION) ";
    $sql11 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COMMENT = 'ตารางพนักงาน' COLLATE utf8_general_ci ";

     $create_tb11 = mysql_query($sql11) or die(mysql_error());

     //มี
     $sql12 = " CREATE TABLE IF NOT EXISTS `tbl_position` ( ";
     $sql12 .= " `POSI_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'ลำดับตำแหน่ง' , "; //id
     $sql12 .= " `POSI_SERVER_ID` INT NOT NULL COMMENT 'ID ตำแหน่งจาก server' , ";
     $sql12 .= " `POSI_CODE` VARCHAR( 10 ) NOT NULL COMMENT 'รหัสตำแหน่ง' , ";
     $sql12 .= " `POSI_NAME` VARCHAR( 200 ) NOT NULL COMMENT 'ชื่อตำแหน่ง' , ";
     $sql12 .= " `POSI_CREATEBY` VARCHAR( 200 ) NOT NULL COMMENT 'คนสร้าง' , ";
     $sql12 .= " `POSI_CREATETIME` DATETIME NOT NULL COMMENT 'วันที่สร้าง' , ";
     $sql12 .= " `POSI_UPDATEBY` VARCHAR( 200 ) NULL COMMENT 'คนแก้ไข' , ";
     $sql12 .= " `POSI_UPDATETIME` DATETIME NULL COMMENT 'วันที่แก้ไข' , ";
     $sql12 .= " `POSI_STATUS` TINYINT( 1 ) NOT NULL DEFAULT '1' COMMENT 'สถานะ' , ";
     $sql12 .= " INDEX(POSI_SERVER_ID,POSI_CODE,POSI_ID, POSI_NAME) ";
     $sql12 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COMMENT = 'ตารางตำแหน่ง' COLLATE utf8_general_ci ";

     $create_tb12 = mysql_query($sql12) or die(mysql_error());

     //มี
     $sql13 = " CREATE TABLE IF NOT EXISTS `tbl_send_product` ( ";
     $sql13 .= " `SPD_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'ลำดับสินค้าที่ส่ง' , "; //id
     $sql13 .= " `SPD_ID_WHD` INT NOT NULL COMMENT 'ID ส่วนหัวการส่ง' , ";
     $sql13 .= " `SPD_ID_PROD` INT NOT NULL COMMENT 'ID สินค้า' , ";
     $sql13 .= " `SPD_NO_BILL` VARCHAR( 50 ) NOT NULL COMMENT 'เลขที่บิล' , ";
     $qsl13 .= " `SPD_BARCODE` VARCHAR( 20 ) NOT NULL COMMENT  'บาร์โค๊ด' , ";
     $sql13 .= " `SPD_NUMBER` DOUBLE( 11, 4) NOT NULL COMMENT 'จำนวน' , ";
     $sql13 .= " `SPD_PRICE` DOUBLE( 11, 4) NOT NULL COMMENT 'ราคาต่อหน่วย' , ";
     $sql13 .= " `SPD_SUM_PRICE` DOUBLE( 11, 4) NOT NULL COMMENT 'รวมเงิน' , ";
     $sql13 .= " `SPD_LIFT` TINYINT(1) NULL DEFAULT '1' COMMENT 'การยก 1.ยกขึ้น 2.ยกลง 3.ยกขึ้นและลง 4.ตักลง' , ";
     $sql13 .= " `SPD_CREATEBY` VARCHAR(200) NOT NULL COMMENT 'คนสร้าง' , ";
     $sql13 .= " `SPD_CREATETIME` DATETIME NOT NULL COMMENT 'วันที่สร้าง' , ";
     $sql13 .= " `SPD_UPDATEBY` VARCHAR(200) NULL COMMENT 'คนแก้ไข' , ";
     $sql13 .= " `SPD_UPDATETIME` DATETIME NULL COMMENT 'วันที่แก้ไข' , ";
     $sql13 .= " `SPD_STATUS` TINYINT( 1 ) NOT NULL DEFAULT '1' COMMENT 'สถานะ' , ";
     $sql13 .= " INDEX(SPD_ID, SPD_ID_WHD, SPD_ID_PROD) ";
     $sql13 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COMMENT = 'ตารางสินค้าที่ส่ง' COLLATE utf8_general_ci";

      $create_tb13 = mysql_query($sql13) or die(mysql_error());

      //มี
      $sql14 = " CREATE TABLE IF NOT EXISTS `tbl_product` ( ";
      $sql14 .= " `PROD_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'ลำดับสินค้า' , "; //id
      $sql14 .= " `PROD_NAME` VARCHAR( 250 ) NOT NULL COMMENT 'ชื่อสินค้า' , ";
      $sql14 .= " `PROD_CODE` VARCHAR( 50 ) NOT NULL COMMENT 'รหัสสินค้า' , ";
      $sql14 .= " `PROD_BARCODE` VARCHAR( 50 ) NOT NULL COMMENT 'บาร์โค้ด' , ";
      $sql14 .= " `PROD_GOODID` INT NOT NULL COMMENT 'ลำดับสินค้า WINSPEED' , ";
      $sql14 .= " `PROD_ID_TPRO` INT NOT NULL COMMENT 'ID ประเภทสินค้า' , ";
      $sql14 .= " `PROD_UNIT` VARCHAR( 150 ) NOT NULL COMMENT 'หน่วยสินค้า' , ";
      $sql14 .= " `PROD_CREATEBY` VARCHAR( 200 ) NOT NULL COMMENT 'คนสร้าง' , ";
      $sql14 .= " `PROD_CREATETIME` DATETIME NOT NULL COMMENT 'วันที่สร้าง' , ";
      $sql14 .= " `PROD_UPDATEBY` VARCHAR( 200 ) NULL COMMENT 'คนแก้ไข' , ";
      $sql14 .= " `PROD_UPDATETIME` DATETIME NULL COMMENT 'วันที่แก้ไข' , ";
      $sql14 .= " `PROD_STATUS` TINYINT( 1 ) NOT NULL DEFAULT '1' COMMENT 'สถานะ 1. ยังไม่เพิ่มค่ายก 2.เพิ่มค่ายกแล้ว 0.ยกเลิก' , ";
      $sql14 .= " INDEX(PROD_ID, PROD_NAME, PROD_CODE, PROD_BARCODE) ";
      $sql14 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COMMENT = 'ตารางสินค้า' COLLATE utf8_general_ci";

      $create_tb14 = mysql_query($sql14) or die(mysql_error());

      //มี
      $sql15 = " CREATE TABLE IF NOT EXISTS `tbl_ratproduct` ( ";
      $sql15 .= " `PROR_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'ลำดับเลทสินค้า' , "; //id
      $sql15 .= " `PROR_ID_PROD` INT NOT NULL COMMENT 'ID สินค้า' , ";
      $sql15 .= " `PROR_ID_PROVINCE` INT( 5 ) NULL COMMENT 'ID จังหวัด' , ";
      $sql15 .= " `PROR_RAT_LIFT` DOUBLE(  11, 4 ) NULL COMMENT 'ค่ายก' , ";
      $sql15 .= " `PROR_CREATEBY` VARCHAR( 200 ) NOT NULL COMMENT 'คนสร้าง' , ";
      $sql15 .= " `PROR_CREATETIME` DATETIME NOT NULL COMMENT 'วันที่สร้าง' , ";
      $sql15 .= " `PROR_UPDATEBY` VARCHAR( 200 ) NULL COMMENT 'คนแก้ไข' , ";
      $sql15 .= " `PROR_UPDATETIME` DATETIME NULL COMMENT 'วันที่แก้ไข' , ";
      $sql15 .= " `PROR_STATUS` TINYINT( 1 ) NOT NULL DEFAULT '1' COMMENT 'สถานะ' , ";
      $sql15 .= " INDEX(PROR_ID, PROR_ID_PROD, PROR_ID_PROVINCE) ";
      $sql15 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COMMENT = 'ตารางเลทยกสินค้า' COLLATE utf8_general_ci";

       $create_tb15 = mysql_query($sql15) or die(mysql_error());

       //มี
       $sql16 = " CREATE TABLE IF NOT EXISTS `tbl_doingwork` ( ";
       $sql16 .= " `DOW_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'ลำดับการทำงาน' , "; //id
       $sql16 .= " `DOW_ID_WHD` INT NOT NULL COMMENT 'ID ส่วนหัว' , ";
       $sql16 .= " `DOW_ID_SPD` INT NOT NULL COMMENT 'ID สินค้าที่ส่ง' , ";
       $sql16 .= " `DOW_ID_PSN` INT NOT NULL COMMENT 'ID พนักงาน' , ";
       $sql16 .= " `DOW_LIFT` DOUBLE( 11, 4) NOT NULL COMMENT 'ค่ายก' , ";
       $sql16 .= " `DOW_PAY` TINYINT(1) NOT NULL COMMENT 'รอบจ่าย 1.ค่าแรงปกติ 2.ค่าเหมา' , ";
       $sql16 .= " `DOW_PAY_EXTRA` DOUBLE( 11, 4) NULL COMMENT 'ค่าแรงพิเศษ (ยกสินค้ายาก ให้เพิ่ม)' , ";
       $sql16 .= " `DOW_NOTE` TEXT NULL COMMENT 'หมายเหตุ ค่าแรงพิเศษ' , ";
       $sql16 .= " `DOW_CREATEBY` VARCHAR(200) NOT NULL COMMENT 'คนสร้าง' , ";
       $sql16 .= " `DOW_CREATETIME` DATETIME NOT NULL COMMENT 'วันที่สร้าง' , ";
       $sql16 .= " `DOW_UPDATEBY` VARCHAR( 200 ) NULL COMMENT 'คนแก้ไข' , ";
       $sql16 .= " `DOW_UPDATETIME` DATETIME NULL COMMENT 'วันที่แก้ไข' , ";
       $sql16 .= " `DOW_STATUS` TINYINT( 1 ) NOT NULL DEFAULT '1' COMMENT 'สถานะ' , ";
       $sql16 .= " INDEX(DOW_ID, DOW_ID_WHD, DOW_ID_SPD, DOW_ID_PSN) ";
       $sql16 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COMMENT = 'ตารางการทำงาน' COLLATE utf8_general_ci";

       $create_tb16 = mysql_query($sql16) or die(mysql_error());

       //มี
       $sql17 = " CREATE TABLE IF NOT EXISTS `tbl_miscellaneous_hd` ( ";
       $sql17 .= " `MCHD_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'ลำดับหัวเบ็ดเตล็ด' , "; //id
       $sql17 .= " `MCHD_PAGENUM` VARCHAR(100) NOT NULL COMMENT 'เลขที่หน้า' , ";
       $sql17 .= " `MCHD_PAY` DOUBLE( 11, 4) NOT NULL COMMENT 'รอบจ่าย' , ";
       $sql17 .= " `MCHD_DATE` DATE NOT NULL COMMENT 'วันที่ทำ' , ";
       $sql17 .= " `MCHD_DETAIL` TEXT NOT NULL COMMENT 'รายละเอียด' , ";
       $sql17 .= " `MCHD_APPROVE` TINYINT(1) NOT NULL DEFAULT '1' COMMENT 'สถานะการอนุมัติ 1.ยังไม่อนุมัติ 2.อนุมัติ' , ";
       $sql17 .= " `MCHD_CREATEBY` VARCHAR(200) NOT NULL COMMENT 'คนสร้าง' , ";
       $sql17 .= " `MCHD_CREATETIME` DATETIME NOT NULL COMMENT 'วันที่สร้าง' , ";
       $sql17 .= " `MCHD_UPDATEBY` VARCHAR(200) NULL COMMENT 'คนแก้ไข' , ";
       $sql17 .= " `MCHD_UPDATETIME` DATETIME NULL COMMENT 'วันที่แก้ไข' , ";
       $sql17 .= " `MCHD_STATUS` TINYINT( 1 ) NOT NULL DEFAULT '1' COMMENT 'สถานะ' , ";
       $sql17 .= " INDEX(MCHD_ID, MCHD_PAGENUM) ";
       $sql17 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COMMENT = 'ตารางหัวเบ็ดเตล็ด' COLLATE utf8_general_ci";

        $create_tb17 = mysql_query($sql17) or die(mysql_error());

        //มี
        $sql18 = " CREATE TABLE IF NOT EXISTS `tbl_miscellaneous_dt` ( ";
        $sql18 .= " `MCDT_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'ลำดับการทำงานเบ็ดเตล็ด' , "; //id
        $sql18 .= " `MCDT_ID_MCHD` INT NOT NULL COMMENT 'ID หัวเบ็ดเตล็ด' , ";
        $sql18 .= " `MCDT_ID_PSN` INT NOT NULL COMMENT 'ID หนักงาน' , ";
        $sql18 .= " `MCDT_PAY` DOUBLE( 11, 4) NOT NULL COMMENT 'ค่าทำงาน' , ";
        $sql18 .= " `MCDT_APPROVE` TINYINT(1) NOT NULL DEFAULT '1' COMMENT 'สถานะอนุมัติ 1.ยังไม่ได้อนุมัติ 2.อนุมัติ' , ";
        $sql18 .= " `MCDT_CREATEBY` VARCHAR(200) NOT NULL COMMENT 'คนสร้าง' , ";
        $sql18 .= " `MCDT_CREATETIME` DATETIME NOT NULL COMMENT 'วันที่สร้าง' , ";
        $sql18 .= " `MCDT_UPDATEBY` VARCHAR(200) NULL COMMENT 'คนแก้ไข' , ";
        $sql18 .= " `MCDT_UPDATETIME` DATETIME NULL COMMENT 'วันที่แก้ไข' , ";
        $sql18 .= " `MCDT_STATUS` TINYINT(1) NOT NULL DEFAULT '1' COMMENT '1' COMMENT 'สถานะ' , ";
        $sql18 .= " INDEX(MCDT_ID, MCDT_ID_MCHD) ";
        $sql18 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COMMENT = 'ตารางการทำงานเบ็ดเตล็ด' COLLATE utf8_general_ci ";

        $create_tb18 = mysql_query($sql18) or die(mysql_error());

        //มี
        $sql19 = " CREATE TABLE IF NOT EXISTS `tbl_type_product` ( ";
        $sql19 .= " `TPRO_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'ลำดับประเภทสินค้า' , "; //id
        $sql19 .= " `TPRO_CODE` VARCHAR( 100 ) NOT NULL COMMENT 'รหัสประเภท' , ";
        $sql19 .= " `TPRO_NAME` VARCHAR( 200 ) NOT NULL COMMENT 'ชื่อประเภทสินค้า' , ";
        $sql19 .= " `TPRO_CREATEBY` VARCHAR( 100 ) NOT NULL COMMENT 'คนสร้าง' , ";
        $sql19 .= " `TPRO_CREATETIME` DATETIME NOT NULL COMMENT 'วันที่สร้าง' , ";
        $sql19 .= " `TPRO_UPDATEBY` VARCHAR( 100 ) NULL COMMENT 'คนแก้ไข' , ";
        $sql19 .= " `TPRO_UPDATETIME` DATETIME NULL COMMENT 'วันที่แก้ไข' , ";
        $sql19 .= " `TPRO_STATUS` TINYINT( 1 ) NOT NULL DEFAULT '1' COMMENT 'สถานะ' , ";
        $sql19 .= " INDEX(TPRO_ID, TPRO_NAME) ";
        $sql19 .= " ) ENGINE = InnoDB CHARACTER SET utf8 COMMENT = 'ตารางประเภทสินค้า' COLLATE utf8_general_ci ";

         $create_tb19 = mysql_query($sql19) or die(mysql_error());

         //มี
         $sql20 = " CREATE TABLE IF NOT EXISTS `tbl_log_ratproduct` ( ";
         $sql20 .= " `LOG_RATPRO_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'ID ลอคแก้เลทสินค้า' , ";
         $sql20 .= " `LOG_RATPRO_ID_PROR` INT NOT NULL COMMENT 'ID เลทสินค้า' , ";
         $sql20 .= " `LOG_RATPRO_CREATEBY` VARCHAR( 200 ) NOT NULL COMMENT 'คนแก้ไข' , ";
         $sql20 .= " `LOG_RATPRO_CREATETIME` DATETIME NOT NULL COMMENT 'วันที่แก้ไข' , ";
         $sql20 .= " `LOG_RATPRO_STATUS` TINYINT( 1 ) NOT NULL COMMENT 'สถานะ 1.แก้ไข 2.ลบ' , ";
         $sql20 .= " INDEX(LOG_RATPRO_ID, LOG_RATPRO_ID_PROR, LOG_RATPRO_CREATEBY) ";
         $sql20 .= ") ENGINE = InnoDB CHARACTER SET utf8 COMMENT = 'ตารางลอคแก้ไขเลทสินค้า' COLLATE utf8_general_ci ";

         $create_tb20 = mysql_query($sql20) or die(mysql_error());

         //มี
         $sql21 = " CREATE TABLE IF NOT EXISTS `tbl_log_user` ( ";
         $sql21 .= " `LOG_USER_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'ID LOG USER' , ";
         $sql21 .= " `LOG_USER_ID_USE` INT NOT NULL COMMENT 'ID USER' , ";
         $sql21 .= " `LOG_USER_CREATEBY` VARCHAR( 200 ) NOT NULL COMMENT 'คนดำเนินการ' , ";
         $sql21 .= " `LOG_USER_CREATETIME` DATETIME NOT NULL COMMENT 'วันที่ดำเนินการ' , ";
         $sql21 .= " `LOG_USER_STRATUS` TINYINT( 1 ) NOT NULL COMMENT 'สถานะ 1.เพิ่ม 2.แก้ไข 3.ลบ' , ";
         $sql21 .= " INDEX(LOG_USER_ID, LOG_USER_ID_USE, LOG_USER_CREATEBY) ";
         $sql21 .= ") ENGINE = InnoDB CHARACTER SET utf8 COMMENT = 'เก็บประวัติ เพิ่ม/ลบ/แก้ไข USER' COLLATE utf8_general_ci ";

          $create_tb21 = mysql_query($sql21) or die(mysql_error());

          //มี
          $sql22 = " CREATE TABLE IF NOT EXISTS `tbl_log_bran` ( ";
          $sql22 .= " `LOG_BRAN_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'ID LOG BRAN' , ";
          $sql22 .= " `LOG_BRAN_ID_BRAN` INT NOT NULL COMMENT 'ID BRAN' , ";
          $sql22 .= " `LOG_BRAN_CREATEBY` VARCHAR( 200 ) NOT NULL COMMENT 'คนดำเนินการ' , ";
          $sql22 .= " `LOG_BRAN_CREATETIME` DATETIME NOT NULL COMMENT 'วันที่ดำเนินการ' , ";
          $sql22 .= " `LOG_BRAN_STRATUS` TINYINT( 1 ) NOT NULL COMMENT 'สถานะ 1.เพิ่ม 2.แก้ไข 3.ลบ' , ";
          $sql22 .= " INDEX(LOG_BRAN_ID, LOG_BRAN_ID_BRAN, LOG_BRAN_CREATEBY) ";
          $sql22 .= ") ENGINE = InnoDB CHARACTER SET utf8 COMMENT = 'เก็บประวัติ เพิ่ม/ลบ/แก้ไข BRAN' COLLATE utf8_general_ci ";

          $create_tb22 = mysql_query($sql22) or die(mysql_error());

          //มี
          $sql23 = " CREATE TABLE IF NOT EXISTS `tbl_log_dep` ( ";
          $sql23 .= " `LOG_DEP_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'ID LOG DEP' , ";
          $sql23 .= " `LOG_DEP_ID_DEP` INT NOT NULL COMMENT 'ID DEP' , ";
          $sql23 .= " `LOG_DEP_CREATEBY` VARCHAR( 200 ) NOT NULL COMMENT 'คนดำเนินการ' , ";
          $sql23 .= " `LOG_DEP_CREATETIME` DATETIME NOT NULL COMMENT 'วันที่ดำเนินการ' , ";
          $sql23 .= " `LOG_DEP_STRATUS` TINYINT( 1 ) NOT NULL COMMENT 'สถานะ 1.เพิ่ม 2.แก้ไข 3.ลบ' , ";
          $sql23 .= " INDEX(LOG_DEP_ID, LOG_DEP_ID_DEP, LOG_DEP_CREATEBY) ";
          $sql23 .= ") ENGINE = InnoDB CHARACTER SET utf8 COMMENT = 'เก็บประวัติ เพิ่ม/ลบ/แก้ไข DEP' COLLATE utf8_general_ci ";

           $create_tb23 = mysql_query($sql23) or die(mysql_error());

           //มี
           $sql24 = " CREATE TABLE IF NOT EXISTS `tbl_log_tcar` ( ";
           $sql24 .= " `LOG_TCAR_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'ID LOG TCAR' , ";
           $sql24 .= " `LOG_TCAR_ID_TCAR` INT NOT NULL COMMENT 'ID TCAR' , ";
           $sql24 .= " `LOG_TCAR_CREATEBY` VARCHAR( 200 ) NOT NULL COMMENT 'คนดำเนินการ' , ";
           $sql24 .= " `LOG_TCAR_CREATETIME` DATETIME NOT NULL COMMENT 'วันที่ดำเนินการ' , ";
           $sql24 .= " `LOG_TCAR_STRATUS` TINYINT( 1 ) NOT NULL COMMENT 'สถานะ 1.เพิ่ม 2.แก้ไข 3.ลบ' , ";
           $sql24 .= " INDEX(LOG_TCAR_ID, LOG_TCAR_ID_TCAR, LOG_TCAR_CREATEBY) ";
           $sql24 .= ") ENGINE = InnoDB CHARACTER SET utf8 COMMENT = 'เก็บประวัติ เพิ่ม/ลบ/แก้ไข TCAR' COLLATE utf8_general_ci ";

            $create_tb24 = mysql_query($sql24) or die(mysql_error());

            //มี
            $sql25 = " CREATE TABLE IF NOT EXISTS `tbl_log_driver` ( ";
            $sql25 .= " `LOG_DRIVER_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'ID LOG DRIVER' , ";
            $sql25 .= " `LOG_DRIVER_ID_DRIVER` INT NOT NULL COMMENT 'ID DRIVER' , ";
            $sql25 .= " `LOG_DRIVER_CREATEBY` VARCHAR( 200 ) NOT NULL COMMENT 'คนดำเนินการ' , ";
            $sql25 .= " `LOG_DRIVER_CREATETIME` DATETIME NOT NULL COMMENT 'วันที่ดำเนินการ' , ";
            $sql25 .= " `LOG_DRIVER_STRATUS` TINYINT( 1 ) NOT NULL COMMENT 'สถานะ 1.เพิ่ม 2.แก้ไข 3.ลบ' , ";
            $sql25 .= " INDEX(LOG_DRIVER_ID, LOG_DRIVER_ID_DRIVER, LOG_DRIVER_CREATEBY) ";
            $sql25 .= ") ENGINE = InnoDB CHARACTER SET utf8 COMMENT = 'เก็บประวัติ เพิ่ม/ลบ/แก้ไข DRIVER' COLLATE utf8_general_ci ";

            $create_tb25 = mysql_query($sql25) or die(mysql_error());

            //มี
            $sql26 = " CREATE TABLE IF NOT EXISTS `tbl_log_distance` ( ";
            $sql26 .= " `LOG_DISTANCE_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'ID LOG DISTANCE' , ";
            $sql26 .= " `LOG_DISTANCE_ID_DISTANCE` INT NOT NULL COMMENT 'ID DISTANCE' , ";
            $sql26 .= " `LOG_DISTANCE_CREATEBY` VARCHAR( 200 ) NOT NULL COMMENT 'คนดำเนินการ' , ";
            $sql26 .= " `LOG_DISTANCE_CREATETIME` DATETIME NOT NULL COMMENT 'วันที่ดำเนินการ' , ";
            $sql26 .= " `LOG_DISTANCE_STRATUS` TINYINT( 1 ) NOT NULL COMMENT 'สถานะ 1.เพิ่ม 2.แก้ไข 3.ลบ' , ";
            $sql26 .= " INDEX(LOG_DISTANCE_ID, LOG_DISTANCE_ID_DISTANCE, LOG_DISTANCE_CREATEBY) ";
            $sql26 .= ") ENGINE = InnoDB CHARACTER SET utf8 COMMENT = 'เก็บประวัติ เพิ่ม/ลบ/แก้ไข DISTANCE' COLLATE utf8_general_ci ";

             $create_tb26 = mysql_query($sql26) or die(mysql_error());

             //มี
             $sql27 = " CREATE TABLE IF NOT EXISTS `tbl_log_personal` ( ";
             $sql27 .= " `LOG_PERSONAL_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'ID LOG PERSONAL' , ";
             $sql27 .= " `LOG_PERSONAL_ID_PERSONAL` INT NOT NULL COMMENT 'ID PERSONAL' , ";
             $sql27 .= " `LOG_PERSONAL_CREATEBY` VARCHAR( 200 ) NOT NULL COMMENT 'คนดำเนินการ' , ";
             $sql27 .= " `LOG_PERSONAL_CREATETIME` DATETIME NOT NULL COMMENT 'วันที่ดำเนินการ' , ";
             $sql27 .= " `LOG_PERSONAL_STRATUS` TINYINT( 1 ) NOT NULL COMMENT 'สถานะ 1.เพิ่ม 2.แก้ไข 3.ลบ' , ";
             $sql27 .= " INDEX(LOG_PERSONAL_ID, LOG_PERSONAL_ID_PERSONAL, LOG_PERSONAL_CREATEBY) ";
             $sql27 .= ") ENGINE = InnoDB CHARACTER SET utf8 COMMENT = 'เก็บประวัติ เพิ่ม/ลบ/แก้ไข PERSONAL' COLLATE utf8_general_ci ";

             $create_tb27 = mysql_query($sql27) or die(mysql_error());

              //มี
              $sql28 = " CREATE TABLE IF NOT EXISTS `tbl_log_car` ( ";
              $sql28 .= " `LOG_CAR_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'ID LOG CAR' , ";
              $sql28 .= " `LOG_CAR_ID_CAR` INT NOT NULL COMMENT 'ID CAR' , ";
              $sql28 .= " `LOG_CAR_CREATEBY` VARCHAR( 200 ) NOT NULL COMMENT 'คนดำเนินการ' , ";
              $sql28 .= " `LOG_CAR_CREATETIME` DATETIME NOT NULL COMMENT 'วันที่ดำเนินการ' , ";
              $sql28 .= " `LOG_CAR_STRATUS` TINYINT( 1 ) NOT NULL COMMENT 'สถานะ 1.เพิ่ม 2.แก้ไข 3.ลบ' , ";
              $sql28 .= " INDEX(LOG_CAR_ID, LOG_CAR_ID_CAR, LOG_CAR_CREATEBY) ";
              $sql28 .= ") ENGINE = InnoDB CHARACTER SET utf8 COMMENT = 'เก็บประวัติ เพิ่ม/ลบ/แก้ไข CAR' COLLATE utf8_general_ci ";

              $create_tb28 = mysql_query($sql28) or die(mysql_error());


              $sql29 = " CREATE TABLE IF NOT EXISTS `tbl_log_wagehd` ( ";
              $sql29 .= " `LOG_WAGEHD_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'ID LOG WAGEHD' , ";
              $sql29 .= " `LOG_WAGEHD_ID_WAGEHD` INT NOT NULL COMMENT 'ID WAGEHD' , ";
              $sql29 .= " `LOG_WAGEHD_CREATEBY` VARCHAR( 200 ) NOT NULL COMMENT 'คนดำเนินการ' , ";
              $sql29 .= " `LOG_WAGEHD_CREATETIME` DATETIME NOT NULL COMMENT 'วันที่ดำเนินการ' , ";
              $sql29 .= " `LOG_WAGEHD_STRATUS` TINYINT( 1 ) NOT NULL COMMENT 'สถานะ 1.เพิ่ม 2.แก้ไข 3.ลบ' , ";
              $sql29 .= " INDEX(LOG_WAGEHD_ID, LOG_WAGEHD_ID_WAGEHD, LOG_WAGEHD_CREATEBY) ";
              $sql29 .= ") ENGINE = InnoDB CHARACTER SET utf8 COMMENT = 'เก็บประวัติ เพิ่ม/ลบ/แก้ไข WAGEHD' COLLATE utf8_general_ci ";

               $create_tb29 = mysql_query($sql29) or die(mysql_error());
mysql_close($c);
?>
