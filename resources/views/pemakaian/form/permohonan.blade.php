<div class="box-body">

	<div class="col-md-6">
		@php
		$class = $errors->has('id_pegawai') ? 'form-group has-error' : 'form-group';
		$message = $errors->has('id_pegawai') ? $errors->first('id_pegawai') : '';
		@endphp
		<div class="{{$class}}">
			<label for="id_pegawai" data-toggle="tooltip" title="{{$message}}">Pegawai</label>
			<div data-toggle="tooltip" title="{{$message}}">
				{!! Form::select('id_pegawai',$pegawais,null,['class'=> 'form-control select2','placeholder'=>'Pilih Pegawai','id'=>'id_pegawai']) !!}
			</div>
		</div>
	</div>

	<div class="col-md-6">
		@php
		$class = $errors->has('readonly_bidang_sektor') ? 'form-group has-error' : 'form-group';
		$message = $errors->has('readonly_bidang_sektor') ? $errors->first('readonly_bidang_sektor') : '';
		@endphp
		<div class="{{$class}}">
			<label for="readonly_bidang_sektor" data-toggle="tooltip" title="{{$message}}">Bidang Sektor</label>
			<div data-toggle="tooltip" title="{{$message}}">
				{!! Form::text('readonly_bidang_sektor',null,['class'=> 'form-control','placeholder'=>'Pilih Pegawai', 'id' => 'readonly_bidang_sektor', 'readonly' => true]) !!}
			</div>
		</div>
	</div>

	<div class="col-md-6">
		@php
		$class = $errors->has('keperluan') ? 'form-group has-error' : 'form-group';
		$message = $errors->has('keperluan') ? $errors->first('keperluan') : '';
		@endphp
		<div class="{{$class}}">
			<label for="keperluan" data-toggle="tooltip" title="{{$message}}">Keperluan</label>
			<div data-toggle="tooltip" title="{{$message}}">
				{!! Form::select('keperluan',$keperluans,null,['class'=> 'form-control select2','placeholder'=>'Pilih Keperluan','id'=>'keperluan']) !!}
			</div>
		</div>
	</div>

	<div class="col-md-6">
		@php
		$class = $errors->has('tanggal_permohonan') ? 'form-group has-error' : 'form-group';
		$message = $errors->has('tanggal_permohonan') ? $errors->first('tanggal_permohonan') : '';
		@endphp
		<div class="{{$class}}">
			<label for="tanggal_permohonan" data-toggle="tooltip" title="{{$message}}">Tanggal Permohonan</label>
			<div data-toggle="tooltip" title="{{$message}}">
				{!! Form::text('tanggal_permohonan',null,['class'=> 'form-control datepicker','placeholder'=>'Pilih Tanggal Permohonan', 'id' => 'tanggal_permohonan', 'readonly' => false]) !!}
			</div>
		</div>
	</div>

	<div class="col-md-12">
		@php
		$class = $errors->has('keterangan') ? 'form-group has-error' : 'form-group';
		$message = $errors->has('keterangan') ? $errors->first('keterangan') : '';
		@endphp
		<div class="{{$class}}">
			<label for="keterangan" data-toggle="tooltip" title="{{$message}}">Keterangan</label>
			<div data-toggle="tooltip" title="{{$message}}">
				{!! Form::textarea('keterangan',null,['class'=> 'form-control','placeholder'=>'Isi Keterangan', 'id' => 'keterangan', 'rows' => 7, 'style' => 'resize: none;']) !!}
			</div>
		</div>
	</div>

	<div class="col-md-6">
		@php
		$class = $errors->has('tujuan') ? 'form-group has-error' : 'form-group';
		$message = $errors->has('tujuan') ? $errors->first('tujuan') : '';
		@endphp
		<div class="{{$class}}">
			<label for="tujuan" data-toggle="tooltip" title="{{$message}}">Tujuan</label>
			<div data-toggle="tooltip" title="{{$message}}">
				{!! Form::select('tujuan',$tujuans,null,['class'=> 'form-control select2','placeholder'=>'Pilih Tujuan','id'=>'tujuan']) !!}
		</div>
		</div>
	</div>

	<div class="col-md-6">
		@php
		$class = $errors->has('luar_kota') ? 'form-group has-error' : 'form-group';
		$message = $errors->has('luar_kota') ? $errors->first('luar_kota') : '';
		@endphp
		<div class="{{$class}}">
			<label for="luar_kota" data-toggle="tooltip" title="{{$message}}">Kota Tujuan</label>
			<div data-toggle="tooltip" title="{{$message}}">
				{!! Form::text('luar_kota',null,['class'=> 'form-control','placeholder'=>'Isi Kota Tujuan', 'id' => 'luar_kota']) !!}
		</div>
		</div>
	</div>

	<div class="col-md-6">
		@php
		$class = $errors->has('rencana_mulai') ? 'form-group has-error' : 'form-group';
		$message = $errors->has('rencana_mulai') ? $errors->first('rencana_mulai') : '';
		@endphp
		<div class="{{$class}}">
			<label for="rencana_mulai" data-toggle="tooltip" title="{{$message}}">Rencana Mulai</label>
			<div data-toggle="tooltip" title="{{$message}}">
				{!! Form::text('rencana_mulai',null,['class'=> 'form-control datetimepicker','placeholder'=>'Isi Rencana Mulai', 'id' => 'rencana_mulai']) !!}
			</div>
		</div>
	</div>

	<div class="col-md-6">
		@php
		$class = $errors->has('rencana_kembali') ? 'form-group has-error' : 'form-group';
		$message = $errors->has('rencana_kembali') ? $errors->first('rencana_kembali') : '';
		@endphp
		<div class="{{$class}}">
			<label for="rencana_kembali" data-toggle="tooltip" title="{{$message}}">Rencana Kembali</label>
			<div data-toggle="tooltip" title="{{$message}}">
				{!! Form::text('rencana_kembali',null,['class'=> 'form-control datetimepicker','placeholder'=>'Isi Rencana Kembali', 'id' => 'rencana_kembali']) !!}
			</div>
		</div>
	</div>

	<div class="col-md-6">
		@php
		$class = $errors->has('id_pegawai_atasan_langsung') ? 'form-group has-error' : 'form-group';
		$message = $errors->has('id_pegawai_atasan_langsung') ? $errors->first('id_pegawai_atasan_langsung') : '';
		@endphp
		<div class="{{$class}}">
			<label for="id_pegawai_atasan_langsung" data-toggle="tooltip" title="{{$message}}">Atasan Langsung</label>
			<div data-toggle="tooltip" title="{{$message}}">
				{!! Form::select('id_pegawai_atasan_langsung',$pegawais,null,['class'=> 'form-control select2','placeholder'=>'Pilih Atasan Langsung','id'=>'id_pegawai_atasan_langsung']) !!}
			</div>
		</div>
	</div>

	<div class="col-md-6">
		@php
		$class = $errors->has('readonly_bidang_sektor_atasan') ? 'form-group has-error' : 'form-group';
		$message = $errors->has('readonly_bidang_sektor_atasan') ? $errors->first('readonly_bidang_sektor_atasan') : '';
		@endphp
		<div class="{{$class}}">
			<label for="readonly_bidang_sektor_atasan" data-toggle="tooltip" title="{{$message}}">Bidang Sektor</label>
			<div data-toggle="tooltip" title="{{$message}}">
				{!! Form::text('readonly_bidang_sektor_atasan',null,['class'=> 'form-control','placeholder'=>'Pilih Atasan Langsung', 'id' => 'readonly_bidang_sektor_atasan', 'readonly' => true]) !!}
			</div>
		</div>
	</div>


</div>