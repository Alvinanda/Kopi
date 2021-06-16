



        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


                <!-- Begin Page Content -->
                <div class="container-fluid">



                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Tambah User</h1>
                    <?php foreach($outlet as $u): ?>
                      <form action="<?php echo base_url(). 'holding/editOutlet'; ?>" method="post">
                        <div class="form-group row">
                            <label for="formGroupExampleInput" class="col-sm-2 col-form-label">ID</label>
                          <div class="col-sm-10">
                            <input disabled type="text" class="form-control" name="id_outlet" id="formGroupExampleInput" value="<?php echo $u->id_outlet ?>" placeholder="">
                            <input hidden type="text" class="form-control" name="id_outlet" id="formGroupExampleInput" value="<?php echo $u->id_outlet ?>" placeholder="">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">Nama</label>
                          <div class="col-sm-10">
                            <input required type="text" class="form-control" name="nama" id="formGroupExampleInput2" value="<?php echo $u->nama ?>" placeholder="">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">Alamat</label>
                          <div class="col-sm-10">
                          <input required type="text" class="form-control" name="alamat" id="formGroupExampleInput2" value="<?php echo $u->alamat ?>" placeholder="">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">Tanggal Berdiri</label>
                        <div class="col-sm-10">
                          <input id="datepicker" width="276" name="tanggal_berdiri" value="<?php echo $u->tanggal_berdiri ?>"/>
                              <script>
                                  $('#datepicker').datepicker({
                                      uiLibrary: 'bootstrap4'
                                  });
                              </script>
                        </div>
                      </div>
                        <div class="form-group row">
                          <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">Status</label>
                          <div class="col-sm-10">
                          <input required type="text" class="form-control" name="status" id="formGroupExampleInput2" value="<?php echo $u->status ?>" placeholder="">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">Jam Buka</label>
                        <div class="col-sm-10">
                          <input required type="time" class="form-control" name="jam_buka" id="formGroupExampleInput2" value="<?php echo $u->jam_buka ?> placeholder="">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">Jam Tutup</label>
                        <div class="col-sm-10">
                          <input required type="time" class="form-control" name="jam_tutup" id="formGroupExampleInput2" value="<?php echo $u->jam_tutup ?>  placeholder="">
                        </div>
                      </div>


                          <button type="submit" class="btn btn-primary btn-icon-split"  > submit</button>

                      </form>
                      <?php endforeach ?>

                </div>
                <!-- /.container-fluid -->
