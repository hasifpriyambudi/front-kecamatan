<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Data Program & Bantuan</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item"><a href="<?= base_url('walcome') ?>">Dashboard</a></div>
				<div class="breadcrumb-item active"><a href="<?= base_url('walcome/bantuan') ?>">Bantuan</a></div>
			</div>
		</div>

		<div class="section-body">
			<div class="card">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label>Kecamatan</label>
							<select class="form-control" name="kecamatan" id="kecamatan">
								<option value="">--- Pilih Kecamatan ---</option>
								<option value="banjarmangu">Banjarmangu</option>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Desa</label>
							<select class="form-control" name="desa" id="desa">
								<option value="">--- Pilih Desa ---</option>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Tahun</label>
							<select class="form-control" name="tahun" id="tahun">
								<option value="">--- Pilih Tahun ---</option>
							</select>
						</div>
					</div>
				</div>
			</div>

			<div id="info" style="display:none;">
				<div class="card">
					<div class="row">
						<div class="col-12 col-md-6 col-lg-6">
							<div class="card">
								<div class="card-header">
									<h4>Penduduk/Perorangan</h4>
								</div>
								<div class="card-body">
									<canvas id="chartPenduduk"></canvas>
								</div>
							</div>
						</div>
						<div class="col-12 col-md-6 col-lg-6">
							<div class="card">
								<div class="card-header">
									<h4>Keluarga</h4>
								</div>
								<div class="card-body">
									<canvas id="chartKeluarga"></canvas>
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
	function getData(link, desa="", tahun="") {
		let linkAPI = `${link}bantuan?desa_id=${desa}&tahun=${tahun}`
		$.ajax({
			url: `${linkAPI}&sasaran=1`,
			dataType:"json",
			type: "get",
			success: function(data){
				if(data.status==200){
					let info = data.messages;

					// Chart Penduduk
					var labelPenduduk = [];
					var valuePenduduk = [];
					info.forEach((value, key)=>{
						labelPenduduk.push(value.program);
						valuePenduduk.push(value.value);
					});

					var ctx = document.getElementById("chartPenduduk").getContext('2d');
					var chartPenduduk = new Chart(ctx, {
						type: 'bar',
						data: {
							labels: labelPenduduk,
							datasets: [{
								label: 'Total',
								data: valuePenduduk,
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
					// END Chart Penduduk

				}
			},
		});

		$.ajax({
			url: `${linkAPI}&sasaran=2`,
			dataType:"json",
			type: "get",
			success: function(data){
				if(data.status==200){
					let info = data.messages;

					// Chart Keluarga
					var labelKeluarga = [];
					var valueKeluarga = [];
					info.forEach((value, key)=>{
						labelKeluarga.push(value.program);
						valueKeluarga.push(value.value);
					});

					var ctx = document.getElementById("chartKeluarga").getContext('2d');
					var chartKeluarga = new Chart(ctx, {
						type: 'bar',
						data: {
							labels: labelKeluarga,
							datasets: [{
								label: 'Total',
								data: valueKeluarga,
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
					// END Chart Keluarga

				}
			},
		});

		$('#info').css('display','block');

	}

	function changeKecamatan() {
		let kecamatan = $('#kecamatan').val();

		if(kecamatan=='banjarmangu'){
			return 'https://api.matajateng.com/';
		}else{
			return ""
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

	$(document).ready(function() {

		// OnChange Kecamatan
		$('#kecamatan').change(function(){
			var link = changeKecamatan();
			console.log(link)
			if(link!=""){
				getDesa(link);
				getData(link);
			}else{
				$('#info').css('display', 'none');
			}
		});
		// END OnChange Kecamatan

		$('#desa').change(function(){
			var link	= changeKecamatan();
			var desa	= changeDesa();

			getData(link, desa);
		});
		// END OnChange Desa

	});
</script>