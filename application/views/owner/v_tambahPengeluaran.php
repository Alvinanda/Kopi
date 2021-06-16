



        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


                <!-- Begin Page Content -->
                <div class="container-fluid">



                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Tambah Pengeluaran</h1>

                      <form action="<?= base_url(). 'owner/tambahkanPengeluaran';  ?>" method="post">
                        <div class="form-group row">
                          <label for="formGroupExampleInput" class="col-sm-2 col-form-label">Nama Pengeluaran</label>
                          <div class="col-sm-10">
                          <input required type="text" class="form-control" name="nama" id="formGroupExampleInput" placeholder="">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">Total</label>
                          <div class="col-sm-10">
                          <input required type="number" class="form-control" name="total" id="formGroupExampleInput2" placeholder="" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">Tanggal Transaksi</label>
                        <div class="col-sm-10">
                          <input id="datepicker" width="276" name="tanggal_transaksi"/>
                              <script>

                                  $('#datepicker').datepicker({
                                      format: 'yyyy/mm/dd',
                                      uiLibrary: 'bootstrap4'
                                  });
                              </script>
                        </div>
                    </div>
                        <div class="form-group row">
                          <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">Keterangan</label>
                          <div class="col-sm-10">
                          <input required type="text" class="form-control" name="keterangan" id="formGroupExampleInput2" placeholder="">
                        </div>
                      </div>

                          <button type="submit" class="btn btn-primary btn-icon-split"  > submit</button>

                      </form>

                </div>
                <!-- /.container-fluid -->
