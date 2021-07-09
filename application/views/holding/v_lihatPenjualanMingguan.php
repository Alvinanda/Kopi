<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Data Penjualan <?php echo $outlet[0]->nama ?> Minggu Ini </h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tables Penjualan</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Hari</th>
                                    <th>Tanggal</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                  <th>No</th>
                                  <th>Hari</th>
                                  <th>Tanggal</th>
                                  <th>Total</th>
                                </tr>
                            </tfoot>
                            <tbody>
                              <?php
                                  $no = 1;
                                  foreach ($total as $u){
                                  ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php foreach ($hari as $h){ if($h->id == $u->hari) :echo $h->hari; endif; }  ?></td>
                                    <td><?php $d=strtotime($u->tanggal); echo date('d-m-Y', $d) ?></td>
                                    <td><?php echo 'Rp '.number_format($u->total,2,",",".");  ?></td>
                                </tr>
                              <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->



</div>
<!-- End of Content Wrapper -->
<script type="text/javascript">


var table = $('#pegawai').DataTable({
lengthMenu: [
  [10, 25, 50, 100, 200, -1],
  [10, 25, 50, 100, 200, "All"]
],
responsive: true,
paging: true,
stateSave: true,
processing: true,
scrollX:        true,
scrollCollapse: true,
dom: 'fBrtip<"clear">l',
"columnDefs": [{
className: "dt-right",
"targets": [0] // First column
}],
buttons: [
  {
      extend: 'copyHtml5',
      text: '<i class="fa fa-files-o"></i>',
      titleAttr: 'Copy',
      exportOptions: {
          columns: ':visible'
      }
  },
  {
      extend: 'pdfHtml5',
      text: '<i class="fa fa-file-pdf-o"></i>',
      titleAttr: 'PDF',
      extension: ".pdf",
      filename: "User",
      title: "",
      orientation: 'landscape',
      customize: function (doc) {

          doc.styles.tableHeader = {
              color: 'black',
              background: 'grey',
              alignment: 'center'
          }

          doc.styles = {
              subheader: {
                  fontSize: 10,
                  bold: true,
                  color: 'black'
              },
              tableHeader: {
                  bold: true,
                  fontSize: 10.5,
                  color: 'black'
              },
              lastLine: {
                  bold: true,
                  fontSize: 11,
                  color: 'blue'
              },
              defaultStyle: {
                  fontSize: 10,
                  color: 'black'
              }
          }

          var objLayout = {};
          objLayout['hLineWidth'] = function(i) { return .8; };
          objLayout['vLineWidth'] = function(i) { return .5; };
          objLayout['hLineColor'] = function(i) { return '#aaa'; };
          objLayout['vLineColor'] = function(i) { return '#aaa'; };
          objLayout['paddingLeft'] = function(i) { return 8; };
          objLayout['paddingRight'] = function(i) { return 8; };
          doc.content[0].layout = objLayout;

          // margin: [left, top, right, bottom]

          doc.content.splice(0, 0, {
              text: [
                  {text: 'Texto 0', italics: true, fontSize: 12}
              ],
              margin: [0, 0, 0, 12],
              alignment: 'center'
          });

          doc.content.splice(0, 0, {

              table: {
                  widths: [300, '*', '*'],
                  body: [
                      [
                          {text: 'Texto 1', bold: true, fontSize: 10}
                          , {text: 'Texto 2', bold: true, fontSize: 10}
                          , {text: 'Texto 3', bold: true, fontSize: 10}]
                  ]
              },

              margin: [0, 0, 0, 12],
              alignment: 'center'
          });


          doc.content.splice(0, 0, {

              table: {
                  widths: [300, '*'],
                  body: [
                      [
                          {
                              text: [
                                  {text: 'Texto 4', fontSize: 10},
                                  {
                                      text: 'Texto 5',
                                      bold: true,
                                      fontSize: 10
                                  }

                              ]
                          }
                          , {
                          text: [
                              {
                                  text: 'Texto 6',
                                  bold: true, fontSize: 18
                              },
                              {
                                  text: 'Texto 7',
                                  fontSize: 10
                              }

                          ]
                      }]
                  ]
              },

              margin: [0, 0, 0, 22],
              alignment: 'center'
          });


      },
      exportOptions: {
          columns: ':visible'
      }
  },
  {
      extend: 'excelHtml5',
      text: '<i class="fa fa-file-excel-o"></i>',
      titleAttr: 'Excel',
      fieldSeparator: ';',
      filename: "User",
      fieldBoundary: '"',
      exportOptions: {
          columns: ':visible'
      }
  },
  {
      extend: 'csvHtml5',
      text: '<i class="fa fa-file-code-o"></i>',
      titleAttr: 'CSV',
      fieldSeparator: ';',
      fieldBoundary: '"',
      exportOptions: {
          columns: ':visible'
      }
  },

  {
      extend: 'print',
      text: '<i class="fa fa-print"></i>',
      titleAttr: 'Print',
      exportOptions: {
          columns: ':visible',
      }
  },

  {
      extend: 'colvis',
      postfixButtons: ['colvisRestore'],
      collectionLayout: 'fixed four-column'
  }

]

});


$('.dt-button').addClass('btn btn-sm btn-outline-primary mr-1 rounded  text-center p-1');
$('.dataTables_paginate').addClass('btn rounded text-white text-center p-1');
$(".dt-button").prependTo("#export");
$('#search_inp').keyup(function(){
table.search($(this).val()).draw() ;
})
$('#data_length').on('change', function(){
table.page.len( $(this).val() ).draw();

});

function deletechecked()
{
if(confirm("Serius ingin menghapus data ini ?"))
{
  return true;
}
else
{
  return false;
}
}
</script>
