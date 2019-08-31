<div class="box-body">

	@php
	$class = $errors->has('nama') ? 'form-group has-error' : 'form-group';
	$message = $errors->has('nama') ? $errors->first('nama') : '';
	@endphp
	<div class="{{$class}}">
		<label for="nama" data-toggle="tooltip" title="{{$message}}">Nama</label>
		<div data-toggle="tooltip" title="{{$message}}">
			{!! Form::text('nama',null,['class'=> 'form-control', 'placeholder'=>'Isi Nama', 'id' => 'nama']) !!}
		</div>
	</div>

	@php
	$class = $errors->has('username') ? 'form-group has-error' : 'form-group';
	$message = $errors->has('username') ? $errors->first('username') : '';
	@endphp
	<div class="{{$class}}">
		<label for="username" data-toggle="tooltip" title="{{$message}}">Username</label>
		<div data-toggle="tooltip" title="{{$message}}">
			{!! Form::text('username',null,['class'=> 'form-control', 'placeholder'=>'Isi Username', 'id' => 'username']) !!}
		</div>
	</div>

	@php
	$class = $errors->has('level') ? 'form-group has-error' : 'form-group';
	$message = $errors->has('level') ? $errors->first('level') : '';
	@endphp
	<div class="{{$class}}">
		<label for="level" data-toggle="tooltip" title="{{$message}}">Level</label>
		<div data-toggle="tooltip" title="{{$message}}">
			{!! Form::select('level',[
					'a' => 'Administrator',
					's' => 'Siswa',
				],null,['class'=> 'form-control select2','placeholder'=>'Pilih Level','id'=>'level','style'=>'width: 100%']) !!}
		</div>
	</div>

	@php
	$class = $errors->has('password') ? 'form-group has-error' : 'form-group';
	$message = $errors->has('password') ? $errors->first('password') : '';
	@endphp
	<div class="{{$class}}">
		<label for="password" data-toggle="tooltip" title="{{$message}}">Password</label>
		<div data-toggle="tooltip" title="{{$message}}">
			{!! Form::password('password',['class'=> 'form-control','placeholder'=>'Isi Password', 'id' => 'password']) !!}
		</div>
	</div>
	
	@php
	$class = $errors->has('password') ? 'form-group has-error' : 'form-group';
	$message = $errors->has('password') ? $errors->first('password') : '';
	@endphp
	<div class="{{$class}}">
		<label for="password_confirmation" data-toggle="tooltip" title="{{$message}}">Password Konfirmasi</label>
		<div data-toggle="tooltip" title="{{$message}}">
			{!! Form::password('password_confirmation',['class'=> 'form-control','placeholder'=>'Isi Password Konfirmasi', 'id' => 'password_confirmation']) !!}
		</div>
	</div>
	
</div>

@section('js')
@endsection