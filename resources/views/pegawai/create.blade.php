@extends('template.template')

@section('title')
Pegawai
@endsection

@section('nav')
@include('pegawai.nav')
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Tambah Pegawai</h3>
			</div>

			{!! Form::open(['route' => 'pegawai.store', 'role' => 'form']) !!}
				@include('pegawai.form')

				<div class="box-footer">
					<button type="submit" class="btn btn-success">Simpan</button>
					<a href="{{route('pegawai.index')}}" class="btn btn-info">Batal</a>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection