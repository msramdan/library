<div id="content" class="app-content">
	<div class="row">

		<div class="col-xl-3 col-md-6">
			<div class="widget widget-stats bg-blue">
				<div class="stats-icon"><i class="fa fa-book"></i></div>
				<div class="stats-info">
					<h4>DATA BUKU</h4>
					<p>5 Data</p>
				</div>
				<div class="stats-link">
					<a href="<?= base_url() ?>barang">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
				</div>
			</div>
		</div>


		<div class="col-xl-3 col-md-6">
			<div class="widget widget-stats bg-info">
				<div class="stats-icon"><i class="fa fa-list"></i></div>
				<div class="stats-info">
					<h4>DATA KATEGORI</h4>
					<p>5 Data</p>
				</div>
				<div class="stats-link">
					<a href="<?= base_url() ?>permintaan">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
				</div>
			</div>
		</div>


		<div class="col-xl-3 col-md-6">
			<div class="widget widget-stats bg-orange">
				<div class="stats-icon"><i class="fa fa-user"></i></div>
				<div class="stats-info">
					<h4>DATA PENGUNJUNG</h4>
					<p>5 Data</p>
				</div>
				<div class="stats-link">
					<a href="<?= base_url() ?>permintaan">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
				</div>
			</div>
		</div>


		<div class="col-xl-3 col-md-6">
			<div class="widget widget-stats bg-red">
				<div class="stats-icon"><i class="fa fa-users"></i></div>
				<div class="stats-info">
					<h4>DATA USER</h4>
					<p>5 Data</p>
				</div>
				<div class="stats-link">
					<a href="<?= base_url() ?>permintaan">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
				</div>
			</div>
		</div>

	</div>

	<div class="row">
		<div class="col-xl-6 ui-sortable">
			<div class="panel panel-inverse" data-sortable-id="table-basic-1">
				<div class="panel-heading ui-sortable-handle">
					<h4 class="panel-title">5 buku terbanyak di baca</h4>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-bordered table-hover table-td-valign-middle text-white">
							<tr>
								<th>No</th>
								<th>Kode Permintaan</th>
								<th>Nama Karyawan</th>
								<th>Tanggal</th>
								<th>Status</th>
							</tr>
							<tbody>
							</tbody>
						</table>
					</div>

				</div>
			</div>
		</div>

		<div class="col-xl-6 ui-sortable">
			<div class="panel panel-inverse" data-sortable-id="table-basic-1">
				<div class="panel-heading ui-sortable-handle">
					<h4 class="panel-title">Grafik 5 buku terbanyak di baca</h4>
				</div>
				<div class="panel-body">
					<!-- <div id="nv-pie-chart" class="h-250px"></div> -->
				</div>
			</div>
		</div>

	</div>
</div>
<script src="<?= base_url() ?>assets/assets/js/demo/dashboard-v2.js" type="beba54df5f87d24c2458d535-text/javascript"></script>
<link href="<?= base_url() ?>assets/assets/plugins/nvd3/build/nv.d3.css" rel="stylesheet" />
<script src="<?= base_url() ?>assets/assets/plugins/d3/d3.min.js"></script>
<script src="<?= base_url() ?>assets/assets/plugins/nvd3/build/nv.d3.min.js"></script>
<script>
	var pieChartData = [{
			'label': 'Waiting',
			'value': 5,
			'color': 'grey'
		},
		{
			'label': 'Approved',
			'value': 5,
			'color': 'green'
		},
		{
			'label': 'Reject',
			'value': 5,
			'color': 'red'
		},
	];

	nv.addGraph(function() {
		var pieChart = nv.models.pieChart()
			.x(function(d) {
				return d.label
			})
			.y(function(d) {
				return d.value
			})
			.showLabels(true)
			.labelThreshold(.05);

		d3.select('#nv-pie-chart').append('svg')
			.datum(pieChartData)
			.transition().duration(350)
			.call(pieChart);

		return pieChart;
	});
</script>