<?php include "Connections/connect_mysql.php";
?>
<script type="text/javascript">
  $('.selectpicker').selectpicker({
      style: 'btn-default',
      size: 10
    });

  /*  var liftse01 = $("#liftse01").val();
    $("#show_preple").load("modul/personnel/data/show_personnel.php",{liftse01 : liftse01});

  $("#liftse01").change(function () {
    var liftse01 = $("#liftse01").val();
    $("#show_preple").load("modul/personnel/data/show_personnel.php",{liftse01 : liftse01});
  });*/
</script>
<div class="page-title">
  <div class="title_left">
   <h3>Report IT Support Yongconcrete</h3>
       </div>
  </div>

  <div class="col-md-12">
    <div class="col-md-1 text-right"><h4><label class="control-label col-md-1">Date</label></h4></div>
    <div class="col-md-2">
    <div class='input-group date' id='date1a'>
        <input type='date' class="form-control"  id="date1">
        <span class="input-group-addon">
           <span class="glyphicon glyphicon-calendar"></span>
        </span>
    </div>
    </div>
    <div class="col-md-1"><h4><label class="col-md-2"> </label></h4></div>
    <div class="col-md-1"><h4><label class="col-md-2">To</label></h4></div>
    <div class="col-md-2">
    <div class='input-group date' id='date2a'>
        <input type='date' class="form-control"  id="date2">
        <span class="input-group-addon">
           <span class="glyphicon glyphicon-calendar"></span>
        </span>
    </div>
    </div>
    <div class="col-md-1"><h4><label class="col-md-2"> </label></h4></div>
    <div class="col-md-2">
      <button class="form-control btn-success" type="button"  onclick="javascript:reportyc();">ตกลง</button>
    </div>
     </div>

     <div id="show_report"></div>

<script>
  $('#show_report').load("report_yc.php");
  $(function () {
    $('.selectpicker').selectpicker({
        style: 'btn-default',
        size: 10
    });
   });
</script>
