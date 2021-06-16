



        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


                <!-- Begin Page Content -->
                <div class="container-fluid">



                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Edit Pegawai</h1>
                    <?php foreach($user as $u): ?>
                      <form action="<?php echo base_url(). 'owner/editPegawai'; ?>" method="post">
                        <div class="form-group row">
                            <label for="formGroupExampleInput" class="col-sm-2 col-form-label">ID</label>
                          <div class="col-sm-10">
                            <input disabled type="text" class="form-control" name="id_user" id="formGroupExampleInput" value="<?php echo $u->id_user ?>" placeholder="">
                            <input hidden type="text" class="form-control" name="id_user" id="formGroupExampleInput" value="<?php echo $u->id_user ?>" placeholder="">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">Nama</label>
                          <div class="col-sm-10">
                            <input required type="text" class="form-control" name="nama" id="formGroupExampleInput2" value="<?php echo $u->nama ?>" placeholder="">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">Password</label>
                          <div class="col-sm-10">
                          <input required type="text" class="form-control" name="password" id="formGroupExampleInput2" value="<?php echo $u->password ?>" placeholder="">
                        </div>
                      </div>
                        <div class="form-group row">
                          <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">Alamat</label>
                          <div class="col-sm-10">
                          <input required type="text" class="form-control" name="alamat" id="formGroupExampleInput2" value="<?php echo $u->alamat ?>" placeholder="">
                        </div>
                      </div>
                        <div class="form-group row">
                          <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">Kelamin</label>
                          <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="kelamin" id="Radio1"  value="pria"  <?php if ($u->kelamin == "pria") echo 'checked'; ?>>
                              <label class="form-check-label" for="Radio1">Laki - laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="kelamin" id="Radio2" value="perempuan" <?php if ($u->kelamin == "perempuan") echo 'checked'; ?>>
                              <label class="form-check-label" for="Radio2">Perempuan</label>
                            </div>
                      </div>
                    </div>
                        <div class="form-group row">
                          <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                          <div class="col-sm-10">
                            <input id="datepicker" width="276" value="<?php echo $u->tanggal_lahir ?>" name="tanggal_lahir"/>
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
                          <input required type="text" class="form-control" name="nomor_telepon" id="formGroupExampleInput2" value="<?php echo $u->nomor_telepon ?>" placeholder="">
                        </div>
                      </div>
                        <div class="form-group row">
                          <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">Status</label>
                          <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="status" id="inlineRadio1"  value="aktif" <?php if ($u->status == "aktif") echo 'checked'; ?>>
                              <label class="form-check-label" for="inlineRadio1">Aktif</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="status" id="inlineRadio2"  value="nonaktif" <?php if ($u->status == "nonaktif") echo 'checked'; ?>>
                              <label class="form-check-label" for="inlineRadio2">Tidak aktif</label>
                            </div>
                        </div>
                      </div>
                        <div class="form-group row">
                          <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">Jabatan</label>
                          <div class="col-sm-10">
                            <select class="custom-select" name="jabatan">
                              <option selected ><?php echo $u->jabatan ?></option>
                              <option  value="manajer">Manajer</option>
                              <option  value="staff">Staff</option>
                              <option  value="star member">Star Member</option>
                            </select>
                        </div>
                      </div>
                        <div class="form-group row">
                          <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">Outlet</label>
                          <div class="col-sm-10">
                          <input disabled type="text" class="form-control" name="outlet" id="formGroupExampleInput2" value="<?php echo $u->outlet ?>" placeholder="">
                          <input hidden type="text" class="form-control" name="outlet" id="formGroupExampleInput2" value="<?php echo $u->outlet ?>" placeholder="">
                        </div>
                      </div>


                          <button type="submit" class="btn btn-primary btn-icon-split"  > submit</button>

                      </form>
                      <?php endforeach ?>

                </div>
                <!-- /.container-fluid -->
