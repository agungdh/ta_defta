{!! Form::hidden('active_tab',null,['id' => 'active_tab']) !!}

<ul class="nav nav-tabs">
	<li id="switch_permohonan"><a href="javascript:void(0)">Permohonan</a></li>
	<li id="switch_kendaraan"><a href="javascript:void(0)">Kendaraan</a></li>
	<li id="switch_realisasi"><a href="javascript:void(0)">Realisasi</a></li>
</ul>
<div class="tab-content">
	<div class="tab-pane" id="tab_permohonan">
		@include('pemakaian.form.permohonan')
	</div>
	<div class="tab-pane" id="tab_kendaraan">
		@include('pemakaian.form.kendaraan')
	</div>
	<div class="tab-pane" id="tab_realisasi">
		@include('pemakaian.form.realisasi')
	</div>
</div>

@section('js')
<script type="text/javascript">
	{{-- Event --}}
	$("#switch_permohonan").click(function() {
		tabClick('permohonan');
	});

	$("#switch_kendaraan").click(function() {
		tabClick('kendaraan');
	});
	
	$("#switch_realisasi").click(function() {
		tabClick('realisasi');
	});

	$("#id_pegawai").change(function() {
		$.ajax({
		  type: "GET",
		  url: "{{route('publicAjax.getPegawaiWithBidangSektor')}}",
		  data: {
		  	id: $("#id_pegawai").val()
		  },
		  success: function(data, textStatus, xhr ) {
		  	if (!jQuery.isEmptyObject(data)) {
		  		if (data.bidang_sektor) {
		  			$("#readonly_bidang_sektor").val(data.bidang_sektor.bidang_sektor);
		  		} else {
		  			$("#readonly_bidang_sektor").val('Fungsi Umum');
		  		}
		  	}
		  },
		  error: function(xhr, textStatus, errorThrown) {
		  	console.log(xhr, 'xhr');
		  	console.log(textStatus, 'textStatus');
		  	console.log(errorThrown, 'errorThrown');
		  }
		});
	})

	$("#id_pegawai_atasan_langsung").change(function() {
		$.ajax({
		  type: "GET",
		  url: "{{route('publicAjax.getPegawaiWithBidangSektor')}}",
		  data: {
		  	id: $("#id_pegawai_atasan_langsung").val()
		  },
		  success: function(data, textStatus, xhr ) {
		  	if (!jQuery.isEmptyObject(data)) {
		  		if (data.bidang_sektor) {
		  			$("#readonly_bidang_sektor_atasan").val(data.bidang_sektor.bidang_sektor);
		  		} else {
		  			$("#readonly_bidang_sektor_atasan").val('Fungsi Umum');
		  		}
		  	}
		  },
		  error: function(xhr, textStatus, errorThrown) {
		  	console.log(xhr, 'xhr');
		  	console.log(textStatus, 'textStatus');
		  	console.log(errorThrown, 'errorThrown');
		  }
		});
	})

	$("#tujuan").change(function() {
		toggle_luar_kota();
	});

	$("#ketersediaan_kendaraan").change(function() {
		if ($("#ketersediaan_kendaraan").val() == 't') {
			$("#div_tersedia").prop('style', '');
			$("#div_tidak_tersedia").prop('style', 'display: none;');
		} else if ($("#ketersediaan_kendaraan").val() == 'tt') {
			$("#div_tersedia").prop('style', 'display: none;');
			$("#div_tidak_tersedia").prop('style', '');
		} else {
			$("#div_tersedia").prop('style', 'display: none;');
			$("#div_tidak_tersedia").prop('style', 'display: none;');
		}

		$(".select2").select2();
	});
	
</script>

<script type="text/javascript">
	{{-- Auto Start --}}
	$(function() {
		autoStart();
	});

</script>

<script type="text/javascript">
	{{-- Function --}}
	function autoStart() {
		toggle_luar_kota();

		@if($errors->all())
    	tabClick('{{old('active_tab')}}');
    	@else
    	tabClick('permohonan');
    	@endif

		@if(isset($pemakaian) || $errors->all())
		try {
			$("#id_pegawai").change();
			$("#id_pegawai_atasan_langsung").change();
			$("#tujuan").change();
			$("#ketersediaan_kendaraan").change();
		} catch (e) {
			console.log('log', e.message);
		}

			@if(
				array_intersect(
					array_keys($errors->toArray()),
					[
						'id_pegawai',
						'keperluan',
						'tanggal_permohonan',
						'tujuan',
						'luar_kota',
						'rencana_mulai',
						'rencana_kembali',
						'id_pegawai_atasan_langsung',
					] 
				)
			)
			$("#switch_permohonan a").addClass('tulisan_merah');
			@endif
			@if(
				array_intersect(
					array_keys($errors->toArray()),
					[
						'ketersediaan_kendaraan',
						'biaya_tidak_tersedia_kendaraan',
						'id_kendaraan',
						'id_pengemudi',
						'tanggal_persetujuan_fungsi_umum',
						'id_pegawai_fungsi_umum',
					] 
				)
			)
			$("#switch_kendaraan a").addClass('tulisan_merah');
			@endif
			@if(
				array_intersect(
					array_keys($errors->toArray()),
					[
						'realisasi_mulai_kondisi',
						'realisasi_mulai_waktu',
						'realisasi_mulai_bbm',
						'realisasi_mulai_km',
						'id_pegawai_realisasi_mulai_petugas_jaga',
						'realisasi_kembali_kondisi',
						'realisasi_kembali_waktu',
						'realisasi_kembali_bbm',
						'realisasi_kembali_km',
						'id_pegawai_realisasi_kembali_petugas_jaga',
						'pengisian_bbm_spbu',
						'pengisian_bbm_liter',
						'pengisian_bbm_biaya',
						'no_voucher',
						'jarak',
					] 
				)
			)
			$("#switch_realisasi a").addClass('tulisan_merah');
			@endif

		@endif
	}

	function toggle_luar_kota(){
		if ($("#tujuan").val() == 'l') {
			$("#luar_kota").prop('disabled', false);
		} else {
			$("#luar_kota").prop('disabled', true);
		}
	}

	function tabClick(id) {
		deactiveTabs();

		$("#switch_" + id).addClass('active');
		$("#tab_" + id).addClass('active');

		$("#active_tab").val(id);

		$(".select2").select2();
	}

	function deactiveTabs() {
		$("#switch_permohonan").removeClass('active');
		$("#switch_kendaraan").removeClass('active');
		$("#switch_realisasi").removeClass('active');

		$("#tab_permohonan").removeClass('active');
		$("#tab_kendaraan").removeClass('active');
		$("#tab_realisasi").removeClass('active');
	}
</script>
@endsection