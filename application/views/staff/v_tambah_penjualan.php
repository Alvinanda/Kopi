 <!-- / .main-navbar -->
 <div class="main-content-container container-fluid px-4">

    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
    <div class="col-12 col-sm-6 text-center text-sm-left mb-4 mb-sm-0">
        <span class="text-uppercase page-subtitle">Kasir</span>
        <h3 class="page-title">Inputkan Data Penjualan</h3>
    </div>
    <div class="col-12 col-sm-6 text-center text-sm-left mb-4 mb-sm-0">
    </div>
</div>

<div class="row">
    <div class="col-lg-9 col-md-12">
        <!-- Add New Post Form -->
        <div class="mb-3">
        <div class="">
            <p class="mb-4">Isi form berikut dengan <info>BENAR</info></p>
            <div class="alert alert-primary" role="alert">
                <strong >Perhatian! Halaman ini hanya untuk mengisi data pembelian. Menu dapat ditambahkan di halaman berikutnya, yakni setelah menekan tombol  </strong>  <strong class="text-warning">next</strong>
            </div>

            <form action="<?php echo base_url(). 'staff/tambahkanPenjualan'; ?>" method="post">
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="feFirstName">Nama Pegawai Kasir</label>
                    <input disabled type="text" class="form-control" id="feFirstName" placeholder="First Name" value="<?= $session['username'] ?>">
                    <input hidden name="id_peminjam" type="text" class="form-control" id="feFirstName" placeholder="First Name" value="<?= $this->session->userdata('id_user'); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="feInputAddress">Nama Pembeli</label>
                    <input name="nama_pembeli" type="text" class="form-control" list="cars" id="feLastName" >
                    <?php foreach ($member as $u ): ?>
                      <datalist id="cars">
                          <option> <?= $u->nama ?> </option>
                        </datalist>
                    <?php endforeach; ?>
                </div>
                <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputZip">Star Member</label>
                    <select name="star_member" id="feInputState" class="form-control">
                        <option selected>Pilih</option>
                        <option value="Ya">Ya </option>
                        <option value="Tidak">tidak </option>
                    </select>
                </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                    <label for="feDescription">Status</label>
                    <select name="status" id="feInputState" class="form-control">
                        <option selected>Pilih</option>
                        <option value="Sudah Dibayar">Sudah Dibayar </option>
                        <option value="Belum Dibayar">Belum Dibayar </option>
                        <option value="Belum Lunas">Belum Lunas </option>
                    </select>
                   </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
        </div>
        </div>
		</div>
        <!-- / Add New Post Form -->
    <div class="col-lg-3 col-md-12">
        <!-- Post Overview -->
        <div class='card card-small mb-3'>
        <div class="card-header border-bottom">
            <h6 class="m-0">Keterangan</h6>
        </div>
        <div class='card-body p-0'>
            <ul class="list-group list-group-flush">
            <li class="list-group-item p-3">
                <span class="d-flex mb-2">
                <strong class="mr-1">Nama </strong> tidak bisa di ubah
                </span>
            </li>
            <li class="list-group-item p-3">

            <strong class="mr-1">Langkah Pengisian</strong> <br>

                <span>1. Isi form untuk membuat pembelian baru</span> <br>
                <span>2. Klik Submit</span> <br>
                <span>3. Akan muncul halaman baru</span> <br>
                <span>4. Tambahkan menu kemudian</span> <br>
            </li>
            </ul>
        </div>
        </div>

    </div>
    </div>


</div>
<script>
$(document).ready(function(){
		$('#kategori').change(function(){
			var id=$(this).val();
       if(id == 'umum'){
          $.ajax({
            url : "<?php echo base_url();?>/mahasiswa/get_option_penyelenggara",
            method : "POST",
            data : {id: id},
            async : false,
                dataType : 'json',
            success: function(data){
              var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option value='+""+data[i].id_penyelenggara+""+'>'+data[i].penyelenggara+'</option>';
                    }
                    $('.id_fiter_by').html(html);
            }
          });
          }


        else if(id == 'akademik'){
              var html = '';
              var i;
                  html += '<option value="1">Akademik</option>';
              $('.id_fiter_by').html(html);

        }
      ///////////////////////
		});
	});
</script>
