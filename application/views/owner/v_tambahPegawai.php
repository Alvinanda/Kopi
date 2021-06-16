



        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


                <!-- Begin Page Content -->
                <div class="container-fluid">



                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Tambah User</h1>

                      <form action="<?= base_url(). 'owner/tambahkanPegawai';  ?>" method="post">
                        <div class="form-group row">
                          <label for="formGroupExampleInput" class="col-sm-2 col-form-label">Nama</label>
                          <div class="col-sm-10">
                          <input required type="text" class="form-control" name="nama" id="formGroupExampleInput" placeholder="">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">Password</label>
                          <div class="col-sm-10">
                          <input required type="text" class="form-control" name="password" id="formGroupExampleInput2" placeholder="">
                        </div>
                      </div>
                        <div class="form-group row">
                          <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">Alamat</label>
                          <div class="col-sm-10">
                          <input required type="text" class="form-control" name="alamat" id="formGroupExampleInput2" placeholder="">
                        </div>
                      </div>
                        <div class="form-group row">
                          <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">Kelamin</label>
                          <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="kelamin" id="Radio1"  value="pria">
                              <label class="form-check-label" for="Radio1">Laki - laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="kelamin" id="Radio2" value="perempuan">
                              <label class="form-check-label" for="Radio2">Perempuan</label>
                            </div>
                        </div>
                      </div>
                        <div class="form-group row">
                          <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                          <div class="col-sm-10">
                            <input id="datepicker" width="276" name="tanggal_lahir"/>
                                <script>

                                    $('#datepicker').datepicker({
                                        format: 'yyyy/mm/dd',
                                        uiLibrary: 'bootstrap4'
                                    });
                                </script>
                          </div>
                      </div>
                        <div class="form-group row">
                          <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">Nomor Telepon</label>
                          <div class="col-sm-10">
                          <input required type="text" class="form-control" name="nomor_telepon" id="formGroupExampleInput2" placeholder="">
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
                          <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">Jabatan</label>
                          <div class="col-sm-10">
                            <select class="custom-select" name="jabatan">
                              <option selected >Pilih Jabatan</option>
                              <option  value="manajer">Manajer</option>
                              <option  value="staff">Staff</option>
                              <option  value="star member">Star Member</option>
                            </select>
                        </div>
                      </div>
                        <div class="form-group row">
                          <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">Outlet</label>
                          <div class="col-sm-10">
                              <input disabled type="text" class="form-control" name="outlet" value="<?= $session['outlet'] ?>" id="formGroupExampleInput2" placeholder="">
                              <input hidden type="text" class="form-control" name="outlet" value="<?= $session['outlet'] ?>" id="formGroupExampleInput2" placeholder="">
                        </div>
                      </div>


                          <button type="submit" class="btn btn-primary btn-icon-split"  > submit</button>

                      </form>

                </div>
                <!-- /.container-fluid -->
