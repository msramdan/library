<div id="content" class="app-content">
	<div class="row">

		<div class="col-xl-3 col-md-6">
			<div class="widget widget-stats bg-blue">
				<div class="stats-icon"><i class="fa fa-book"></i></div>
				<div class="stats-info">
					<?php
					$buku = $this->db->get('modul_pdf')->num_rows();
					?>

					<h4>DATA MODUL BUKU</h4>
					<p><?= $buku ?> Data</p>
				</div>
				<div class="stats-link">
					<a href="<?= base_url() ?>modul_pdf">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
				</div>
			</div>
		</div>


		<div class="col-xl-3 col-md-6">
			<div class="widget widget-stats bg-info">
				<div class="stats-icon"><i class="fa fa-video"></i></div>
				<div class="stats-info">
					<?php
					$video = $this->db->get('video')->num_rows();
					?>
					<h4>DATA VIDEO</h4>
					<p><?= $video ?> Data</p>
				</div>
				<div class="stats-link">
					<a href="<?= base_url() ?>video">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
				</div>
			</div>
		</div>

		<div class="col-xl-3 col-md-6">
			<div class="widget widget-stats bg-orange">
				<div class="stats-icon"><i class="fa fa-user"></i></div>
				<div class="stats-info">
					<?php
					$pengunjung = $this->db->get('pengunjung')->num_rows();
					?>
					<h4>DATA PENGUNGJUNG</h4>
					<p><?= $pengunjung ?> Data</p>
				</div>
				<div class="stats-link">
					<a href="<?= base_url() ?>pengunjung">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
				</div>
			</div>
		</div>


		<div class="col-xl-3 col-md-6">
			<div class="widget widget-stats bg-red">
				<div class="stats-icon"><i class="fa fa-users"></i></div>
				<div class="stats-info">
					<?php
					$user = $this->db->get('user')->num_rows();
					?>
					<h4>DATA USER</h4>
					<p><?= $user ?> Data</p>
				</div>
				<div class="stats-link">
					<a href="<?= base_url() ?>user">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
				</div>
			</div>
		</div>
	</div>

	<!-- <div class="row">
		<div class="col-xl-6 ui-sortable">
			<div class="panel panel-inverse" data-sortable-id="table-basic-1">
				<div class="panel-heading ui-sortable-handle">
					<h4 class="panel-title">Top View 5 video Pembelajaran </h4>
				</div>
				<div class="panel-body">
					<link href="<?= base_url() ?>assets/assets/plugins/nvd3/build/nv.d3.css" rel="stylesheet" />
					<script src="<?= base_url() ?>assets/assets/plugins/d3/d3.min.js"></script>
					<script src="<?= base_url() ?>assets/assets/plugins/nvd3/build/nv.d3.min.js"></script>
					<div id="nv-bar-chart" class="h-250px"></div>
				</div>
			</div>
		</div>

		<div class="col-xl-6 ui-sortable">
			<div class="panel panel-inverse" data-sortable-id="table-basic-1">
				<div class="panel-heading ui-sortable-handle">
					<h4 class="panel-title">Top View 5 Modul Pembelajaran</h4>
				</div>
				<div class="panel-body">
					<div id="nv-pie-chart" class="h-250px"></div>
				</div>
			</div>
		</div>
	</div> -->
</div>
<script src="<?= base_url() ?>assets/assets/js/demo/dashboard-v2.js" type="beba54df5f87d24c2458d535-text/javascript"></script>
<link href="<?= base_url() ?>assets/assets/plugins/nvd3/build/nv.d3.css" rel="stylesheet" />
<script src="<?= base_url() ?>assets/assets/plugins/d3/d3.min.js"></script>
<script src="<?= base_url() ?>assets/assets/plugins/nvd3/build/nv.d3.min.js"></script>

<script>
	var barChartData = [{
		key: 'Cumulative Return',
		values: [{
				'label': 'A',
				'value': 29,
				'color': 'red'
			},
			{
				'label': 'B',
				'value': 15,
				'color': 'orange'
			},
			{
				'label': 'C',
				'value': 32,
				'color': 'success'
			},
			{
				'label': 'D',
				'value': 196,
				'color': 'cyan'
			},
			{
				'label': 'E',
				'value': 44,
				'color': 'blue'
			},
			{
				'label': 'F',
				'value': 98,
				'color': 'purple'
			},
			{
				'label': 'G',
				'value': 13,
				'color': 'gray500'
			},
			{
				'label': 'H',
				'value': 5,
				'color': 'componentColor'
			}
		]
	}];

	nv.addGraph(function() {
		var barChart = nv.models.discreteBarChart()
			.x(function(d) {
				return d.label
			})
			.y(function(d) {
				return d.value
			})
			.showValues(true)
			.duration(250);

		barChart.yAxis.axisLabel("Total Sales");
		barChart.xAxis.axisLabel('Product');

		d3.select('#nv-bar-chart').append('svg').datum(barChartData).call(barChart);
		nv.utils.windowResize(barChart.update);
		return barChart;
	});
</script>


<script>
	var barChartData = [{
		key: 'Cumulative Return',
		values: [{
				'label': 'A',
				'value': 29,
				'color': 'red'
			},
			{
				'label': 'B',
				'value': 15,
				'color': 'orange'
			},
			{
				'label': 'C',
				'value': 32,
				'color': 'success'
			},
			{
				'label': 'D',
				'value': 196,
				'color': 'cyan'
			},
			{
				'label': 'E',
				'value': 44,
				'color': 'blue'
			},
			{
				'label': 'F',
				'value': 98,
				'color': 'purple'
			},
			{
				'label': 'G',
				'value': 13,
				'color': 'gray500'
			},
			{
				'label': 'H',
				'value': 5,
				'color': 'componentColor'
			}
		]
	}];

	nv.addGraph(function() {
		var barChart = nv.models.discreteBarChart()
			.x(function(d) {
				return d.label
			})
			.y(function(d) {
				return d.value
			})
			.showValues(true)
			.duration(250);

		barChart.yAxis.axisLabel("Total Sales");
		barChart.xAxis.axisLabel('Product');

		d3.select('#nv-pie-chart').append('svg').datum(barChartData).call(barChart);
		nv.utils.windowResize(barChart.update);
		return barChart;
	});
</script>