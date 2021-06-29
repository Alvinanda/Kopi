<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

	<!-- Main Content -->
	<div id="content">


		<!-- Begin Page Content -->
		<div class="container-fluid">



			<!-- Page Heading -->
			<h1 class="h3 mb-4 text-gray-800">Edit Jadwal Shift</h1>
			<?php foreach($jadwal as $u): ?>
			<form action="<?= base_url(). 'manajer/editjadwalShift';  ?>" method="post">
				<div class="form-group row">
					<label for="formGroupExampleInput" class="col-sm-2 col-form-label">ID</label>
					<div class="col-sm-10">
						<input disabled type="text" class="form-control" name="id_jadwal" id="formGroupExampleInput"
							value="<?php echo $u->id_jadwal ?>" placeholder="">
						<input hidden type="text" class="form-control" name="id_jadwal" id="formGroupExampleInput"
							value="<?php echo $u->id_jadwal ?>" placeholder="">
					</div>
				</div>
				<div class="form-group row">
					<label for="formGroupExampleInput" class="col-sm-2 col-form-label">Nama Pegawai</label>
					<div class="col-sm-10">

						<select class="form-control" id="category_name" name="id_user" value="">
							<?php foreach($pegawai as $x) : ?>
							<?php if($u->id_user == $x->id_user){ ?>
							<option value="<?= $x->id_user;?>" selected><?php echo $x->nama; ?></option>
							<?php }else{  ?>
							<option value="<?php echo $x->id_user;?>"> <?php echo $x->nama; ?></option>
							<?php } ?>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label for="formGroupExampleInput2" class="col-sm-2 col-form-label">Shift</label>
					<div class="col-sm-10">
						<select class="form-control" id="exampleInputEmail1" name="kode_shift" value="<?php echo $u->kode_shift ?>">

							<?php foreach($shift as $y) : ?>
							<?php if($u->kode_shift == $y->kode_shift){ ?>
							<option value="<?= $y->kode_shift;?>" selected><?php echo $y->jam_masuk .'-'. $y->jam_selesai; ?></option>
							<?php }else{  ?>
							<option value="<?php echo $y->kode_shift;?>"> <?php echo $y->jam_masuk .'-'. $y->jam_selesai; ?></option>
							<?php } ?>
							<?php endforeach; ?>
						</select>
						<small id="emailHelp" class="form-text text-muted">Pilih shift yang ingin dijadwalkan</small>
					</div>
				</div>
				<div class="form-group row">
					<label for="formGroupExampleInput" class="col-sm-2 col-form-label">Hari</label>
					<div class="col-sm-10">
						<select class="form-control" id="exampleInputEmail1" name="hari" value="<?php echo $u->id ?>">

							<?php foreach($hari as $h) : ?>
							<?php if($u->hari == $h->id){ ?>
							<option value="<?= $h->id;?>" selected><?php echo $h->hari; ?></option>
							<?php }else{  ?>
							<option value="<?php echo $h->id;?>"> <?php echo $h->hari; ?></option>
							<?php } ?>
							<?php endforeach; ?>
						</select>
						<small id="emailHelp" class="form-text text-muted">Pilih hari shift yang ingin dijadwalkan</small>
					</div>
				</div>
				<div class="form-group row">
					<label for="formGroupExampleInput2" class="col-sm-2 col-form-label">Outlet</label>
					<div class="col-sm-10">
						<input disabled type="text" class="form-control" name="outlet" value="<?= $session['outlet'] ?>"
							id="formGroupExampleInput2" placeholder="">
						<input hidden type="text" class="form-control" name="outlet" value="<?= $session['outlet'] ?>"
							id="formGroupExampleInput2" placeholder="">
					</div>
				</div>


				<button type="submit" class="btn btn-primary btn-icon-split"> submit</button>

			</form>
			<?php endforeach ?>
		</div>
		<!-- /.container-fluid -->
