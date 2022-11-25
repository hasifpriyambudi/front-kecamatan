<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Data Kependudukan</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item"><a href="<?= base_url('walcome') ?>">Dashboard</a></div>
				<div class="breadcrumb-item active"><a href="<?= base_url('walcome/penduduk') ?>">Kependudukan</a></div>
			</div>
		</div>

		<div class="section-body">
			<div class="card">
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label>Kecamatan</label>
							<select class="form-control" name="kecamatan" id="kecamatan">
								<option value="">--- Pilih Kecamatan ---</option>
								<option value="banjarmangu">Banjarmangu</option>
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Desa</label>
							<select class="form-control" name="desa" id="desa">
								<option>--- Pilih Desa ---</option>
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Rw</label>
							<select class="form-control" name="rw" id="rw">
								<option>---Pilih RW---</option>
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>RT</label>
							<select class="form-control" name="rt" id="rt">
							<option>---Pilih RT---</option>
							</select>
						</div>
					</div>
				</div>
			</div>

			<div id="info" style="display:none;">
				<div class="card">
					<div class="row">
						<div class="col-lg-3 col-md-6 col-sm-6 col-12">
							<div class="card card-statistic-1">
								<div class="card-icon bg-primary">
									<i class="fas fa-users"></i>
								</div>
								<div class="card-wrap">
									<div class="card-header">
										<h4>Total Penduduk</h4>
									</div>
									<div class="card-body" id="totPend"></div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6 col-12">
							<div class="card card-statistic-1">
								<div class="card-icon bg-danger">
									<i class="fas fa-male"></i>
								</div>
								<div class="card-wrap">
									<div class="card-header">
										<h4>Penduduk Laki Laki</h4>
									</div>
									<div class="card-body" id="totLaki"></div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6 col-12">
							<div class="card card-statistic-1">
								<div class="card-icon bg-warning">
									<i class="fas fa-female"></i>
								</div>
								<div class="card-wrap">
									<div class="card-header">
										<h4>Penduduk Perempuan</h4>
									</div>
									<div class="card-body" id="totPerem"></div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6 col-12">
							<div class="card card-statistic-1">
								<div class="card-icon bg-info">
									<i class="fas fa-user-injured"></i>
								</div>
								<div class="card-wrap">
									<div class="card-header">
										<h4>Disabilitas</h4>
									</div>
									<div class="card-body" id="totDisabilitas"></div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="card">
					<div class="row">
						<div class="col-12 col-md-6 col-lg-6">
							<div class="card">
								<div class="card-header">
									<h4>Data Agama</h4>
								</div>
								<div class="card-body">
									<canvas id="chartAgama"></canvas>
								</div>
							</div>
						</div>
						<div class="col-12 col-md-6 col-lg-6">
							<div class="card">
								<div class="card-header">
									<h4>Data Pendidikan</h4>
								</div>
								<div class="card-body">
									<canvas id="chartPendidikan"></canvas>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="card">
					<div class="row">
						<div class="col-md-12">
							<div class="card-header">
								<h4>Data Penduduk Berdasarkan Usia</h4>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>Usia</th>
												<th>Jumlah</th>
												<th>Persentase</th>
											</tr>
										</thead>
										<tbody id="tableUmur">

										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="card">
					<div class="row">

						<div class="col-md-6">
							<div class="card-header">
								<h4>Data Pekerjaan</h4>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>Nama Pekerjaan</th>
												<th>Jumlah</th>
												<th>Persentase</th>
											</tr>
										</thead>
										<tbody id="tablePekerjaan">
										</tbody>
									</table>
								</div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="card-header">
								<h4>Data Golongan Darah</h4>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>Golongan Darah</th>
												<th>Jumlah</th>
												<th>Progress</th>
											</tr>
										</thead>
										<tbody id="tableGolongan">
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</section>
</div>

<script>

	function getData(link, desa="", rw="", rt="") {
		let linkAPI = `${link}kependudukan/?desa_id=${desa}&rw=${rw}&rt=${rt}`
		$.ajax({
			url: `${linkAPI}`,
			dataType:"json",
			type: "get",
			success: function(data){
				if(data.status==200){
					let info = data.messages;

					// Info Card
					$('#totPend').html(info.total.total_penduduk);
					$('#totLaki').html(info.total.total_laki_laki);
					$('#totPerem').html(info.total.total_perempuan);
					$('#totDisabilitas').html(info.total.total_disabilitas);

					// Chart Agama
					var labelAgama = [];
					var valueAgama = [];
					info.agama.daftar.forEach((value, key)=>{
						labelAgama.push(value.nama);
						valueAgama.push(value.total);
					});
					var ctx = document.getElementById("chartAgama").getContext('2d');
					var chartAgama = new Chart(ctx, {
						type: 'bar',
						data: {
							labels: labelAgama,
							datasets: [{
								label: 'Total',
								data: valueAgama,
								borderWidth: 2,
								backgroundColor: '#6777ef',
								borderColor: '#6777ef',
								borderWidth: 2.5,
								pointBackgroundColor: '#ffffff',
								pointRadius: 4
							}]
						},
						options: {
							legend: {
								display: false
							},
							scales: {
								yAxes: [{
									gridLines: {
										drawBorder: false,
										color: '#f2f2f2',
									},
									ticks: {
										beginAtZero: true,
										stepSize: 150
									}
								}],
								xAxes: [{
									ticks: {
										display: false
									},
									gridLines: {
										display: false
									}
								}]
							},
						}
					});
					// END Chart Agama

					// Chart Pendidikan
					var labelPendidikan = [];
					var valuePendidikan = [];
					info.pendidikan.daftar.forEach((value, key)=>{
						labelPendidikan.push(value.nama);
						valuePendidikan.push(value.total);
					});
					var ctx = document.getElementById("chartPendidikan").getContext('2d');
					var chartPendidikan = new Chart(ctx, {
						type: 'bar',
						data: {
							labels: labelPendidikan,
							datasets: [{
								label: 'Total',
								data: valuePendidikan,
								borderWidth: 2,
								backgroundColor: '#6777ef',
								borderColor: '#6777ef',
								borderWidth: 2.5,
								pointBackgroundColor: '#ffffff',
								pointRadius: 4
							}]
						},
						options: {
							legend: {
								display: false
							},
							scales: {
								yAxes: [{
									gridLines: {
										drawBorder: false,
										color: '#f2f2f2',
									},
									ticks: {
										beginAtZero: true,
										stepSize: 150
									}
								}],
								xAxes: [{
									ticks: {
										display: false
									},
									gridLines: {
										display: false
									}
								}]
							},
						}
					});
					// END Chart Pendidikan

					// Chart Usia
					$('#tableUmur').html("");
					info.umur.daftar.forEach((value, key)=>{
						var persentase = (value.total/info.total.total_penduduk)*100;
						$('#tableUmur').append(`<tr>\
							<td>${value.nama}</td>\
							<td>${value.total}</td>\
							<td>${persentase.toFixed(2)}%</td>\
						</tr>`);
					});
					$('#tableUmur').append(`<tr style="background-color: grey; color: white;">\
						<td>Jumlah</td>\
						<td>${info.umur.total}</td>\
						<td></td>\
					</tr>`);
					// END Chart Usia

					// Chart Pekerjaan
					$('#tablePekerjaan').html("");
					info.pekerjaan.daftar.forEach((value, key)=>{
						var persentase = (value.total/info.total.total_penduduk)*100;
						$('#tablePekerjaan').append(`<tr>\
							<td>${value.nama}</td>\
							<td>${value.total}</td>\
							<td>${persentase.toFixed(2)}%</td>\
						</tr>`);
					});
					var perNganggur = ((info.total.total_penduduk-info.pekerjaan.total)/info.total.total_penduduk)*100;
					$('#tablePekerjaan').append(`<tr style="background-color: yellow;">\
						<td>Belum Terdaftar/Pengangguran</td>\
						<td>${info.total.total_penduduk-info.pekerjaan.total}</td>\
						<td>${perNganggur.toFixed(2)}%</td>\
					</tr>`);
					$('#tablePekerjaan').append(`<tr style="background-color: grey; color: white;">\
						<td>Jumlah</td>\
						<td>${info.total.total_penduduk}</td>\
						<td></td>\
					</tr>`);
					// END Chart Pekerjaa

					// Chart Golongan
					$('#tableGolongan').html("");
					info.golongan.daftar.forEach((value, key)=>{
						var persentase = (value.total/info.total.total_penduduk)*100;
						$('#tableGolongan').append(`<tr>\
							<td>${value.nama}</td>\
							<td>${value.total}</td>\
							<td>${persentase.toFixed(2)}%</td>\
						</tr>`);
					});
					var perGolongan = ((info.total.total_penduduk-info.golongan.total)/info.total.total_penduduk)*100;
					$('#tableGolongan').append(`<tr style="background-color: yellow;">\
						<td>Belum Mengisi</td>\
						<td>${info.total.total_penduduk-info.golongan.total}</td>\
						<td>${perGolongan.toFixed(2)}%</td>\
					</tr>`);
					$('#tableGolongan').append(`<tr style="background-color: grey; color: white;">\
						<td>Jumlah</td>\
						<td>${info.total.total_penduduk}</td>\
						<td></td>\
					</tr>`);
					// END Chart Golongan

				}
			},
		});

		$('#info').css('display','block');

	}

	function changeKecamatan() {
		let kecamatan = $('#kecamatan').val();

		if(kecamatan=='banjarmangu'){
			return 'http://localhost:8080/';
		}
	}

	function getDesa(link) {
		let linkAPI = `${link}desa`;
		$.ajax({
			url: `${linkAPI}`,
			dataType:"json",
			type: "get",
			success: function(data){
				$('#desa').html("");
				$('#desa').html("<option value=''>--- Pilih Desa ---</option>");
				data.forEach((value, key)=>{
					$('#desa').append(`
						<option value="${value.desa_id}">${value.nama}</option>
					`);
				});
			}
		});
	}
	function changeDesa() {
		return $('#desa').val();
	}

	function getRw(link, desa) {
		let linkAPI = `${link}desa/rw-rt?desa=${desa}`;
		$.ajax({
			url: `${linkAPI}`,
			dataType:"json",
			type: "get",
			success: function(data){
				$('#rw').html("");
				$('#rw').html("<option value=''>--- Pilih RW ---</option>");
				data.forEach((value, key)=>{
					$('#rw').append(`
						<option value="${value.rw}">${value.rw}</option>
					`);
				});
			}
		});
	}
	function changeRw() {
		return $('#rw').val();
	}

	function getRt(link, desa, rw) {
		let linkAPI = `${link}desa/rw-rt?desa=${desa}&rw=${rw}`;
		$.ajax({
			url: `${linkAPI}`,
			dataType:"json",
			type: "get",
			success: function(data){
				$('#rt').html("");
				$('#rt').html("<option value=''>--- Pilih RT ---</option>");
				data.forEach((value, key)=>{
					$('#rt').append(`
						<option value="${value.rt}">${value.rt}</option>
					`);
				});
			}
		});
	}
	function changeRt() {
		return $('#rt').val();
	}


	$(document).ready(function() {

		// OnChange Kecamatan
		$('#kecamatan').change(function(){
			var link = changeKecamatan();

			getDesa(link);
			getData(link);

		});
		// END OnChange Kecamatan

		// OnChange Desa
		$('#desa').change(function(){
			var link	= changeKecamatan();
			var desa	= changeDesa();

			getData(link, desa);
			getRw(link, desa);
		});
		// END OnChange Desa

		// OnChange RW
		$('#rw').change(function(){
			var link	= changeKecamatan();
			var desa	= changeDesa();
			var rw	= changeRw();

			getData(link, desa, rw);
			getRt(link, desa, rw);
		});
		// END OnChange RW

		// OnChange RT
		$('#rt').change(function(){
			var link	= changeKecamatan();
			var desa	= changeDesa();
			var rw		= changeRw();
			var rt		= changeRt();

			getData(link, desa, rw, rt);
		});
		// END OnChange RT
	});
</script>