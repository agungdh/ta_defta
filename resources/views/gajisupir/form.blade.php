<div class="box-body">

	@php
	$class = $errors->has('bulan') ? 'form-group has-error' : 'form-group';
	$message = $errors->has('bulan') ? $errors->first('bulan') : '';
	@endphp
	<div class="{{$class}}">
		<label for="bulan" data-toggle="tooltip" title="{{$message}}">Bulan</label>
		<div data-toggle="tooltip" title="{{$message}}">
			{!! Form::text('bulan',null,['class'=> 'form-control','placeholder'=>'Isi Bulan', 'id' => 'bulan']) !!}
		</div>
	</div>

	@php
	$class = $errors->has('tahun') ? 'form-group has-error' : 'form-group';
	$message = $errors->has('tahun') ? $errors->first('tahun') : '';
	@endphp
	<div class="{{$class}}">
		<label for="tahun" data-toggle="tooltip" title="{{$message}}">Tahun</label>
		<div data-toggle="tooltip" title="{{$message}}">
			{!! Form::text('tahun',null,['class'=> 'form-control','placeholder'=>'Isi Tahun', 'id' => 'tahun']) !!}
		</div>
	</div>
	
	@php
	$class = $errors->has('gaji') ? 'form-group has-error' : 'form-group';
	$message = $errors->has('gaji') ? $errors->first('gaji') : '';
	@endphp
	<div class="{{$class}}">
		<label for="gaji" data-toggle="tooltip" title="{{$message}}">Gaji</label>
		<div data-toggle="tooltip" title="{{$message}}">
			{!! Form::text('gaji',null,['class'=> 'form-control mask_ribuan','placeholder'=>'Isi Gaji', 'id' => 'gaji']) !!}
		</div>
	</div>
	
</div>