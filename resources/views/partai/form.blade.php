<div class="box-body">

	@php
	$class = $errors->has('partai') ? 'form-group has-error' : 'form-group';
	$message = $errors->has('partai') ? $errors->first('partai') : '';
	@endphp
	<div class="{{$class}}">
		<label for="partai" data-toggle="tooltip" title="{{$message}}">Partai</label>
		<div data-toggle="tooltip" title="{{$message}}">
			{!! Form::text('partai',null,['class'=> 'form-control','placeholder'=>'Isi Partai', 'id' => 'partai']) !!}
		</div>
	</div>

	@php
	$class = $errors->has('logo') ? 'form-group has-error' : 'form-group';
	$message = $errors->has('logo') ? $errors->first('logo') : '';
	@endphp
	<div class="{{$class}}">
		<label for="logo" data-toggle="tooltip" title="{{$message}}">Logo</label>
		<div data-toggle="tooltip" title="{{$message}}">
			{!! Form::file('logo',['class'=> 'form-control','id' => 'logo']) !!}
		</div>
	</div>

</div>