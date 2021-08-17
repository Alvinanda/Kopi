



        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


                <!-- Begin Page Content -->
                <div class="container-fluid">



                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Edit Pengeluaran Tetap</h1>
                    <?php foreach($pengeluaran as $u): ?>
                      <form action="<?= base_url(). 'owner/editPengeluaranTetap';  ?>" method="post">
                        <div class="form-group row">
                            <label for="formGroupExampleInput" class="col-sm-2 col-form-label">ID</label>
                          <div class="col-sm-10">
                            <input disabled type="text" class="form-control" name="id_pengeluaran" id="formGroupExampleInput" value="<?php echo $u->id_pengeluaran ?>" placeholder="">
                            <input hidden type="text" class="form-control" name="id_pengeluaran" id="formGroupExampleInput" value="<?php echo $u->id_pengeluaran ?>" placeholder="">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="formGroupExampleInput" class="col-sm-2 col-form-label">Nama Pengeluaran</label>
                          <div class="col-sm-10">
                          <input required type="text" class="form-control" name="nama" id="formGroupExampleInput" placeholder="" value="<?php echo $u->nama ?>">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">Total</label>
                          <div class="col-sm-10">
                          <input required type="number" class="form-control" name="total" id="formGroupExampleInput2" placeholder="" value="<?php echo $u->total ?>">
                        </div>
                      </div>
                        <div class="form-group row">
                          <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">Keterangan</label>
                          <div class="col-sm-10">
                          <input required type="text" class="form-control" name="keterangan" id="formGroupExampleInput2" placeholder="" value="<?php echo $u->keterangan ?>">
                        </div>
                      </div>

                          <button type="submit" class="btn btn-primary btn-icon-split"  > submit</button>

                      </form>
                        <?php endforeach ?>

                </div>
                <!-- /.container-fluid -->
