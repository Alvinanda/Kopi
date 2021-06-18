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
						<th scope="col">Senin</th>
						<th scope="col">Selasa</th>
						<th scope="col">Rabu</th>
						<th scope="col">Kamis</th>
						<th scope="col">Jumat</th>
						<th scope="col">Sabtu</th>
						<th scope="col">Minggu</th>
					</tr>
				</thead>
				<tbody>
					<?php 
                        $hari = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
                    ?>
					<?php for($i=0;$i<count($shift);$i++){?>
					<tr>
						<th><?= $shift[$i]->jam_masuk ?></th>
						<td>
							<?php for($j=0;$j<count($jadwal);$j++){ ?>
							<?php if($hari[$jadwal[$j]->hari] == 'Senin'){ ?>
							<?= ($jadwal[$j]->kode_shift == $shift[$i]->kode_shift ? $jadwal[$j]->nama:'') ?>
							<?php } ?>
							<?php } ?>
						</td>
						<td>
							<?php for($j=0;$j<count($jadwal);$j++){ ?>
							<?php if($hari[$jadwal[$j]->hari] == 'Selasa'){ ?>
							<?= ($jadwal[$j]->kode_shift == $shift[$i]->kode_shift ? $jadwal[$j]->nama:'') ?>
							<?php } ?>
							<?php } ?>
						</td>
						<td>
							<?php for($j=0;$j<count($jadwal);$j++){ ?>
							<?php if($hari[$jadwal[$j]->hari] == 'Rabu'){ ?>
							<?= ($jadwal[$j]->kode_shift == $shift[$i]->kode_shift ? $jadwal[$j]->nama:'') ?>
							<?php } ?>
							<?php } ?>
						</td>
						<td>
							<?php for($j=0;$j<count($jadwal);$j++){ ?>
							<?php if($hari[$jadwal[$j]->hari] == 'Kamis'){ ?>
							<?= ($jadwal[$j]->kode_shift == $shift[$i]->kode_shift ? $jadwal[$j]->nama:'') ?>
							<?php } ?>
							<?php } ?>
						</td>
						<td>
							<?php for($j=0;$j<count($jadwal);$j++){ ?>
							<?php if($hari[$jadwal[$j]->hari] == 'Jumat'){ ?>
							<?= ($jadwal[$j]->kode_shift == $shift[$i]->kode_shift ? $jadwal[$j]->nama:'') ?>
							<?php } ?>
							<?php } ?>
						</td>
						<td>
							<?php for($j=0;$j<count($jadwal);$j++){ ?>
							<?php if($hari[$jadwal[$j]->hari] == 'Sabtu'){ ?>
							<?= ($jadwal[$j]->kode_shift == $shift[$i]->kode_shift ? $jadwal[$j]->nama:'') ?>
							<?php } ?>
							<?php } ?>
						</td>
						<td>
							<?php for($j=0;$j<count($jadwal);$j++){ ?>
							<?php if($hari[$jadwal[$j]->hari] == 'Minggu'){ ?>
							<?= ($jadwal[$j]->kode_shift == $shift[$i]->kode_shift ? $jadwal[$j]->nama:'') ?>
							<?php } ?>
							<?php } ?>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			<!-- /.container-fluid -->
		</div>
		<!-- End of Main Content -->
	</div>
	<!-- End of Content Wrapper -->
