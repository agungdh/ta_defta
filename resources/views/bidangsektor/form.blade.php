<div class="box-body">

	@php
	$class = $errors->has('bidang_sektor') ? 'form-group has-error' : 'form-group';
	$message = $errors->has('bidang_sektor') ? $errors->first('bidang_sektor') : '';
	@endphp
	<div class="{{$class}}">
		<label for="bidang_sektor" data-toggle="tooltip" title="{{$message}}">Bidang Sektor</label>
		<div data-toggle="tooltip" title="{{$message}}">
			{!! Form::text('bidang_sektor',null,['class'=> 'form-control','placeholder'=>'Isi Bidang Sektor', 'id' => 'bidang_sektor']) !!}
		</div>
	</div>
	
</div>