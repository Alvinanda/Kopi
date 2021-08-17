



        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


                <!-- Begin Page Content -->
                <div class="container-fluid">



                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Tambah Gaji</h1>

                      <form action="<?= base_url(). 'owner/tambahkanGaji';  ?>" method="post">
                        <div class="form-group row">
                          <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">Jabatan</label>
                          <div class="col-sm-10">
                            <select class="custom-select" name="jabatan">
                              <option selected >Pilih Jabatan</option>
                              <option  value="manajer">Manajer</option>
                              <option  value="staff">Staff</option>
                            </select>
                        </div>
                      </div>
                        <div class="form-group row">
                          <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">Gaji</label>
                          <div class="col-sm-10">
                          <input required type="number" class="form-control" name="gaji" id="formGroupExampleInput2" placeholder="" >
                        </div>
                      </div>

                          <button type="submit" class="btn btn-primary btn-icon-split"  > submit</button>

                      </form>

                </div>
                <!-- /.container-fluid -->
