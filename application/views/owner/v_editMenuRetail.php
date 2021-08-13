



        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


                <!-- Begin Page Content -->
                <div class="container-fluid">



                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Edit Menu Retail</h1>
                    <?php foreach($menu_bar as $u): ?>
                      <form action="<?= base_url(). 'owner/editMenuRetail';  ?>" method="post">
                        <div class="form-group row">
                            <label for="formGroupExampleInput" class="col-sm-2 col-form-label">ID</label>
                          <div class="col-sm-10">
                            <input disabled type="text" class="form-control" name="id_retail" id="formGroupExampleInput" value="<?php echo $u->id_menu ?>" placeholder="">
                            <input hidden type="text" class="form-control" name="id_retail" id="formGroupExampleInput" value="<?php echo $u->id_menu ?>" placeholder="">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="formGroupExampleInput" class="col-sm-2 col-form-label">Nama Menu Bar</label>
                          <div class="col-sm-10">
                          <input required type="text" class="form-control" name="nama" id="formGroupExampleInput" placeholder="" value="<?php echo $u->nama ?>">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">Harga</label>
                          <div class="col-sm-10">
                          <input required type="number" class="form-control" name="harga" id="formGroupExampleInput2" placeholder="" value="<?php echo $u->harga ?>">
                        </div>
                      </div>
                        <div class="form-group row">
                          <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">Status</label>
                          <div class="col-sm-10">
                          <input required type="text" class="form-control" name="status" id="formGroupExampleInput2" placeholder="" value="<?php echo $u->status ?>">
                        </div>
                      </div>

                          <button type="submit" class="btn btn-primary btn-icon-split"  > submit</button>

                      </form>
                        <?php endforeach ?>

                </div>
                <!-- /.container-fluid -->
