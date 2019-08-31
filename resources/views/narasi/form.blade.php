<div class="box-body">
	<p>{{$materi->unit}} - {{$materi->materi}}</p>

	@php
	$class = $errors->has('no') ? 'form-group has-error' : 'form-group';
	$message = $errors->has('no') ? $errors->first('no') : '';
	@endphp
	<div class="{{$class}}">
		<label for="no" data-toggle="tooltip" title="{{$message}}">No</label>
		<div data-toggle="tooltip" title="{{$message}}">
			{!! Form::number('no',null,['class'=> 'form-control','placeholder'=>'Isi No', 'id' => 'no', 'min' => '1']) !!}
		</div>
	</div>

	@php
	$class = $errors->has('isi_cerita') ? 'form-group has-error' : 'form-group';
	$message = $errors->has('isi_cerita') ? $errors->first('isi_cerita') : '';
	@endphp
	<div class="{{$class}}">
		<label for="isi_cerita" data-toggle="tooltip" title="{{$message}}">Narasi</label>
		<div data-toggle="tooltip" title="{{$message}}">
			{!! Form::textarea('isi_cerita',null,['class'=> 'form-control','placeholder'=>'Isi Narasi', 'id' => 'isi_cerita', 'style' => 'resize: none;', 'rows' => 10]) !!}
		</div>
	</div>
	
</div>