



        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


                <!-- Begin Page Content -->
                <div class="container-fluid">



                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Edit Gaji</h1>
                    <?php foreach($gaji as $u): ?>
                      <form action="<?= base_url(). 'owner/editGaji';  ?>" method="post">
                        <div class="form-group row">
                            <label for="formGroupExampleInput" class="col-sm-2 col-form-label">ID</label>
                          <div class="col-sm-10">
                            <input disabled type="text" class="form-control" name="id_gaji" id="formGroupExampleInput" value="<?php echo $u->id_gaji ?>" placeholder="">
                            <input hidden type="text" class="form-control" name="id_gaji" id="formGroupExampleInput" value="<?php echo $u->id_gaji ?>" placeholder="">
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
                          <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">Gaji</label>
                          <div class="col-sm-10">
                          <input required type="number" class="form-control" name="gaji" id="formGroupExampleInput2" placeholder="" value="<?php echo $u->gaji ?>">
                        </div>
                      </div>

                          <button type="submit" class="btn btn-primary btn-icon-split"  > submit</button>

                      </form>
                        <?php endforeach ?>

                </div>
                <!-- /.container-fluid -->
