<div class="box-body">

	@php
	$class = $errors->has('unit') ? 'form-group has-error' : 'form-group';
	$message = $errors->has('unit') ? $errors->first('unit') : '';
	@endphp
	<div class="{{$class}}">
		<label for="unit" data-toggle="tooltip" title="{{$message}}">Unit</label>
		<div data-toggle="tooltip" title="{{$message}}">
			{!! Form::text('unit',null,['class'=> 'form-control','placeholder'=>'Isi Unit', 'id' => 'unit']) !!}
		</div>
	</div>

	@php
	$class = $errors->has('materi') ? 'form-group has-error' : 'form-group';
	$message = $errors->has('materi') ? $errors->first('materi') : '';
	@endphp
	<div class="{{$class}}">
		<label for="materi" data-toggle="tooltip" title="{{$message}}">Materi</label>
		<div data-toggle="tooltip" title="{{$message}}">
			{!! Form::text('materi',null,['class'=> 'form-control','placeholder'=>'Isi Materi', 'id' => 'materi']) !!}
		</div>
	</div>

	@php
	$class = $errors->has('deskripsi') ? 'form-group has-error' : 'form-group';
	$message = $errors->has('deskripsi') ? $errors->first('deskripsi') : '';
	@endphp
	<div class="{{$class}}">
		<label for="deskripsi" data-toggle="tooltip" title="{{$message}}">Deskripsi</label>
		<div data-toggle="tooltip" title="{{$message}}">
			{!! Form::textarea('deskripsi',null,['class'=> 'form-control','placeholder'=>'Isi Deskripsi', 'id' => 'deskripsi', 'style' => 'resize: none;', 'rows' => 10]) !!}
		</div>
	</div>
	
	@php
	$class = $errors->has('berkas') ? 'form-group has-error' : 'form-group';
	$message = $errors->has('berkas') ? $errors->first('berkas') : '';
	@endphp
	<div class="{{$class}}">
		<label for="berkas" data-toggle="tooltip" title="{{$message}}">Berkas</label>
		<div data-toggle="tooltip" title="{{$message}}">
			{!! Form::file('berkas',['class'=> 'form-control','id' => 'berkas']) !!}
		</div>
	</div>

	@php
	$class = $errors->has('durasi') ? 'form-group has-error' : 'form-group';
	$message = $errors->has('durasi') ? $errors->first('durasi') : '';
	@endphp
	<div class="{{$class}}">
		<label for="durasi" data-toggle="tooltip" title="{{$message}}">Durasi (Menit)</label>
		<div data-toggle="tooltip" title="{{$message}}">
			{!! Form::text('durasi',null,['class'=> 'form-control mask_ribuan','placeholder'=>'Isi Durasi (Menit)', 'id' => 'durasi']) !!}
		</div>
	</div>

</div>