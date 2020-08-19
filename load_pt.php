<?php include "../../Connections/connect_mysql.php";
set_time_limit(0);
$date = date(Y);
$year1 = substr($date,2,2);
$code = 'YC'.$year1;
//echo $code;
  $aa = 1;
  $i = 0;
  $sql_yc = "SELECT * FROM `job` WHERE `ref_branch_id` = '104' or `ref_branch_id` = '106' or `ref_branch_id` = '107' or `ref_branch_id` = '109' or `ref_branch_id` = '111' or `ref_branch_id` = '116' or `ref_branch_id` = '118'";
    $result_yc = mysql_query($sql_yc) or die(mysql_error());
      while ($row_yc = mysql_fetch_array($result_yc)) {
    if ($row_yc == '107') {
      $sql_yc_y6 = "SELECT * FROM `job` WHERE `job_id` = '".$row_yc['job_id']."' AND `ref_dep_id` = '140'";
      $result_yc_y6 = mysql_query($sql_yc_y6) or die(mysql_error());
      $row_yc_y6 = mysql_fetch_array($result_yc_y6);

     $jobid = $row_yc_y6['job_id'];
     $jobfname = str_replace("'","/",$row_yc_y6['job_fname']);
     $joblname = str_replace("'","/",$row_yc_y6['job_lname']);
     $refdepid = $row_yc_y6['ref_dep_id'];
     $jobtel = $row_yc_y6['job_tel'];
     $reftypeid = $row_yc_y6['ref_type_id'];
     $jobdetail = str_replace("'","/",$row_yc_y6['job_detail']);
     $jobdate = $row_yc_y6['job_date'];
     $jobupdate = $row_yc_y6['job_update'];
     $jobtime = $row_yc_y6['job_time'];
     $jobstatus = $row_yc_y6['job_status'];
     $joblv = $row_yc_y6['job_lv'];
     $joblv1 = $row_yc_y6['job_lv1'];
     $jobans = str_replace("'","/",$row_yc_y6['job_ans']);
     $jobansn = $row_yc_y6['job_ansn'];
     $Jobansn2 = $row_yc_y6['Job_ansn2'];
     $Jobansn3 = $row_yc_y6['Job_ansn3'];
     $Jobansn4 = $row_yc_y6['Job_ansn4'];
     $jobremark = $row_yc_y6['job_remark'];
     $refbranchid = $row_yc_y6['ref_branch_id'];
     $jobbranch = $row_yc_y6['job_branch'];
     $jobday = $row_yc_y6['job_day'];

     //$jobnumber = $row_yc_y6['job_number'];
   }else {
     $jobid = $row_yc['job_id'];
     $jobfname = str_replace("'","/",$row_yc['job_fname']);
     $joblname = str_replace("'","/",$row_yc['job_lname']);
     $refdepid = $row_yc['ref_dep_id'];
     $jobtel = $row_yc['job_tel'];
     $reftypeid = $row_yc['ref_type_id'];
     $jobdetail = str_replace("'","/",$row_yc['job_detail']);
     $jobdate = $row_yc['job_date'];
     $jobupdate = $row_yc['job_update'];
     $jobtime = $row_yc['job_time'];
     $jobstatus = $row_yc['job_status'];
     $joblv = $row_yc['job_lv'];
     $joblv1 = $row_yc['job_lv1'];
     $jobans = str_replace("'","/",$row_yc['job_ans']);
     $jobansn = $row_yc['job_ansn'];
     $Jobansn2 = $row_yc['Job_ansn2'];
     $Jobansn3 = $row_yc['Job_ansn3'];
     $Jobansn4 = $row_yc['Job_ansn4'];
     $jobremark = $row_yc['job_remark'];
     $refbranchid = $row_yc['ref_branch_id'];
     $jobbranch = $row_yc['job_branch'];
     $jobday = $row_yc['job_day'];

     //$jobnumber = $row_yc['job_number'];
    }
    $jobyear = substr($jobdate,2,2);
    //echo $jobyear.' '.$year1.'</br>';

    if ($jobyear == $year1) {
      /*if ($jobnumber < 10000) {
        $i = $jobnumber;
      }else {*/
        $i += 1;
      //}
      if ($i <= 9) {
        $s = "000".$i;
      }elseif ($i <=99) {
        $s = "00".$i;
      }elseif ($i <=999) {
        $s = "0".$i;
      }else {
        $s = "".$i;
      }
      $code_in = $code.$s;
      echo $jobid.' ';
      $sql_in_yc = "INSERT INTO `job_yc` (`job_code`,`job_number`,`job_fname`,`job_lname`,`ref_dep_id`,`job_tel`,
        `ref_type_id`,`job_detail`,`job_date`,`job_update`,`job_time`,`job_status`,`job_lv`,`job_lv1`,`job_ans`,`job_ansn`,
        `job_ansn2`,`job_ansn3`,`job_ansn4`,`job_remark`,`ref_branch_id`,`job_branch`,`job_day`) VALUES ('{$code_in}',
        '{$s}','{$jobfname}','{$joblname}','{$refdepid}','{$jobtel}','{$reftypeid}','{$jobdetail}','{$jobdate}','{$jobupdate}',
        '{$jobtime}','{$jobstatus}','{$joblv}','{$joblv1}','{$jobans}','{$jobansn}','{$jobansn2}','{$jobansn3}','{$jobansn4}',
        '{$jobremark}','{$refbranchid}','{$jobbranch}','{$jobday}')";
      $result_in_yc = mysql_query($sql_in_yc)or die(mysql_error());
      echo $i.' - '.'Y'.'</br>';

    }else {
      //echo $aa.'Year < NOW';
    }
    $aa += 1;
  }

 ?>
