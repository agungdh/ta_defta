<div class="box-body">

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
	$class = $errors->has('pertanyaan') ? 'form-group has-error' : 'form-group';
	$message = $errors->has('pertanyaan') ? $errors->first('pertanyaan') : '';
	@endphp
	<div class="{{$class}}">
		<label for="pertanyaan" data-toggle="tooltip" title="{{$message}}">Pertanyaan</label>
		<div data-toggle="tooltip" title="{{$message}}">
			{!! Form::textarea('pertanyaan',null,['class'=> 'form-control','placeholder'=>'Isi Pertanyaan', 'id' => 'pertanyaan', 'style' => 'resize: none;', 'rows' => 10]) !!}
		</div>
	</div>

	@php
	$class = $errors->has('jawaban_a') ? 'form-group has-error' : 'form-group';
	$message = $errors->has('jawaban_a') ? $errors->first('jawaban_a') : '';
	@endphp
	<div class="{{$class}}">
		<label for="jawaban_a" data-toggle="tooltip" title="{{$message}}">Jawaban A</label>
		<div data-toggle="tooltip" title="{{$message}}">
			{!! Form::text('jawaban_a',null,['class'=> 'form-control','placeholder'=>'Isi Jawaban A', 'id' => 'jawaban_a']) !!}
		</div>
	</div>

	@php
	$class = $errors->has('jawaban_b') ? 'form-group has-error' : 'form-group';
	$message = $errors->has('jawaban_b') ? $errors->first('jawaban_b') : '';
	@endphp
	<div class="{{$class}}">
		<label for="jawaban_b" data-toggle="tooltip" title="{{$message}}">Jawaban B</label>
		<div data-toggle="tooltip" title="{{$message}}">
			{!! Form::text('jawaban_b',null,['class'=> 'form-control','placeholder'=>'Isi Jawaban B', 'id' => 'jawaban_b']) !!}
		</div>
	</div>
		
	@php
	$class = $errors->has('jawaban_c') ? 'form-group has-error' : 'form-group';
	$message = $errors->has('jawaban_c') ? $errors->first('jawaban_c') : '';
	@endphp
	<div class="{{$class}}">
		<label for="jawaban_c" data-toggle="tooltip" title="{{$message}}">Jawaban C</label>
		<div data-toggle="tooltip" title="{{$message}}">
			{!! Form::text('jawaban_c',null,['class'=> 'form-control','placeholder'=>'Isi Jawaban C', 'id' => 'jawaban_c']) !!}
		</div>
	</div>
		
	@php
	$class = $errors->has('jawaban_d') ? 'form-group has-error' : 'form-group';
	$message = $errors->has('jawaban_d') ? $errors->first('jawaban_d') : '';
	@endphp
	<div class="{{$class}}">
		<label for="jawaban_d" data-toggle="tooltip" title="{{$message}}">Jawaban D</label>
		<div data-toggle="tooltip" title="{{$message}}">
			{!! Form::text('jawaban_d',null,['class'=> 'form-control','placeholder'=>'Isi Jawaban D', 'id' => 'jawaban_d']) !!}
		</div>
	</div>
		
	@php
	$class = $errors->has('jawaban_e') ? 'form-group has-error' : 'form-group';
	$message = $errors->has('jawaban_e') ? $errors->first('jawaban_e') : '';
	@endphp
	<div class="{{$class}}">
		<label for="jawaban_e" data-toggle="tooltip" title="{{$message}}">Jawaban E</label>
		<div data-toggle="tooltip" title="{{$message}}">
			{!! Form::text('jawaban_e',null,['class'=> 'form-control','placeholder'=>'Isi Jawaban E', 'id' => 'jawaban_e']) !!}
		</div>
	</div>

	@php
	$class = $errors->has('kunci') ? 'form-group has-error' : 'form-group';
	$message = $errors->has('kunci') ? $errors->first('kunci') : '';
	@endphp
	<div class="{{$class}}">
		<label for="kunci" data-toggle="tooltip" title="{{$message}}">Kunci</label>
		<div data-toggle="tooltip" title="{{$message}}">
			{!! Form::select('kunci',$kuncis,null,['class'=> 'form-control select2','placeholder'=>'Pilih Kunci','id'=>'kunci','style'=>'width: 100%']) !!}
		</div>
	</div>
		
</div>