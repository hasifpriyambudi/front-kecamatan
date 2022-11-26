<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Data Keluarga</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item"><a href="<?= base_url('walcome') ?>">Dashboard</a></div>
				<div class="breadcrumb-item active"><a href="<?= base_url('walcome/keluarga') ?>">Keluarga</a></div>
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
						<div class="col-lg-4 col-md-6 col-sm-6 col-12">
							<div class="card card-statistic-1">
								<div class="card-icon bg-primary">
									<i class="fas fa-users"></i>
								</div>
								<div class="card-wrap">
									<div class="card-header">
										<h4>Total Kepala Keluarga</h4>
									</div>
									<div class="card-body" id="totKK"></div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6 col-12">
							<div class="card card-statistic-1">
								<div class="card-icon bg-danger">
									<i class="fas fa-male"></i>
								</div>
								<div class="card-wrap">
									<div class="card-header">
										<h4>Kepala Keluarga Laki Laki</h4>
									</div>
									<div class="card-body" id="totKKLaki"></div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6 col-12">
							<div class="card card-statistic-1">
								<div class="card-icon bg-warning">
									<i class="fas fa-female"></i>
								</div>
								<div class="card-wrap">
									<div class="card-header">
										<h4>Kepala Keluarga Perempuan</h4>
									</div>
									<div class="card-body" id="totKKPerem"></div>
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
		let linkAPI = `${link}keluarga/?desa_id=${desa}&rw=${rw}&rt=${rt}`
		$.ajax({
			url: `${linkAPI}`,
			dataType:"json",
			type: "get",
			success: function(data){
				if(data.status==200){
					let info = data.messages;

					// Info Card
					$('#totKK').html(info.total.total_kk);
					$('#totKKLaki').html(info.total.total_kk_laki);
					$('#totKKPerem').html(info.total.total_kk_perempuan);

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