<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
	<!-- Main Content -->
	<div id="content">
		<!-- Begin Page Content -->
		<div class="container-fluid">
			<!-- Page Heading -->
			<h1 class="h3 mb-2 text-gray-800">Jadwal Shift</h1>
			<?php $hari = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];?>
			<table class="table table-striped">
				<thead>
					<tr>
						<th scope="col">#</th>
						<?php foreach($hari as $h){ ?>
						<th scope="col"><?= $h ?></th>
						<?php } ?>
					</tr>
				</thead>
				<tbody>
					<?php for($i=0;$i<count($shift);$i++){?>
					<tr>
						<th><?= $shift[$i]->jam_masuk ?></th>
						<?php foreach($hari as $h){ ?>
						<td>
							<?php for($j=0;$j<count($jadwal);$j++){ ?>
							<?php if($hari[$jadwal[$j]->hari] == $h){ ?>
							<div onclick='editShift("<?= $jadwal[$j]->id_jadwal ?>")'>
								<?= ($jadwal[$j]->kode_shift == $shift[$i]->kode_shift ? $jadwal[$j]->nama:'') ?>
							</div>
							<?php } ?>
							<?php } ?>
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
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Edit</button>
						<button type="button" onclick="btnDelete()" class="btn btn-primary">Delete</button>
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
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End of Content Wrapper -->

<script>
	function editShift(id) {
		$('#actionShift').modal();
	}

	function btnDelete() {
		$('#actionShift').modal('hide');
		$('#actionDelete').modal();
	}

</script>
