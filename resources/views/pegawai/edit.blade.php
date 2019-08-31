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
				<h3 class="box-title">Ubah Pegawai</h3>
			</div>

			{!! Form::model($pegawai, ['route' => ['pegawai.update', $pegawai->id], 'role' => 'form', 'method' => 'put']) !!}
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