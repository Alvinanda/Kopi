



        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


                <!-- Begin Page Content -->
                <div class="container-fluid">



                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Tambah Bahan Baku</h1>
                    <?php foreach($bahan_baku as $u): ?>
                      <form action="<?= base_url(). 'manajer/editBahanBaku';  ?>" method="post">
                        <div class="form-group row">
                            <label for="formGroupExampleInput" class="col-sm-2 col-form-label">ID</label>
                          <div class="col-sm-10">
                            <input disabled type="text" class="form-control" name="id_bahan" id="formGroupExampleInput" value="<?php echo $u->id_bahan ?>" placeholder="">
                            <input hidden type="text" class="form-control" name="id_bahan" id="formGroupExampleInput" value="<?php echo $u->id_bahan ?>" placeholder="">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="formGroupExampleInput" class="col-sm-2 col-form-label">Nama Bahan Baku</label>
                          <div class="col-sm-10">
                          <input required type="text" class="form-control" name="nama" id="formGroupExampleInput" placeholder="" value="<?php echo $u->nama ?>" >
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">Jumlah (kg)</label>
                          <div class="col-sm-10">
                          <input required type="text" class="form-control" name="jumlah" id="formGroupExampleInput2" placeholder="" value="<?php echo $u->jumlah ?>">
                        </div>
                      </div>
                        <div class="form-group row">
                          <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">Keterangan</label>
                          <div class="col-sm-10">
                          <input required type="text" class="form-control" name="keterangan" id="formGroupExampleInput2" placeholder="" value="<?php echo $u->keterangan ?>">
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
