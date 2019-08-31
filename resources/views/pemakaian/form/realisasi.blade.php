<div class="box-body">

<div class="col-md-4">
	@php
	$class = $errors->has('realisasi_mulai_waktu') ? 'form-group has-error' : 'form-group';
	$message = $errors->has('realisasi_mulai_waktu') ? $errors->first('realisasi_mulai_waktu') : '';
	@endphp
	<div class="{{$class}}">
		<label for="realisasi_mulai_waktu" data-toggle="tooltip" title="{{$message}}">Waktu Berangkat</label>
		<div data-toggle="tooltip" title="{{$message}}">
			{!! Form::text('realisasi_mulai_waktu',null,['class'=> 'form-control datetimepicker','placeholder'=>'Isi Waktu Berangkat', 'id' => 'realisasi_mulai_waktu']) !!}
		</div>
	</div>

	@php
	$class = $errors->has('realisasi_mulai_km') ? 'form-group has-error' : 'form-group';
	$message = $errors->has('realisasi_mulai_km') ? $errors->first('realisasi_mulai_km') : '';
	@endphp
	<div class="{{$class}}">
		<label for="realisasi_mulai_km" data-toggle="tooltip" title="{{$message}}">Kilometer Berangkat</label>
		<div data-toggle="tooltip" title="{{$message}}">
			{!! Form::text('realisasi_mulai_km',null,['class'=> 'form-control mask_ribuan','placeholder'=>'Isi Kilometer Berangkat', 'id' => 'realisasi_mulai_km']) !!}
		</div>
	</div>

	@php
	$class = $errors->has('realisasi_mulai_bbm') ? 'form-group has-error' : 'form-group';
	$message = $errors->has('realisasi_mulai_bbm') ? $errors->first('realisasi_mulai_bbm') : '';
	@endphp
	<div class="{{$class}}">
		<label for="realisasi_mulai_bbm" data-toggle="tooltip" title="{{$message}}">BBM Berangkat</label>
		<div data-toggle="tooltip" title="{{$message}}">
			{!! Form::select('realisasi_mulai_bbm',$bbms,null,['class'=> 'form-control select2','placeholder'=>'Pilih BBM Berangkat','id'=>'realisasi_mulai_bbm']) !!}
		</div>
	</div>

	@php
	$class = $errors->has('realisasi_mulai_kondisi') ? 'form-group has-error' : 'form-group';
	$message = $errors->has('realisasi_mulai_kondisi') ? $errors->first('realisasi_mulai_kondisi') : '';
	@endphp
	<div class="{{$class}}">
		<label for="realisasi_mulai_kondisi" data-toggle="tooltip" title="{{$message}}">Keadaan Berangkat</label>
		<div data-toggle="tooltip" title="{{$message}}">
			{!! Form::select('realisasi_mulai_kondisi',$kondisis,null,['class'=> 'form-control select2','placeholder'=>'Pilih Ketersediaan Kendaraan','id'=>'realisasi_mulai_kondisi']) !!}
		</div>
	</div>

	@php
	$class = $errors->has('id_pegawai_realisasi_mulai_petugas_jaga') ? 'form-group has-error' : 'form-group';
	$message = $errors->has('id_pegawai_realisasi_mulai_petugas_jaga') ? $errors->first('id_pegawai_realisasi_mulai_petugas_jaga') : '';
	@endphp
	<div class="{{$class}}">
		<label for="id_pegawai_realisasi_mulai_petugas_jaga" data-toggle="tooltip" title="{{$message}}">Petugas Jaga</label>
		<div data-toggle="tooltip" title="{{$message}}">
			{!! Form::select('id_pegawai_realisasi_mulai_petugas_jaga',$petugasJagas,null,['class'=> 'form-control select2','placeholder'=>'Pilih Petugas Jaga','id'=>'id_pegawai_realisasi_mulai_petugas_jaga']) !!}
		</div>
	</div>
</div>

<div class="col-md-4">
	@php
	$class = $errors->has('realisasi_kembali_waktu') ? 'form-group has-error' : 'form-group';
	$message = $errors->has('realisasi_kembali_waktu') ? $errors->first('realisasi_kembali_waktu') : '';
	@endphp
	<div class="{{$class}}">
		<label for="realisasi_kembali_waktu" data-toggle="tooltip" title="{{$message}}">Waktu Berangkat</label>
		<div data-toggle="tooltip" title="{{$message}}">
			{!! Form::text('realisasi_kembali_waktu',null,['class'=> 'form-control datetimepicker','placeholder'=>'Isi Waktu Berangkat', 'id' => 'realisasi_kembali_waktu']) !!}
		</div>
	</div>

	@php
	$class = $errors->has('realisasi_kembali_km') ? 'form-group has-error' : 'form-group';
	$message = $errors->has('realisasi_kembali_km') ? $errors->first('realisasi_kembali_km') : '';
	@endphp
	<div class="{{$class}}">
		<label for="realisasi_kembali_km" data-toggle="tooltip" title="{{$message}}">Kilometer Berangkat</label>
		<div data-toggle="tooltip" title="{{$message}}">
			{!! Form::text('realisasi_kembali_km',null,['class'=> 'form-control mask_ribuan','placeholder'=>'Isi Kilometer Berangkat', 'id' => 'realisasi_kembali_km']) !!}
		</div>
	</div>

	@php
	$class = $errors->has('realisasi_kembali_bbm') ? 'form-group has-error' : 'form-group';
	$message = $errors->has('realisasi_kembali_bbm') ? $errors->first('realisasi_kembali_bbm') : '';
	@endphp
	<div class="{{$class}}">
		<label for="realisasi_kembali_bbm" data-toggle="tooltip" title="{{$message}}">BBM Kembali</label>
		<div data-toggle="tooltip" title="{{$message}}">
			{!! Form::select('realisasi_kembali_bbm',$bbms,null,['class'=> 'form-control select2','placeholder'=>'Pilih BBM Kembali','id'=>'realisasi_kembali_bbm']) !!}
		</div>
	</div>

	@php
	$class = $errors->has('realisasi_kembali_kondisi') ? 'form-group has-error' : 'form-group';
	$message = $errors->has('realisasi_kembali_kondisi') ? $errors->first('realisasi_kembali_kondisi') : '';
	@endphp
	<div class="{{$class}}">
		<label for="realisasi_kembali_kondisi" data-toggle="tooltip" title="{{$message}}">Keadaan Berangkat</label>
		<div data-toggle="tooltip" title="{{$message}}">
			{!! Form::select('realisasi_kembali_kondisi',$kondisis,null,['class'=> 'form-control select2','placeholder'=>'Pilih Ketersediaan Kendaraan','id'=>'realisasi_kembali_kondisi']) !!}
		</div>
	</div>

	@php
	$class = $errors->has('id_pegawai_realisasi_kembali_petugas_jaga') ? 'form-group has-error' : 'form-group';
	$message = $errors->has('id_pegawai_realisasi_kembali_petugas_jaga') ? $errors->first('id_pegawai_realisasi_kembali_petugas_jaga') : '';
	@endphp
	<div class="{{$class}}">
		<label for="id_pegawai_realisasi_kembali_petugas_jaga" data-toggle="tooltip" title="{{$message}}">Petugas Jaga</label>
		<div data-toggle="tooltip" title="{{$message}}">
			{!! Form::select('id_pegawai_realisasi_kembali_petugas_jaga',$petugasJagas,null,['class'=> 'form-control select2','placeholder'=>'Pilih Petugas Jaga','id'=>'id_pegawai_realisasi_kembali_petugas_jaga']) !!}
		</div>
	</div>
</div>

<div class="col-md-4">
	@php
	$class = $errors->has('pengisian_bbm_spbu') ? 'form-group has-error' : 'form-group';
	$message = $errors->has('pengisian_bbm_spbu') ? $errors->first('pengisian_bbm_spbu') : '';
	@endphp
	<div class="{{$class}}">
		<label for="pengisian_bbm_spbu" data-toggle="tooltip" title="{{$message}}">SPBU</label>
		<div data-toggle="tooltip" title="{{$message}}">
			{!! Form::text('pengisian_bbm_spbu',null,['class'=> 'form-control','placeholder'=>'Isi SPBU', 'id' => 'pengisian_bbm_spbu']) !!}
	</div>
	</div>

	@php
	$class = $errors->has('pengisian_bbm_liter') ? 'form-group has-error' : 'form-group';
	$message = $errors->has('pengisian_bbm_liter') ? $errors->first('pengisian_bbm_liter') : '';
	@endphp
	<div class="{{$class}}">
		<label for="pengisian_bbm_liter" data-toggle="tooltip" title="{{$message}}">Liter</label>
		<div data-toggle="tooltip" title="{{$message}}">
			{!! Form::text('pengisian_bbm_liter',null,['class'=> 'form-control mask_ribuan','placeholder'=>'Isi Liter', 'id' => 'pengisian_bbm_liter']) !!}
		</div>
	</div>

	@php
	$class = $errors->has('pengisian_bbm_biaya') ? 'form-group has-error' : 'form-group';
	$message = $errors->has('pengisian_bbm_biaya') ? $errors->first('pengisian_bbm_biaya') : '';
	@endphp
	<div class="{{$class}}">
		<label for="pengisian_bbm_biaya" data-toggle="tooltip" title="{{$message}}">Biaya</label>
		<div data-toggle="tooltip" title="{{$message}}">
			{!! Form::text('pengisian_bbm_biaya',null,['class'=> 'form-control mask_ribuan','placeholder'=>'Isi Biaya', 'id' => 'pengisian_bbm_biaya']) !!}
		</div>
	</div>

	@php
	$class = $errors->has('no_voucher') ? 'form-group has-error' : 'form-group';
	$message = $errors->has('no_voucher') ? $errors->first('no_voucher') : '';
	@endphp
	<div class="{{$class}}">
		<label for="no_voucher" data-toggle="tooltip" title="{{$message}}">No Voucher</label>
		<div data-toggle="tooltip" title="{{$message}}">
			{!! Form::text('no_voucher',null,['class'=> 'form-control','placeholder'=>'Isi No Voucher', 'id' => 'no_voucher']) !!}
	</div>
	</div>

	@php
	$class = $errors->has('jarak') ? 'form-group has-error' : 'form-group';
	$message = $errors->has('jarak') ? $errors->first('jarak') : '';
	@endphp
	<div class="{{$class}}">
		<label for="jarak" data-toggle="tooltip" title="{{$message}}">Jarak (KM)</label>
		<div data-toggle="tooltip" title="{{$message}}">
			{!! Form::text('jarak',null,['class'=> 'form-control mask_ribuan','placeholder'=>'Isi Jarak (KM)', 'id' => 'jarak']) !!}
	</div>
	</div>
</div>