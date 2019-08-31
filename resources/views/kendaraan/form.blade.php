<div class="box-body">

	@php
	$class = $errors->has('plat_nomor') ? 'form-group has-error' : 'form-group';
	$message = $errors->has('plat_nomor') ? $errors->first('plat_nomor') : '';
	@endphp
	<div class="{{$class}}">
		<label for="plat_nomor" data-toggle="tooltip" title="{{$message}}">Plat Nomor</label>
		<div data-toggle="tooltip" title="{{$message}}">
			{!! Form::text('plat_nomor',null,['class'=> 'form-control','placeholder'=>'Isi Plat Nomor', 'id' => 'plat_nomor']) !!}
		</div>
	</div>

	@php
	$class = $errors->has('deskripsi') ? 'form-group has-error' : 'form-group';
	$message = $errors->has('deskripsi') ? $errors->first('deskripsi') : '';
	@endphp
	<div class="{{$class}}">
		<label for="deskripsi" data-toggle="tooltip" title="{{$message}}">Deskripsi</label>
		<div data-toggle="tooltip" title="{{$message}}">
			{!! Form::text('deskripsi',null,['class'=> 'form-control','placeholder'=>'Isi Deskripsi', 'id' => 'deskripsi']) !!}
		</div>
	</div>
	
</div>