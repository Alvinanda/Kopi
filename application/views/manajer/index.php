<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
<div class="row">

	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
							Earnings (Monthly)</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
					</div>
					<div class="col-auto">
						<i class="fas fa-calendar fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Earnings (Annual) Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-success shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
							Earnings (Annual)</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
					</div>
					<div class="col-auto">
						<i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Tasks Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-info shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
						</div>
						<div class="row no-gutters align-items-center">
							<div class="col-auto">
								<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
							</div>
							<div class="col">
								<div class="progress progress-sm mr-2">
									<div class="progress-bar bg-info" role="progressbar" style="width: 50%"
										aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-auto">
						<i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Pending Requests Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-warning shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
							Pending Requests</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
					</div>
					<div class="col-auto">
						<i class="fas fa-comments fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Absensi -->
<div class="col-xl-3 col-md-6 mb-4">
	<div class="card border-left-primary shadow h-100 py-2">
		<div class="card-body">
			<div class="row no-gutters align-items-center">
				<div class="col mr-2">
					<div class="text-s font-weight-bold text-primary text-uppercase mb-1">
						Absensi</div>
					<?php foreach($jadwal as $j) : ?>
					<div class="h5 mb-0 font-weight-bold text-gray-800">
						<?php if($j->hari_en == date("l"))  echo $j->jam_masuk .'-'. $j->jam_selesai   ?></div>
					<?php endforeach; ?>
				</div>
				<div class="col-auto">
					<a href="<?= base_url('manajer/checkIn/'.$j->id_jadwal); ?>" <?= !$check_shift ? 'disabled':'' ?>
						class="btn btn-primary btn-icon-split">
						Check in </a>
				</div>
			</div>
		</div>
	</div>
</div>

</div>
<!-- /.container-fluid -->
