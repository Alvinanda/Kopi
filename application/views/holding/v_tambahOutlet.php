<link rel="stylesheet"
	href="<?= base_url('assets/vendor/datetimepicker/pc-bootstrap4-datetimepicker/build/css/bootstrap-datetimepicker.min.css')?>" />
<link rel="stylesheet"
	href="<?= base_url('assets/vendor/datetimepicker/bootstrap/dist/fonts/glyphicons-halflings-regular.woff')?>">



        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


                <!-- Begin Page Content -->
                <div class="container-fluid">



                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Tambah Outlet</h1>

                      <form action="<?= base_url(). 'holding/tambahkanOutlet';  ?>" method="post">
                        <div class="form-group row">
                          <label for="formGroupExampleInput" class="col-sm-2 col-form-label">ID Outlet</label>
                          <div class="col-sm-10">
                          <input required type="text" class="form-control" name="id_outlet" id="formGroupExampleInput" placeholder="">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">Nama Outlet</label>
                          <div class="col-sm-10">
                            <input required type="text" class="form-control" name="nama" id="formGroupExampleInput2" placeholder="">
                          </div>
                      </div>
                        <div class="form-group row">
                          <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">Alamat</label>
                          <div class="col-sm-10">
                            <input required type="text" class="form-control" name="alamat" id="formGroupExampleInput2" placeholder="">
                          </div>
                      </div>
                        <div class="form-group row">
                          <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">Tanggal Berdiri</label>
                          <div class="col-sm-10">
                            <input id="datepicker" width="276" name="tanggal_berdiri"/>
                                <script>
                                    $('#datepicker').datepicker({
                                      format: 'yyyy/mm/dd',
                                        uiLibrary: 'bootstrap4'
                                    });
                                </script>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">Status</label>
                          <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="status" id="inlineRadio1" checked value="aktif">
                              <label class="form-check-label" for="inlineRadio1">Aktif</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="nonaktif">
                              <label class="form-check-label" for="inlineRadio2">Tidak aktif</label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">Jam Buka</label>
                          <div class="col-sm-10">
                						<input required type='text' class="form-control" id="jam_buka" name="jam_buka"
                							placeholder="<?= date('H:i:s')?>">
                					</div>
                        </div>
                        <div class="form-group row">
                          <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">Jam Tutup</label>
                          <div class="col-sm-10">
                						<input required type="tex" class="form-control" id="jam_tutup" name="jam_tutup"
                							placeholder="<?= date('H:i:s')?>">
                					</div>
                        </div>



                          <button type="submit" class="btn btn-primary btn-icon-split"  > submit</button>

                      </form>

                </div>
                <!-- /.container-fluid -->
                <script type="text/javascript" src="<?= base_url('assets/vendor/datetimepicker/moment/moment.js')?>"></script>
                <script type="text/javascript"
                  src="<?= base_url('assets/vendor/datetimepicker/bootstrap/js/dist/transition.js')?>">
                </script>
                <script type="text/javascript"
                  src="<?= base_url('assets/vendor/datetimepicker/bootstrap/js/dist/collapse.js')?>">
                </script>
                <script type="text/javascript"
                  src="<?= base_url('assets/vendor/datetimepicker/pc-bootstrap4-datetimepicker/build/js/bootstrap-datetimepicker.min.js')?>">
                </script>
                <script script type="text/javascript">
                  $(function () {
                    $('#jam_buka').datetimepicker({
                      format: 'HH:mm:ss',
                      locale: 'id'
                    });
                    $('#jam_tutup').datetimepicker({
                      format: 'HH:mm:ss',
                      locale: 'id'
                    });
                  });

                </script>
