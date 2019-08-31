<div class="box-body">

	<div class="col-md-12">
		@php
		$class = $errors->has('ketersediaan_kendaraan') ? 'form-group has-error' : 'form-group';
		$message = $errors->has('ketersediaan_kendaraan') ? $errors->first('ketersediaan_kendaraan') : '';
		@endphp
		<div class="{{$class}}">
			<label for="ketersediaan_kendaraan" data-toggle="tooltip" title="{{$message}}">Ketersediaan Kendaraan</label>
			<div data-toggle="tooltip" title="{{$message}}">
				{!! Form::select('ketersediaan_kendaraan',$ketersediaanKendaraans,null,['class'=> 'form-control select2','placeholder'=>'Pilih Ketersediaan Kendaraan','id'=>'ketersediaan_kendaraan']) !!}
			</div>
		</div>
	</div>

	<div id="div_tersedia" style="display: none;">
		<div class="col-md-6">
			@php
			$class = $errors->has('id_kendaraan') ? 'form-group has-error' : 'form-group';
			$message = $errors->has('id_kendaraan') ? $errors->first('id_kendaraan') : '';
			@endphp
			<div class="{{$class}}">
				<label for="id_kendaraan" data-toggle="tooltip" title="{{$message}}">Kendaraan</label>
				<div data-toggle="tooltip" title="{{$message}}">
					{!! Form::select('id_kendaraan',$kendaraans,null,['class'=> 'form-control select2','placeholder'=>'Pilih Kendaraan','id'=>'id_kendaraan']) !!}
				</div>
			</div>
		</div>		

		<div class="col-md-6">
			@php
			$class = $errors->has('id_pengemudi') ? 'form-group has-error' : 'form-group';
			$message = $errors->has('id_pengemudi') ? $errors->first('id_pengemudi') : '';
			@endphp
			<div class="{{$class}}">
				<label for="id_pengemudi" data-toggle="tooltip" title="{{$message}}">Pengemudi</label>
				<div data-toggle="tooltip" title="{{$message}}">
					{!! Form::select('id_pengemudi',$pengemudis,null,['class'=> 'form-control select2','placeholder'=>'Bawa Sendiri','id'=>'id_pengemudi']) !!}
				</div>
			</div>
		</div>

		<div class="col-md-6">
			@php
			$class = $errors->has('tanggal_persetujuan_fungsi_umum') ? 'form-group has-error' : 'form-group';
			$message = $errors->has('tanggal_persetujuan_fungsi_umum') ? $errors->first('tanggal_persetujuan_fungsi_umum') : '';
			@endphp
			<div class="{{$class}}">
				<label for="tanggal_persetujuan_fungsi_umum" data-toggle="tooltip" title="{{$message}}">Tanggal Persetujuan</label>
				<div data-toggle="tooltip" title="{{$message}}">
					{!! Form::text('tanggal_persetujuan_fungsi_umum',null,['class'=> 'form-control datepicker','placeholder'=>'Pilih Tanggal Persetujuan', 'id' => 'tanggal_persetujuan_fungsi_umum', 'readonly' => false]) !!}
				</div>
			</div>
		</div>

		<div class="col-md-6">
			@php
			$class = $errors->has('id_pegawai_fungsi_umum') ? 'form-group has-error' : 'form-group';
			$message = $errors->has('id_pegawai_fungsi_umum') ? $errors->first('id_pegawai_fungsi_umum') : '';
			@endphp
			<div class="{{$class}}">
				<label for="id_pegawai_fungsi_umum" data-toggle="tooltip" title="{{$message}}">Fungsi Umum</label>
				<div data-toggle="tooltip" title="{{$message}}">
					{!! Form::select('id_pegawai_fungsi_umum',$pegawais,null,['class'=> 'form-control select2','placeholder'=>'Pilih Fungsi Umum','id'=>'id_pegawai_fungsi_umum']) !!}
				</div>
			</div>
		</div>

		<div class="col-md-12">
			@php
			$class = $errors->has('catatan') ? 'form-group has-error' : 'form-group';
			$message = $errors->has('catatan') ? $errors->first('catatan') : '';
			@endphp
			<div class="{{$class}}">
				<label for="catatan" data-toggle="tooltip" title="{{$message}}">Catatan</label>
				<div data-toggle="tooltip" title="{{$message}}">
					{!! Form::textarea('catatan',null,['class'=> 'form-control','placeholder'=>'Isi Catatan', 'id' => 'catatan', 'rows' => 7, 'style' => 'resize: none;']) !!}
				</div>
			</div>
		</div>
	</div>

	<div id="div_tidak_tersedia" style="display: none;">
		<div class="col-md-12">
			@php
			$class = $errors->has('biaya_tidak_tersedia_kendaraan') ? 'form-group has-error' : 'form-group';
			$message = $errors->has('biaya_tidak_tersedia_kendaraan') ? $errors->first('biaya_tidak_tersedia_kendaraan') : '';
			@endphp
			<div class="{{$class}}">
				<label for="biaya_tidak_tersedia_kendaraan" data-toggle="tooltip" title="{{$message}}">Pengeluaran</label>
				<div data-toggle="tooltip" title="{{$message}}">
					{!! Form::text('biaya_tidak_tersedia_kendaraan',null,['class'=> 'form-control mask_ribuan','placeholder'=>'Pilih Pegawai', 'id' => 'biaya_tidak_tersedia_kendaraan']) !!}
				</div>
			</div>
		</div>		
	</div>

</div>