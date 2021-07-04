 <!-- / .main-navbar -->
 <div class="main-content-container container-fluid px-4">

    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
    <div class="col-12 col-sm-6 text-center text-sm-left mb-4 mb-sm-0">
        <span class="text-uppercase page-subtitle">Kasir</span>
        <h3 class="page-title">Inputkan menu pilihan</h3>
    </div>

</div>

<div class="row">
    <div class="col-lg-12 col-md-12">
        <!-- Add New Post Form -->
        <div class="mb-3">
        <div class="">
            <p class="mb-4">Data Penjualan </p>
            <div class="main-content-container ">
                <div class="table-striped" style="overflow-x:auto; ">
                <table class="table mb-0 " id="pegawai">
                <thead role="row" class="py-2 bg-light text-semibold border-bottom">
                <tr>
                    <th scope="col" class="border-0">Kode Penjulan</th>
                    <th scope="col" class="border-0">Nama Pembeli</th>
                    <th scope="col" class="border-0">Tanggal</th>
                    <th scope="col" class="border-0">Status</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $no = 1;
                    foreach ($penjualan as $u){
                    ?>
                <tr>
                        <td><?php echo $u->id_penjualan;?></td>
                        <td><?php echo $u->nama_pembeli ?></td>
                        <td><?php echo date("d-m-Y", strtotime($u->tanggal));?></td>
                        <td><?php echo $u->status;?></td>
                    </tr>

                    <?php } ?>

                </tbody>
            </table>
                </div>
                </div>

        </div>
        </div>
        </div>
        <!-- / Add New Post Form -->

    </div>
    <div class="row">

    <div class="col-lg-8 col-md-12">
        <!-- Add New Post Form -->
            <div class="main-content-container ">
            <div class='card card-small mb-3'>
        <div class="card-header border-bottom">
            <h6 class="m-0">Menu Yang Dipilih</h6>
        </div>
            <div class='card-body p-0'>
                <div class="p-3">
                <div class="table-striped" style="overflow-x:auto; ">
                    <table class="table mb-0 " id="pegawai">
                    <thead role="row" class="py-2 bg-light text-semibold border-bottom">
                    <tr>
                        <th scope="col" class="border-0">No</th>
                        <th scope="col" class="border-0">Nama Menu</th>
                        <th scope="col" class="border-0">Jumlah</th>
                        <th scope="col" class="border-0">Delete</th>
                    </tr>
                    </thead>
                    <?php foreach ($detail_penjualan2 as $x){?>
                    <tfoot role="row" class="py-2 bg-light text-semibold border-bottom">
                    <tr>
                        <th scope="col" class="border-0"></th>
                        <th scope="col" class="border-0">Total</th>
                        <th scope="col" class="border-0"><?php
                         echo 'Rp '. number_format($x->total,2,",","."); ?></th>
                        <th scope="col" class="border-0"></th>
                    </tr>
                  </tfoot>
                <?php } ?>
                    <tbody>
                    <?php
                        $no = 1;
                        foreach($penjualan as $r){
                        foreach ($detail_penjualan as $u){
                        ?>
                    <tr>
                    <td><?php echo $no++ ?></td>
                            <td><?php  foreach ($menuBar as $a){if ($a->id_menu == $u->id_menu) :echo $a->nama;endif;} ?></td>
                            <td><?php  echo $u->jumlah ?></td>
                            <td class="sorting_1" style="">
                                <a href="<?php echo site_url('staff/hapus_detail_penjualan/'.$u->id_penjualan."/".$u->id); ?>"  type="button" class="btn btn-danger btn-circle btn-sm" onclick="return deletechecked();" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </a>


                            </td>
                        </tr>

                        <?php }} ?>

                    </tbody>
                </table>
                    </div>
                </div>
            </div>
        </div>


                </div>
        </div>
        <!-- / Add New Post Form -->



    <div class="col-lg-4 col-md-12">
        <!-- Post Overview -->
        <div class='card card-small mb-3'>
        <div class="card-header border-bottom">
            <h6 class="m-0">Tambah Menu</h6>
        </div>
        <div class='card-body p-0'>
            <div class="p-3">
            <?php foreach($penjualan as $u):?>
            <form action="<?php echo base_url(). 'staff/tambahkanDetailPenjualan/'; ?>" method="post">
              <input hidden name="id_penjualan" type="text" class="form-control" value="<?php echo $u->id_penjualan;?>" >
              <label for="feInputAddress">Menu</label>
                  <select required  name="id_menu" id="feInputState" class="form-control">
                  <option value="" selected>Pilih </option>
                  <?php
                      foreach ($menuBar as $a){?>
                              <option value="<?php echo $a->id_menu;?>"><?php echo $a->nama;?></option>
                          <?php }  ?>
              </select><br>
              <label for="feInputAddress">Jumlah</label>
              <input name="jumlah" type="number" min="1" class="form-control" id="feLastName" >


            <button type="submit" class="mb-2 btn btn-outline-primary mr-2">Tambah Menu</button>
            <?php if(count($detail_penjualan)==0){ ?>
            <a  data-toggle="modal" data-target="#modalLogin" class="mb-2 btn btn-sm btn-primary mr-1"><info class="text-warning">Selesai</info></a>

            <?php }else if($no != 1){?>
            <a  href="<?php echo site_url('staff/lihatPenjualan');?>" class="mb-2 btn btn-sm btn-primary mr-1"><info class="text-warning">Selesai</info></a>
            <?php }?>

            </form>
            <?php endforeach; ?>
            </div>
        </div>
        </div>

    </div>

    


</div>


<div class="modal fade " id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog " role="document">
    <div class="modal-content" >
      <div class="modal-body text-center" >
        <span class="text-danger">Silahkan inputkan menu yang telah dipilih </span>
      </div>
    </div>
  </div>
</div>
