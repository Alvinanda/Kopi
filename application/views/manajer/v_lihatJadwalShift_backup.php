<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
	<!-- Main Content -->
	<div id="content">
		<!-- Begin Page Content -->
		<div class="container-fluid">
			<!-- Page Heading -->
			<h1 class="h3 mb-2 text-gray-800">Jadwal Shift</h1>
			<link href="<?= base_url('assets/vendor/fullcalendar-5.8.0/assets/css/fullcalendar.css')?>"
				rel="stylesheet">
			<link href="<?= base_url('assets/vendor/fullcalendar-5.8.0/assets/css/fullcalendar.print.css')?>"
				rel="stylesheet" media="print">
			<!-- <script src="<= base_url('assets/vendor/fullcalendar-5.8.0/assets/js/jquery-1.10.2.js')?>"
				type="text/javascript">
			</script> -->
			<script src="<?= base_url('assets/vendor/fullcalendar-5.8.0/assets/js/jquery-ui.custom.min.js')?>"
				type="text/javascript"></script>
			<script src="<?= base_url('assets/vendor/fullcalendar-5.8.0/assets/js/fullcalendar.js')?>"
				type="text/javascript">
			</script>
			<style>
				#wrap {
					/* width: auto; */
					margin: 0 auto;
				}

				#external-events {
					float: left;
					width: 150px;
					padding: 0 10px;
					text-align: left;
				}

				#external-events h4 {
					font-size: 16px;
					margin-top: 0;
					padding-top: 1em;
				}

				.external-event {
					/* try to mimick the look of a real event */
					margin: 10px 0;
					padding: 2px 4px;
					background: #3366CC;
					color: #fff;
					font-size: .85em;
					cursor: pointer;
				}

				#external-events p {
					margin: 1.5em 0;
					font-size: 11px;
					color: #666;
				}

				#external-events p input {
					margin: 0;
					vertical-align: middle;
				}

				#calendar {
					/* 		float: right; */
					margin: 0 auto;
					width: 900px;
					background-color: #FFFFFF;
					border-radius: 6px;
					box-shadow: 0 1px 2px #C3C3C3;
				}

			</style>
			<div id="wrap">
				<div id="calendar"></div>
				<div style="clear:both"></div>
			</div>
		</div>
		<!-- modal form submit -->
		<!-- Vertically centered modal -->
		<div class="modal" tabindex="-1" id="tambahShift">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Tambah Jadwal</h5>
						<button type="button" class="close" onclick="$('#tambahShift').modal('hide')">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form action="<?= base_url(). 'manajer/tambahkanjadwalShift';  ?>" method="post">
					<div class="modal-body">
						<div class="form-group">
							<label for="exampleInputEmail1">Nama Pegawai</label>
							<select class="form-control" id="exampleInputEmail1" name="id_user">
								 <option selected="0">select..</option>
								 <?php foreach($user as $u) : ?>
									<option value="<?php echo $u->id_user;?>"> <?php echo $u->nama; ?></option>
								 <?php endforeach; ?>
								</select>
							<small id="emailHelp" class="form-text text-muted">Pilih nama pegawai yang ingin dijadwalkan</small>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Shift</label>
							<select class="form-control" id="exampleInputEmail1" name="kode_shift">
								 <option selected="0">select..</option>
								 <?php foreach($shift as $x) : ?>
									<option value="<?php echo $x->kode_shift;?>"> <?php echo $x->jam_masuk .'-'. $x->jam_selesai; ?></option>
								 <?php endforeach; ?>
								</select>
							<small id="emailHelp" class="form-text text-muted">Pilih shift yang ingin dijadwalkan</small>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary"
							onclick="$('#tambahShift').modal('hide')">Close</button>
						<button type="submit" class="btn btn-primary"  >Save changes</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- /.container-fluid -->
	</div>


	<!-- End of Main Content -->
</div>
<script>
	$(document).ready(function () {
		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();
		/*  className colors
		className: default(transparent), important(red), chill(pink), success(green), info(blue)
		*/

		/* initialize the external events
		-----------------------------------------------------------------*/

		$('#external-events div.external-event').each(function () {

			// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
			// it doesn't need to have a start or end
			var eventObject = {
				title: $.trim($(this).text()) // use the element's text as the event title
			};

			// store the Event Object in the DOM element so we can get to it later
			$(this).data('eventObject', eventObject);

			// make the event draggable using jQuery UI
			$(this).draggable({
				zIndex: 999,
				revert: true, // will cause the event to go back to its
				revertDuration: 0 //  original position after the drag
			});

		});


		/* initialize the calendar
		-----------------------------------------------------------------*/

		var calendar = $('#calendar').fullCalendar({
			header: {
				left: 'title',
				center: 'agendaDay,agendaWeek,month',
				right: 'prev,next today'
			},
			editable: true,
			firstDay: 1, //  1(Monday) this can be changed to 0(Sunday) for the USA system
			selectable: true,
			defaultView: 'month',

			axisFormat: 'h:mm',
			columnFormat: {
				month: 'ddd', // Mon
				week: 'ddd d', // Mon 7
				day: 'dddd M/d', // Monday 9/7
				agendaDay: 'dddd d'
			},
			titleFormat: {
				month: 'MMMM yyyy', // September 2009
				week: "MMMM yyyy", // September 2009
				day: 'MMMM yyyy' // Tuesday, Sep 8, 2009
			},
			allDaySlot: false,
			selectHelper: true,
			select: function (start, end, allDay) {
				$('#tambahShift').modal({});
				// var title = prompt('Event Tes:');
				// if (title) {
				// 	calendar.fullCalendar('renderEvent', {
				// 			title: title,
				// 			start: start,
				// 			end: end,
				// 			allDay: allDay
				// 		},
				// 		true // make the event "stick"
				// 	);
				// }
				// calendar.fullCalendar('unselect');

			},
			droppable: false, // this allows things to be dropped onto the calendar !!!
			drop: function (date, allDay) { // this function is called when something is dropped

				// retrieve the dropped element's stored Event Object
				var originalEventObject = $(this).data('eventObject');

				// we need to copy it, so that multiple events don't have a reference to the same object
				var copiedEventObject = $.extend({}, originalEventObject);

				// assign it the date that was reported
				copiedEventObject.start = date;
				copiedEventObject.allDay = allDay;

				// render the event on the calendar
				// the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
				$('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

				// is the "remove after drop" checkbox checked?
				if ($('#drop-remove').is(':checked')) {
					// if so, remove the element from the "Draggable Events" list
					$(this).remove();
				}

			},
		});
	});

</script>
