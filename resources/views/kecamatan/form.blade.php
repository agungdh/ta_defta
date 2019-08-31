<div class="box-body">

	@php
	$class = $errors->has('dapil') ? 'form-group has-error' : 'form-group';
	$message = $errors->has('dapil') ? $errors->first('dapil') : '';
	@endphp
	<div class="{{$class}}">
		<label for="dapil" data-toggle="tooltip" title="{{$message}}">Dapil</label>
		<div data-toggle="tooltip" title="{{$message}}">
			{!! Form::text('dapil',null,['class'=> 'form-control mask_ribuan','placeholder'=>'Isi Dapil', 'id' => 'dapil']) !!}
		</div>
	</div>

	@php
	$class = $errors->has('kabupaten') ? 'form-group has-error' : 'form-group';
	$message = $errors->has('kabupaten') ? $errors->first('kabupaten') : '';
	@endphp
	<div class="{{$class}}">
		<label for="kabupaten" data-toggle="tooltip" title="{{$message}}">Kabupaten</label>
		<div data-toggle="tooltip" title="{{$message}}">
			{!! Form::text('kabupaten',null,['class'=> 'form-control','placeholder'=>'Isi Kabupaten', 'id' => 'kabupaten']) !!}
		</div>
	</div>

</div>