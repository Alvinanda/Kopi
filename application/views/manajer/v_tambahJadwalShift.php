



        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


                <!-- Begin Page Content -->
                <div class="container-fluid">



                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Tambah Jadwa Shift</h1>

                      <form action="<?= base_url(). 'manajer/tambahkanjadwalShift';  ?>" method="post">
                        <div class="form-group row">
                          <label for="formGroupExampleInput" class="col-sm-2 col-form-label">Nama Pegawai</label>
                          <div class="col-sm-10">
                            <select class="form-control" id="category_name" name="id_user">
                               <option selected="0">select..</option>
                               <?php foreach($pegawai as $u) : ?>
                                <option value="<?php echo $u->id_user;?>"> <?php echo $u->nama; ?></option>
                               <?php endforeach; ?>
                              </select>
                        </div>
                        </div>
                        <div class="form-group row">
                          <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">Jam Masuk</label>
                          <div class="col-sm-10">
                          <input required type="time" class="form-control" name="jam_masuk" id="formGroupExampleInput2" placeholder="">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">Jam Selesai</label>
                        <div class="col-sm-10">
                        <input required type="time" class="form-control" name="jam_selesai" id="formGroupExampleInput2" placeholder="">
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
