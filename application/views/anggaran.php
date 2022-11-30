<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Data Keuangan</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item"><a href="<?= base_url('walcome') ?>">Dashboard</a></div>
				<div class="breadcrumb-item active"><a href="<?= base_url('walcome/anggaran') ?>">Keuangan</a></div>
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
							<label>Tahun</label>
							<select class="form-control" name="tahun" id="tahun">
								<option value="">--- Semua Tahun ---</option>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Bulan</label>
							<select class="form-control" name="bulan" id="bulan" disabled>
								<option>--- Semua Bulan ---</option>
								<option value="1">Januari</option>
								<option value="2">Februari</option>
								<option value="3">Maret</option>
								<option value="4">April</option>
								<option value="5">Mei</option>
								<option value="6">Juni</option>
								<option value="7">Juli</option>
								<option value="8">Agustus</option>
								<option value="9">September</option>
								<option value="10">Oktober</option>
								<option value="11">November</option>
								<option value="12">Desember</option>
							</select>
						</div>
					</div>
				</div>
			</div>

			<div id="info" style="display:none;">
				<div class="card">
					<div class="row">
						<div class="col-lg-4 col-md-6 col-sm-6 col-12">
							<div class="card card-statistic-1">
								<div class="card-icon bg-primary">
									<i class="fas fa-money-check"></i>
								</div>
								<div class="card-wrap">
									<div class="card-header">
										<h4>Total Belanja</h4>
									</div>
									<div class="card-body" id="totBelanja"></div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6 col-12">
							<div class="card card-statistic-1">
								<div class="card-icon bg-danger">
									<i class="fas fa-money-check"></i>
								</div>
								<div class="card-wrap">
									<div class="card-header">
										<h4>SELISIH ANGGARAN DAN REALISASI</h4>
									</div>
									<div class="card-body" id="totSelisih"></div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6 col-12">
							<div class="card card-statistic-1">
								<div class="card-icon bg-warning">
									<i class="fas fa-money-check"></i>
								</div>
								<div class="card-wrap">
									<div class="card-header">
										<h4>BELANJA PEGAWAI</h4>
									</div>
									<div class="card-body" id="totPegawai"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4 col-md-6 col-sm-6 col-12">
							<div class="card card-statistic-1">
								<div class="card-icon bg-info">
									<i class="fas fa-money-check"></i>
								</div>
								<div class="card-wrap">
									<div class="card-header">
										<h4>BELANJA BARANG DAN JASA</h4>
									</div>
									<div class="card-body" id="totBarang"></div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6 col-12">
							<div class="card card-statistic-1">
								<div class="card-icon bg-secondary">
									<i class="fas fa-money-check"></i>
								</div>
								<div class="card-wrap">
									<div class="card-header">
										<h4>BELANJA MODAL</h4>
									</div>
									<div class="card-body" id="totModal"></div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6 col-12">
							<div class="card card-statistic-1">
								<div class="card-icon bg-primary">
									<i class="fas fa-money-check"></i>
								</div>
								<div class="card-wrap">
									<div class="card-header">
										<h4>BELANJA TIDAK LANGSUNG</h4>
									</div>
									<div class="card-body" id="totTidakLangsung"></div>
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

	const formatter = new Intl.NumberFormat('en-US', {
		style: 'currency',
		currency: 'IDR',
	});


	function getData(link, tahun="", bulan="") {
		
		let linkAPI = `${link}keuangan?tahun=${tahun}&bulan=${bulan}`
		$.ajax({
			url: `${linkAPI}`,
			dataType:"json",
			type: "get",
			success: function(data){
				if(data.status==200){
					let info = data.messages;

					// Info Card
					$('#totBelanja').html(formatter.format(info.total_belanja));
					$('#totSelisih').html(formatter.format(info.selisih));
					$('#totPegawai').html(formatter.format(info.belanja_pegawai));
					$('#totBarang').html(formatter.format(info.belanja_barang_jasa));
					$('#totModal').html(formatter.format(info.belanja_modal));
					$('#totTidakLangsung').html(formatter.format(info.belanja_tidak_langsung));

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
			return '';
		}
	}

	function getTahun(link) {
		let linkAPI = `${link}keuangan/tahun`;
		$.ajax({
			url: `${linkAPI}`,
			dataType:"json",
			type: "get",
			success: function(data){
				$('#tahun').html("");
				$('#tahun').html("<option value=''>--- Semua Tahun ---</option>");
				data.forEach((value, key)=>{
					$('#tahun').append(`
						<option value="${value.tahun}">${value.tahun}</option>
					`);
				});
			}
		});
	}
	function changeTahun() {
		return $('#tahun').val();
	}
	function kondisiTahun(){
		let kecamatan = changeKecamatan();
		if(kecamatan!=""){
			$('#tahun').attr('disabled', false);
		}else{
			$('#tahun').attr('disabled', true);
		}
	}

	$(document).ready(function() {

		// OnChange Kecamatan
		$('#kecamatan').change(function(){
			var link = changeKecamatan();

			if(link!=""){
				getTahun(link);
				getData(link);
			}else{
				$('#info').css('display','none');
			}

			kondisiTahun();
		});
		// END OnChange Kecamatan

		// OnChange Tahun
		$('#tahun').change(function(){
			var link	= changeKecamatan();
			var tahun	= changeTahun();

			if(tahun==""){
				$('#bulan').attr("disabled", true);
			}else{
				$('#bulan').attr("disabled", false);
			}

			getData(link, tahun);
		});
		// END OnChange Tahun
	});
</script>