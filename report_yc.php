<?php include "Connections/connect_mysql.php";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
</head>
<style media="screen">
  #product{font-size:13px;}
</style>
<script>
$('.selectpicker').selectpicker({
    style: 'btn-default',
    size: 10
});

  $(document).ready( function () {
    var table = $('#product').DataTable({
        paging: true,
        sort: false,
        select: true,
          dom: 'Bfrtip',
          lengthMenu: [
          [ 10, 25, 50, -1 ],
          [ '10 rows', '25 rows', '50 rows', 'Show all' ]
      ],
          buttons: [
            'pageLength',
            {extend: 'colvis',
            collectionLayout: 'fixed two-column'},
            {
                	extend: 'print',
					text: '<i class="ti-printer"></i> Print'/*,
					exportOptions: {
						columns: [ 0, 1, 2, 3, 4, 5, 6, 10 ]
					}*/
                },
                {
                    	extend: 'pdf',
    					text: '<i class="ti-pdf"></i> PDF'/*,
    					exportOptions: {
    						columns: [ 0, 1, 2, 3, 4, 5, 6, 10 ]
    					}*/
                    },
                    {
                        	extend: 'excel',
        					text: '<i class="ti-excel"></i> EXCEL'/*,
        					exportOptions: {
        						columns: [ 0, 1, 2, 3, 4, 5, 6, 10 ]
        					}*/
                        },
          ],
      });

     $('#product tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
          $(this).removeClass('selected');
        }
        else {
          table.$('tr.selected').removeClass('selected');
          $(this).addClass('selected');
        }
      } );

    $('#product tfoot th').each( function () {
      var title = $(this).text();
      if((title !='จัดการ') && (title != 'สถานะ') && (title != 'ความคิดเห็น') && (title != 'สถานะการใช้')){
        $(this).html( '<input type="text" placeholder=" '+title+'"   />' );
      }else{
        $(this).html(' ');
      }
    });

    // Apply the search ค้นหาจาก footer ------------------------
    $('#product').DataTable().columns().every( function () {
      var that = this;
      //ค้นหาจาก footer
      $( 'input', this.footer() ).on( 'keyup change', function () {
        if ( that.search() !== this.value ) {
          that
            .search( this.value )
            .draw();
        }
      });
    });

  });
  </script>
<body>
  <!--<div><button type="button" class="btn btn-info" onClick="javascript:add_tran();"><i class="fa fa-plus-circle"></i> เพิ่มรายการตรวจสอบ</button></div>-->
  <!-- ตารางสินค้า -->
  <table class="table table-striped table-bordered" id="product">
    <thead>
        <tr>
            <th>สินค้า</th>
            <th>ประเภท</th>
            <th>สาขา</th>
            <th>PO</th>
            <th>สินค้า</th>
            <th>ราคารวม</th>
            <th>วันที่</th>
        </tr>
    </thead>
    <?php   $sql_prodS = 'SELECT * FROM list_tb,product_tb,po_tb,branch_tb WHERE Po_BrahID = BrahID and List_PoID = PoID and List_ProdID = ProdID';
            if($_POST['yearsum'] != 0){
                $sql_prodS.= ' and Date(PoDate) BETWEEN  "'.$_POST['yearsum'].'-1-1" and "'.$_POST['yearsum'].'-12-31" ';
            }
            if($_POST['catesum'] != 0){
                $sql_prodS.= ' and Prod_GuoPro = "'.$_POST['catesum'].'" ';
            }
            if($_POST['brahsum'] != 0){
                $sql_prodS.= ' and Po_BrahID = "'.$_POST['brahsum'].'" ';
            }
            $objprodS = mysql_query($sql_prodS); ?>
    <tbody>
        <?php while ($row = mysql_fetch_array($objprodS)) {
               $supid = $row['SupID'];
               $supname = $row['ProdName'].'<br>'.$row['ListDetail'];
        ?>
        <tr>
            <td><?php if($row['Prod_Group'] == 1){ echo "Computer & PC"; }elseif($row['Prod_Group'] == 2){ echo "Network"; }elseif($row['Prod_Group'] == 3){ echo "CCTV"; }
            elseif($row['Prod_Group'] == 4){ echo "Printer & Other"; }elseif($row['Prod_Group'] == 5){ echo "Lincense"; }elseif($row['Prod_Group'] == 6){ echo "เบ็ดเตล็ด"; } ?></td>
            <td><?php if($row['Prod_GuoPro'] == 606){ echo "สินทรัพท์"; }elseif($row['Prod_GuoPro'] == 607){ echo "สินเปลือง"; } ?></td>
            <td><?php echo $row['BrahName'],'/',$row['BrahCode'];?></td>
            <td><?php echo $row['PoBook'],$row['PoNumber']?></td>
            <td><?php echo $supname; ?></td>
            <td><?php echo $row['ListPriceTotal']; ?></td>
            <td><?php echo $row['PoDate']; ?></td>
        </tr>
        <?php }mysql_close($c);?>
    </tbody>
</table>

</body>
</html>
<?php //} ?>
