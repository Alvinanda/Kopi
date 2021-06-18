



        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


                <!-- Begin Page Content -->
                <div class="container-fluid">



                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Edit Shift</h1>
                    <?php foreach($bahan_baku as $u): ?>
                      <form action="<?= base_url(). 'manajer/editShift';  ?>" method="post">
                        <div class="form-group row">
                            <label for="formGroupExampleInput" class="col-sm-2 col-form-label">ID</label>
                          <div class="col-sm-10">
                            <input disabled type="text" class="form-control" name="id_shift" id="formGroupExampleInput" value="<?php echo $u->id_shift ?>" placeholder="">
                            <input hidden type="text" class="form-control" name="id_shift" id="formGroupExampleInput" value="<?php echo $u->id_shift ?>" placeholder="">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="formGroupExampleInput" class="col-sm-2 col-form-label">Kode Shift</label>
                          <div class="col-sm-10">
                            <input required type="text" class="form-control" name="kode_shift" id="formGroupExampleInput2" value="<?php echo $u->kode_shift ?>" placeholder="">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">Jam Masuk</label>
                          <div class="col-sm-10">
                          <input required type="time" class="form-control" name="jam_masuk" id="formGroupExampleInput2" value="<?php echo $u->jam_masuk ?>" placeholder="">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">Jam Selesai</label>
                        <div class="col-sm-10">
                        <input required type="time" class="form-control" name="jam_selesai" id="formGroupExampleInput2" value="<?php echo $u->jam_selesai ?>" placeholder="">
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
                      <?php endforeach ?>
                </div>
                <!-- /.container-fluid -->
