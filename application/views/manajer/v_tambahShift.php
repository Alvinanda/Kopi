<link rel="stylesheet"
	href="<?= base_url('assets/vendor/datetimepicker/pc-bootstrap4-datetimepicker/build/css/bootstrap-datetimepicker.min.css')?>" />
<link rel="stylesheet"
	href="<?= base_url('assets/vendor/datetimepicker/bootstrap/dist/fonts/glyphicons-halflings-regular.woff')?>">
<!-- Content Wrapper -->
<div id=" content-wrapper" class="d-flex flex-column">

	<!-- Main Content -->
	<div id="content">


		<!-- Begin Page Content -->
		<div class="container-fluid">



			<!-- Page Heading -->
			<h1 class="h3 mb-4 text-gray-800">Tambah Shift</h1>

			<form action="<?= base_url(). 'manajer/tambahkanShift';  ?>" method="post">
				<div class="form-group row">
					<label for="formGroupExampleInput" class="col-sm-2 col-form-label">Kode Shift</label>
					<div class="col-sm-10">
						<input required type="text" class="form-control" name="kode_shift" id="formGroupExampleInput2"
							placeholder="">
					</div>
				</div>
				<div class="form-group row">
					<label for="formGroupExampleInput2" class="col-sm-2 col-form-label">Jam Masuk</label>
					<div class="col-sm-10">
						<input required type='text' class="form-control" id="jam_masuk" name="jam_masuk"
							placeholder="<?= date('H:i:s')?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="formGroupExampleInput2" class="col-sm-2 col-form-label">Jam Selesai</label>
					<div class="col-sm-10">
						<input required type="tex" class="form-control" id="jam_selesai" name="jam_selesai"
							placeholder="<?= date('H:i:s')?>">
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
				<button type="submit" class="btn btn-primary"> submit</button>

			</form>

		</div>
		<!-- /.container-fluid -->
		<script type="text/javascript" src="<?= base_url('assets/vendor/datetimepicker/moment/moment.js')?>"></script>
		<script type="text/javascript"
			src="<?= base_url('assets/vendor/datetimepicker/bootstrap/js/dist/transition.js')?>">
		</script>
		<script type="text/javascript"
			src="<?= base_url('assets/vendor/datetimepicker/bootstrap/js/dist/collapse.js')?>">
		</script>
		<script type="text/javascript"
			src="<?= base_url('assets/vendor/datetimepicker/pc-bootstrap4-datetimepicker/build/js/bootstrap-datetimepicker.min.js')?>">
		</script>
		<script script type="text/javascript">
			$(function () {
				$('#jam_masuk').datetimepicker({
					format: 'HH:mm:ss',
					locale: 'id'
				});
				$('#jam_selesai').datetimepicker({
					format: 'HH:mm:ss',
					locale: 'id'
				});
			});

		</script>
