<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
	<!-- Main Content -->
	<div id="content">
		<!-- Begin Page Content -->
		<div class="container-fluid">
			<!-- Page Heading -->
			<h1 class="h3 mb-2 text-gray-800">Jadwal Shift</h1>
			<table class="table table-striped">
				<thead>
					<tr>
						<th scope="col">#</th>
						<?php foreach($hari as $h){ ?>
						<th scope="col"><?= $h->hari ?></th>
						<?php } ?>
					</tr>
				</thead>
				<tbody>
					<?php for($i=0;$i<count($shift);$i++){?>
					<tr>
						<th><?= $shift[$i]->jam_masuk .'-'. $shift[$i]->jam_selesai ?></th>
						<?php foreach($hari as $h){ ?>
						<td>
							<?php for($j=0;$j<count($jadwal);$j++){ ?>
							<?php if($jadwal[$j]->hari == $h->id){
								 if($jadwal[$j]->kode_shift == $shift[$i]->kode_shift){ ?>
							<span class="badge badge-pill badge-primary"> <?= $jadwal[$j]->nama ?></span> <br/>
							<?php }} } ?>
						</td>
						<?php } ?>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			<!-- /.container-fluid -->
		</div>
		<!-- End of Main Content -->
		<!-- modal Action -->
		<div class="modal" tabindex="-1" id="actionShift">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Modal title</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body d-flex justify-content-around">
						<a id="btnEdit" class="btn btn-secondary" >Edit</a>
						<button type="button" id="btnDelete" class="btn btn-primary">Delete</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- modal Delete -->
	<div class="modal" tabindex="-1" id="actionDelete">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Modal title</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Modal body text goes here.</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<a href="<?= base_url('manajer/hapusJadwalShift/')?>" class="btn btn-primary"
						id="confirmDelete">Delete</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End of Content Wrapper -->

<script>
	function editShift(id) {
		const baseUrl = "<?= base_url('manajer')?>";
		$('#actionShift').modal();
		$('#btnDelete').removeAttr('onclick');
		$('#btnDelete').attr('onclick', 'btnDelete(' + id + ')');
		$('#btnEdit').removeAttr('href');
		$('#btnEdit').attr('href', baseUrl + '/updateJadwalShift/' + id);
	}

	function btnDelete(id) {
		$('#actionShift').modal('hide');
		$('#actionDelete').modal();
		let confirmDelete = $('#confirmDelete').attr('href');
		$('#confirmDelete').attr('href', confirmDelete + id);
	}

</script>
