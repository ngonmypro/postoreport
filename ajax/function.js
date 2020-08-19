
function searchreportyc() {
$('#showdata').load("searchreport_yc.php");
}

function reportyc() {
	var date1 = $('#date1').val();
	var date2 = $('#date2').val();
	alert(date1+' , '+date2)
	$('#show_report').load("report_yc.php",{date1:date1,date2:date2});
}
