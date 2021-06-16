



        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


                <!-- Begin Page Content -->
                <div class="container-fluid">



                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Tambah User</h1>
                    <?php foreach($user as $u): ?>
                      <form action="<?php echo base_url(). 'holding/editUser'; ?>" method="post">
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
                          <input required type="text" class="form-control" name="kelamin" id="formGroupExampleInput2" value="<?php echo $u->kelamin ?>" placeholder="">
                        </div>
                      </div>
                        <div class="form-group row">
                          <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                          <div class="col-sm-10">
                          <input required type="text" class="form-control" name="tanggal_lahir" id="formGroupExampleInput2" value="<?php echo $u->tanggal_lahir ?>" placeholder="">
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
                          <input required type="text" class="form-control" name="status" id="formGroupExampleInput2" value="<?php echo $u->status ?>" placeholder="">
                        </div>
                      </div>
                        <div class="form-group row">
                          <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">Jabatan</label>
                          <div class="col-sm-10">
                          <input required type="text" class="form-control" name="jabatan" id="formGroupExampleInput2" value="<?php echo $u->jabatan ?>" placeholder="">
                        </div>
                      </div>
                        <div class="form-group row">
                          <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">Outlet</label>
                          <div class="col-sm-10">
                          <input required type="text" class="form-control" name="outlet" id="formGroupExampleInput2" value="<?php echo $u->outlet ?>" placeholder="">
                        </div>
                      </div>


                          <button type="submit" class="btn btn-primary btn-icon-split"  > submit</button>

                      </form>
                      <?php endforeach ?>

                </div>
                <!-- /.container-fluid -->
