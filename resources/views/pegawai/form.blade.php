<div class="box-body">

	@php
	$class = $errors->has('npp') ? 'form-group has-error' : 'form-group';
	$message = $errors->has('npp') ? $errors->first('npp') : '';
	@endphp
	<div class="{{$class}}">
		<label for="npp" data-toggle="tooltip" title="{{$message}}">NPP</label>
		<div data-toggle="tooltip" title="{{$message}}">
			{!! Form::text('npp',null,['class'=> 'form-control','placeholder'=>'Isi NPP', 'id' => 'npp']) !!}
		</div>
	</div>

	@php
	$class = $errors->has('nama') ? 'form-group has-error' : 'form-group';
	$message = $errors->has('nama') ? $errors->first('nama') : '';
	@endphp
	<div class="{{$class}}">
		<label for="nama" data-toggle="tooltip" title="{{$message}}">Nama</label>
		<div data-toggle="tooltip" title="{{$message}}">
			{!! Form::text('nama',null,['class'=> 'form-control','placeholder'=>'Isi Nama', 'id' => 'nama']) !!}
		</div>
	</div>

	@php
	$class = $errors->has('id_bidang_sektor') ? 'form-group has-error' : 'form-group';
	$message = $errors->has('id_bidang_sektor') ? $errors->first('id_bidang_sektor') : '';
	@endphp
	<div class="{{$class}}">
		<label for="id_bidang_sektor" data-toggle="tooltip" title="{{$message}}">Bidang Sektor</label>
		<div data-toggle="tooltip" title="{{$message}}">
			{!! Form::select('id_bidang_sektor',$bidangSektors,null,['class'=> 'form-control select2','placeholder'=>'Pilih Bidang Sektor','id'=>'id_bidang_sektor']) !!}
		</div>
	</div>
	
</div>